<?php

// Preload for section_2 template_3
$current_id = wpeb_get_id();

$image_hd_{{page_section_id}}     = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}', TRUE );
$image_hd_id_{{page_section_id}}  = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}_id', TRUE );
$image_hd_id_{{page_section_id}}  = empty( $image_hd_id_{{page_section_id}} ) ? attachment_url_to_postid( $image_hd_{{page_section_id}} ) : $image_hd_id_{{page_section_id}};
$image_hd_src_{{page_section_id}} = wp_get_attachment_image_src( $image_hd_id_{{page_section_id}}, 'full' )[0];

$image_tablet_{{page_section_id}}     = get_post_meta( $current_id, '_{{template_name}}_image_tablet_{{page_section_id}}', TRUE );
$image_tablet_id_{{page_section_id}}  = get_post_meta( $current_id, '_{{template_name}}_image_tablet_{{page_section_id}}_id', TRUE );
$image_tablet_id_{{page_section_id}}  = empty( $image_tablet_id_{{page_section_id}} ) ? attachment_url_to_postid( $image_tablet_{{page_section_id}} ) : $image_tablet_id_{{page_section_id}};
$image_tablet_src_{{page_section_id}} = !empty( $image_tablet_src_{{page_section_id}} = wp_get_attachment_image_src( $image_tablet_id_{{page_section_id}}, 'full' )[0] ) ? $image_tablet_src_{{page_section_id}} : $image_hd_src_{{page_section_id}};

$image_{{page_section_id}}     = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}', TRUE );
$image_id_{{page_section_id}}  = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}_id', TRUE );
$image_id_{{page_section_id}}  = empty( $image_id_{{page_section_id}} ) ? attachment_url_to_postid( $image_{{page_section_id}} ) : $image_id_{{page_section_id}};
$image_src_{{page_section_id}} = !empty( $image_src_{{page_section_id}} = wp_get_attachment_image_src( $image_id_{{page_section_id}}, 'full' )[0] ) ? $image_src_{{page_section_id}} : $image_hd_src_{{page_section_id}};

?>
<link rel="preload" href="<?php echo $image_hd_src_{{page_section_id}}; ?>" as="image" media="(min-width: 1024px)">
<link rel="preload" href="<?php echo $image_tablet_src_{{page_section_id}}; ?>" as="image" media="(min-width: 768px)">
<link rel="preload" href="<?php echo $image_src_{{page_section_id}}; ?>" as="image" media="(max-width: 768px)">