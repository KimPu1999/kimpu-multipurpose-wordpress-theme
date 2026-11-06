<?php
/**
 * Performance-oriented hooks that complement WordPress core loading behavior.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Preload only the explicitly configured homepage hero image.
 *
 * @param array $preloads Existing preload resources.
 * @return array
 */
function kimpu_preload_hero_image( $preloads ) {
	if ( ! is_front_page() ) {
		return $preloads;
	}
	if ( function_exists( 'kimpu_homepage_section_enabled' ) && ! kimpu_homepage_section_enabled( 'hero' ) ) {
		return $preloads;
	}

	$background_id = absint( get_theme_mod( 'kimpu_hero_background_image', 0 ) );
	$image_id      = $background_id;
	if ( ! $image_id && 'centered' !== get_theme_mod( 'kimpu_home_hero_layout', 'split' ) ) {
		$image_id = absint( get_theme_mod( 'kimpu_hero_featured_image', 0 ) );
	}

	$url = $image_id ? wp_get_attachment_image_url( $image_id, 'large' ) : '';
	if ( ! $url ) {
		return $preloads;
	}

	$preloads[] = array(
		'href'          => esc_url_raw( $url ),
		'as'            => 'image',
		'fetchpriority' => 'high',
	);

	return $preloads;
}
add_filter( 'wp_preload_resources', 'kimpu_preload_hero_image' );

/**
 * Let WordPress add its normal loading attributes, while ensuring decoded
 * images do not block the main thread.
 *
 * @param string $value Existing decoding value.
 * @return string
 */
function kimpu_image_decoding_attribute( $value ) {
	return $value ? $value : 'async';
}
add_filter( 'wp_img_tag_add_decoding_attr', 'kimpu_image_decoding_attribute' );
