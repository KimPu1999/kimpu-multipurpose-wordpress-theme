<?php
defined( 'ABSPATH' ) || exit;

global $product;
if ( ! $product ) {
	return;
}
?>
<div class="km-wc-product-details">
	<?php if ( $product->get_sku() ) : ?><span><?php esc_html_e( 'SKU:', 'kimpu-multipurpose' ); ?> <?php echo esc_html( $product->get_sku() ); ?></span><?php endif; ?>
	<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span>' . esc_html__( 'Category:', 'kimpu-multipurpose' ) . ' ', '</span>' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</div>
