var cont_elements_hide_127_193 = 0;
var total_elements_hide_127_193 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_127_template_193' ).length != 0 ) {

		control_scroll_animations_section_127_template_193();

		document.addEventListener( 'scroll', control_scroll_animations_section_127_template_193, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_127_template_193, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_127_template_193, { passive: true } );

	}

}, false );

function control_scroll_animations_section_127_template_193() {

	height_window = document.body.clientHeight;

	array_s127_t193 = document.getElementsByClassName( 'ecode_section_127_template_193' );

	for ( var i = 0; i < array_s127_t193.length; i++ ) {

		distance_top = getOffsetTop( array_s127_t193[i] );
		height_container_pages = array_s127_t193[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_container_pages / 2 );

		if ( total_scroll <= scrollTop() && array_s127_t193[i].className.indexOf( 'ecode_section_127_template_193_show' ) == -1 ) {

			array_s127_t193[i].classList.add( 'ecode_section_127_template_193_show' );

			array_elements_hide = array_s127_t193[i].querySelectorAll( '.ecode_info' );

			cont_elements_hide_127_193 = 0;
			total_elements_hide_127_193 = 0;

			show_elements_hide_127_193( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_127_193( array_elements_hide ) {

	total_elements_hide_127_193 = array_elements_hide.length;

	if ( total_elements_hide_127_193 > cont_elements_hide_127_193 ) {

		show_element_hide_127_193( array_elements_hide[cont_elements_hide_127_193], array_elements_hide );

	}

}

function show_element_hide_127_193( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_info_hide' );
	element.classList.add( 'ecode_info_show' );

	cont_elements_hide_127_193++;

	show_elements_hide_127_193( array_elements_hide );

	}, 100);

}
