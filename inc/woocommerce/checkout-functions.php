<?php
/**
 * WooCommerce checkout presentation hooks.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kimpu_wc_checkout_body_classes( $classes ) {
	if ( kimpu_wc_is_active() && function_exists( 'is_checkout' ) && is_checkout() ) {
		$classes[] = 'kimpu-checkout-page';
	}

	return $classes;
}
add_filter( 'body_class', 'kimpu_wc_checkout_body_classes' );
