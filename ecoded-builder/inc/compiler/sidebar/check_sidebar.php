<?php

function wpeb_check_sidebar( $section_id, $template_id, $section_type_id ) {

	// Detect current sidebar to edit
	$sidebar_id = $section_type_id == 5 ? 'ecoded_sidebar_blog' : ( $section_type_id == 13 ? 'ecoded_sidebar_posts' : NULL );

	// Remove current assigned widgets
	wpeb_remove_current_widgets( $sidebar_id );

	$config_file     = WPEB_PLUGIN_SECTIONS_BACK . 'section_' . $section_id . '/template_' . $template_id . '/config/default_config.json';
	$config_content  = file_exists( $config_file ) ? json_decode( file_get_contents( $config_file ), TRUE ) : NULL;
	$sidebar_content = ( $config_content !== NULL && array_key_exists( 'default_widgets', $config_content ) && !empty( $config_content['default_widgets'] ) ) ? $config_content['default_widgets'] : NULL;

	// If section have sidebar
	if( !empty( $sidebar_content ) ) {

		// Add the widgets from the template to the sidebar
		foreach( $sidebar_content as $widget_id ) {

			wpeb_insert_widget_in_sidebar( $sidebar_id, $widget_id, $widget_data = array() );

		}

	}

}

// Fuction to remove current widgets in a sidebar
function wpeb_remove_current_widgets( $sidebar_id ) {

	if( !empty( $sidebar_id ) ) {

		// Get sidebars data
		$sidebars_widgets = get_option( 'sidebars_widgets', array() );

		// If the sidebar exists and have widgets remove it
		if( array_key_exists( $sidebar_id, $sidebars_widgets ) && !empty( $sidebars_widgets[$sidebar_id] ) ) {

			$sidebars_widgets[$sidebar_id] = array();

			// Update sidebars
			wpeb_update_option( 'sidebars_widgets', $sidebars_widgets );

		}

	}

}

/**
 * Insert a widget in a sidebar.
 * 
 * @param string $widget_id   ID of the widget (search, recent-posts, etc.)
 * @param array $widget_data  Widget settings.
 * @param string $sidebar     ID of the sidebar.
 */
function wpeb_insert_widget_in_sidebar( $sidebar, $widget_id, $widget_data = array() ) {

	// Retrieve sidebars, widgets and their instances
	$sidebars_widgets = get_option( 'sidebars_widgets', array() );
	$widget_instances = get_option( 'widget_' . $widget_id, array() );

	// Retrieve the key of the next widget instance
	$numeric_keys = array_filter( array_keys( $widget_instances ), 'is_int' );
	$instance_key = $numeric_keys ? max( $numeric_keys ) + 1 : 2;

	// Add this widget to the sidebar
	if ( ! isset( $sidebars_widgets[ $sidebar ] ) ) {

		$sidebars_widgets[ $sidebar ] = array();

	}

	$sidebars_widgets[ $sidebar ][] = $widget_id . '-' . $instance_key;

	// Add the new widget instance
	$widget_instances[ $instance_key ] = $widget_data;

	// Store updated sidebars
	wpeb_update_option( 'sidebars_widgets', $sidebars_widgets );

	// Store updated widgets and their instances
	wpeb_update_option( 'widget_' . $widget_id, $widget_instances );

}

?>