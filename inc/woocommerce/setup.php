<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

require_once get_template_directory() . '/inc/woocommerce/helpers.php';
require_once get_template_directory() . '/inc/woocommerce/hooks.php';
require_once get_template_directory() . '/inc/woocommerce/assets.php';
require_once get_template_directory() . '/inc/woocommerce/shop-functions.php';
require_once get_template_directory() . '/inc/woocommerce/product-functions.php';
require_once get_template_directory() . '/inc/woocommerce/filters.php';
require_once get_template_directory() . '/inc/woocommerce/cart-functions.php';
require_once get_template_directory() . '/inc/woocommerce/checkout-functions.php';
require_once get_template_directory() . '/inc/woocommerce/account-functions.php';
require_once get_template_directory() . '/inc/woocommerce/wishlist-integration.php';
require_once get_template_directory() . '/inc/woocommerce/customizer.php';

function kimpu_woocommerce_support() {
	if ( ! current_theme_supports( 'woocommerce' ) ) {
		add_theme_support( 'woocommerce' );
	}
	if ( ! current_theme_supports( 'wc-product-gallery-zoom' ) ) {
		add_theme_support( 'wc-product-gallery-zoom' );
	}
	if ( ! current_theme_supports( 'wc-product-gallery-lightbox' ) ) {
		add_theme_support( 'wc-product-gallery-lightbox' );
	}
	if ( ! current_theme_supports( 'wc-product-gallery-slider' ) ) {
		add_theme_support( 'wc-product-gallery-slider' );
	}
}
add_action( 'after_setup_theme', 'kimpu_woocommerce_support', 11 );

function kimpu_woocommerce_homepage_sections( $sections ) {
	if ( ! kimpu_wc_is_active() ) { return $sections; }
	return array_merge( $sections, array( 'featured_products', 'new_arrivals', 'best_selling_products', 'on_sale_products', 'product_categories', 'promotional_banner' ) );
}
add_filter( 'kimpu_homepage_sections', 'kimpu_woocommerce_homepage_sections' );

function kimpu_woocommerce_homepage_defaults( $defaults ) {
	if ( kimpu_wc_is_active() ) { $defaults = array_merge( $defaults, array( 'featured_products' => false, 'new_arrivals' => false, 'best_selling_products' => false, 'on_sale_products' => false, 'product_categories' => false, 'promotional_banner' => false ) ); }
	return $defaults;
}
add_filter( 'kimpu_homepage_section_defaults', 'kimpu_woocommerce_homepage_defaults' );
