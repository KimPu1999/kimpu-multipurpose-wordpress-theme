<?php
/**
 * WooCommerce product presentation helpers.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kimpu_wc_product_type_label( $product ) {
	if ( ! $product || ! is_a( $product, 'WC_Product' ) ) {
		return '';
	}

	$types = array(
		'simple'   => __( 'Simple product', 'kimpu-multipurpose' ),
		'variable' => __( 'Variable product', 'kimpu-multipurpose' ),
		'grouped'  => __( 'Grouped product', 'kimpu-multipurpose' ),
		'external' => __( 'External product', 'kimpu-multipurpose' ),
	);

	$type = $product->get_type();
	return isset( $types[ $type ] ) ? $types[ $type ] : '';
}

function kimpu_wc_product_card_classes( $product ) {
	$classes = array( 'km-wc-product-card', 'product' );

	if ( $product && $product->is_on_sale() ) {
		$classes[] = 'is-on-sale';
	}

	if ( $product && ! $product->is_in_stock() ) {
		$classes[] = 'is-out-of-stock';
	}

	if ( $product && $product->is_featured() ) {
		$classes[] = 'is-featured';
	}

	$classes[] = 'km-wc-button-style-' . sanitize_html_class( kimpu_wc_mod( 'button_style', 'primary' ) );

	return implode( ' ', array_map( 'sanitize_html_class', $classes ) );
}

function kimpu_wc_product_tabs( $tabs ) {
	if ( ! kimpu_wc_mod( 'show_description_tab', true ) ) {
		unset( $tabs['description'] );
	}
	if ( ! kimpu_wc_mod( 'show_additional_tab', true ) ) {
		unset( $tabs['additional_information'] );
	}
	if ( ! kimpu_wc_mod( 'show_reviews_tab', true ) ) {
		unset( $tabs['reviews'] );
	}
	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'kimpu_wc_product_tabs' );
