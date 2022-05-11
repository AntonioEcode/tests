var new_colorpicker_edit = [];
var colorpicker_edit_id = [];

function set_colorpicker_edit() {

	array_colorpicker = document.getElementsByClassName( 'container_colorpicker' );

	if ( array_colorpicker.length != 0 ) {

		new_colorpicker_edit = [];
		colorpicker_edit_id = [];

		for ( var i = 0; i < array_colorpicker.length; i++ ) {

			array_colorpicker[i].setAttribute( 'data-id', i );

			colorpicker_edit_id[i] = array_colorpicker[i].id;

			init_colorpicker_edit( i );

		}

	}

}

function init_colorpicker_edit( i ) {

	new_colorpicker_edit[i] = new Picker({
		parent: document.getElementById( colorpicker_edit_id[i] ),
		alpha: true,
		editor: true,
		cancelButton: true,
	});

	new_colorpicker_edit[i].onDone = function(color) {

		color_hex = color.hex;

		document.getElementById( colorpicker_edit_id[i] ).style.background = color_hex;
		document.getElementById( colorpicker_edit_id[i] ).nextElementSibling.value = color_hex;
		document.getElementById( colorpicker_edit_id[i] ).parentElement.querySelectorAll( 'i' )[0].classList.add( 'container_colorpicker_selected' );

		// Reset values statics colors
		container_parent_property = document.getElementById( colorpicker_edit_id[i] ).parentElement.parentElement;

		array_inputs_radio = container_parent_property.querySelectorAll( 'input[type="radio"]' );

		if ( array_inputs_radio.length != 0 ) {

			for ( var k = 0; k < array_inputs_radio.length; k++ ) {

				array_inputs_radio[k].checked = false;

			}

		}

		// Updates values
		if ( colorpicker_edit_id[i].indexOf( 'border' ) != -1 ) {

			update_border();

		} else {

			update_element();

		}

	};

	new_colorpicker_edit[i].onChange = function(color) {

		color_hex = color.hex;

		document.getElementById( colorpicker_edit_id[i] ).style.background = color_hex;
		document.getElementById( colorpicker_edit_id[i] ).nextElementSibling.value = color_hex;

	};
	
	new_colorpicker_edit[i].onOpen = function(color) {

		color_hex = color.hex;

		document.getElementById( colorpicker_edit_id[i] ).querySelectorAll( '.picker_cancel' )[0].innerHTML = '<button data-id="' + i + '">Reset</button>';

		document.getElementById( colorpicker_edit_id[i] ).querySelectorAll( '.picker_cancel button' )[0].onclick = function() {

			index = this.getAttribute( 'data-id' );

			destroy_colorpicker( index );

		};

	};

}

function destroy_colorpicker( index ) {

	new_colorpicker_edit[index].destroy();

	document.getElementById( colorpicker_edit_id[index] ).style = '';
	document.getElementById( colorpicker_edit_id[index] ).nextElementSibling.value = '';
	document.getElementById( colorpicker_edit_id[index] ).parentElement.querySelectorAll( 'i' )[0].classList.remove( 'container_colorpicker_selected' );

	update_element();

	setTimeout(function(){

		init_colorpicker_edit( index );

	}, 100);

}
