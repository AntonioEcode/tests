<?php

// Read config DB file to process the inserts
function wpeb_read_config_db() {

	$inserts_db = array();

	$config_db_json = file_get_contents( WPEB_PLUGIN_CONFIG . 'config_db.json' );

	if( $config_db_json !== FALSE ) {

		$config_db = json_decode( $config_db_json, TRUE );

		// Add custom config pages if have
		$eb_pages_config_db_path = WPEB_PLUGIN_CONFIG . 'custom/eb_pages_config_db.json';
		$eb_pages_config_db = file_exists( $eb_pages_config_db_path ) ? json_decode( file_get_contents( $eb_pages_config_db_path ) ) : '';

		if( !empty( $eb_pages_config_db ) ) {

			$config_db['tables']['eb_pages'] = $eb_pages_config_db;

		}

		// Add custom config page sections ( predefined theme ) if have
		$eb_page_sections_config_db_path = WPEB_PLUGIN_CONFIG . 'custom/eb_page_sections_config_db.json';
		$eb_page_sections_config_db = file_exists( $eb_page_sections_config_db_path ) ? json_decode( file_get_contents( $eb_page_sections_config_db_path ) ) : '';

		if( !empty( $eb_page_sections_config_db ) ) {

			$config_db['tables']['eb_page_sections'] = $eb_page_sections_config_db->tables->eb_page_sections;

		}

		$inserts_db = $config_db !== NULL ? $config_db : array();

	}

	return $inserts_db;

}

?>