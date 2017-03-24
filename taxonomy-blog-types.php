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

        <?php
            $term_id = get_queried_object()->term_id;
            $image_id = get_term_meta( $term_id, 'image', true );
            $image_data = wp_get_attachment_image_src( $image_id, 'post_thumbnail' );
            $image = $image_data[0];
        ?>
        <?php if ( ! empty( $image ) ) : ?>
            <img src="<?php echo esc_url( $image ); ?>" title="<?php the_archive_title() ?>"/>
        <?php else : ?>
            <img class="image-placeholder" src="<?php echo get_stylesheet_directory_uri(); ?>/images/tni-placeholder.png" alt="" />
        <?php endif; ?>

		<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>

	</header>

<?php endif; ?>

	<section id="primary" class="content-archive content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : ?>

				<div id="post-wrapper" class="post-wrapper clearfix">

					<?php while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'blog' );

					endwhile; ?>

				</div>

				<?php gridbox_pagination(); ?>

			<?php
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
