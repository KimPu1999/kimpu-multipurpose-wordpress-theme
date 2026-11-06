<?php
/**
 * WooCommerce asset loading.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue WooCommerce assets only where they are needed.
 *
 * @return void
 */
function kimpu_wc_enqueue_assets() {
	if ( ! kimpu_wc_is_active() ) {
		return;
	}

	$is_product_context = function_exists( 'is_product' ) && is_product();
	$is_shop_context    = ( function_exists( 'is_shop' ) && is_shop() ) || ( function_exists( 'is_product_taxonomy' ) && is_product_taxonomy() ) || ( function_exists( 'is_product_category' ) && is_product_category() ) || ( function_exists( 'is_product_tag' ) && is_product_tag() ) || ( is_post_type_archive( 'product' ) ) || ( is_search() && 'product' === get_query_var( 'post_type' ) );
	$is_cart_context    = function_exists( 'is_cart' ) && is_cart();
	$is_checkout        = function_exists( 'is_checkout' ) && is_checkout();
	$is_account         = function_exists( 'is_account_page' ) && is_account_page();
	$is_home_products   = is_front_page() && ( get_theme_mod( 'kimpu_home_featured_products_enabled', false ) || get_theme_mod( 'kimpu_home_new_arrivals_enabled', false ) || get_theme_mod( 'kimpu_home_best_selling_products_enabled', false ) || get_theme_mod( 'kimpu_home_on_sale_products_enabled', false ) || get_theme_mod( 'kimpu_home_product_categories_enabled', false ) || get_theme_mod( 'kimpu_home_promotional_banner_enabled', false ) );
	$is_wc_context      = $is_product_context || $is_shop_context || $is_cart_context || $is_checkout || $is_account || $is_home_products;

	if ( ! $is_wc_context ) {
		return;
	}

	$version = function_exists( 'kimpu_asset_version' ) ? kimpu_asset_version() : wp_get_theme()->get( 'Version' );
	$uri     = get_template_directory_uri();
	$dir     = get_template_directory();

	$styles = array(
		'kimpu-woocommerce' => array( 'css/woocommerce.css', $is_wc_context ),
		'kimpu-wc-layout'  => array( 'css/woocommerce-layout.css', $is_wc_context ),
		'kimpu-wc-responsive' => array( 'css/woocommerce-responsive.css', true ),
		'kimpu-shop'        => array( 'css/shop.css', $is_shop_context || $is_home_products ),
		'kimpu-wc-homepage' => array( 'css/woocommerce-homepage.css', $is_home_products ),
		'kimpu-product'     => array( 'css/product.css', $is_product_context ),
		'kimpu-cart-checkout' => array( 'css/cart-checkout.css', $is_cart_context || $is_checkout ),
		'kimpu-my-account'  => array( 'css/my-account.css', $is_account ),
	);

	foreach ( $styles as $handle => $style ) {
		if ( ! $style[1] || ! file_exists( $dir . '/assets/' . $style[0] ) ) {
			continue;
		}

		wp_enqueue_style( $handle, $uri . '/assets/' . $style[0], array( 'kimpu-main' ), $version );
	}

	if ( $is_shop_context && file_exists( $dir . '/assets/js/shop.js' ) ) {
		wp_enqueue_script( 'kimpu-shop', $uri . '/assets/js/shop.js', array(), $version, true );
	}

	if ( $is_product_context && file_exists( $dir . '/assets/js/product.js' ) ) {
		wp_enqueue_script( 'kimpu-product', $uri . '/assets/js/product.js', array( 'jquery' ), $version, true );
	}

	if ( ( $is_cart_context || $is_checkout ) && file_exists( $dir . '/assets/js/cart-interactions.js' ) ) {
		wp_enqueue_script( 'kimpu-cart-interactions', $uri . '/assets/js/cart-interactions.js', array(), $version, true );
	}

	$ratio = array( 'square' => '1/1', 'landscape' => '4/3', 'portrait' => '3/4' );
	$ratio = isset( $ratio[ kimpu_wc_mod( 'image_ratio', 'landscape' ) ] ) ? $ratio[ kimpu_wc_mod( 'image_ratio', 'landscape' ) ] : '4/3';
	$inline = ':root{--km-wc-columns:' . absint( kimpu_wc_product_columns() ) . ';--km-wc-image-ratio:' . esc_attr( $ratio ) . ';}';
	$inline .= '.km-wc-product-card__inner{border-radius:' . kimpu_wc_int( kimpu_wc_mod( 'card_radius', 10 ), 0, 32 ) . 'px;}.km-wc-home-products{padding-block:' . kimpu_wc_int( kimpu_wc_mod( 'section_spacing', 32 ), 0, 120 ) . 'px;}';
	if ( 'outline' === kimpu_wc_mod( 'button_style', 'primary' ) ) {
		$inline .= '.km-wc-button-style-outline .km-wc-product-card__actions .button{background:transparent;border:1px solid var(--km-primary,#137c66);color:var(--km-primary,#137c66);}';
	}
	if ( 'wide' === kimpu_wc_mod( 'container_width', 'default' ) ) {
		$inline .= '.km-wc-container{max-width:1440px;}';
	} elseif ( 'narrow' === kimpu_wc_mod( 'container_width', 'default' ) ) {
		$inline .= '.km-wc-container{max-width:960px;}';
	}
	wp_add_inline_style( 'kimpu-woocommerce', $inline );
}
add_action( 'wp_enqueue_scripts', 'kimpu_wc_enqueue_assets', 30 );
