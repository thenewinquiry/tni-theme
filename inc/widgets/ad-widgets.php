<?php
/**
 * TNI Ad Widgets
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mh-magazine-lite
 * @subpackage tni
 * @since 1.0.0
 */

/**
 * 300x250 Advertisement Ads
 *
 * @since 1.0.0
 */
class tni_300x250_advertisement_widget extends WP_Widget {

   function __construct() {
      $widget_ops = array( 'classname' => 'widget_300x250_advertisement', 'description' => __( 'Add your 300x250 Advertisement here', 'tni') );
      $control_ops = array( 'width' => 200, 'height' =>250 );
      parent::__construct( false,$name= __( '300x250 Advertisement', 'tni' ),$widget_ops);
   }

   function form( $instance ) {
      $instance = wp_parse_args( (array) $instance, array( 'title' => '', '300x250_image_url' => '', '300x250_image_link' => '') );
      $title = esc_attr( $instance[ 'title' ] );

      $image_link = '300x250_image_link';
      $image_url = '300x250_image_url';

      $instance[ $image_link ] = esc_url( $instance[ $image_link ] );
      $instance[ $image_url ] = esc_url( $instance[ $image_url ] );

      ?>

      <p>
         <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'tni' ); ?></label>
         <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
      </p>
      <label><?php _e( 'Add your Advertisement 300x250 Images Here', 'tni' ); ?></label>
      <p>
         <label for="<?php echo $this->get_field_id( $image_link ); ?>"> <?php _e( 'Advertisement Image Link ', 'tni' ); ?></label>
         <input type="text" class="widefat" id="<?php echo $this->get_field_id( $image_link ); ?>" name="<?php echo $this->get_field_name( $image_link ); ?>" value="<?php echo $instance[$image_link]; ?>"/>
      </p>
      <p>
         <label for="<?php echo $this->get_field_id( $image_url ); ?>"> <?php _e( 'Advertisement Image ', 'tni' ); ?></label>
         <div class="media-uploader" id="<?php echo $this->get_field_id( $image_url ); ?>">
            <div class="custom_media_preview">
               <?php if ( $instance[ $image_url ] != '' ) : ?>
                  <img class="custom_media_preview_default" src="<?php echo esc_url( $instance[ $image_url ] ); ?>" style="max-width:100%;" />
               <?php endif; ?>
            </div>
            <input type="text" class="widefat custom_media_input" id="<?php echo $this->get_field_id( $image_url ); ?>" name="<?php echo $this->get_field_name( $image_url ); ?>" value="<?php echo esc_url( $instance[$image_url] ); ?>" style="margin-top:5px;" />
            <button class="custom_media_upload button button-secondary button-large" id="<?php echo $this->get_field_id( $image_url ); ?>" data-choose="<?php esc_attr_e( 'Choose an image', 'tni' ); ?>" data-update="<?php esc_attr_e( 'Use image', 'tni' ); ?>" style="width:100%;margin-top:6px;margin-right:30px;"><?php esc_html_e( 'Select an Image', 'tni' ); ?></button>
         </div>
      </p>

   <?php }
   function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );

      $image_link = '300x250_image_link';
      $image_url = '300x250_image_url';

      $instance[ $image_link ] = esc_url_raw( $new_instance[ $image_link ] );
      $instance[ $image_url ] = esc_url_raw( $new_instance[ $image_url ] );

      return $instance;
   }

   function widget( $args, $instance ) {
      extract( $args );
      extract( $instance );

      $title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';

      $image_link = '300x250_image_link';
      $image_url = '300x250_image_url';

      $image_link = isset( $instance[ $image_link ] ) ? $instance[ $image_link ] : '';
      $image_url = isset( $instance[ $image_url ] ) ? $instance[ $image_url ] : '';

      echo $before_widget; ?>

      <div class="advertisement_300x250">
         <?php if ( !empty( $title ) ) { ?>
            <div class="advertisement-title">
               <?php echo $before_title. esc_html( $title ) . $after_title; ?>
            </div>
         <?php }
            $output = '';
            if ( !empty( $image_url ) ) {
               $output .= '<div class="advertisement-content">';
               if ( !empty( $image_link ) ) {
               $output .= '<a href="'.$image_link.'" class="single_ad_300x250" target="_blank" rel="nofollow">
                                    <img src="'.$image_url.'" width="300" height="250">
                           </a>';
               } else {
                  $output .= '<img src="'.$image_url.'" width="300" height="250">';
               }
               $output .= '</div>';
               echo $output;
            } ?>
      </div>
      <?php
      echo $after_widget;
   }
}

/**
 * 125x125 Advertisement Ads
 *
 * @since 1.0.0
 */
class tni_125x125_advertisement_widget extends WP_Widget {

   function __construct() {
      $widget_ops = array( 'classname' => 'widget_125x125_advertisement', 'description' => __( 'Add your 125x125 Advertisement here', 'tni') );
      $control_ops = array( 'width' => 200, 'height' =>250 );
      parent::__construct( false,$name= __( '125x125 Advertisement', 'tni' ),$widget_ops);
   }

