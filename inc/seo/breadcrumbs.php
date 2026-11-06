<?php
/**
 * Optional accessible breadcrumb fallback.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kimpu_seo_breadcrumbs_enabled() {
	return (bool) get_theme_mod( 'kimpu_seo_breadcrumbs_enabled', true ) && ! kimpu_seo_plugin_active();
}

function kimpu_seo_breadcrumb_items() {
	$items = array( array( 'label' => __( 'Home', 'kimpu-multipurpose' ), 'url' => home_url( '/' ) ) );

	if ( is_singular() ) {
		if ( is_singular( 'post' ) ) {
			$categories = get_the_category();
			if ( ! empty( $categories ) ) {
				$items[] = array( 'label' => $categories[0]->name, 'url' => get_category_link( $categories[0]->term_id ) );
			}
		} elseif ( is_page() ) {
			$ancestors = array_reverse( get_post_ancestors( get_the_ID() ) );
			foreach ( $ancestors as $ancestor ) {
				$items[] = array( 'label' => get_the_title( $ancestor ), 'url' => get_permalink( $ancestor ) );
			}
		}
		$items[] = array( 'label' => get_the_title(), 'url' => '' );
	} elseif ( is_category() || is_tag() || is_tax() ) {
		$term    = get_queried_object();
		$items[] = array( 'label' => $term->name, 'url' => '' );
	} elseif ( is_search() ) {
		$items[] = array( 'label' => sprintf( __( 'Search results for “%s”', 'kimpu-multipurpose' ), get_search_query() ), 'url' => '' );
	} elseif ( is_home() ) {
		$items[] = array( 'label' => get_the_title( get_option( 'page_for_posts' ) ) ?: __( 'Blog', 'kimpu-multipurpose' ), 'url' => '' );
	}

	return $items;
}

function kimpu_render_breadcrumbs() {
	if ( ! kimpu_seo_breadcrumbs_enabled() || is_front_page() || is_404() || is_page_template( 'page-templates/blank-canvas.php' ) ) {
		return;
	}
	if ( function_exists( 'kimpu_wc_is_active' ) && kimpu_wc_is_active() && ( ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) || ( function_exists( 'is_cart' ) && is_cart() ) || ( function_exists( 'is_checkout' ) && is_checkout() ) || ( function_exists( 'is_account_page' ) && is_account_page() ) ) ) {
		return;
	}

	$separator = kimpu_seo_breadcrumb_separator();
	$items     = kimpu_seo_breadcrumb_items();
	if ( count( $items ) < 2 ) {
		return;
	}
	?>
	<nav class="km-breadcrumbs" aria-label="<?php esc_attr_e( 'Breadcrumbs', 'kimpu-multipurpose' ); ?>" style="--km-breadcrumb-separator:'<?php echo esc_attr( $separator ); ?>';">
		<ol>
			<?php foreach ( $items as $index => $item ) : ?><li><?php if ( $item['url'] && $index < count( $items ) - 1 ) : ?><a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a><?php else : ?><span aria-current="page"><?php echo esc_html( $item['label'] ); ?></span><?php endif; ?></li><?php endforeach; ?>
		</ol>
	</nav>
	<?php
}

function kimpu_seo_breadcrumb_separator() {
	$allowed = array( 'slash' => '/', 'chevron' => '›', 'arrow' => '→' );
	$key     = sanitize_key( get_theme_mod( 'kimpu_seo_breadcrumb_separator', 'slash' ) );
	return isset( $allowed[ $key ] ) ? $allowed[ $key ] : $allowed['slash'];
}
