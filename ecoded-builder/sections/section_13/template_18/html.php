{{php}}<?php

$current_id = wpeb_get_id();

$title       = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );
$description = get_post_meta( $current_id, '_{{template_name}}_description_{{page_section_id}}', TRUE );

$description = apply_filters( 'the_content', $description );

$image_hd     = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}', TRUE );
$image_hd_id  = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}_id', TRUE );
$image_hd_id  = empty( $image_hd_id ) ? attachment_url_to_postid( $image_hd ) : $image_hd_id;
$image_hd_src = wp_get_attachment_image_src( $image_hd_id, 'full' )[0];
$image_alt    = get_post_meta( $image_hd_id, '_wp_attachment_image_alt', TRUE );
$image_alt    = !empty( $image_alt ) ? $image_alt : $title;

$image     = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}', TRUE );
$image_id  = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}_id', TRUE );
$image_id  = empty( $image_id ) ? attachment_url_to_postid( $image ) : $image_id;
$image_src = wp_get_attachment_image_src( $image_id, 'full' )[0];

$contact_form_data = ecode_get_cf7_by_name( 'contact-form-1' );
$contact_form_data = empty( $contact_form_data ) ? ecode_get_cf7_by_name( 'formulario-de-contacto-1' ) : $contact_form_data;

if( !empty( $contact_form_data ) ) {

	$contact_form_shortcode = '[contact-form-7 id="' . $contact_form_data->ID . '" title="' . $contact_form_data->post_title . '"]';
	$contact_form           = do_shortcode( $contact_form_shortcode );

} else {

	$contact_form = __( 'No hay ningún formulario creado', 'frontecode' );

}

?>{{/php}}
<section id="page_section_{{page_section_id}}" {{builder}}class="page_section"{{/builder}}>
	<section class="ecode_section_13_template_18">
		<picture class="ecode_img_back"{{builder}} data-edit="ecode_img_back::after"{{/builder}}>
			{{php}}<?php

			if( !empty( $image_hd_src ) ) {

			?>{{/php}}
			<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
			<source media="(min-width:768px)" srcset="{{image_hd_src}}">
			{{php}}<?php

			}

			if( !empty( $image_src ) ) {

			?>{{/php}}
			<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
			{{php}}<?php

			}

			?>{{/php}}
		</picture>
		{{php}}<?php

		if( !empty( $title ) ) {

		?>{{/php}}
		<h3 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h3>
		{{php}}<?php

		}

		?>{{/php}}
		<div class="ecode_container_form"{{builder}} data-edit="ecode_container_form"{{/builder}}>
			{{php}}<?php

			if( !empty( $description ) ) {

			?>{{/php}}
			<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
				{{description}}
			</div>
			{{php}}<?php

			}

			?>{{/php}}
			{{contact_form}}
		</div>
	</section>
</section>
