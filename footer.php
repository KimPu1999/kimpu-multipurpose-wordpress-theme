<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<?php $footer_layout = get_theme_mod( 'kimpu_footer_layout', 'default' ); ?>
<footer class="site-footer site-footer-<?php echo esc_attr( $footer_layout ); ?><?php echo get_theme_mod( 'kimpu_footer_border', true ) ? ' has-border' : ''; ?>">
    <?php get_template_part( 'template-parts/footer/footer', $footer_layout ); ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>
