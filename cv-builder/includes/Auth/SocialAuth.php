<?php

namespace CvBuilder\Auth;

use CvBuilder\Access\AccessManager;

defined( 'ABSPATH' ) || exit;

/**
 * Social authentication – Google, Facebook, LinkedIn.
 *
 * Uses OAuth 2.0 for each provider. Tokens stored in user meta.
 */
class SocialAuth {

    private const PROVIDERS = [ 'google', 'facebook', 'linkedin' ];

    /**
     * Get OAuth redirect URL for a provider.
     */
    public function get_auth_url( string $provider ): ?string {
        if ( ! in_array( $provider, self::PROVIDERS, true ) ) {
            return null;
        }

        $client_id = get_option( "cvb_{$provider}_client_id", '' );
        if ( empty( $client_id ) ) {
            return null;
        }

        $redirect_uri = home_url( '/?cvb_auth_callback=' . $provider );
        $state        = wp_create_nonce( 'cvb_social_auth_' . $provider );

        // Store state for validation.
        set_transient( 'cvb_auth_state_' . $state, $provider, 600 );

        switch ( $provider ) {
            case 'google':
                return 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query( [
                    'client_id'     => $client_id,
                    'redirect_uri'  => $redirect_uri,
                    'response_type' => 'code',
                    'scope'         => 'openid email profile',
                    'state'         => $state,
                    'prompt'        => 'select_account',
                ] );

            case 'facebook':
                return 'https://www.facebook.com/v18.0/dialog/oauth?' . http_build_query( [
                    'client_id'    => $client_id,
                    'redirect_uri' => $redirect_uri,
                    'scope'        => 'email,public_profile',
                    'state'        => $state,
                ] );

            case 'linkedin':
                return 'https://www.linkedin.com/oauth/v2/authorization?' . http_build_query( [
                    'client_id'     => $client_id,
                    'redirect_uri'  => $redirect_uri,
                    'response_type' => 'code',
                    'scope'         => 'openid profile email',
                    'state'         => $state,
                ] );

            default:
                return null;
        }
    }

    /**
     * Handle OAuth callback (runs on `init`).
     */
    public static function handle_callback(): void {
        if ( ! isset( $_GET['cvb_auth_callback'] ) ) {
            return;
        }

        $provider = sanitize_text_field( wp_unslash( $_GET['cvb_auth_callback'] ) );
        if ( ! in_array( $provider, self::PROVIDERS, true ) ) {
            return;
        }

        $code  = sanitize_text_field( wp_unslash( $_GET['code'] ?? '' ) );
        $state = sanitize_text_field( wp_unslash( $_GET['state'] ?? '' ) );

        if ( empty( $code ) || empty( $state ) ) {
            wp_safe_redirect( home_url( '/?cvb_auth_error=missing_params' ) );
            exit;
        }

        // Validate state (CSRF protection).
        $stored_provider = get_transient( 'cvb_auth_state_' . $state );
        delete_transient( 'cvb_auth_state_' . $state );

        if ( $stored_provider !== $provider ) {
            wp_safe_redirect( home_url( '/?cvb_auth_error=invalid_state' ) );
            exit;
        }

        $instance = new self();
        $tokens   = $instance->exchange_code( $provider, $code );

        if ( is_wp_error( $tokens ) ) {
            wp_safe_redirect( home_url( '/?cvb_auth_error=token_exchange' ) );
            exit;
        }

        $profile = $instance->fetch_profile( $provider, $tokens['access_token'] );

        if ( is_wp_error( $profile ) ) {
            wp_safe_redirect( home_url( '/?cvb_auth_error=profile_fetch' ) );
            exit;
        }

        // Find or create user.
        $email = $profile['email'] ?? '';
        if ( empty( $email ) ) {
            wp_safe_redirect( home_url( '/?cvb_auth_error=no_email' ) );
            exit;
        }

        $user_id = AccessManager::find_or_create_user( $email );
        if ( ! $user_id ) {
            wp_safe_redirect( home_url( '/?cvb_auth_error=user_create' ) );
            exit;
        }

        // Store profile data and tokens.
        update_user_meta( $user_id, "_cvb_{$provider}_profile", $profile );
        update_user_meta( $user_id, "_cvb_{$provider}_token", $tokens['access_token'] );

        // Update user name if empty.
        $user = get_userdata( $user_id );
        if ( empty( $user->first_name ) && ! empty( $profile['first_name'] ) ) {
            wp_update_user( [
                'ID'         => $user_id,
                'first_name' => sanitize_text_field( $profile['first_name'] ),
                'last_name'  => sanitize_text_field( $profile['last_name'] ?? '' ),
            ] );
        }

        // Log the user in.
        wp_set_auth_cookie( $user_id, true );
        wp_set_current_user( $user_id );

        // Migrate anonymous token if present in cookie.
        $anon_token = $_COOKIE['cvb_token'] ?? '';
        if ( ! empty( $anon_token ) ) {
            AccessManager::migrate_cv_to_user( $anon_token, $user_id );
        }

        wp_safe_redirect( home_url( '/?cvb_auth_success=' . $provider ) );
        exit;
    }

