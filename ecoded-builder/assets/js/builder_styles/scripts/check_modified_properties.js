function check_modified_properties( property, value ) {

	check_style = false;
	check_value = false;

	for ( var key in array_style_default ) {

		property_data = array_style_default[key];
		property_name = property_data.name;
		property_value = property_data.value;

		if ( property_name == property ) {

			check_style = true;

			if ( value != property_value ) {

				check_value = true;

			}

			break;

		}

	}

	if ( check_style == false ) {

		check_value = true;

	}

	return check_value;

}
