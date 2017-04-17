<?php
/**
 * TNI Template Tags
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gridbox
 * @subpackage tni
 * @since 0.1.0
 */

/**
 * Override Parent Theme Meta Entry
 *
 * @since 1.0.0
 */
function gridbox_entry_meta() {

    // Get theme options from database.
    $theme_options = gridbox_theme_options();

    $postmeta = '';

    // Display author unless user has deactivated it via settings.
    if ( true === $theme_options['meta_author'] ) {

        $postmeta .= gridbox_meta_author();

    }

    // Display date unless user has deactivated it via settings.
    if ( true === $theme_options['meta_date'] ) {

        $postmeta .= gridbox_meta_date();

    }

    if ( $postmeta ) {

        echo '<div class="entry-meta">' . $postmeta . '</div>';

    }
}

/**
 * Override Parent Theme Author Meta
 * If Co-authors Plus is active, return co-author links
 *
 * @since 0.5.0
 *
 * @uses coauthors_posts_links()
 * @uses get_author_posts_url()
 * @uses get_the_author()
 *
 * @return void
 */
function gridbox_meta_author() {

    if( function_exists( 'coauthors_posts_links' ) ) {
      $author_string = coauthors_posts_links( ', ', __( ' and ', 'tni' ), '<span class="author vcard">' . __( 'By ', 'tni' ), '</span>', false );
    } else {
      $author_string = sprintf( '<span class="author vcard">%s<a class="url fn n" href="%s" title="%s" rel="author">%s</a></span>',
          __( 'By ', 'tni' ),
          esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
          esc_attr( sprintf( esc_html__( 'View all posts by %s', 'tni' ),
          get_the_author() ) ),
          esc_html( get_the_author() )
      );
    }

    return '<span class="meta-author"> ' . $author_string . '</span>';
}

/**
 * Override Parent Archive Image Function
 *
 * @param string $size Post thumbnail size.
 * @param array  $attr Post thumbnail attributes.
 */
function gridbox_post_image( $size = 'thumbnail', $attr = array() ) {

  // Display Post Thumbnail.
  if ( has_post_thumbnail() ) : ?>

    <figure class="post-thumbnail">
      <a href="<?php the_permalink(); ?>" rel="bookmark">
        <?php the_post_thumbnail( $size, $attr ); ?>
      </a>
    </figure

  <?php
  endif;
}

/**
 * Override Parent Image Function
 *
 * @since 1.0.0
 *
 * @uses gridbox_theme_options()
 */
function gridbox_post_image_single( $size = 'full' ) {

    // Get theme options from database.
    $theme_options = gridbox_theme_options();

    // Display Post Thumbnail if activated.
    if ( true === $theme_options['featured_image'] && has_post_thumbnail() ) {

      the_post_thumbnail( $size );

    }
}

/**
 * Override Parent Post navigation
 *
 * @since 0.4.0
 */
function gridbox_post_navigation() {

  // Get theme options from database.
  $theme_options = gridbox_theme_options();
  $excluded = get_terms( array(
    'taxonomy'  => 'category',
    'slug'      => 'meanwhile',
    'fields'    => 'ids'
  ) );

  if ( true === $theme_options['post_navigation'] || is_customize_preview() ) {

    the_post_navigation( array(
      'prev_text'       => '<span class="screen-reader-text">' . esc_html_x( 'Previous Post:', 'post navigation', 'gridbox' ) . '</span>%title',
      'next_text'       => '<span class="screen-reader-text">' . esc_html_x( 'Next Post:', 'post navigation', 'gridbox' ) . '</span>%title',
      'excluded_terms'  => $excluded
    ) );

  }
}

/**
 * Display Custom Excerpt
 * Conditionally display `post_subhead`, if it exists
 *
 * @since 0.4.0
 *
 * @param  int $post_id
 * @param int $limit
 * @param string $more
 * @return void
 */
function tni_custom_excerpt( $post_id = null, $limit = null, $more = '' ) {
  $default_limit = 55;
  $post_id = ( $post_id ) ? (int) $post_id : get_the_ID();
  $limit = ( $limit ) ? (int) $limit : $default_limit;
  $subhead = get_post_meta( $post_id, 'post_subhead', true );

  if( $subhead ) {
    echo wp_trim_words( strip_shortcodes( $subhead ), $limit, $more );
  } else {
    echo wp_trim_words( strip_shortcodes( get_the_excerpt() ), $limit, $more );
  }
}

/**
 * Display Magazine Download Link
 *
 * @since 0.6.0
 *
 * @param  int $post_id
 * @return void
 */
function tni_the_magazine_pdf( $post_id = null ) {
  $post_id = ( $post_id ) ? (int) $post_id : get_the_id();
  $post_meta = get_post_meta( $post_id, 'magazine_pdf', true );

  if( $post_meta ) {
    $url = wp_get_attachment_url( intval( $post_meta ) );
    $output = sprintf( '<a href="%s" title="%s" class="download-link">%s %s</a>',
      esc_url( $url ),
      __( 'Download Issue', 'tni' ),
      __( 'Download PDF', 'tni' ),
      '<img src="' . get_stylesheet_directory_uri() . '/images/download.svg">'
    );
    echo $output;
  }

}

/**
 * Display Magazine TOC
 *
 * @since 0.6.0
 *
 * @param  int $post_id
 * @return void
 */
function tni_the_magazine_toc( $post_id = null , $auth = false) {
  $post_id = ( $post_id ) ? (int) $post_id : get_the_id();
  $posts = get_post_meta( $post_id, 'related_articles', true );

  if( !empty( $posts ) ) {
    global $post;

    echo '<ul class="magazine-toc">';

    foreach( $posts as $post ) {
      setup_postdata( $post );

      if ( $auth ) {
        get_template_part( 'template-parts/content', 'magazine-article-subscribed' );
      } else {
        get_template_part( 'template-parts/content', 'magazine-article' );
      }

    }
    echo '</ul>';
  }
  wp_reset_postdata();
}
