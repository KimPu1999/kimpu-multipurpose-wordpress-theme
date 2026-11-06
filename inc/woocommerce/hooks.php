<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function kimpu_wc_body_class( $classes ) { if ( kimpu_wc_is_active() ) { $classes[] = 'kimpu-woocommerce'; if ( ( function_exists( 'is_shop' ) && is_shop() ) || ( function_exists( 'is_product_taxonomy' ) && is_product_taxonomy() ) || ( function_exists( 'is_product' ) && is_product() ) || is_post_type_archive( 'product' ) ) { $classes[] = 'kimpu-storefront'; } } return $classes; }
add_filter( 'body_class', 'kimpu_wc_body_class' );
function kimpu_wc_show_page_title() { return false; }
if ( kimpu_wc_is_active() ) { add_filter( 'woocommerce_show_page_title', 'kimpu_wc_show_page_title' ); }

function kimpu_wc_loop_columns( $columns ) {
	return kimpu_wc_product_columns();
}
add_filter( 'loop_shop_columns', 'kimpu_wc_loop_columns' );

function kimpu_wc_loop_per_page( $per_page ) {
	return kimpu_wc_int( kimpu_wc_mod( 'products_per_page', $per_page ), 1, 48 );
}
add_filter( 'loop_shop_per_page', 'kimpu_wc_loop_per_page' );

function kimpu_wc_related_products_args( $args ) {
	$args['posts_per_page'] = kimpu_wc_int( kimpu_wc_mod( 'related_count', 4 ), 0, 12 );
	$args['columns']         = kimpu_wc_product_columns();
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'kimpu_wc_related_products_args' );
