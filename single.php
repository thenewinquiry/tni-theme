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

			<?php
			/**
			 * Add conditionals `tni_is_subscription_only` and `tni_core_check_auth` to serve alternate content to non-subscribers
			 * Note: It could be a template-part or a page that you create
			 */ ?>

			<?php get_template_part( 'template-parts/content-single', get_post_type() ); ?>

			<?php if ( class_exists( 'Jetpack_RelatedPosts' ) && 'post' == get_post_type() ) : ?>
        <h2 class="relatedposts-title"><?php _e('Further Reading', 'tni'); ?></h2>
				<?php echo do_shortcode( '[jetpack-custom-related]' ); ?>
			<?php elseif( 'magazines' == get_post_type() ) : ?>
				<?php get_template_part( 'template-parts/loop', 'related-posts' ); ?>
			<?php endif; ?>

			<?php comments_template(); ?>

		<?php endwhile; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
