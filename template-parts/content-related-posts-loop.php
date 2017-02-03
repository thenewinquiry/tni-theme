<?php
/**
 * The template for displaying related magazine issues
 * Markup mimics JetPack Related Posts
 *
 * @package tni
 */

?>

<?php
$count = ( int ) 4;

$args = array(
	'posts_per_page'   => $count,
	'post_type'        => get_post_type(),
	'exclude'          => get_the_ID()
);

$posts = get_posts( $args );
?>

<?php if( !empty( $posts ) ) : ?>

	<div id="relatedposts" class="relatedposts">
		<h3 class="relatedposts-headline"><?php _e( 'Recent Issues', 'tni' ); ?></h3>
		<div class="relatedposts-items relatedposts-items-visual relatedposts-grid">

			<?php foreach( $posts as $post ) : ?>
				<?php setup_postdata( $post ); ?>

				<?php get_template_part( 'template-parts/content', 'related-post' ); ?>

			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>

		</div>
	</div>

<?php endif; ?>
