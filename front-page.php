<?php get_header(); ?>
<main id="primary" class="site-main homepage-builder" data-kimpu-faq-single-open="<?php echo get_theme_mod( 'kimpu_faq_single_open', false ) ? 'true' : 'false'; ?>">
    <?php if ( 'content-first' === get_theme_mod( 'kimpu_homepage_layout', 'sections' ) && have_posts() ) : while ( have_posts() ) : the_post(); if ( trim( get_the_content() ) ) : ?><section class="section homepage-page-content"><div class="container entry-content"><?php the_content(); wp_link_pages(); ?></div></section><?php endif; endwhile; endif; ?>
    <?php $order = explode( ',', kimpu_sanitize_homepage_order( get_theme_mod( 'kimpu_homepage_section_order', implode( ',', kimpu_homepage_sections() ) ) ) ); foreach ( $order as $section ) { if ( kimpu_homepage_section_enabled( $section ) ) { kimpu_homepage_render_section( $section ); } } ?>
</main>
<?php get_footer(); ?>
