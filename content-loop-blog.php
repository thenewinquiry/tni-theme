<?php /* Loop Template used for blog archive */ ?>
<article <?php post_class( 'mh-loop-item clearfix' ); ?>>
	<figure class="mh-loop-thumb">
		<a href="<?php echo $term_link; ?>">
			Image
		</a>
	</figure>
	<div class="mh-loop-content clearfix">
		<header class="mh-loop-header">
			<h3 class="entry-title mh-loop-title">
				<a href="<?php echo $term_link; ?>" rel="bookmark">
					<?php echo $term->name; ?>
				</a>
			</h3>
			<div class="mh-meta mh-loop-meta">
				<?php mh_magazine_lite_loop_meta(); ?>
			</div>
		</header>
		<div class="mh-loop-excerpt">
			<?php the_excerpt(); ?>
		</div>
	</div>
</article>
