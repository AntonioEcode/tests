var new_colorpicker = [];
var colorpicker_id = [];
var colorpicker_id_color = [];

function initialize_colorpicker() {

	array_colorpicker = document.getElementsByClassName( 'colorpicker' );

	if ( array_colorpicker.length != 0 ) {

		new_colorpicker = [];
		colorpicker_id = [];
		colorpicker_id_color = [];

		for ( var i = 0; i < array_colorpicker.length; i++ ) {

			colorpicker_id[i] = array_colorpicker[i].id;
			colorpicker_id_color[i] = array_colorpicker[i].getAttribute( 'data-color' );

			init_colorpicker_global( i );

		}

	}

}

var current_color = '';

function init_colorpicker_global( i ) {

	new_colorpicker[i] = new Picker({
		parent: document.getElementById( colorpicker_id[i] ),
		alpha: false,
		color: colorpicker_id_color[i],
		editor: true,
		cancelButton: false,
	});

	new_colorpicker[i].onDone = function(color) {

		color_hex = color.hex.replace( /.$/, '' ).replace( /.$/, '' );

		if ( current_color != color_hex ) {

			document.getElementById( 'colors-changed' ).value = '1';

		}

		current_color = '';

		document.getElementById( colorpicker_id[i] ).style.background = color_hex;
		document.getElementById( colorpicker_id[i] ).nextElementSibling.value = color_hex;

	};

	new_colorpicker[i].onOpen = function(color) {

		current_color = color.hex.replace( /.$/, '' ).replace( /.$/, '' );

	};

}
