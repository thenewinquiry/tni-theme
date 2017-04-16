=== TNI Theme ===
Theme URI: https://github.com/misfist/tni-theme
Tags: Blog, Magazine
Requires at least: 4.5.0
Tested up to: 4.7.2
Version: 0.6.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Custom theme for The New Inquiry, based on Gridbox theme.

== Changelog ==

== 0.6.0 April 13, 2017 =
* Add subscriber content
* Added `tni_the_magazine_pdf()` template tag

== 0.5.1 April 15, 2017 =
* Updated styles for images on single posts
* Changed header thumbnail for single posts

== 0.5.0 April 11, 2017 =
* Add Co-authors Plus support - `gridbox_entry_meta()` template tag will use coauthor plus function if it is active

== 0.4.2 April 11, 2017 =
* Updated style
* Changed markup for "All Past Issues" link in `template-parts/content-magazines.php`

== 0.4.1 April 10, 2017 =
* #30 Show all posts on magazine archive page
* #31 Add "All Past Issues" link to Recent Issues section

= 0.4.0 =
* Separated JetPack customization functions into separate file (`inc/jetpack.php`)
* Moved JetPack custom related posts to core plugin
* Reverted `content-footer` widget to single posts
* Registered `footer` sidebar and added to footer
* Added template tag for adding conditional excerpt `tni_custom_excerpt()` ( accepts params $post_id = null, $limit = null, $more = '' )
* Excluded '&,Meanwhile' category from loops and search, and post navigation (even though post navigation isn't currently displayed)
* Disabled infinite scroll
* #20 Added setting for home page posts per page

= 0.3.2 February 24, 2017 =
* #6 Updated margin note styling
* #7 Replaced Load More text with image (button text still rendered, but visually hidden, for screen readers)
* #8 Updated blockquote styling

= 0.3.1 February 19, 2017 =
* Dequeued JetPack Related Posts CSS

= 0.3.0 February 19, 2017 =
* Added Droid Serif italic fonts
* Tweaked magazine single styling based on feedback

= 0.2.0 February 18, 2017 =
* Added margin note styling.

= 0.1.12 February 14, 2017 =
* Added gallery styles
* Added share icon styles

= 0.1.11 February 14, 2017 =
* Tweaked responsive header
* Dequeued JetPack Related Posts styles
* Added background-color to `.post-image`
* Added gallery styles
* Added share icon styles

= 0.1.10 February 12, 2017 =
* Tweaked responsive header
* Modified search results page to display blog posts the same as standard posts
* Styled search results page

= 0.1.9 February 11, 2017 =
* Fixed responsive header
* Added scrolled menu styling
* Fixed responsive column widths
* Added mobile menu
* Replaced parent navigation JS

= 0.1.8.2 February 10, 2017 =
* Removed top-margin from `post-thumbnail`

= 0.1.8.1 February 10, 2017 =
* Updated `gridbox_post_image` template tag to default to `thumbnail`
* Updated `gridbox_post_image_single` template tag to default to `full`
* Styled archive thumbnails
* Replaced Kanit with Work Sans Google font

= 0.1.8 February 7, 2017 =
* Style archive thumbnails
* Change blocky font

= 0.1.7 February 2, 2017 =
* Added single magazine template
* Added single magazine widget area
* Modified JetPack Related Posts display
* Updated styling
* Added homepage ad space/promo
* Modified featured image markup to use `figure` and `figcaption`
* Modified `[caption]` shortcode markup

= 0.1.6.2 January 30, 2017 =
* Minor - modified JetPack related posts default image
* Added content widget after single page content
= 0.1.6.1 January 27, 2017 =
* Minor - right-aligned social menu.
= 0.1.6 January 26, 2017 =
* Added  `before_link` markup for social nav icons
* Removed JetPack Related Post from content and added after article markup.

= 0.1.5 January 22, 2017 =
* Added item slug to navigation items
* Added styling so Past Issues won't appear active if on Current Issue page

= 0.1.4 January 22, 2017 =
* Added DEK (post_subhead) field
* Updated styling for DEK and related posts

= 0.1.3 January 22, 2017 =
* Added additional widget areas - top of page and after article content

= 0.1.2 January 21, 2017 =
* [WIP] - Added magazines content template
* Added date filter for magazine archives
* Set `archive.php` to look for post_type content template
* Further updated styling

= 0.1.1 January 21, 2017 =
* [WIP] - Updated homepage styling to allow for current issue ad

= 0.1.0 January 20, 2017 =
* [WIP] - Updated to use a new parent theme:
   * Added images.
   * Removed unused templates
   * Updated styles
   * Updated configs
   * Added parent theme overrides
   * Added new template files
