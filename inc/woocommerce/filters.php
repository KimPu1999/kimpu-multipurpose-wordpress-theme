<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function kimpu_wc_product_query_tax_query( $tax_query ) {
	if ( ! kimpu_wc_is_active() || ( ! is_shop() && ! is_product_taxonomy() ) ) { return $tax_query; }
	$category = isset( $_GET['product_cat'] ) ? sanitize_title( wp_unslash( $_GET['product_cat'] ) ) : '';
	if ( $category ) { $tax_query[] = array( 'taxonomy' => 'product_cat', 'field' => 'slug', 'terms' => $category ); }
	$filters = isset( $_GET['filter'] ) && is_array( $_GET['filter'] ) ? wp_unslash( $_GET['filter'] ) : array();
	foreach ( $filters as $taxonomy => $terms ) { $taxonomy = sanitize_key( $taxonomy ); if ( 0 !== strpos( $taxonomy, 'pa_' ) || ! taxonomy_exists( $taxonomy ) ) { continue; } $safe_terms = array_map( 'sanitize_title', (array) $terms ); if ( $safe_terms ) { $tax_query[] = array( 'taxonomy' => $taxonomy, 'field' => 'slug', 'terms' => $safe_terms ); } }
	return $tax_query;
}
add_filter( 'woocommerce_product_query_tax_query', 'kimpu_wc_product_query_tax_query' );

function kimpu_wc_product_query_meta_query( $meta_query ) {
	if ( ! kimpu_wc_is_active() || ( ! is_shop() && ! is_product_taxonomy() ) ) { return $meta_query; }
	$min = isset( $_GET['min_price'] ) ? wc_format_decimal( wp_unslash( $_GET['min_price'] ) ) : ''; $max = isset( $_GET['max_price'] ) ? wc_format_decimal( wp_unslash( $_GET['max_price'] ) ) : '';
	if ( '' !== $min || '' !== $max ) { $range = array( 'key' => '_price', 'type' => 'DECIMAL(20,6)' ); if ( '' !== $min ) { $range['value'] = (float) $min; $range['compare'] = '>='; } if ( '' !== $max ) { $range['value'] = '' !== $min ? array( (float) $min, (float) $max ) : (float) $max; $range['compare'] = '' !== $min ? 'BETWEEN' : '<='; } $meta_query[] = $range; }
	$stock = isset( $_GET['stock_status'] ) ? sanitize_key( wp_unslash( $_GET['stock_status'] ) ) : ''; if ( in_array( $stock, array( 'instock', 'outofstock', 'onbackorder' ), true ) ) { $meta_query[] = array( 'key' => '_stock_status', 'value' => $stock ); }
	$rating = isset( $_GET['rating'] ) ? kimpu_wc_int( wp_unslash( $_GET['rating'] ), 1, 5 ) : 0; if ( $rating ) { $meta_query[] = array( 'key' => '_wc_average_rating', 'value' => $rating, 'type' => 'DECIMAL(3,2)', 'compare' => '>=' ); }
	return $meta_query;
}
add_filter( 'woocommerce_product_query_meta_query', 'kimpu_wc_product_query_meta_query' );

function kimpu_wc_product_query_on_sale( $query ) {
	if ( ! kimpu_wc_is_active() || ( ! is_shop() && ! is_product_taxonomy() ) || empty( $_GET['on_sale'] ) ) { return; }
	$ids = function_exists( 'wc_get_product_ids_on_sale' ) ? wc_get_product_ids_on_sale() : array(); $query->set( 'post__in', $ids ? $ids : array( 0 ) );
}
add_action( 'woocommerce_product_query', 'kimpu_wc_product_query_on_sale' );
