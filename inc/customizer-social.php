<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function kimpu_register_social_settings( $c ) {
    $c->add_section( 'kimpu_social', array( 'title' => __( 'Social Links', 'kimpu-multipurpose' ), 'priority' => 32 ) );
    $networks = array( 'facebook' => 'Facebook', 'instagram' => 'Instagram', 'youtube' => 'YouTube', 'linkedin' => 'LinkedIn', 'x' => 'X / Twitter', 'tiktok' => 'TikTok', 'github' => 'GitHub', 'whatsapp' => 'WhatsApp' );
    foreach ( $networks as $key => $label ) { $id = 'kimpu_social_' . $key; $c->add_setting( $id, array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) ); $c->add_control( $id, array( 'label' => $label . ' URL', 'section' => 'kimpu_social', 'type' => 'url' ) ); }
}
