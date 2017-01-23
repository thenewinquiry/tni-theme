(function($) {

  /**
   * Add Mark-up Around Search Icon
   */
  $('.main-navigation-menu .menu-search-icon a').wrapInner('<span class="screen-reader-text" aria-hidden="true"></span>');
  $('.main-navigation-menu .menu-search-icon .screen-reader-text').before('<i class="icon icon-search" aria-hidden="true"></i>');

  /**
   * Toggle Search Expand/Collapse
   */
  $('.main-navigation-menu .menu-search-icon').on('click', function(event) {
    event.preventDefault();
    var $el = $('.top-search');

    $el.toggleClass( 'expanded' ).toggleClass( 'collapsed' );

    if( 'true' == $el.attr( 'aria-expanded' ) ) {
      $el.attr( 'aria-expanded', 'false' );
    } else {
      $el.attr( 'aria-expanded', 'true' );
    }

  });

})( jQuery );
