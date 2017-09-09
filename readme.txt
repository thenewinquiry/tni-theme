=== TNI Theme ===
Theme URI: https://github.com/misfist/tni-theme
Tags: Blog, Magazine
Requires at least: 4.5.0
Tested up to: 4.8
Version: 0.7.17
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Custom theme for The New Inquiry, based on Gridbox theme.

== Changelog ==

== 0.7.18 September 9, 2017 ==
* Integrated curio.io embeds into posts

== 0.7.17 August 23, 2017 ==
* Change preference for featured post subhead

== 0.7.16 August 20, 2017 ==
* Remove box shadow from featured post image

== 0.7.15 August 14, 2017 ==
* Consolidated `pre_get_posts` filters
* Added authorization check function to all post loops

== 0.7.14 August 13, 2017 ==
* Only show content footer widget (subscribe prompt) if not logged in
* Show first margin notes on mobile

== 0.7.13 August 3, 2017 ==
* Change how advance essays are handled for subscribers
* #77 - Unauthenticated users see prompt to subscribe for subscriber-only essays

== 0.7.12 July 14, 2017 ==
* #80 - Conditionally show `seo_description` on featured post

== 0.7.11 June 22, 2017 ==
* Enabled `audio` post format.

== 0.7.9 June 19, 2017 ==
* Added styling for project links

== 0.7.8 June 8, 2017 ==
* Fixed blockquote styling

== 0.7.7 May 16, 2017 ==
* Fixed home page post loop polluting post variable

== 0.7.6 May 16, 2017 ==
* Fixed home page post loop skipping fourth post

== 0.7.5 May 12, 2017 ==
* Updated styling for contributors and authors pages

== 0.7.4 May 11, 2017 ==
* #68 Added default featured image in list views when no featured image is designated
* #69 Added conditional to hide featured image on single posts when `hide_featured_image` is true

== 0.7.3 May 9, 2017 ==
* #21 Show author name and description on author page

== 0.7.2 May 1, 2017 ==
* #63 Show blog post titles on home page

== 0.7.1 April 30, 2017 ==
* #63 Include `blogs` post type in home query

== 0.7.0 April 27, 2017 ==
* Modified homepage to display featured article

== 0.6.13 ==
* Post-launch updates

== 0.6.12 April 18, 2017 ==
* Fixed styling for footer on smaller screen sizes

== 0.6.11 April 18, 2017 ==
* #54 Added filter to `get_the_excerpt` to allow shortcode content in excerpt.

== 0.6.10 April 17, 2017 ==
* Minor css fix for starburst image on single magazine page on smaller width screens

== 0.6.9 April 17, 2017 ==
* Removed page-about.php template

== 0.6.6 April 17, 2017 ==
* Fixed grid thumbnail markup

== 0.6.5 April 17, 2017 ==
* Modified thumbnail markup

== 0.6.4 April 17, 2017 ==
* Set custom default OpenGraph image

== 0.6.3 April 17, 2017 =
* #45 Reset postdata

== 0.6.1 April 16, 2017 =
* Added conditional to check for existence of `tni_core_check_auth` before calling

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
