<?php
/**
 * Featured Content Template
 *
 * Queries posts by selected featured posts category and displays featured content area
 *
 * @package tni
 */
?>

<?php if ( is_active_sidebar( 'magazine-homepage' ) ) : ?>

	<div class="post-column clearfix">

		<article class="home-promo">

		<?php dynamic_sidebar( 'magazine-homepage' ); ?>

		</article>

	</div>

<?php endif; ?>
