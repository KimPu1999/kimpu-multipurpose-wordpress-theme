<?php
defined( 'ABSPATH' ) || exit;

$term = is_product_taxonomy() ? get_queried_object() : null;
?>
<header class="km-wc-shop-header">
	<?php if ( $term && ! empty( $term->name ) ) : ?>
		<?php $thumbnail_id = absint( get_term_meta( $term->term_id, 'thumbnail_id', true ) ); ?>
		<?php if ( $thumbnail_id ) : ?><div class="km-wc-shop-header__image"><?php echo wp_get_attachment_image( $thumbnail_id, 'large', false, array( 'loading' => 'eager' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div><?php endif; ?>
		<div class="km-wc-shop-header__content">
			<p class="eyebrow"><?php esc_html_e( 'Collection', 'kimpu-multipurpose' ); ?></p>
			<h1><?php echo esc_html( $term->name ); ?></h1>
			<?php if ( ! empty( $term->description ) ) : ?><div class="term-description"><?php echo wp_kses_post( wpautop( $term->description ) ); ?></div><?php endif; ?>
		</div>
	<?php else : ?>
		<p class="eyebrow"><?php esc_html_e( 'Store', 'kimpu-multipurpose' ); ?></p>
		<h1><?php woocommerce_page_title(); ?></h1>
		<?php if ( is_shop() && get_the_content() ) : ?><div class="term-description"><?php echo apply_filters( 'the_content', get_the_content() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div><?php endif; ?>
	<?php endif; ?>
	<?php if ( $term && is_tax( 'product_cat' ) ) : ?>
		<?php $children = get_terms( array( 'taxonomy' => 'product_cat', 'hide_empty' => true, 'parent' => $term->term_id ) ); ?>
		<?php if ( ! is_wp_error( $children ) && ! empty( $children ) ) : ?>
			<nav class="km-wc-child-categories" aria-label="<?php esc_attr_e( 'Subcategories', 'kimpu-multipurpose' ); ?>">
				<?php foreach ( $children as $child ) : ?><a href="<?php echo esc_url( get_term_link( $child ) ); ?>"><?php echo esc_html( $child->name ); ?></a><?php endforeach; ?>
			</nav>
		<?php endif; ?>
	<?php endif; ?>
	<div class="km-wc-shop-header__tools">
		<?php if ( function_exists( 'get_product_search_form' ) ) : ?><?php get_product_search_form(); ?><?php endif; ?>
	</div>
</header>
