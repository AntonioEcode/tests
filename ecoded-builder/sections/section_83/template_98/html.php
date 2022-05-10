{{php}}<?php

$current_id = wpeb_get_id();
$page_title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$title       = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );
$title       = !empty( $title ) ? $title : $page_title;
$subtitle    = get_post_meta( $current_id, '_{{template_name}}_subtitle_{{page_section_id}}', TRUE );
$button_text = get_post_meta( $current_id, '_{{template_name}}_button_text_{{page_section_id}}', TRUE );
$button_url  = get_post_meta( $current_id, '_{{template_name}}_button_url_{{page_section_id}}', TRUE );

$subtitle = apply_filters( 'the_content', $subtitle );

$img_alignment = get_post_meta( $current_id, '_{{template_name}}_img_alignment_{{page_section_id}}', TRUE );

$img_alignment_class = '';

if( $img_alignment == 'left' ) {

	$img_alignment_class = ' ecode_width_83_98_reverse';

}

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
$image_src = !empty( $image_src ) ? $image_src : $image_hd_src;

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_83_template_98"{{builder}} data-edit="ecode_section_83_template_98"{{/builder}}>
		{{php}}<div class="ecode_width_83_98<?php echo $img_alignment_class; ?>">{{/php}}{{builder}}
		<div class="ecode_width_83_98">{{/builder}}
			<div class="ecode_info">
				<h1 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h1>
				{{php}}<?php

				if( !empty( $subtitle ) ) {

				?>{{/php}}
				<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
					{{subtitle}}
				</div>
				{{php}}<?php

				}

				if( !empty( $button_text ) && !empty( $button_url ) ) {

				?>{{/php}}
				<a href="{{button_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{button_text}}<i{{builder}} data-edit="ecode_button i"{{/builder}}><svg width="29px" height="50px" viewBox="0 0 29 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-230.000000, -20.000000)" fill="#333333"><g transform="translate(230.000000, 20.000000)"><path d="M27.4824115,27.4659292 L5.99048673,48.9571903 C4.62334071,50.325 2.40674779,50.325 1.04026549,48.9571903 C-0.326327434,47.5905973 -0.326327434,45.374115 1.04026549,44.0076327 L20.0573009,24.9911504 L1.04081858,5.97533186 C-0.325774336,4.60818584 -0.325774336,2.39192478 1.04081858,1.02533186 C2.4074115,-0.341814159 4.62389381,-0.341814159 5.99103982,1.02533186 L27.4829646,22.5169248 C28.1662611,23.2005531 28.5075221,24.0955752 28.5075221,24.9910398 C28.5075221,25.8869469 28.1655973,26.7826327 27.4824115,27.4659292 Z"></path></g></g></g></svg></i></a>
				{{php}}<?php

				}

				?>{{/php}}
			</div>
			{{php}}<?php

			if( !empty( $image_hd_src ) ) {

			?>{{/php}}
			<figure class="ecode_figure"{{builder}} data-edit="ecode_figure"{{/builder}}>
				<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
				<source media="(min-width:768px)" srcset="{{image_hd_src}}">
				<img src="{{image_src}}" alt="{{image_alt}}">
			</figure>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
	<script type="text/javascript">
		array_s83_t98 = document.getElementsByClassName( 'ecode_section_83_template_98' );
		for (var i = 0; i < array_s83_t98.length; i++) {
			array_articles = array_s83_t98[i].querySelectorAll( '.ecode_info, .ecode_figure' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_element_hide' );
			}
		}
	</script>
</section>
