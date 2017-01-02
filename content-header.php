<div class="mh-header-mobile-nav clearfix"></div>
<header class="mh-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
	<div class="mh-container mh-container-inner mh-row clearfix">
		<div class="mh-custom-header clearfix">
				<div class="mh-site-identity">
					<?php if( has_custom_logo() ) : ?>
						<div class="mh-site-logo mh-col-2-3" role="banner" itemscope="itemscope" itemtype="http://schema.org/Brand">
							<?php the_custom_logo(); ?>
						</div>
					<?php else : ?>
						<div class="mh-header-text">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<h1 class="mh-header-title"><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></h1>
								<h2 class="mh-header-tagline"><?php echo esc_attr( get_bloginfo( 'description' ) ); ?></h2>
							</a>
						</div>
					<?php endif; ?>

					<?php if( is_active_sidebar( 'header' ) ) : ?>
						<div class="header-widget mh-col-1-3">
							<?php dynamic_sidebar( 'header' ); ?>
						</div>
					<?php endif; ?>
				</div>


		</div>
		<?php// mh_magazine_lite_custom_header(); ?>
	</div>
	<div class="mh-main-nav-wrap">
		<nav class="mh-navigation mh-main-nav mh-container mh-container-inner clearfix" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
			<?php wp_nav_menu( array(
				'theme_location' => 'main_nav'
			) ); ?>
		</nav>
	</div>
</header>
