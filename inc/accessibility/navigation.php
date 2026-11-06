<?php
/**
 * Accessible menu markup helpers.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kimpu_accessible_menu_link_attributes( $atts, $item, $args, $depth ) {
	if ( ! empty( $item->current ) || ! empty( $item->current_item_ancestor ) ) {
		$atts['aria-current'] = ! empty( $item->current ) ? 'page' : 'true';
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'kimpu_accessible_menu_link_attributes', 10, 4 );
