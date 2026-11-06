<article <?php post_class( 'post-card' ); ?>>
    <?php if ( has_post_thumbnail() ) : ?><a class="post-thumb" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium_large' ); ?></a><?php else : ?><div class="post-thumb placeholder" aria-hidden="true"></div><?php endif; ?>
    <div class="post-content"><p class="post-meta"><?php echo esc_html( get_the_date() ); ?></p><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p><a class="text-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read article', 'kimpu-multipurpose' ); ?> →</a></div>
</article>
