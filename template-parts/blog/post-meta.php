<?php
$meta_items = array();
if ( kimpu_blog_show( 'category' ) ) { $categories = get_the_category_list( ', ' ); if ( $categories ) { $meta_items[] = '<span class="post-meta-category">' . wp_kses_post( $categories ) . '</span>'; } }
if ( kimpu_blog_show( 'author' ) ) { $meta_items[] = '<span class="post-meta-author">' . esc_html__( 'By', 'kimpu-multipurpose' ) . ' <a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'; }
if ( kimpu_blog_show( 'date' ) ) { $meta_items[] = '<time class="post-meta-date" datetime="' . esc_attr( get_the_date( DATE_W3C ) ) . '">' . esc_html( get_the_date() ) . '</time>'; }
if ( kimpu_blog_show( 'reading_time' ) && function_exists( 'kimpu_reading_time_text' ) && kimpu_reading_time_text() ) { $meta_items[] = '<span class="post-meta-reading-time">' . esc_html( kimpu_reading_time_text() ) . '</span>'; }
if ( $meta_items ) { echo '<div class="post-meta blog-post-meta">' . implode( '<span class="post-meta-separator" aria-hidden="true">·</span>', $meta_items ) . '</div>'; }
