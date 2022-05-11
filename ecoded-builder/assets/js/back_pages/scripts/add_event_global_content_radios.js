var container_radios = [];

function add_event_global_content_radios() {

	array_container_radios = document.getElementsByClassName( 'wpeb_global_content_radios' );

	for ( var i = 0; i < array_container_radios.length; i++ ) {

		container_radios[i] = array_container_radios[i];

		array_radios = array_container_radios[i].querySelectorAll( 'input[type="radio"]' );

		for ( var j = 0; j < array_radios.length; j++ ) {

			array_radios[j].setAttribute( 'data-container-id', i );

			array_radios[j].onchange = function() {

				console.log('entro');

				input_radio_value = this.value;
				data_container_id = this.getAttribute( 'data-container-id' );
				data_container_id_parent = container_radios[data_container_id].parentElement;
				array_cmb_row = data_container_id_parent.querySelectorAll( 'div.cmb-row' );

				if ( input_radio_value == '' ) {

					for ( var k = 0; k < array_cmb_row.length; k++ ) {

						if ( array_cmb_row[k].className.indexOf( 'wpeb_global_content' ) == -1 ) {

							array_cmb_row[k].style = '';

						}

					}

				} else {

					for ( var k = 0; k < array_cmb_row.length; k++ ) {

						if ( array_cmb_row[k].className.indexOf( 'wpeb_global_content' ) == -1 ) {

							array_cmb_row[k].style.display = 'none';

						}

					}

				}

			}

		}

		// Check selected
		for ( var k = 0; k < array_radios.length; k++ ) {

			if ( array_radios[k].checked == true ) {

				input_radio_value = array_radios[k].value;
				data_container_id = array_radios[k].getAttribute( 'data-container-id' );
				data_container_id_parent = container_radios[data_container_id].parentElement;
				array_cmb_row = data_container_id_parent.querySelectorAll( 'div.cmb-row' );

				if ( input_radio_value == '' ) {

					for ( var k = 0; k < array_cmb_row.length; k++ ) {

						if ( array_cmb_row[k].className.indexOf( 'wpeb_global_content' ) == -1 ) {

							array_cmb_row[k].style = '';

						}

					}

				} else {

					for ( var k = 0; k < array_cmb_row.length; k++ ) {

						if ( array_cmb_row[k].className.indexOf( 'wpeb_global_content' ) == -1 ) {

							array_cmb_row[k].style.display = 'none';

						}

					}

				}

			}

		}

	}

}
