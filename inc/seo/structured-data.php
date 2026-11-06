<?php
/**
 * Minimal schema fallback with plugin and WooCommerce ownership guards.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kimpu_seo_output_structured_data() {
	if ( kimpu_seo_plugin_active() || ( function_exists( 'kimpu_wc_is_active' ) && kimpu_wc_is_active() && function_exists( 'is_product' ) && is_product() ) ) {
		return;
	}

	$graph = array(
		array(
			'@type' => 'Organization',
			'@id'   => home_url( '#organization' ),
			'name'  => get_bloginfo( 'name' ),
			'url'   => home_url( '/' ),
		),
	);

	if ( is_front_page() ) {
		$graph[] = array(
			'@type'       => 'WebSite',
			'@id'         => home_url( '#website' ),
			'url'         => home_url( '/' ),
			'name'        => get_bloginfo( 'name' ),
			'publisher'   => array( '@id' => home_url( '#organization' ) ),
		);
	}

	if ( is_singular( 'post' ) ) {
		$graph[] = array(
			'@type'         => 'BlogPosting',
			'@id'           => get_permalink() . '#article',
			'headline'      => wp_strip_all_tags( get_the_title() ),
			'datePublished' => get_the_date( DATE_W3C ),
			'dateModified'  => get_the_modified_date( DATE_W3C ),
			'url'           => get_permalink(),
			'author'        => array( '@type' => 'Person', 'name' => get_the_author() ),
			'publisher'     => array( '@id' => home_url( '#organization' ) ),
		);
	}

	echo '<script type="application/ld+json">' . wp_json_encode( array( '@context' => 'https://schema.org', '@graph' => $graph ), JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}
add_action( 'wp_head', 'kimpu_seo_output_structured_data', 30 );
