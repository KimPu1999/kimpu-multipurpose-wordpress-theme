<?php
/**
 * WooCommerce Customizer settings.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kimpu_wc_sanitize_select( $value, $choices, $default ) {
	$value = sanitize_key( $value );
	return array_key_exists( $value, $choices ) ? $value : $default;
}

function kimpu_wc_add_setting( $wp_customize, $id, $default, $sanitize_callback, $transport = 'refresh' ) {
	$wp_customize->add_setting(
		$id,
		array(
			'default'           => $default,
			'sanitize_callback' => $sanitize_callback,
			'transport'         => $transport,
		)
	);
}

function kimpu_register_woocommerce_settings( $wp_customize ) {
	$wp_customize->add_panel(
		'kimpu_woocommerce_design',
		array(
			'title'       => __( 'KimPu WooCommerce Design', 'kimpu-multipurpose' ),
			'priority'    => 165,
			'description' => __( 'Presentation controls for optional WooCommerce pages. Product, order, tax, and payment data remain managed by WooCommerce.', 'kimpu-multipurpose' ),
		)
	);

	$sections = array(
		'kimpu_wc_shop_layout' => __( 'Shop Layout', 'kimpu-multipurpose' ),
		'kimpu_wc_product_cards' => __( 'Product Cards', 'kimpu-multipurpose' ),
		'kimpu_wc_single_product' => __( 'Single Product', 'kimpu-multipurpose' ),
		'kimpu_wc_cart_checkout' => __( 'Cart & Checkout', 'kimpu-multipurpose' ),
		'kimpu_wc_account' => __( 'Account Pages', 'kimpu-multipurpose' ),
		'kimpu_wc_header_cart' => __( 'Header Cart', 'kimpu-multipurpose' ),
		'kimpu_wc_homepage_products' => __( 'Homepage Products', 'kimpu-multipurpose' ),
	);

	foreach ( $sections as $id => $title ) {
		$wp_customize->add_section(
			$id,
			array(
				'title'    => $title,
				'panel'    => 'kimpu_woocommerce_design',
				'priority' => 10,
			)
		);
	}

	$selects = array(
		'kimpu_wc_shop_layout' => array( 'grid' => __( 'Standard Grid', 'kimpu-multipurpose' ), 'list' => __( 'Product List', 'kimpu-multipurpose' ), 'storefront' => __( 'Modern Storefront', 'kimpu-multipurpose' ) ),
		'kimpu_wc_sidebar_position' => array( 'right' => __( 'Right', 'kimpu-multipurpose' ), 'left' => __( 'Left', 'kimpu-multipurpose' ), 'none' => __( 'No Sidebar', 'kimpu-multipurpose' ) ),
		'kimpu_wc_container_width' => array( 'default' => __( 'Default', 'kimpu-multipurpose' ), 'wide' => __( 'Wide', 'kimpu-multipurpose' ), 'narrow' => __( 'Narrow', 'kimpu-multipurpose' ) ),
		'kimpu_wc_image_ratio' => array( 'square' => __( 'Square', 'kimpu-multipurpose' ), 'landscape' => __( 'Landscape', 'kimpu-multipurpose' ), 'portrait' => __( 'Portrait', 'kimpu-multipurpose' ) ),
		'kimpu_wc_button_style' => array( 'primary' => __( 'Primary', 'kimpu-multipurpose' ), 'outline' => __( 'Outline', 'kimpu-multipurpose' ) ),
		'kimpu_wc_single_layout' => array( 'standard' => __( 'Standard Two Column', 'kimpu-multipurpose' ), 'wide' => __( 'Wide Gallery', 'kimpu-multipurpose' ), 'minimal' => __( 'Minimal', 'kimpu-multipurpose' ) ),
		'kimpu_wc_gallery_style' => array( 'default' => __( 'WooCommerce Default', 'kimpu-multipurpose' ), 'stacked' => __( 'Stacked Gallery', 'kimpu-multipurpose' ) ),
		'kimpu_wc_account_navigation' => array( 'sidebar' => __( 'Sidebar Navigation', 'kimpu-multipurpose' ), 'tabs' => __( 'Tabs', 'kimpu-multipurpose' ) ),
		'kimpu_wc_mini_cart_behavior' => array( 'redirect' => __( 'Go to cart', 'kimpu-multipurpose' ), 'dropdown' => __( 'Dropdown when available', 'kimpu-multipurpose' ) ),
	);

	$locations = array(
		'kimpu_wc_shop_layout' => 'kimpu_wc_shop_layout',
		'kimpu_wc_sidebar_position' => 'kimpu_wc_shop_layout',
		'kimpu_wc_container_width' => 'kimpu_wc_shop_layout',
		'kimpu_wc_image_ratio' => 'kimpu_wc_product_cards',
		'kimpu_wc_button_style' => 'kimpu_wc_product_cards',
		'kimpu_wc_single_layout' => 'kimpu_wc_single_product',
		'kimpu_wc_gallery_style' => 'kimpu_wc_single_product',
		'kimpu_wc_account_navigation' => 'kimpu_wc_account',
		'kimpu_wc_mini_cart_behavior' => 'kimpu_wc_header_cart',
	);

	foreach ( $selects as $id => $choices ) {
		$default = array_key_first( $choices );
		kimpu_wc_add_setting( $wp_customize, $id, $default, function ( $value ) use ( $choices, $default ) {
			return kimpu_wc_sanitize_select( $value, $choices, $default );
		} );
		$wp_customize->add_control(
			$id,
			array(
				'label'   => ucwords( str_replace( array( 'kimpu_wc_', '_' ), array( '', ' ' ), $id ) ),
				'section' => $locations[ $id ],
				'type'    => 'select',
				'choices' => $choices,
			)
		);
	}

	$checkboxes = array(
		'kimpu_wc_show_rating' => array( true, __( 'Show product ratings', 'kimpu-multipurpose' ), 'kimpu_wc_product_cards' ),
		'kimpu_wc_show_category' => array( true, __( 'Show product category', 'kimpu-multipurpose' ), 'kimpu_wc_product_cards' ),
		'kimpu_wc_show_sale_badge' => array( true, __( 'Show sale badge', 'kimpu-multipurpose' ), 'kimpu_wc_product_cards' ),
		'kimpu_wc_show_stock_status' => array( false, __( 'Show stock status', 'kimpu-multipurpose' ), 'kimpu_wc_product_cards' ),
		'kimpu_wc_show_description_tab' => array( true, __( 'Show description tab', 'kimpu-multipurpose' ), 'kimpu_wc_single_product' ),
		'kimpu_wc_show_additional_tab' => array( true, __( 'Show additional information tab', 'kimpu-multipurpose' ), 'kimpu_wc_single_product' ),
		'kimpu_wc_show_reviews_tab' => array( true, __( 'Show reviews tab', 'kimpu-multipurpose' ), 'kimpu_wc_single_product' ),
		'kimpu_wc_show_cart' => array( true, __( 'Show cart icon in header', 'kimpu-multipurpose' ), 'kimpu_wc_header_cart' ),
		'kimpu_wc_show_cart_count' => array( true, __( 'Show cart item count', 'kimpu-multipurpose' ), 'kimpu_wc_header_cart' ),
		'kimpu_wc_show_mini_cart' => array( false, __( 'Enable mini cart presentation', 'kimpu-multipurpose' ), 'kimpu_wc_header_cart' ),
	);

	foreach ( $checkboxes as $id => $data ) {
		kimpu_wc_add_setting( $wp_customize, $id, $data[0], 'rest_sanitize_boolean' );
		$wp_customize->add_control( $id, array( 'label' => $data[1], 'section' => $data[2], 'type' => 'checkbox' ) );
	}

	$numbers = array(
		'kimpu_wc_product_columns' => array( 4, 1, 4, 'kimpu_wc_shop_layout' ),
		'kimpu_wc_products_per_page' => array( 12, 1, 48, 'kimpu_wc_shop_layout' ),
		'kimpu_wc_related_count' => array( 4, 0, 12, 'kimpu_wc_single_product' ),
		'kimpu_wc_card_radius' => array( 10, 0, 32, 'kimpu_wc_cart_checkout' ),
		'kimpu_wc_section_spacing' => array( 32, 0, 120, 'kimpu_wc_cart_checkout' ),
	);

	foreach ( $numbers as $id => $data ) {
		kimpu_wc_add_setting( $wp_customize, $id, $data[0], function ( $value ) use ( $data ) {
			return max( $data[1], min( $data[2], absint( $value ) ) );
		} );
		$wp_customize->add_control( $id, array( 'label' => ucwords( str_replace( array( 'kimpu_wc_', '_' ), array( '', ' ' ), $id ) ), 'section' => $data[3], 'type' => 'number', 'input_attrs' => array( 'min' => $data[1], 'max' => $data[2] ) ) );
	}

	$home_sections = array(
		'featured_products' => __( 'Featured Products', 'kimpu-multipurpose' ),
		'new_arrivals' => __( 'New Arrivals', 'kimpu-multipurpose' ),
		'best_selling_products' => __( 'Best Selling Products', 'kimpu-multipurpose' ),
		'on_sale_products' => __( 'On Sale Products', 'kimpu-multipurpose' ),
		'product_categories' => __( 'Product Categories', 'kimpu-multipurpose' ),
		'promotional_banner' => __( 'Promotional Banner', 'kimpu-multipurpose' ),
	);

	foreach ( $home_sections as $slug => $label ) {
		$section = 'kimpu_homepage_' . $slug;
		$wp_customize->add_section( $section, array( 'title' => $label, 'panel' => 'kimpu_homepage_builder', 'priority' => 80 ) );
		kimpu_wc_add_setting( $wp_customize, 'kimpu_home_' . $slug . '_enabled', false, 'rest_sanitize_boolean' );
		$wp_customize->add_control( 'kimpu_home_' . $slug . '_enabled', array( 'label' => sprintf( __( 'Enable %s', 'kimpu-multipurpose' ), $label ), 'section' => $section, 'type' => 'checkbox' ) );

		foreach ( array( 'title', 'subtitle', 'description' ) as $field ) {
			kimpu_wc_add_setting( $wp_customize, 'kimpu_home_' . $slug . '_' . $field, '', 'sanitize_textarea_field' );
			$wp_customize->add_control( 'kimpu_home_' . $slug . '_' . $field, array( 'label' => ucwords( $field ), 'section' => $section, 'type' => 'textarea' ) );
		}

		if ( 'promotional_banner' !== $slug ) {
			kimpu_wc_add_setting( $wp_customize, 'kimpu_home_' . $slug . '_limit', 4, function ( $value ) { return max( 1, min( 24, absint( $value ) ) ); } );
			$wp_customize->add_control( 'kimpu_home_' . $slug . '_limit', array( 'label' => 'product_categories' === $slug ? __( 'Category Limit', 'kimpu-multipurpose' ) : __( 'Product Limit', 'kimpu-multipurpose' ), 'section' => $section, 'type' => 'number', 'input_attrs' => array( 'min' => 1, 'max' => 24 ) ) );
			kimpu_wc_add_setting( $wp_customize, 'kimpu_home_' . $slug . '_columns', 4, function ( $value ) { return max( 2, min( 4, absint( $value ) ) ); } );
			$wp_customize->add_control( 'kimpu_home_' . $slug . '_columns', array( 'label' => __( 'Columns', 'kimpu-multipurpose' ), 'section' => $section, 'type' => 'number', 'input_attrs' => array( 'min' => 2, 'max' => 4 ) ) );
			kimpu_wc_add_setting( $wp_customize, 'kimpu_home_' . $slug . '_view_all_url', '', 'esc_url_raw' );
			$wp_customize->add_control( 'kimpu_home_' . $slug . '_view_all_url', array( 'label' => __( 'View All URL', 'kimpu-multipurpose' ), 'section' => $section, 'type' => 'url' ) );
		} else {
			kimpu_wc_add_setting( $wp_customize, 'kimpu_home_promotional_banner_button_text', __( 'Shop now', 'kimpu-multipurpose' ), 'sanitize_text_field' );
			$wp_customize->add_control( 'kimpu_home_promotional_banner_button_text', array( 'label' => __( 'Button Text', 'kimpu-multipurpose' ), 'section' => $section, 'type' => 'text' ) );
			kimpu_wc_add_setting( $wp_customize, 'kimpu_home_promotional_banner_button_url', '', 'esc_url_raw' );
			$wp_customize->add_control( 'kimpu_home_promotional_banner_button_url', array( 'label' => __( 'Button URL', 'kimpu-multipurpose' ), 'section' => $section, 'type' => 'url' ) );
			kimpu_wc_add_setting( $wp_customize, 'kimpu_home_promotional_banner_image', 0, 'absint' );
			$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'kimpu_home_promotional_banner_image', array( 'label' => __( 'Background Image', 'kimpu-multipurpose' ), 'section' => $section, 'mime_type' => 'image' ) ) );
		}
	}
}
