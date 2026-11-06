<?php
defined( 'ABSPATH' ) || exit;
if ( ! function_exists( 'kimpu_wc_is_active' ) || ! kimpu_wc_is_active() ) {
	return;
}

$image_id = absint( get_theme_mod( 'kimpu_home_promotional_banner_image', 0 ) );
$style    = $image_id ? ' style="background-image:url(' . esc_url( wp_get_attachment_image_url( $image_id, 'large' ) ) . ');"' : '';
?>
<section id="promotional-banner" class="km-home-section km-wc-promotional-banner"<?php echo $style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<div class="km-container">
		<div class="km-wc-promotional-banner__content">
			<?php kimpu_homepage_section_header( 'promotional_banner' ); ?>
			<?php $button_url = esc_url( get_theme_mod( 'kimpu_home_promotional_banner_button_url', '' ) ); ?>
			<?php if ( $button_url ) : ?><a class="km-button km-button-primary" href="<?php echo $button_url; ?>"><?php echo esc_html( get_theme_mod( 'kimpu_home_promotional_banner_button_text', __( 'Shop now', 'kimpu-multipurpose' ) ) ); ?></a><?php endif; ?>
		</div>
	</div>
</section>
