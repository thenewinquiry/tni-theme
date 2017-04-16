<?php
/**
 * The template for displaying the About page.
 *
 * @package Gridbox
 */

get_header();
?>

	<section id="primary" class="content-single content-area content-about">
		<main id="main" class="site-main" role="main">
            <?php while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content', 'page' );
            endwhile; ?>

            <h3 class="editorial-board-title"><?php _e('Editorial Board', 'tni'); ?></h3>
            <?php tni_core_editors_by_title(); ?>
        </main>
    </section>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>

