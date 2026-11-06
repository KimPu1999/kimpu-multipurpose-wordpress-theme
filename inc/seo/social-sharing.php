<?php
/**
 * Social metadata ownership note and compatibility helper.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kimpu_seo_social_metadata_owner() {
	return kimpu_seo_plugin_active() ? 'seo-plugin' : 'kimpu-fallback';
}
