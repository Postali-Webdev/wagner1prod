/**
 * Slick Custom
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

	$('#slider').slick({
		dots: false,
		infinite: true,
		fade: true,
		autoplay: true,
  		autoplaySpeed: 5000,
  		speed: 1300,
		slidesToShow: 1,
		slidesToScroll: 1,
		prevArrow: false,
    	nextArrow: false,
    	swipeToSlide: true,
		cssEase: 'ease-in-out'
	});

	$('.awards-slider .inner-awards-wrapper').slick({
		infinite: false,
		fade: true,
		autoplay: true,
  		autoplaySpeed: 3000,
  		speed: 1300,
		slidesToShow: 1,
		slidesToScroll: 1,
    	swipeToSlide: true,
		cssEase: 'ease-in-out'
	});
	
	$('.awards-wrapper .inner-wrapper').slick({
		infinite: true,
		autoplay: true,
  		autoplaySpeed: 3000,
  		speed: 1300,
		slidesToShow: 5,
		slidesToScroll: 1,
		placeholders: false,
		centerMode: false,
			responsive: [
			{
				breakpoint: 820,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 660,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});


	
});