<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php $kimpu_elementor_footer_rendered = function_exists( 'kimpu_elementor_render_location' ) && kimpu_elementor_render_location( 'footer' ); ?>
<?php if ( ! $kimpu_elementor_footer_rendered && ( ! function_exists( 'kimpu_elementor_native_fallback_enabled' ) || kimpu_elementor_native_fallback_enabled( 'footer' ) ) ) : ?>
<?php $footer_layout = is_page_template( array( 'page-templates/landing.php', 'page-templates/landing-page.php' ) ) ? get_theme_mod( 'kimpu_landing_footer_layout', get_theme_mod( 'kimpu_footer_layout', 'default' ) ) : get_theme_mod( 'kimpu_footer_layout', 'default' ); ?>
<footer class="site-footer site-footer-<?php echo esc_attr( $footer_layout ); ?><?php echo get_theme_mod( 'kimpu_footer_border', true ) ? ' has-border' : ''; ?>">
    <?php get_template_part( 'template-parts/footer/footer', $footer_layout ); ?>
</footer>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
