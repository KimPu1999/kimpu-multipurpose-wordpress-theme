<?php get_header(); ?>
<main id="primary" class="site-main section"><div class="container content-narrow error-page"><p class="eyebrow">404</p><h1><?php esc_html_e( 'This page could not be found.', 'kimpu-multipurpose' ); ?></h1><p><?php esc_html_e( 'The link may be outdated or the page has moved.', 'kimpu-multipurpose' ); ?></p><a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to homepage', 'kimpu-multipurpose' ); ?></a></div></main>
<?php get_footer(); ?>
