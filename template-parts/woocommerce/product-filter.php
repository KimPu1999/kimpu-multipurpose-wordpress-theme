<?php
defined( 'ABSPATH' ) || exit;

$attributes = function_exists( 'wc_get_attribute_taxonomies' ) ? wc_get_attribute_taxonomies() : array();
$categories = get_terms( array( 'taxonomy' => 'product_cat', 'hide_empty' => true, 'parent' => 0 ) );
?>
<form class="km-wc-product-filter" method="get" action="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">
	<details>
		<summary><?php esc_html_e( 'Filter products', 'kimpu-multipurpose' ); ?></summary>
		<div class="km-wc-product-filter__fields">
			<label for="km-wc-category"><?php esc_html_e( 'Category', 'kimpu-multipurpose' ); ?></label>
			<select id="km-wc-category" name="product_cat">
				<option value=""><?php esc_html_e( 'All categories', 'kimpu-multipurpose' ); ?></option>
				<?php if ( ! is_wp_error( $categories ) ) : ?><?php foreach ( $categories as $category ) : ?><option value="<?php echo esc_attr( $category->slug ); ?>" <?php selected( isset( $_GET['product_cat'] ) ? sanitize_title( wp_unslash( $_GET['product_cat'] ) ) : '', $category->slug ); ?>><?php echo esc_html( $category->name ); ?></option><?php endforeach; ?><?php endif; ?>
			</select>
			<label for="km-wc-min-price"><?php esc_html_e( 'Minimum price', 'kimpu-multipurpose' ); ?></label>
			<input id="km-wc-min-price" type="number" name="min_price" min="0" step="0.01" value="<?php echo isset( $_GET['min_price'] ) ? esc_attr( wc_clean( wp_unslash( $_GET['min_price'] ) ) ) : ''; ?>">
			<label for="km-wc-max-price"><?php esc_html_e( 'Maximum price', 'kimpu-multipurpose' ); ?></label>
			<input id="km-wc-max-price" type="number" name="max_price" min="0" step="0.01" value="<?php echo isset( $_GET['max_price'] ) ? esc_attr( wc_clean( wp_unslash( $_GET['max_price'] ) ) ) : ''; ?>">
			<label for="km-wc-stock"><?php esc_html_e( 'Stock', 'kimpu-multipurpose' ); ?></label>
			<select id="km-wc-stock" name="stock_status">
				<option value=""><?php esc_html_e( 'All products', 'kimpu-multipurpose' ); ?></option>
				<option value="instock" <?php selected( isset( $_GET['stock_status'] ) ? sanitize_key( wp_unslash( $_GET['stock_status'] ) ) : '', 'instock' ); ?>><?php esc_html_e( 'In stock', 'kimpu-multipurpose' ); ?></option>
				<option value="outofstock" <?php selected( isset( $_GET['stock_status'] ) ? sanitize_key( wp_unslash( $_GET['stock_status'] ) ) : '', 'outofstock' ); ?>><?php esc_html_e( 'Out of stock', 'kimpu-multipurpose' ); ?></option>
			</select>
			<label for="km-wc-rating"><?php esc_html_e( 'Minimum rating', 'kimpu-multipurpose' ); ?></label>
			<select id="km-wc-rating" name="rating">
				<option value=""><?php esc_html_e( 'Any rating', 'kimpu-multipurpose' ); ?></option>
				<?php for ( $rating = 5; $rating >= 1; $rating-- ) : ?><option value="<?php echo esc_attr( $rating ); ?>" <?php selected( isset( $_GET['rating'] ) ? absint( $_GET['rating'] ) : 0, $rating ); ?>><?php echo esc_html( sprintf( _n( '%d star and up', '%d stars and up', $rating, 'kimpu-multipurpose' ), $rating ) ); ?></option><?php endfor; ?>
			</select>
			<label class="km-wc-checkbox"><input type="checkbox" name="on_sale" value="1" <?php checked( ! empty( $_GET['on_sale'] ) ); ?>> <?php esc_html_e( 'On sale', 'kimpu-multipurpose' ); ?></label>
			<?php foreach ( $attributes as $attribute ) : ?>
				<?php $taxonomy = wc_attribute_taxonomy_name( $attribute->attribute_name ); $terms = get_terms( array( 'taxonomy' => $taxonomy, 'hide_empty' => true ) ); ?>
				<?php if ( is_wp_error( $terms ) || empty( $terms ) ) { continue; } ?>
				<label for="km-wc-<?php echo esc_attr( $attribute->attribute_name ); ?>"><?php echo esc_html( $attribute->attribute_label ); ?></label>
				<select id="km-wc-<?php echo esc_attr( $attribute->attribute_name ); ?>" name="filter[<?php echo esc_attr( $taxonomy ); ?>]">
					<option value=""><?php esc_html_e( 'Any', 'kimpu-multipurpose' ); ?></option>
					<?php foreach ( $terms as $term ) : ?><option value="<?php echo esc_attr( $term->slug ); ?>" <?php selected( isset( $_GET['filter'][ $taxonomy ] ) ? sanitize_title( wp_unslash( $_GET['filter'][ $taxonomy ] ) ) : '', $term->slug ); ?>><?php echo esc_html( $term->name ); ?></option><?php endforeach; ?>
				</select>
			<?php endforeach; ?>
			<button class="km-button km-button-primary" type="submit"><?php esc_html_e( 'Apply filters', 'kimpu-multipurpose' ); ?></button>
			<a class="km-button km-button-text" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e( 'Clear filters', 'kimpu-multipurpose' ); ?></a>
		</div>
	</details>
</form>
