var cont_elements_hide_161_262 = 0;
var total_elements_hide_161_262 = 0;
var active_show_elements_161_262 = false;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_161_template_262' ).length != 0 ) {

		control_scroll_animations_section_161_template_262();

		document.addEventListener( 'scroll', control_scroll_animations_section_161_template_262, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_161_template_262, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_161_template_262, { passive: true } );

	}

}, false );

function control_scroll_animations_section_161_template_262() {

	height_window = document.body.clientHeight;

	array_s161_t261 = document.getElementsByClassName( 'ecode_section_161_template_262' );

	for ( var i = 0; i < array_s161_t261.length; i++ ) {

		distance_top = getOffsetTop( array_s161_t261[i] );

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s161_t261[i].className.indexOf( 'ecode_section_161_template_262_show' ) == -1 && active_show_elements_161_262 == false ) {

			active_show_elements_161_262 = true;

			array_s161_t261[i].classList.add( 'ecode_section_161_template_262_show' );

			array_elements_hide = array_s161_t261[i].querySelectorAll( '.ecode_article' );

			cont_elements_hide_161_262 = 0;
			total_elements_hide_161_262 = 0;

			show_elements_hide_161_262( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_161_262( array_elements_hide ) {

	total_elements_hide_161_262 = array_elements_hide.length;

	if ( total_elements_hide_161_262 > cont_elements_hide_161_262 ) {

		show_element_hide_161_262( array_elements_hide[cont_elements_hide_161_262], array_elements_hide );

	} else {

		active_show_elements_161_262 = false;

	}

}

function show_element_hide_161_262( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_article_hide' );
	element.classList.add( 'ecode_article_show' );

	cont_elements_hide_161_262++;

	show_elements_hide_161_262( array_elements_hide );

	}, 100);

}
