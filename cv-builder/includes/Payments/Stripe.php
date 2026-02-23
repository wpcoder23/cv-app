<?php

namespace CvBuilder\Payments;

use CvBuilder\Access\AccessManager;

defined( 'ABSPATH' ) || exit;

/**
 * Stripe Checkout integration – one-time payment, BLIK support.
 * Uses Stripe Checkout Sessions (not Payment Links) for full control.
 */
class Stripe {

    private const WEBHOOK_ROUTE = 'cvb-stripe-webhook';

    /**
     * Get Stripe secret key based on mode.
     */
    private static function secret_key(): string {
        $mode = get_option( 'cvb_stripe_mode', 'test' );
        return $mode === 'live'
            ? get_option( 'cvb_stripe_live_secret', '' )
            : get_option( 'cvb_stripe_test_secret', '' );
    }

    /**
     * Get Stripe publishable key.
     */
    public static function publishable_key(): string {
        $mode = get_option( 'cvb_stripe_mode', 'test' );
        return $mode === 'live'
            ? get_option( 'cvb_stripe_live_publishable', '' )
            : get_option( 'cvb_stripe_test_publishable', '' );
    }

    /**
     * Get webhook signing secret.
     */
    private static function webhook_secret(): string {
        return get_option( 'cvb_stripe_webhook_secret', '' );
    }

    /**
     * Create a Stripe Checkout Session.
     *
     * @param string $email Customer email.
     * @param string $token Anonymous session token.
     * @param int|null $cv_id CV ID to attach to the session.
     * @return array{url: string, session_id: string}|WP_Error
     */
    public static function create_checkout_session( string $email, string $token = '', ?int $cv_id = null ) {
        $secret = self::secret_key();
        if ( empty( $secret ) ) {
            return new \WP_Error( 'stripe_not_configured', 'Stripe API keys are not configured.', [ 'status' => 500 ] );
        }

        $price    = \CvBuilder\Plugin::get_price(); // in grosz (e.g. 2900 = 29.00 PLN)
        $site_url = home_url();

        $success_url = add_query_arg( [
            'cv-payment' => 'success',
            'session_id' => '{CHECKOUT_SESSION_ID}',
        ], $site_url );

        $cancel_url = add_query_arg( [
            'cv-payment' => 'cancel',
        ], $site_url );

        $metadata = [
            'cv_token' => $token,
            'cv_id'    => $cv_id ?? '',
        ];

        $body = [
            'mode'                 => 'payment',
            'currency'             => 'pln',
            'customer_email'       => $email,
            'success_url'          => $success_url,
            'cancel_url'           => $cancel_url,
            'locale'               => 'pl',
            'payment_method_types' => [ 'card', 'blik', 'p24' ],
            'line_items'           => [
                [
                    'price_data' => [
                        'currency'     => 'pln',
                        'unit_amount'  => $price,
                        'product_data' => [
                            'name'        => 'CV Builder – Dostęp 30 dni',
                            'description' => 'Jednorazowy dostęp do tworzenia i pobierania CV przez 30 dni.',
                        ],
                    ],
                    'quantity' => 1,
                ],
            ],
            'metadata'             => $metadata,
        ];

        $response = self::api_request( 'checkout/sessions', $body );

        if ( is_wp_error( $response ) ) {
            return $response;
        }

        // Store payment record.
        global $wpdb;
        $wpdb->insert(
            $wpdb->prefix . 'cvb_payments',
            [
                'user_id'            => get_current_user_id() ?: null,
                'email'              => sanitize_email( $email ),
                'stripe_session_id'  => $response['id'],
                'amount'             => $price,
                'currency'           => 'PLN',
                'status'             => 'pending',
            ],
            [ '%d', '%s', '%s', '%d', '%s', '%s' ]
        );

        return [
            'url'        => $response['url'],
            'session_id' => $response['id'],
        ];
    }

    /**
     * Listen for Stripe webhook at /cvb-stripe-webhook.
     */
    public static function listen_webhook(): void {
        if ( ! isset( $_SERVER['REQUEST_URI'] ) ) {
            return;
        }

        $uri = wp_parse_url( esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ), PHP_URL_PATH );
        if ( ! $uri || ! str_ends_with( rtrim( $uri, '/' ), self::WEBHOOK_ROUTE ) ) {
            return;
        }

