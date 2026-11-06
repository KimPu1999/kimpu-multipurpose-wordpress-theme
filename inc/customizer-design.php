<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function kimpu_register_design_settings( $c ) {
    $c->add_section( 'kimpu_design', array( 'title' => __( 'Global Design', 'kimpu-multipurpose' ), 'priority' => 35 ) );
    $colors = array( 'kimpu_primary_color' => array( '#137c66', __( 'Primary Color', 'kimpu-multipurpose' ) ), 'kimpu_text_color' => array( '#34465a', __( 'Text Color', 'kimpu-multipurpose' ) ), 'kimpu_background_color' => array( '#ffffff', __( 'Background Color', 'kimpu-multipurpose' ) ) );
    foreach ( $colors as $id => $data ) { $c->add_setting( $id, array( 'default' => $data[0], 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'refresh' ) ); $c->add_control( new WP_Customize_Color_Control( $c, $id, array( 'label' => $data[1], 'section' => 'kimpu_design' ) ) ); }
    $c->add_setting( 'kimpu_container_width', array( 'default' => 1200, 'sanitize_callback' => 'absint' ) ); $c->add_control( 'kimpu_container_width', array( 'label' => __( 'Container Width (px)', 'kimpu-multipurpose' ), 'section' => 'kimpu_design', 'type' => 'number', 'input_attrs' => array( 'min' => 960, 'max' => 1600, 'step' => 10 ) ) );
    $c->add_setting( 'kimpu_button_radius', array( 'default' => 10, 'sanitize_callback' => 'absint' ) ); $c->add_control( 'kimpu_button_radius', array( 'label' => __( 'Button Radius (px)', 'kimpu-multipurpose' ), 'section' => 'kimpu_design', 'type' => 'number', 'input_attrs' => array( 'min' => 0, 'max' => 30 ) ) );
}
