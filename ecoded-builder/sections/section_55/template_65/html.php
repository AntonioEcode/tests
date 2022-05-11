{{php}}<?php

$current_id = wpeb_get_id();
$page_title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

if( !empty( $data->pretitle ) || !empty( $data->title ) || !empty( $data->description ) || !empty( $data->cards_group ) ) {

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_55_template_65"{{builder}} data-edit="ecode_section_55_template_65"{{/builder}}>
		<section class="ecode_section_55_template_65_width">
			{{php}}<?php

			if( !empty( $data->pretitle ) ) {

			?>{{/php}}
			<p class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{pretitle}}</p>
			{{php}}<?php

			}

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
			{{php}}<?php

			}

			if( !empty( $data->description ) ) {

			?>{{/php}}
			<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
				{{description}}
			</div>
			{{php}}<?php

			}

			if( !empty( $data->cards_group ) ) {

			?>{{/php}}
			<section>
				{{cards_group_loop_start}}<?php

				foreach( $data->cards_group as $card ) {

					$card_image_id  = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
					$card_image_src = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
					$card_image_alt = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
					$card_image_alt = !empty( $card_image_alt ) ? $card_image_alt : $page_title;

					if( !empty( $card_image_src ) ) {

				?>{{/cards_group_loop_start}}
				<article>
					<figure class="ecode_article_figure"{{builder}} data-edit="ecode_article_figure"{{/builder}}>
						<img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}">
					</figure>
				</article>
				{{cards_group_loop_end}}<?php

					}

				}

				?>{{/cards_group_loop_end}}
			</section>
			{{php}}<?php

			}

			?>{{/php}}
		</section>
	</section>
</section>
{{php}}<?php

}

?>{{/php}}
