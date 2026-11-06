<?php
/**
 * WooCommerce single product template.
 *
 * @package KimPu_Multipurpose
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>
<div class="km-wc-single-page">
	<div class="km-container km-wc-container km-wc-single-layout-<?php echo esc_attr( kimpu_wc_mod( 'single_layout', 'standard' ) ); ?>">
		<?php do_action( 'woocommerce_before_main_content' ); ?>
		<?php if ( function_exists( 'woocommerce_breadcrumb' ) ) : ?><?php woocommerce_breadcrumb(); ?><?php endif; ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php do_action( 'woocommerce_before_single_product' ); ?>
			<?php wc_get_template_part( 'content', 'single-product' ); ?>
			<?php do_action( 'woocommerce_after_single_product' ); ?>
		<?php endwhile; ?>
		<?php do_action( 'woocommerce_after_main_content' ); ?>
	</div>
</div>
<?php get_footer( 'shop' ); ?>
