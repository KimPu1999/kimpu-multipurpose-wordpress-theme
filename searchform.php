<?php $search_id = wp_unique_id( 'kimpu-search-' ); ?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<label for="<?php echo esc_attr( $search_id ); ?>" class="screen-reader-text"><?php esc_html_e( 'Search for:', 'kimpu-multipurpose' ); ?></label>
<input id="<?php echo esc_attr( $search_id ); ?>" type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search articles...', 'kimpu-multipurpose' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" required>
<button class="button" type="submit"><?php esc_html_e( 'Search', 'kimpu-multipurpose' ); ?></button>
</form>
