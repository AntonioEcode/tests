<?php

// Function to get content between specific tags of a text string
function wpeb_get_content_matches( $start_tag, $end_tag, $content, $without_template_key = 0 ) {

	$matches = array();

	if( !empty( $start_tag ) && !empty( $end_tag ) && !empty( $content ) ) {

		$delimiter = '#';

		$regex = $delimiter . preg_quote( $start_tag, $delimiter ) 
			. '(.*?)' 
			. preg_quote( $end_tag, $delimiter ) 
			. $delimiter 
			. 's';

		preg_match( $regex, $content, $matches );

	}

	return !empty( $matches ) ? $matches[$without_template_key] : NULL;

}

?>