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

			<?php if( is_active_sidebar( 'copyleft' ) ) : ?>
				<div id="footer-text" class="site-info">
					<?php dynamic_sidebar( 'copyleft' ); ?>
				</div><!-- .site-info -->
			<?php endif; ?>

			<?php if( is_active_sidebar( 'footer' ) ) : ?>
					<?php dynamic_sidebar( 'footer' ); ?>
			<?php endif; ?>

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

		</footer><!-- #colophon -->

	</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
