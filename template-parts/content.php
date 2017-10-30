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

					<?php if( ( $featured_bundle = get_option( 'options_featured_bundle' ) ) && ( has_term( $featured_bundle, 'bundle', $post->ID ) ) ) : /* @since 1.3.0 */ ?>
						<span class="meta-category featured-bundle"><?php echo get_the_term_list( $post->ID, 'bundle', '', ', ' ); ?></span>
					<?php elseif( 'blogs' == get_post_type() ) : ?>
						<span class="meta-category"><?php echo get_the_term_list( $post->ID, 'blog-types', '', ', ' ); ?></span>
					<?php else : ?>
						<?php echo gridbox_meta_category(); ?>
					<?php endif; ?>

          <?php if ( get_post_meta( $post->ID, 'audio_url', true )) : ?>
						<a href="<?php echo esc_url( get_permalink() . '#audio' ); ?>"><img class="audio-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/audio.png" title="<?php _e( 'Audio version available', 'tni' ); ?>" /></a>
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
