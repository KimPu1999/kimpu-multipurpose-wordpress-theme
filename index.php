<?php get_header(); ?>
<main id="primary" class="site-main section"><div class="container">
    <header class="section-heading"><h1><?php echo esc_html( is_home() ? __( 'Latest articles', 'kimpu-multipurpose' ) : get_bloginfo( 'name' ) ); ?></h1></header>
    <?php if ( have_posts() ) : ?><div class="post-grid"><?php while ( have_posts() ) : the_post(); get_template_part( 'template-parts/content', 'card' ); endwhile; ?></div>
        <nav class="pagination" aria-label="<?php esc_attr_e( 'Post navigation', 'kimpu-multipurpose' ); ?>"><?php the_posts_pagination(); ?></nav>
    <?php else : ?><p class="empty-state"><?php esc_html_e( 'No posts found.', 'kimpu-multipurpose' ); ?></p><?php get_search_form(); ?><?php endif; ?>
</div></main>
<?php get_footer(); ?>
