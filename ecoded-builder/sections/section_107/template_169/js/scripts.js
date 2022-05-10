var cont_elements_hide_107_169 = 0;
var total_elements_hide_107_169 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_107_template_169' ).length != 0 ) {

		control_scroll_animations_section_107_template_169();

		document.addEventListener( 'scroll', control_scroll_animations_section_107_template_169, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_107_template_169, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_107_template_169, { passive: true } );

	}

}, false );

function control_scroll_animations_section_107_template_169() {

	height_window = document.body.clientHeight;

	array_s107_t169 = document.getElementsByClassName( 'ecode_section_107_template_169' );

	for ( var i = 0; i < array_s107_t169.length; i++ ) {

		distance_top = getOffsetTop( array_s107_t169[i] );
		// height_container_pages = array_s107_t169[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s107_t169[i].className.indexOf( 'ecode_section_107_template_169_show' ) == -1 ) {

			array_s107_t169[i].classList.add( 'ecode_section_107_template_169_show' );

			array_elements_hide = array_s107_t169[i].querySelectorAll( '.ecode_width_107_169' );

			cont_elements_hide_107_169 = 0;
			total_elements_hide_107_169 = 0;

			show_elements_hide_107_169( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_107_169( array_elements_hide ) {

	total_elements_hide_107_169 = array_elements_hide.length;

	if ( total_elements_hide_107_169 > cont_elements_hide_107_169 ) {

		show_element_hide_107_169( array_elements_hide[cont_elements_hide_107_169], array_elements_hide );

	}

}

function show_element_hide_107_169( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_width_107_169_hide' );
	element.classList.add( 'ecode_width_107_169_show' );

	cont_elements_hide_107_169++;

	show_elements_hide_107_169( array_elements_hide );

	}, 100);

}
