window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'ecode_section_43_template_51' ) ) {

		document.getElementById( 'close_menu' ).addEventListener( 'click', close_menu_43_51 );
		document.getElementById( 'toggle_menu' ).addEventListener( 'click', change_menu_43_51 );

		check_scroll_header_43_51();
		document.addEventListener('scroll', check_scroll_header_43_51, false);
		document.addEventListener('touchmove', check_scroll_header_43_51, false);
		document.addEventListener('touchstart', check_scroll_header_43_51, false);

	}

}, false );

/******************************************************************************/
/*****                   Function open/close menu mobile                  *****/
/******************************************************************************/
function change_menu_43_51() {

    if ( document.getElementById( 'toggle_menu' ).className == 'toggle_menu' ) {

        open_menu_43_51();

    } else {

        close_menu_43_51();

    }

}

function open_menu_43_51() {

    document.getElementById( 'toggle_menu' ).classList.add( 'toggle_menu_open' );
    document.getElementById( 'container_main_menu' ).classList.add( 'container_main_menu_open' );

}

function close_menu_43_51() {

    document.getElementById( 'toggle_menu' ).classList.remove( 'toggle_menu_open' );
    document.getElementById( 'container_main_menu' ).classList.remove( 'container_main_menu_open' );

}

function check_scroll_header_43_51() {

	if ( scrollTop() > 50 ) {

		document.getElementsByClassName( 'ecode_section_43_template_51' )[0].classList.add( 'header_open_scroll' );
		

	} else {

		document.getElementsByClassName( 'ecode_section_43_template_51' )[0].classList.remove( 'header_open_scroll' );

	}

}
