<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function kimpu_blog_defaults() {
    return array( 'layout' => 'grid', 'columns' => 3, 'featured' => true, 'sidebar_enabled' => false, 'sidebar_position' => 'right', 'sidebar_width' => '280px', 'show_image' => true, 'show_category' => true, 'show_author' => true, 'show_date' => true, 'show_excerpt' => true, 'show_reading_time' => true, 'single_layout' => 'narrow', 'single_sidebar' => false, 'single_featured_image' => true, 'toc_enabled' => false, 'toc_h3' => true, 'toc_collapsible' => true, 'reading_progress' => false, 'author_box' => true, 'share' => true, 'related_enabled' => true, 'related_count' => 3, 'related_columns' => 3, 'archive_layout' => 'grid', 'archive_description' => true, 'author_layout' => 'profile' );
}

function kimpu_blog_mod( $key, $fallback = null ) { $defaults = kimpu_blog_defaults(); return get_theme_mod( 'kimpu_blog_' . $key, null === $fallback && isset( $defaults[ $key ] ) ? $defaults[ $key ] : $fallback ); }
function kimpu_blog_is_listing() { return is_home() || is_archive() || is_search(); }
function kimpu_blog_layout() { $layout = kimpu_blog_is_listing() && is_archive() && 'grid' !== kimpu_blog_mod( 'archive_layout', 'grid' ) ? kimpu_blog_mod( 'archive_layout', 'grid' ) : kimpu_blog_mod( 'layout', 'grid' ); return in_array( $layout, array( 'grid', 'list', 'magazine' ), true ) ? $layout : 'grid'; }
function kimpu_blog_show( $key ) { return (bool) kimpu_blog_mod( $key, true ); }
function kimpu_blog_sidebar_enabled( $single = false ) { return $single ? (bool) kimpu_blog_mod( 'single_sidebar', false ) : (bool) kimpu_blog_mod( 'sidebar_enabled', false ); }
function kimpu_blog_sidebar_active( $single = false ) { if ( $single && 'full' === kimpu_blog_mod( 'single_layout', 'narrow' ) ) { return false; } $layout_requests_sidebar = $single && 'sidebar' === kimpu_blog_mod( 'single_layout', 'narrow' ); return ( kimpu_blog_sidebar_enabled( $single ) || $layout_requests_sidebar ) && is_active_sidebar( 'blog-sidebar' ); }
function kimpu_blog_sidebar_position() { return in_array( kimpu_blog_mod( 'sidebar_position', 'right' ), array( 'left', 'right' ), true ) ? kimpu_blog_mod( 'sidebar_position', 'right' ) : 'right'; }
function kimpu_blog_render_post_item( $layout = 'card', $heading_level = 2 ) { $layout = in_array( $layout, array( 'card', 'list', 'magazine' ), true ) ? $layout : 'card'; get_template_part( 'template-parts/blog/post', $layout, array( 'heading_level' => absint( $heading_level ) ?: 2 ) ); }
function kimpu_blog_render_loop( $query = null ) {
    global $wp_query;
    $loop = $query instanceof WP_Query ? $query : $wp_query;
    if ( ! $loop || ! $loop->have_posts() ) { return; }
    while ( $loop->have_posts() ) { $loop->the_post(); kimpu_blog_render_post_item( kimpu_blog_layout(), 2 ); }
    if ( $query instanceof WP_Query ) { wp_reset_postdata(); }
}

function kimpu_blog_prepare_toc_content( $content, $include_h3 = true ) {
    $items = array(); $used = array();
    $pattern = '/<h([23])([^>]*)>(.*?)<\/h\1>/is';
    $processed = preg_replace_callback( $pattern, function( $match ) use ( &$items, &$used, $include_h3 ) {
        $level = (int) $match[1]; if ( 3 === $level && ! $include_h3 ) { return $match[0]; }
        $label = trim( wp_strip_all_tags( html_entity_decode( $match[3], ENT_QUOTES, get_bloginfo( 'charset' ) ) ) ); if ( ! $label ) { return $match[0]; }
        $base = sanitize_title( $label ); if ( ! $base ) { $base = 'section'; } $id = $base; $index = 2; while ( in_array( $id, $used, true ) ) { $id = $base . '-' . $index; $index++; } $used[] = $id;
        $attrs = preg_replace( '/\s+id=(["\']).*?\1/i', '', $match[2] ); $attrs .= ' id="' . esc_attr( $id ) . '"'; $items[] = array( 'level' => $level, 'label' => $label, 'id' => $id );
        return '<h' . $level . $attrs . '>' . $match[3] . '</h' . $level . '>';
    }, $content );
    return array( 'content' => $processed ? $processed : $content, 'items' => $items );
}
