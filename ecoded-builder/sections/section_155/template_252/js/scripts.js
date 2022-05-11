window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'ecode_section_155_template_252' ) ) {

		document.getElementById( 'toggle_menu' ).addEventListener( 'click', change_menu_155_252 );
		document.getElementById( 'toggle_menu_2' ).addEventListener( 'click', change_menu_155_252 );
		document.getElementById( 'ecode_section_155_template_252_layer' ).addEventListener( 'click', change_menu_155_252 );

		add_events_click_menu_155_252();

	}

}, false );

/******************************************************************************/
/*****                   Function open/close menu mobile                  *****/
/******************************************************************************/
function change_menu_155_252() {

    if ( document.getElementById( 'toggle_menu' ).className == 'toggle_menu' ) {

        open_menu_155_252();

    } else {

        close_menu_155_252();

    }

}

function open_menu_155_252() {

    document.getElementById( 'toggle_menu' ).classList.add( 'toggle_menu_open' );
    document.getElementById( 'container_main_menu' ).classList.add( 'container_main_menu_open' );
	document.getElementById( 'ecode_section_155_template_252' ).classList.add( 'ecode_section_155_template_252_open' );
	document.getElementById( 'ecode_section_155_template_252_layer' ).classList.add( 'ecode_section_155_template_252_layer_open' );

}

function close_menu_155_252() {

    document.getElementById( 'toggle_menu' ).classList.remove( 'toggle_menu_open' );
    document.getElementById( 'container_main_menu' ).classList.remove( 'container_main_menu_open' );
	document.getElementById( 'ecode_section_155_template_252' ).classList.remove( 'ecode_section_155_template_252_open' );
	document.getElementById( 'ecode_section_155_template_252_layer' ).classList.remove( 'ecode_section_155_template_252_layer_open' );

}

function add_events_click_menu_155_252() {

	if ( document.getElementById( 'container_main_menu' ) ) {

		array_li_has_children = document.querySelectorAll( 'ul.menu-item > li.menu-item-has-children' );

		if ( array_li_has_children.length != 0 ) {

			for ( var i = 0; i < array_li_has_children.length; i++ ) {

				array_li_has_children[i].onclick = function() {

					// width_window = document.body.clientWidth;

					// if ( width_window < 1024 ) { // Close submenú

						if ( this.className.indexOf( 'menu_item_open' ) != -1 ) {

							this.classList.remove( 'menu_item_open' );

						} else { // Open submenú

							this.classList.add( 'menu_item_open' );

						}

					// }

				}

			}

		}

	}

}
