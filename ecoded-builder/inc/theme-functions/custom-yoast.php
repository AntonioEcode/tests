<?php

/******************************************************************************/
/*                         Delete search action Yoast                         */
/******************************************************************************/
add_filter( 'disable_wpseo_json_ld_search', '__return_true' );
/******************************************************************************/
/*                        END Delete search action Yoast                      */
/******************************************************************************/

/******************************************************************************/
/*                         Enable Force rewrite titles                        */
/******************************************************************************/
if( $wpseo_titles = get_option( 'wpseo_titles' ) ) {

	if( array_key_exists( 'forcerewritetitle', $wpseo_titles ) ) {

		if( $wpseo_titles['forcerewritetitle'] != TRUE ) {

			$wpseo_titles['forcerewritetitle'] = TRUE;

			update_option( 'wpseo_titles', $wpseo_titles );

		}

	}

}

/******************************************************************************/
/*                       END Enable Force rewrite titles                      */
/******************************************************************************/

?>
