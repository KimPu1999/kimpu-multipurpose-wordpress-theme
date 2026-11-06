<?php
/**
 * WooCommerce account presentation hooks.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kimpu_wc_account_body_classes( $classes ) {
	if ( kimpu_wc_is_active() && function_exists( 'is_account_page' ) && is_account_page() ) {
		$classes[] = 'kimpu-account-page';
	}

	return $classes;
}
add_filter( 'body_class', 'kimpu_wc_account_body_classes' );
