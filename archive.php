<?php get_header(); ?>
<div class="mh-wrapper clearfix">
	<div id="main-content" class="mh-loop mh-content" role="main">
		<?php mh_before_page_content(); ?>
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
				<?php if ( is_author() ) : ?>
					<?php mh_magazine_lite_author_box(); ?>
				<?php else : ?>
					<?php the_archive_description( '<div class="entry-content mh-loop-description">', '</div>' ); ?>
				<?php endif; ?>
			</header>
			<div class="articles-list">
				<?php mh_magazine_lite_loop_layout(); ?>
			</div>
			<?php mh_magazine_lite_pagination(); ?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>
