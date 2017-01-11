<?php /* Template for displaying author box content */
if( is_tax( 'blog-types' ) ) {
	$queried_object = get_queried_object();
	$term_id = ( !empty( $queried_object ) ) ? $queried_object->term_id : '';
	$mh_author_box_ID = get_term_meta( $term_id, 'author', true );
} else {
	$mh_author_box_ID = get_the_author_meta( 'ID' );
}
$username = get_the_author_meta( 'display_name', $mh_author_box_ID );
$userposts = ( 'blogs' == get_post_type() ) ? count_user_posts( $mh_author_box_ID, 'blogs' ) : count_user_posts( $mh_author_box_ID ) ; ?>
<div class="mh-author-box clearfix">
	<figure class="mh-author-box-avatar">
		<?php echo get_avatar( $mh_author_box_ID, 90 ); ?>
	</figure>
	<div class="mh-author-box-header">
		<span class="mh-author-box-name">
			<?php printf( esc_html__( 'About %s', 'tni' ), $username ); ?>
		</span>
		<?php if ( !is_author() ) : ?>
			<span class="mh-author-box-postcount">
				<a href="<?php echo esc_url( get_author_posts_url( $mh_author_box_ID ) ); ?>" title="<?php printf( esc_html__( 'More articles written by %s', 'tni' ), $username ); ?>'">
					<?php esc_html( printf( _n( '%s Article', '%s Articles', $userposts, 'tni' ), $userposts ) ); ?>
				</a>
			</span>
		<?php endif; ?>
	</div>
	<?php if ( get_the_author_meta( 'description', $mh_author_box_ID ) ) : ?>
		<div class="mh-author-box-bio">
			<?php echo wp_kses_post( get_the_author_meta( 'description', $mh_author_box_ID ) ); ?>
		</div>
	<?php endif; ?>
</div>
