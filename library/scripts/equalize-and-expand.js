jQuery(document).ready( function($) {

	/*** EQUALIZE ELEMENT HEIGHTS ***/

  $(window).resize(function(){

    if (Modernizr.mq('(min-width: 1024px)')) {

		// reset in case it's already been equalized
		unEqualize('body.home section.hero > div');
		unEqualize('body.home section.articles article a');
		unEqualize('body.home section.block');

		// equalize
		equalize('body.home section.hero > div');
		equalize('body.home section.articles article a');
		equalize('body.home section.block');

    } else {

		unEqualize('body.home section.hero > div');
		unEqualize('body.home section.articles article a');
		unEqualize('body.home section.block');
		
    }
  }).resize();   // Cause an initial widow.resize to occur


  /*** EXPAND BLOCKS ***/

  $('div.expand .button').click( function() {
		$(this).closest('section.block').addClass('expanded');
  });


	/*** FUNCTIONS **/

	function getMaxHeight(s) {

		var maxHeight = 0;

		// get biggest
		$(s).each(function(){
			if ( $(this).outerHeight() > maxHeight ) { maxHeight = $(this).outerHeight(); }
		});

		return maxHeight;
	}

	function equalize(s) {
		$(s).outerHeight( getMaxHeight(s) );
	}

	function unEqualize(s) {
		$(s).outerHeight( 'auto' );
	}
  
} );
