<?php
/**
 * The template for displaying current issue promo
 *
 * @package tni
 */

?>

<?php $current_issue = get_option( 'options_current_issue' ); ?>

<?php if( $current_issue ) : ?>
	<?php $current_issue = (int) $current_issue; ?>
	<?php $current_issue_details = get_post( $current_issue ); ?>
	<?php $promo_image = get_post_meta( $current_issue, 'issue_promo', true ); ?>
	<?php $promo_image = (int) $promo_image; ?>

	<div class="post-column clearfix">

		<article id="post-<?php echo $current_issue; ?>" <?php post_class( 'current-issue' ); ?>>

			<a href="<?php echo get_permalink( $current_issue ); ?>" rel="bookmark">

				<?php if( $promo_image ) : ?>
					<?php echo wp_get_attachment_image( $promo_image, 'full', array( 'title' => $current_issue_details->post_title ) );  ?>
				<?php elseif( has_post_thumbnail( $current_issue ) ) : ?>
					<?php echo get_the_post_thumbnail( $current_issue, 'full' ); ?>
				<?php else : ?>
					Wah... Wah... Wah...
				<?php endif; ?>

			</a>

		</article>

	</div>

<?php endif; ?>
