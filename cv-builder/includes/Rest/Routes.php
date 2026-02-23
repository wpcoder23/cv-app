<?php

namespace CvBuilder\Rest;

use CvBuilder\Access\AccessManager;
use CvBuilder\CV\Generator;
use CvBuilder\Payments\Stripe;

defined( 'ABSPATH' ) || exit;

/**
 * REST API routes for the CV Builder.
 */
class Routes {

    private const NAMESPACE = 'cv-builder/v1';

    /**
     * Register all routes.
     */
    public function register(): void {
        // --- CV endpoints ---

        register_rest_route( self::NAMESPACE, '/cv', [
            'methods'             => 'POST',
            'callback'            => [ $this, 'save_cv' ],
            'permission_callback' => [ $this, 'allow_authenticated_or_token' ],
        ] );

        register_rest_route( self::NAMESPACE, '/cv/(?P<id>\d+)', [
            'methods'             => 'GET',
            'callback'            => [ $this, 'get_cv' ],
            'permission_callback' => [ $this, 'allow_authenticated_or_token' ],
            'args'                => [
                'id' => [
                    'validate_callback' => fn( $v ) => is_numeric( $v ) && $v > 0,
                    'sanitize_callback' => 'absint',
                ],
            ],
        ] );

        register_rest_route( self::NAMESPACE, '/cv/(?P<id>\d+)', [
            'methods'             => 'DELETE',
            'callback'            => [ $this, 'delete_cv' ],
            'permission_callback' => [ $this, 'require_login' ],
        ] );

        register_rest_route( self::NAMESPACE, '/cvs', [
            'methods'             => 'GET',
            'callback'            => [ $this, 'list_cvs' ],
            'permission_callback' => [ $this, 'require_login' ],
        ] );

        register_rest_route( self::NAMESPACE, '/cv/render', [
            'methods'             => 'POST',
            'callback'            => [ $this, 'render_cv' ],
            'permission_callback' => [ $this, 'allow_authenticated_or_token' ],
        ] );

        // --- Access endpoints ---

        register_rest_route( self::NAMESPACE, '/access/status', [
            'methods'             => 'GET',
            'callback'            => [ $this, 'access_status' ],
            'permission_callback' => [ $this, 'allow_anyone' ],
        ] );

        // --- Token endpoint ---

        register_rest_route( self::NAMESPACE, '/token', [
            'methods'             => 'POST',
            'callback'            => [ $this, 'generate_token' ],
            'permission_callback' => [ $this, 'allow_anyone' ],
        ] );

        // --- Payment endpoint ---

        register_rest_route( self::NAMESPACE, '/payment/create', [
            'methods'             => 'POST',
            'callback'            => [ $this, 'create_payment' ],
            'permission_callback' => [ $this, 'allow_authenticated_or_token' ],
        ] );

        // --- Templates endpoint ---

        register_rest_route( self::NAMESPACE, '/templates', [
            'methods'             => 'GET',
            'callback'            => [ $this, 'list_templates' ],
            'permission_callback' => [ $this, 'allow_anyone' ],
        ] );

        // --- Social auth init ---

        register_rest_route( self::NAMESPACE, '/auth/(?P<provider>google|facebook|linkedin)', [
            'methods'             => 'GET',
            'callback'            => [ $this, 'social_auth_redirect' ],
            'permission_callback' => [ $this, 'allow_anyone' ],
        ] );

        // --- Import data from social profile ---

        register_rest_route( self::NAMESPACE, '/import/(?P<provider>google|linkedin|facebook)', [
            'methods'             => 'GET',
            'callback'            => [ $this, 'import_social_data' ],
            'permission_callback' => [ $this, 'require_login' ],
        ] );
    }

    // ==================================================================
    // Permission callbacks
    // ==================================================================

    public function allow_anyone(): bool {
        return true;
    }

    public function require_login(): bool {
        return is_user_logged_in();
    }

    public function allow_authenticated_or_token( \WP_REST_Request $request ): bool {
        if ( is_user_logged_in() ) {
            return true;
        }

        $token = $request->get_header( 'X-Cvb-Token' );
        if ( $token && AccessManager::validate_token( $token ) ) {
            return true;
        }

        return false;
    }

