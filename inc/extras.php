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
 * Filter Post Loops
 * Exclude posts from post loop, based on criteria
 *
 * @since 0.7.20
 *
 * @uses pre_get_posts filter
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
 * @link https://codex.wordpress.org/Conditional_Tags
 *
 * @param obj $query
 * @return void
 */
function tni_pre_get_posts( $query ) {
  if( is_admin() || ! ( $query->is_main_query() ) ) {
    return;
  }

  /**
   * Exclude Posts from Category
   */
  $excluded = get_terms( array(
    'taxonomy'  => 'category',
    'slug'      => 'meanwhile',
    'fields'    => 'ids'
  ) );

  $query->set( 'category__not_in', $excluded  );

  /**
   * Home Page Posts per Page
   * Display number of posts on home page as defined in settings
   *
   * @since 0.4.0
   */
  if ( $query->is_home() ) {
    $default = 13;
    $posts_per_page = get_option( 'home-posts-per-page', $default );
    $query->set( 'posts_per_page', $posts_per_page );
  }

  /**
   * Filter Name Homepage Query
   * Don't display the featured article in the main post loop
   *
   * @since 0.7.0
   */
  if ( $query->is_home() ) {
    $post = tni_get_featured_post();
    $query->set( 'post__not_in', array( $post->ID ) );
    $query->set( 'post_type', array( 'post', 'blogs' ) );
  }

  /**
   * Magazine Posts per Page
   * Display all magazine posts on magazine archive
   *
   * @since 0.4.1
   */
  if ( $query->is_post_type_archive( 'magazines' ) ) {
    $posts_per_page = -1;
    $query->set( 'posts_per_page', $posts_per_page );
  }

  /**
   * Exclude Subscription Only Posts
   *
   * @since 0.7.15
   */
  if( !( $query->is_singular() ) ) {
    if( function_exists( 'tni_core_get_unauthorized_posts' ) && !empty( $subscription_only =  tni_core_get_unauthorized_posts() ) ) {
      $query->set( 'post__not_in', $subscription_only );
    }
  }

  /**
   * Include Blog Post Types on Author Pages
   *
   * @since 0.1.0
   */
  if ( $query->is_author() ) {
      $query->set( 'post_type', array( 'post', 'blogs' ) );
  }

}
add_action( 'pre_get_posts', 'tni_pre_get_posts' );

/**
 * Home Page Posts per Page
 * Display number of posts on home page as defined in settings
 *
 * @since 0.4.0
 *
 * @uses pre_get_posts filter
 *
 * @param obj $query
 * @return void
 */
function tni_home_posts_per_page_query_filter( $query ) {

  if ( $query->is_home() && $query->is_main_query() ) {
    $default = 13;
    $posts_per_page = get_option( 'home-posts-per-page', $default );
    $query->set( 'posts_per_page', $posts_per_page );
  }

}
// add_action( 'pre_get_posts', 'tni_home_posts_per_page_query_filter' );

/**
 * Magazine Posts per Page
 * Display all magazine posts on magazine archive
 *
 * @since 0.4.1
 *
 * @uses pre_get_posts filter
 *
 * @param obj $query
 * @return void
 */
function tni_magazines_posts_per_page_query_filter( $query ) {

  if ( $query->is_post_type_archive( 'magazines' ) && $query->is_main_query() ) {
    $posts_per_page = -1;
    $query->set( 'posts_per_page', $posts_per_page );
  }

}
// add_action( 'pre_get_posts', 'tni_magazines_posts_per_page_query_filter' );

/**
 * Filter Name Homepage Query
 * Don't display the featured article in the main post loop
 *
 * @since 0.7.0
 *
 * @param  {object} $query
 * @return void
 */
function tni_home_pre_get_posts_filter( $query ) {
  if ( $query->is_home() && $query->is_main_query() ) {
    $post = tni_get_featured_post();
    $query->set( 'post__not_in', array( $post->ID ) );
    $query->set( 'post_type', array( 'post', 'blogs' ) );
  }
}
// add_action( 'pre_get_posts', 'tni_home_pre_get_posts_filter' );

