<?php get_header(); ?>
<main id="primary" class="site-main">
    <section class="hero">
        <div class="container hero-layout">
            <div class="hero-copy">
                <p class="eyebrow"><?php esc_html_e( 'WELCOME TO YOUR NEXT CHAPTER', 'kimpu-multipurpose' ); ?></p>
                <h1><?php echo esc_html( get_theme_mod( 'kimpu_hero_title', __( 'Build a better digital presence.', 'kimpu-multipurpose' ) ) ); ?></h1>
                <p class="hero-description"><?php echo esc_html( get_theme_mod( 'kimpu_hero_text', __( 'A clean, flexible WordPress foundation designed to grow with your ideas.', 'kimpu-multipurpose' ) ) ); ?></p>
                <div class="hero-actions"><a class="button" href="#latest"><?php esc_html_e( 'Explore articles', 'kimpu-multipurpose' ); ?></a><a class="button button-outline" href="#about-theme"><?php esc_html_e( 'Learn more', 'kimpu-multipurpose' ); ?></a></div>
            </div>
            <div class="hero-visual" aria-hidden="true">
                <div class="visual-note"><span class="visual-dot"></span><span><?php esc_html_e( 'Flexible design', 'kimpu-multipurpose' ); ?></span></div>
                <div class="visual-art"><div class="art-circle"></div><div class="art-card one"></div><div class="art-card two"></div><div class="art-card three"></div></div>
                <div class="visual-bottom"><?php esc_html_e( 'Create. Customize. Grow.', 'kimpu-multipurpose' ); ?></div>
            </div>
        </div>
    </section>
    <section class="section" id="about-theme"><div class="container">
        <div class="section-heading"><p class="eyebrow"><?php esc_html_e( 'BUILT FOR YOUR VISION', 'kimpu-multipurpose' ); ?></p><h2><?php esc_html_e( 'Everything starts with a strong foundation.', 'kimpu-multipurpose' ); ?></h2><p><?php esc_html_e( 'Simple to manage, clean to read, and adaptable to your brand.', 'kimpu-multipurpose' ); ?></p></div>
        <div class="feature-grid"><article class="feature-card"><span class="feature-icon" aria-hidden="true">✦</span><h3><?php esc_html_e( 'Modern design', 'kimpu-multipurpose' ); ?></h3><p><?php esc_html_e( 'Intentional spacing and clear typography.', 'kimpu-multipurpose' ); ?></p></article><article class="feature-card"><span class="feature-icon" aria-hidden="true">▣</span><h3><?php esc_html_e( 'Responsive layout', 'kimpu-multipurpose' ); ?></h3><p><?php esc_html_e( 'Beautiful on mobile, tablet, and desktop.', 'kimpu-multipurpose' ); ?></p></article><article class="feature-card"><span class="feature-icon" aria-hidden="true">⚙</span><h3><?php esc_html_e( 'Easy customization', 'kimpu-multipurpose' ); ?></h3><p><?php esc_html_e( 'Adjust your brand color and homepage message.', 'kimpu-multipurpose' ); ?></p></article></div>
    </div></section>
    <section class="section section-muted" id="latest"><div class="container"><div class="section-heading"><p class="eyebrow"><?php esc_html_e( 'FROM THE JOURNAL', 'kimpu-multipurpose' ); ?></p><h2><?php esc_html_e( 'Latest articles', 'kimpu-multipurpose' ); ?></h2></div>
        <?php $recent = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3, 'ignore_sticky_posts' => true ) ); ?>
        <?php if ( $recent->have_posts() ) : ?><div class="post-grid"><?php while ( $recent->have_posts() ) : $recent->the_post(); get_template_part( 'template-parts/content', 'card' ); endwhile; ?></div><?php wp_reset_postdata(); ?>
        <?php else : ?><p class="empty-state"><?php esc_html_e( 'Publish your first post to show articles here.', 'kimpu-multipurpose' ); ?></p><?php endif; ?>
    </div></section>
    <?php if ( 'page' === get_option( 'show_on_front' ) ) : while ( have_posts() ) : the_post(); if ( trim( get_the_content() ) ) : ?>
        <section class="section"><div class="container entry-content"><?php the_content(); wp_link_pages(); ?></div></section>
    <?php endif; endwhile; endif; ?>
</main>
<?php get_footer(); ?>
