<?php
/** Template Name: Landing Page (Legacy) */
get_header(); ?>
<main id="primary" class="site-main landing-page"><article <?php post_class( 'landing-content' ); ?>><?php while ( have_posts() ) : the_post(); ?><div class="entry-content"><?php the_content(); wp_link_pages(); ?></div><?php endwhile; ?></article></main>
<?php get_footer();