    // ==================================================================
    // CV callbacks
    // ==================================================================

    /**
     * Save (create or update) a CV.
     */
    public function save_cv( \WP_REST_Request $request ): \WP_REST_Response {
        $data        = $request->get_json_params();
        $cv_data     = $data['data'] ?? [];
        $template_id = sanitize_text_field( $data['template_id'] ?? 'classic' );
        $cv_id       = absint( $data['cv_id'] ?? 0 );
        $token       = $request->get_header( 'X-Cvb-Token' );
        $user_id     = get_current_user_id();

        if ( empty( $cv_data ) ) {
            return new \WP_REST_Response( [ 'error' => 'Brak danych CV.' ], 400 );
        }

        // Ownership check for existing CV.
        if ( $cv_id ) {
            $existing = Generator::get( $cv_id, $user_id ?: null, $token ?: null );
            if ( ! $existing ) {
                return new \WP_REST_Response( [ 'error' => 'Nie znaleziono CV.' ], 404 );
            }
        }

        $saved_id = Generator::save(
            $cv_data,
            $template_id,
            $user_id ?: null,
            $token ?: null,
            $cv_id ?: null
        );

        return new \WP_REST_Response( [
            'cv_id'   => $saved_id,
            'message' => 'CV zapisane.',
        ], $cv_id ? 200 : 201 );
    }

    /**
     * Get a single CV by ID.
     */
    public function get_cv( \WP_REST_Request $request ): \WP_REST_Response {
        $cv_id   = (int) $request->get_param( 'id' );
        $user_id = get_current_user_id();
        $token   = $request->get_header( 'X-Cvb-Token' );

        $cv = Generator::get( $cv_id, $user_id ?: null, $token ?: null );

        if ( ! $cv ) {
            return new \WP_REST_Response( [ 'error' => 'Nie znaleziono CV.' ], 404 );
        }

        // Strip sensitive fields.
        unset( $cv['user_id'], $cv['token'] );

        return new \WP_REST_Response( $cv );
    }

    /**
     * Delete a CV.
     */
    public function delete_cv( \WP_REST_Request $request ): \WP_REST_Response {
        $cv_id   = (int) $request->get_param( 'id' );
        $user_id = get_current_user_id();

        if ( ! Generator::delete( $cv_id, $user_id ) ) {
            return new \WP_REST_Response( [ 'error' => 'Nie można usunąć CV.' ], 404 );
        }

        return new \WP_REST_Response( [ 'message' => 'CV usunięte.' ] );
    }

    /**
     * List user's CVs.
     */
    public function list_cvs( \WP_REST_Request $request ): \WP_REST_Response {
        $user_id = get_current_user_id();
        $cvs     = Generator::get_user_cvs( $user_id );

        // Strip data from list view (only meta).
        $items = array_map( function ( $cv ) {
            $personal = $cv['data']['personal'] ?? [];
            return [
                'id'          => (int) $cv['id'],
                'template_id' => $cv['template_id'],
                'name'        => trim( ( $personal['first_name'] ?? '' ) . ' ' . ( $personal['last_name'] ?? '' ) ),
                'job_title'   => $personal['job_title'] ?? '',
                'updated_at'  => $cv['updated_at'],
            ];
        }, $cvs );

        return new \WP_REST_Response( $items );
    }

    /**
     * Render CV preview HTML.
     */
    public function render_cv( \WP_REST_Request $request ): \WP_REST_Response {
        $data        = $request->get_json_params();
        $cv_data     = $data['data'] ?? [];
        $template_id = sanitize_text_field( $data['template_id'] ?? 'classic' );

        if ( empty( $cv_data ) ) {
            return new \WP_REST_Response( [ 'error' => 'Brak danych CV.' ], 400 );
        }

        $sanitized = Generator::sanitize_data( $cv_data );
        $html      = Generator::render( $sanitized, $template_id );

        return new \WP_REST_Response( [ 'html' => $html ] );
    }

