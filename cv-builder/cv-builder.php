<?php
/**
 * Plugin Name: CV Builder
 * Plugin URI: https://github.com/wpcoder23/cv-app
 * Description: Professional CV Builder SaaS – create, edit and export CVs with 10 templates. One-time payment via Stripe (BLIK).
 * Version: 1.0.0
 * Requires at least: 6.0
 * Requires PHP: 8.0
 * Author: wpcoder23
 * Author URI: https://github.com/wpcoder23
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: cv-builder
 * Domain Path: /languages
 */

defined( 'ABSPATH' ) || exit;

// Plugin constants.
define( 'CVB_VERSION', '1.0.0' );
define( 'CVB_PLUGIN_FILE', __FILE__ );
define( 'CVB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'CVB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CVB_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

// Autoloader.
spl_autoload_register( function ( string $class ) {
    $prefix = 'CvBuilder\\';
    if ( strncmp( $class, $prefix, strlen( $prefix ) ) !== 0 ) {
        return;
    }

    $relative = substr( $class, strlen( $prefix ) );
    $file     = CVB_PLUGIN_DIR . 'includes/' . str_replace( '\\', '/', $relative ) . '.php';

    if ( file_exists( $file ) ) {
        require_once $file;
    }
} );

// Boot plugin.
add_action( 'plugins_loaded', function () {
    \CvBuilder\Plugin::instance();
} );

// Activation hook.
register_activation_hook( __FILE__, function () {
    \CvBuilder\Plugin::activate();
} );

// Deactivation hook.
register_deactivation_hook( __FILE__, function () {
    \CvBuilder\Plugin::deactivate();
} );
