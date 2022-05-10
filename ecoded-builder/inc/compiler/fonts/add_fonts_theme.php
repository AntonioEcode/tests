<?php

function wpeb_add_fonts_theme() {

    $wpeb_primary_typography = get_option( 'wpeb_primary_typography' );
    $wpeb_secondary_typography = get_option( 'wpeb_secondary_typography' );

    $defaults_fonts_names = array(
        '.woff',
        '.woff2',
    );

    $array_fonts_to_copy = array();

    foreach( $defaults_fonts_names as $default_font_name ) {

        array_push( $array_fonts_to_copy, $wpeb_primary_typography . $default_font_name );
        array_push( $array_fonts_to_copy, $wpeb_secondary_typography . $default_font_name );

    }

    foreach( scandir( WPEB_PLUGIN_FONTS_BACK ) as $font_path ) {

        if( in_array( $font_path, $array_fonts_to_copy )  ) {

            $source = WPEB_PLUGIN_FONTS_BACK . $font_path;
            $destination = WPEB_THEME . 'fonts/' . $font_path;

            copy( $source, $destination );

        }

    }

}

?>
