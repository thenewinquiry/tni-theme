<?php
/**
 * The template for displaying related magazine issues
 * Markup mimics JetPack Related Posts
 *
 * @package tni
 */

?>

<div class="relatedposts-post relatedposts-post-thumbs" data-post-id="<?php the_ID(); ?>" data-post-format="false">

		<a class="relatedposts-post-a" href="<?php the_permalink(); ?>" title="<?php get_the_title(); ?>" rel="nofollow" data-origin="<?php the_ID(); ?>" data-position="0">
			<?php if( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'full' ); ?>
			<?php else : ?>
				<img src="<?php get_stylesheet_directory_uri(); ?>/images/tni-placeholder.png">
			<?php endif; ?>
		</a>
		<h4 class="relatedposts-post-title entry-title">
			<a class="relatedposts-post-a" href="<?php the_permalink(); ?>" title="<?php get_the_title(); ?>" rel="nofollow" data-origin="<?php the_ID(); ?>" data-position="0">
				<?php the_title(); ?></a>
		</h4>
		<p class="relatedposts-post-excerpt">
            <span class="issue-number"><?php _e('Vol.', 'tni'); ?> <?php echo get_post_meta( get_the_ID(), 'issue', true ); ?></span> | <span class="issue-date"><?php the_date(); ?></span>
		</p>

</div>
