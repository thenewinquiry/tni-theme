<?php
/**
 * The template for displaying a blog listing.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tni
 */

get_header();

if ( have_posts() ) : ?>

	<header class="page-header clearfix">

		<?php the_archive_title( '<h1 class="archive-title">', '</h1>' ); ?>
		<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>

	</header>

<?php endif; ?>

	<?php
	$terms = get_terms( array(
		'taxonomy' 	=> 'blog-types',
		'number'	=> 0
	));
	/**
	 * get_categories();
	 * get the post meta
	 * image
	 * author
	 * title
	 * link
	 */
	?>

	<section id="primary" class="content-archive content-area">
		<main id="main" class="site-main" role="main">

			<?php if( !empty( $terms ) ) : ?>
				<div id="post-wrapper" class="post-wrapper clearfix">

				<?php foreach( $terms as $term ) : ?>

					<?php $term_link = get_term_link( $term ); ?>
					<?php $term_description = $term->description; ?>
					<?php
					$image_id = get_term_meta( $term->term_id, 'image', true );
					$image_data = wp_get_attachment_image_src( $image_id, 'post_thumbnail' );
					$image = $image_data[0];

					$author_id = get_term_meta( $term->term_id, 'author', true );
					$author_data = get_userdata( $author_id );
					$author_name = $author_data->data->display_name;
					$author_link = get_author_posts_url( $author_id );
					?>

					<div class="post-column clearfix">

						<article id="post-<?php the_ID(); ?>" <?php post_class(  ); ?>>
							<figure class="thumbnail">
								<a href="<?php echo $term_link; ?>">
									<?php if ( ! empty( $image ) ) : ?>
										<img src="<?php echo esc_url( $image ); ?>" />
									<?php else : ?>
										<img class="image-placeholder" src="<?php echo get_stylesheet_directory_uri(); ?>/images/tni-placeholder.png" alt="" />
									<?php endif; ?>
								</a>
							</figure>
							<header class="entry-header">
								<h2 class="entry-title"><a href="<?php echo esc_url( $term_link ); ?>" rel="bookmark">
									<?php echo $term->name; ?>
								</a></h2>
								<div class="entry-meta">
									<span class="meta-author">
										<span class="author vcard">
											<?php _e( 'By', 'tni' ); ?>
											<a href="<?php echo esc_url( $author_link ); ?>" title="<?php _e( 'View all posts by ', 'tni' ) . esc_attr( $author_name ); ?>"><?php echo esc_attr( $author_name ); ?></a>
										</span>
									</span>
								</div>
							</header><!-- .entry-header -->

							<div class="entry-content clearfix">
								<?php echo $term_description; ?>
							</div>

							<footer class="entry-footer">
							</footer><!-- .entry-footer -->
						</article>

					</div>

				<?php endforeach; ?>

				</div>
			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
