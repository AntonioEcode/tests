function get_name_property( property_name ) {

	var regex = new RegExp('\-(moz|o|webkit|ms|khtml)\-(?!font-smoothing|osx|print|backface)', 'g');

	property = property_name.replace(regex, '');

	return property

}
