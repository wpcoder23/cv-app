<?php

namespace CvBuilder\CV;

defined( 'ABSPATH' ) || exit;

/**
 * CV data management and template rendering.
 */
class Generator {

    /**
     * Available CV templates.
     */
    public const TEMPLATES = [
        'classic'      => 'Klasyczny',
        'modern'       => 'Nowoczesny',
        'creative'     => 'Kreatywny',
        'minimal'      => 'Minimalistyczny',
        'professional' => 'Profesjonalny',
        'executive'    => 'Elegancki',
        'tech'         => 'Techniczny',
        'academic'     => 'Akademicki',
        'bold'         => 'Odważny',
        'nordic'       => 'Skandynawski',
    ];

    /**
     * Default empty CV data structure.
     */
    public static function default_data(): array {
        return [
            'personal' => [
                'first_name'    => '',
                'last_name'     => '',
                'email'         => '',
                'phone'         => '',
                'date_of_birth' => '',
                'address'       => '',
                'photo_url'     => '',
                'job_title'     => '',
                'summary'       => '',
                'linkedin'      => '',
                'website'       => '',
            ],
            'experience' => [],
            'education'  => [],
            'skills'     => [
                'hard'      => [],
                'soft'      => [],
                'languages' => [],
            ],
            'interests'  => [],
            'rodo'       => true,
        ];
    }

    /**
     * Sanitize and validate CV data.
     */
    public static function sanitize_data( array $raw ): array {
        $data = self::default_data();

        // Personal.
        if ( isset( $raw['personal'] ) && is_array( $raw['personal'] ) ) {
            $p = $raw['personal'];
            $data['personal'] = [
                'first_name'    => sanitize_text_field( $p['first_name'] ?? '' ),
                'last_name'     => sanitize_text_field( $p['last_name'] ?? '' ),
                'email'         => sanitize_email( $p['email'] ?? '' ),
                'phone'         => sanitize_text_field( $p['phone'] ?? '' ),
                'date_of_birth' => sanitize_text_field( $p['date_of_birth'] ?? '' ),
                'address'       => sanitize_text_field( $p['address'] ?? '' ),
                'photo_url'     => esc_url_raw( $p['photo_url'] ?? '' ),
                'job_title'     => sanitize_text_field( $p['job_title'] ?? '' ),
                'summary'       => sanitize_textarea_field( $p['summary'] ?? '' ),
                'linkedin'      => esc_url_raw( $p['linkedin'] ?? '' ),
                'website'       => esc_url_raw( $p['website'] ?? '' ),
            ];
        }

        // Experience.
        if ( isset( $raw['experience'] ) && is_array( $raw['experience'] ) ) {
            foreach ( $raw['experience'] as $exp ) {
                if ( ! is_array( $exp ) ) {
                    continue;
                }
                $data['experience'][] = [
                    'company'     => sanitize_text_field( $exp['company'] ?? '' ),
                    'position'    => sanitize_text_field( $exp['position'] ?? '' ),
                    'start_date'  => sanitize_text_field( $exp['start_date'] ?? '' ),
                    'end_date'    => sanitize_text_field( $exp['end_date'] ?? '' ),
                    'current'     => (bool) ( $exp['current'] ?? false ),
                    'description' => sanitize_textarea_field( $exp['description'] ?? '' ),
                ];
            }
        }

        // Education.
        if ( isset( $raw['education'] ) && is_array( $raw['education'] ) ) {
            foreach ( $raw['education'] as $edu ) {
                if ( ! is_array( $edu ) ) {
                    continue;
                }
                $data['education'][] = [
                    'school'     => sanitize_text_field( $edu['school'] ?? '' ),
                    'degree'     => sanitize_text_field( $edu['degree'] ?? '' ),
                    'field'      => sanitize_text_field( $edu['field'] ?? '' ),
                    'start_date' => sanitize_text_field( $edu['start_date'] ?? '' ),
                    'end_date'   => sanitize_text_field( $edu['end_date'] ?? '' ),
                ];
            }
        }

        // Skills.
        if ( isset( $raw['skills'] ) && is_array( $raw['skills'] ) ) {
            $s = $raw['skills'];
            $data['skills'] = [
                'hard'      => array_map( 'sanitize_text_field', (array) ( $s['hard'] ?? [] ) ),
                'soft'      => array_map( 'sanitize_text_field', (array) ( $s['soft'] ?? [] ) ),
                'languages' => [],
            ];

            if ( isset( $s['languages'] ) && is_array( $s['languages'] ) ) {
                foreach ( $s['languages'] as $lang ) {
                    if ( ! is_array( $lang ) ) {
                        continue;
                    }
                    $data['skills']['languages'][] = [
                        'name'  => sanitize_text_field( $lang['name'] ?? '' ),
                        'level' => sanitize_text_field( $lang['level'] ?? '' ),
                    ];
                }
            }
        }

        // Interests.
        if ( isset( $raw['interests'] ) && is_array( $raw['interests'] ) ) {
            $data['interests'] = array_map( 'sanitize_text_field', $raw['interests'] );
        }

        // RODO.
        $data['rodo'] = (bool) ( $raw['rodo'] ?? true );

        return $data;
    }

