<?php
/**
 * The template for displaying single posts
 *
 * @package tni
 */

?>

<?php $sub_only = ( function_exists( 'tni_is_subscription_only' ) ) ? tni_is_subscription_only(get_the_ID()) : false; ?>
<?php $auth = ( function_exists( 'tni_core_check_auth' ) ) ? tni_core_check_auth() : false; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

        <?php // Get theme options from database.
        $theme_options = gridbox_theme_options(); ?>

        <?php if( true === $theme_options['meta_category'] && !is_category() ) : ?>
            <div class="entry-meta">
                <?php echo gridbox_meta_category(); ?>
            </div>
        <?php endif; ?>

        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <?php $subhead = get_post_meta( get_the_ID(), 'post_subhead', true ); ?>

        <?php if( !empty( $subhead ) ) : ?>
            <h2 class="entry-subhead">
                <?php echo $subhead; ?>
            </h2>
        <?php endif; ?>

        <?php gridbox_entry_meta(); ?>

        <?php $hide_featured_image = get_post_meta( get_the_id(), 'hide_featured_image', true );
        if( !$hide_featured_image ) : ?>

        <?php gridbox_post_image_single( 'full' ); ?>

        <?php endif; ?>

    </header><!-- .entry-header -->

    <div class="entry-content clearfix">

        <?php if ( $sub_only && !$auth ) : ?>

            <div class="entry-content-subscribe">
                <?php $subscription_date = get_post_meta( get_the_ID(), 'subscriber_only_date', true ); ?>
                <?php _e( 'This essay is available only to subscribers until', 'tni' ); ?> <?php echo date( 'F d, Y', strtotime( $subscription_date ) ); ?>
                <p class="highlight subscribe"><a href="https://members.thenewinquiry.com"><?php _e( 'Subscribe today for $2', 'tni' ); ?></a></p>
                 <p><?php _e( 'We\'re grateful for the generous support of our readers.', 'tni' ); ?></p>
            </div>

        <?php else : ?>

            <?php $audio_url = get_post_meta( $post->ID, 'audio_url', true ); ?>
            <?php if ( $audio_url ) : ?>
                <?php if ( !$auth ) : ?>
                    <a name="audio"></a>
                    <div class="audio-embed">
                        <iframe width="100%" height="20" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo urlencode($audio_url); ?>&amp;color=ff5500&amp;inverse=false&amp;auto_play=false&amp;show_user=true"></iframe>
                        <h5 class="audio-embed-caption"><?php _e( 'Listen to this essay as audio. Provided by <a href="https://www.curio.io/">curio.io</a> for our subscribers.'); ?></h5>
                    </div>
                <?php else : ?>
                    <h5 class="audio-embed-caption">
						<img class="audio-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/audio.png" title="<?php _e( 'Audio version available', 'tni' ); ?>" />
                        <?php _e( 'An audio version of this essay is available to <a href="https://members.thenewinquiry.com">subscribers</a>.' ); ?>
                    </h5>
                <?php endif; ?>
            <?php endif; ?>

            <?php the_content(); ?>

            <?php wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tni' ),
                'after'  => '</div>',
            ) ); ?>

        <?php endif; ?>

    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php if ( !$auth ) : ?>
            <?php if( is_active_sidebar( 'content-footer' ) ) : ?>
                <div class="content-footer-widget">
                    <?php dynamic_sidebar( 'content-footer' ); ?>
                </div><!-- .footer-widget -->
            <?php endif; ?>
        <?php endif; ?>

    </footer><!-- .entry-footer -->
</article>
