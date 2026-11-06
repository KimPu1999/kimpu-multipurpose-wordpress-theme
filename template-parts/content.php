<article <?php post_class( 'article' ); ?> id="post-<?php the_ID(); ?>">
    <header class="entry-header"><h1 class="entry-title"><?php the_title(); ?></h1><?php if ( 'post' === get_post_type() ) : ?><p class="post-meta"><?php echo esc_html( get_the_date() ); ?></p><?php endif; ?></header>
    <?php if ( is_singular() && has_post_thumbnail() ) : ?><div class="entry-image"><?php the_post_thumbnail( 'large' ); ?></div><?php endif; ?>
    <div class="entry-content"><?php the_content(); wp_link_pages( array( 'before' => '<nav class="page-links">', 'after' => '</nav>' ) ); ?></div>
</article>
