<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function kimpu_design_presets() {
	return array(
		'premium-emerald' => array( 'label' => __( 'Premium Emerald', 'kimpu-multipurpose' ), 'primary' => '#137c66', 'primary_hover' => '#0f6554', 'secondary' => '#17283b', 'accent' => '#e3a857', 'heading' => '#17283b', 'text' => '#34465a', 'surface' => '#f4f8f7', 'border' => '#e2e8f0', 'button_style' => 'solid', 'body_font' => 'system', 'heading_font' => 'system' ),
		'corporate-blue' => array( 'label' => __( 'Corporate Blue', 'kimpu-multipurpose' ), 'primary' => '#1d4ed8', 'primary_hover' => '#1e40af', 'secondary' => '#172554', 'accent' => '#38bdf8', 'heading' => '#172554', 'text' => '#334155', 'surface' => '#eff6ff', 'border' => '#dbeafe', 'button_style' => 'solid', 'body_font' => 'system', 'heading_font' => 'system' ),
		'elegant-purple' => array( 'label' => __( 'Elegant Purple', 'kimpu-multipurpose' ), 'primary' => '#7c3aed', 'primary_hover' => '#6d28d9', 'secondary' => '#2e1065', 'accent' => '#f0abfc', 'heading' => '#2e1065', 'text' => '#4c1d95', 'surface' => '#faf5ff', 'border' => '#e9d5ff', 'button_style' => 'solid', 'body_font' => 'system', 'heading_font' => 'system' ),
		'warm-orange' => array( 'label' => __( 'Warm Orange', 'kimpu-multipurpose' ), 'primary' => '#c2410c', 'primary_hover' => '#9a3412', 'secondary' => '#431407', 'accent' => '#f59e0b', 'heading' => '#431407', 'text' => '#57534e', 'surface' => '#fff7ed', 'border' => '#fed7aa', 'button_style' => 'solid', 'body_font' => 'system', 'heading_font' => 'system' ),
		'minimal-neutral' => array( 'label' => __( 'Minimal Neutral', 'kimpu-multipurpose' ), 'primary' => '#334155', 'primary_hover' => '#1e293b', 'secondary' => '#0f172a', 'accent' => '#64748b', 'heading' => '#0f172a', 'text' => '#475569', 'surface' => '#f8fafc', 'border' => '#e2e8f0', 'button_style' => 'outline', 'body_font' => 'system', 'heading_font' => 'system' ),
		'custom' => array( 'label' => __( 'Custom values', 'kimpu-multipurpose' ) ),
	);
}

function kimpu_design_defaults() {
	return array(
		'primary' => '#137c66', 'primary_hover' => '#0f6554', 'secondary' => '#17283b', 'accent' => '#e3a857', 'heading' => '#17283b', 'text' => '#34465a', 'muted' => '#64748b', 'link' => '#137c66', 'link_hover' => '#0f6554', 'background' => '#ffffff', 'surface' => '#f4f8f7', 'card' => '#ffffff', 'section' => '#ffffff', 'border' => '#e2e8f0', 'input_background' => '#ffffff', 'input_border' => '#b9c8cd', 'focus_ring' => '#137c66', 'success' => '#15803d', 'warning' => '#b45309', 'error' => '#b91c1c',
		'dark_background' => '#0f1720', 'dark_surface' => '#17232d', 'dark_card' => '#1e2d38', 'dark_heading' => '#f8fafc', 'dark_text' => '#d7e1e8', 'dark_muted' => '#9fb0bd', 'dark_border' => '#334552',
		'body_font' => 'system', 'heading_font' => 'system', 'body_size' => 16, 'body_weight' => 400, 'body_line_height' => 1.65, 'body_letter_spacing' => 0, 'heading_weight' => 700, 'heading_line_height' => 1.18, 'heading_letter_spacing' => -0.03, 'nav_size' => 15, 'nav_weight' => 600, 'nav_letter_spacing' => 0, 'button_font_size' => 15, 'button_weight' => 700, 'h1' => 56, 'h2' => 44, 'h3' => 32, 'h4' => 25, 'h5' => 20, 'h6' => 17,
		'container' => 1200, 'wide_container' => 1320, 'reading_width' => 760, 'layout_mode' => 'full', 'page_background' => '#ffffff', 'sidebar_position' => 'right', 'sidebar_width' => 300, 'content_gap' => 48, 'section_alignment' => 'left',
		'button_style' => 'solid', 'button_primary_bg' => '#137c66', 'button_primary_text' => '#ffffff', 'button_primary_hover_bg' => '#0f6554', 'button_primary_hover_text' => '#ffffff', 'button_primary_border' => '#137c66', 'button_secondary_bg' => '#17283b', 'button_secondary_text' => '#ffffff', 'button_secondary_hover_bg' => '#0f1720', 'button_secondary_hover_text' => '#ffffff', 'button_secondary_border' => '#17283b', 'button_outline_bg' => 'transparent', 'button_outline_text' => '#137c66', 'button_outline_hover_bg' => '#137c66', 'button_outline_hover_text' => '#ffffff', 'button_outline_border' => '#137c66', 'button_radius' => 10, 'button_pad_x' => 22, 'button_pad_y' => 12, 'button_border_width' => 1,
		'input_height' => 48, 'input_radius' => 8, 'input_spacing' => 16, 'label_spacing' => 6, 'placeholder_color' => '#64748b', 'section_spacing' => 88, 'container_padding_desktop' => 20, 'container_padding_tablet' => 24, 'container_padding_mobile' => 15, 'card_padding' => 24, 'grid_gap' => 22, 'radius_small' => 6, 'radius_medium' => 10, 'radius_large' => 16, 'card_radius' => 12, 'shadow_style' => 'subtle', 'mobile_heading_scale' => 0.86, 'mobile_body_size' => 16, 'mobile_section_spacing' => 56, 'mobile_button_width' => 'auto', 'theme_mode' => 'system', 'theme_toggle_enabled' => true,
	);
}

