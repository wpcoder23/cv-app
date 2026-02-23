<?php

namespace CvBuilder\Access;

defined( 'ABSPATH' ) || exit;

/**
 * Manages user access (30-day time-limited) and anonymous tokens.
 */
class AccessManager {

    /**
     * Check if a user has active (paid) access.
     */
    public static function has_active_access( int $user_id ): bool {
        if ( $user_id <= 0 ) {
            return false;
        }

        $expires = get_user_meta( $user_id, '_cvb_access_expires_at', true );

        if ( empty( $expires ) ) {
            return false;
        }

        return strtotime( $expires ) > time();
    }

    /**
     * Grant access for N days (default 30).
     */
    public static function grant_access( int $user_id, ?int $days = null ): void {
        if ( $user_id <= 0 ) {
            return;
        }

        $days    = $days ?? (int) get_option( 'cvb_access_days', 30 );
        $expires = gmdate( 'Y-m-d H:i:s', time() + ( $days * DAY_IN_SECONDS ) );

        update_user_meta( $user_id, '_cvb_access_expires_at', $expires );
    }

    /**
     * Get remaining access time as a human-readable string.
     */
    public static function get_remaining_time( int $user_id ): string {
        $expires = get_user_meta( $user_id, '_cvb_access_expires_at', true );

        if ( empty( $expires ) ) {
            return 'Brak dostępu';
        }

        $diff = strtotime( $expires ) - time();

        if ( $diff <= 0 ) {
            return 'Dostęp wygasł';
        }

        $days  = floor( $diff / DAY_IN_SECONDS );
        $hours = floor( ( $diff % DAY_IN_SECONDS ) / HOUR_IN_SECONDS );

        if ( $days > 0 ) {
            return sprintf( '%d dni, %d godz.', $days, $hours );
        }

        return sprintf( '%d godz.', $hours );
    }

    /**
     * Get expiry timestamp for a user.
     */
    public static function get_expiry( int $user_id ): ?string {
        $expires = get_user_meta( $user_id, '_cvb_access_expires_at', true );
        return $expires ?: null;
    }

    // ------------------------------------------------------------------
    // Anonymous token management
    // ------------------------------------------------------------------

    /**
     * Generate a secure random token for anonymous CV editing.
     */
    public static function generate_token( ?string $email = null, int $ttl_hours = 24 ): string {
        global $wpdb;

        $token   = bin2hex( random_bytes( 32 ) );
        $expires = gmdate( 'Y-m-d H:i:s', time() + ( $ttl_hours * HOUR_IN_SECONDS ) );

        $wpdb->insert(
            $wpdb->prefix . 'cvb_tokens',
            [
                'token'      => $token,
                'email'      => $email ? sanitize_email( $email ) : null,
                'expires_at' => $expires,
            ],
            [ '%s', '%s', '%s' ]
        );

        return $token;
    }

    /**
     * Validate a token – must exist, not expired, not used.
     */
    public static function validate_token( string $token ): bool {
        global $wpdb;

        if ( strlen( $token ) !== 64 ) {
            return false;
        }

        $row = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM {$wpdb->prefix}cvb_tokens WHERE token = %s AND used = 0 AND expires_at > %s LIMIT 1",
                $token,
                gmdate( 'Y-m-d H:i:s' )
            )
        );

        return null !== $row;
    }

    /**
     * Bind a token to a user (after payment/registration).
     */
    public static function bind_token_to_user( string $token, int $user_id ): void {
        global $wpdb;

        $wpdb->update(
            $wpdb->prefix . 'cvb_tokens',
            [ 'user_id' => $user_id, 'used' => 1 ],
            [ 'token' => $token ],
            [ '%d', '%d' ],
            [ '%s' ]
        );
    }

    /**
     * Migrate anonymous CV data to a newly created/authenticated user.
     */
    public static function migrate_cv_to_user( string $token, int $user_id ): void {
        global $wpdb;

        $wpdb->update(
            $wpdb->prefix . 'cvb_cvs',
            [ 'user_id' => $user_id, 'token' => null ],
            [ 'token' => $token ],
            [ '%d', '%s' ],
            [ '%s' ]
        );

        self::bind_token_to_user( $token, $user_id );
    }

    /**
     * Create a WordPress user from email (auto-registration after payment).
     */
    public static function find_or_create_user( string $email ): int {
        $email = sanitize_email( $email );

        $user = get_user_by( 'email', $email );
        if ( $user ) {
            return $user->ID;
        }

        $username = self::generate_username( $email );
        $password = wp_generate_password( 16, true, true );

        $user_id = wp_insert_user( [
            'user_login' => $username,
            'user_email' => $email,
            'user_pass'  => $password,
            'role'       => 'subscriber',
        ] );

        if ( is_wp_error( $user_id ) ) {
            return 0;
        }

        // Send credentials to user.
        wp_new_user_notification( $user_id, null, 'user' );

        return $user_id;
    }

    /**
     * Generate a unique username from email.
     */
    private static function generate_username( string $email ): string {
        $base = sanitize_user( explode( '@', $email )[0], true );

        if ( ! username_exists( $base ) ) {
            return $base;
        }

        $i = 1;
        while ( username_exists( $base . $i ) ) {
            $i++;
        }

        return $base . $i;
    }

    /**
     * Invalidate all tokens for a user (called after payment success).
     */
    public static function invalidate_user_tokens( int $user_id ): void {
        global $wpdb;

        $wpdb->update(
            $wpdb->prefix . 'cvb_tokens',
            [ 'used' => 1 ],
            [ 'user_id' => $user_id ],
            [ '%d' ],
            [ '%d' ]
        );
    }

    /**
     * Cleanup expired tokens (cron-safe).
     */
    public static function cleanup_expired_tokens(): void {
        global $wpdb;

        $wpdb->query(
            $wpdb->prepare(
                "DELETE FROM {$wpdb->prefix}cvb_tokens WHERE expires_at < %s",
                gmdate( 'Y-m-d H:i:s' )
            )
        );
    }
}
