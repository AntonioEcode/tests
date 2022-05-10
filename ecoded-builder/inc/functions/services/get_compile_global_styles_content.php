<?php

// Get compile global config styles
function wpeb_get_compile_global_styles_content() {

	$global_styles_content = file_get_contents( WPEB_PLUGIN_SECTIONS_BACK . 'assets/css/global-styles.php' );

	// Replace key_template in global styles
	while( !empty( $option_name = wpeb_get_content_matches( '{{', '}}', $global_styles_content, $without_template_key = 1 ) ) ) {

		$key_template = '{{' . $option_name . '}}';
		$option_value = get_option( $option_name );

		$global_styles_content = str_replace( $key_template, $option_value, $global_styles_content );

	}

	return $global_styles_content;

}

?>