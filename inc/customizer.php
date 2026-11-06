<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
require get_template_directory() . '/inc/theme-defaults.php';
require get_template_directory() . '/inc/design-functions.php';
require get_template_directory() . '/inc/design-tokens.php';
require get_template_directory() . '/inc/customizer-colors.php';
require get_template_directory() . '/inc/customizer-typography.php';
require get_template_directory() . '/inc/customizer-layout.php';
require get_template_directory() . '/inc/customizer-buttons.php';
require get_template_directory() . '/inc/customizer-spacing.php';
require get_template_directory() . '/inc/customizer-dark-mode.php';
require get_template_directory() . '/inc/customizer-responsive.php';
require get_template_directory() . '/inc/customizer-presets.php';
require get_template_directory() . '/inc/customizer-design.php';
require get_template_directory() . '/inc/customizer-header.php';
require get_template_directory() . '/inc/customizer-footer.php';
require get_template_directory() . '/inc/customizer-social.php';
require get_template_directory() . '/inc/customizer-elementor.php';
require get_template_directory() . '/inc/customizer-homepage.php';
require get_template_directory() . '/inc/blog-customizer.php';
require get_template_directory() . '/inc/seo/customizer.php';

function kimpu_customize_register( $wp_customize ) {
    kimpu_register_global_design_settings( $wp_customize );
    kimpu_register_header_settings( $wp_customize );
    kimpu_register_footer_settings( $wp_customize );
    kimpu_register_social_settings( $wp_customize );
    kimpu_register_elementor_settings( $wp_customize );
    kimpu_register_homepage_settings( $wp_customize );
    kimpu_register_blog_settings( $wp_customize );
    kimpu_register_seo_customizer_settings( $wp_customize );
    if ( function_exists( 'kimpu_register_woocommerce_settings' ) ) {
        kimpu_register_woocommerce_settings( $wp_customize );
    }
}
add_action( 'customize_register', 'kimpu_customize_register' );
