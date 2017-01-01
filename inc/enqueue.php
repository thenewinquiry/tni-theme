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

function mh-magazine-lite_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'mh-magazine-lite-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'tni-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'mh-magazine-lite-style' )
    );
}
add_action( 'wp_enqueue_scripts', 'mh-magazine-lite_parent_theme_enqueue_styles' );
