<?php

// Function to get data of section data by page id and section type id
function wpeb_get_section_data_by( $page_id, $section_type_id ) {

    $page_sections = wpeb_get_page_sections( $page_id );

    if( !empty( $page_sections ) ) {

        foreach( $page_sections as $page_section ) {

            if( $page_section->section_type_id == '1' ) {

                $template_id = $page_section->section_template_id;

                // Check if have template selected
                if( !empty( $template_id ) ) {

                    $section_data = wpeb_get_section_by_template_id( $template_id );

                    $path = WPEB_PLUGIN_SECTIONS_BACK;
                    $path .= 'section_' . $section_data->id;
                    $path .= '/template_' . $page_section->section_template_id;
                    $path .= '/config/default_config.json';

                    // Get custom config data
                    $default_config = file_get_contents( $path );
                    $default_config = json_decode( $default_config );

                    if( !empty( $default_config->height_logo ) ) {

                        return __( 'Tamaño recomendado: Alto de ' . $default_config->height_logo, 'ecoded_builder' );

                    }

                }

            }

        }

    }

}

?>
