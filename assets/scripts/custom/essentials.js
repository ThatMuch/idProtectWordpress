/* eslint-disable no-undef */
/* eslint-disable no-unused-vars */
/*!
 * Essential javascript functions/variables
 *
 * @author      _a
 * @version     0.1.0
 * @since       _s_1.0.0.0
 *
 */

/*==================================================================================
  General Variables & Presets
==================================================================================*/


/* Viewport Width
/––––––––––––––––––––––––*/
var $vpWidth = jQuery( window ).width();

/* Touch Device
/––––––––––––––––––––––––*/
var $root = $( 'html' );
var isTouch = 'ontouchstart' in document.documentElement;
if ( isTouch ) {
	$root.attr( 'data-touch', 'true' );
} else {
	$root.attr( 'data-touch', 'false' );
}


/* Debouncer
/––––––––––––––––––––––––*/
// prevents functions to execute to often/fast
// Usage:
// var myfunction = debounce(function() {
//   // function stuff
// }, 250);
// window.addEventListener('resize', myfunction);
function debouncer( func, wait, immediate ) {
	var timeout;
	return function() {
		var context = this,
			args = arguments;
		var later = function() {
			timeout = null;
			if ( ! immediate ) {
				func.apply( context, args );
			}
		};
		var callNow = immediate && ! timeout;
		clearTimeout( timeout );
		timeout = setTimeout( later, wait );
		if ( callNow ) {
			func.apply( context, args );
		}
	};
}

$('.burger').click(function () {
	$(this).toggleClass('active');
	$('.navbar-collapse').toggleClass('active')
	return false;
});

// Get all the elements with the class "block__service"
$('.block__service').each(function (index) {
	 if(index % 2 == 1) {
    $(this).addClass('right');
  }
})

		$(document).ready(function ($) {

			$('.blog__list').owlCarousel({
				margin: 15,
				loop: true,
				dots: false,
				autoplay: true,
				autoplayHoverPause: true,
				stagePadding: 100,
				responsive: {
					0: {
						items: 1
					},
					768: {
						items: 2
					}
				}
			});
		});

