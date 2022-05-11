var cont_elements_hide_9_12 = 0;
var total_elements_hide_9_12 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_9_template_12' ).length != 0 ) {

		control_scroll_animations_section_9_template_12();

		document.addEventListener( 'scroll', control_scroll_animations_section_9_template_12, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_9_template_12, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_9_template_12, { passive: true } );

	}

}, false );

function control_scroll_animations_section_9_template_12() {

	height_window = document.body.clientHeight;

	array_s9_t12 = document.getElementsByClassName( 'ecode_section_9_template_12' );

	for ( var i = 0; i < array_s9_t12.length; i++ ) {

		distance_top = getOffsetTop( array_s9_t12[i] );
		// height_container_pages = array_s9_t12[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s9_t12[i].className.indexOf( 'ecode_section_9_template_12_show' ) == -1 ) {

			array_s9_t12[i].classList.add( 'ecode_section_9_template_12_show' );

			array_elements_hide = array_s9_t12[i].querySelectorAll( '.ecode_article' );

			cont_elements_hide_9_12 = 0;
			total_elements_hide_9_12 = 0;

			show_elements_hide_9_12( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_9_12( array_elements_hide ) {

	total_elements_hide_9_12 = array_elements_hide.length;

	if ( total_elements_hide_9_12 > cont_elements_hide_9_12 ) {

		show_element_hide_9_12( array_elements_hide[cont_elements_hide_9_12], array_elements_hide );

	}

}

function show_element_hide_9_12( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_article_hide' );
	element.classList.add( 'ecode_article_show' );

	cont_elements_hide_9_12++;

	show_elements_hide_9_12( array_elements_hide );

	}, 100);

}
