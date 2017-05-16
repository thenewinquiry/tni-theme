<?php
/**
 * The template for displaying the blog index (latest posts)
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tni
 */

get_header();

// Get Theme Options from Database.
$theme_options = gridbox_theme_options();

// Display Blog Title.
if ( '' !== $theme_options['blog_title'] ) : ?>

	<header class="page-header clearfix">

		<h1 class="blog-title page-title"><?php echo wp_kses_post( $theme_options['blog_title'] ); ?></h1>
		<p class="blog-description"><?php echo wp_kses_post( $theme_options['blog_description'] ); ?></p>

	</header>

<?php endif; ?>

	<section id="primary" class="content-archive content-area">
		<main id="main" class="site-main" role="main">

			<?php
			$feature = tni_get_featured_post();
			if( !empty( $feature ) ) : ?>
			<?php
				global $post;
				$post = $feature;
				setup_postdata( $post );
			?>

				<?php get_template_part( 'template-parts/content', 'featured' ); ?>

			<?php wp_reset_postdata(); ?>
			<?php endif; ?>

			<?php
			if ( have_posts() ) : ?>

				<div id="post-wrapper" class="post-wrapper clearfix">

					<?php $count = 1; ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php if ( 4 == $count ) : ?>

							<?php $prev_post = $post ?>
							<?php $post = get_posts( array( 'post_type' => 'magazines' ) )[0]; ?>
							<?php get_template_part( 'template-parts/content', 'latest-issue' ); ?>
							<?php $post = $prev_post ?>
                        <?php endif; ?>

					    <?php get_template_part( 'template-parts/content' ); ?>

						<?php $count++; ?>

					<?php endwhile; ?>

				</div>

				<?php gridbox_pagination(); ?>

			<?php
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</main><!-- #main -->

	</section><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
