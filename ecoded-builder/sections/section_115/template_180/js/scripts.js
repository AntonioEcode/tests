var cont_elements_hide_115_180 = 0;
var total_elements_hide_115_180 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_115_template_180' ).length != 0 ) {

		control_scroll_animations_section_115_template_180();

		document.addEventListener( 'scroll', control_scroll_animations_section_115_template_180, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_115_template_180, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_115_template_180, { passive: true } );

	}

}, false );

function control_scroll_animations_section_115_template_180() {

	height_window = document.body.clientHeight;

	array_s115_t180 = document.getElementsByClassName( 'ecode_section_115_template_180' );

	for ( var i = 0; i < array_s115_t180.length; i++ ) {

		distance_top = getOffsetTop( array_s115_t180[i] );
		height_container_pages = array_s115_t180[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s115_t180[i].className.indexOf( 'ecode_section_115_template_180_show' ) == -1 ) {

			array_s115_t180[i].classList.add( 'ecode_section_115_template_180_show' );

			array_elements_hide = array_s115_t180[i].querySelectorAll( '.ecode_titles' );

			cont_elements_hide_115_180 = 0;
			total_elements_hide_115_180 = 0;

			show_elements_hide_115_180( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_115_180( array_elements_hide ) {

	total_elements_hide_115_180 = array_elements_hide.length;

	if ( total_elements_hide_115_180 > cont_elements_hide_115_180 ) {

		show_element_hide_115_180( array_elements_hide[cont_elements_hide_115_180], array_elements_hide );

	}

}

function show_element_hide_115_180( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_titles_hide' );
	element.classList.add( 'ecode_titles_show' );

	cont_elements_hide_115_180++;

	show_elements_hide_115_180( array_elements_hide );

	}, 100);

}
