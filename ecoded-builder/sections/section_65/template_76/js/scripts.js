var cont_elements_hide_65_76 = 0;
var total_elements_hide_65_76 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_65_template_76' ).length != 0 ) {

		control_scroll_animations_section_65_template_76();

		document.addEventListener( 'scroll', control_scroll_animations_section_65_template_76, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_65_template_76, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_65_template_76, { passive: true } );

	}

}, false );

function control_scroll_animations_section_65_template_76() {

	height_window = document.body.clientHeight;

	array_s65_t76 = document.getElementsByClassName( 'ecode_section_65_template_76' );

	for ( var i = 0; i < array_s65_t76.length; i++ ) {

		distance_top = getOffsetTop( array_s65_t76[i] );
		// height_container_pages = array_s65_t76[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s65_t76[i].className.indexOf( 'ecode_section_65_template_76_show' ) == -1 ) {

			array_s65_t76[i].classList.add( 'ecode_section_65_template_76_show' );

			array_elements_hide = array_s65_t76[i].querySelectorAll( '.ecode_articles' );

			cont_elements_hide_65_76 = 0;
			total_elements_hide_65_76 = 0;

			show_elements_hide_65_76( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_65_76( array_elements_hide ) {

	total_elements_hide_65_76 = array_elements_hide.length;

	if ( total_elements_hide_65_76 > cont_elements_hide_65_76 ) {

		show_element_hide_65_76( array_elements_hide[cont_elements_hide_65_76], array_elements_hide );

	}

}

function show_element_hide_65_76( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_articles_hide' );
	element.classList.add( 'ecode_articles_show' );

	cont_elements_hide_65_76++;

	show_elements_hide_65_76( array_elements_hide );

	}, 100);

}
