<?php

namespace CvBuilder\Admin;

use CvBuilder\Payments\Stripe;

defined( 'ABSPATH' ) || exit;

/**
 * Admin settings page for the CV Builder plugin.
 */
class Settings {

    public function __construct() {
        add_action( 'admin_menu', [ $this, 'add_menu' ] );
        add_action( 'admin_init', [ $this, 'register_settings' ] );
    }

    public function add_menu(): void {
        add_menu_page(
            'CV Builder',
            'CV Builder',
            'manage_options',
            'cv-builder',
            [ $this, 'render_page' ],
            'dashicons-id-alt',
            30
        );

        add_submenu_page(
            'cv-builder',
            'Ustawienia',
            'Ustawienia',
            'manage_options',
            'cv-builder',
            [ $this, 'render_page' ]
        );

        add_submenu_page(
            'cv-builder',
            'Płatności',
            'Płatności',
            'manage_options',
            'cv-builder-payments',
            [ $this, 'render_payments_page' ]
        );
    }

    public function register_settings(): void {
        // --- General ---
        register_setting( 'cvb_general', 'cvb_price', [
            'type'              => 'integer',
            'sanitize_callback' => 'absint',
            'default'           => 2900,
        ] );

        register_setting( 'cvb_general', 'cvb_access_days', [
            'type'              => 'integer',
            'sanitize_callback' => 'absint',
            'default'           => 30,
        ] );

        // --- Stripe ---
        $stripe_fields = [
            'cvb_stripe_mode',
            'cvb_stripe_test_publishable',
            'cvb_stripe_test_secret',
            'cvb_stripe_live_publishable',
            'cvb_stripe_live_secret',
            'cvb_stripe_webhook_secret',
        ];

        foreach ( $stripe_fields as $field ) {
            register_setting( 'cvb_stripe', $field, [
                'type'              => 'string',
                'sanitize_callback' => 'sanitize_text_field',
            ] );
        }

        // --- Social Auth ---
        $providers = [ 'google', 'facebook', 'linkedin' ];
        foreach ( $providers as $p ) {
            register_setting( 'cvb_social', "cvb_{$p}_client_id", [
                'type'              => 'string',
                'sanitize_callback' => 'sanitize_text_field',
            ] );
            register_setting( 'cvb_social', "cvb_{$p}_client_secret", [
                'type'              => 'string',
                'sanitize_callback' => 'sanitize_text_field',
            ] );
        }
    }

    public function render_page(): void {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        $active_tab = sanitize_text_field( $_GET['tab'] ?? 'general' );
        ?>
        <div class="wrap">
            <h1>CV Builder – Ustawienia</h1>

            <nav class="nav-tab-wrapper">
                <a href="?page=cv-builder&tab=general" class="nav-tab <?php echo 'general' === $active_tab ? 'nav-tab-active' : ''; ?>">Ogólne</a>
                <a href="?page=cv-builder&tab=stripe" class="nav-tab <?php echo 'stripe' === $active_tab ? 'nav-tab-active' : ''; ?>">Stripe</a>
                <a href="?page=cv-builder&tab=social" class="nav-tab <?php echo 'social' === $active_tab ? 'nav-tab-active' : ''; ?>">Logowanie społecznościowe</a>
                <a href="?page=cv-builder&tab=info" class="nav-tab <?php echo 'info' === $active_tab ? 'nav-tab-active' : ''; ?>">Informacje</a>
            </nav>

            <div class="cvb-settings-content" style="margin-top:20px;">
                <?php
                switch ( $active_tab ) {
                    case 'stripe':
                        $this->render_stripe_tab();
                        break;
                    case 'social':
                        $this->render_social_tab();
                        break;
                    case 'info':
                        $this->render_info_tab();
                        break;
                    default:
                        $this->render_general_tab();
                        break;
                }
                ?>
            </div>
        </div>
        <?php
    }

