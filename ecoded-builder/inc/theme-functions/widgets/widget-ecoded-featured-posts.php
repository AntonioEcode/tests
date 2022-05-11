<?php

// Creating the widget
class widget_ecoded_featured_posts extends WP_Widget {

    function __construct() {

        parent::__construct(

            // Base ID of your widget
            'ecoded_featured_posts',

            // Widget name will appear in UI
            __( 'Ecoded - Posts destacados con imagen', 'WordPressAdmin' ),

            // Widget description
            array( 'description' => __( 'Seleccione los posts destacados', 'WordPressAdmin' ), )

        );

    }

    // Creating widget front-end
    public function widget( $args, $instance ) {

        $return_sidebar = '';
		$posts_ids = NULL;

		// First get posts assigned in the post
		$queried_object = get_queried_object();
		$post_id = $queried_object->ID;
		$post_type = get_post_type( $post_id );

		// Get mate_key prefix
		$meta_key_prefix = $post_type == 'post' ? '_post_' : '_home_';
		$sidebars_widgets_key = $post_type == 'post' ? 'ecoded_sidebar_posts' : 'ecoded_sidebar_blog';


		// Get sidebars data
		$sidebars_widgets = get_option( 'sidebars_widgets', array() );

		$ecoded_featured_posts_cont = 1;
		$ecoded_featured_posts_key = 1;

		// Get specific key for meta_key field. Used to identify the widget when more than one widget is the same.
		foreach( $sidebars_widgets[$sidebars_widgets_key] as $widget ) {

			// Check if is the current widget to get the key
			if( $widget == $args['widget_id'] ) {

				$ecoded_featured_posts_key = $ecoded_featured_posts_cont;

			}

			$ecoded_featured_posts_cont++;

		}

		$title = get_post_meta( $post_id, $meta_key_prefix . 'title_' . $ecoded_featured_posts_key, TRUE );

		$title = !empty( $title ) ? $title : ( !empty( $instance['title'] ) ? $instance['title'] : __( 'Posts destacados', 'frontecode' ) );

		$posts_ids_string = get_post_meta( $post_id, $meta_key_prefix . 'custom_sidebar_img_posts_hidden_' . $ecoded_featured_posts_key, TRUE );

		// Check if have custom related posts else, get from widget
		if( empty( $posts_ids_string ) ) {

			if( !empty( $instance['posts_ids'] ) ) {

				$posts_ids = explode( ',', $instance['posts_ids'] );

			}

		} else {

			$posts_ids = explode( ',', $posts_ids_string );

		}

        if( !empty( $posts_ids ) ) {

			$return_sidebar .= '<section class="ecode_sidebar ecode_sidebar_posts">';
			$return_sidebar .= '<h3 class="ecode_sidebar_title">' . $title . '</h3>';

			foreach( $posts_ids as $post_id ) {

				$post_title = get_the_title( $post_id );
				$post_link = get_permalink( $post_id );
				$post_date = get_the_date( 'd F, Y', $post_id );

				$thumbnail_url = default_image_post( 'url' );
				$thumbnail_alt = $post_title;
				$thumbnail_id = get_post_thumbnail_id( $post_id );

				if( !empty( $thumbnail_id ) ) {

					$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail' )[0];
					$thumbnail_alt = !empty( get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', TRUE ) ) ? get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', TRUE ) : $thumbnail_alt;

				}

				$return_sidebar .= '<article>';
					$return_sidebar .= '<figure class="false_link" data-link="h3">';
						$return_sidebar .= '<img loading="lazy" src="' . $thumbnail_url . '" alt="' . $thumbnail_alt . '">';
					$return_sidebar .= '</figure>';
					$return_sidebar .= '<h3><a href="' . $post_link . '">' . $post_title . '</a></h3>';
					$return_sidebar .= '<time>' . $post_date . '</time>';
				$return_sidebar .= '</article>';

			}

			$return_sidebar .= '</section>';

        }

        echo $return_sidebar;

    }

    // Widget Backend
    public function form( $instance ) {

		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';

		$posts_ids = isset( $instance[ 'posts_ids' ] ) ? $instance[ 'posts_ids' ] : '';
        $get_field_id = $this->get_field_id( 'posts_ids' );

    // Widget admin form
    ?>
	<br><p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __( 'Título', 'WordPressAdmin' ) . ':'; ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
	</p>
    <p>
		<input id="<?php echo $get_field_id; ?>" name="<?php echo $this->get_field_name( 'posts_ids' ); ?>" type="hidden" value="<?php echo $posts_ids; ?>">
    </p>
    <?php

		$array_posts_ids = array();

		if( !empty( $posts_ids ) ) {

			$array_posts_ids = explode( ',', $posts_ids );

		}

		echo wpeb_get_featured_posts_widget( $array_posts_ids, $get_field_id );

    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {

        $instance = array();

		$instance['title'] = !empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['posts_ids'] = !empty( $new_instance['posts_ids'] ) ? strip_tags( $new_instance['posts_ids'] ) : '';

        // Clear cache.
        if( function_exists( 'rocket_clean_domain' ) ) {

        	rocket_clean_domain();

        }

        return $instance;

    }

} // Class widget_ecoded_featured_posts ends here

?>
