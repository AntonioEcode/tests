/* Shortcode - Content with anchors */
add_shortcode( 'wpeb_titles_anchors', 'wpeb_titles_anchors_shortcode' );

function wpeb_titles_anchors_shortcode( $atts ) {

    $output = '';

    $atts = shortcode_atts(
        array(
           'anchor' => '',
           'title' => '',
        ),
        $atts
    );

    if( !empty( $atts['anchor'] ) && !empty( $atts['title'] ) ) {

        $output .= '<h2 data-title="' . $atts['anchor'] . '">' . $atts['title'] . '</h2>';

    }

	return $output;

}
/* END wpeb_shortcode */