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

    // script to make accordions function
	$(".accordions").on("click", ".accordions_title", function() {
        // will (slide) toggle the related panel.
        $(this).toggleClass("active").next().slideToggle();
    });

	//wrap gform fields
	$(document).ready(function () {
		if (!$('.single-post').length) {
			$('#gform_fields_1 #field_1_1, #gform_fields_1 #field_1_2, #gform_fields_1 #field_1_3,  #gform_fields_1 #field_1_4, #gform_fields_1 #field_1_5').wrapAll('<div class="left-column"></div>');
		}
		$('.gform_footer input[type="submit"]').wrap('<div class="btn-fill"></div>');
	});


});