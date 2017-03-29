<?php
/**
 * TNI Settings Functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gridbox
 * @subpackage tni
 * @since 0.4.0
 */

/**
 * Register Setting
 *
 * @since 0.4.0
 *
 * @uses register_setting
 * @uses add_settings_section
 * @uses add_settings_field
 *
 * @link https://codex.wordpress.org/Settings_API
 *
 * @return void
 */
function tni_settings_init() {
  register_setting(
    'reading', // Settings Section
    'home-posts-per-page'
  );

  add_settings_section(
    'home-posts-per-page-section', // Section ID
    __( 'Home Page Settings', 'tni' ), // Section Title
    'tni_home_settings_description', // Callback
    'reading' // Settings Section
  );

  add_settings_field(
    'home-posts-per-page', // Field ID
    __( 'Home page show at most', 'tni' ),  // Field Title
    'tni_home_posts_per_page_field', // Callback
    'reading', // Settings Section
    'home-posts-per-page-section' // Section ID
  );

}
add_action( 'admin_init', 'tni_settings_init' );

/**
 * Home Page Posts per Page Section
 *
 * @since 0.4.0
 *
 * @return void
 */
function tni_home_settings_description() {
  echo __( '', 'tni' );
}

/**
 * Home Page Posts per Page Field
 *
 * @since 0.4.0
 *
 * @return void
 */
function tni_home_posts_per_page_field() {
  $default = 13;
  $option = get_option( 'home-posts-per-page', $default );
  ?>
  <input name="home-posts-per-page" type="number" step="1" min="1" id="home-posts-per-page" value="<?php echo $option; ?>" class="small-text" /> <?php _e( 'posts', 'tni' ); ?>

  <?php
}
