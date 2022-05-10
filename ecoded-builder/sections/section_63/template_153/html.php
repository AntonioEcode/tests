{{php}}<?php

setlocale( LC_ALL, 'es_ES' );

$current_id = wpeb_get_id();

$pretitle      = get_post_meta( $current_id, '_{{template_name}}_pretitle_{{page_section_id}}', TRUE );
$default_title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );
$title         = !empty( $custom_title = get_post_meta( $current_id, '_{{template_name}}_custom_title_{{page_section_id}}', TRUE ) ) ? $custom_title : $default_title;

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



$hide_date_section = get_post_meta( $current_id, '_{{template_name}}_hide_date_section_{{page_section_id}}', TRUE );
$date_section      = '';

if( !$hide_date_section ) {

	$date_section = get_post_meta( $current_id, '_{{template_name}}_date_section_{{page_section_id}}', TRUE );
	$date_section = !empty( $date_section ) ? date( 'j F, Y', strtotime( $date_section ) ) : date( 'j F, Y' );

}

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_63_template_153">
		<section class="ecode_image_title">
			{{php}}<?php

			if( !empty( $image_src ) ) {

			?>{{/php}}
			<picture class="ecode_image"{{builder}} data-edit="ecode_image::after"{{/builder}}>
				{{php}}<?php

				if( !empty( $image_hd_src ) ) {

				?>{{/php}}
				<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
				<source media="(min-width:768px)" srcset="{{image_hd_src}}">
				{{php}}<?php

				}

				?>{{/php}}
				<img src="{{image_src}}" alt="{{image_alt}}">
			</picture>
			{{php}}<?php

			}

			?>{{/php}}
			<section class="ecode_info"{{builder}} data-edit="ecode_info"{{/builder}}>
				{{php}}<?php

				if( !empty( $pretitle ) ) {

				?>{{/php}}
				<span class="ecode_tag"{{builder}} data-edit="ecode_tag"{{/builder}}>{{pretitle}}</span>
				{{php}}<?php

				}

				if( !empty( $title ) ) {

				?>{{/php}}
				<h1 id="ecode_section_63_template_153_title" class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h1>
				{{php}}<?php

				}

				if( !$hide_date_section && !empty( $date_section ) ) {

				?>{{/php}}
				<time class="ecode_date"{{builder}} data-edit="ecode_date"{{/builder}}>{{date_section}}</time>
				{{php}}<?php

				}

				?>{{/php}}
			</section>
		</section>
	</section>
	<script type="text/javascript">
	array_s63_t153 = document.getElementsByClassName( 'ecode_section_63_template_153' );
	for (var i = 0; i < array_s63_t153.length; i++) {
		array_articles = array_s63_t153[i].querySelectorAll( '.ecode_info' );
		for (var j = 0; j < array_articles.length; j++) {
			array_articles[j].classList.add( 'section_hide' );
		}
	}
	</script>
</section>
