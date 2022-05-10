window.addEventListener( 'ecode_load', function ( event ) {

	if ( document.getElementById( 'ecode_tabbar_whatsapp_12_17' ) ) {

		show_button_whatsapp_12_17();
        document.addEventListener( 'scroll', show_button_whatsapp_12_17, false );
        document.addEventListener( 'touchmove', show_button_whatsapp_12_17, false );
        document.addEventListener( 'touchstart', show_button_whatsapp_12_17, false );

    }

}, false );

function show_button_whatsapp_12_17() {

	if ( document.getElementById( 'ecode_tabbar_whatsapp_12_17' ) ) {

		if ( scrollTop() >= 500 ) {

			document.getElementById( 'ecode_tabbar_whatsapp_12_17' ).classList.add( 'ecode_tabbar_whatsapp_12_17_show' );

		} else {

			document.getElementById( 'ecode_tabbar_whatsapp_12_17' ).classList.remove( 'ecode_tabbar_whatsapp_12_17_show' );

		}

	}

}
