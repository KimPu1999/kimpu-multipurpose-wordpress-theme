<?php
/**
 * SEO module bootstrap.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_template_directory() . '/inc/seo/compatibility.php';
require_once get_template_directory() . '/inc/seo/metadata.php';
require_once get_template_directory() . '/inc/seo/structured-data.php';
require_once get_template_directory() . '/inc/seo/breadcrumbs.php';
require_once get_template_directory() . '/inc/seo/social-sharing.php';
