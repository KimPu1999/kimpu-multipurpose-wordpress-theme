<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function kimpu_design_mode() { return kimpu_sanitize_design_choice( get_theme_mod( 'kimpu_theme_mode', 'system' ), array( 'light', 'dark', 'system' ), 'system' ); }

function kimpu_render_theme_toggle() {
	if ( ! get_theme_mod( 'kimpu_theme_toggle_enabled', true ) ) { return; }
	?><button class="theme-mode-toggle" type="button" data-kimpu-theme-toggle aria-pressed="false" aria-label="<?php esc_attr_e( 'Switch color theme', 'kimpu-multipurpose' ); ?>"><span class="theme-mode-toggle-icon" aria-hidden="true">◐</span><span class="screen-reader-text" data-kimpu-theme-label><?php esc_html_e( 'Switch color theme', 'kimpu-multipurpose' ); ?></span></button><?php
}

function kimpu_design_body_class( $classes ) { if ( get_theme_mod( 'kimpu_design_reduced_motion', false ) ) { $classes[] = 'kimpu-reduced-motion'; } $classes[] = 'kimpu-theme-mode-' . sanitize_html_class( kimpu_design_mode() ); $classes[] = 'kimpu-button-style-' . sanitize_html_class( kimpu_design_get_value( 'button_style' ) ); $classes[] = 'kimpu-layout-' . sanitize_html_class( kimpu_design_get_value( 'layout_mode' ) ); if ( 'full' === kimpu_design_get_value( 'mobile_button_width' ) ) { $classes[] = 'kimpu-mobile-buttons-full'; } return $classes; }
add_filter( 'body_class', 'kimpu_design_body_class' );
