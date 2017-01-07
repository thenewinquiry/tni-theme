<?php /* Default template for displaying content. */ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header clearfix">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		<?php if( get_post_meta( get_the_ID(), 'post_subhead', true ) ) : ?>
			<h3 class="entry-subhead">
				<?php echo get_post_meta( get_the_ID(), 'post_subhead', true ); ?>
			</h3>
		<?php endif; ?>
		<?php mh_post_header(); ?>
	</header>
	<?php dynamic_sidebar('posts-1'); ?>
	<?php mh_magazine_lite_featured_image(); ?>
	<div class="entry-content clearfix">
		<?php the_content(); ?>
	</div><?php the_tags('<div class="entry-tags clearfix"><i class="fa fa-tag"></i><ul><li>','</li><li>','</li></ul></div>'); ?>
	<?php dynamic_sidebar('posts-2'); ?>
</article>
