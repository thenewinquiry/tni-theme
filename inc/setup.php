<?php
/**
 * TNI Set-up Functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gridbox
 * @subpackage tni
 * @since 0.1.0
 */

function tni_setup() {
    register_sidebar( array(
            'name' => esc_html__( 'Header', 'tni' ),
            'id' => 'header',
            'description' => esc_html__( 'Header widget', 'tni' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        )
    );
    register_sidebar( array(
            'name' => esc_html__( 'Copyright', 'tni' ),
            'id' => 'copyleft',
            'description' => esc_html__( 'Copyright information in footer', 'tni' ),
            'before_widget' => '<div id="%1$s" class="copyright">',
            'after_widget' => '</div>',
            'before_title' => '<div class="screen-reader-text">',
            'after_title' => '</div>'
        )
    );

    remove_theme_support( 'infinite-scroll' );

    add_theme_support( 'infinite-scroll', array(
        'type'           => 'click',
		'container'      => 'post-wrapper',
		'footer_widgets' => 'footer',
		'wrapper'        => false,
		'render'         => 'gridbox_infinite_scroll_render',
		'posts_per_page' => 8,
	) );

    register_nav_menus( array(
    	'social'   => esc_html__( 'Social Menu', 'tni' ),
    	'footer'   => esc_html__( 'Footer Menu', 'tni' ),
    ) );

    load_theme_textdomain( 'tni', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'tni_setup', 20 );
