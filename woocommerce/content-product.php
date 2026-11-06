<?php
/**
 * Product card template.
 *
 * @package KimPu_Multipurpose
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product || ! $product->is_visible() ) {
	return;
}

get_template_part( 'template-parts/woocommerce/product-card' );
