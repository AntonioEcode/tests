<?php

/******************************************************************************/
/*                          Get code icons svg image                          */
/******************************************************************************/
function get_icon( $icon_name ) {

    $icon_path = WPEB_PLUGIN_THEME . '/img/icons/' . $icon_name . '.svg';
    $icon = file_get_contents( $icon_path, FILE_USE_INCLUDE_PATH );

    return $icon;

}
/******************************************************************************/
/*                        END Get code icons svg image                        */
/******************************************************************************/

?>
