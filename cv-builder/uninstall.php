<?php
/**
 * CV Builder – Uninstall script.
 * Removes all plugin data from the database.
 */

defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

global $wpdb;

// Drop custom tables.
$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}cvb_cvs" );
$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}cvb_payments" );
$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}cvb_tokens" );

// Remove options.
$options = [
    'cvb_price',
    'cvb_access_days',
    'cvb_stripe_mode',
    'cvb_stripe_test_publishable',
    'cvb_stripe_test_secret',
    'cvb_stripe_live_publishable',
    'cvb_stripe_live_secret',
    'cvb_stripe_webhook_secret',
    'cvb_google_client_id',
    'cvb_google_client_secret',
    'cvb_facebook_client_id',
    'cvb_facebook_client_secret',
    'cvb_linkedin_client_id',
    'cvb_linkedin_client_secret',
    'cvb_db_version',
];

foreach ( $options as $option ) {
    delete_option( $option );
}

// Remove user meta.
$wpdb->query( "DELETE FROM {$wpdb->usermeta} WHERE meta_key LIKE '_cvb_%'" );
