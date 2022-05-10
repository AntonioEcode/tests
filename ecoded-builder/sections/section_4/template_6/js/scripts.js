var cont_elements_hide_4_6 = 0;
var total_elements_hide_4_6 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_4_template_6' ).length != 0 ) {

		control_scroll_animations_section_4_template_6();

		document.addEventListener( 'scroll', control_scroll_animations_section_4_template_6, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_4_template_6, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_4_template_6, { passive: true } );

	}

}, false );

function control_scroll_animations_section_4_template_6() {

	height_window = document.body.clientHeight;

	array_s4_t6 = document.getElementsByClassName( 'ecode_section_4_template_6' );

	for ( var i = 0; i < array_s4_t6.length; i++ ) {

		distance_top = getOffsetTop( array_s4_t6[i] );
		// height_container_pages = array_s4_t6[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s4_t6[i].className.indexOf( 'ecode_section_4_template_6_show' ) == -1 ) {

			array_s4_t6[i].classList.add( 'ecode_section_4_template_6_show' );

			array_elements_hide = array_s4_t6[i].querySelectorAll( '.article' );

			cont_elements_hide_4_6 = 0;
			total_elements_hide_4_6 = 0;

			show_elements_hide_4_6( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_4_6( array_elements_hide ) {

	total_elements_hide_4_6 = array_elements_hide.length;

	if ( total_elements_hide_4_6 > cont_elements_hide_4_6 ) {

		show_element_hide_4_6( array_elements_hide[cont_elements_hide_4_6], array_elements_hide );

	}

}

function show_element_hide_4_6( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'article_hide' );
	element.classList.add( 'article_show' );

	cont_elements_hide_4_6++;

	show_elements_hide_4_6( array_elements_hide );

	}, 100);

}
