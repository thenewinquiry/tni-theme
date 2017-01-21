<?php
/**
 * TNI Custom Walker Class
 *
 * @package    tni
 * @subpackage tni\includes\classes
 * @since      0.1.0
 * @license    GPL-2.0+
 */

/**
 * Custom Nav Walker Class
 * Custom nav class for menus - replaces li tags with p
 *
 * @param $output
 * @param $item
 * @param $depth
 * @param $args
 *
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/#div-comment-207
 *
*/
class Class_Tni_Social_Walker extends Walker_Nav_Menu {
 function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
     $classes = empty( $item->classes ) ? array () : (array) $item->classes;
     $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
     !empty ( $class_names ) and $class_names = ' class="' . esc_attr( $class_names ) . '"';
     $output .= "<li id='menu-item-$item->ID' $class_names>";
     $attributes  = '';
     !empty( $item->attr_title ) and $attributes .= ' title="'  . esc_attr( $item->attr_title ) . '"';
     !empty( $item->target ) and $attributes .= ' target="' . esc_attr( $item->target     ) . '"';
     !empty( $item->xfn ) and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) . '"';
     !empty( $item->url ) and $attributes .= ' href="'   . esc_attr( $item->url        ) . '"';
     $title = apply_filters( 'the_title', $item->title, $item->ID );
     $item_output = $args->before
     . "<a $attributes><i class=\"icon\"></i>"
     . $args->link_before
     . '<span class="screen-reader-text">'
     . $title
     . '</span>'
     . '</a></li>'
     . $args->link_after
     . $args->after;
     $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );

 }
}
