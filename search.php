<?php get_header(); ?>
<main id="primary" class="site-main section"><div class="container">
<header class="section-heading"><h1><?php printf( esc_html__( 'Search results for: %s', 'kimpu-multipurpose' ), esc_html( get_search_query() ) ); ?></h1><?php get_search_form(); ?></header>
<?php if ( have_posts() ) : ?><div class="post-grid"><?php while ( have_posts() ) : the_post(); get_template_part( 'template-parts/content', 'card' ); endwhile; ?></div><div class="pagination"><?php the_posts_pagination(); ?></div>
<?php else : ?><p class="empty-state"><?php esc_html_e( 'Nothing matched your search. Try another keyword.', 'kimpu-multipurpose' ); ?></p><?php endif; ?>
</div></main>
<?php get_footer(); ?>
