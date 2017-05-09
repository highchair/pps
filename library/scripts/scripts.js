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

	/*** SEARCH BAR (desktop only) ***/

	$('#header .desktop-search').click( function() {

		openSearch();

	});

	/*** KEYBOARD SHORTCUTS ***/

	$(document).keydown(function(e) {
		if ( e.keyCode == 77 ){ // m
			openNav();
		} else if ( e.keyCode == 27 ){ // esc key
			closeNav();
			closeSearch();
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

	function openSearch() {
		$('#header nav').addClass('search-open');
		$('#searchform').prependTo('#header .desktop-search');
		$('#searchform input').focus();
	}

	function closeSearch() {
		$('#header nav').removeClass('search-open');
	}

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

} );