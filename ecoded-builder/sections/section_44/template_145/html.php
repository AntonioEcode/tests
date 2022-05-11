{{php}}<?php

$current_id = wpeb_get_id();

$title = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );

if( empty( $title ) ) {

	$title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

}

$subtitle = get_post_meta( $current_id, '_{{template_name}}_subtitle_{{page_section_id}}', TRUE );

$button_text = get_post_meta( $current_id, '_{{template_name}}_button_text_{{page_section_id}}', TRUE );
$button_url  = get_post_meta( $current_id, '_{{template_name}}_button_url_{{page_section_id}}', TRUE );

$image_hd     = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}', TRUE );
$image_hd_id  = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}_id', TRUE );
$image_hd_id  = empty( $image_hd_id ) ? attachment_url_to_postid( $image_hd ) : $image_hd_id;
$image_hd_src = wp_get_attachment_image_src( $image_hd_id, 'full' )[0];
$image_alt    = !empty( get_post_meta( $image_hd_id, '_wp_attachment_image_alt', TRUE ) ) ? get_post_meta( $image_hd_id, '_wp_attachment_image_alt', TRUE ) : $title;

$image     = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}', TRUE );
$image_id  = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}_id', TRUE );
$image_id  = empty( $image_id ) ? attachment_url_to_postid( $image ) : $image_id;
$image_src = wp_get_attachment_image_src( $image_id, 'full' )[0];

?>{{/php}}
<section id="page_section_{{page_section_id}}" {{builder}}class="page_section"{{/builder}}>
	<section class="ecode_section_44_template_145">
		<picture class="ecode_image_back"{{builder}} data-edit="ecode_image_back::after"{{/builder}}>
			{{php}}<?php

			if( !empty( $image_hd_src ) ) {

			?>{{/php}}
			<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
			{{php}}<?php

			}

			if( !empty( $image_src ) ) {

			?>{{/php}}
			<img src="{{image_src}}" alt="{{image_alt}}">
			{{php}}<?php

			}

			?>{{/php}}
		</picture>
		<div class="section_width">
			<h1 id="ecode_section_44_template_145_title" class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h1>
			{{php}}<?php

			if( !empty( $subtitle ) ) {

			?>{{/php}}
			<p class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{subtitle}}</p>
			{{php}}<?php

			}

			if( !empty( $button_url ) && !empty( $button_text ) ) {

			?>{{/php}}
			<a href="{{button_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{button_text}}</a>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
	<script type="text/javascript">
	array_s44_t145 = document.getElementsByClassName( 'ecode_section_44_template_145' );
	for (var i = 0; i < array_s44_t145.length; i++) {
		array_articles = array_s44_t145[i].querySelectorAll( '.section_width' );
		for (var j = 0; j < array_articles.length; j++) {
			array_articles[j].classList.add( 'section_width_hide' );
		}
	}
	</script>
</section>
