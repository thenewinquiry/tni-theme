<?php get_header(); ?>
<div class="mh-wrapper clearfix">
	<div id="main-content" class="mh-content" role="main" itemprop="mainContentOfPage">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php mh_before_post_content(); ?>
			<?php get_template_part( 'content', 'magazine' ); ?>
			<?php mh_after_post_content(); ?>
			<?php comments_template(); ?>
		<?php endwhile; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
