<?php

header( 'Content-Type: application/javascript' );

echo file_get_contents( __DIR__ . '/scripts/add_event_buttons_global_content.js' );
echo file_get_contents( __DIR__ . '/scripts/add_event_global_content_radios.js' );
echo file_get_contents( __DIR__ . '/scripts/add_events_click_icons.js' );
echo file_get_contents( __DIR__ . '/scripts/ecode_search.js' );
echo file_get_contents( __DIR__ . '/scripts/sortable.js' );
echo file_get_contents( __DIR__ . '/scripts/check_show_preview.js' );
echo file_get_contents( __DIR__ . '/scripts/update_click_buttons.js' );
echo file_get_contents( __DIR__ . '/scripts/window_onload.js' );


?>
