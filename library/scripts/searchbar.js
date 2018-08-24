jQuery(document).ready( function($) {

	/*** SEARCH BAR (desktop only) ***/

	// move search form to a different place on larger sizes
	$(window).resize(function(){
		if (Modernizr.mq('(min-width: 1024px)')) {
			$('#searchform').prependTo('#header .desktop-search');
		}
	});

	// open search input when link is clicked
	$('#header .desktop-search').click( function() {

		openSearch();

	});

	/*** KEYBOARD SHORTCUTS ***/

	$(document).keydown(function(e) {
		if ( e.keyCode == 27 ){ // esc key
			closeSearch();
		}
	});

	/*** FUNCTIONS **/

	function openSearch() {
		$('#header nav').addClass('search-open');
		$('#searchform input').focus();
	}

	function closeSearch() {
		$('#header nav').removeClass('search-open');
	}
  
} );
