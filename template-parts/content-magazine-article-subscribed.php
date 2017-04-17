<?php
/**
 * The template for displaying an article in a magazine TOC loop
 *
 * @package tni
 */

?>

<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if( get_post_status() == 'draft' ) : ?>
        <?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
    <?php else : ?>
        <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
    <?php endif; ?>

	<?php gridbox_entry_meta(); ?>
</li>

