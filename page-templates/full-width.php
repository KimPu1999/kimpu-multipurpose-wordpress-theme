<?php
/** Template Name: Full Width Page */
get_header(); ?>
<main id="primary" class="site-main section"><div class="container"><article <?php post_class( 'article' ); ?>><?php while ( have_posts() ) : the_post(); ?><header class="entry-header"><h1 class="entry-title"><?php the_title(); ?></h1></header><div class="entry-content"><?php the_content(); wp_link_pages(); ?></div><?php endwhile; ?></article></div></main>
<?php get_footer();
