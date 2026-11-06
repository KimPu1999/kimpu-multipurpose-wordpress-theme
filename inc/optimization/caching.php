<?php
/**
 * Cache compatibility helpers.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kimpu_has_external_object_cache() {
	return function_exists( 'wp_using_ext_object_cache' ) && wp_using_ext_object_cache();
}
