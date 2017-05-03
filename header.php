<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package tni
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1292354514219229'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1292354514219229&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->
</head>

<body <?php body_class(); ?>>

	<div id="page" class="hfeed site">

		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gridbox' ); ?></a>

		<div id="header-top" class="header-bar-wrap"><?php do_action( 'gridbox_header_bar' ); ?></div>

		<header id="masthead" class="site-header clearfix" role="banner">

			<div class="header-main container clearfix">

				<button id="main-navigation-toggle" class="main-navigation-toggle"><span class="screen-reader-text"><?php _e( 'Menu', 'tni' ) ?></span></button>

				<div id="logo" class="site-branding clearfix">

					<?php gridbox_site_logo(); ?>
					<?php gridbox_site_title(); ?>
					<?php gridbox_site_description(); ?>

				</div><!-- .site-branding -->

				<?php if( is_active_sidebar( 'header' ) ) : ?>
					<div class="header-widget">
						<?php dynamic_sidebar( 'header' ); ?>
					</div><!-- .header-widget -->
				<?php endif; ?>

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

				<nav id="mobile-navigation" class="mobile-navigation navigation clearfix" role="navigation">
				 <?php
					 // Display Mobile Navigation.
					 wp_nav_menu(
							 array(
								 'theme_location'  => 'mobile',
								 'container'       => 'div',
								 'container_id'    => 'menu-mobile',
								 'container_class' => 'menu',
								 'menu_id'         => 'menu-mobile-items',
								 'menu_class'      => 'menu-items',
								 'depth'           => 1,
								 'fallback_cb'     => '',
							 )
						 );
				 ?>
				</nav><!-- #mobile-navigation -->

				<nav id="main-navigation" class="primary-navigation navigation clearfix" role="navigation">
					<?php
						// Display Main Navigation.
						wp_nav_menu( array(
							'theme_location' 	=> 'primary',
							'container' 		=> false,
							'menu_class' 		=> 'main-navigation-menu',
							'fallback_cb' 		=> false,
							'depth'				=> 1
							)
						);
					?>
				</nav><!-- #main-navigation -->

				<div class="top-search collapsed" aria-expanded="false">
					<?php get_search_form(); ?>
				</div>

			</div><!-- .header-main -->

		</header><!-- #masthead -->

		<?php gridbox_header_image(); ?>

		<?php gridbox_breadcrumbs(); ?>

		<?php if( is_active_sidebar( 'page-header' ) ) : ?>

			<?php dynamic_sidebar( 'page-header' ); ?>

		<?php endif; ?>

		<div id="content" class="site-content container clearfix">
