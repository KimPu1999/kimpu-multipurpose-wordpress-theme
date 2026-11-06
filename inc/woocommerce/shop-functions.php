<?php
/**
 * WooCommerce shop and homepage product helpers.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kimpu_wc_shop_layout_class() {
	$layout = kimpu_wc_mod( 'shop_layout', 'grid' );
	return in_array( $layout, array( 'grid', 'list', 'storefront' ), true ) ? $layout : 'grid';
}

function kimpu_wc_home_product_query( $type, $limit = 4 ) {
	if ( ! kimpu_wc_is_active() ) {
		return array();
	}

	$limit = max( 1, min( 24, absint( $limit ) ) );
	$args  = array(
		'limit'              => $limit,
		'status'             => 'publish',
		'catalog_visibility' => 'visible',
	);

	// Keep product retrieval in WooCommerce's public product API.
	switch ( $type ) {
		case 'featured_products':
			$args['featured'] = true;
			$args['orderby']  = 'date';
			$args['order']    = 'DESC';
			break;
		case 'best_selling_products':
			$args['orderby'] = 'popularity';
			$args['order']   = 'DESC';
			break;
		case 'on_sale_products':
			$ids = function_exists( 'wc_get_product_ids_on_sale' ) ? wc_get_product_ids_on_sale() : array();
			$args['include'] = array_slice( array_map( 'absint', $ids ), 0, $limit );
			if ( empty( $args['include'] ) ) {
				return array();
			}
			break;
		case 'new_arrivals':
		default:
			$args['orderby'] = 'date';
			$args['order']   = 'DESC';
			break;
	}

	return wc_get_products( $args );
}

function kimpu_wc_render_home_product_section( $type ) {
	if ( ! kimpu_wc_is_active() ) {
		return;
	}

	$limit   = kimpu_wc_int( get_theme_mod( 'kimpu_home_' . $type . '_limit', 4 ), 1, 24 );
	$columns = kimpu_wc_int( get_theme_mod( 'kimpu_home_' . $type . '_columns', 4 ), 2, 4 );
	$items  = kimpu_wc_home_product_query( $type, $limit );

	if ( empty( $items ) ) {
		return;
	}

	$section_id = sanitize_title( $type );
	?>
	<section id="<?php echo esc_attr( $section_id ); ?>" class="km-home-section km-wc-home-products km-wc-home-<?php echo esc_attr( $type ); ?>">
		<div class="km-container">
			<?php if ( function_exists( 'kimpu_homepage_section_header' ) ) : ?>
				<?php kimpu_homepage_section_header( $type ); ?>
			<?php endif; ?>
			<ul class="products columns-<?php echo esc_attr( $columns ); ?> km-wc-product-grid">
				<?php foreach ( $items as $product ) : ?>
					<?php
					global $post;
					$post = get_post( $product->get_id() );
					setup_postdata( $post );
					wc_get_template_part( 'content', 'product' );
					?>
				<?php endforeach; ?>
			</ul>
			<?php wp_reset_postdata(); ?>
			<?php
			$view_all = get_theme_mod( 'kimpu_home_' . $type . '_view_all_url', '' );
			if ( $view_all ) :
				?>
				<p class="km-wc-section-link"><a class="km-button km-button-secondary" href="<?php echo esc_url( $view_all ); ?>"><?php esc_html_e( 'View all products', 'kimpu-multipurpose' ); ?></a></p>
			<?php endif; ?>
		</div>
	</section>
	<?php
}

function kimpu_wc_render_product_categories_section() {
	if ( ! kimpu_wc_is_active() ) {
		return;
	}

	$terms = get_terms(
		array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => true,
			'number'     => kimpu_wc_int( get_theme_mod( 'kimpu_home_product_categories_limit', 6 ), 1, 24 ),
			'parent'     => 0,
		)
	);

	if ( is_wp_error( $terms ) || empty( $terms ) ) {
		return;
	}
	?>
	<section id="product-categories" class="km-home-section km-wc-product-categories">
		<div class="km-container">
			<?php if ( function_exists( 'kimpu_homepage_section_header' ) ) : ?>
				<?php kimpu_homepage_section_header( 'product_categories' ); ?>
			<?php endif; ?>
			<div class="km-wc-category-grid">
				<?php foreach ( $terms as $term ) : ?>
					<?php $thumbnail_id = absint( get_term_meta( $term->term_id, 'thumbnail_id', true ) ); ?>
					<a class="km-wc-category-card" href="<?php echo esc_url( get_term_link( $term ) ); ?>">
						<?php if ( $thumbnail_id ) : ?>
							<?php echo wp_get_attachment_image( $thumbnail_id, 'medium', false, array( 'loading' => 'lazy' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<?php endif; ?>
						<span class="km-wc-category-card__body"><strong><?php echo esc_html( $term->name ); ?></strong><small><?php echo esc_html( sprintf( _n( '%d product', '%d products', $term->count, 'kimpu-multipurpose' ), $term->count ) ); ?></small></span>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php
}
