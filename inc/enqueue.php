<?php
/**
 * TNI Enqueue Functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mh-magazine-lite
 * @subpackage tni
 * @since 1.0.0
 */

function tni_parent_theme_enqueue_styles() {
    wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Droid+Serif|Kanit:400,700,800|PT+Sans' );
    wp_enqueue_style( 'mh-magazine-lite-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'tni-base',
        get_stylesheet_directory_uri() . '/style.css'
    );
    wp_enqueue_style( 'tni-custom',
        get_stylesheet_directory_uri() . '/css/style.min.css', array( 'google-fonts', 'mh-magazine-lite-style' ) );
}
add_action( 'wp_enqueue_scripts', 'tni_parent_theme_enqueue_styles' );
