<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function kimpu_wc_is_active() { return class_exists( 'WooCommerce' ) && function_exists( 'WC' ); }
function kimpu_wc_mod( $key, $default = '' ) { return get_theme_mod( 'kimpu_wc_' . $key, $default ); }
function kimpu_wc_allowed( $value, $allowed, $fallback ) { return in_array( $value, $allowed, true ) ? $value : $fallback; }
function kimpu_wc_int( $value, $min, $max ) { return max( $min, min( $max, absint( $value ) ) ); }
function kimpu_wc_shop_url() { return function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' ); }
function kimpu_wc_product_columns() { return kimpu_wc_int( kimpu_wc_mod( 'product_columns', 4 ), 1, 4 ); }
function kimpu_wc_get_product_image( $product, $size = 'woocommerce_thumbnail' ) { return $product && $product->get_image_id() ? $product->get_image( $size ) : '<span class="kimpu-product-placeholder" aria-hidden="true"></span>'; }
function kimpu_wc_product_categories( $product ) {
	if ( ! $product || ! function_exists( 'wc_get_product_terms' ) ) {
		return array();
	}

	$terms = wc_get_product_terms( $product->get_id(), 'product_cat', array( 'fields' => 'all' ) );
	return is_wp_error( $terms ) ? array() : $terms;
}
function kimpu_wc_wishlist_supported() { return function_exists( 'YITH_WCWL' ) || function_exists( 'yith_wcwl_get_wishlist_url' ) || function_exists( 'tinv_url_wishlist' ); }
function kimpu_wc_wishlist_url() { if ( function_exists( 'yith_wcwl_get_wishlist_url' ) ) { return yith_wcwl_get_wishlist_url(); } if ( function_exists( 'tinv_url_wishlist' ) ) { return tinv_url_wishlist(); } return ''; }

function kimpu_wc_filter_query_args() {
	$args = array();
	$keys = array( 'product_cat', 'min_price', 'max_price', 'rating', 'stock_status', 'on_sale' );
	foreach ( $keys as $key ) { if ( isset( $_GET[ $key ] ) && '' !== $_GET[ $key ] ) { $args[ $key ] = sanitize_text_field( wp_unslash( $_GET[ $key ] ) ); } }
	if ( isset( $_GET['filter'] ) && is_array( $_GET['filter'] ) ) { foreach ( wp_unslash( $_GET['filter'] ) as $taxonomy => $terms ) { $taxonomy = sanitize_key( $taxonomy ); $args['filter'][ $taxonomy ] = array_map( 'sanitize_title', (array) $terms ); } }
	return $args;
}
