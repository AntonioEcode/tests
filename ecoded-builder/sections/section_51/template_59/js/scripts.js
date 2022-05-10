var cont_elements_hide_51_59 = 0;
var total_elements_hide_51_59 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_51_template_59' ).length != 0 ) {

		control_scroll_animations_section_51_template_59();

		document.addEventListener( 'scroll', control_scroll_animations_section_51_template_59, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_51_template_59, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_51_template_59, { passive: true } );

		animation_title_51_59();

	}

}, false );

function animation_title_51_59() {

        count_letter = 0;

        text_slogan = document.getElementById( 'ecode_section_51_template_59_title' ).innerHTML;

        width_slogan = document.getElementById( 'ecode_section_51_template_59_title' ).clientWidth + 1;

        text_slogan_length = text_slogan.length;

        text_new = '';

		var interval_51_59 = setInterval( function() {

            if ( count_letter < text_slogan_length ) {

                add_new_letter_51_59();

            } else {

				clearInterval( interval_51_59 );

			}

        }, 30 );

}

function add_new_letter_51_59() {


    new_character_1 = text_slogan[count_letter];

    text_new = text_new + new_character_1;

    document.getElementById( 'ecode_section_51_template_59_title' ).innerHTML = text_new;

    document.getElementById( 'ecode_section_51_template_59_title' ).style.width = width_slogan + "px";

    count_letter++;

}

function control_scroll_animations_section_51_template_59() {

	height_window = document.body.clientHeight;

	array_s51_t59 = document.getElementsByClassName( 'ecode_section_51_template_59' );

	for ( var i = 0; i < array_s51_t59.length; i++ ) {

		distance_top = getOffsetTop( array_s51_t59[i] );
		// height_container_pages = array_s51_t59[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s51_t59[i].className.indexOf( 'ecode_section_51_template_59_show' ) == -1 ) {

			array_s51_t59[i].classList.add( 'ecode_section_51_template_59_show' );

			array_elements_hide = array_s51_t59[i].querySelectorAll( '.section_width' );

			cont_elements_hide_51_59 = 0;
			total_elements_hide_51_59 = 0;

			show_elements_hide_51_59( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_51_59( array_elements_hide ) {

	total_elements_hide_51_59 = array_elements_hide.length;

	if ( total_elements_hide_51_59 > cont_elements_hide_51_59 ) {

		show_element_hide_51_59( array_elements_hide[cont_elements_hide_51_59], array_elements_hide );

	}

}

function show_element_hide_51_59( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'section_width_hide' );
	element.classList.add( 'section_width_show' );

	cont_elements_hide_51_59++;

	show_elements_hide_51_59( array_elements_hide );

	}, 100);

}
