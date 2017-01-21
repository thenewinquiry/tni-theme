<?php
/**
 * TNI Custom Functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gridbox
 * @subpackage tni
 * @since 0.1.0
 */

/**
 * Add Search to Main Nav
 *
 * @since 0.0.1
 */
function tni_add_top_search_menu( $items, $args ) {
    if ( 'main_nav' == $args->theme_location ) {
        $items .= '<li class="top-search-menu">'  . get_search_form( false ) . '</li>';
    }
    return $items;
}
//add_filter( 'wp_nav_menu_items', 'tni_add_top_search_menu', 10, 2 );

/**
 * Related Posts for Blog Posts
 *
 * @since 0.0.1
 */
add_filter( 'jetpack_relatedposts_filter_post_context', '__return_empty_string' );

/**
 * Modify Archive Title
 *
 * @since 1.0.0
 *
 * @uses get_the_archive_title filter
 *
 * @param  string $title
 * @return string $title
 */
function tni_modify_the_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>' ;
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } else {
        $title = __( 'Archives', 'tni' );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'tni_modify_the_archive_title' );

/**
 * Include Blog Post Types on Author Pages
 *
 * @since 1.0.0
 *
 * @uses pre_get_posts filter
 *
 * @param  array $query
 * @return void
 */
function tni_custom_post_author_archive( $query ) {
    if ( !is_admin() && $query->is_author && $query->is_main_query() ) {
        $query->set( 'post_type', array( 'post', 'blogs' ) );
    }
}
add_action( 'pre_get_posts', 'tni_custom_post_author_archive' );


/**
 * Override Parent Featured Image
 *
 * @since 1.0.0
 */
function mh_magazine_lite_featured_image() {
    global $page, $post;

    if ( has_post_thumbnail() && $page == '1' && !is_attachment() ) {

        $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

        $output = sprintf( '<figure class="entry-thumbnail"><img src="%s" alt="%s" title="%s"></figure>',
            esc_url( $thumbnail[0] ),
            esc_attr( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ),
            esc_attr( get_post( get_post_thumbnail_id() )->post_title )
        );

        $caption = get_post( get_post_thumbnail_id() )->post_excerpt;

        if( !empty( $caption ) ) {
            $output .= '<figcaption class="wp-caption-text">' . wp_kses_post( $caption ) . '</figcaption>';
        }

        echo $output;
    }
}

/**
 * Change Button Text
 * @param  array $settings
 * @return array $settings
 */
function tni_jetpack_infinite_scroll_button_text( $settings ) {

    if( is_post_type_archive( 'blogs' ) ) {
        $settings['text'] = __( 'Load More Blogs', 'tni' );
    } elseif( is_post_type_archive( 'magazines' ) ) {
        $settings['text'] = __( 'Load More Issues', 'tni' );
    } else {
        $settings['text'] = __( 'Load More Articles', 'tni' );
    }
	return $settings;
}
add_filter( 'infinite_scroll_js_settings', 'tni_jetpack_infinite_scroll_button_text' );

/**
 * Override Parent Image Function
 *
 * @since 1.0.0
 *
 * @uses gridbox_theme_options()
 */
function gridbox_post_image_single( $size = 'post-thumbnail' ) {

    // Get theme options from database.
    $theme_options = gridbox_theme_options();

    // Display Post Thumbnail if activated.
    if ( true === $theme_options['featured_image'] ) {

        the_post_thumbnail( $size );

    }
}

/**
 * Add Filters to `meta_content`
 * Ensures that `meta_content` is return like `the_content`
 *
 * @since 1.0.0
 */
add_filter( 'meta_content', 'wptexturize'        );
add_filter( 'meta_content', 'convert_smilies'    );
add_filter( 'meta_content', 'convert_chars'      );
add_filter( 'meta_content', 'wpautop'            );
add_filter( 'meta_content', 'shortcode_unautop'  );
add_filter( 'meta_content', 'prepend_attachment' );
