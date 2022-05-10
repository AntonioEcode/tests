<?php

/******************************************************************************/
/*                          Get code icons svg image                          */
/******************************************************************************/
function get_icon_dashboard( $icon_name, $base_dir = WPEB_PLUGIN_DIR ) {

    $icon_path = $base_dir . '/assets/img/icons/' . $icon_name . '.svg';
    $icon = file_get_contents( $icon_path, FILE_USE_INCLUDE_PATH );

    return $icon;

}
/******************************************************************************/
/*                        END Get code icons svg image                        */
/******************************************************************************/

?>