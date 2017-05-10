<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gridbox
 */

get_header();

if ( have_posts() ) : ?>

	<?php
	global $wp_query;
	$author = $wp_query->get_queried_object();
	?>

	<header class="page-header">
		<h2 class="entry-title"><?php echo $author->display_name; ?></h2>

		<?php if( $author->description ) : ?>
		<div class="archive-description">
			<?php echo $author->description; ?></p>
		</div>
		<?php endif; ?>

	</header>

<?php endif; ?>

	<section id="primary" class="content-archive content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : ?>

				<div id="post-wrapper" class="post-wrapper clearfix">

					<?php while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', get_post_type() );

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
