var cont_elements_hide_119_184 = 0;
var total_elements_hide_119_184 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_119_template_184' ).length != 0 ) {

		control_scroll_animations_section_119_template_184();

		document.addEventListener( 'scroll', control_scroll_animations_section_119_template_184, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_119_template_184, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_119_template_184, { passive: true } );

	}

}, false );

function control_scroll_animations_section_119_template_184() {

	height_window = document.body.clientHeight;

	array_s119_t184 = document.getElementsByClassName( 'ecode_section_119_template_184' );

	for ( var i = 0; i < array_s119_t184.length; i++ ) {

		distance_top = getOffsetTop( array_s119_t184[i] );
		height_container_pages = array_s119_t184[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s119_t184[i].className.indexOf( 'ecode_section_119_template_184_show' ) == -1 ) {

			array_s119_t184[i].classList.add( 'ecode_section_119_template_184_show' );

			array_elements_hide = array_s119_t184[i].querySelectorAll( '.ecode_info' );

			cont_elements_hide_119_184 = 0;
			total_elements_hide_119_184 = 0;

			show_elements_hide_119_184( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_119_184( array_elements_hide ) {

	total_elements_hide_119_184 = array_elements_hide.length;

	if ( total_elements_hide_119_184 > cont_elements_hide_119_184 ) {

		show_element_hide_119_184( array_elements_hide[cont_elements_hide_119_184], array_elements_hide );

	}

}

function show_element_hide_119_184( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_info_hide' );
	element.classList.add( 'ecode_info_show' );

	cont_elements_hide_119_184++;

	show_elements_hide_119_184( array_elements_hide );

	}, 100);

}
