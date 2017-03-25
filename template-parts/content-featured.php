<?php
/**
 * The template for displaying articles in the loop with post excerpts
 *
 * @package tni
 */

?>

<div class="post-column post-featured clearfix">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="entry-info">

            <header class="entry-header">
                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                <?php gridbox_entry_meta(); ?>
            </header><!-- .entry-header -->

            <div class="entry-content entry-excerpt clearfix">
                            <?php tni_custom_excerpt( null, 18 ); ?>
            </div><!-- .entry-content -->

        </div>

        <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
            <figure class="entry-thumbnail" style="background-image:url('<?php echo get_the_post_thumbnail_url( null, 'full' ); ?>');"></figure>
        </a>

	</article>

</div>
