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
    wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Droid+Serif|Kanit:400,700,800|PT+Sans' );
    wp_register_script( 'tni-scripts', get_stylesheet_directory_uri() . '/js/app.js', array( 'jquery' ), null, true );

    wp_enqueue_style( 'gridbox-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'tni-style',
        get_stylesheet_directory_uri() . '/css/style.min.css',
        array( 'gridbox-style' )
    );
    wp_enqueue_style( 'google-fonts' );
    wp_enqueue_script( 'tni-scripts' );

}
add_action( 'wp_enqueue_scripts', 'tni_parent_theme_enqueue_styles' );
