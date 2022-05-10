<?php

// Function to get posts of specific post_type
function ecode_get_posts( $post_type, $post_per_page = '-1' ) {

    $return = NULL;

    $args = array(
        'post_status'    => 'publish',
        'post_type'      => $post_type,
        'posts_per_page' => $post_per_page,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $query = new WP_Query( $args );

    if( $query->have_posts() ) {

        while( $query->have_posts() ) {

            $query->the_post();
            $post_id = get_the_ID();
            $post_title = get_the_title();

            $return[$post_id] = $post_title;

        }

    }

    wp_reset_postdata();

    return $return;

}

// Function to get contact form by name
function ecode_get_cf7_by_name( $name ) {

    global $wpdb;

    $return = array();

    $sql = "SELECT ID, post_title
        FROM $wpdb->posts
        WHERE post_type = 'wpcf7_contact_form'
        AND post_name = '" . $name . "'";

    $query = $wpdb->get_row( $sql, OBJECT );

    return !empty( $query ) ? $query : FALSE;

}

// Function to get custom fields of global content
function wpeb_get_fields_by_global_content_id( $global_content_id ) {

    $results = FALSE;

    if( !empty( $global_content_id ) ) {

        global $wpdb;

        // Postmeta table
        $postmeta_table = $wpdb->prefix . 'postmeta';

        // Select query
        $query = "SELECT
            meta_key,
            meta_value
            FROM $postmeta_table
            WHERE post_id = $global_content_id
            AND meta_key LIKE '%_global_%'
            AND meta_key != '_global_section_id'
            AND meta_key != '_global_template_id';";

        $results = $wpdb->get_results( $query, OBJECT );

    }

	return !empty( $results ) ? $results : FALSE;

}

?>