<?php

namespace CvBuilder;

defined( 'ABSPATH' ) || exit;

/**
 * Main plugin orchestrator – singleton.
 */
final class Plugin {

    private static ?self $instance = null;

    public static function instance(): self {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        $this->init_hooks();
    }

    private function init_hooks(): void {
        // Load translations.
        add_action( 'init', [ $this, 'load_textdomain' ] );

        // Register REST routes.
        add_action( 'rest_api_init', [ new Rest\Routes(), 'register' ] );

        // Register shortcode for frontend page.
        add_shortcode( 'cv_builder', [ $this, 'render_app' ] );

        // Enqueue assets only when shortcode is present.
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );

        // Admin settings.
        if ( is_admin() ) {
            new Admin\Settings();
        }

        // Stripe webhook listener (early, before template redirect).
        add_action( 'init', [ Payments\Stripe::class, 'listen_webhook' ] );

        // Handle payment return redirect.
        add_action( 'template_redirect', [ Payments\Stripe::class, 'handle_return' ] );

        // Social auth callbacks.
        add_action( 'init', [ Auth\SocialAuth::class, 'handle_callback' ] );
    }

    public function load_textdomain(): void {
        load_plugin_textdomain( 'cv-builder', false, dirname( CVB_PLUGIN_BASENAME ) . '/languages' );
    }

    /**
     * Render the SPA-like frontend app via shortcode.
     */
    public function render_app(): string {
        ob_start();
        include CVB_PLUGIN_DIR . 'templates/app.php';
        return ob_get_clean();
    }

    /**
     * Enqueue CSS/JS on pages containing our shortcode.
     */
    public function enqueue_assets(): void {
        global $post;

        if ( ! is_a( $post, 'WP_Post' ) || ! has_shortcode( $post->post_content, 'cv_builder' ) ) {
            return;
        }

        // Tailwind + Flowbite compiled CSS.
        wp_enqueue_style(
            'cvb-app',
            CVB_PLUGIN_URL . 'assets/css/app.css',
            [],
            CVB_VERSION
        );

        // CV template styles.
        wp_enqueue_style(
            'cvb-templates',
            CVB_PLUGIN_URL . 'assets/css/templates.css',
            [ 'cvb-app' ],
            CVB_VERSION
        );

        // html2canvas for JPG/PNG export.
        wp_enqueue_script(
            'html2canvas',
            CVB_PLUGIN_URL . 'assets/js/vendor/html2canvas.min.js',
            [],
            '1.4.1',
            true
        );

        // jsPDF for PDF export.
        wp_enqueue_script(
            'jspdf',
            CVB_PLUGIN_URL . 'assets/js/vendor/jspdf.umd.min.js',
            [],
            '2.5.1',
            true
        );

        // Main app JS.
        wp_enqueue_script(
            'cvb-app',
            CVB_PLUGIN_URL . 'assets/js/app.js',
            [ 'html2canvas', 'jspdf' ],
            CVB_VERSION,
            true
        );

        // Localize data for JS.
        wp_localize_script( 'cvb-app', 'cvbData', [
            'restUrl'   => esc_url_raw( rest_url( 'cv-builder/v1/' ) ),
            'nonce'     => wp_create_nonce( 'wp_rest' ),
            'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
            'pluginUrl' => CVB_PLUGIN_URL,
            'isLoggedIn'=> is_user_logged_in(),
            'userId'    => get_current_user_id(),
            'price'     => self::get_price(),
            'currency'  => 'PLN',
            'i18n'      => [
                'saving'       => 'Zapisywanie...',
                'saved'        => 'Zapisano!',
                'error'        => 'Wystąpił błąd. Spróbuj ponownie.',
                'downloading'  => 'Generowanie pliku...',
                'noAccess'     => 'Kup dostęp, aby pobrać CV.',
                'paymentOk'    => 'Płatność zakończona sukcesem! Masz dostęp na 30 dni.',
                'accessExpired'=> 'Twój dostęp wygasł. Wykup ponownie, aby pobierać CV.',
            ],
        ] );
    }

    /**
     * Return the one-time price in PLN (grosz).
     */
    public static function get_price(): int {
        return (int) get_option( 'cvb_price', 2900 ); // 29.00 PLN default
    }

    /**
     * Return the price formatted for display.
     */
    public static function get_price_display(): string {
        $price = self::get_price();
        return number_format( $price / 100, 2, ',', ' ' ) . ' zł';
    }

    // ------------------------------------------------------------------
    // Activation / Deactivation
    // ------------------------------------------------------------------

    public static function activate(): void {
        // Create custom database table for CV data.
        global $wpdb;

        $charset = $wpdb->get_charset_collate();

        $sql_cv = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}cvb_cvs (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            user_id BIGINT UNSIGNED DEFAULT NULL,
            token VARCHAR(64) DEFAULT NULL,
            template_id VARCHAR(32) NOT NULL DEFAULT 'classic',
            data LONGTEXT NOT NULL,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            KEY user_id (user_id),
            KEY token (token)
        ) {$charset};";

        $sql_payments = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}cvb_payments (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            user_id BIGINT UNSIGNED DEFAULT NULL,
            email VARCHAR(255) NOT NULL,
            stripe_session_id VARCHAR(255) DEFAULT NULL,
            stripe_payment_intent VARCHAR(255) DEFAULT NULL,
            amount INT NOT NULL,
            currency VARCHAR(3) NOT NULL DEFAULT 'PLN',
            status VARCHAR(32) NOT NULL DEFAULT 'pending',
            access_expires_at DATETIME DEFAULT NULL,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            KEY user_id (user_id),
            KEY stripe_session_id (stripe_session_id),
            KEY email (email)
        ) {$charset};";

        $sql_tokens = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}cvb_tokens (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            token VARCHAR(64) NOT NULL,
            user_id BIGINT UNSIGNED DEFAULT NULL,
            email VARCHAR(255) DEFAULT NULL,
            expires_at DATETIME NOT NULL,
            used TINYINT(1) NOT NULL DEFAULT 0,
            created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            UNIQUE KEY token (token),
            KEY user_id (user_id)
        ) {$charset};";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta( $sql_cv );
        dbDelta( $sql_payments );
        dbDelta( $sql_tokens );

        // Default options.
        add_option( 'cvb_price', 2900 );
        add_option( 'cvb_access_days', 30 );
        add_option( 'cvb_stripe_mode', 'test' );

        // Flush rewrite rules for REST endpoints.
        flush_rewrite_rules();

        update_option( 'cvb_db_version', CVB_VERSION );
    }

    public static function deactivate(): void {
        flush_rewrite_rules();
    }
}
