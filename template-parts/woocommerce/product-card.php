<?php
defined( 'ABSPATH' ) || exit;

global $product;
if ( ! $product || ! $product->is_visible() ) {
	return;
}

$categories = kimpu_wc_product_categories( $product );
?>
<li <?php wc_product_class( kimpu_wc_product_card_classes( $product ), $product ); ?>>
	<article class="km-wc-product-card__inner">
		<a class="km-wc-product-card__image" href="<?php echo esc_url( $product->get_permalink() ); ?>" aria-label="<?php echo esc_attr( $product->get_name() ); ?>">
			<?php get_template_part( 'template-parts/woocommerce/product-badges' ); ?>
			<?php echo $product->get_image( 'woocommerce_thumbnail', array( 'loading' => 'lazy' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</a>
		<div class="km-wc-product-card__content">
			<?php if ( kimpu_wc_mod( 'show_category', true ) && ! empty( $categories ) ) : ?><p class="km-wc-product-card__category"><?php echo esc_html( $categories[0]->name ); ?></p><?php endif; ?>
			<h2 class="woocommerce-loop-product__title"><a href="<?php echo esc_url( $product->get_permalink() ); ?>"><?php echo esc_html( $product->get_name() ); ?></a></h2>
			<?php if ( kimpu_wc_mod( 'show_rating', true ) && $product->get_rating_count() ) : ?><div class="km-wc-product-card__rating"><?php echo wc_get_rating_html( $product->get_average_rating(), $product->get_rating_count() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div><?php endif; ?>
			<div class="price"><?php echo wp_kses_post( $product->get_price_html() ); ?></div>
			<?php if ( kimpu_wc_mod( 'show_stock_status', false ) ) : ?><p class="km-wc-stock <?php echo esc_attr( $product->is_in_stock() ? 'is-in-stock' : 'is-out-of-stock' ); ?>"><?php echo esc_html( $product->is_in_stock() ? __( 'In stock', 'kimpu-multipurpose' ) : __( 'Out of stock', 'kimpu-multipurpose' ) ); ?></p><?php endif; ?>
			<div class="km-wc-product-card__actions">
				<?php woocommerce_template_loop_add_to_cart(); ?>
				<a class="km-button km-button-text km-wc-view-product" href="<?php echo esc_url( $product->get_permalink() ); ?>"><?php esc_html_e( 'View product', 'kimpu-multipurpose' ); ?></a>
			</div>
		</div>
	</article>
</li>
