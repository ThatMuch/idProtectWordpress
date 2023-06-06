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

(function ($) {
	//==================================================================================
	// General Variables & Presets
	//==================================================================================
	var $vpWidth = $(window).width();
	var $root = $('html');
	var isTouch = 'ontouchstart' in document.documentElement;

	//==================================================================================
	// Functions
	//==================================================================================

	function setTouchAttribute() {
		if (isTouch) {
			$root.attr('data-touch','true');
		} else {
			$root.attr('data-touch','false');
		}
	}

	function toggleNavbar() {
		$('.burger').click(function () {
			$(this).toggleClass('active');
			$('.navbar-collapse').toggleClass('active');
			return false;
		});
	}

	function setBlockServiceClass() {
		$('.block__service').each(function (index) {
			if (index % 2 === 1) {
				$(this).addClass('right');
				$(this).find('.card__title').addClass('right');
			}
		});
	}

	function initializeOwlCarousel() {
		$('.blog__list').owlCarousel({
			margin: 15,
			loop: true,
			dots: false,
			autoplay: true,
			autoplayHoverPause: true,
			stagePadding: 100,
			responsive: {
				0: {
					items: 1,
				},
				768: {
					items: 2,
				},
			},
		});
	}

	function updateArticleListItems() {
		$('.article__list li').each(function () {
			$(this).removeClass('nav-item').addClass('article__item');
		});
	}

	function updateArticleImages() {
		$('.article__item .wp-block-latest-posts__featured-image').each(function () {
			$(this).removeClass('wp-block-latest-posts__featured-image').addClass('article__image');
		});
	}

	function wrapArticleTitle() {
		$('.article__item .wp-block-latest-posts__post-title').each(function () {
			$(this).wrap('<div class="article__body"><h2></h2></div>');
		});
	}

	function addCategoryLinks() {
		var url = window.location.href.split('/');
		url = url[0] + '//' + url[2] + '/';

		$('.sidebar-pro .article__item .article__body h2').each(function () {
			$(this).before('<h6><a href="' + url + 'category/professionnel">• Professionnel</a></h6>');
		});

		$('.sidebar-part .article__item .article__body h2').each(function () {
			$(this).before('<h6><a href="' + url + 'category/particulier">• Particulier</a></h6>');
		});

		$('.sidebar-pro .article__list').after('<a href="' + url + 'category/professionnel" class="btn btn__orange blue dark text-uppercase mb-3">Tous les articles</a>');
		$('.sidebar-part .article__list').after('<a href="' + url + 'category/particulier" class="btn btn__orange blue text-uppercase mb-3">Tous les articles</a>');
	}

	// Find every link with the class "wp-block-button__link wp-element-button" and replace it by a link with the class "btn btn__outlined"
	$('.wp-block-button__link.wp-element-button').each(function () {
		$(this).removeClass('wp-block-button__link wp-element-button').addClass('btn btn__orange blue');
	});
	$('.wp-block-file__button').each(function () {
		$(this).removeClass('wp-block-file__button wp-element-button').addClass('btn btn__orange blue');
		console.log("first")
	});

	//==================================================================================
	// Initialization
	//==================================================================================
	$(document).ready(function () {
		setTouchAttribute();
		toggleNavbar();
		setBlockServiceClass();
		initializeOwlCarousel();
		updateArticleListItems();
		updateArticleImages();
		wrapArticleTitle();
		addCategoryLinks();
	});

})(jQuery);
