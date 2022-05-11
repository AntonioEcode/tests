var cont_elements_hide_121_186 = 0;
var total_elements_hide_121_186 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_121_template_186' ).length != 0 ) {

		control_scroll_animations_section_121_template_186();

		document.addEventListener( 'scroll', control_scroll_animations_section_121_template_186, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_121_template_186, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_121_template_186, { passive: true } );

	}

}, false );

function control_scroll_animations_section_121_template_186() {

	height_window = document.body.clientHeight;

	array_s121_t186 = document.getElementsByClassName( 'ecode_section_121_template_186' );

	for ( var i = 0; i < array_s121_t186.length; i++ ) {

		distance_top = getOffsetTop( array_s121_t186[i] );
		height_container_pages = array_s121_t186[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s121_t186[i].className.indexOf( 'ecode_section_121_template_186_show' ) == -1 ) {

			array_s121_t186[i].classList.add( 'ecode_section_121_template_186_show' );

			array_elements_hide = array_s121_t186[i].querySelectorAll( '.ecode_width_121_186' );

			cont_elements_hide_121_186 = 0;
			total_elements_hide_121_186 = 0;

			show_elements_hide_121_186( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_121_186( array_elements_hide ) {

	total_elements_hide_121_186 = array_elements_hide.length;

	if ( total_elements_hide_121_186 > cont_elements_hide_121_186 ) {

		show_element_hide_121_186( array_elements_hide[cont_elements_hide_121_186], array_elements_hide );

	}

}

function show_element_hide_121_186( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_width_121_186_hide' );
	element.classList.add( 'ecode_width_121_186_show' );

	cont_elements_hide_121_186++;

	show_elements_hide_121_186( array_elements_hide );

	}, 100);

}
