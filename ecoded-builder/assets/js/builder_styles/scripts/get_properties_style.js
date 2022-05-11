function get_properties_style( style ) {

	array_style = style.split( ';' );

	css_property_0 = '';

	array_style_final = [];

	for ( var i = 0; i < array_style.length; i++ ) {

		property = array_style[i];

		if ( property != '' ) {

			key = '';

			if ( property.indexOf( '/*! ' ) != -1 ) {

				key = property.split( ':' )[0].substring( property.split( ':' )[0].lastIndexOf( '/*! ' ) + 4, property.split( ':' )[0].lastIndexOf( ' !*/' ) );

				property = property.replace( '/*! ' + key + ' !*/', '' ).replace( '/*! end_' + key + ' !*/', '' );

			}

			property_name = property.split( ':' )[0];
			property_value = property.split( ':' )[1].replace( ';', '');
			css_property = get_name_property( property_name );

			if ( css_property_0 != css_property ) {

				css_property_0 = css_property;

				array_style_final[i] = {
					name: css_property,
					value: property_value,
					key: key,
				};

			}

		}

	}

	return array_style_final;

}
