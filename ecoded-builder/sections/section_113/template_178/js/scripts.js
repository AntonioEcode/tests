var cont_elements_hide_113_178 = 0;
var total_elements_hide_113_178 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_113_template_178' ).length != 0 ) {

		control_scroll_animations_section_113_template_178();

		document.addEventListener( 'scroll', control_scroll_animations_section_113_template_178, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_113_template_178, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_113_template_178, { passive: true } );

	}

}, false );

function control_scroll_animations_section_113_template_178() {

	height_window = document.body.clientHeight;

	array_s113_t178 = document.getElementsByClassName( 'ecode_section_113_template_178' );

	for ( var i = 0; i < array_s113_t178.length; i++ ) {

		distance_top = getOffsetTop( array_s113_t178[i] );
		height_container_pages = array_s113_t178[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s113_t178[i].className.indexOf( 'ecode_section_113_template_178_show' ) == -1 ) {

			array_s113_t178[i].classList.add( 'ecode_section_113_template_178_show' );

			array_elements_hide = array_s113_t178[i].querySelectorAll( '.ecode_info, .ecode_figure' );

			cont_elements_hide_113_178 = 0;
			total_elements_hide_113_178 = 0;

			show_elements_hide_113_178( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_113_178( array_elements_hide ) {

	total_elements_hide_113_178 = array_elements_hide.length;

	if ( total_elements_hide_113_178 > cont_elements_hide_113_178 ) {

		show_element_hide_113_178( array_elements_hide[cont_elements_hide_113_178], array_elements_hide );

	}

}

function show_element_hide_113_178( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_element_hide' );
	element.classList.add( 'ecode_element_show' );

	cont_elements_hide_113_178++;

	show_elements_hide_113_178( array_elements_hide );

	}, 100);

}
