<?php
/** Theme bootstrap. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/elementor.php';
require get_template_directory() . '/inc/optimization/performance.php';
require get_template_directory() . '/inc/optimization/images.php';
require get_template_directory() . '/inc/optimization/scripts.php';
require get_template_directory() . '/inc/optimization/caching.php';
require get_template_directory() . '/inc/seo/setup.php';
require get_template_directory() . '/inc/accessibility/accessibility.php';
require get_template_directory() . '/inc/quality/diagnostics.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/navigation.php';
require get_template_directory() . '/inc/homepage.php';
require get_template_directory() . '/inc/woocommerce/setup.php';
require get_template_directory() . '/inc/blog-functions.php';
require get_template_directory() . '/inc/blog-query.php';
require get_template_directory() . '/inc/reading-time.php';
require get_template_directory() . '/inc/related-posts.php';
require get_template_directory() . '/inc/author-functions.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/inc/customizer.php';
