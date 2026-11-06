<?php $menu_id = 'primary-menu'; ?>
<div class="container header-inner">
    <div class="site-branding"><?php if ( has_custom_logo() ) { the_custom_logo(); } else { ?><a class="brand-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a><?php } ?></div>
    <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="<?php echo esc_attr( $menu_id ); ?>" aria-label="<?php esc_attr_e( 'Open navigation', 'kimpu-multipurpose' ); ?>"><span aria-hidden="true">☰</span></button>
    <nav class="primary-nav" id="<?php echo esc_attr( $menu_id ); ?>" aria-label="<?php esc_attr_e( 'Primary menu', 'kimpu-multipurpose' ); ?>">
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'site-navigation-list', 'container' => false, 'fallback_cb' => 'wp_page_menu', 'depth' => 0 ) ); ?>
    </nav>
    <div class="header-tools"><?php if ( get_theme_mod( 'kimpu_search_enabled', false ) ) { kimpu_render_search_button(); } ?><?php if ( get_theme_mod( 'kimpu_header_cta_enabled', false ) ) { ?><a class="button header-cta" href="<?php echo esc_url( get_theme_mod( 'kimpu_header_cta_url', home_url( '/contact/' ) ) ); ?>"><?php echo esc_html( get_theme_mod( 'kimpu_header_cta_label', __( 'Get started', 'kimpu-multipurpose' ) ) ); ?></a><?php } ?></div>
</div>
<?php get_template_part( 'template-parts/header/mobile-navigation' ); ?>
