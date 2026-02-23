<?php
/**
 * Template Name: CV Builder App
 * Displays the CV Builder shortcode in a clean, full-width layout.
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="app-page">
    <div class="container container--wide">
        <?php echo do_shortcode( '[cv_builder]' ); ?>
    </div>
</div>

<?php get_footer(); ?>
