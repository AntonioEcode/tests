window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'ecode_tabbar_whatsapp_29_34' ) ) {

		show_button_whatsapp_29_34();
        document.addEventListener( 'scroll', show_button_whatsapp_29_34, false );
        document.addEventListener( 'touchmove', show_button_whatsapp_29_34, false );
        document.addEventListener( 'touchstart', show_button_whatsapp_29_34, false );

    }

}, false );

function show_button_whatsapp_29_34() {

	if ( document.getElementById( 'ecode_tabbar_whatsapp_29_34' ) ) {

		if ( scrollTop() >= 500 ) {

			document.getElementById( 'ecode_tabbar_whatsapp_29_34' ).classList.add( 'ecode_tabbar_whatsapp_29_34_show' );

		} else {

			document.getElementById( 'ecode_tabbar_whatsapp_29_34' ).classList.remove( 'ecode_tabbar_whatsapp_29_34_show' );

		}

	}

}