    // ------------------------------------------------------------------
    // CRUD operations
    // ------------------------------------------------------------------

    /**
     * Save CV (create or update).
     */
    public static function save( array $data, string $template_id, ?int $user_id = null, ?string $token = null, ?int $cv_id = null ): int {
        global $wpdb;

        $table    = $wpdb->prefix . 'cvb_cvs';
        $data_json = wp_json_encode( self::sanitize_data( $data ), JSON_UNESCAPED_UNICODE );

        if ( ! isset( self::TEMPLATES[ $template_id ] ) ) {
            $template_id = 'classic';
        }

        if ( $cv_id ) {
            // Update existing.
            $wpdb->update(
                $table,
                [
                    'data'        => $data_json,
                    'template_id' => $template_id,
                ],
                [ 'id' => $cv_id ],
                [ '%s', '%s' ],
                [ '%d' ]
            );
            return $cv_id;
        }

        // Create new.
        $wpdb->insert(
            $table,
            [
                'user_id'     => $user_id ?: null,
                'token'       => $token ?: null,
                'template_id' => $template_id,
                'data'        => $data_json,
            ],
            [ '%d', '%s', '%s', '%s' ]
        );

        return (int) $wpdb->insert_id;
    }

    /**
     * Get CV by ID (with ownership check).
     */
    public static function get( int $cv_id, ?int $user_id = null, ?string $token = null ): ?array {
        global $wpdb;

        $row = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM {$wpdb->prefix}cvb_cvs WHERE id = %d LIMIT 1",
                $cv_id
            ),
            ARRAY_A
        );

        if ( ! $row ) {
            return null;
        }

        // Ownership check.
        if ( $user_id && (int) $row['user_id'] === $user_id ) {
            $row['data'] = json_decode( $row['data'], true );
            return $row;
        }

        if ( $token && $row['token'] === $token ) {
            $row['data'] = json_decode( $row['data'], true );
            return $row;
        }

        return null;
    }

    /**
     * Get all CVs for a user.
     */
    public static function get_user_cvs( int $user_id ): array {
        global $wpdb;

        $rows = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT id, template_id, data, created_at, updated_at FROM {$wpdb->prefix}cvb_cvs WHERE user_id = %d ORDER BY updated_at DESC",
                $user_id
            ),
            ARRAY_A
        );

        foreach ( $rows as &$row ) {
            $row['data'] = json_decode( $row['data'], true );
        }

        return $rows;
    }

    /**
     * Get CV by anonymous token.
     */
    public static function get_by_token( string $token ): ?array {
        global $wpdb;

        $row = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM {$wpdb->prefix}cvb_cvs WHERE token = %s ORDER BY updated_at DESC LIMIT 1",
                $token
            ),
            ARRAY_A
        );

        if ( $row ) {
            $row['data'] = json_decode( $row['data'], true );
        }

        return $row;
    }

    /**
     * Delete a CV.
     */
    public static function delete( int $cv_id, int $user_id ): bool {
        global $wpdb;

        $deleted = $wpdb->delete(
            $wpdb->prefix . 'cvb_cvs',
            [
                'id'      => $cv_id,
                'user_id' => $user_id,
            ],
            [ '%d', '%d' ]
        );

        return $deleted > 0;
    }

    // ------------------------------------------------------------------
    // Template rendering
    // ------------------------------------------------------------------

    /**
     * Render CV HTML for a given template.
     */
    public static function render( array $cv_data, string $template_id ): string {
        if ( ! isset( self::TEMPLATES[ $template_id ] ) ) {
            $template_id = 'classic';
        }

        $template_file = CVB_PLUGIN_DIR . 'templates/cv/' . $template_id . '.php';
        if ( ! file_exists( $template_file ) ) {
            $template_file = CVB_PLUGIN_DIR . 'templates/cv/classic.php';
        }

        $data = $cv_data;
        ob_start();
        include $template_file;
        return ob_get_clean();
    }
}
