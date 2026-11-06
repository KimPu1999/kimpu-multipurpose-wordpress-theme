<?php
defined( 'ABSPATH' ) || exit;
?>
<div class="km-wc-product-toolbar" aria-label="<?php esc_attr_e( 'Product results tools', 'kimpu-multipurpose' ); ?>">
	<?php woocommerce_result_count(); ?>
	<?php woocommerce_catalog_ordering(); ?>
</div>
