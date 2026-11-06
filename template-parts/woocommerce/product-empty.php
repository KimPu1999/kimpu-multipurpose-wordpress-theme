<?php
defined( 'ABSPATH' ) || exit;
?>
<div class="km-wc-empty-state">
	<h2><?php esc_html_e( 'No products found', 'kimpu-multipurpose' ); ?></h2>
	<p><?php esc_html_e( 'Try changing your search or clearing one of the filters.', 'kimpu-multipurpose' ); ?></p>
	<a class="km-button km-button-primary" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e( 'Browse all products', 'kimpu-multipurpose' ); ?></a>
</div>
