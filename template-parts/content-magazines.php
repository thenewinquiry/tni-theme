<?php
/**
 * The template for displaying articles in the loop with post excerpts
 *
 * @package tni
 */

?>

<div class="post-column clearfix">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<a class="relatedposts-post-a" href="<?php the_permalink(); ?>" title="<?php get_the_title(); ?>" rel="nofollow" data-origin="<?php the_ID(); ?>" data-position="0">
            <?php the_post_thumbnail( 'full' ); ?>
        </a>

		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

            <p class="relatedposts-post-excerpt">
                <span class="issue-number"><?php _e('Vol.', 'tni'); ?> <?php echo get_post_meta( get_the_ID(), 'issue', true ); ?></span> | <span class="issue-date"><?php the_date(); ?></span>
            </p>

		</header><!-- .entry-header -->

	</article>

</div>
