<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function kimpu_setup() {
    load_theme_textdomain( 'kimpu-multipurpose', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array( 'height' => 72, 'width' => 240, 'flex-height' => true, 'flex-width' => true ) );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor.css' );
    register_nav_menus( array(
        'primary' => __( 'Primary Navigation', 'kimpu-multipurpose' ),
        'footer'  => __( 'Footer Navigation', 'kimpu-multipurpose' ),
    ) );
    add_theme_support( 'custom-background', array( 'default-color' => 'ffffff' ) );
}
add_action( 'after_setup_theme', 'kimpu_setup' );
function kimpu_content_width() { $GLOBALS['content_width'] = 840; }
add_action( 'after_setup_theme', 'kimpu_content_width', 0 );

function kimpu_widgets_init() {
    $areas = array(
        'footer-1' => __( 'Footer Column 1', 'kimpu-multipurpose' ),
        'footer-2' => __( 'Footer Column 2', 'kimpu-multipurpose' ),
        'footer-3' => __( 'Footer Column 3', 'kimpu-multipurpose' ),
        'footer-4' => __( 'Footer Column 4', 'kimpu-multipurpose' ),
    );
    foreach ( $areas as $id => $name ) {
        register_sidebar( array(
            'name'          => $name,
            'id'            => $id,
            'description'   => __( 'Optional widget area for the KimPu footer builder.', 'kimpu-multipurpose' ),
            'before_widget' => '<section class="footer-widget %2$s" id="%1$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="footer-widget-title">',
            'after_title'   => '</h2>',
        ) );
    }
}
add_action( 'widgets_init', 'kimpu_widgets_init' );
