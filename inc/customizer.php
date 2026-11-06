<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
require get_template_directory() . '/inc/customizer-design.php';
require get_template_directory() . '/inc/customizer-header.php';
require get_template_directory() . '/inc/customizer-footer.php';
require get_template_directory() . '/inc/customizer-social.php';
require get_template_directory() . '/inc/customizer-homepage.php';

function kimpu_customize_register( $wp_customize ) {
    kimpu_register_design_settings( $wp_customize );
    kimpu_register_header_settings( $wp_customize );
    kimpu_register_footer_settings( $wp_customize );
    kimpu_register_social_settings( $wp_customize );
    kimpu_register_homepage_settings( $wp_customize );
}
add_action( 'customize_register', 'kimpu_customize_register' );
