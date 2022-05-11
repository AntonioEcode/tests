function add_events_border() {

	array_container_border = document.getElementsByClassName( 'container_border' );

	for ( var i = 0; i < array_container_border.length; i++ ) {

		array_inputs = array_container_border[i].querySelectorAll( 'input[type="radio"], select' );

		for ( var j = 0; j < array_inputs.length; j++ ) {

			array_inputs[j].oninput = function() {

				if ( this.name == 'border_color_text' ) {

					index_colorpicker = document.getElementById( 'colorpicker_border_color_text' ).getAttribute( 'data-id' );

					destroy_colorpicker( index_colorpicker );

				}

				if ( this.name == 'border_top_color_text' ) {

					index_colorpicker = document.getElementById( 'colorpicker_border_top_color_text' ).getAttribute( 'data-id' );

					destroy_colorpicker( index_colorpicker );

				}

				if ( this.name == 'border_left_color_text' ) {

					index_colorpicker = document.getElementById( 'colorpicker_border_left_color_text' ).getAttribute( 'data-id' );

					destroy_colorpicker( index_colorpicker );

				}

				if ( this.name == 'border_bottom_color_text' ) {

					index_colorpicker = document.getElementById( 'colorpicker_border_bottom_color_text' ).getAttribute( 'data-id' );

					destroy_colorpicker( index_colorpicker );

				}

				if ( this.name == 'border_right_color_text' ) {

					index_colorpicker = document.getElementById( 'colorpicker_border_right_color_text' ).getAttribute( 'data-id' );

					destroy_colorpicker( index_colorpicker );

				}

				update_border();

			}

		}

	}

}
