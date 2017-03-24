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
 *
 * @since 1.0.0
 *
 * @return void
 */
function gridbox_meta_author() {

    $author_string = sprintf( '<span class="author vcard">%s<a class="url fn n" href="%s" title="%s" rel="author">%s</a></span>',
        __( 'By ', 'tni' ),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_attr( sprintf( esc_html__( 'View all posts by %s', 'tni' ),
        get_the_author() ) ),
        esc_html( get_the_author() )
    );

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

        $caption = get_post( get_post_thumbnail_id() )->post_excerpt;
        $meta = wp_get_attachment_metadata( get_post_thumbnail_id() );
        $width = ( !empty( $meta ) ) ? $meta['width'] : '';

        echo '<figure class="single-post-thumbnail" style="max-width:' . $width . 'px">';

        the_post_thumbnail( $size );

        if( !empty( $caption ) ) {
          echo sprintf( '<figcaption class="wp-caption-text">%s</figcaption>',
            $caption
          );
        }

        echo '</figure>';

    }
}

/**
 * Display Custom Excerpt
 * Conditionally display `post_subhead`, if it exists
 *
 * @since 0.4.0
 *
 * @param  int $post_id
 * @return void
 */
function tni_custom_excerpt( $post_id = null ) {
  $post_id = ( $post_id ) ? intval( $post_id ) : get_the_ID();
  $subhead = get_post_meta( get_the_ID(), 'post_subhead', true );

  if( $subhead ) {
    echo $subhead;
  } else {
    the_excerpt();
  }
}
