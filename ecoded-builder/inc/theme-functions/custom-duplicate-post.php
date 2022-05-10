<?php

/******************************************************************************/
/*                 Remove link "duplicate post" of "Admin bar"                */
/******************************************************************************/
if( $option_duplicate_post_show_link_in = get_option( 'duplicate_post_show_link_in' ) ) {

	if( array_key_exists( 'adminbar', $option_duplicate_post_show_link_in ) ) {

		if( $option_duplicate_post_show_link_in['adminbar'] != FALSE ) {

			$option_duplicate_post_show_link_in['adminbar'] = FALSE;

			update_option( 'duplicate_post_show_link_in', $option_duplicate_post_show_link_in );

		}

	}

}
/******************************************************************************/
/*               END Remove link "duplicate post" of "Admin bar"              */
/******************************************************************************/


?>
