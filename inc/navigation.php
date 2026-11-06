<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
class KimPu_Nav_Walker extends Walker_Nav_Menu {
    private $current_parent_id = 0;

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat( "\t", $depth );
        $id = $this->current_parent_id ? ' id="submenu-' . absint( $this->current_parent_id ) . '"' : '';
        $output .= "\n$indent<ul class=\"sub-menu\"$id>\n";
    }
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes; $classes[] = 'menu-item-' . $item->ID; $has_children = in_array( 'menu-item-has-children', $classes, true );
        $this->current_parent_id = $item->ID;
        $output .= '<li class="' . esc_attr( implode( ' ', array_filter( $classes ) ) ) . '">';
        $atts = array( 'href' => ! empty( $item->url ) ? $item->url : '', 'class' => 'menu-link' );
        if ( ! empty( $item->current ) ) { $atts['aria-current'] = 'page'; }
        elseif ( ! empty( $item->current_item_ancestor ) ) { $atts['aria-current'] = 'true'; }
        $attributes = ''; foreach ( $atts as $attr => $value ) { if ( $value ) { $attributes .= ' ' . $attr . '="' . esc_attr( $value ) . '"'; } }
        $output .= '<a' . $attributes . '>' . esc_html( $item->title ) . '</a>';
        if ( $has_children ) { $output .= '<button class="submenu-toggle" type="button" aria-expanded="false" aria-controls="submenu-' . absint( $item->ID ) . '" aria-label="' . esc_attr( sprintf( __( 'Expand %s submenu', 'kimpu-multipurpose' ), $item->title ) ) . '"><span aria-hidden="true">⌄</span></button>'; }
    }
}

function kimpu_nav_menu_args( $args ) { if ( isset( $args['theme_location'] ) && in_array( $args['theme_location'], array( 'primary', 'footer' ), true ) ) { $args['walker'] = new KimPu_Nav_Walker(); } return $args; }
add_filter( 'wp_nav_menu_args', 'kimpu_nav_menu_args' );
