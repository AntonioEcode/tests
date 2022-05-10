var cont_elements_hide_45_53 = 0;
var total_elements_hide_45_53 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_45_template_53' ).length != 0 ) {

		control_scroll_animations_section_45_template_53();

		document.addEventListener( 'scroll', control_scroll_animations_section_45_template_53, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_45_template_53, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_45_template_53, { passive: true } );

	}

}, false );

function control_scroll_animations_section_45_template_53() {

	height_window = document.body.clientHeight;

	array_s45_t53 = document.getElementsByClassName( 'ecode_section_45_template_53' );

	for ( var i = 0; i < array_s45_t53.length; i++ ) {

		distance_top = getOffsetTop( array_s45_t53[i] );
		// height_container_pages = array_s45_t53[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s45_t53[i].className.indexOf( 'ecode_section_45_template_53_show' ) == -1 ) {

			array_s45_t53[i].classList.add( 'ecode_section_45_template_53_show' );

			array_elements_hide = array_s45_t53[i].querySelectorAll( '.ecode_info' );

			cont_elements_hide_45_53 = 0;
			total_elements_hide_45_53 = 0;

			show_elements_hide_45_53( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_45_53( array_elements_hide ) {

	total_elements_hide_45_53 = array_elements_hide.length;

	if ( total_elements_hide_45_53 > cont_elements_hide_45_53 ) {

		show_element_hide_45_53( array_elements_hide[cont_elements_hide_45_53], array_elements_hide );

	}

}

function show_element_hide_45_53( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_info_hide' );
	element.classList.add( 'ecode_info_show' );

	cont_elements_hide_45_53++;

	show_elements_hide_45_53( array_elements_hide );

	}, 100);

}
