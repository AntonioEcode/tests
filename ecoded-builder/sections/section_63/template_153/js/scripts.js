var cont_elements_hide_63_153 = 0;
var total_elements_hide_63_153 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_63_template_153' ).length != 0 ) {

		control_scroll_animations_section_63_template_153();

		document.addEventListener( 'scroll', control_scroll_animations_section_63_template_153, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_63_template_153, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_63_template_153, { passive: true } );

	}

}, false );

function control_scroll_animations_section_63_template_153() {

	height_window = document.body.clientHeight;

	array_s63_t153 = document.getElementsByClassName( 'ecode_section_63_template_153' );

	for ( var i = 0; i < array_s63_t153.length; i++ ) {

		distance_top = getOffsetTop( array_s63_t153[i] );
		height_container_pages = array_s63_t153[i].clientHeight;

		if ( array_s63_t153[i].className.indexOf( 'ecode_section_63_template_153_show' ) == -1 ) {

			array_s63_t153[i].classList.add( 'ecode_section_63_template_153_show' );

			array_elements_hide = array_s63_t153[i].querySelectorAll( '.ecode_info' );

			cont_elements_hide_63_153 = 0;
			total_elements_hide_63_153 = 0;

			show_elements_hide_63_153( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_63_153( array_elements_hide ) {

	total_elements_hide_63_153 = array_elements_hide.length;

	if ( total_elements_hide_63_153 > cont_elements_hide_63_153 ) {

		show_element_hide_63_153( array_elements_hide[cont_elements_hide_63_153], array_elements_hide );

	}

}

function show_element_hide_63_153( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'section_hide' );
	element.classList.add( 'section_show' );

	cont_elements_hide_63_153++;

	show_elements_hide_63_153( array_elements_hide );

	}, 100);

}
