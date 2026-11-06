<?php
/**
 * Header cart integration.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kimpu_wc_render_cart_icon() {
	if ( ! kimpu_wc_is_active() || ! kimpu_wc_mod( 'show_cart', true ) || ! function_exists( 'wc_get_cart_url' ) ) {
		return;
	}

	$count = function_exists( 'WC' ) && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
	?>
	<a class="kimpu-cart-link" href="<?php echo esc_url( wc_get_cart_url() ); ?>" aria-label="<?php esc_attr_e( 'View your shopping cart', 'kimpu-multipurpose' ); ?>">
		<span class="kimpu-cart-icon" aria-hidden="true">&#128722;</span>
		<?php if ( kimpu_wc_mod( 'show_cart_count', true ) ) : ?>
			<span class="kimpu-cart-count" aria-label="<?php echo esc_attr( sprintf( _n( '%d item in cart', '%d items in cart', $count, 'kimpu-multipurpose' ), $count ) ); ?>"><?php echo esc_html( $count ); ?></span>
		<?php endif; ?>
	</a>
	<?php
}

function kimpu_wc_cart_fragments( $fragments ) {
	if ( ! kimpu_wc_is_active() || ! kimpu_wc_mod( 'show_cart_count', true ) ) {
		return $fragments;
	}

	$count = function_exists( 'WC' ) && WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
	$fragments['.kimpu-cart-count'] = '<span class="kimpu-cart-count" aria-label="' . esc_attr( sprintf( _n( '%d item in cart', '%d items in cart', $count, 'kimpu-multipurpose' ), $count ) ) . '">' . esc_html( $count ) . '</span>';

	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'kimpu_wc_cart_fragments' );
