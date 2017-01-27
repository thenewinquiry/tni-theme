<?php
/**
 * The template for displaying all single posts.
 *
 * @package Gridbox
 */

get_header(); ?>

	<section id="primary" class="content-single content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php if ( class_exists( 'Jetpack_RelatedPosts' ) ) : ?>
				<?php echo do_shortcode( '[jetpack-related-posts]' ); ?>
			<?php endif; ?>

			<?php comments_template(); ?>

		<?php endwhile; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