    private function render_general_tab(): void {
        ?>
        <form method="post" action="options.php">
            <?php settings_fields( 'cvb_general' ); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Cena (grosze)</th>
                    <td>
                        <input type="number" name="cvb_price" value="<?php echo esc_attr( get_option( 'cvb_price', 2900 ) ); ?>" min="100" step="100" />
                        <p class="description">Cena w groszach. 2900 = 29,00 zł. Aktualna cena: <strong><?php echo esc_html( \CvBuilder\Plugin::get_price_display() ); ?></strong></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Czas dostępu (dni)</th>
                    <td>
                        <input type="number" name="cvb_access_days" value="<?php echo esc_attr( get_option( 'cvb_access_days', 30 ) ); ?>" min="1" />
                        <p class="description">Ile dni dostępu po jednorazowej płatności.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button( 'Zapisz ustawienia' ); ?>
        </form>
        <?php
    }

    private function render_stripe_tab(): void {
        ?>
        <form method="post" action="options.php">
            <?php settings_fields( 'cvb_stripe' ); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Tryb</th>
                    <td>
                        <select name="cvb_stripe_mode">
                            <option value="test" <?php selected( get_option( 'cvb_stripe_mode' ), 'test' ); ?>>Testowy</option>
                            <option value="live" <?php selected( get_option( 'cvb_stripe_mode' ), 'live' ); ?>>Produkcyjny</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Test – Publishable Key</th>
                    <td><input type="text" name="cvb_stripe_test_publishable" value="<?php echo esc_attr( get_option( 'cvb_stripe_test_publishable' ) ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row">Test – Secret Key</th>
                    <td><input type="password" name="cvb_stripe_test_secret" value="<?php echo esc_attr( get_option( 'cvb_stripe_test_secret' ) ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row">Live – Publishable Key</th>
                    <td><input type="text" name="cvb_stripe_live_publishable" value="<?php echo esc_attr( get_option( 'cvb_stripe_live_publishable' ) ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row">Live – Secret Key</th>
                    <td><input type="password" name="cvb_stripe_live_secret" value="<?php echo esc_attr( get_option( 'cvb_stripe_live_secret' ) ); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                    <th scope="row">Webhook Signing Secret</th>
                    <td>
                        <input type="password" name="cvb_stripe_webhook_secret" value="<?php echo esc_attr( get_option( 'cvb_stripe_webhook_secret' ) ); ?>" class="regular-text" />
                        <p class="description">Webhook URL: <code><?php echo esc_html( Stripe::get_webhook_url() ); ?></code></p>
                    </td>
                </tr>
            </table>
            <?php submit_button( 'Zapisz Stripe' ); ?>
        </form>
        <?php
    }

    private function render_social_tab(): void {
        $providers = [
            'google'   => 'Google',
            'facebook' => 'Facebook',
            'linkedin' => 'LinkedIn',
        ];
        ?>
        <form method="post" action="options.php">
            <?php settings_fields( 'cvb_social' ); ?>
            <?php foreach ( $providers as $key => $label ) : ?>
                <h2><?php echo esc_html( $label ); ?></h2>
                <table class="form-table">
                    <tr>
                        <th scope="row">Client ID</th>
                        <td><input type="text" name="cvb_<?php echo esc_attr( $key ); ?>_client_id" value="<?php echo esc_attr( get_option( "cvb_{$key}_client_id" ) ); ?>" class="regular-text" /></td>
                    </tr>
                    <tr>
                        <th scope="row">Client Secret</th>
                        <td><input type="password" name="cvb_<?php echo esc_attr( $key ); ?>_client_secret" value="<?php echo esc_attr( get_option( "cvb_{$key}_client_secret" ) ); ?>" class="regular-text" /></td>
                    </tr>
                    <tr>
                        <th scope="row">Redirect URI</th>
                        <td><code><?php echo esc_html( home_url( '/?cvb_auth_callback=' . $key ) ); ?></code></td>
                    </tr>
                </table>
            <?php endforeach; ?>
            <?php submit_button( 'Zapisz Social Auth' ); ?>
        </form>
        <?php
    }

