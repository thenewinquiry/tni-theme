(function($) {

  /**
   * Add Mark-up Around Search Icon
   */
  $('.main-navigation-menu .menu-search-icon a').wrapInner('<span class="screen-reader-text" aria-hidden="true"></span>');


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

(function($) {

  $(document).on('scroll', function(){
		if
      ($(document).scrollTop() > 100){
		   $('.site-header').addClass('fixed-header');
		}
		else
		{
			$('.site-header').removeClass('fixed-header');
		}
	});

})( jQuery );
