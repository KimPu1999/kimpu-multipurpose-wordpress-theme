<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function kimpu_sanitize_social_url( $value ) {
    $value = trim( (string) $value );
    if ( '' === $value ) {
        return '';
    }
    if ( 0 === strpos( $value, '//' ) ) {
        $value = 'https:' . $value;
    } elseif ( ! preg_match( '#^[a-z][a-z0-9+.-]*://#i', $value ) ) {
        $value = 'https://' . $value;
    }
    return esc_url_raw( $value, array( 'http', 'https' ) );
}

function kimpu_register_social_settings( $c ) {
    $c->add_section( 'kimpu_social', array( 'title' => __( 'Social Links', 'kimpu-multipurpose' ), 'priority' => 32 ) );
    $networks = array( 'facebook' => 'Facebook', 'instagram' => 'Instagram', 'youtube' => 'YouTube', 'linkedin' => 'LinkedIn', 'x' => 'X / Twitter', 'tiktok' => 'TikTok', 'github' => 'GitHub', 'whatsapp' => 'WhatsApp' );
    foreach ( $networks as $key => $label ) { $id = 'kimpu_social_' . $key; $c->add_setting( $id, array( 'default' => '', 'sanitize_callback' => 'kimpu_sanitize_social_url' ) ); $c->add_control( $id, array( 'label' => $label . ' URL', 'section' => 'kimpu_social', 'type' => 'url' ) ); }
}
