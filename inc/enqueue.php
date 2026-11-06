<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function kimpu_asset_version( $relative_path ) { $file = get_template_directory() . '/' . ltrim( $relative_path, '/' ); return file_exists( $file ) ? (string) filemtime( $file ) : wp_get_theme()->get( 'Version' ); }

function kimpu_assets() {
	$version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'kimpu-style', get_stylesheet_uri(), array(), $version );
	wp_enqueue_style( 'kimpu-main', get_template_directory_uri() . '/assets/css/main.css', array( 'kimpu-style' ), kimpu_asset_version( 'assets/css/main.css' ) );
	wp_enqueue_style( 'kimpu-design-system', get_template_directory_uri() . '/assets/css/design-system.css', array( 'kimpu-main' ), kimpu_asset_version( 'assets/css/design-system.css' ) );
	wp_enqueue_style( 'kimpu-typography', get_template_directory_uri() . '/assets/css/typography.css', array( 'kimpu-design-system' ), kimpu_asset_version( 'assets/css/typography.css' ) );
	wp_enqueue_style( 'kimpu-layout', get_template_directory_uri() . '/assets/css/layout.css', array( 'kimpu-typography' ), kimpu_asset_version( 'assets/css/layout.css' ) );
	wp_enqueue_style( 'kimpu-buttons', get_template_directory_uri() . '/assets/css/buttons.css', array( 'kimpu-layout' ), kimpu_asset_version( 'assets/css/buttons.css' ) );
	wp_enqueue_style( 'kimpu-header', get_template_directory_uri() . '/assets/css/header.css', array( 'kimpu-buttons' ), kimpu_asset_version( 'assets/css/header.css' ) );
	wp_enqueue_style( 'kimpu-footer', get_template_directory_uri() . '/assets/css/footer.css', array( 'kimpu-buttons' ), kimpu_asset_version( 'assets/css/footer.css' ) );
	wp_enqueue_style( 'kimpu-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array( 'kimpu-header', 'kimpu-footer' ), kimpu_asset_version( 'assets/css/responsive.css' ) );
	wp_enqueue_style( 'kimpu-responsive-design', get_template_directory_uri() . '/assets/css/responsive-design.css', array( 'kimpu-responsive' ), kimpu_asset_version( 'assets/css/responsive-design.css' ) );
	wp_enqueue_style( 'kimpu-dark-mode', get_template_directory_uri() . '/assets/css/dark-mode.css', array( 'kimpu-responsive-design' ), kimpu_asset_version( 'assets/css/dark-mode.css' ) );
	wp_enqueue_style( 'kimpu-interactions', get_template_directory_uri() . '/assets/css/interactions.css', array( 'kimpu-dark-mode' ), kimpu_asset_version( 'assets/css/interactions.css' ) );

	if ( is_front_page() ) { wp_enqueue_style( 'kimpu-homepage', get_template_directory_uri() . '/assets/css/homepage.css', array( 'kimpu-interactions' ), kimpu_asset_version( 'assets/css/homepage.css' ) ); wp_enqueue_style( 'kimpu-homepage-overrides', get_template_directory_uri() . '/assets/css/homepage-overrides.css', array( 'kimpu-homepage' ), kimpu_asset_version( 'assets/css/homepage-overrides.css' ) ); }
	if ( is_page_template( array( 'page-templates/full-width.php', 'page-templates/no-sidebar.php', 'page-templates/landing.php', 'page-templates/landing-page.php', 'page-templates/blank-canvas.php', 'page-templates/about.php', 'page-templates/services.php', 'page-templates/portfolio.php', 'page-templates/contact.php' ) ) ) { wp_enqueue_style( 'kimpu-page-templates', get_template_directory_uri() . '/assets/css/page-templates.css', array( 'kimpu-interactions' ), kimpu_asset_version( 'assets/css/page-templates.css' ) ); }

	wp_enqueue_script( 'kimpu-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), kimpu_asset_version( 'assets/js/navigation.js' ), true );
	wp_enqueue_script( 'kimpu-interactions', get_template_directory_uri() . '/assets/js/theme-interactions.js', array(), kimpu_asset_version( 'assets/js/theme-interactions.js' ), true );
	wp_enqueue_script( 'kimpu-theme-mode', get_template_directory_uri() . '/assets/js/theme-mode.js', array(), kimpu_asset_version( 'assets/js/theme-mode.js' ), true );
	wp_enqueue_script( 'kimpu-design-interactions', get_template_directory_uri() . '/assets/js/design-interactions.js', array(), kimpu_asset_version( 'assets/js/design-interactions.js' ), true );
	if ( is_front_page() ) { wp_enqueue_script( 'kimpu-homepage', get_template_directory_uri() . '/assets/js/homepage.js', array(), kimpu_asset_version( 'assets/js/homepage.js' ), true ); }

	$blog_context = is_home() || is_archive() || is_search() || is_author() || is_singular( 'post' );
	if ( $blog_context ) {
		wp_enqueue_style( 'kimpu-blog', get_template_directory_uri() . '/assets/css/blog.css', array( 'kimpu-interactions' ), kimpu_asset_version( 'assets/css/blog.css' ) );
		wp_enqueue_style( 'kimpu-archive', get_template_directory_uri() . '/assets/css/archive.css', array( 'kimpu-blog' ), kimpu_asset_version( 'assets/css/archive.css' ) );
		wp_enqueue_style( 'kimpu-blog-responsive', get_template_directory_uri() . '/assets/css/blog-responsive.css', array( 'kimpu-archive' ), kimpu_asset_version( 'assets/css/blog-responsive.css' ) );
		wp_enqueue_script( 'kimpu-blog', get_template_directory_uri() . '/assets/js/blog.js', array(), kimpu_asset_version( 'assets/js/blog.js' ), true );
		$blog_columns = absint( get_theme_mod( 'kimpu_blog_columns', 3 ) ); $blog_columns = in_array( $blog_columns, array( 2, 3, 4 ), true ) ? $blog_columns : 3; wp_add_inline_style( 'kimpu-blog', '.blog-layout-grid{grid-template-columns:repeat(' . $blog_columns . ',minmax(0,1fr));}' );
	}
	if ( is_singular( 'post' ) ) {
		wp_enqueue_style( 'kimpu-single-post', get_template_directory_uri() . '/assets/css/single-post.css', array( 'kimpu-blog-responsive' ), kimpu_asset_version( 'assets/css/single-post.css' ) );
		if ( function_exists( 'kimpu_blog_mod' ) && kimpu_blog_mod( 'reading_progress', false ) ) { wp_enqueue_script( 'kimpu-reading-progress', get_template_directory_uri() . '/assets/js/reading-progress.js', array(), kimpu_asset_version( 'assets/js/reading-progress.js' ), true ); }
		if ( function_exists( 'kimpu_blog_mod' ) && kimpu_blog_mod( 'toc_enabled', false ) ) { wp_enqueue_script( 'kimpu-table-of-contents', get_template_directory_uri() . '/assets/js/table-of-contents.js', array(), kimpu_asset_version( 'assets/js/table-of-contents.js' ), true ); }
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
	if ( function_exists( 'kimpu_design_tokens_css' ) ) { wp_add_inline_style( 'kimpu-design-system', kimpu_design_tokens_css() ); }
	if ( is_front_page() && function_exists( 'kimpu_homepage_sections' ) ) { $css = ''; foreach ( kimpu_homepage_sections() as $section ) { $bg = sanitize_hex_color( get_theme_mod( 'kimpu_home_' . $section . '_background_color', '' ) ); $text = sanitize_hex_color( get_theme_mod( 'kimpu_home_' . $section . '_text_color', '' ) ); if ( $bg || $text ) { $css .= '.homepage-section-' . sanitize_html_class( $section ) . '{' . ( $bg ? 'background-color:' . $bg . '!important;' : '' ) . ( $text ? 'color:' . $text . '!important;' : '' ) . '}'; } } if ( $css ) { wp_add_inline_style( 'kimpu-design-system', $css ); } }
	if ( is_customize_preview() ) { wp_enqueue_script( 'kimpu-customizer-preview', get_template_directory_uri() . '/assets/js/customizer-preview.js', array( 'customize-preview' ), kimpu_asset_version( 'assets/js/customizer-preview.js' ), true ); }
}
add_action( 'wp_enqueue_scripts', 'kimpu_assets' );
