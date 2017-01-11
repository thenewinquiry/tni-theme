<?php
/**
 * TNI Custom Functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mh-magazine-lite
 * @subpackage tni
 * @since 1.0.0
 */

function tni_blog_author_box() {
    $mh_author_box_ID = get_the_author_meta('ID');
    if( is_tax( 'blog-types' ) ) {
        get_template_part( 'content', 'author-box' );
    }
}
add_action( 'mh_after_post_content', 'tni_blog_author_box' );

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
