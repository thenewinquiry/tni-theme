<?php mh_before_footer(); ?>
<?php if ( has_nav_menu( 'footer' ) || is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') ) { ?>
	<footer class="mh-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
		<div class="mh-container mh-container-inner mh-footer-widgets mh-row clearfix">
			<?php if( has_nav_menu( 'footer' ) ) : ?>
			<div class="mh-col-1-1 mh-widget-col-1 mh-footer-area">
				<nav class="mh-navigation mh-footer-nav mh-container mh-container-inner clearfix" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<?php wp_nav_menu( array(
						'theme_location' 	=> 'footer',
						'depth'				=> 1,
						'fallback_cb'		=> false
					)); ?>
				</nav>
			</div>
			<?php endif; ?>
			<?php if (is_active_sidebar('footer-1')) { ?>
				<div class="mh-col-1-4 mh-widget-col-1 mh-footer-area mh-footer-1">
					<?php dynamic_sidebar('footer-1'); ?>
				</div>
			<?php } ?>
			<?php if (is_active_sidebar('footer-2')) { ?>
				<div class="mh-col-1-4 mh-widget-col-1 mh-footer-area mh-footer-2">
					<?php dynamic_sidebar('footer-2'); ?>
				</div>
			<?php } ?>
			<?php if (is_active_sidebar('footer-3')) { ?>
				<div class="mh-col-1-4 mh-widget-col-1 mh-footer-area mh-footer-3">
					<?php dynamic_sidebar('footer-3'); ?>
				</div>
			<?php } ?>
			<?php if (is_active_sidebar('footer-4')) { ?>
				<div class="mh-col-1-4 mh-widget-col-1 mh-footer-area mh-footer-4">
					<?php dynamic_sidebar('footer-4'); ?>
				</div>
			<?php } ?>
		</div>
	</footer>
<?php } ?>

<?php if ( is_active_sidebar( 'copyleft' ) ) { ?>
<div class="mh-copyright-wrap">
	<div class="mh-container mh-container-inner clearfix">
		<?php dynamic_sidebar( 'copyleft' ); ?>
	</div>
</div>
<?php } ?>

<?php mh_after_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>
