/* Shortcode - Link button */
add_shortcode( 'link_button', 'wpeb_link_button_shortcode' );

function wpeb_link_button_shortcode( $atts ) {

    $output = '';

    $atts = shortcode_atts(
        array(
           'url' => '',
           'url_text' => '',
           'new_window' => '',
           'nofollow' => '',
        ),
        $atts
    );

    if( !empty( $atts['url'] ) && !empty( $atts['url_text'] ) ) {

		$attributes = $atts['new_window'] == 'yes' ? "target='_blank'" : '';
		$attributes .= $atts['nofollow'] == 'yes' ? "rel='noopener noreferrer nofollow'" : '';

		$output .= '<div class="ecode_shortcode_link">';
			$output .= '<a href="' . $atts['url'] . '" ' . $attributes . ' class="ecode_button_link">' . $atts['url_text'] . '</a>';
		$output .= '</div>';

    }

	return $output;

}
/* END wpeb_shortcode */