<?php

// Start styles content file ( Theme info and global styles )
function wpeb_get_start_styles() {

	// Theme info
	$styles_start = "/*!\n";
	$styles_start .= "Theme Name:   Ecode PRO Templates\n";
	$styles_start .= "Theme URI:    https://ecodegroup.com/\n";
	$styles_start .= "Author:       Earningcode SLU\n";
	$styles_start .= "Author URI:   https://ecodegroup.com/\n";
	$styles_start .= "Description:  Tema desarollado por el builder de Ecode\n";
	$styles_start .= "Version:      1.0.0\n";
	$styles_start .= "License:      GNU General Public License v2 or later\n";
	$styles_start .= "License URI:  https://www.gnu.org/licenses/gpl-2.0.html\n";
	$styles_start .= "Text Domain:  ecodegroup.com\n";
	$styles_start .= "!*/";

	// Get compile global config styles
	$styles_start .= wpeb_get_compile_global_styles_content();

	// Get style_builder_base.css and add it
	$style_builder_base_file    =  WPEB_PLUGIN_SECTIONS_BACK . 'assets/css/style_builder_base.css';
	$style_builder_base_content = file_exists( $style_builder_base_file ) ? file_get_contents( $style_builder_base_file ) : FALSE;

	if( !empty( $style_builder_base_content ) ) {

		$styles_start .= $style_builder_base_content;

	}

	return $styles_start;

}

?>