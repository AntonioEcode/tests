var cont_elements_hide_94_110 = 0;
var total_elements_hide_94_110 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_94_template_110' ).length != 0 ) {

		control_scroll_animations_section_94_template_110();

		document.addEventListener( 'scroll', control_scroll_animations_section_94_template_110, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_94_template_110, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_94_template_110, { passive: true } );

	}

}, false );

function control_scroll_animations_section_94_template_110() {

	height_window = document.body.clientHeight;

	array_s94_t110 = document.getElementsByClassName( 'ecode_section_94_template_110' );

	for ( var i = 0; i < array_s94_t110.length; i++ ) {

		distance_top = getOffsetTop( array_s94_t110[i] );
		height_container_pages = array_s94_t110[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s94_t110[i].className.indexOf( 'ecode_section_94_template_110_show' ) == -1 ) {

			array_s94_t110[i].classList.add( 'ecode_section_94_template_110_show' );

			array_elements_hide = array_s94_t110[i].querySelectorAll( '.ecode_info, .ecode_image' );

			cont_elements_hide_94_110 = 0;
			total_elements_hide_94_110 = 0;

			show_elements_hide_94_110( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_94_110( array_elements_hide ) {

	total_elements_hide_94_110 = array_elements_hide.length;

	if ( total_elements_hide_94_110 > cont_elements_hide_94_110 ) {

		show_element_hide_94_110( array_elements_hide[cont_elements_hide_94_110], array_elements_hide );

	}

}

function show_element_hide_94_110( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_element_hide' );
	element.classList.add( 'ecode_element_show' );

	cont_elements_hide_94_110++;

	show_elements_hide_94_110( array_elements_hide );

	}, 100);

}