/**
 * Exclude Posts from Category
 *
 * @param obj $query
 * @return void
 */
function tni_exclude_category( $query ) {

  $excluded = get_terms( array(
    'taxonomy'  => 'category',
    'slug'      => 'meanwhile',
    'fields'    => 'ids'
  ) );

  if( ! is_admin() ) {
    $query->set( 'category__not_in', $excluded  );
  }
}
// add_action( 'pre_get_posts', 'tni_exclude_category' );

/**
 * Exclude Subscription Only Posts
 *
 * @since 0.7.15
 *
 * @uses tni_core_get_unauthorized_posts()
 *
 * @param obj $query
 * @return void
 */
function tni_exclude_subscription_only( $query ) {
  if( is_admin() || ! ( $query->is_main_query() ) ) {
    return;
  }

  if( $query->is_singular() ) {
    if( function_exists( 'tni_core_get_unauthorized_posts' ) && !empty( $subscription_only =  tni_core_get_unauthorized_posts() ) ) {
      $query->set( 'post__not_in', $subscription_only );
    }
  }

}
// add_action( 'pre_get_posts', 'tni_exclude_subscription_only' );

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
// add_action( 'pre_get_posts', 'tni_custom_post_author_archive' );

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
 * Modify Date Display for Magazines
 * @param  obj $the_date
 * @param  string $d
 * @param  obj $post
 * @return obj modified date || $the_date
 */
function tni_filter_publish_dates( $the_date, $d, $post ) {
	if ( is_int( $post) ) {
		$post_id = $post;
	} else {
		$post_id = $post->ID;
	}

	if ( 'magazines' == get_post_type( $post_id ) )
		return date( 'F Y', strtotime( $the_date ) );

	return $the_date;
}
add_action( 'get_the_date', 'tni_filter_publish_dates', 10, 3 );

/**
 * Add Class to Nav Items
 *
 * @since 0.1.5
 *
 * @param  array $classes
 * @param  string $item
 * @return array $classes
 */
function tni_nav_class( $classes, $item ){
    $item_post_name = $item->post_name;
    if( !empty( $item_post_name ) ) {
        $classes[] = $item_post_name;
    }
    return $classes;
}
add_filter( 'nav_menu_css_class' , 'tni_nav_class' , 10 , 2 );

/**
 * Toggle menu items based on authentication
 *
 * @since 0.5.2
 */
function tni_toggle_auth_menu_items( $items, $menu, $args = [] ) {
    if( !is_admin() ) {
        $auth = tni_core_check_auth();
        foreach ( $items as $key => $item ) {
            if ( in_array( 'js-login', $item->classes ) && $auth ) {
                unset( $items[$key] );
            } elseif ( in_array( 'subscribe', $item->classes ) && $auth) {
                unset( $items[$key] );
            } elseif ( in_array( 'js-logout', $item->classes ) && !$auth) {
                unset( $items[$key] );
            } elseif ( in_array( 'my-library', $item->classes ) && !$auth) {
                unset( $items[$key] );
            }
        }
    }
    return $items;
}
add_filter( 'wp_get_nav_menu_items', 'tni_toggle_auth_menu_items', 10, 2 );

/**
 * Modify Image Markup
 * When image is inserted into post content without a caption, alter markup produced
 *
 * @since
 *
 * @param  string $html
 * @param  int $id
 * @param  string $caption
 * @param  string $title
 * @param  string $align
 * @param  string $url
 * @param  string $size
 * @param  string $alt
 * @return string $html
 */
function tni_modify_embedded_image_markup( $html, $id, $caption, $title, $align, $url, $size, $alt ) {
  if( current_theme_supports( 'html5' )  && ! $caption ) {
    $html = sprintf( '<figure class="single-post-thumbnail">%s</figure>',
      $html
    );
  }
  return $html;
}
add_filter( 'image_send_to_editor', 'tni_modify_embedded_image_markup', 10, 8 );

