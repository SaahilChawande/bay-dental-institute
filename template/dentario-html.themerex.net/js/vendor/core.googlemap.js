function dentario_googlemap_init(dom_obj, coords) {
	"use strict";
	if (typeof DENTARIO_STORAGE['googlemap_init_obj'] == 'undefined') dentario_googlemap_init_styles();
	DENTARIO_STORAGE['googlemap_init_obj'].geocoder = '';
	try {
		var id = dom_obj.id;
		DENTARIO_STORAGE['googlemap_init_obj'][id] = {
			dom: dom_obj,
			markers: coords.markers,
			geocoder_request: false,
			opt: {
				zoom: coords.zoom,
				center: null,
				scrollwheel: false,
				scaleControl: false,
				disableDefaultUI: false,
				panControl: true,
				zoomControl: true, //zoom
				mapTypeControl: false,
				streetViewControl: false,
				overviewMapControl: false,
				styles: DENTARIO_STORAGE['googlemap_styles'][coords.style ? coords.style : 'default'],
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
		};
		
		dentario_googlemap_create(id);

	} catch (e) {
		
		dcl(DENTARIO_STORAGE['strings']['googlemap_not_avail']);

	}
}

function dentario_googlemap_create(id) {
	"use strict";

	// Create map
	DENTARIO_STORAGE['googlemap_init_obj'][id].map = new google.maps.Map(DENTARIO_STORAGE['googlemap_init_obj'][id].dom, DENTARIO_STORAGE['googlemap_init_obj'][id].opt);

	// Add markers
	for (var i in DENTARIO_STORAGE['googlemap_init_obj'][id].markers)
		DENTARIO_STORAGE['googlemap_init_obj'][id].markers[i].inited = false;
	dentario_googlemap_add_markers(id);
	
	// Add resize listener
	jQuery(window).resize(function() {
		if (DENTARIO_STORAGE['googlemap_init_obj'][id].map)
			DENTARIO_STORAGE['googlemap_init_obj'][id].map.setCenter(DENTARIO_STORAGE['googlemap_init_obj'][id].opt.center);
	});
}

function dentario_googlemap_add_markers(id) {
	"use strict";
	for (var i in DENTARIO_STORAGE['googlemap_init_obj'][id].markers) {
		
		if (DENTARIO_STORAGE['googlemap_init_obj'][id].markers[i].inited) continue;
		
		if (DENTARIO_STORAGE['googlemap_init_obj'][id].markers[i].latlng == '') {
			
			if (DENTARIO_STORAGE['googlemap_init_obj'][id].geocoder_request!==false) continue;
			
			if (DENTARIO_STORAGE['googlemap_init_obj'].geocoder == '') DENTARIO_STORAGE['googlemap_init_obj'].geocoder = new google.maps.Geocoder();
			DENTARIO_STORAGE['googlemap_init_obj'][id].geocoder_request = i;
			DENTARIO_STORAGE['googlemap_init_obj'].geocoder.geocode({address: DENTARIO_STORAGE['googlemap_init_obj'][id].markers[i].address}, function(results, status) {
				"use strict";
				if (status == google.maps.GeocoderStatus.OK) {
					var idx = DENTARIO_STORAGE['googlemap_init_obj'][id].geocoder_request;
					if (results[0].geometry.location.lat && results[0].geometry.location.lng) {
						DENTARIO_STORAGE['googlemap_init_obj'][id].markers[idx].latlng = '' + results[0].geometry.location.lat() + ',' + results[0].geometry.location.lng();
					} else {
						DENTARIO_STORAGE['googlemap_init_obj'][id].markers[idx].latlng = results[0].geometry.location.toString().replace(/\(\)/g, '');
					}
					DENTARIO_STORAGE['googlemap_init_obj'][id].geocoder_request = false;
					setTimeout(function() { 
						dentario_googlemap_add_markers(id); 
						}, 200);
				} else
					dcl(DENTARIO_STORAGE['strings']['geocode_error'] + ' ' + status);
			});
		
		} else {
			
			// Prepare marker object
			var latlngStr = DENTARIO_STORAGE['googlemap_init_obj'][id].markers[i].latlng.split(',');
			var markerInit = {
				map: DENTARIO_STORAGE['googlemap_init_obj'][id].map,
				position: new google.maps.LatLng(latlngStr[0], latlngStr[1]),
				clickable: DENTARIO_STORAGE['googlemap_init_obj'][id].markers[i].description!=''
			};
			if (DENTARIO_STORAGE['googlemap_init_obj'][id].markers[i].point) markerInit.icon = DENTARIO_STORAGE['googlemap_init_obj'][id].markers[i].point;
			if (DENTARIO_STORAGE['googlemap_init_obj'][id].markers[i].title) markerInit.title = DENTARIO_STORAGE['googlemap_init_obj'][id].markers[i].title;
			DENTARIO_STORAGE['googlemap_init_obj'][id].markers[i].marker = new google.maps.Marker(markerInit);
			
			// Set Map center
			if (DENTARIO_STORAGE['googlemap_init_obj'][id].opt.center == null) {
				DENTARIO_STORAGE['googlemap_init_obj'][id].opt.center = markerInit.position;
				DENTARIO_STORAGE['googlemap_init_obj'][id].map.setCenter(DENTARIO_STORAGE['googlemap_init_obj'][id].opt.center);				
			}
			
			// Add description window
			if (DENTARIO_STORAGE['googlemap_init_obj'][id].markers[i].description!='') {
				DENTARIO_STORAGE['googlemap_init_obj'][id].markers[i].infowindow = new google.maps.InfoWindow({
					content: DENTARIO_STORAGE['googlemap_init_obj'][id].markers[i].description
				});
				google.maps.event.addListener(DENTARIO_STORAGE['googlemap_init_obj'][id].markers[i].marker, "click", function(e) {
					var latlng = e.latLng.toString().replace("(", '').replace(")", "").replace(" ", "");
					for (var i in DENTARIO_STORAGE['googlemap_init_obj'][id].markers) {
						if (latlng == DENTARIO_STORAGE['googlemap_init_obj'][id].markers[i].latlng) {
							DENTARIO_STORAGE['googlemap_init_obj'][id].markers[i].infowindow.open(
								DENTARIO_STORAGE['googlemap_init_obj'][id].map,
								DENTARIO_STORAGE['googlemap_init_obj'][id].markers[i].marker
							);
							break;
						}
					}
				});
			}
			
			DENTARIO_STORAGE['googlemap_init_obj'][id].markers[i].inited = true;
		}
	}
}

function dentario_googlemap_refresh() {
	"use strict";
	for (id in DENTARIO_STORAGE['googlemap_init_obj']) {
		dentario_googlemap_create(id);
	}
}

function dentario_googlemap_init_styles() {
	"use strict";
	// Init Google map
	DENTARIO_STORAGE['googlemap_init_obj'] = {};
	DENTARIO_STORAGE['googlemap_styles'] = {
		'default': []
	};
	if (window.dentario_theme_googlemap_styles!==undefined)
		DENTARIO_STORAGE['googlemap_styles'] = dentario_theme_googlemap_styles(DENTARIO_STORAGE['googlemap_styles']);
}