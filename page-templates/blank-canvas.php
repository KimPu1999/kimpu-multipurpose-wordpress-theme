<?php
/** Template Name: Blank Canvas Page */
?><!doctype html><html <?php language_attributes(); ?>><head><meta charset="<?php bloginfo( 'charset' ); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><?php wp_head(); ?></head><body <?php body_class( 'blank-canvas-page' ); ?>><?php wp_body_open(); ?><main id="primary" class="blank-canvas-content"><article <?php post_class(); ?>><?php while ( have_posts() ) : the_post(); ?><div class="entry-content"><?php the_content(); wp_link_pages(); ?></div><?php endwhile; ?></article></main><?php wp_footer(); ?></body></html>
