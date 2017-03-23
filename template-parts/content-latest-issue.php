<?php
/**
 * The template for displaying the latest issues as a list item
 *
 * @package tni
 */

?>

<div class="post-column post-latest-issue clearfix">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <a href="<?php the_permalink(); ?>" title="<?php get_the_title(); ?>" rel="nofollow" data-origin="<?php the_ID(); ?>">
            <figure class="entry-thumbnail">
                <?php the_post_thumbnail( 'full' ); ?>
            </figure>
        </a>
        <header class="entry-header">
            <div class="entry-meta">
                <span class="meta-category">
                    <a href="<?php the_permalink(); ?>"><?php _e('Latest Issue', 'tni'); ?></a>
                </span>
            </div>
            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            <p class="relatedposts-post-excerpt">
                <span class="issue-number"><?php _e('Vol.', 'tni'); ?> <?php echo get_post_meta( get_the_ID(), 'issue', true ); ?></span> | <span class="issue-date"><?php the_date(); ?></span>
                <div class="highlight issue-download"><a href="<?php the_permalink(); ?>"><?php _e('Download this issue', 'tni') ?></a></div>
            </p>
        </header>
    </article>
</div>

