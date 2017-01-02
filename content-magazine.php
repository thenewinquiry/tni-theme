<?php /* Default template for displaying content. */ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header clearfix">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		<?php
		$editors_note = get_post_meta( get_the_ID(), 'editors_note', true );
		$issue_date = get_post_meta( get_the_ID(), 'date', true );
		$issue_no = get_post_meta( get_the_ID(), 'issue', true );
		?>
		<p class="mh-meta entry-meta">
			<?php echo !empty( $issue_no ) ? __( 'Issue: ', 'tni' ) . $issue_no : ''; ?>
			<?php echo !empty( $issue_date ) ? $issue_date : ''; ?>
		</p>
	</header>
	<?php dynamic_sidebar('posts-1'); ?>
	<div class="entry-content clearfix">
		<?php mh_magazine_lite_featured_image(); ?>
		<?php the_content(); ?>

		<?php if( !empty( $editors_note ) ) : ?>
			<div class="editors-note">
				<h3 class="editors-note-heading"><?php _e( 'Editorial Note', 'tni' ); ?></h3>
				<?php echo $editors_note; ?>
			</div>
		<?php endif; ?>
	</div>
	<?php the_tags('<div class="entry-tags clearfix"><i class="fa fa-tag"></i><ul><li>','</li><li>','</li></ul></div>'); ?>
	<?php dynamic_sidebar('posts-2'); ?>
</article>