function kimpu_design_option( $key, $fallback = null ) { $defaults = kimpu_design_defaults(); return array_key_exists( $key, $defaults ) ? $defaults[ $key ] : $fallback; }
function kimpu_design_allowed_preset( $preset ) { return array_key_exists( $preset, kimpu_design_presets() ) ? $preset : 'premium-emerald'; }
function kimpu_design_font_families() { return array( 'system' => 'system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif', 'georgia' => 'Georgia,"Times New Roman",serif', 'verdana' => 'Verdana,Geneva,sans-serif', 'tahoma' => 'Tahoma,Arial,sans-serif', 'monospace' => 'ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono",monospace' ); }

function kimpu_design_get_value( $key ) {
	$defaults = kimpu_design_defaults(); $default = array_key_exists( $key, $defaults ) ? $defaults[ $key ] : ''; $preset = kimpu_design_allowed_preset( get_theme_mod( 'kimpu_design_preset', 'premium-emerald' ) ); $presets = kimpu_design_presets();
	$mapped = array( 'primary' => 'kimpu_primary_color', 'text' => 'kimpu_text_color', 'background' => 'kimpu_background_color', 'container' => 'kimpu_container_width', 'button_radius' => 'kimpu_button_radius', 'body_font' => 'kimpu_design_body_font', 'heading_font' => 'kimpu_design_heading_font' );
	$id = isset( $mapped[ $key ] ) ? $mapped[ $key ] : 'kimpu_design_' . $key; $value = get_theme_mod( $id, $default );
	if ( 'custom' !== $preset && isset( $presets[ $preset ][ $key ] ) ) { $value = $presets[ $preset ][ $key ]; }
	if ( 'custom' !== $preset && isset( $presets[ $preset ] ) ) {
		$preset_map = array( 'button_primary_bg' => 'primary', 'button_primary_hover_bg' => 'primary_hover', 'button_primary_border' => 'primary', 'button_outline_text' => 'primary', 'button_outline_hover_bg' => 'primary', 'button_outline_border' => 'primary', 'button_secondary_bg' => 'secondary', 'button_secondary_border' => 'secondary' );
		if ( isset( $preset_map[ $key ], $presets[ $preset ][ $preset_map[ $key ] ] ) ) { $value = $presets[ $preset ][ $preset_map[ $key ] ]; }
	}
	$fonts = kimpu_design_font_families();
	if ( false !== strpos( $key, 'font' ) && isset( $fonts[ $value ] ) ) { return $fonts[ $value ]; }
	return $value;
}

function kimpu_design_color( $key ) { $value = sanitize_hex_color( kimpu_design_get_value( $key ) ); return $value ? $value : kimpu_design_option( $key, '#000000' ); }
function kimpu_design_number( $key, $min, $max ) { $value = (float) kimpu_design_get_value( $key ); return max( $min, min( $max, $value ) ); }
function kimpu_sanitize_design_hex( $value ) { $value = sanitize_hex_color( $value ); return $value ? $value : ''; }
function kimpu_sanitize_design_number( $value, $min, $max ) { $value = is_numeric( $value ) ? (float) $value : $min; return max( $min, min( $max, $value ) ); }
function kimpu_sanitize_design_choice( $value, $choices, $fallback ) { return in_array( $value, $choices, true ) ? $value : $fallback; }
