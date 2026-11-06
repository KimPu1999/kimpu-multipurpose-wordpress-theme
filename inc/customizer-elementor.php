<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function kimpu_register_elementor_settings( $customizer ) {
	$customizer->add_section( 'kimpu_elementor', array(
		'title'       => __( 'Elementor Integration', 'kimpu-multipurpose' ),
		'description' => function_exists( 'kimpu_elementor_integration_status' ) ? kimpu_elementor_integration_status() : __( 'Native PHP Header and Footer templates remain available as fallbacks.', 'kimpu-multipurpose' ),
		'priority'    => 34,
	) );

	$customizer->add_setting( 'kimpu_elementor_native_header_fallback', array(
		'default'           => true,
		'sanitize_callback' => 'rest_sanitize_boolean',
		'transport'         => 'refresh',
	) );
	$customizer->add_control( 'kimpu_elementor_native_header_fallback', array(
		'label'       => __( 'Use Native Header Fallback', 'kimpu-multipurpose' ),
		'description' => __( 'Render the theme PHP header when no Elementor header template matches.', 'kimpu-multipurpose' ),
		'section'     => 'kimpu_elementor',
		'type'        => 'checkbox',
	) );

	$customizer->add_setting( 'kimpu_elementor_native_footer_fallback', array(
		'default'           => true,
		'sanitize_callback' => 'rest_sanitize_boolean',
		'transport'         => 'refresh',
	) );
	$customizer->add_control( 'kimpu_elementor_native_footer_fallback', array(
		'label'       => __( 'Use Native Footer Fallback', 'kimpu-multipurpose' ),
		'description' => __( 'Render the theme PHP footer when no Elementor footer template matches.', 'kimpu-multipurpose' ),
		'section'     => 'kimpu_elementor',
		'type'        => 'checkbox',
	) );
}
