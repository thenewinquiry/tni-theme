<?php
/**
 * The template for displaying single posts
 *
 * @package tni
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php // Get theme options from database.
		$theme_options = gridbox_theme_options(); ?>

		<?php if( true === $theme_options['meta_category'] && !is_category() ) : ?>
			<div class="entry-meta">
				<?php echo gridbox_meta_category(); ?>
			</div>
		<?php endif; ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php $subhead = get_post_meta( get_the_ID(), 'post_subhead', true ); ?>

		<?php if( !empty( $subhead ) ) : ?>
			<h2 class="entry-subhead">
				<?php echo $subhead; ?>
			</h2>
		<?php endif; ?>

		<?php gridbox_entry_meta(); ?>

		<?php $hide_featured_image = get_post_meta( get_the_id(), 'hide_featured_image', true );
		if( !$hide_featured_image ) : ?>

	    <?php gridbox_post_image_single( 'full' ); ?>

		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content clearfix">

		<?php the_content(); ?>

		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gridbox' ),
			'after'  => '</div>',
		) ); ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php if( is_active_sidebar( 'content-footer' ) ) : ?>
			<div class="content-footer-widget">
				<?php dynamic_sidebar( 'content-footer' ); ?>
			</div><!-- .footer-widget -->
		<?php endif; ?>

	</footer><!-- .entry-footer -->

</article>
