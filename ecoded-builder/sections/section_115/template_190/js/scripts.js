var cont_elements_hide_115_190 = 0;
var total_elements_hide_115_190 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_115_template_190' ).length != 0 ) {

		control_scroll_animations_section_115_template_190();

		document.addEventListener( 'scroll', control_scroll_animations_section_115_template_190, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_115_template_190, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_115_template_190, { passive: true } );

	}

}, false );

function control_scroll_animations_section_115_template_190() {

	height_window = document.body.clientHeight;

	array_s115_t190 = document.getElementsByClassName( 'ecode_section_115_template_190' );

	for ( var i = 0; i < array_s115_t190.length; i++ ) {

		distance_top = getOffsetTop( array_s115_t190[i] );
		height_container_pages = array_s115_t190[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s115_t190[i].className.indexOf( 'ecode_section_115_template_190_show' ) == -1 ) {

			array_s115_t190[i].classList.add( 'ecode_section_115_template_190_show' );

			array_elements_hide = array_s115_t190[i].querySelectorAll( '.ecode_titles' );

			cont_elements_hide_115_190 = 0;
			total_elements_hide_115_190 = 0;

			show_elements_hide_115_190( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_115_190( array_elements_hide ) {

	total_elements_hide_115_190 = array_elements_hide.length;

	if ( total_elements_hide_115_190 > cont_elements_hide_115_190 ) {

		show_element_hide_115_190( array_elements_hide[cont_elements_hide_115_190], array_elements_hide );

	}

}

function show_element_hide_115_190( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_titles_hide' );
	element.classList.add( 'ecode_titles_show' );

	cont_elements_hide_115_190++;

	show_elements_hide_115_190( array_elements_hide );

	}, 100);

}
