<?php

/* Shortcode - Form legal texts */
add_filter( 'wpcf7_form_elements', 'do_shortcode' );
add_shortcode( 'wpeb_form_legal_texts', 'wpeb_form_legal_texts_shortcode' );

function wpeb_form_legal_texts_shortcode() {

    $output = '';

	$form_legal_text = get_option( 'ecode_form_legal_text' );

	if( !empty( $form_legal_text ) ) {

		$output = '<div class="container_legal"><p>';
		$output .= $form_legal_text;
		$output .= '</p></div>';

	}

	return $output;

}
/* END wpeb_shortcode */

?>