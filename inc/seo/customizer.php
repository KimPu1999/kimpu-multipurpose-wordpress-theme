<?php
/**
 * SEO and accessibility Customizer controls.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kimpu_register_seo_customizer_settings( $customizer ) {
	$customizer->add_section( 'kimpu_seo_accessibility', array( 'title' => __( 'SEO & Accessibility', 'kimpu-multipurpose' ), 'panel' => 'kimpu_global_design', 'priority' => 110 ) );
	$customizer->add_setting( 'kimpu_seo_breadcrumbs_enabled', array( 'default' => true, 'sanitize_callback' => 'rest_sanitize_boolean', 'transport' => 'refresh' ) );
	$customizer->add_control( 'kimpu_seo_breadcrumbs_enabled', array( 'label' => __( 'Show theme breadcrumbs', 'kimpu-multipurpose' ), 'description' => __( 'The fallback is disabled when a supported SEO plugin is active and does not appear on WooCommerce pages that already use WooCommerce breadcrumbs.', 'kimpu-multipurpose' ), 'section' => 'kimpu_seo_accessibility', 'type' => 'checkbox' ) );
	$choices = array( 'slash' => '/', 'chevron' => '›', 'arrow' => '→' );
	$customizer->add_setting( 'kimpu_seo_breadcrumb_separator', array( 'default' => 'slash', 'sanitize_callback' => function ( $value ) use ( $choices ) { return array_key_exists( $value, $choices ) ? $value : 'slash'; }, 'transport' => 'refresh' ) );
	$customizer->add_control( 'kimpu_seo_breadcrumb_separator', array( 'label' => __( 'Breadcrumb separator', 'kimpu-multipurpose' ), 'section' => 'kimpu_seo_accessibility', 'type' => 'select', 'choices' => array( 'slash' => '/', 'chevron' => '›', 'arrow' => '→' ) ) );
}
