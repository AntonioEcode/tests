<?php

/******************************************************************************/
/*                             Default image post                             */
/******************************************************************************/
function default_image_post( $type = NULL ) {

    // If theme not exists get from plugin/ecoded_builder/theme/ else from /themes/ecodetheme
	if( !file_exists( WPEB_THEME ) && !is_dir( WPEB_THEME ) ) {

        $base_src = WPEB_PLUGIN_THEME_FRONT;

    } else {

        $base_src = get_bloginfo( 'template_directory' ) . '/';

    }

    $image = '<img loading=lazy src="' . $base_src . 'img/default.png' . '" alt="' . __( 'Default', 'frontecode' ) . '" />';

    if( $type == 'img' ) {

        $image = '<img loading=lazy src="' . $base_src . 'img/default.png' . '" alt="' . __( 'Default', 'frontecode' ) . '" />';

    } elseif( 'url' ) {

        $image = $base_src . 'img/default.png';

    }

    return $image;

}
/******************************************************************************/
/*                            END Default image post                          */
/******************************************************************************/

/******************************************************************************/
/*   Automatically set the image Title, Alt-Text & Description upon upload    */
/******************************************************************************/

add_action( 'add_attachment', 'wpeb_set_image_meta_upon_image_upload' );

function wpeb_set_image_meta_upon_image_upload( $post_ID ) {

	// Check if uploaded file is an image, else do nothing

	if ( wp_attachment_is_image( $post_ID ) ) {

		$my_image_title = get_post( $post_ID )->post_title;

		// Sanitize the title:  remove hyphens, underscores & extra spaces:
		$my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );

		// Sanitize the title:  capitalize first letter of every word (other letters lower case):
		$my_image_title = ucfirst( strtolower( $my_image_title ) );

		// Create an array with the image meta (Title, Caption, Description) to be updated
		// Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
		$my_image_meta = array(
			'ID'		    => $post_ID,			// Specify the image (ID) to be updated
			'post_title'	=> $my_image_title,		// Set image Title to sanitized title
			// 'post_excerpt'	=> $my_image_title,		// Set image Caption (Excerpt) to sanitized title
			'post_content'	=> $my_image_title,		// Set image Description (Content) to sanitized title
		);

		// Set the image Alt-Text
		update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title );

		// Set the image meta (e.g. Title, Excerpt, Content)
		wp_update_post( $my_image_meta );

	} 
}

/******************************************************************************/
/* END Automatically set the image Title, Alt-Text & Description upon upload  */
/******************************************************************************/

?>