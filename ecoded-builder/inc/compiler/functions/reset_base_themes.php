<?php

// Function to remove current themes and unzip base themes
function wpeb_reset_base_themes() {

	// Delete /wp-content/themes/ecodetheme
	wpeb_delete_directory_and_files_inside( WPEB_THEME );

	// Unzip base theme
	wpeb_add_base_theme( 'ecodetheme.zip', WP_CONTENT_DIR . '/themes/' );

	// Delete /wp-content/plugins/ecoded_builder/theme
	wpeb_delete_directory_and_files_inside( WPEB_PLUGIN_THEME );

	// Unzip base theme
	wpeb_add_base_theme( 'themeinplugin.zip', WPEB_PLUGIN_DIR . '/' );

}

// Function to remove a directory and files inside it
function wpeb_delete_directory_and_files_inside( $dir_path ) {

	if( file_exists( $dir_path ) && is_dir( $dir_path ) ) {

		$it = new RecursiveDirectoryIterator( $dir_path, RecursiveDirectoryIterator::SKIP_DOTS );
		$files = new RecursiveIteratorIterator( $it, RecursiveIteratorIterator::CHILD_FIRST );

		foreach( $files as $file ) {

			if( $file->isDir() ) {

				rmdir( $file->getRealPath() );

			} else {

				unlink( $file->getRealPath() );

			}

		}

		rmdir( $dir_path );

	}

}

// Function to add again base themes
function wpeb_add_base_theme( $file, $extract_in ) {

	if( !file_exists( $extract_in . $file ) && !is_dir( $extract_in . $file ) ) {

		$zip = new ZipArchive;
		$res = $zip->open( WPEB_PLUGIN_CONFIG . $file );

		if( $res === TRUE ) {

			for( $i = 0; $i < $zip->numFiles; $i++ ) {

				$zip->extractTo( $extract_in );

			}

			$zip->close();

		}

		ecode_rmdir( $extract_in . '__MACOSX' );

	}

}

?>