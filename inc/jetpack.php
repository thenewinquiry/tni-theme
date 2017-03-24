<?php
/**
 * TNI Custom JetPack Functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gridbox
 * @subpackage tni
 * @since 0.4.0
 */

 /**
  * Change Button Text
  * @param  array $settings
  * @return array $settings
  */
 function tni_jetpack_infinite_scroll_button_text( $settings ) {

   $settings['text'] = __( 'Load More', 'tni' );

 	return $settings;
 }
 add_filter( 'infinite_scroll_js_settings', 'tni_jetpack_infinite_scroll_button_text' );

 /**
  * Disable Infinite Scroll on Blogs Listing
  *
  * @since 0.1.2
  *
  * @uses infinite_scroll_archive_supported filter
  */
 function tni_remove_infinite_scroll_blogs_archive() {
 	return current_theme_supports( 'infinite-scroll' ) && ( !is_post_type_archive( 'blogs' ) );
 }
 add_filter( 'infinite_scroll_archive_supported', 'tni_remove_infinite_scroll_blogs_archive' );

 /**
  * Prevent JetPack CSS Concatenation
  *
  * @since 0.3.1
  *
  * @uses jetpack_implode_frontend_css filter
  *
  * @return false
  */
 add_filter( 'jetpack_implode_frontend_css', '__return_false' );

 /**
  * Related Posts for Blog Posts
  *
  * @since 0.0.1
  */
 add_filter( 'jetpack_relatedposts_filter_post_context', '__return_empty_string' );

 /**
  * Modify JetPack Related Posts Thumbnail Size
  *
  * @uses jetpack_relatedposts_filter_thumbnail_size filter
  *
  * @since 0.3.1
  * @param  array $thumbnail_size
  * @return array $thumbnail_size
  */
 function tni_jetpack_change_image_size( $thumbnail_size ) {
   $thumbnail_size['width'] = 250;
   $thumbnail_size['height'] = 250;
   $thumbnail_size['crop'] = true;
   return $thumbnail_size;
 }
 add_filter( 'jetpack_relatedposts_filter_thumbnail_size', 'tni_jetpack_change_image_size' );

 /**
  * Customize Related Post Options
  * Change number of posts
  * Hide date
  *
  * @since
  * @param  array $options
  * @return array $options modified
  */
 function tni_jetpack_customize_related_posts( $options ) {
     $options['size'] = 4;
     $options['show_date'] = false;
     return $options;
 }
 add_filter( 'jetpack_relatedposts_filter_options', 'tni_jetpack_customize_related_posts' );

 /**
  * Remove Auto-inserted Related Posts
  *
  * @since 0.0.6
  *
  * @uses Jetpack_RelatedPosts
  * @link https://jetpack.com/support/related-posts/customize-related-posts/
  *
  * @return void
  */
 function tni_remove_jetpack_related_posts() {
     if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
         $jprp = Jetpack_RelatedPosts::init();
         $callback = array( $jprp, 'filter_add_target_to_dom' );
         remove_filter( 'the_content', $callback, 40 );
     }
 }
 add_filter( 'wp', 'tni_remove_jetpack_related_posts', 20 );

 /**
  * Modify Default JetPack Related Posts Default Image
  * @param  array $media
  * @param  int $post_id
  * @param  array $args
  * @return array $media
  */
 function tni_jetpack_related_posts_default_image( $media, $post_id, $args ) {
     if ( $media ) {
         return $media;
     } else {
         $permalink = get_permalink( $post_id );
         $image = get_stylesheet_directory_uri() . '/images/tni-placeholder.jpg';
         $url = apply_filters( 'jetpack_photon_url', $image );

         return array( array(
             'type'  => 'image',
             'from'  => 'custom_fallback',
             'src'   => esc_url( $url ),
             'href'  => $permalink,
         ) );
     }
 }
 add_filter( 'jetpack_images_get_images', 'tni_jetpack_related_posts_default_image', 10, 3 );
