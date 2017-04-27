jQuery(document).ready( function($) {

	/*** NAV ***/

	$('body').addClass('nav-closed');

	$('.toggle-nav').click( function(e) {

		// toggle nav
		if ( $('body').hasClass('nav-open') ) {
			closeNav();
		} else {
			openNav();
		}

	});

	/*** KEYBOARD SHORTCUTS ***/

	$(document).keydown(function(e) {
		if ( e.keyCode == 77 ){ // m
			openNav();
		} else if ( e.keyCode == 27 ){ // esc key
			closeNav();
		}
	});

	/*** EQUALIZE ELEMENT HEIGHTS ***/

	equalize('body.home section.hero > div');
	equalize('body.home section.block');

	/*** FUNCTIONS **/

	function openNav() {
		$('body').removeClass('nav-closed').addClass('nav-open');
	}

	function closeNav() {
		$('body').removeClass('nav-open').addClass('nav-closed');
	}

	function getMaxHeight(s) {

		var maxHeight = 0;

		// get biggest and set as tileHeight
		$(s).each(function(){
			if ( $(this).outerHeight() > maxHeight ) { maxHeight = $(this).outerHeight(); }
		});

		return maxHeight;
	}

	function equalize(s) {
		$(s).outerHeight( getMaxHeight(s) );
	}

} );