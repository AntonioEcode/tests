{{php}}<?php

$current_id = wpeb_get_id();

$title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

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

?>{{/php}}
<section id="page_section_{{page_section_id}}" {{builder}}class="page_section"{{/builder}}>
	<section class="ecode_section_51_template_59">
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
		<div class="section_width">
			{{php}}<?php

			if( !empty( $title ) ) {

			?>{{/php}}
			<h1 id="ecode_section_51_template_59_title" class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h1>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
	<script type="text/javascript">
	array_s51_t59 = document.getElementsByClassName( 'ecode_section_51_template_59' );
	for (var i = 0; i < array_s51_t59.length; i++) {
		array_articles = array_s51_t59[i].querySelectorAll( '.section_width' );
		for (var j = 0; j < array_articles.length; j++) {
			array_articles[j].classList.add( 'section_width_hide' );
		}
	}
	</script>
</section>
