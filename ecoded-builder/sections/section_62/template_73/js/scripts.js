window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'ecode_section_62_template_73' ) ) {

		document.getElementById( 'toggle_menu' ).addEventListener( 'click', change_menu_62_73 );

	}

}, false );

/******************************************************************************/
/*****                   Function open/close menu mobile                  *****/
/******************************************************************************/
function change_menu_62_73() {

    if ( document.getElementById( 'toggle_menu' ).className == 'toggle_menu' ) {

        open_menu_62_73();

    } else {

        close_menu_62_73();

    }

}

function open_menu_62_73() {

    document.getElementById( 'toggle_menu' ).classList.add( 'toggle_menu_open' );
    document.getElementById( 'container_main_menu' ).classList.add( 'container_main_menu_open' );

}

function close_menu_62_73() {

    document.getElementById( 'toggle_menu' ).classList.remove( 'toggle_menu_open' );
    document.getElementById( 'container_main_menu' ).classList.remove( 'container_main_menu_open' );

}
