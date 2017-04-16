<?php
/**
 * The template for displaying single magazine issue
 *
 * @package tni
 */
?>


<?php $auth = tni_core_check_auth(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php if( has_post_thumbnail() ) : ?>

			<figure class="single-post-thumbnail">
				<?php the_post_thumbnail( 'full' ); ?>
                <?php if ( !$auth ) : ?>
                    <div class="starburst">
                        <img id="starburst" src="<?php echo get_stylesheet_directory_uri(); ?>/images/starburst.png" title="<?php _e( 'Subscriptions $3', 'tni' ); ?>" />
                    </div>
                <?php endif; ?>
			</figure>

		<?php endif; ?>

        <?php if ( $auth ) : ?>
			<div class="magazine-sidebar entry-content">
                <header class="issue-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        
                    <div class="entry-meta">
                        <span class="issue-number"><?php _e('Vol.', 'tni'); ?> <?php echo get_post_meta( get_the_ID(), 'issue', true ); ?></span> | 
                        <span class="issue-date"><?php the_date(); ?></span>
                    </div>
                </header>

				<?php tni_the_magazine_pdf(); ?>
                <div class="issue-toc">
                    <?php echo apply_filters( 'meta_content', get_post_meta( get_the_ID(), 'issue_toc', true ) ); ?>
                </div>
            </div>
		<?php elseif ( is_active_sidebar( 'magazine-single' ) ) : ?>
			<div class="magazine-sidebar">
				<?php dynamic_sidebar( 'magazine-single' ); ?>
			</div><!-- .header-widget -->
		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content clearfix">

        <?php if ( !$auth ) : ?>
            <header class="issue-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    
                <div class="entry-meta">
                    <span class="issue-number"><?php _e('Vol.', 'tni'); ?> <?php echo get_post_meta( get_the_ID(), 'issue', true ); ?></span> | 
                    <span class="issue-date"><?php the_date(); ?></span>
                </div>
            </header>
    
            <div class="issue-content">
                <div class="editors-note">
                    <h2 class="issue-note"><?php _e( 'Editors\' Note', 'tni' ); ?></h2>
                    <?php the_content(); ?>
                </div>
    
                <div class="issue-toc">
                    <h2 class="issue-features"><?php _e( 'Featuring', 'tni' ); ?></h2>
                    <?php echo strip_tags( apply_filters( 'meta_content', get_post_meta( get_the_ID(), 'issue_toc', true ) ), '<p><strong><br>' ); ?>
                </div>
            </div>
        <?php endif; ?>

		<div class="issue-gallery">
			<?php echo do_shortcode( get_post_meta( get_the_ID(), 'issue_gallery', true ) ); ?>
		</div>

		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gridbox' ),
			'after'  => '</div>',
		) ); ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php gridbox_entry_tags(); ?>

	</footer><!-- .entry-footer -->

</article>
