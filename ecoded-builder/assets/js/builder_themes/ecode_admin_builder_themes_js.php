<?php

header( 'Content-Type: application/javascript' );

echo file_get_contents( __DIR__ . '/scripts/window_onload.js' );
echo file_get_contents( __DIR__ . '/scripts/add_events_ecode_themes.js' );
echo file_get_contents( __DIR__ . '/scripts/add_event_button_select_theme.js' );
echo file_get_contents( __DIR__ . '/scripts/ajax_select_theme.js' );


?>
