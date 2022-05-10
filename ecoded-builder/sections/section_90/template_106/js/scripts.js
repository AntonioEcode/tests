var cont_elements_hide_90_106 = 0;
var total_elements_hide_90_106 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_gallery_90_106' ).length != 0 ) {

		ecode_initialize_gallery_90_106();

		control_scroll_animations_section_90_template_106();

		document.addEventListener( 'scroll', control_scroll_animations_section_90_template_106, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_90_template_106, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_90_template_106, { passive: true } );

	}

}, false );

function ecode_initialize_gallery_90_106() {

	array_gallery_90_106 = document.getElementsByClassName( 'ecode_gallery_90_106' );

	for ( var i = 0; i < array_gallery_90_106.length; i++ ) {

		var gallery_90_106 = lightGallery( array_gallery_90_106[i], {
			loop: true,
			download: false,
			closeOnTap: true,
			nextHtml: '<svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-469.000000, -190.000000)" fill="#FFFFFF"><g transform="translate(469.000000, 190.000000)"><path d="M14.999,10.0054 C14.999,10.0034 15,10.0024 15,10.0004 C15,9.9674 14.984,9.9404 14.981,9.9084 C14.973,9.8124 14.961,9.7164 14.924,9.6264 C14.897,9.5584 14.851,9.5044 14.81,9.4444 C14.779,9.4004 14.762,9.3494 14.724,9.3094 L11.861,6.30939 C11.479,5.90939 10.847,5.89539 10.447,6.27639 C10.048,6.65739 10.033,7.29039 10.414,7.69039 L11.664,9.0004 L6,9.0004 C5.448,9.0004 5,9.4474 5,10.0004 C5,10.5524 5.448,11.0004 6,11.0004 L11.586,11.0004 L10.293,12.2934 C9.902,12.6834 9.902,13.3164 10.293,13.7074 C10.488,13.9024 10.744,14.0004 11,14.0004 C11.256,14.0004 11.512,13.9024 11.707,13.7074 L14.707,10.7074 C14.798,10.6164 14.872,10.5064 14.922,10.3854 C14.973,10.2644 14.998,10.1354 14.999,10.0054 Z M10,18 C5.589,18 2,14.411 2,10 C2,5.589 5.589,2 10,2 C14.411,2 18,5.589 18,10 C18,14.411 14.411,18 10,18 Z M10,0 C4.486,0 0,4.486 0,10 C0,15.514 4.486,20 10,20 C15.514,20 20,15.514 20,10 C20,4.486 15.514,0 10,0 Z"></path></g></g></g></svg>',
			prevHtml: '<svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-469.000000, -190.000000)" fill="#FFFFFF"><g transform="translate(469.000000, 190.000000)"><path d="M14.999,10.0054 C14.999,10.0034 15,10.0024 15,10.0004 C15,9.9674 14.984,9.9404 14.981,9.9084 C14.973,9.8124 14.961,9.7164 14.924,9.6264 C14.897,9.5584 14.851,9.5044 14.81,9.4444 C14.779,9.4004 14.762,9.3494 14.724,9.3094 L11.861,6.30939 C11.479,5.90939 10.847,5.89539 10.447,6.27639 C10.048,6.65739 10.033,7.29039 10.414,7.69039 L11.664,9.0004 L6,9.0004 C5.448,9.0004 5,9.4474 5,10.0004 C5,10.5524 5.448,11.0004 6,11.0004 L11.586,11.0004 L10.293,12.2934 C9.902,12.6834 9.902,13.3164 10.293,13.7074 C10.488,13.9024 10.744,14.0004 11,14.0004 C11.256,14.0004 11.512,13.9024 11.707,13.7074 L14.707,10.7074 C14.798,10.6164 14.872,10.5064 14.922,10.3854 C14.973,10.2644 14.998,10.1354 14.999,10.0054 Z M10,18 C5.589,18 2,14.411 2,10 C2,5.589 5.589,2 10,2 C14.411,2 18,5.589 18,10 C18,14.411 14.411,18 10,18 Z M10,0 C4.486,0 0,4.486 0,10 C0,15.514 4.486,20 10,20 C15.514,20 20,15.514 20,10 C20,4.486 15.514,0 10,0 Z"></path></g></g></g></svg>',
		});

	}

}

function control_scroll_animations_section_90_template_106() {

	height_window = document.body.clientHeight;

	array_s90_t106 = document.getElementsByClassName( 'ecode_section_90_template_106' );

	for ( var i = 0; i < array_s90_t106.length; i++ ) {

		distance_top = getOffsetTop( array_s90_t106[i] );
		// height_container_pages = array_s90_t106[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s90_t106[i].className.indexOf( 'ecode_section_90_template_106_show' ) == -1 ) {

			array_s90_t106[i].classList.add( 'ecode_section_90_template_106_show' );

			array_elements_hide = array_s90_t106[i].querySelectorAll( '.ecode_article' );

			cont_elements_hide_90_106 = 0;
			total_elements_hide_90_106 = 0;

			show_elements_hide_90_106( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_90_106( array_elements_hide ) {

	total_elements_hide_90_106 = array_elements_hide.length;

	if ( total_elements_hide_90_106 > cont_elements_hide_90_106 ) {

		show_element_hide_90_106( array_elements_hide[cont_elements_hide_90_106], array_elements_hide );

	}

}

function show_element_hide_90_106( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_article_hide' );
	element.classList.add( 'ecode_article_show' );

	cont_elements_hide_90_106++;

	show_elements_hide_90_106( array_elements_hide );

	}, 100);

}
