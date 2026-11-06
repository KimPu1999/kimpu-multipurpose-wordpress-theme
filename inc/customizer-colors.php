<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function kimpu_add_design_color( $customizer, $id, $default, $label, $section ) {
	$customizer->add_setting( $id, array( 'default' => $default, 'sanitize_callback' => 'kimpu_sanitize_design_hex', 'transport' => 'postMessage' ) );
	$customizer->add_control( new WP_Customize_Color_Control( $customizer, $id, array( 'label' => $label, 'section' => $section ) ) );
}

function kimpu_register_color_controls( $customizer ) {
	$section = 'kimpu_design_colors'; $customizer->add_section( $section, array( 'title' => __( 'Global Colors', 'kimpu-multipurpose' ), 'panel' => 'kimpu_global_design', 'priority' => 20 ) );
	$colors = array(
		'kimpu_primary_color' => array( '#137c66', __( 'Primary Color', 'kimpu-multipurpose' ) ), 'kimpu_design_primary_hover' => array( '#0f6554', __( 'Primary Hover', 'kimpu-multipurpose' ) ), 'kimpu_design_secondary' => array( '#17283b', __( 'Secondary Color', 'kimpu-multipurpose' ) ), 'kimpu_design_accent' => array( '#e3a857', __( 'Accent Color', 'kimpu-multipurpose' ) ),
		'kimpu_design_heading' => array( '#17283b', __( 'Heading Text', 'kimpu-multipurpose' ) ), 'kimpu_text_color' => array( '#34465a', __( 'Body Text', 'kimpu-multipurpose' ) ), 'kimpu_design_muted' => array( '#64748b', __( 'Muted Text', 'kimpu-multipurpose' ) ), 'kimpu_design_link' => array( '#137c66', __( 'Link Color', 'kimpu-multipurpose' ) ), 'kimpu_design_link_hover' => array( '#0f6554', __( 'Link Hover', 'kimpu-multipurpose' ) ),
		'kimpu_background_color' => array( '#ffffff', __( 'Body Background', 'kimpu-multipurpose' ) ), 'kimpu_design_surface' => array( '#f4f8f7', __( 'Surface Background', 'kimpu-multipurpose' ) ), 'kimpu_design_card' => array( '#ffffff', __( 'Card Background', 'kimpu-multipurpose' ) ), 'kimpu_design_section' => array( '#ffffff', __( 'Section Background', 'kimpu-multipurpose' ) ),
		'kimpu_design_border' => array( '#e2e8f0', __( 'Border Color', 'kimpu-multipurpose' ) ), 'kimpu_design_input_background' => array( '#ffffff', __( 'Input Background', 'kimpu-multipurpose' ) ), 'kimpu_design_input_border' => array( '#b9c8cd', __( 'Input Border', 'kimpu-multipurpose' ) ), 'kimpu_design_focus_ring' => array( '#137c66', __( 'Focus Ring', 'kimpu-multipurpose' ) ), 'kimpu_design_success' => array( '#15803d', __( 'Success Color', 'kimpu-multipurpose' ) ), 'kimpu_design_warning' => array( '#b45309', __( 'Warning Color', 'kimpu-multipurpose' ) ), 'kimpu_design_error' => array( '#b91c1c', __( 'Error Color', 'kimpu-multipurpose' ) ),
	);
	foreach ( $colors as $id => $data ) { kimpu_add_design_color( $customizer, $id, $data[0], $data[1], $section ); }
}
