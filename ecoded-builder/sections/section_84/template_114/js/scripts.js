var cont_elements_hide_84_114 = 0;
var total_elements_hide_84_114 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_84_template_114' ).length != 0 ) {

		control_scroll_animations_section_84_template_114();

		document.addEventListener( 'scroll', control_scroll_animations_section_84_template_114, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_84_template_114, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_84_template_114, { passive: true } );

	}

}, false );

function control_scroll_animations_section_84_template_114() {

	height_window = document.body.clientHeight;

	array_s84_t114 = document.getElementsByClassName( 'ecode_section_84_template_114' );

	for ( var i = 0; i < array_s84_t114.length; i++ ) {

		distance_top = getOffsetTop( array_s84_t114[i] );
		// height_container_pages = array_s84_t114[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s84_t114[i].className.indexOf( 'ecode_section_84_template_114_show' ) == -1 ) {

			array_s84_t114[i].classList.add( 'ecode_section_84_template_114_show' );

			array_elements_hide = array_s84_t114[i].querySelectorAll( '.ecode_info, .ecode_figure' );

			cont_elements_hide_84_114 = 0;
			total_elements_hide_84_114 = 0;

			show_elements_hide_84_114( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_84_114( array_elements_hide ) {

	total_elements_hide_84_114 = array_elements_hide.length;

	if ( total_elements_hide_84_114 > cont_elements_hide_84_114 ) {

		show_element_hide_84_114( array_elements_hide[cont_elements_hide_84_114], array_elements_hide );

	}

}

function show_element_hide_84_114( element, array_elements_hide ) {

	service_array = setTimeout(function() {

		element.classList.remove( 'ecode_element_hide' );
		element.classList.add( 'ecode_element_show' );

		cont_elements_hide_84_114++;

		show_elements_hide_84_114( array_elements_hide );

	}, 100);

}