    private function render_info_tab(): void {
        global $wpdb;

        $total_cvs      = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$wpdb->prefix}cvb_cvs" );
        $total_payments  = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$wpdb->prefix}cvb_payments WHERE status = 'completed'" );
        $active_users    = (int) $wpdb->get_var(
            $wpdb->prepare(
                "SELECT COUNT(*) FROM {$wpdb->usermeta} WHERE meta_key = '_cvb_access_expires_at' AND meta_value > %s",
                gmdate( 'Y-m-d H:i:s' )
            )
        );
        ?>
        <div class="card" style="max-width:600px;padding:20px;">
            <h2>Statystyki</h2>
            <table class="widefat striped" style="max-width:400px;">
                <tr><td>Wszystkie CV</td><td><strong><?php echo esc_html( $total_cvs ); ?></strong></td></tr>
                <tr><td>Opłacone zamówienia</td><td><strong><?php echo esc_html( $total_payments ); ?></strong></td></tr>
                <tr><td>Aktywni użytkownicy</td><td><strong><?php echo esc_html( $active_users ); ?></strong></td></tr>
                <tr><td>Cena</td><td><strong><?php echo esc_html( \CvBuilder\Plugin::get_price_display() ); ?></strong></td></tr>
            </table>

            <h2 style="margin-top:20px;">Wersja pluginu</h2>
            <p><strong><?php echo esc_html( CVB_VERSION ); ?></strong></p>

            <h2>Shortcode</h2>
            <p>Dodaj na stronę: <code>[cv_builder]</code></p>

            <h2>Webhook URL (Stripe)</h2>
            <p><code><?php echo esc_html( Stripe::get_webhook_url() ); ?></code></p>
        </div>
        <?php
    }

    public function render_payments_page(): void {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        global $wpdb;

        $page     = max( 1, absint( $_GET['paged'] ?? 1 ) );
        $per_page = 20;
        $offset   = ( $page - 1 ) * $per_page;

        $total = (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$wpdb->prefix}cvb_payments" );
        $rows  = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT p.*, u.user_email as wp_email
                 FROM {$wpdb->prefix}cvb_payments p
                 LEFT JOIN {$wpdb->users} u ON p.user_id = u.ID
                 ORDER BY p.created_at DESC
                 LIMIT %d OFFSET %d",
                $per_page,
                $offset
            )
        );
        ?>
        <div class="wrap">
            <h1>CV Builder – Płatności</h1>
            <table class="widefat striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Kwota</th>
                        <th>Status</th>
                        <th>Dostęp do</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ( empty( $rows ) ) : ?>
                        <tr><td colspan="6">Brak płatności.</td></tr>
                    <?php else : ?>
                        <?php foreach ( $rows as $row ) : ?>
                            <tr>
                                <td><?php echo esc_html( $row->id ); ?></td>
                                <td><?php echo esc_html( $row->email ); ?></td>
                                <td><?php echo esc_html( number_format( $row->amount / 100, 2, ',', ' ' ) . ' ' . $row->currency ); ?></td>
                                <td>
                                    <span style="color:<?php echo 'completed' === $row->status ? 'green' : ( 'pending' === $row->status ? 'orange' : 'red' ); ?>">
                                        <?php echo esc_html( ucfirst( $row->status ) ); ?>
                                    </span>
                                </td>
                                <td><?php echo esc_html( $row->access_expires_at ?? '–' ); ?></td>
                                <td><?php echo esc_html( $row->created_at ); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

            <?php if ( $total > $per_page ) : ?>
                <div class="tablenav bottom">
                    <div class="tablenav-pages">
                        <?php
                        echo wp_kses_post( paginate_links( [
                            'base'    => add_query_arg( 'paged', '%#%' ),
                            'format'  => '',
                            'current' => $page,
                            'total'   => ceil( $total / $per_page ),
                        ] ) );
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
}
