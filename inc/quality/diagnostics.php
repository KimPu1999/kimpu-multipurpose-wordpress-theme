<?php
/**
 * Administrator-only, read-only theme diagnostics.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kimpu_register_diagnostics_page() {
	add_management_page( __( 'KimPu Diagnostics', 'kimpu-multipurpose' ), __( 'KimPu Diagnostics', 'kimpu-multipurpose' ), 'manage_options', 'kimpu-diagnostics', 'kimpu_render_diagnostics_page' );
}
add_action( 'admin_menu', 'kimpu_register_diagnostics_page' );

function kimpu_diagnostics_rows() {
	$theme = wp_get_theme();
	$assets = array( 'assets/css/main.css', 'assets/css/accessibility.css', 'assets/js/navigation.js' );
	$missing = array();
	foreach ( $assets as $asset ) {
		if ( ! file_exists( get_template_directory() . '/' . $asset ) ) {
			$missing[] = $asset;
		}
	}

	return array(
		__( 'WordPress', 'kimpu-multipurpose' )       => get_bloginfo( 'version' ),
		__( 'PHP', 'kimpu-multipurpose' )             => PHP_VERSION,
		__( 'Active theme', 'kimpu-multipurpose' )    => $theme->get( 'Name' ) . ' ' . $theme->get( 'Version' ),
		__( 'WooCommerce', 'kimpu-multipurpose' )    => function_exists( 'kimpu_wc_is_active' ) && kimpu_wc_is_active() ? __( 'Active', 'kimpu-multipurpose' ) : __( 'Not active', 'kimpu-multipurpose' ),
		__( 'External object cache', 'kimpu-multipurpose' ) => function_exists( 'kimpu_has_external_object_cache' ) && kimpu_has_external_object_cache() ? __( 'Enabled', 'kimpu-multipurpose' ) : __( 'Not detected', 'kimpu-multipurpose' ),
		__( 'Debug mode', 'kimpu-multipurpose' )      => defined( 'WP_DEBUG' ) && WP_DEBUG ? __( 'Enabled', 'kimpu-multipurpose' ) : __( 'Disabled', 'kimpu-multipurpose' ),
		__( 'Missing theme assets', 'kimpu-multipurpose' ) => empty( $missing ) ? __( 'None detected', 'kimpu-multipurpose' ) : implode( ', ', $missing ),
	);
}

function kimpu_render_diagnostics_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You do not have permission to view this page.', 'kimpu-multipurpose' ) );
	}
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'KimPu Diagnostics', 'kimpu-multipurpose' ); ?></h1>
		<p><?php esc_html_e( 'Read-only environment checks for theme compatibility. No performance score or private customer data is collected.', 'kimpu-multipurpose' ); ?></p>
		<table class="widefat striped"><tbody>
			<?php foreach ( kimpu_diagnostics_rows() as $label => $value ) : ?><tr><th scope="row"><?php echo esc_html( $label ); ?></th><td><?php echo esc_html( $value ); ?></td></tr><?php endforeach; ?>
		</tbody></table>
	</div>
	<?php
}
