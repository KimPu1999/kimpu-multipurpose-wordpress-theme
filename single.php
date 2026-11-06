<?php get_header(); ?>
<main id="primary" class="site-main section"><div class="container content-narrow">
<?php while ( have_posts() ) : the_post(); get_template_part( 'template-parts/content' ); the_post_navigation(); if ( comments_open() || get_comments_number() ) { comments_template(); } endwhile; ?>
</div></main>
<?php get_footer(); ?>