/**
 * Modify Post Thumbnail Markup
 *
 * @since
 *
 * @param  string $html
 * @param  int $id
 * @param  int $thumbnail_id
 * @param  string $size
 * @param  string $attr
 * @return string
 */
function tni_modify_thumbnail_markup( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
  if( current_theme_supports( 'html5' ) ) {
    if( is_singular() ) {
      $caption = get_post( $post_thumbnail_id )->post_excerpt;

      $html = sprintf( '<figure class="single-post-thumbnail">%s%s</figure>',
        $html,
        ( $caption ) ? sprintf( '<figcaption class="wp-caption-text">%s</figcaption>', $caption ) : ''
      );
    }
  }
  return $html;
}
add_filter( 'post_thumbnail_html', 'tni_modify_thumbnail_markup', 1, 5 );

/**
 * Modify Image Caption Markup
 * When image is inserted into post content with a caption, alter markup produced by caption shortcode
 *
 * @since
 *
 * @param  $empty
 * @param  array $attr
 * @param string $content
 * @return string $content
 */
function tni_modify_image_caption_markup( $empty, $attr, $content ){
	$attr = shortcode_atts( array(
		'id'      => '',
		'align'   => 'alignnone',
		'width'   => '',
		'caption' => ''
	), $attr );

	if ( 1 > (int) $attr['width'] || empty( $attr['caption'] ) ) {
		return '';
	}

	if ( $attr['id'] ) {
		$attr['id'] = 'id="' . esc_attr( $attr['id'] ) . '" ';
	}

	return '<figure ' . $attr['id']
	. 'class="single-post-thumbnail has-caption ' . esc_attr( $attr['align'] ) . '" '
	. 'style="max-width: ' . ( 10 + (int) $attr['width'] ) . 'px;">'
	. do_shortcode( $content )
	. '<figcaption class="wp-caption-text">' . $attr['caption'] . '</figcaption>'
	. '</figure>';
}
add_filter( 'img_caption_shortcode', 'tni_modify_image_caption_markup', 10, 3 );

/**
 * Modify Excerpt
 * Don't strip shortcode content from excerpt
 *
 * @since 0.6.11
 *
 * @link https://developer.wordpress.org/reference/hooks/get_the_excerpt/
 *
 * @param string $text
 * @return string $text
 */
function tni_filter_excerpt( $text = '' ) {
  $limit = 55;
    $raw_excerpt = $text;
    if ( '' == $text ) {

        $text = get_the_content( '' );
        $text = do_shortcode( $text );
        $text = apply_filters( 'the_content', $text );
        $text = str_replace( ']]>', ']]>', $text );
        $excerpt_length = apply_filters( 'excerpt_length', $limit );
        //$excerpt_more = apply_filters( 'excerpt_more', ' ' . '[...]' );
        $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
    }
    return apply_filters( 'wp_trim_excerpt', $text, $raw_excerpt );
}
remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'tni_filter_excerpt' );

/**
 * Add Filters to `meta_content`
 * Ensures that `meta_content` is return like `the_content`
 *
 * @since 0.0.1
 */
add_filter( 'meta_content', 'wptexturize'        );
add_filter( 'meta_content', 'convert_smilies'    );
add_filter( 'meta_content', 'convert_chars'      );
add_filter( 'meta_content', 'wpautop'            );
add_filter( 'meta_content', 'shortcode_unautop'  );
add_filter( 'meta_content', 'prepend_attachment' );

/**
 * Get the Featured Post
 * Get the featured post option or return latest post
 *
 * @since 0.7.0
 *
 * @return {object} $post || null
 */
function tni_get_featured_post() {

  $feature = get_option( 'options_featured_article' );
  $featured_args = array(
    'posts_per_page' => 1,
    'post_types'		 => array(
      'post',
      'blogs'
    ),
    'p'							=> ( $feature ) ? (int) $feature[0] : null
  );
  $featured_post = get_posts( $featured_args );

  if( !empty( $featured_post ) && !is_wp_error( $featured_post ) ) {
    return $featured_post[0];
  }

  return null;

}
