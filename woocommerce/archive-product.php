<?php
/**
 * WooCommerce archive product template.
 *
 * @package KimPu_Multipurpose
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>
<div class="km-wc-shop-page">
	<div class="km-container km-wc-container km-wc-layout-<?php echo esc_attr( kimpu_wc_shop_layout_class() ); ?>">
		<?php do_action( 'woocommerce_before_main_content' ); ?>
		<?php if ( function_exists( 'woocommerce_breadcrumb' ) ) : ?><?php woocommerce_breadcrumb(); ?><?php endif; ?>
		<?php get_template_part( 'template-parts/woocommerce/shop-header' ); ?>
		<?php $sidebar_position = kimpu_wc_allowed( kimpu_wc_mod( 'sidebar_position', 'right' ), array( 'left', 'right', 'none' ), 'right' ); $has_sidebar = 'none' !== $sidebar_position && is_active_sidebar( 'blog-sidebar' ); ?>
		<div class="km-wc-shop-layout km-wc-shop-sidebar-<?php echo esc_attr( $sidebar_position ); ?><?php echo $has_sidebar ? ' has-sidebar' : ''; ?>">
			<div class="km-wc-shop-results">
				<?php get_template_part( 'template-parts/woocommerce/product-filter' ); ?>
				<?php if ( woocommerce_product_loop() ) : ?>
					<?php do_action( 'woocommerce_before_shop_loop' ); ?>
					<ul class="products columns-<?php echo esc_attr( kimpu_wc_product_columns() ); ?> km-wc-product-grid">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php wc_get_template_part( 'content', 'product' ); ?>
						<?php endwhile; ?>
					</ul>
					<?php do_action( 'woocommerce_after_shop_loop' ); ?>
				<?php else : ?>
					<?php get_template_part( 'template-parts/woocommerce/product-empty' ); ?>
				<?php endif; ?>
			</div>
			<?php if ( $has_sidebar ) : ?><aside class="km-wc-sidebar" aria-label="<?php esc_attr_e( 'Shop sidebar', 'kimpu-multipurpose' ); ?>"><?php dynamic_sidebar( 'blog-sidebar' ); ?></aside><?php endif; ?>
		</div>
		<?php do_action( 'woocommerce_after_main_content' ); ?>
	</div>
</div>
<?php get_footer( 'shop' ); ?>
