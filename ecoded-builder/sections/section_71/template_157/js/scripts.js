window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementsByClassName( 'ecode_section_71_template_157' ).length != 0 ) {

		control_scroll_animations_section_71_template_157();
        document.addEventListener( 'scroll', control_scroll_animations_section_71_template_157, false );
        document.addEventListener( 'touchmove', control_scroll_animations_section_71_template_157, false );
        document.addEventListener( 'touchstart', control_scroll_animations_section_71_template_157, false );

	}

}, false );

function control_scroll_animations_section_71_template_157() {

	height_window = document.body.clientHeight;

	// Control scroll articles
	array_s71_t157 = document.getElementsByClassName( 'ecode_section_71_template_157' );

	for ( var i = 0; i < array_s71_t157.length; i++ ) {

		distance_top = getOffsetTop( array_s71_t157[i] );
		// height_container_pages = array_s71_t157[i].clientHeight;

		total_scroll = distance_top - height_window + ( height_window / 4 );

		if ( total_scroll <= scrollTop() && array_s71_t157[i].className.indexOf( 'ecode_section_71_template_157_show' ) == -1 ) {

			array_s71_t157[i].classList.add( 'ecode_section_71_template_157_show' );

			array_elements_hide = array_s71_t157[i].querySelectorAll( '.ecode_article' );

			cont_elements_hide_71_157 = 0;
			total_elements_hide_71_157 = 0;

			show_elements_hide_71_157( array_elements_hide );

		}

	}

}

// Show elements
function show_elements_hide_71_157( array_elements_hide ) {

	total_elements_hide_71_157 = array_elements_hide.length;

	if ( total_elements_hide_71_157 > cont_elements_hide_71_157 ) {

		show_element_hide_71_157( array_elements_hide[cont_elements_hide_71_157], array_elements_hide );

	}

}

function show_element_hide_71_157( element, array_elements_hide ) {

	service_array = setTimeout(function() {

	element.classList.remove( 'ecode_article_hide' );
	element.classList.add( 'ecode_article_show' );

	cont_elements_hide_71_157++;

	show_elements_hide_71_157( array_elements_hide );

	}, 100);

}
