/* global jQuery:false */
/* global DENTARIO_STORAGE:false */
// Disable init VC prettyPhoto on the gallery images
window.vc_prettyPhoto = function() {};

// Theme-specific first load actions
//==============================================
function dentario_theme_ready_actions() {
	"use strict";
	// Put here your init code with theme-specific actions
	// It will be called before core actions

    // Auto resize text area - contact forms
    jQuery.each(jQuery('textarea[data-autoresize]'), function() {
		"use strict";
        var offset = this.offsetHeight - this.clientHeight;

        var resizeTextarea = function(el) {
            jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
        };
        jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
    });

    // Search form new
    //----------------------------------------------
    if (jQuery('.search_link:not(.inited)').length > 0) {
        // Click "Search submit"
        jQuery('body').find('.search_link').on('click', function(e) {
            "use strict";
            jQuery('.search_form_wrap_fixed').fadeIn();
            jQuery('body').addClass('search_fixed');
            jQuery('.search_form_wrap_fixed .search_field').focus();
            e.preventDefault();
            return false;
        });
        // Click "Close search results"
        jQuery('body').find('.search_close').on('click', function(e) {
            "use strict";
            jQuery('.search_form_wrap_fixed').fadeOut();
            jQuery('body').removeClass('search_fixed');
            e.preventDefault();
            return false;
        });
    }

    // set post Share container width
    if (jQuery('.sc_social_items_block').length > 0) {
        var elem = jQuery('.sc_social_items_block');
        var outerW = parseInt(elem.css('padding-left')); //+ parseInt(elem.css('padding-right'));
        var childrenW = 0;
        elem.children().each(function() {
           childrenW = childrenW + jQuery(this).width();
        });
        elem.css('width',childrenW + outerW);
    }

	fitLargerHeight();
}


// Theme-specific scroll actions
//==============================================
function dentario_theme_scroll_actions() {
	"use strict";
	// Put here your theme-specific code with scroll actions
	// It will be called when page is scrolled (before core actions)
}


// Theme-specific resize actions
//==============================================
function dentario_theme_resize_actions() {
	"use strict";
	// Put here your theme-specific code with resize actions
	// It will be called when window is resized (before core actions)
	setTimeout(fitLargerHeight, 20);

}


// Theme-specific shortcodes init
//=====================================================
function dentario_theme_sc_init(cont) {
	"use strict";
	// Put here your theme-specific code to init shortcodes
	// It will be called before core init shortcodes
	// @param cont - jQuery-container with shortcodes (init only inside this container)
}


// Theme-specific post-formats init
//=====================================================
function dentario_theme_init_post_formats() {
	"use strict";
	// Put here your theme-specific code to init post-formats
	// It will be called before core init post_formats when page is loaded or after 'Load more' or 'Infinite scroll' actions
}

// Fit height to the larger value of child elements
function fitLargerHeight() {
	"use strict";
	if (jQuery('.autoheight.columns_wrap').length > 0) {
		jQuery('.autoheight.columns_wrap').each(function () {
			"use strict";
			var tallestcolumn = 0;
			var columns = jQuery(this).children("div");
			if (columns.parent().hasClass('autoheight_inner') == true) {
				columns = jQuery(this).children("div").children("div");
			}
			columns.css({"height":"auto"});
			columns.each(
				function () {
					var currentHeight = jQuery(this).height();
					if (currentHeight > tallestcolumn) {
						tallestcolumn = currentHeight;
					}
				}
			);
			if (jQuery(window).width() > 479) {
				columns.height(tallestcolumn);
			} else {
				columns.css({"height":"auto"});
			}
		});
	}
}


// Theme-specific GoogleMap styles
//=====================================================
function dentario_theme_googlemap_styles($styles) {
	"use strict";
	// Put here your theme-specific code to add GoogleMap styles
	// It will be called before GoogleMap init when page is loaded
	$styles['inverse'] = [
		{ "stylers": [
			{ "invert_lightness": true },
			{ "visibility": "on" }
			]
		}
	];
	$styles['dark'] = [
		{ "featureType": "landscape",
		  "stylers": [
		  	{ "invert_lightness": true },
		  	{ "saturation":-100},
		  	{ "lightness":65},
		  	{ "visibility":"on"}
		  	]
		},
		{ "featureType": "poi",
		  "stylers": [
		  	{ "saturation":-100},
		  	{ "lightness":51},
		  	{ "visibility":"simplified"}
		  	]
		},
		{ "featureType": "road.highway",
		  "stylers": [
		  	{ "saturation":-100},
		  	{ "visibility":"simplified"}
		  	]
		},
		{ "featureType": "road.arterial",
		  "stylers": [
		  	{ "saturation":-100},
		  	{ "lightness":30},
		  	{ "visibility":"on"}
		  	]
		},
		{ "featureType": "road.local",
		  "stylers": [
		  	{ "saturation":-100},
		  	{ "lightness":40},
		  	{ "visibility":"on"}
		  	]
		},
		{ "featureType": "transit",
		  "stylers": [
		  	{ "saturation":-100},
		  	{ "visibility":"simplified"}
		  	]
		},
		{ "featureType":"administrative.province",
		  "stylers": [
		  	{ "visibility":"off"}
		  	]
		},
		{ "featureType":"water",
		  "elementType": "labels",
		  "stylers": [
		  	{ "visibility":"on"},
		  	{ "lightness":-25},
		  	{ "saturation":-100}
		  	]
		},
		{ "featureType":"water",
		  "elementType":"geometry",
		  "stylers": [
		  	{ "hue":"#ffff00"},
		  	{ "lightness":-25},
		  	{ "saturation":-97}
		  	]
		}
	];
	$styles['ultra_light'] = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}];
	return $styles;
}