    /**
     * Exchange authorization code for tokens.
     */
    private function exchange_code( string $provider, string $code ) {
        $client_id     = get_option( "cvb_{$provider}_client_id", '' );
        $client_secret = get_option( "cvb_{$provider}_client_secret", '' );
        $redirect_uri  = home_url( '/?cvb_auth_callback=' . $provider );

        switch ( $provider ) {
            case 'google':
                $url  = 'https://oauth2.googleapis.com/token';
                $body = [
                    'code'          => $code,
                    'client_id'     => $client_id,
                    'client_secret' => $client_secret,
                    'redirect_uri'  => $redirect_uri,
                    'grant_type'    => 'authorization_code',
                ];
                break;

            case 'facebook':
                $url  = 'https://graph.facebook.com/v18.0/oauth/access_token';
                $body = [
                    'code'          => $code,
                    'client_id'     => $client_id,
                    'client_secret' => $client_secret,
                    'redirect_uri'  => $redirect_uri,
                ];
                break;

            case 'linkedin':
                $url  = 'https://www.linkedin.com/oauth/v2/accessToken';
                $body = [
                    'code'          => $code,
                    'client_id'     => $client_id,
                    'client_secret' => $client_secret,
                    'redirect_uri'  => $redirect_uri,
                    'grant_type'    => 'authorization_code',
                ];
                break;

            default:
                return new \WP_Error( 'invalid_provider', 'Unknown provider.' );
        }

        $response = wp_remote_post( $url, [
            'body'    => $body,
            'timeout' => 15,
        ] );

        if ( is_wp_error( $response ) ) {
            return $response;
        }

        $data = json_decode( wp_remote_retrieve_body( $response ), true );

        if ( empty( $data['access_token'] ) ) {
            return new \WP_Error( 'token_error', $data['error_description'] ?? 'Could not get access token.' );
        }

        return $data;
    }

    /**
     * Fetch user profile from provider.
     */
    private function fetch_profile( string $provider, string $access_token ) {
        switch ( $provider ) {
            case 'google':
                $url = 'https://www.googleapis.com/oauth2/v2/userinfo';
                break;

            case 'facebook':
                $url = 'https://graph.facebook.com/me?fields=id,first_name,last_name,email,picture.type(large)';
                break;

            case 'linkedin':
                $url = 'https://api.linkedin.com/v2/userinfo';
                break;

            default:
                return new \WP_Error( 'invalid_provider', 'Unknown provider.' );
        }

        $response = wp_remote_get( $url, [
            'headers' => [ 'Authorization' => 'Bearer ' . $access_token ],
            'timeout' => 15,
        ] );

        if ( is_wp_error( $response ) ) {
            return $response;
        }

        $data = json_decode( wp_remote_retrieve_body( $response ), true );

        // Normalize profile data.
        return self::normalize_profile( $provider, $data );
    }

    /**
     * Normalize profile data from different providers.
     */
    private static function normalize_profile( string $provider, array $raw ): array {
        switch ( $provider ) {
            case 'google':
                return [
                    'email'      => $raw['email'] ?? '',
                    'first_name' => $raw['given_name'] ?? '',
                    'last_name'  => $raw['family_name'] ?? '',
                    'photo_url'  => $raw['picture'] ?? '',
                    'provider'   => 'google',
                ];

            case 'facebook':
                $photo = $raw['picture']['data']['url'] ?? '';
                return [
                    'email'      => $raw['email'] ?? '',
                    'first_name' => $raw['first_name'] ?? '',
                    'last_name'  => $raw['last_name'] ?? '',
                    'photo_url'  => $photo,
                    'provider'   => 'facebook',
                ];

            case 'linkedin':
                return [
                    'email'      => $raw['email'] ?? '',
                    'first_name' => $raw['given_name'] ?? '',
                    'last_name'  => $raw['family_name'] ?? '',
                    'photo_url'  => $raw['picture'] ?? '',
                    'provider'   => 'linkedin',
                ];

            default:
                return [];
        }
    }

    /**
     * Get stored profile data for a user and provider.
     */
    public function get_profile_data( string $provider, int $user_id ) {
        if ( ! in_array( $provider, self::PROVIDERS, true ) ) {
            return new \WP_Error( 'invalid_provider', 'Nieznany dostawca.' );
        }

        $profile = get_user_meta( $user_id, "_cvb_{$provider}_profile", true );

        if ( empty( $profile ) ) {
            return new \WP_Error( 'no_data', 'Brak danych z ' . ucfirst( $provider ) . '. Zaloguj się najpierw przez tego dostawcę.' );
        }

        // Map to CV data structure.
        return [
            'personal' => [
                'first_name' => $profile['first_name'] ?? '',
                'last_name'  => $profile['last_name'] ?? '',
                'email'      => $profile['email'] ?? '',
                'photo_url'  => $profile['photo_url'] ?? '',
            ],
        ];
    }
}
