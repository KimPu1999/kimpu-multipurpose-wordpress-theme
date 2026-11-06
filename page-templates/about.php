<?php
/** Template Name: About Page Layout */
get_header(); ?>
<main id="primary" class="site-main section"><div class="container"><div class="about-grid"><div class="about-copy"><?php while ( have_posts() ) : the_post(); ?><header class="section-heading"><p class="eyebrow"><?php esc_html_e( 'ABOUT US', 'kimpu-multipurpose' ); ?></p><h1 class="entry-title"><?php the_title(); ?></h1></header><div class="entry-content"><?php the_content(); wp_link_pages(); ?></div><?php endwhile; ?></div></div></div></main>
<?php get_footer();
