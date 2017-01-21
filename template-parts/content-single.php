<?php
/**
 * The template for displaying single posts
 *
 * @package tni
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php gridbox_post_image_single( 'full' ); ?>

	<header class="entry-header">

		<?php // Get theme options from database.
	    $theme_options = gridbox_theme_options(); ?>

		<?php if( true === $theme_options['meta_category'] ) : ?>
			<div class="entry-meta">
				<?php echo gridbox_meta_category(); ?>
			</div>
		<?php endif; ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php gridbox_entry_meta(); ?>

	</header><!-- .entry-header -->

	<div class="entry-content clearfix">

		<?php the_content(); ?>

		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gridbox' ),
			'after'  => '</div>',
		) ); ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php gridbox_entry_tags(); ?>
		<?php gridbox_post_navigation(); ?>

	</footer><!-- .entry-footer -->

</article>