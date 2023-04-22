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
var $vpWidth = jQuery(window).width();

/* Touch Device
/––––––––––––––––––––––––*/
var $root = $('html');
var isTouch = 'ontouchstart' in document.documentElement;
if (isTouch) {
	$root.attr('data-touch','true');
} else {
	$root.attr('data-touch','false');
}


/* Debouncer
/––––––––––––––––––––––––*/
// prevents functions to execute to often/fast
// Usage:
// var myfunction = debounce(function() {
//   // function stuff
// }, 250);
// window.addEventListener('resize', myfunction);
function debouncer(func,wait,immediate) {
	var timeout;
	return function () {
		var context = this,
			args = arguments;
		var later = function () {
			timeout = null;
			if (!immediate) {
				func.apply(context,args);
			}
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later,wait);
		if (callNow) {
			func.apply(context,args);
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
	if (index % 2 == 1) {
		$(this).addClass('right');
		// Add the class right to the element with the class "card__title"
		$(this).find('.card__title').addClass('right');
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

// replace the class "nav-item" for every <li> element inside the element with the class "article__list"
$('.article__list li').each(function () {
	$(this).removeClass('nav-item').addClass('article__item');
});
$('.article__item .wp-block-latest-posts__featured-image').each(function () {
	$(this).removeClass('wp-block-latest-posts__featured-image').addClass('article__image');
});
$('.article__item .wp-block-latest-posts__post-title').each(function () {
	$(this).wrap('<div class="article__body"><h2></h2></div>');
});

// get the index website url and remove the text after the third slash
var url = window.location.href;
var url = url.split('/');
var url = url[0] + '//' + url[2] + '/';

// add the category in a h6 element before the title
$('.sidebar-pro .article__item .article__body h2').each(function () {
	$(this).before('<h6><a href="' + url + 'category/professionnel">• Professionnel</a></h6>');
});
$('.sidebar-part .article__item .article__body h2').each(function () {
	$(this).before('<h6><a href="' + url + 'category/particulier">• Particulier</a></h6>');
});

// add the category link after the article__list
$('.sidebar-pro .article__list').after('<a href="' + url + 'category/professionnel" class="btn btn__orange blue dark text-uppercase mb-3">Tous les articles</a>');
$('.sidebar-part .article__list').after('<a href="' + url + 'category/particulier" class="btn btn__orange blue text-uppercase mb-3">Tous les articles</a>');






