<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function kimpu_register_global_design_settings( $customizer ) {
	$customizer->add_panel(
		'kimpu_global_design',
		array(
			'title'       => __( 'KimPu Global Design', 'kimpu-multipurpose' ),
			'priority'    => 25,
			'description' => __( 'Control the shared visual language used by the theme. Existing Header and Footer Builder controls remain component-specific.', 'kimpu-multipurpose' ),
		)
	);

	kimpu_register_preset_controls( $customizer );
	kimpu_register_color_controls( $customizer );
	kimpu_register_typography_controls( $customizer );
	kimpu_register_layout_controls( $customizer );
	kimpu_register_button_controls( $customizer );
	kimpu_register_spacing_controls( $customizer );
	kimpu_register_dark_mode_controls( $customizer );
	kimpu_register_responsive_controls( $customizer );

	$customizer->add_section( 'kimpu_design_components', array( 'title' => __( 'Header & Footer Appearance', 'kimpu-multipurpose' ), 'panel' => 'kimpu_global_design', 'priority' => 90, 'description' => __( 'Global typography, buttons, spacing, and focus styles are inherited. Component-specific colors and dimensions remain overrides in Header Builder and Footer Builder.', 'kimpu-multipurpose' ) ) );

	$customizer->add_section( 'kimpu_design_advanced', array( 'title' => __( 'Advanced Design Settings', 'kimpu-multipurpose' ), 'panel' => 'kimpu_global_design', 'priority' => 100 ) );
	$customizer->add_setting( 'kimpu_design_reduced_motion', array( 'default' => false, 'sanitize_callback' => 'rest_sanitize_boolean', 'transport' => 'refresh' ) );
	$customizer->add_control( 'kimpu_design_reduced_motion', array( 'label' => __( 'Reduce theme motion', 'kimpu-multipurpose' ), 'description' => __( 'The theme already respects the operating system preference. Enable this to minimize transitions for every visitor.', 'kimpu-multipurpose' ), 'section' => 'kimpu_design_advanced', 'type' => 'checkbox' ) );
}

/** Backward-compatible entry point for child themes and extensions. */
function kimpu_register_design_settings( $customizer ) {
	if ( function_exists( 'kimpu_register_global_design_settings' ) ) { kimpu_register_global_design_settings( $customizer ); }
}
