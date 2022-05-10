<?php

// Creating the widget
class widget_ecoded_menu_links extends WP_Widget {

    function __construct() {

        parent::__construct(

            // Base ID of your widget
            'ecoded_menu_links',

            // Widget name will appear in UI
            __( 'Ecoded - Enlaces destacados', 'WordPressAdmin' ),

            // Widget description
            array( 'description' => __( 'Añada los enlaces desde Ajustes Globales > Gestionar menús > Seleccione el "Menú sidebar"', 'WordPressAdmin' ), )

        );

    }

    // Creating widget front-end
    public function widget( $args, $instance ) {

        $return_sidebar = '';

		$title = !empty( $instance['title'] ) ? $instance['title'] : __( 'Enlaces destacados', 'frontecode' );

		$menu_nav = wp_nav_menu(
			array(
				'theme_location' => 'menu_sidebar',
				'items_wrap' => '<ul>%3$s</ul>',
				'menu_class' => 'ul_main_menu',
				'menu_id' => 'ul_main_menu',
				'echo' => FALSE,
				'walker' => new Walker_Nav_Main_Menu,
			)
		);

		$return_sidebar .= '<section class="ecode_sidebar ecode_sidebar_tags">';
			$return_sidebar .= '<h3 class="ecode_sidebar_title">' . $title . '</h3>';
			$return_sidebar .= $menu_nav;
		$return_sidebar .= '</section>';

        echo $return_sidebar;

    }

	// Widget Backend
	public function form( $instance ) {

		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';

		$info = __( 'Puedes modificar los enlaces destacados desde la gestión de menús', 'WordPressAdmin' );
		$info .= '<a href="' . get_site_url( NULL, '/wp-admin/nav-menus.php?action=edit&menu=4' ) . '">';
		$info .= ' ' . __( 'aquí', 'WordPressAdmin' );
		$info .= '</a>.';

		// Widget admin form
		?>
		<br><p><?php echo $info; ?></p><br>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __( 'Título', 'WordPressAdmin' ) . ':'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p><br>
		<?php

	}

	// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {

        $instance = array();

        $instance['title'] = !empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';

        // Clear cache.
        if( function_exists( 'rocket_clean_domain' ) ) {

        	rocket_clean_domain();

        }

        return $instance;

    }

} // Class widget_ecoded_featured_posts ends here

?>
