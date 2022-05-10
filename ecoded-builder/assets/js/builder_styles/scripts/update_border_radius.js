function update_border_radius() {

	array_inputs_border_radius = document.getElementById( 'container_border_radius' ).querySelectorAll( 'input[type="number"]' );

	return_style = 'border-radius:';

	for ( var i = 0; i < array_inputs_border_radius.length; i++ ) {

		property_value = ( array_inputs_border_radius[i].value != '' ) ? array_inputs_border_radius[i].value : '0';

		return_style += property_value + 'px ';

	}

	return_style += ';';

	document.getElementById( 'container_border_radius_example' ).style = return_style;

	update_element();

}
