/**
 * Theme scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery(function ($) {
	"use strict";

	var width = $(document).outerWidth()

	// set all needed classes when we start
	$('.sub-menu').addClass('closed');

	//Hamburger animation
	$('.toggle-nav').click(function () {
		$(this).toggleClass('active');
		$('#menu-main-menu, #menu-global-menu, #menu-evergreen-main-menu').toggleClass('opened');
		$('#menu-main-menu, #menu-global-menu, #menu-evergreen-main-menu').toggleClass('active');
		$('.sub-menu').removeClass('opened');
		$('.sub-menu').addClass('closed');
		return false;
	});

	// //Toggle mobile menu & search
	// $('.toggle-nav').click(function() {
	// 	$('#menu-main-menu').slideToggle(400);
	// });
	 
	// //Close navigation on anchor tap
	// $('.toggle-nav.active').click(function() {	
	// 	$('#menu-main-menu').slideUp(400);
	// });	

	//Mobile menu accordion toggle for sub pages
	// $('#menu-main-menu > li.menu-item-has-children').append('<div class="accordion-toggle"><span class="icon-icon-chevron-right"></span></span></div>');

	//   $('#menu-main-menu .accordion-toggle').click(function() {
	// 	$(this).parent().find('> ul').slideToggle(400);
	// 	$(this).toggleClass('toggle-background');
	// 	$(this).find('.icon-icon-chevron-right').toggleClass('toggle-rotate');
	//   });

	// script to make accordions function
	$(".accordions").on("click", ".accordions_title", function () {
		$(this).toggleClass("active").next().slideToggle();

		if ($('.hp-pa-accordions').length) {
			var $paImg = $(this).closest('.accordions').data('img');
			$('.pa-img').removeClass('active');
			$(`.${$paImg}`).addClass('active');
		}
	});


	$('.pa-toggle .toggle-arrow').on('click', function () {
		var $accordionNumber = $(this).closest('.pa-toggle').data('accordion');
		var $activeAccordion;
		
		// Function to count elements with class 'accordions' under parent element with class 'accordion-wrapper'
		function countNestedAccordions() {
			var parentElement = $('.accordion-wrapper');
			var numAccordions = parentElement.find('.accordions').length;
			return numAccordions;
		}

		// Call the function and store the result in a variable
		var maxAccordions = countNestedAccordions();

		if ($(this).hasClass('prev')) {
			
			if ($accordionNumber == 1) {
				$activeAccordion = $accordionNumber;
			} else {
				$activeAccordion = $accordionNumber - 1;
				switchAccordion($activeAccordion);
			}
		}

		if ($(this).hasClass('next')) {
			
			if ($accordionNumber == maxAccordions) {
				$activeAccordion = $accordionNumber;
			} else {
				$activeAccordion = $accordionNumber + 1;
				switchAccordion($activeAccordion);
			}
		}

		

		function switchAccordion(accordion) {
			$('.accordions, .accordions_title').removeClass('active');
			$('.accordions_content').css('display', 'none');

			$(`.accordions-${accordion}, .accordions-${accordion} .accordions_title`).addClass('active');
			$(`.accordions-${accordion} .accordions_content`).css('display', 'block');

			$('.pa-img').removeClass('active');
			$(`.pa-img-${accordion}`).addClass('active');
		}

	});

	//mobile menu functions
	if (width < 1025) {
		//Close navigation on anchor tap
		// $('.active').click(function() {	
		// 	$('#menu-main-menu, #menu-global-menu, #menu-evergreen-main-menu').addClass('closed');
		// 	$('#menu-main-menu, #menu-global-menu, #menu-evergreen-main-menu').toggleClass('opened');
		// 	$('#menu-main-menu .sub-menu, #menu-global-menu .sub-menu, #menu-evergreen-main-menu .sub-menu').removeClass('opened');
		// 	$('#menu-main-menu .sub-menu, #menu-global-menu .sub-menu, #menu-evergreen-main-menu .sub-menu').addClass('closed');
		// });	
	
		//Mobile menu accordion toggle for sub pages
		$('#menu-main-menu > li.menu-item-has-children').prepend('<div class="accordion-toggle"><span class="icon-chevron-right"></span></div>');
		$('#menu-main-menu > li.menu-item-has-children > .sub-menu').prepend('<div class="child-close"><span class="icon-chevron-left"></span> back</div>');
	
		//Mobile menu accordion toggle for third-level pages
		$('#menu-main-menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children').prepend('<div class="accordion-toggle2"<span class="icon-chevron-right"></span></div>');
		$('#menu-main-menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children > .sub-menu').prepend('<div class="tertiary-close">&nbsp;</div>');
	
		// $('#menu-main-menu .accordion-toggle, #menu-global-menu .accordion-toggle, #menu-evergreen-main-menu .accordion-toggle').click(function(event) {
		$('#menu-main-menu > li.menu-item-has-children').on('click', function (event) {
			// event.preventDefault();
			if (!$(event.target).is('a') && !$(event.target).hasClass('child-close')) {
				$(this).find(' > .sub-menu').addClass('opened');
				$(this).find(' > .sub-menu').removeClass('closed');
			}
		});
	
		$('#menu-main-menu .accordion-toggle2').click(function (event) {
			event.preventDefault();
			$(this).siblings('.sub-menu').addClass('opened');
			$(this).siblings('.sub-menu').removeClass('closed');
		});
	
		$('.child-close').click(function () {
			$(this).parent().toggleClass('opened');
			$(this).parent().toggleClass('closed');
		});
	
		$('.tertiary-close').click(function () {
			$(this).parent().toggleClass('opened');
			$(this).parent().toggleClass('closed');
		});
	
		// desktop child click close parent subnav
		$('#menu-main-menu > li.menu-item-has-children > .sub-menu > li > a').click(function (event) {
			$(this).closest('.sub-menu').css('display', 'none');
		});
	
		//add button before child links on landing page
		$("<div class='all-pages'><span class='copy'>View All Pages</span> <span></span></div>").insertBefore('.children');
		$('.all-pages').click(function () {
			$(this).toggleClass("active");
			$(this).parent().find('.children').toggleClass("active");
			$(this).parent().find('.children').slideToggle(400);
		});

	}

	    
	// //keeps menu expanded so user can tab through sub-menu, then closes menu after user tabs away from last child
	// $(document).ready(function() {
	// 	$('.menu-item-has-children').on('focusin', function() {
	// 		var subMenu = $(this).find('.sub-menu');
	// 		subMenu.css('display', 'block');

	// 		$(this).find('.sub-menu > li:last-child').on('focusout', function() {
	// 			subMenu.css('display', 'none');
	// 		})
	// 	})
	// });

	// Toggle search function in nav
	$(document).ready(function () {
		if (width > 992) {
			var open = false;
			$('#search-button').attr('type', 'button');
			
			$('#search-button').on('click', function (e) {
				if (!open) {
					$('#search-input-container').removeClass('hdn');
					$('#search-button span').removeClass('icon-magnifying-glass').addClass('icon-close-x');
					$('#menu-main-menu li.menu-item').addClass('disable');
					open = true;
					return;
				}
				if (open) {
					$('#search-input-container').addClass('hdn');
					$('#search-button span').removeClass('icon-close-x').addClass('icon-magnifying-glass');
					$('#menu-main-menu li.menu-item').removeClass('disable');
					open = false;
					return;
				}
			});
			$('html').on('click', function (e) {
				var target = e.target;
				if ($(target).closest('.navbar-form-search').length) {
					return;
				} else {
					if (open) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-magnifying-glass');
						$('#menu-main-menu li.menu-item').removeClass('disable');
						open = false;
						return;
					}
				}
			});
		}
	});

	// FAQ
	$(document).ready(function () {
		if ($('.faq-wrapper').length) {
			if (width > 820) {
				$('.faq-wrapper .question').on('click', function () {
					if ($('.question').hasClass('active')) {
						$('.question').removeClass('active');
					}
					if ($('.answer').hasClass('active')) {
						$('.answer').removeClass('active');
					}
					$(this).toggleClass('active');
					var $answerEl = $(this).data('answer');
					$(`.${$answerEl}`).toggleClass('active');
				});
				var faqUrl = new URLSearchParams(window.location.search).get('question');
				if (faqUrl) {
					$('.question').removeClass('active');
					$('.answer').removeClass('active');
					$(`.${faqUrl}`).toggleClass('active');
					$('.' + $(`.${faqUrl}`).data('answer')).toggleClass('active');
				}
			} else if (width < 820) {
				$('.faq-wrapper .question').on('click', function () {
					if ($('.question').hasClass('active')) {
						$('.question').removeClass('active');
					}
					if ($('.answer-mobile').hasClass('active')) {
						$('.answer-mobile').removeClass('active');
					}
					$(this).toggleClass('active');
					$(this).find('answer-mobile').toggleClass('active');
					var $answerEl = $(this).data('answer');
					$(`.${$answerEl}`).toggleClass('active');

					window.location.href = `#${$answerEl}`;
				});
				var faqUrl = new URLSearchParams(window.location.search).get('question');
				if (faqUrl) {
					$('.question').removeClass('active');
					$('.answer-mobile').removeClass('active');
					$(`.${faqUrl}`).toggleClass('active');
					$('.' + $(`.${faqUrl}`).data('answer')).toggleClass('active');
				}
			}
		}
	});

	//copy link
	$(document).ready(function () {
		if ($('.share-link').length) {
			
			function copyToClipboard(text) {
				const el = document.createElement('textarea');
				el.value = text;
				document.body.appendChild(el);
				el.select();
				document.execCommand('copy');
				document.body.removeChild(el);
			}

			$('.share-link').on('click', function (e) {
				e.preventDefault();
				var url = $(this).attr('href');
				copyToClipboard(url);

				$('.text-copied-notif').addClass('active');

				function removeNotif() {
					$('.text-copied-notif').removeClass('active');
				}
				setTimeout(removeNotif, 1500);
			});
		}
	})

	//wrap gform fields
	$(document).ready(function () {
		if (!$('.single-post').length) {
			$('#gform_fields_1 #field_1_1, #gform_fields_1 #field_1_2, #gform_fields_1 #field_1_3,  #gform_fields_1 #field_1_4, #gform_fields_1 #field_1_5').wrapAll('<div class="left-column"></div>');
		}
		$('.gform_footer input[type="submit"]').wrap('<div class="btn-fill"></div>');
	});

	$(document).ready(function () {
		if (width > 1024) {
			var menuHeight = $('.mega-menu > .sub-menu').outerHeight() - 1;
			$('.mega-menu > .sub-menu > .menu-item').each(function (index, element) {
				var elementId = $(element).attr("id");
				var submenuPosition = index * 45;
				if ($(this).hasClass('menu-item-has-children')) {
					$(`#${elementId} > .sub-menu`).attr('style', 'top: ' + (submenuPosition * -1) + 'px !important;' + 'height:' + menuHeight + 'px !important;');
				}
			})
		}
	});


	//menu tabbing
	$(document).ready(function () {
		if (width > 1024) {
			//primary nav
			$('.menu-item-has-children').on('focusin', function () {
				var subMenu = $(this).find('> .sub-menu');
				subMenu.css('display', 'block');

				$(this).find('> .sub-menu > li:last-child').on('focusout', function () {
					subMenu.css('display', 'none');
				})
			})

			//accordions
			if ($('.accordion-wrapper').length) {
				$(".accordions").on("focusin", ".accordions_title", function () {
					$('.accordions, .accordions_title').removeClass('active');
					$('.accordions_content').css('display', 'none');
					$(this).toggleClass("active").next().slideToggle();
					$(this).parent().toggleClass("active");
					if ($('.hp-pa-accordions').length) {
						var $paImg = $(this).closest('.accordions').data('img');
						$('.pa-img').removeClass('active');
						$(`.${$paImg}`).addClass('active');
					}
				});
			}

			//faq
			if ($('.faq-wrapper').length) {
				$('.faq-wrapper .question').on('focusin', function () {
					if ($('.question').hasClass('active')) {
						$('.question').removeClass('active');
					}
					if ($('.answer').hasClass('active')) {
						$('.answer').removeClass('active');
					}
					$(this).toggleClass('active');
					var $answerEl = $(this).data('answer');
					$(`.${$answerEl}`).toggleClass('active');
				});
				var faqUrl = new URLSearchParams(window.location.search).get('question');
				if (faqUrl) {
					$('.question').removeClass('active');
					$('.answer').removeClass('active');
					$(`.${faqUrl}`).toggleClass('active');
					$('.' + $(`.${faqUrl}`).data('answer')).toggleClass('active');
				}
			}
		}
	})


	// $(document).ready(function () { 
	// 	if ($('#banner-lower').length && $('.page-template-practice-parent').length ) {
	// 		if (width > 1024) {
	// 			var areasServedDistance = $('.areas-served').offset().top;
	// 			var borderWrapDistance = $('#banner-lower .column-50.block').offset().top;
	// 			var borderHeight = $('#banner-lower .column-50.block').outerHeight();
	// 			var adjustedMargin = areasServedDistance - (borderWrapDistance + borderHeight + 200);
	// 			$('#panel-2').css({ 'margin-top': `-${adjustedMargin}px` });	
	// 		}
	// 	}
	// })


});