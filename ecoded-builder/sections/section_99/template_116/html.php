{{php}}<?php

$current_id = wpeb_get_id();
$page_title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	{{php}}<?php

	if( !empty( $data->cards_group ) ) {

	?>{{/php}}
	<section class="ecode_section_99_template_116"{{builder}} data-edit="ecode_section_99_template_116"{{/builder}}>
		<div class="ecode_width_99_116">
			{{cards_group_loop_start}}<?php

			foreach( $data->cards_group as $card ) {

				$card_counter_number = $card['card_counter_number'];
				$card_title          = $card['card_title'];
				$card_description    = $card['card_description'];

				$card_image_id       = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
				$card_image_src      = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
				$card_image_alt      = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
				$card_image_alt      = !empty( $card_image_alt ) ? $card_image_alt : $card_title;
				$card_image_alt      = !empty( $card_image_alt ) ? $card_image_alt : $page_title;

				$card_description = apply_filters( 'the_content', $card_description );

				if( !empty( $card_counter_number ) ) {

			?>{{/cards_group_loop_start}}
			<article class="ecode_article">
				{{php}}<?php

				if( !empty( $card_image_src ) ) {

				?>{{/php}}
				<figure class="ecode_article_figure"{{builder}} data-edit="ecode_article_figure"{{/builder}}>
					<img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}">
				</figure>
				{{php}}<?php

				}

				?>{{/php}}
				<span class="ecode_article_counter"{{builder}} data-edit="ecode_article_counter"{{/builder}}>{{card_counter_number}}</span>
				{{php}}<?php

				if( !empty( $card_title ) ) {

				?>{{/php}}
				<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>{{card_title}}</h3>
				{{php}}<?php

				}

				if( !empty( $card_description ) ) {

				?>{{/php}}
				<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
					{{card_description}}
				</div>
				{{php}}<?php

				}

				?>{{/php}}
			</article>
			{{cards_group_loop_end}}<?php

				}

			}

			?>{{/cards_group_loop_end}}
		</div>
	</section>
	{{php}}<?php

	}

	?>{{/php}}
</section>
