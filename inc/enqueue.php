<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function kimpu_assets() {
    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_style( 'kimpu-style', get_stylesheet_uri(), array(), $version );
    wp_enqueue_style( 'kimpu-main', get_template_directory_uri() . '/assets/css/main.css', array( 'kimpu-style' ), $version );
    wp_enqueue_style( 'kimpu-header', get_template_directory_uri() . '/assets/css/header.css', array( 'kimpu-main' ), $version );
    wp_enqueue_style( 'kimpu-footer', get_template_directory_uri() . '/assets/css/footer.css', array( 'kimpu-main' ), $version );
    wp_enqueue_style( 'kimpu-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array( 'kimpu-header', 'kimpu-footer' ), $version );
    wp_enqueue_style( 'kimpu-interactions', get_template_directory_uri() . '/assets/css/interactions.css', array( 'kimpu-responsive' ), $version );
    if ( is_front_page() ) { wp_enqueue_style( 'kimpu-homepage', get_template_directory_uri() . '/assets/css/homepage.css', array( 'kimpu-interactions' ), $version ); wp_enqueue_style( 'kimpu-homepage-overrides', get_template_directory_uri() . '/assets/css/homepage-overrides.css', array( 'kimpu-homepage' ), $version ); }
    if ( is_page_template( array( 'page-templates/full-width.php', 'page-templates/no-sidebar.php', 'page-templates/landing.php', 'page-templates/landing-page.php', 'page-templates/blank-canvas.php', 'page-templates/about.php', 'page-templates/services.php', 'page-templates/portfolio.php', 'page-templates/contact.php' ) ) ) { wp_enqueue_style( 'kimpu-page-templates', get_template_directory_uri() . '/assets/css/page-templates.css', array( 'kimpu-interactions' ), $version ); }
    wp_enqueue_script( 'kimpu-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), $version, true );
    wp_enqueue_script( 'kimpu-interactions', get_template_directory_uri() . '/assets/js/theme-interactions.js', array(), $version, true );
    if ( is_front_page() ) { wp_enqueue_script( 'kimpu-homepage', get_template_directory_uri() . '/assets/js/homepage.js', array(), $version, true ); }
    $blog_context = is_home() || is_archive() || is_search() || is_author() || is_singular( 'post' );
    if ( $blog_context ) {
        wp_enqueue_style( 'kimpu-blog', get_template_directory_uri() . '/assets/css/blog.css', array( 'kimpu-interactions' ), $version );
        wp_enqueue_style( 'kimpu-archive', get_template_directory_uri() . '/assets/css/archive.css', array( 'kimpu-blog' ), $version );
        wp_enqueue_style( 'kimpu-blog-responsive', get_template_directory_uri() . '/assets/css/blog-responsive.css', array( 'kimpu-archive' ), $version );
        wp_enqueue_script( 'kimpu-blog', get_template_directory_uri() . '/assets/js/blog.js', array(), $version, true );
        $blog_columns = absint( get_theme_mod( 'kimpu_blog_columns', 3 ) ); $blog_columns = in_array( $blog_columns, array( 2, 3, 4 ), true ) ? $blog_columns : 3;
        wp_add_inline_style( 'kimpu-blog', '.blog-layout-grid{grid-template-columns:repeat(' . $blog_columns . ',minmax(0,1fr));}' );
    }
    if ( is_singular( 'post' ) ) {
        wp_enqueue_style( 'kimpu-single-post', get_template_directory_uri() . '/assets/css/single-post.css', array( 'kimpu-blog-responsive' ), $version );
        if ( function_exists( 'kimpu_blog_mod' ) && kimpu_blog_mod( 'reading_progress', false ) ) { wp_enqueue_script( 'kimpu-reading-progress', get_template_directory_uri() . '/assets/js/reading-progress.js', array(), $version, true ); }
        if ( function_exists( 'kimpu_blog_mod' ) && kimpu_blog_mod( 'toc_enabled', false ) ) { wp_enqueue_script( 'kimpu-table-of-contents', get_template_directory_uri() . '/assets/js/table-of-contents.js', array(), $version, true ); }
    }
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    $vars = array(
        '--km-primary' => get_theme_mod( 'kimpu_primary_color', '#137c66' ), '--color-primary' => get_theme_mod( 'kimpu_primary_color', '#137c66' ), '--km-text' => get_theme_mod( 'kimpu_text_color', '#34465a' ), '--color-text' => get_theme_mod( 'kimpu_text_color', '#34465a' ), '--km-background' => get_theme_mod( 'kimpu_background_color', '#ffffff' ), '--km-container' => absint( get_theme_mod( 'kimpu_container_width', 1200 ) ) . 'px', '--container' => absint( get_theme_mod( 'kimpu_container_width', 1200 ) ) . 'px', '--km-radius-md' => absint( get_theme_mod( 'kimpu_button_radius', 10 ) ) . 'px', '--km-header-bg' => get_theme_mod( 'kimpu_header_background', '#ffffff' ), '--km-header-text' => get_theme_mod( 'kimpu_header_text_color', '#17283b' ), '--km-header-height' => absint( get_theme_mod( 'kimpu_header_height', 84 ) ) . 'px', '--km-footer-bg' => get_theme_mod( 'kimpu_footer_background', '#17283b' ), '--km-footer-text' => get_theme_mod( 'kimpu_footer_text_color', '#bfcad5' ), '--km-footer-heading' => get_theme_mod( 'kimpu_footer_heading_color', '#ffffff' ),
    );
    $css = ':root{';
    foreach ( $vars as $property => $value ) {
        if ( 0 === strpos( $property, '--km-' ) && false !== strpos( $property, 'color' ) || false !== strpos( $property, 'bg' ) || false !== strpos( $property, 'text' ) || false !== strpos( $property, 'heading' ) || '--km-primary' === $property ) { $value = sanitize_hex_color( $value ); }
        if ( $value ) { $css .= $property . ':' . esc_attr( $value ) . ';'; }
    }
    $css .= '}';
    if ( ! get_theme_mod( 'kimpu_header_border', false ) ) { $css .= '.site-header{border-bottom:0!important;}'; }
    if ( ! get_theme_mod( 'kimpu_header_shadow', false ) ) { $css .= '.site-header:not(.is-scrolled){box-shadow:none;}'; }
    if ( ! get_theme_mod( 'kimpu_footer_border', true ) ) { $css .= '.site-footer{border-top:0!important;}'; }
    if ( is_front_page() && function_exists( 'kimpu_homepage_sections' ) ) {
        foreach ( kimpu_homepage_sections() as $section ) {
            $bg = sanitize_hex_color( get_theme_mod( 'kimpu_home_' . $section . '_background_color', '' ) ); $text = sanitize_hex_color( get_theme_mod( 'kimpu_home_' . $section . '_text_color', '' ) );
            if ( $bg || $text ) { $css .= '.homepage-section-' . sanitize_html_class( $section ) . '{' . ( $bg ? 'background-color:' . $bg . '!important;' : '' ) . ( $text ? 'color:' . $text . '!important;' : '' ) . '}'; }
        }
    }
    wp_add_inline_style( 'kimpu-main', $css );
}
add_action( 'wp_enqueue_scripts', 'kimpu_assets' );
