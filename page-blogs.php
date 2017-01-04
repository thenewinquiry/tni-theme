<?php /* Template Name: Blogs */ ?>
<?php get_header(); ?>
<div class="mh-wrapper clearfix">
    <div id="main-content" class="mh-content" role="main" itemprop="mainContentOfPage">
        <?php while (have_posts()) : the_post(); ?>
			<?php mh_before_page_content(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

		<?php endwhile; ?>

        <?php
        $terms = get_terms( array(
            'taxonomy' => 'blog-types',
            'hide_empty' => true,
        ) );
        ?>
        <?php if( !empty( $terms ) ) : ?>
            <div class="articles-list">

            <?php foreach( $terms as $term ) : ?>

                <?php $term_link = get_term_link( $term ); ?>
                <?php $term_description = $term->description; ?>
                <?php
                $image_id = get_term_meta( $term->term_id, 'image', true );
                $image_data = wp_get_attachment_image_src( $image_id, 'mh-magazine-lite-medium' );
                $image = $image_data[0];

                $author_id = get_term_meta( $term->term_id, 'author', true );
                $author_data = get_userdata( $author_id );
                $author_name = $author_data->data->display_name;
                $author_link = get_author_posts_url( $author_id );
                ?>
                <article <?php post_class( 'mh-loop-item clearfix' ); ?>>
                	<figure class="mh-loop-thumb">
                		<a href="<?php echo $term_link; ?>">
                			<?php if ( ! empty( $image ) ) : ?>
                                <img src="<?php echo esc_url( $image ); ?>" />
                            <?php else : ?>
                                <img class="mh-image-placeholder" src="<?php echo get_template_directory_uri(); ?>/images/placeholder-medium.png" alt="No Picture" />
                            <?php endif; ?>
                		</a>
                	</figure>
                	<div class="mh-loop-content clearfix">
                		<header class="mh-loop-header">
                			<h3 class="entry-title mh-loop-title">
                				<a href="<?php echo esc_url( $term_link ); ?>" rel="bookmark">
                					<?php echo $term->name; ?>
                				</a>
                			</h3>
                			<div class="mh-meta mh-loop-meta">
                                <a href="<?php echo esc_url( $author_link ); ?>"><?php echo esc_attr( $author_name ); ?></a>
                			</div>
                		</header>
                		<div class="mh-loop-excerpt">
                			<?php echo $term_description; ?>
                		</div>
                	</div>
                </article>

            <?php endforeach; ?>

            </div>
        <?php endif; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
