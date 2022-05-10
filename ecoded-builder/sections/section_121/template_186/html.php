{{php}}<?php

$current_id = wpeb_get_id();

// $date = get_the_time( 'Y-m-d', $current_id );
$post_date = get_the_time( get_option( 'date_format' ), $current_id );

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
$image_src = !empty( wp_get_attachment_image_src( $image_id, 'full' )[0] ) ? wp_get_attachment_image_src( $image_id, 'full' )[0] : $image_hd_src;

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	{{php}}<?php

	if( !empty( $image_hd_src ) && !empty( $title ) ) {

	?>{{/php}}
	<section class="ecode_section_121_template_186"{{builder}} data-edit="ecode_section_121_template_186"{{/builder}}>
		<picture>
			<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
			<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
		</picture>
		<div class="ecode_width_121_186">
			<time class="ecode_time"{{builder}} data-edit="ecode_time"{{/builder}}>{{post_date}}</time>
			<h1 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h1>
		</div>
	</section>
	<script type="text/javascript">
		array_s121_t186 = document.getElementsByClassName( 'ecode_section_121_template_186' );
		for (var i = 0; i < array_s121_t186.length; i++) {
			array_articles = array_s121_t186[i].querySelectorAll( '.ecode_width_121_186' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_width_121_186_hide' );
			}
		}
	</script>
	{{php}}<?php

	}

	?>{{/php}}
</section>
