var cont_elements_hide_2_3 = 0;
var total_elements_hide_2_3 = 0;
var service_array;

window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_2_template_3' ).length != 0 ) {

		control_scroll_animations_section_2_template_3();

		document.addEventListener( 'scroll', control_scroll_animations_section_2_template_3, { passive: true } );
	    document.addEventListener( 'touchmove', control_scroll_animations_section_2_template_3, { passive: true } );
	    document.addEventListener( 'touchstart', control_scroll_animations_section_2_template_3, { passive: true } );

		animation_title_2_3();

	}

}, false );

function animation_title_2_3() {

        count_letter = 0;

        text_slogan = document.getElementById( 'ecode_section_2_template_3_title' ).innerHTML;

        width_slogan = document.getElementById( 'ecode_section_2_template_3_title' ).clientWidth + 1;

        text_slogan_length = text_slogan.length;

        text_new = '';

        var interval_2_3 = setInterval( function() {

            if ( count_letter < text_slogan_length ) {

                add_new_letter_2_3();

			} else {

				clearInterval( interval_2_3 );

			}

        }, 30 );

}

function add_new_letter_2_3() {


    new_character_1 = text_slogan[count_letter];

    text_new = text_new + new_character_1;

    document.getElementById( 'ecode_section_2_template_3_title' ).innerHTML = text_new;

    document.getElementById( 'ecode_section_2_template_3_title' ).style.width = width_slogan + "px";

    count_letter++;

}

function control_scroll_animations_section_2_template_3() {

	height_window = document.body.clientHeight;

	array_s2_t3 = document.getElementsByClassName( 'ecode_section_2_template_3' );

	for ( var i = 0; i < array_s2_t3.length; i++ ) {

		distance_top = getOffsetTop( array_s2_t3[i] );
		// height_container_pages = array_s2_t3[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s2_t3[i].className.indexOf( 'ecode_section_2_template_3_show' ) == -1 ) {

			array_s2_t3[i].classList.add( 'ecode_section_2_template_3_show' );

			array_elements_hide = array_s2_t3[i].querySelectorAll( '.content_width' );

			cont_elements_hide_2_3 = 0;
			total_elements_hide_2_3 = 0;

			show_elements_hide_2_3( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_2_3( array_elements_hide ) {

	total_elements_hide_2_3 = array_elements_hide.length;

	if ( total_elements_hide_2_3 > cont_elements_hide_2_3 ) {

		show_element_hide_2_3( array_elements_hide[cont_elements_hide_2_3], array_elements_hide );

	}

}

function show_element_hide_2_3( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'content_width_hide' );
	element.classList.add( 'content_width_show' );

	cont_elements_hide_2_3++;

	show_elements_hide_2_3( array_elements_hide );

	}, 100);

}
