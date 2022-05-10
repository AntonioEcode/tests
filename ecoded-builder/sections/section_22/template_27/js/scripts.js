window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'toggle_menu' ) ) {

        document.getElementById( 'toggle_menu' ).addEventListener( 'click', change_menu );

    }

	// if ( document.getElementById( 'container_main_menu' ) ) {
	//
	// 	add_events_click_menu();
	//
	// }

}, false );

/******************************************************************************/
/*****                   Function open/close menu mobile                  *****/
/******************************************************************************/
function change_menu() {

    if ( document.getElementById( 'toggle_menu' ).className == 'toggle_menu' ) {

        open_menu();

    } else {

        close_menu();

    }

}

function open_menu() {

    document.getElementById( 'toggle_menu' ).classList.add( 'toggle_menu_open' );
    document.getElementById( 'container_main_menu' ).classList.add( 'container_main_menu_open' );
	document.getElementsByClassName( 'ecode_section_22_template_27' )[0].classList.add( 'header_open' );

}

function close_menu() {

    document.getElementById( 'toggle_menu' ).classList.remove( 'toggle_menu_open' );
    document.getElementById( 'container_main_menu' ).classList.remove( 'container_main_menu_open' );
	document.getElementsByClassName( 'ecode_section_22_template_27' )[0].classList.remove( 'header_open' );

}

function add_events_click_menu() {

	if ( document.getElementById( 'container_main_menu' ) ) {

		width_window = document.body.clientWidth;

		array_li_has_children = document.querySelectorAll( 'ul.menu-item > li.menu-item-has-children' );

		for ( var i = 0; i < array_li_has_children.length; i++ ) {

			array_li_has_children[i].onclick = function() {

				width_window = document.body.clientWidth;

				if ( width_window < 1024 ) { // Close submenú

					if ( this.className.indexOf( 'menu_item_open' ) != -1 ) {

						this.classList.remove( 'menu_item_open' );

					} else { // Open submenú

						this.classList.add( 'menu_item_open' );

					}

				}

			}

		}

	}

}
