<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<!doctype html>
<html <?php language_attributes(); ?> data-theme="<?php echo esc_attr( function_exists( 'kimpu_design_mode' ) ? kimpu_design_mode() : 'system' ); ?>" data-theme-default="<?php echo esc_attr( function_exists( 'kimpu_design_mode' ) ? kimpu_design_mode() : 'system' ); ?>">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>(function(){try{var m=localStorage.getItem('kimpu-theme-mode');if(m==='light'||m==='dark'||m==='system'){document.documentElement.setAttribute('data-theme',m);}}catch(e){}}());</script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'kimpu-multipurpose' ); ?></a>
<?php $header_layout = is_page_template( array( 'page-templates/landing.php', 'page-templates/landing-page.php' ) ) ? get_theme_mod( 'kimpu_landing_header_layout', get_theme_mod( 'kimpu_header_layout', 'default' ) ) : get_theme_mod( 'kimpu_header_layout', 'default' ); ?>
<header class="site-header site-header-<?php echo esc_attr( $header_layout ); ?> mobile-menu-<?php echo esc_attr( get_theme_mod( 'kimpu_mobile_menu_style', 'drawer' ) ); ?><?php echo get_theme_mod( 'kimpu_sticky_header', false ) ? ' is-sticky' : ''; ?><?php echo get_theme_mod( 'kimpu_header_border', false ) ? ' has-border' : ''; ?><?php echo get_theme_mod( 'kimpu_header_shadow', false ) ? ' has-shadow' : ''; ?>" id="site-header">
    <?php get_template_part( 'template-parts/header/header', $header_layout ); ?>
</header>
