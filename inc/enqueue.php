<?php
/**
 * TNI Enqueue Functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gridbox
 * @subpackage tni
 * @since 0.1.0
 */
function tni_parent_theme_enqueue_styles() {

    wp_deregister_style( 'jetpack_related-posts' );
    wp_dequeue_style( 'jetpack_related-posts' );
    wp_dequeue_style( 'gridbox-default-fonts' );
    wp_deregister_style( 'gridbox-default-fonts'  );
    wp_dequeue_style( 'themezee-related-posts' );

    wp_dequeue_script( 'gridbox-jquery-navigation' );
    wp_deregister_script( 'gridbox-jquery-navigation' );

    wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Work+Sans:300,500,700,900|Libre+Baskerville:400,400i,700' );

    wp_register_script( 'tni-scripts', get_stylesheet_directory_uri() . '/js/app.js', array( 'jquery' ), null, true );

    wp_enqueue_style( 'gridbox-style', get_template_directory_uri() . '/style.css', null, null );
    wp_enqueue_style( 'tni-style',
        get_stylesheet_directory_uri() . '/css/style.min.css',
        array( 'gridbox-style', 'genericons' ),
        null,
        null
    );

    wp_enqueue_style( 'google-fonts' );
    wp_enqueue_script( 'tni-scripts' );

}
add_action( 'wp_enqueue_scripts', 'tni_parent_theme_enqueue_styles', 20 );
