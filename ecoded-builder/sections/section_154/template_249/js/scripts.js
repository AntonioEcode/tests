window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'ecode_section_154_template_249' ) ) {

		document.getElementById( 'toggle_menu' ).addEventListener( 'click', change_menu_154_249 );

		add_events_click_menu_154_249();

	}

}, false );

/******************************************************************************/
/*****                   Function open/close menu mobile                  *****/
/******************************************************************************/
function change_menu_154_249() {

    if ( document.getElementById( 'toggle_menu' ).className == 'toggle_menu' ) {

        open_menu_154_249();

    } else {

        close_menu_154_249();

    }

}

function open_menu_154_249() {

    document.getElementById( 'toggle_menu' ).classList.add( 'toggle_menu_open' );
    document.getElementById( 'container_main_menu' ).classList.add( 'container_main_menu_open' );
	document.getElementById( 'ecode_section_154_template_249' ).classList.add( 'ecode_section_154_template_249_open' );

}

function close_menu_154_249() {

    document.getElementById( 'toggle_menu' ).classList.remove( 'toggle_menu_open' );
    document.getElementById( 'container_main_menu' ).classList.remove( 'container_main_menu_open' );
	document.getElementById( 'ecode_section_154_template_249' ).classList.remove( 'ecode_section_154_template_249_open' );

}

function add_events_click_menu_154_249() {

	if ( document.getElementById( 'container_main_menu' ) ) {

		width_window = document.body.clientWidth;

		array_li_has_children = document.querySelectorAll( 'ul.menu-item > li.menu-item-has-children' );

		if ( array_li_has_children.length != 0 ) {

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

}
