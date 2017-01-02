<?php /* Loop Template used for magazine archive */ ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php
	$issue_date = get_post_meta( get_the_ID(), 'date', true );
	$issue_no = get_post_meta( get_the_ID(), 'issue', true );
	$editors_note = get_post_meta( get_the_ID(), 'editors_note', true );
	?>
	<article <?php post_class('mh-loop-item clearfix'); ?>>
		<figure class="mh-loop-thumb">
			<a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'mh-magazine-lite-medium' ); ?>
				<?php else : ?>
					<img class="mh-image-placeholder" src="<?php echo get_template_directory_uri(); ?>/images/placeholder-medium.png" alt="No Picture" />
				<?php endif; ?>
			</a>
		</figure>
		<div class="mh-loop-content clearfix">
			<header class="mh-loop-header">
				<h3 class="entry-title mh-loop-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark">
						<?php the_title(); ?>
					</a>
				</h3>
				<div class="mh-meta mh-loop-meta">
					<?php echo !empty( $issue_no ) ? __( 'Issue: ', 'tni' ) . $issue_no : ''; ?>
					<?php echo !empty( $issue_date ) ? $issue_date : ''; ?>
					<?php// mh_magazine_lite_loop_meta(); ?>
				</div>
			</header>
			<div class="mh-loop-excerpt">

				<?php if( !empty( $editors_note ) ) : ?>
					<?php
					if( strlen( $editors_note ) > 150 ) :
						$editors_note = sprintf( '%s... <a href="%s"><span class="read-more">%s</span></a>',
    						substr( $editors_note, 0, 150 ),
    						esc_url( get_permalink() ),
							__( 'Read More' )
    					);
					endif;
					?>
					<?php echo $editors_note; ?>
				<?php endif; ?>
			</div>
		</div>
	</article>
<?php endwhile; ?>
