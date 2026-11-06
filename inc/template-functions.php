<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function kimpu_get_social_links() {
    $networks = array( 'facebook' => 'Facebook', 'instagram' => 'Instagram', 'youtube' => 'YouTube', 'linkedin' => 'LinkedIn', 'x' => 'X', 'tiktok' => 'TikTok', 'github' => 'GitHub', 'whatsapp' => 'WhatsApp' );
    $links = array();
    foreach ( $networks as $key => $label ) { $url = esc_url( get_theme_mod( 'kimpu_social_' . $key, '' ) ); if ( $url ) { $links[ $key ] = array( 'label' => $label, 'url' => $url ); } }
    return $links;
}

function kimpu_social_icon( $network ) {
    $paths = array( 'facebook' => '<path d="M14 8h-2V6c0-.6.4-1 1-1h1V2h-2c-2.2 0-4 1.8-4 4v2H6v3h2v7h4v-7h2l.5-3Z"/>', 'instagram' => '<rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r=".7" fill="currentColor" stroke="none"/>', 'youtube' => '<path d="M21 8.2a2.8 2.8 0 0 0-2-2C17.2 5.7 12 5.7 12 5.7s-5.2 0-7 .5a2.8 2.8 0 0 0-2 2A29 29 0 0 0 2.5 12 29 29 0 0 0 3 15.8a2.8 2.8 0 0 0 2 2c1.8.5 7 .5 7 .5s5.2 0 7-.5a2.8 2.8 0 0 0 2-2 29 29 0 0 0 .5-3.8A29 29 0 0 0 21 8.2Z"/><path d="m10 15 5-3-5-3v6Z" fill="currentColor" stroke="none"/>', 'linkedin' => '<path d="M5 8H2v11h3V8ZM3.5 2a1.8 1.8 0 1 0 0 3.6A1.8 1.8 0 0 0 3.5 2ZM8 8h3v1.5A4.1 4.1 0 0 1 14.5 8c3 0 4.5 1.9 4.5 5.3V19h-3v-5.3c0-1.5-.5-2.7-2-2.7s-2 1.2-2 2.7V19h-3V8Z"/>', 'x' => '<path d="M4 3h4.2l3.1 4.5L15.3 3H20l-6.4 7.1L20.5 21h-4.2L12.8 16 8 21H3.4l6.7-7.5L4 3Z"/>', 'tiktok' => '<path d="M14 3v10.2a3.8 3.8 0 1 1-3-3.7v3.1a1 1 0 1 0 1 1V3h3c.3 1.8 1.4 3 3 3.4v3A6.2 6.2 0 0 1 14 8V3Z"/>', 'github' => '<path d="M12 2a10 10 0 0 0-3.2 19.5c.5.1.7-.2.7-.5v-1.8c-2.8.6-3.4-1.2-3.4-1.2-.5-1.1-1.1-1.4-1.1-1.4-.9-.6.1-.6.1-.6 1 0 1.5 1 1.5 1 .9 1.5 2.3 1.1 2.9.8.1-.6.4-1.1.7-1.3-2.2-.3-4.5-1.1-4.5-4.9 0-1.1.4-2 1-2.7-.1-.3-.4-1.3.1-2.7 0 0 .8-.3 2.8 1a9.5 9.5 0 0 1 5.1 0c2-1.3 2.8-1 2.8-1 .5 1.4.2 2.4.1 2.7.6.7 1 1.6 1 2.7 0 3.8-2.3 4.6-4.5 4.9.4.3.7 1 .7 2v2.9c0 .3.2.6.7.5A10 10 0 0 0 12 2Z"/>', 'whatsapp' => '<path d="M20 4.1A9.9 9.9 0 0 0 4.2 16.2L2 22l6-2.1A10 10 0 1 0 20 4.1Zm-8 15.3a8 8 0 0 1-4-1.1l-.3-.2-3.5 1.2 1.2-3.4-.2-.3a8 8 0 1 1 6.8 3.8Z"/><path d="M16.8 14.6c-.2-.1-1.4-.7-1.6-.8-.2-.1-.4-.1-.5.1l-.7.9c-.1.1-.3.2-.5.1-1.7-.8-2.8-2.4-2.9-2.5-.1-.2 0-.3.1-.4l.4-.5c.1-.1.1-.2.2-.4 0-.1 0-.3-.1-.4l-.7-1.6c-.2-.4-.4-.4-.5-.4h-.4c-.1 0-.4.1-.6.3-.2.2-.8.8-.8 2s.8 2.3.9 2.4c.1.2 1.6 2.5 3.9 3.4 1.5.6 2.1.7 2.8.6.5-.1 1.4-.6 1.6-1.2.2-.6.2-1.1.1-1.2-.1-.1-.3-.2-.5-.3Z" fill="currentColor" stroke="none"/>' );
    return isset( $paths[ $network ] ) ? '<svg class="social-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">' . $paths[ $network ] . '</svg>' : '';
}

function kimpu_render_social_links() {
    $links = kimpu_get_social_links(); if ( empty( $links ) ) { return; }
    echo '<div class="social-links" aria-label="' . esc_attr__( 'Social media links', 'kimpu-multipurpose' ) . '">';
    foreach ( $links as $network => $link ) { echo '<a class="social-link social-link-' . esc_attr( $network ) . '" href="' . esc_url( $link['url'] ) . '" target="_blank" rel="noopener noreferrer" aria-label="' . esc_attr( $link['label'] ) . '">' . kimpu_social_icon( $network ) . '</a>'; }
    echo '</div>';
}

function kimpu_render_search_button() { ?><button class="header-search-toggle" type="button" aria-expanded="false" aria-controls="header-search" aria-label="<?php esc_attr_e( 'Open search', 'kimpu-multipurpose' ); ?>"><span aria-hidden="true">⌕</span></button><div class="header-search" id="header-search" hidden><?php get_search_form(); ?></div><?php }
