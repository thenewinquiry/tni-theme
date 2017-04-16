<?php
/**
 * The template for displaying an article in a magazine TOC loop
 *
 * @package tni
 */

?>

<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>

	<?php gridbox_entry_meta(); ?>
</li>
