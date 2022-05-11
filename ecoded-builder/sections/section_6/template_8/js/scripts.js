var cont_elements_hide_6_8 = 0;
var total_elements_hide_6_8 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_6_template_8' ).length != 0 ) {

		control_scroll_animations_section_6_template_8();

		document.addEventListener( 'scroll', control_scroll_animations_section_6_template_8, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_6_template_8, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_6_template_8, { passive: true } );

	}

}, false );

function control_scroll_animations_section_6_template_8() {

	height_window = document.body.clientHeight;

	array_s6_t8 = document.getElementsByClassName( 'ecode_section_6_template_8' );

	for ( var i = 0; i < array_s6_t8.length; i++ ) {

		distance_top = getOffsetTop( array_s6_t8[i] );
		// height_container_pages = array_s6_t8[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s6_t8[i].className.indexOf( 'ecode_section_6_template_8_show' ) == -1 ) {

			array_s6_t8[i].classList.add( 'ecode_section_6_template_8_show' );

			array_elements_hide = array_s6_t8[i].querySelectorAll( '.article' );

			cont_elements_hide_6_8 = 0;
			total_elements_hide_6_8 = 0;

			show_elements_hide_6_8( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_6_8( array_elements_hide ) {

	total_elements_hide_6_8 = array_elements_hide.length;

	if ( total_elements_hide_6_8 > cont_elements_hide_6_8 ) {

		show_element_hide_6_8( array_elements_hide[cont_elements_hide_6_8], array_elements_hide );

	}

}

function show_element_hide_6_8( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'article_hide' );
	element.classList.add( 'article_show' );

	cont_elements_hide_6_8++;

	show_elements_hide_6_8( array_elements_hide );

	}, 100);

}
