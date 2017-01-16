<?php
/**
 * TNI Set-up Functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mh-magazine-lite
 * @subpackage tni
 * @since 1.0.0
 */

function tni_setup() {
    register_sidebar( array(
            'name' => esc_html__( 'Header', 'tni' ),
            'id' => 'header',
            'description' => esc_html__( 'Header widget', 'tni' ),
            'before_widget' => '<div id="%1$s" class="mh-widget %2$s">', 'after_widget' => '</div>',
            'before_title' => '',
            'after_title' => ''
        )
    );
    register_sidebar( array(
            'name' => esc_html__( 'Copyright', 'tni' ),
            'id' => 'copyleft',
            'description' => esc_html__( 'Copyright information in footer', 'tni' ),
            'before_widget' => '<div id="%1$s" class="mh-copyright">',
            'after_widget' => '</div>',
            'before_title' => '<div class="screen-reader-text">',
            'after_title' => '</div>'
        )
    );

    add_theme_support( 'infinite-scroll', array(
        // 'type'           => 'scroll',
        'footer_widgets' => true,
        'container'      => 'mh-loop',
        // 'wrapper'        => true,
        // 'render'         => false,
        // 'posts_per_page' => false,
    ) );

    register_nav_menu(
        'social', esc_html__( 'Social Menu', 'tni' )
    );
    register_nav_menu(
        'footer', esc_html__( 'Footer Menu', 'tni' )
    );

    load_theme_textdomain( 'tni', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'tni_setup' );
