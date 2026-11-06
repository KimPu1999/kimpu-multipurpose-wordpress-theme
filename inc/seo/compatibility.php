<?php
/**
 * Optional SEO integration detection.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kimpu_seo_plugin_active() {
	return defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) || defined( 'AIOSEO_VERSION' ) || class_exists( 'AIOSEO\\Plugin\\Common\\Main' ) || function_exists( 'aioseo' );
}