    // ==================================================================
    // Access callbacks
    // ==================================================================

    /**
     * Check access status for current user.
     */
    public function access_status( \WP_REST_Request $request ): \WP_REST_Response {
        $user_id = get_current_user_id();

        if ( ! $user_id ) {
            return new \WP_REST_Response( [
                'has_access'     => false,
                'is_logged_in'   => false,
                'remaining_time' => null,
                'expires_at'     => null,
            ] );
        }

        $has_access = AccessManager::has_active_access( $user_id );

        return new \WP_REST_Response( [
            'has_access'     => $has_access,
            'is_logged_in'   => true,
            'remaining_time' => $has_access ? AccessManager::get_remaining_time( $user_id ) : null,
            'expires_at'     => AccessManager::get_expiry( $user_id ),
        ] );
    }

    // ==================================================================
    // Token callbacks
    // ==================================================================

    /**
     * Generate anonymous session token.
     */
    public function generate_token( \WP_REST_Request $request ): \WP_REST_Response {
        $token = AccessManager::generate_token();

        return new \WP_REST_Response( [
            'token' => $token,
        ], 201 );
    }

    // ==================================================================
    // Payment callbacks
    // ==================================================================

    /**
     * Create Stripe Checkout session.
     */
    public function create_payment( \WP_REST_Request $request ): \WP_REST_Response {
        $data  = $request->get_json_params();
        $email = sanitize_email( $data['email'] ?? '' );
        $token = $request->get_header( 'X-Cvb-Token' ) ?? '';
        $cv_id = absint( $data['cv_id'] ?? 0 );

        if ( empty( $email ) || ! is_email( $email ) ) {
            return new \WP_REST_Response( [ 'error' => 'Podaj prawidłowy adres e-mail.' ], 400 );
        }

        // Use logged-in user's email if available.
        if ( is_user_logged_in() ) {
            $user  = wp_get_current_user();
            $email = $user->user_email;
        }

        $result = Stripe::create_checkout_session( $email, $token, $cv_id );

        if ( is_wp_error( $result ) ) {
            return new \WP_REST_Response( [
                'error' => $result->get_error_message(),
            ], $result->get_error_data()['status'] ?? 500 );
        }

        return new \WP_REST_Response( [
            'checkout_url' => $result['url'],
        ] );
    }

    // ==================================================================
    // Templates
    // ==================================================================

    /**
     * List available templates.
     */
    public function list_templates( \WP_REST_Request $request ): \WP_REST_Response {
        $templates = [];

        foreach ( Generator::TEMPLATES as $id => $name ) {
            $templates[] = [
                'id'        => $id,
                'name'      => $name,
                'thumbnail' => CVB_PLUGIN_URL . 'assets/images/templates/' . $id . '.jpg',
            ];
        }

        return new \WP_REST_Response( $templates );
    }

    // ==================================================================
    // Social Auth
    // ==================================================================

    /**
     * Redirect to social auth provider.
     */
    public function social_auth_redirect( \WP_REST_Request $request ): \WP_REST_Response {
        $provider = $request->get_param( 'provider' );

        $auth = new \CvBuilder\Auth\SocialAuth();
        $url  = $auth->get_auth_url( $provider );

        if ( ! $url ) {
            return new \WP_REST_Response( [ 'error' => 'Dostawca logowania nie jest skonfigurowany.' ], 400 );
        }

        return new \WP_REST_Response( [ 'redirect_url' => $url ] );
    }

    /**
     * Import data from social profile into CV.
     */
    public function import_social_data( \WP_REST_Request $request ): \WP_REST_Response {
        $provider = $request->get_param( 'provider' );
        $user_id  = get_current_user_id();

        $auth = new \CvBuilder\Auth\SocialAuth();
        $data = $auth->get_profile_data( $provider, $user_id );

        if ( is_wp_error( $data ) ) {
            return new \WP_REST_Response( [
                'error' => $data->get_error_message(),
            ], 400 );
        }

        return new \WP_REST_Response( [
            'data' => $data,
        ] );
    }
}
