{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

if( !empty( $data->cards_group ) ) {

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_131_template_197"{{builder}} data-edit="ecode_section_131_template_197"{{/builder}}>
		<section class="ecode_section_131_template_197_width">
			{{cards_group_loop_start}}<?php

			foreach( $data->cards_group as $card ) {

				$card_image_id    = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
				$card_image_src   = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
				$card_image_alt   = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
				$card_title       = $card['card_title'];
				$card_subtitle    = $card['card_subtitle'];
				$card_description = $card['card_description'];
				$card_button_text = $card['card_button_text'];
				$card_url         = $card['card_url'];

				// If have specific work / service selected
				$element_id = !empty( $card['work_id'] ) ? $card['work_id'] : '';
				$element_id = ( empty( $element_id ) && !empty( $card['service_id'] ) ) ? $card['service_id'] : $element_id;

				if( !empty( $element_id ) ) {

					$element_title        = get_the_title( $element_id );
					$element_link         = get_permalink( $element_id );
					$element_thumbnail_id = get_post_thumbnail_id( $element_id );

					$card_title = !empty( $card_title ) ? $card_title : $element_title;
					$card_url   = !empty( $card_url ) ? $card_url : $element_link;

					if( empty( $card_image_src ) && !empty( $element_thumbnail_id ) ) {

						$card_image_src = wp_get_attachment_image_src( $element_thumbnail_id, 'large' )[0];
						$card_image_alt = get_post_meta( $element_thumbnail_id, '_wp_attachment_image_alt', TRUE );

					}

				}

				$card_image_alt = !empty( $card_image_alt ) ? $card_image_alt : $card_title;

				if( !empty( $card_image_src ) && !empty( $card_title ) && !empty( $card_url ) ) {

			?>{{/cards_group_loop_start}}
			<article>
				<div class="ecode_article_info">
					{{php}}<?php

					if( !empty( $card_subtitle ) ) {

					?>{{/php}}
					<p class="ecode_article_subtitle"{{builder}} data-edit="ecode_article_subtitle"{{/builder}}>{{card_subtitle}}</p>
					{{php}}<?php

					}

					?>{{/php}}
					<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>
						<a href="{{card_url}}">{{card_title}}</a>
					</h3>
					{{php}}<?php

					if( !empty( $card_description ) ) {

					?>{{/php}}
					<p class="ecode_article_desc"{{builder}} data-edit="ecode_article_desc"{{/builder}}>{{card_description}}</p>
					{{php}}<?php

					}

					if( !empty( $card_button_text ) ) {

					?>{{/php}}
					<span class="ecode_article_read_more ecode_false_link" data-link="h3"{{builder}} data-edit="ecode_article_read_more"{{/builder}}>{{card_button_text}}</span>
					{{php}}<?php

					}

					?>{{/php}}
				</div>
				<figure class="ecode_article_figure ecode_false_link" data-link="h3"{{builder}} data-edit="ecode_article_figure"{{/builder}}>
					<img src="{{card_image_src}}" alt="{{card_image_alt}}">
				</figure>
			</article>
			{{cards_group_loop_end}}<?php

				}

			}

			?>{{/cards_group_loop_end}}
		</section>
	</section>
</section>
{{php}}<?php

}

?>{{/php}}
