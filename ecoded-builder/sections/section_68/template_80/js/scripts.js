window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'ecode_tabbar_whatsapp_68_80' ) ) {

		show_button_whatsapp_68_80();
        document.addEventListener( 'scroll', show_button_whatsapp_68_80, false );
        document.addEventListener( 'touchmove', show_button_whatsapp_68_80, false );
        document.addEventListener( 'touchstart', show_button_whatsapp_68_80, false );

    }

}, false );

function show_button_whatsapp_68_80() {

	if ( document.getElementById( 'ecode_tabbar_whatsapp_68_80' ) ) {

		if ( scrollTop() >= 500 ) {

			document.getElementById( 'ecode_tabbar_whatsapp_68_80' ).classList.add( 'ecode_tabbar_whatsapp_68_80_show' );

		} else {

			document.getElementById( 'ecode_tabbar_whatsapp_68_80' ).classList.remove( 'ecode_tabbar_whatsapp_68_80_show' );

		}

	}

}
