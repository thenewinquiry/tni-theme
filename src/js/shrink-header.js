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
