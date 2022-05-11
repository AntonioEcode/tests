<?php

header( 'Content-Type: application/javascript' );

echo file_get_contents( __DIR__ . '/scripts/window_onload.js' );
echo file_get_contents( __DIR__ . '/scripts/add_event_admin_menu.js' );

?>
