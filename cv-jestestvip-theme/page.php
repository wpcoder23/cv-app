<?php
/**
 * Default page template.
 */
get_header();
?>

<article class="page-content">
    <div class="container container--narrow">
        <?php while ( have_posts() ) : the_post(); ?>
            <h1 class="page-content__title"><?php the_title(); ?></h1>
            <div class="page-content__body prose">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </div>
</article>

<?php get_footer(); ?>
