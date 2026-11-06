<?php
/**
 * Theme script loading strategy.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kimpu_defer_theme_scripts( $tag, $handle, $src ) {
	$handles = array(
		'kimpu-navigation',
		'kimpu-interactions',
		'kimpu-theme-mode',
		'kimpu-design-interactions',
		'kimpu-homepage',
		'kimpu-blog',
		'kimpu-reading-progress',
		'kimpu-table-of-contents',
		'kimpu-shop',
		'kimpu-product',
		'kimpu-cart-interactions',
	);

	if ( in_array( $handle, $handles, true ) && false === strpos( $tag, ' defer' ) ) {
		return '<script src="' . esc_url( $src ) . '" defer></script>';
	}

	return $tag;
}
add_filter( 'script_loader_tag', 'kimpu_defer_theme_scripts', 10, 3 );
