{{php}}<?php

$current_id = wpeb_get_id();
$page_title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

if( !empty( $data->cards_group ) ) {

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_86_template_102">
		{{cards_group_loop_start}}<?php

		foreach( $data->cards_group as $card ) {

			$content_alignment = !empty( $card['content_alignment'] ) ? $card['content_alignment'] : '';
			$card_title        = $card['card_title'];
			$card_description  = $card['card_description'];
			$card_button_text  = $card['card_button_text'];
			$card_button_url   = $card['card_button_url'];

			$card_image_id  = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
			$card_image_src = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
			$card_image_alt = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
			$card_image_alt = !empty( $card_image_alt ) ? $card_image_alt : $card_title;
			$card_image_alt = !empty( $card_image_alt ) ? $card_image_alt : $page_title;

			$card_image_desktop_id  = empty( $card['card_image_desktop_id'] ) ? attachment_url_to_postid( $card['card_image_desktop'] ) : $card['card_image_desktop_id'];
			$card_image_desktop_src = wp_get_attachment_image_src( $card_image_desktop_id, 'full' )[0];

			$card_image_desktop_hd_id  = empty( $card['card_image_desktop_hd_id'] ) ? attachment_url_to_postid( $card['card_image_desktop_hd'] ) : $card['card_image_desktop_hd_id'];
			$card_image_desktop_hd_src = wp_get_attachment_image_src( $card_image_desktop_hd_id, 'full' )[0];

			$card_description = apply_filters( 'the_content', $card_description );

			if( !empty( $card_image_src ) || !empty( $card_title ) || !empty( $card_description ) || ( !empty( $card_button_text ) && !empty( $card_button_url ) ) ) {

		?>{{/cards_group_loop_start}}
		<article class="ecode_article {{content_alignment}}">
			{{php}}<?php

			if( !empty( $card_image_src ) ) {

			?>{{/php}}
			<picture class="ecode_article_picture"{{builder}} data-edit="ecode_article_picture"{{/builder}}>
				<source media="(min-width:1441px)" srcset="{{card_image_desktop_hd_src}}">
				<source media="(min-width:768px)" srcset="{{card_image_desktop_src}}">
				<img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}">
			</picture>
			{{php}}<?php

			}

			?>{{/php}}
			<div class="ecode_article_info"{{builder}} data-edit="ecode_article_info"{{/builder}}>
				{{php}}<?php

				if( !empty( $card_title ) ) {

				?>{{/php}}
				<h2 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>{{card_title}}</h2>
				{{php}}<?php

				}

				if( !empty( $card_description ) ) {

				?>{{/php}}
				<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
					{{card_description}}
				</div>
				{{php}}<?php

				}

				if( !empty( $card_button_text ) && !empty( $card_button_url ) ) {

				?>{{/php}}
				<a href="{{card_button_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{card_button_text}}<i{{builder}} data-edit="ecode_button i"{{/builder}}><svg width="29px" height="50px" viewBox="0 0 29 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-230.000000, -20.000000)" fill="#333333"><g transform="translate(230.000000, 20.000000)"><path d="M27.4824115,27.4659292 L5.99048673,48.9571903 C4.62334071,50.325 2.40674779,50.325 1.04026549,48.9571903 C-0.326327434,47.5905973 -0.326327434,45.374115 1.04026549,44.0076327 L20.0573009,24.9911504 L1.04081858,5.97533186 C-0.325774336,4.60818584 -0.325774336,2.39192478 1.04081858,1.02533186 C2.4074115,-0.341814159 4.62389381,-0.341814159 5.99103982,1.02533186 L27.4829646,22.5169248 C28.1662611,23.2005531 28.5075221,24.0955752 28.5075221,24.9910398 C28.5075221,25.8869469 28.1655973,26.7826327 27.4824115,27.4659292 Z"></path></g></g></g></svg></i></a>
				{{php}}<?php

				}

				?>{{/php}}
			</div>
		</article>
		{{cards_group_loop_end}}<?php

			}

		}

		?>{{/cards_group_loop_end}}
	</section>
	<script type="text/javascript">
		array_s86_t102 = document.getElementsByClassName( 'ecode_section_86_template_102' );
		for (var i = 0; i < array_s86_t102.length; i++) {
			array_articles = array_s86_t102[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
{{php}}<?php

}

?>{{/php}}
