<?php
/**
 * TNI Enqueue Functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kale
 * @subpackage tni
 * @since 1.0.0
 */

function kale_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'kale-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'tni-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'kale-style' )
    );
}
add_action( 'wp_enqueue_scripts', 'kale_parent_theme_enqueue_styles' );
