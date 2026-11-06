<?php
/**
 * Image sizes and safe image defaults.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kimpu_register_image_sizes() {
	add_image_size( 'kimpu-card', 640, 400, true );
	add_image_size( 'kimpu-hero', 1600, 900, true );
	add_image_size( 'kimpu-square', 640, 640, true );
}
add_action( 'after_setup_theme', 'kimpu_register_image_sizes', 12 );

/**
 * Keep explicit theme placeholders and SVGs from receiving image-only hints.
 * WordPress remains responsible for srcset, sizes, lazy loading, and alt text.
 *
 * @param array  $attributes Image attributes.
 * @param object $attachment Attachment object.
 * @return array
 */
function kimpu_image_attributes( $attributes, $attachment ) {
	if ( $attachment && 'image/svg+xml' === get_post_mime_type( $attachment->ID ) ) {
		unset( $attributes['loading'], $attributes['decoding'] );
	}

	return $attributes;
}
add_filter( 'wp_get_attachment_image_attributes', 'kimpu_image_attributes', 10, 2 );
