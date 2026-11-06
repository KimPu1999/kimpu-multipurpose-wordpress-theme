<?php
/**
 * Optional Elementor Theme Builder integration.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether a supported Elementor theme-location renderer is available.
 *
 * Elementor Pro and compatible Header/Footer Builder integrations expose
 * elementor_theme_do_location(). The theme intentionally does not call
 * private plugin APIs or implement its own display-condition system.
 *
 * @return bool
 */
function kimpu_elementor_locations_available() {
	return function_exists( 'elementor_theme_do_location' );
}

/**
 * Render an Elementor theme location when a matching template exists.
 *
 * @param string $location Theme location name.
 * @return bool Whether Elementor rendered the location.
 */
function kimpu_elementor_render_location( $location ) {
	$allowed = array( 'header', 'footer' );
	if ( ! in_array( $location, $allowed, true ) || ! kimpu_elementor_locations_available() ) {
		return false;
	}

	return (bool) elementor_theme_do_location( $location );
}

/**
 * Whether the native PHP fallback is enabled for a location.
 *
 * @param string $location Theme location name.
 * @return bool
 */
function kimpu_elementor_native_fallback_enabled( $location ) {
	$settings = array(
		'header' => 'kimpu_elementor_native_header_fallback',
		'footer' => 'kimpu_elementor_native_footer_fallback',
	);

	if ( ! isset( $settings[ $location ] ) ) {
		return true;
	}

	return (bool) get_theme_mod( $settings[ $location ], true );
}

/**
 * Text shown in the Customizer integration section.
 *
 * @return string
 */
function kimpu_elementor_integration_status() {
	if ( kimpu_elementor_locations_available() ) {
		return __( 'A supported Elementor theme-location renderer is available. Elementor display conditions remain authoritative.', 'kimpu-multipurpose' );
	}

	return __( 'Elementor Theme Builder was not detected. Native PHP Header and Footer templates will be used.', 'kimpu-multipurpose' );
}
