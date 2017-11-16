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


                <?php if( $featured_bundle = get_option( 'options_featured_bundle' ) ) : // If featured bundle exists ?>

                    <?php if( ( function_exists( 'tni_core_get_featured_bundle_posts' ) ) && ( $bundle_posts = tni_core_get_featured_bundle_posts() ) ) : ?>
                        <?php /* image id is stored as term meta */
                        if( $image_id = get_term_meta( $featured_bundle, 'image', true ) ) : ?>

                           <?php
                            /* Replace `$image_size = 'thumbail'` with the size you want to use (probably 'full') */
                           $image_data = wp_get_attachment_image_src( $image_id, $image_size = 'full' ); ?>

                           <?php
                            /* image data is stored in array; image `url` is the first item */
                           $image = $image_data[0]; ?>

                           <?php if( !empty( $image ) ) : ?>
                             <div class="featured-bundle-post-wrapper post-wrapper clearfix" style="background:url('<?php echo esc_url( $image ); ?>');">
                           <?php endif; ?>
                        <?php else : ?>
                            <div class="featured-bundle-post-wrapper post-wrapper clearfix">
                        <?php endif; ?>

                            <?php $bundle_term = get_term($featured_bundle, 'bundle'); ?>
                            <h2 class="featured-bundle-name"><?php echo $bundle_term->name; ?></h2>
                            <p class="featured-bundle-description"><?php echo $bundle_term->description; ?></p>
                            <div class="featured-bundle-overlay"></div>
                            <div class="featured-bundle-posts">
                                <?php
                                $args = array(
                                    'post__in'							 => $bundle_posts,
																		'post_type' 						 => array( 'post', 'blogs' ),
                                    'ignore_sticky_posts'    => true,
                                );
                                $bundle_query = new WP_Query( $args );
                                ?>

                                <?php if ( $bundle_query->have_posts() ) : ?>
                                    <?php while ( $bundle_query->have_posts() ) : ?>
                                    <?php $bundle_query->the_post(); ?>

                                        <?php get_template_part( 'template-parts/content' ); ?>

                                    <?php endwhile; ?>
                                <?php endif; ?>

                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>

                    <?php endif; ?>

                <?php endif; ?>

				<div id="post-wrapper" class="post-wrapper clearfix">

					<?php
					if ( have_posts() ) : ?>

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
