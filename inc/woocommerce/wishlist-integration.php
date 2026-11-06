<?php
/**
 * Optional wishlist presentation integration.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kimpu_wc_render_wishlist_link( $product = null ) {
	if ( ! kimpu_wc_is_wishlist_supported() || ! $product || ! is_a( $product, 'WC_Product' ) ) {
		return;
	}

	$url = kimpu_wc_wishlist_url( $product );
	if ( ! $url ) {
		return;
	}
	?>
	<a class="km-wc-wishlist-link" href="<?php echo esc_url( $url ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Add %s to your wishlist', 'kimpu-multipurpose' ), $product->get_name() ) ); ?>">&#9825; <span><?php esc_html_e( 'Wishlist', 'kimpu-multipurpose' ); ?></span></a>
	<?php
}
