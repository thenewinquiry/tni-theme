<?php
/**
 * The template for displaying articles in the loop with post excerpts
 *
 * @package tni
 */

?>

<div class="blog-post">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">

			<?php // Get theme options from database.
			$theme_options = gridbox_theme_options(); ?>

			<?php if( true === $theme_options['meta_category'] && !is_category() ) : ?>
				<div class="entry-meta">
					<?php echo gridbox_meta_category(); ?>
				</div>
			<?php endif; ?>

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<?php gridbox_entry_meta(); ?>

		</header><!-- .entry-header -->

		<div class="entry-content entry-excerpt clearfix">
			<?php tni_custom_excerpt(); ?>
		</div><!-- .entry-content -->

		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php gridbox_post_image_single( 'full' ); ?>
		</a>

		<div class="entry-content clearfix">
			<?php echo wp_trim_words( strip_shortcodes( get_the_content() ), 140 ); ?>
			<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark" class="entry-readmore"><?php _e( 'Read More...', 'tni' ); ?></a>
		</div>

	</article>

</div>
