<?php
/**
 * Conservative SEO metadata fallback.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kimpu_seo_description() {
	if ( is_front_page() ) {
		$description = get_bloginfo( 'description' );
	} elseif ( is_singular() ) {
		$description = get_the_excerpt();
		if ( ! $description ) {
			$description = wp_trim_words( wp_strip_all_tags( strip_shortcodes( get_post_field( 'post_content', get_the_ID() ) ) ), 32 );
		}
	} elseif ( is_category() || is_tag() || is_tax() ) {
		$description = term_description();
	} else {
		$description = get_bloginfo( 'description' );
	}

	return trim( preg_replace( '/\s+/', ' ', wp_strip_all_tags( (string) $description ) ) );
}

function kimpu_seo_output_fallback_metadata() {
	if ( kimpu_seo_plugin_active() || is_admin() || is_feed() || is_robots() ) {
		return;
	}

	$description = kimpu_seo_description();
	if ( $description ) {
		echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
	}

	if ( ! is_front_page() && ! is_singular() ) {
		return;
	}

	$url   = is_singular() ? get_permalink() : home_url( '/' );
	$title = wp_get_document_title();
	$image = is_singular() && has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : '';
	$type  = is_singular( 'post' ) ? 'article' : 'website';

	echo '<meta property="og:type" content="' . esc_attr( $type ) . '">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $description ) . '">' . "\n";
	echo '<meta property="og:url" content="' . esc_url( $url ) . '">' . "\n";
	echo '<meta property="og:site_name" content="' . esc_attr( get_bloginfo( 'name' ) ) . '">' . "\n";
	if ( $image ) {
		echo '<meta property="og:image" content="' . esc_url( $image ) . '">' . "\n";
	}
	echo '<meta name="twitter:card" content="' . ( $image ? 'summary_large_image' : 'summary' ) . '">' . "\n";
}
add_action( 'wp_head', 'kimpu_seo_output_fallback_metadata', 20 );
