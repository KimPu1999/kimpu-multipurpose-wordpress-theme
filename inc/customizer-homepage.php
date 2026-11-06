<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
require get_template_directory() . '/inc/customizer-hero.php';
require get_template_directory() . '/inc/customizer-sections.php';

function kimpu_customizer_page_choices() {
    $choices = array( 0 => __( '— Select a page —', 'kimpu-multipurpose' ) );
    foreach ( get_pages( array( 'sort_column' => 'post_title', 'post_status' => 'publish' ) ) as $page ) { $choices[ $page->ID ] = $page->post_title; }
    return $choices;
}
function kimpu_customizer_category_choices() {
    $choices = array( 0 => __( 'All categories', 'kimpu-multipurpose' ) );
    foreach ( get_categories( array( 'hide_empty' => false ) ) as $category ) { $choices[ $category->term_id ] = $category->name; }
    return $choices;
}
function kimpu_homepage_setting( $c, $id, $default, $sanitize, $transport = 'refresh' ) { $c->add_setting( $id, array( 'default' => $default, 'sanitize_callback' => $sanitize, 'transport' => $transport ) ); }
function kimpu_homepage_control( $c, $id, $label, $section, $type = 'text', $choices = array(), $description = '' ) { $args = array( 'label' => $label, 'section' => $section, 'type' => $type ); if ( $choices ) { $args['choices'] = $choices; } if ( $description ) { $args['description'] = $description; } $c->add_control( $id, $args ); }

function kimpu_register_homepage_settings( $c ) {
    $c->add_panel( 'kimpu_homepage_builder', array( 'title' => __( 'KimPu Homepage Builder', 'kimpu-multipurpose' ), 'priority' => 24 ) );
    $sections = array( 'general' => __( 'General Homepage', 'kimpu-multipurpose' ), 'hero' => __( 'Hero', 'kimpu-multipurpose' ), 'about' => __( 'About', 'kimpu-multipurpose' ), 'services' => __( 'Services', 'kimpu-multipurpose' ), 'features' => __( 'Features', 'kimpu-multipurpose' ), 'portfolio' => __( 'Portfolio', 'kimpu-multipurpose' ), 'statistics' => __( 'Statistics', 'kimpu-multipurpose' ), 'testimonials' => __( 'Testimonials', 'kimpu-multipurpose' ), 'team' => __( 'Team', 'kimpu-multipurpose' ), 'faq' => __( 'FAQ', 'kimpu-multipurpose' ), 'blog' => __( 'Blog', 'kimpu-multipurpose' ), 'cta' => __( 'CTA', 'kimpu-multipurpose' ), 'contact' => __( 'Contact', 'kimpu-multipurpose' ) );
    foreach ( $sections as $slug => $title ) { $c->add_section( 'kimpu_homepage_' . $slug, array( 'title' => $title, 'panel' => 'kimpu_homepage_builder' ) ); }
    $general = 'kimpu_homepage_general';
    kimpu_homepage_setting( $c, 'kimpu_homepage_layout', 'sections', function( $v ) { return in_array( $v, array( 'sections', 'content-first' ), true ) ? $v : 'sections'; } ); kimpu_homepage_control( $c, 'kimpu_homepage_layout', __( 'Homepage Layout', 'kimpu-multipurpose' ), $general, 'select', array( 'sections' => __( 'Builder Sections', 'kimpu-multipurpose' ), 'content-first' => __( 'Page Content First', 'kimpu-multipurpose' ) ) );
    kimpu_homepage_setting( $c, 'kimpu_homepage_section_order', implode( ',', kimpu_homepage_sections() ), 'kimpu_sanitize_homepage_order' ); kimpu_homepage_control( $c, 'kimpu_homepage_section_order', __( 'Section Order', 'kimpu-multipurpose' ), $general, 'textarea', array(), __( 'Enter section slugs separated by commas. Invalid or missing sections are safely appended. This is an ordered selector, not a fake drag-and-drop control.', 'kimpu-multipurpose' ) );
    kimpu_homepage_setting( $c, 'kimpu_homepage_spacing', 'comfortable', function( $v ) { return in_array( $v, array( 'compact', 'comfortable', 'spacious' ), true ) ? $v : 'comfortable'; } ); kimpu_homepage_control( $c, 'kimpu_homepage_spacing', __( 'Global Section Spacing', 'kimpu-multipurpose' ), $general, 'select', array( 'compact' => __( 'Compact', 'kimpu-multipurpose' ), 'comfortable' => __( 'Comfortable', 'kimpu-multipurpose' ), 'spacious' => __( 'Spacious', 'kimpu-multipurpose' ) ) );
    foreach ( array( 'kimpu_landing_header_layout' => __( 'Landing Header Layout', 'kimpu-multipurpose' ), 'kimpu_landing_footer_layout' => __( 'Landing Footer Layout', 'kimpu-multipurpose' ) ) as $id => $label ) {
        kimpu_homepage_setting( $c, $id, 'default', function( $v ) { return in_array( $v, array( 'default', 'centered', 'minimal' ), true ) ? $v : 'default'; } );
        kimpu_homepage_control( $c, $id, $label, $general, 'select', array( 'default' => __( 'Default', 'kimpu-multipurpose' ), 'centered' => __( 'Centered', 'kimpu-multipurpose' ), 'minimal' => __( 'Minimal', 'kimpu-multipurpose' ) ) );
    }
    kimpu_register_homepage_hero_controls( $c );
    kimpu_register_homepage_section_controls( $c );
}
