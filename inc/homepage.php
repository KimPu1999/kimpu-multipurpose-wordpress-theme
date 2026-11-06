<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function kimpu_homepage_sections() {
    return array( 'hero', 'about', 'services', 'features', 'portfolio', 'statistics', 'testimonials', 'team', 'faq', 'latest', 'cta', 'contact' );
}

function kimpu_homepage_section_defaults() {
    return array( 'hero' => true, 'about' => true, 'services' => false, 'features' => false, 'portfolio' => false, 'statistics' => false, 'testimonials' => false, 'team' => false, 'faq' => false, 'latest' => true, 'cta' => false, 'contact' => false );
}

function kimpu_sanitize_homepage_order( $value ) {
    $allowed = kimpu_homepage_sections(); $requested = preg_split( '/[\s,]+/', strtolower( (string) $value ), -1, PREG_SPLIT_NO_EMPTY ); $order = array();
    foreach ( $requested as $section ) { if ( in_array( $section, $allowed, true ) && ! in_array( $section, $order, true ) ) { $order[] = $section; } }
    foreach ( $allowed as $section ) { if ( ! in_array( $section, $order, true ) ) { $order[] = $section; } }
    return implode( ',', $order );
}

function kimpu_homepage_section_enabled( $section ) { $defaults = kimpu_homepage_section_defaults(); return (bool) get_theme_mod( 'kimpu_home_' . $section . '_enabled', $defaults[ $section ] ); }
function kimpu_homepage_section_value( $section, $key, $default = '' ) {
    if ( '' === $default && 'title' === $key ) { $default = array( 'about' => __( 'Everything starts with a strong foundation.', 'kimpu-multipurpose' ), 'services' => __( 'Services built around your goals.', 'kimpu-multipurpose' ), 'features' => __( 'A better way to move forward.', 'kimpu-multipurpose' ), 'portfolio' => __( 'Selected work and projects.', 'kimpu-multipurpose' ), 'statistics' => __( 'Progress you can measure.', 'kimpu-multipurpose' ), 'testimonials' => __( 'What clients say.', 'kimpu-multipurpose' ), 'team' => __( 'Meet the people behind the work.', 'kimpu-multipurpose' ), 'faq' => __( 'Frequently asked questions.', 'kimpu-multipurpose' ), 'latest' => __( 'Latest articles', 'kimpu-multipurpose' ), 'cta' => __( 'Ready for what comes next?', 'kimpu-multipurpose' ), 'contact' => __( 'Let’s start a conversation.', 'kimpu-multipurpose' ) ); $default = isset( $default[ $section ] ) ? $default[ $section ] : ''; }
    return get_theme_mod( 'kimpu_home_' . $section . '_' . $key, $default );
}

function kimpu_homepage_section_classes( $section ) {
    $background = sanitize_html_class( kimpu_homepage_section_value( $section, 'background', 'white' ) ); $spacing = sanitize_html_class( kimpu_homepage_section_value( $section, 'spacing', 'comfortable' ) );
    return 'homepage-section homepage-section-' . esc_attr( $section ) . ' homepage-bg-' . esc_attr( $background ) . ' homepage-spacing-' . esc_attr( $spacing );
}

function kimpu_homepage_section_header( $section ) {
    $title = kimpu_homepage_section_value( $section, 'title', '' ); $subtitle = kimpu_homepage_section_value( $section, 'subtitle', '' ); $description = kimpu_homepage_section_value( $section, 'description', '' );
    if ( ! $title && ! $subtitle && ! $description ) { return; }
    echo '<header class="section-heading homepage-section-heading">'; if ( $subtitle ) { echo '<p class="eyebrow">' . esc_html( $subtitle ) . '</p>'; } if ( $title ) { echo '<h2>' . esc_html( $title ) . '</h2>'; } if ( $description ) { echo '<p>' . esc_html( $description ) . '</p>'; } echo '</header>';
}

function kimpu_homepage_source_page( $setting ) { $id = absint( get_theme_mod( $setting, 0 ) ); return $id ? get_post( $id ) : null; }
function kimpu_homepage_page_children( $setting, $limit = 0 ) { $page = kimpu_homepage_source_page( $setting ); if ( ! $page ) { return array(); } return get_pages( array( 'parent' => $page->ID, 'number' => $limit ? $limit : 0, 'sort_column' => 'menu_order,post_title', 'sort_order' => 'ASC', 'post_status' => 'publish' ) ); }

function kimpu_homepage_icon( $icon ) {
    $icons = array( 'star' => '✦', 'check' => '✓', 'spark' => '✧', 'arrow' => '→', 'grid' => '▦', 'heart' => '♡' ); return isset( $icons[ $icon ] ) ? $icons[ $icon ] : $icons['star'];
}

function kimpu_homepage_render_section( $section ) { get_template_part( 'template-parts/homepage/section', $section ); }
