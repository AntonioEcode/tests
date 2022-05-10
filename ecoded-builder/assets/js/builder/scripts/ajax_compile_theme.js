function ajax_compile_theme() {

	document.getElementById( 'button_compile_theme' ).onclick = function() {

		document.getElementById( 'ecode_container_create_ecoded' ).classList.add( 'ecode_container_loader_show' );

		xhttp = new XMLHttpRequest();
		action = 'wpeb_compile_theme_ajax';
		params = '';
		params += 'action=' + action;

		xhttp.onreadystatechange = function() {

			if ( xhttp.readyState == 4 && xhttp.status == 200 ) {

				response = JSON.parse( xhttp.responseText );

				return_html = '';

				return_html += '<section class="ecoded_builder_container_compile_width">';

				if ( response.success ) {

					return_html += '<p>Ecoded creado correctamente 😁</p>';

				} else {

					return_html += '<p>Error al crear tu Ecoded 💀</p>';

				}

				return_html += '</section>';

				document.getElementById( 'ecode_container_create_ecoded' ).classList.remove( 'ecode_container_loader_show' );
				document.getElementById( 'ecoded_builder_container_compile' ).innerHTML = return_html;
				document.getElementById( 'ecoded_builder_container_compile' ).classList.add( 'ecoded_builder_container_compile_show' );

				add_events_popup();

				setTimeout(function(){

					document.getElementById( 'ecoded_builder_container_compile' ).innerHTML = '';
					document.getElementById( 'ecoded_builder_container_compile' ).classList.remove( 'ecoded_builder_container_compile_show' );

				}, 3000);

			}
		};
		xhttp.open( 'POST', window.atob( ajax_url ), true);
		xhttp.setRequestHeader('X-Requested-With','XMLHttpRequest');
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.send( params );
	}

}
