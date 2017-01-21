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
