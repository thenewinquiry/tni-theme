<?php
/**
 * The template for displaying articles in the loop with post excerpts
 *
 * @package tni
 */

?>

<div class="post-column clearfix">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php gridbox_post_image(); ?>

		<header class="entry-header">

			<?php // Get theme options from database.
		    $theme_options = gridbox_theme_options(); ?>

			<?php if( true === $theme_options['meta_category'] ) : ?>
				<div class="entry-meta">
					<?php if( 'blogs' == get_post_type() ) : ?>
							<span class="meta-category"><?php echo get_the_term_list( $post->ID, 'blog-types', '', ', ' ); ?></span>
					<?php else : ?>
						<?php echo gridbox_meta_category(); ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php gridbox_entry_meta(); ?>

		</header><!-- .entry-header -->

		<div class="entry-content entry-excerpt clearfix">
			<?php tni_custom_excerpt(); ?>
		</div><!-- .entry-content -->

	</article>

</div>
