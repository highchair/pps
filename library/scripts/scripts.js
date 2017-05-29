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
			closeNav();
			closeSearch();
		}
	});

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

	function openNav() {
		$('body').removeClass('nav-closed').addClass('nav-open');
		$('html, body').animate({ scrollTop: $("#header nav").offset().top }, 500);
	}

	function closeNav() {
		$('body').removeClass('nav-open').addClass('nav-closed');
	}

	function openSearch() {
		$('#header nav').addClass('search-open');
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

	function unEqualize(s) {
		$(s).outerHeight( 'auto' );
	}

} );