        $payload   = file_get_contents( 'php://input' );
        $sig       = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';
        $secret    = self::webhook_secret();

        if ( empty( $secret ) || empty( $sig ) || empty( $payload ) ) {
            status_header( 400 );
            exit( 'Invalid request.' );
        }

        // Verify Stripe signature.
        if ( ! self::verify_signature( $payload, $sig, $secret ) ) {
            status_header( 403 );
            exit( 'Invalid signature.' );
        }

        $event = json_decode( $payload, true );

        if ( ! $event || empty( $event['type'] ) ) {
            status_header( 400 );
            exit( 'Invalid payload.' );
        }

        self::process_webhook_event( $event );

        status_header( 200 );
        exit( 'OK' );
    }

    /**
     * Process webhook events.
     */
    private static function process_webhook_event( array $event ): void {
        switch ( $event['type'] ) {
            case 'checkout.session.completed':
                self::handle_checkout_completed( $event['data']['object'] );
                break;

            case 'checkout.session.expired':
                self::handle_checkout_expired( $event['data']['object'] );
                break;
        }
    }

    /**
     * Handle successful payment.
     */
    private static function handle_checkout_completed( array $session ): void {
        global $wpdb;

        $session_id = $session['id'] ?? '';
        $email      = $session['customer_email'] ?? $session['customer_details']['email'] ?? '';
        $amount     = $session['amount_total'] ?? 0;
        $currency   = strtoupper( $session['currency'] ?? 'PLN' );
        $metadata   = $session['metadata'] ?? [];
        $payment_intent = $session['payment_intent'] ?? '';

        if ( empty( $session_id ) || empty( $email ) ) {
            return;
        }

        // Validate amount and currency to prevent manipulation.
        $expected_price = \CvBuilder\Plugin::get_price();
        if ( $amount < $expected_price || $currency !== 'PLN' ) {
            error_log( 'CVB: Payment amount/currency mismatch – session ' . $session_id );
            return;
        }

        // Idempotency: check if already processed.
        $existing = $wpdb->get_var(
            $wpdb->prepare(
                "SELECT status FROM {$wpdb->prefix}cvb_payments WHERE stripe_session_id = %s",
                $session_id
            )
        );

        if ( 'completed' === $existing ) {
            return; // Already processed.
        }

        // Find or create user.
        $user_id = AccessManager::find_or_create_user( $email );
        if ( ! $user_id ) {
            error_log( 'CVB: Could not create user for email ' . $email );
            return;
        }

        // Grant 30-day access.
        AccessManager::grant_access( $user_id );

        // Migrate anonymous CV if token present.
        $token = $metadata['cv_token'] ?? '';
        if ( ! empty( $token ) ) {
            AccessManager::migrate_cv_to_user( $token, $user_id );
        }

        // Update payment record.
        $wpdb->update(
            $wpdb->prefix . 'cvb_payments',
            [
                'user_id'              => $user_id,
                'status'               => 'completed',
                'stripe_payment_intent'=> $payment_intent,
                'access_expires_at'    => AccessManager::get_expiry( $user_id ),
            ],
            [ 'stripe_session_id' => $session_id ],
            [ '%d', '%s', '%s', '%s' ],
            [ '%s' ]
        );

        // Invalidate old tokens.
        AccessManager::invalidate_user_tokens( $user_id );
    }

    /**
     * Handle expired checkout session.
     */
    private static function handle_checkout_expired( array $session ): void {
        global $wpdb;

        $session_id = $session['id'] ?? '';
        if ( empty( $session_id ) ) {
            return;
        }

        $wpdb->update(
            $wpdb->prefix . 'cvb_payments',
            [ 'status' => 'expired' ],
            [ 'stripe_session_id' => $session_id ],
            [ '%s' ],
            [ '%s' ]
        );
    }

    /**
     * Handle return redirect after payment.
     */
    public static function handle_return(): void {
        if ( ! isset( $_GET['cv-payment'] ) ) {
            return;
        }

        $status = sanitize_text_field( wp_unslash( $_GET['cv-payment'] ) );

        if ( 'success' === $status && ! empty( $_GET['session_id'] ) ) {
            $session_id = sanitize_text_field( wp_unslash( $_GET['session_id'] ) );

            // Verify session with Stripe.
            $session = self::api_request( 'checkout/sessions/' . $session_id, [], 'GET' );

            if ( ! is_wp_error( $session ) && 'complete' === ( $session['status'] ?? '' ) ) {
                $email = $session['customer_email'] ?? $session['customer_details']['email'] ?? '';

                if ( $email ) {
                    $user = get_user_by( 'email', $email );
                    if ( $user && ! is_user_logged_in() ) {
                        wp_set_auth_cookie( $user->ID, true );
                        wp_set_current_user( $user->ID );
                    }
                }
            }
        }
    }

    // ------------------------------------------------------------------
    // Stripe API helpers
    // ------------------------------------------------------------------

    /**
     * Make a request to Stripe API.
     */
    private static function api_request( string $endpoint, array $body = [], string $method = 'POST' ) {
        $secret = self::secret_key();

        $args = [
            'method'  => $method,
            'headers' => [
                'Authorization' => 'Bearer ' . $secret,
                'Content-Type'  => 'application/x-www-form-urlencoded',
            ],
            'timeout' => 30,
        ];

        if ( 'POST' === $method && ! empty( $body ) ) {
            $args['body'] = self::flatten_params( $body );
        }

        $url      = 'https://api.stripe.com/v1/' . $endpoint;
        $response = wp_remote_request( $url, $args );

        if ( is_wp_error( $response ) ) {
            return $response;
        }

        $code = wp_remote_retrieve_response_code( $response );
        $data = json_decode( wp_remote_retrieve_body( $response ), true );

        if ( $code >= 400 ) {
            $msg = $data['error']['message'] ?? 'Stripe API error';
            return new \WP_Error( 'stripe_error', $msg, [ 'status' => $code ] );
        }

        return $data;
    }

    /**
     * Flatten nested params for Stripe URL-encoded format.
     */
    private static function flatten_params( array $params, string $prefix = '' ): array {
        $result = [];

        foreach ( $params as $key => $value ) {
            $full_key = $prefix ? "{$prefix}[{$key}]" : $key;

            if ( is_array( $value ) ) {
                // Check if it's a numerically indexed array.
                if ( array_is_list( $value ) ) {
                    foreach ( $value as $i => $v ) {
                        if ( is_array( $v ) ) {
                            $result = array_merge( $result, self::flatten_params( $v, "{$full_key}[{$i}]" ) );
                        } else {
                            $result[ "{$full_key}[{$i}]" ] = $v;
                        }
                    }
                } else {
                    $result = array_merge( $result, self::flatten_params( $value, $full_key ) );
                }
            } else {
                $result[ $full_key ] = $value;
            }
        }

        return $result;
    }

    /**
     * Verify Stripe webhook signature.
     */
    private static function verify_signature( string $payload, string $sig_header, string $secret ): bool {
        $parts     = [];
        $elements  = explode( ',', $sig_header );

        foreach ( $elements as $element ) {
            $kv = explode( '=', $element, 2 );
            if ( count( $kv ) === 2 ) {
                $parts[ trim( $kv[0] ) ][] = trim( $kv[1] );
            }
        }

        $timestamp  = $parts['t'][0] ?? '';
        $signatures = $parts['v1'] ?? [];

        if ( empty( $timestamp ) || empty( $signatures ) ) {
            return false;
        }

        // Reject if timestamp is older than 5 minutes (replay protection).
        if ( abs( time() - (int) $timestamp ) > 300 ) {
            return false;
        }

        $signed_payload   = $timestamp . '.' . $payload;
        $expected_sig     = hash_hmac( 'sha256', $signed_payload, $secret );

        foreach ( $signatures as $sig ) {
            if ( hash_equals( $expected_sig, $sig ) ) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get the webhook URL for this site.
     */
    public static function get_webhook_url(): string {
        return home_url( '/' . self::WEBHOOK_ROUTE );
    }
}
