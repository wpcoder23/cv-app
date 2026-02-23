<?php
/**
 * CV Builder Landing – Theme Functions
 */

defined( 'ABSPATH' ) || exit;

define( 'CVL_VERSION', '1.0.0' );
define( 'CVL_DIR', get_template_directory() );
define( 'CVL_URL', get_template_directory_uri() );

/**
 * Theme setup.
 */
add_action( 'after_setup_theme', function () {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
    add_theme_support( 'custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ] );

    register_nav_menus( [
        'primary' => 'Menu główne',
        'footer'  => 'Menu stopki',
    ] );
} );

/**
 * Enqueue styles and scripts.
 */
add_action( 'wp_enqueue_scripts', function () {
    // Google Fonts.
    wp_enqueue_style(
        'cvl-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap',
        [],
        null
    );

    // Main CSS.
    wp_enqueue_style( 'cvl-main', CVL_URL . '/assets/css/landing.css', [ 'cvl-fonts' ], CVL_VERSION );

    // Main JS.
    wp_enqueue_script( 'cvl-main', CVL_URL . '/assets/js/landing.js', [], CVL_VERSION, true );
} );

/**
 * Remove default WP stuff from head for cleaner output.
 */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );

/**
 * Custom page templates.
 */
add_filter( 'theme_page_templates', function ( $templates ) {
    $templates['templates/landing.php']        = 'Landing Page';
    $templates['templates/privacy-policy.php'] = 'Polityka prywatności';
    $templates['templates/terms.php']          = 'Regulamin';
    $templates['templates/app.php']            = 'CV Builder App';
    return $templates;
} );

/**
 * Disable comments globally.
 */
add_filter( 'comments_open', '__return_false' );
add_filter( 'pings_open', '__return_false' );

/**
 * Custom excerpt length.
 */
add_filter( 'excerpt_length', fn() => 20 );

/**
 * Get the CV Builder app page URL.
 */
function cvl_get_app_url(): string {
    $page = get_pages( [
        'meta_key'   => '_wp_page_template',
        'meta_value' => 'templates/app.php',
        'number'     => 1,
    ] );

    if ( ! empty( $page ) ) {
        return get_permalink( $page[0]->ID );
    }

    return home_url( '/stworz-cv/' );
}
