<?php
/**
 * Default template – redirects to landing page behavior.
 */
get_header();
?>

<div class="container" style="padding:4rem 1rem;text-align:center;">
    <h1>CV Builder</h1>
    <p>Stwórz profesjonalne CV w kilka minut.</p>
    <a href="<?php echo esc_url( cvl_get_app_url() ); ?>" class="btn btn--primary btn--lg">Stwórz CV</a>
</div>

<?php get_footer(); ?>
