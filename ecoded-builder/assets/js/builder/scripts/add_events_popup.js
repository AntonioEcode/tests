function add_events_popup() {

	if ( document.getElementById( 'close_popup' ) ) {

		document.getElementById( 'close_popup' ).onclick = function() {

			// if ( !change_style ) {

				document.getElementById( 'ecoded_builder_container_popup' ).innerHTML = '';
				document.getElementById( 'ecoded_builder_container_popup' ).classList.remove( 'ecoded_builder_container_popup_show' );
				document.getElementById( 'ecoded_builder_container_popup' ).classList.remove( 'ecoded_builder_container_popup_templates' );

				document.body.classList.remove( 'ecoded_builder_body_fixed' );
			// 
			// } else {
			//
			// 	if ( confirm( "¿Estás seguro de que desea salir sin guardar?" ) ) {
			//
			// 		document.getElementById( 'ecoded_builder_container_popup' ).innerHTML = '';
			// 		document.getElementById( 'ecoded_builder_container_popup' ).classList.remove( 'ecoded_builder_container_popup_show' );
			// 		document.getElementById( 'ecoded_builder_container_popup' ).classList.remove( 'ecoded_builder_container_popup_templates' );
			//
			// 		document.body.classList.remove( 'ecoded_builder_body_fixed' );
			//
			// 	}
			//
			// }

		}

	}

}