   function form( $instance ) {
      $instance = wp_parse_args( (array) $instance, array( 'title' => '', '125x125_image_url_1' => '', '125x125_image_url_2' => '', '125x125_image_url_3' => '', '125x125_image_url_4' => '', '125x125_image_url_5' => '', '125x125_image_url_6' => '', '125x125_image_link_1' => '', '125x125_image_link_2' => '', '125x125_image_link_3' => '', '125x125_image_link_4' => '', '125x125_image_link_5' => '', '125x125_image_link_6' => '') );
      $title = esc_attr( $instance[ 'title' ] );
      for ( $i = 1; $i < 7; $i++ ) {
         $image_link = '125x125_image_link_'.$i;
         $image_url = '125x125_image_url_'.$i;

         $instance[ $image_link ] = esc_url( $instance[ $image_link ] );
         $instance[ $image_url ] = esc_url( $instance[ $image_url ] );
      }
      ?>

      <p>
         <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'tni' ); ?></label>
         <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
      </p>
      <label><?php _e( 'Add your Advertisement 125x125 Images Here', 'tni' ); ?></label>
      <?php
      for ( $i = 1; $i < 7 ; $i++ ) {
         $image_link = '125x125_image_link_'.$i;
         $image_url = '125x125_image_url_'.$i;
      ?>
      <p>
         <label for="<?php echo $this->get_field_id( $image_link ); ?>"> <?php _e( 'Advertisement Image Link ', 'tni' ); echo $i; ?></label>
         <input type="text" class="widefat" id="<?php echo $this->get_field_id( $image_link ); ?>" name="<?php echo $this->get_field_name( $image_link ); ?>" value="<?php echo $instance[$image_link]; ?>"/>
      </p>
      <p>
         <label for="<?php echo $this->get_field_id( $image_url ); ?>"> <?php _e( 'Advertisement Image ', 'tni' ); echo $i; ?></label>
         <div class="media-uploader" id="<?php echo $this->get_field_id( $image_url ); ?>">
            <div class="custom_media_preview">
               <?php if ( $instance[ $image_url ] != '' ) : ?>
                  <img class="custom_media_preview_default" src="<?php echo esc_url( $instance[ $image_url ] ); ?>" style="max-width:100%;" />
               <?php endif; ?>
            </div>
            <input type="text" class="widefat custom_media_input" id="<?php echo $this->get_field_id( $image_url ); ?>" name="<?php echo $this->get_field_name( $image_url ); ?>" value="<?php echo esc_url( $instance[$image_url] ); ?>" style="margin-top:5px;" />
            <button class="custom_media_upload button button-secondary button-large" id="<?php echo $this->get_field_id( $image_url ); ?>" data-choose="<?php esc_attr_e( 'Choose an image', 'tni' ); ?>" data-update="<?php esc_attr_e( 'Use image', 'tni' ); ?>" style="width:100%;margin-top:6px;margin-right:30px;"><?php esc_html_e( 'Select an Image', 'tni' ); ?></button>
         </div>
      </p>
      <?php } ?>

   <?php }
   function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
      for ( $i = 1; $i < 7; $i++ ) {
         $image_link = '125x125_image_link_'.$i;
         $image_url = '125x125_image_url_'.$i;

         $instance[ $image_link ] = esc_url_raw( $new_instance[ $image_link ] );
         $instance[ $image_url ] = esc_url_raw( $new_instance[ $image_url ] );
      }

      return $instance;
   }

   function widget( $args, $instance ) {
      extract( $args );
      extract( $instance );

      $title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
      $image_array = array();
      $link_array = array();

      for ( $i = 1; $i < 7; $i++ ) {
         $image_link = '125x125_image_link_'.$i;
         $image_url = '125x125_image_url_'.$i;

         $image_link = isset( $instance[ $image_link ] ) ? $instance[ $image_link ] : '';
         $image_url = isset( $instance[ $image_url ] ) ? $instance[ $image_url ] : '';
         if( !empty( $image_link ) ) array_push( $link_array, $image_link );
         if( !empty( $image_url ) ) array_push( $image_array, $image_url );
      }
      echo $before_widget; ?>

      <div class="advertisement_125x125">
         <?php if ( !empty( $title ) ) { ?>
            <div class="advertisement-title">
               <?php echo $before_title. esc_html( $title ) . $after_title; ?>
            </div>
         <?php }
            $output = '';
            if ( !empty( $image_array ) ) {
            $output .= '<div class="advertisement-content">';
            for ( $i = 1; $i < 7; $i++ ) {
               $j = $i - 1;
               if( !empty( $image_array[$j] ) ) {
                  if ( !empty( $link_array[$j] ) ) {
                     $output .= '<a href="'.$link_array[$j].'" class="single_ad_125x125" target="_blank" rel="nofollow">
                                 <img src="'.$image_array[$j].'" width="125" height="125">
                              </a>';
                  } else {
                     $output .= '<img src="'.$image_array[$j].'" width="125" height="125">';
                  }
               }
            }
            $output .= '</div>';
            echo $output;
         } ?>
      </div>
      <?php
      echo $after_widget;
   }
}
