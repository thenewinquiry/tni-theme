<?php
/**
 * TNI Template Tags
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mh-magazine-lite
 * @subpackage tni
 * @since 1.0.0
 */

/**
 * Override Parent Theme Meta
 *
 * @return void
 */
function mh_magazine_lite_post_meta() {
    echo sprintf( '<div class="entry-meta">
    <div class="entry-meta-author author vcard">%s <a href="%s">%s</a></div>
    <div class="entry-meta-date updated"><a href="%s">%s</a></div>
    <div class="entry-meta-categories">%s</div>
    </div>',
        __( 'By', 'tni' ),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_html( get_the_author() ),
        esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ),
        get_the_date(),
        get_the_category_list( ', ', '' )
    );
}
add_action( 'mh_post_header', 'mh_magazine_lite_post_meta' );

/**
 * Override Parent Loop Meta
 * @return void
 */
function mh_magazine_lite_loop_meta() {
    echo '<div class="entry-meta">';
    if (in_the_loop()) {
        echo sprintf( '<div class="entry-meta-author author vcard">%s <a href="%s">%s</a></div>',
            __( 'By', 'tni' ),
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            esc_html( get_the_author() )
        );
    }
    echo '<div class="entry-meta-date updated">' . get_the_date() . '</div></div>';
}
