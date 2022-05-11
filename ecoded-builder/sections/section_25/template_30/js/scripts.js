var cont_elements_hide_25_30 = 0;
var total_elements_hide_25_30 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_25_template_30' ).length != 0 ) {

		control_scroll_animations_section_25_template_30();

		document.addEventListener( 'scroll', control_scroll_animations_section_25_template_30, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_25_template_30, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_25_template_30, { passive: true } );

	}

}, false );

function control_scroll_animations_section_25_template_30() {

	height_window = document.body.clientHeight;

	array_s25_t30 = document.getElementsByClassName( 'ecode_section_25_template_30' );

	for ( var i = 0; i < array_s25_t30.length; i++ ) {

		distance_top = getOffsetTop( array_s25_t30[i] );
		// height_container_pages = array_s25_t30[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s25_t30[i].className.indexOf( 'ecode_section_25_template_30_show' ) == -1 ) {

			array_s25_t30[i].classList.add( 'ecode_section_25_template_30_show' );

			array_elements_hide = array_s25_t30[i].querySelectorAll( '.ecode_article' );

			cont_elements_hide_25_30 = 0;
			total_elements_hide_25_30 = 0;

			show_elements_hide_25_30( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_25_30( array_elements_hide ) {

	total_elements_hide_25_30 = array_elements_hide.length;

	if ( total_elements_hide_25_30 > cont_elements_hide_25_30 ) {

		show_element_hide_25_30( array_elements_hide[cont_elements_hide_25_30], array_elements_hide );

	}

}

function show_element_hide_25_30( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_article_hide' );
	element.classList.add( 'ecode_article_show' );

	cont_elements_hide_25_30++;

	show_elements_hide_25_30( array_elements_hide );

	}, 100);

}
