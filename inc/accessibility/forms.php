<?php
/**
 * Form accessibility defaults.
 *
 * @package KimPu_Multipurpose
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kimpu_comment_form_defaults( $defaults ) {
	$defaults['class_form'] = trim( $defaults['class_form'] . ' kimpu-accessible-form' );
	return $defaults;
}
add_filter( 'comment_form_defaults', 'kimpu_comment_form_defaults' );
