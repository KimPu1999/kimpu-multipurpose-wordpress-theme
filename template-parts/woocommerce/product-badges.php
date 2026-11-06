<?php
defined( 'ABSPATH' ) || exit;

global $product;
if ( ! $product ) {
	return;
}
?>
<div class="km-wc-product-badges" aria-label="<?php esc_attr_e( 'Product status', 'kimpu-multipurpose' ); ?>">
	<?php if ( kimpu_wc_mod( 'show_sale_badge', true ) && $product->is_on_sale() ) : ?><span class="km-wc-badge km-wc-badge--sale"><?php esc_html_e( 'Sale', 'kimpu-multipurpose' ); ?></span><?php endif; ?>
	<?php if ( ! $product->is_in_stock() ) : ?><span class="km-wc-badge km-wc-badge--out-of-stock"><?php esc_html_e( 'Out of stock', 'kimpu-multipurpose' ); ?></span><?php endif; ?>
	<?php if ( $product->is_featured() ) : ?><span class="km-wc-badge km-wc-badge--featured"><?php esc_html_e( 'Featured', 'kimpu-multipurpose' ); ?></span><?php endif; ?>
</div>
