<?php
// Silence is golden, or a basic loop.

get_header(); ?>

<main id="primary" class="site-main">

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>

<?php else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'ecabs-theme' ); ?></p>
<?php endif; ?>

</main>

<?php get_footer();
