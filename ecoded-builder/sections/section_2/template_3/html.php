{{php}}<?php

$current_id = wpeb_get_id();

$title    = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );
$subtitle = get_post_meta( $current_id, '_{{template_name}}_subtitle_{{page_section_id}}', TRUE );

$image_hd     = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}', TRUE );
$image_hd_id  = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}_id', TRUE );
$image_hd_id  = empty( $image_hd_id ) ? attachment_url_to_postid( $image_hd ) : $image_hd_id;
$image_hd_src = wp_get_attachment_image_src( $image_hd_id, 'full' )[0];
$image_alt    = get_post_meta( $image_hd_id, '_wp_attachment_image_alt', TRUE );
$image_alt    = !empty( $image_alt ) ? $image_alt : $title;

$image_tablet     = get_post_meta( $current_id, '_{{template_name}}_image_tablet_{{page_section_id}}', TRUE );
$image_tablet_id  = get_post_meta( $current_id, '_{{template_name}}_image_tablet_{{page_section_id}}_id', TRUE );
$image_tablet_id  = empty( $image_tablet_id ) ? attachment_url_to_postid( $image_tablet ) : $image_tablet_id;
$image_tablet_src = !empty( $image_tablet_src = wp_get_attachment_image_src( $image_tablet_id, 'full' )[0] ) ? $image_tablet_src : $image_hd_src;

$image     = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}', TRUE );
$image_id  = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}_id', TRUE );
$image_id  = empty( $image_id ) ? attachment_url_to_postid( $image ) : $image_id;
$image_src = !empty( $image_src = wp_get_attachment_image_src( $image_id, 'full' )[0] ) ? $image_src : $image_hd_src;

?>{{/php}}
<section id="page_section_{{page_section_id}}" {{builder}}class="page_section"{{/builder}}>
	<section class="ecode_section_2_template_3">
		<picture class="img_back"{{builder}} data-edit="img_back::after"{{/builder}}>
			{{php}}<?php

			if( !empty( $image_hd_src ) ) {

			?>{{/php}}
			<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
			<source media="(min-width:768px)" srcset="{{image_tablet_src}}">
			<img src="{{image_src}}" alt="{{image_alt}}">
			{{php}}<?php

			}

			?>{{/php}}
		</picture>
		<div class="content_width">
			{{php}}<?php

			if( !empty( $title ) ) {

			?>{{/php}}
			<h1 id="ecode_section_2_template_3_title" class="title"{{builder}} data-edit="title"{{/builder}}>{{title}}</h1>
			{{php}}<?php

			}

			if( !empty( $subtitle ) ) {

			?>{{/php}}
			<h2 class="subtitle"{{builder}} data-edit="subtitle"{{/builder}}>{{subtitle}}</h2>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
	<script type="text/javascript">
		array_s2_t3 = document.getElementsByClassName( 'ecode_section_2_template_3' );
		for (var i = 0; i < array_s2_t3.length; i++) {
			array_articles = array_s2_t3[i].querySelectorAll( '.content_width' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'content_width_hide' );
			}
		}
	</script>
</section>
