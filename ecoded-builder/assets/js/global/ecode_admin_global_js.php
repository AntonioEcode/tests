<?php

header( 'Content-Type: application/javascript' );

echo file_get_contents( __DIR__ . '/scripts/window_onload.js' );
echo file_get_contents( __DIR__ . '/scripts/color_picker.min.js' );
echo file_get_contents( __DIR__ . '/scripts/initialize_colorpicker.js' );
echo file_get_contents( __DIR__ . '/scripts/slim_select.js' );
echo file_get_contents( __DIR__ . '/scripts/initialize_slim_select.js' );

?>
