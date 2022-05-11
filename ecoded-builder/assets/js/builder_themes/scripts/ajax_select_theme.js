function ajax_select_theme( theme ) {

	xhttp = new XMLHttpRequest();

	action = 'wpeb_select_theme_ajax';

	params = '';
	params += 'action=' + action;
	params += '&theme=' + theme;

	xhttp.onreadystatechange = function() {

		if ( xhttp.readyState == 4 && xhttp.status == 200 ) {

			response = JSON.parse( xhttp.responseText );

			document.getElementById( 'ecode_container_loader' ).classList.remove( 'ecode_container_loader_show' );

			return_html = '';

			return_html += '<section class="ecoded_builder_container_compile_width">';

			if ( response.success ) {

				return_html += '<p>Tema seleccionado correctamente 😁</p>';

			} else {

				return_html += '<p>' + response.data[0].message + '</p>';

			}

			return_html += '</section>';

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
