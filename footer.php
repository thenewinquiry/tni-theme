<?php
/**
 * The template for displaying the footer.
 *
 * Contains all content after the main content area and sidebar
 *
 * @package tni
 */

?>

	</div><!-- #content -->

	<?php do_action( 'gridbox_before_footer' ); ?>

	<div id="footer" class="footer-wrap">

		<footer id="colophon" class="site-footer container clearfix" role="contentinfo">

            <div class="footer-content">
                <?php if( is_active_sidebar( 'copyleft' ) ) : ?>
                    <div id="footer-text" class="site-info">
                        <?php dynamic_sidebar( 'copyleft' ); ?>
                    </div><!-- .site-info -->
                <?php endif; ?>

                <div class="footer-menus">
    
                    <?php
                        // Display Main Navigation.
                        wp_nav_menu( array(
                            'theme_location' 	=> 'footer',
                            'container' 		=> false,
                            'menu_class' 		=> 'footer-menu',
                            'fallback_cb' 		=> false,
                            'depth'				=> 1,
                            )
                        );
                    ?>

                    <nav id="social-navigation" class="social-navigation navigation clearfix" role="navigation">
                        <?php
                            // Display Social Navigation.
                            wp_nav_menu(
                                    array(
                                        'theme_location'  => 'social',
                                        'container'       => 'div',
                                        'container_id'    => 'menu-social',
                                        'container_class' => 'menu',
                                        'menu_id'         => 'menu-social-items',
                                        'menu_class'      => 'menu-items',
                                        'depth'           => 1,
                                        'link_before'     => '<span class="screen-reader-text">',
                                        'link_after'      => '</span>',
                                        'fallback_cb'     => '',
                                    )
                                );
                        ?>
                    </nav><!-- #social-navigation -->

                </div>

                <?php if( is_active_sidebar( 'footer' ) ) : ?>
                        <?php dynamic_sidebar( 'footer' ); ?>
                <?php endif; ?>
            </div>

            <img class="footer-head" src="<?php echo get_stylesheet_directory_uri(); ?>/images/head.png" />

		</footer><!-- #colophon -->

	</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
