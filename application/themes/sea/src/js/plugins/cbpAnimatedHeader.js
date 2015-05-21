/**
 * cbpAnimatedHeader.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */
var cbpAnimatedHeader = (function() {

	var docElem = document.documentElement,
		header = $('.navbar-fixed-top'),
		didScroll = false,
		changeHeaderOn = 110,
		hideUpOn = 300;

	function init() {
                $('.scroll-top a').hide();
		window.addEventListener( 'scroll', function( event ) {
			if( !didScroll ) {
				didScroll = true;
				setTimeout( scrollPage, 250 );
			}
		}, false );
	}

	function scrollPage() {
		var sy = scrollY();
                
		if (($( 'body' ).innerWidth() < 768  && sy >= 55) ||sy >= changeHeaderOn ) {
			header.removeClass('navbar-big');
		}
		else {
			header.addClass('navbar-big');
		}
                
                
		if (sy >= hideUpOn ) {
			$('.scroll-top a').fadeIn( "slow");
		}
		else {
			$('.scroll-top a').fadeOut( "slow");
		}
                
		didScroll = false;
	}

	function scrollY() {
		return window.pageYOffset || docElem.scrollTop;
	}

	init();

})();