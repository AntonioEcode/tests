{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_5_template_131"{{builder}} data-edit="ecode_section_5_template_131 .circles"{{/builder}}>
		<span class="circles circle_bottom"></span>
		{{php}}<?php

		if( !empty( $data->background_image_hd_src ) || !empty( $data->background_image_src ) ) {

		?>{{/php}}
		<picture class="img_back"{{builder}} data-edit-center-left="img_back::after"{{/builder}}>
			{{php}}<?php

			if( !empty( $data->background_image_hd_src ) ) {

			?>{{/php}}
			<source media="(min-width:1024px)" srcset="{{background_image_hd_src}}">
			<source media="(min-width:768px)" srcset="{{background_image_hd_src}}">
			{{php}}<?php

			}

			if( !empty( $data->background_image_src ) ) {

			?>{{/php}}
			<img loading="lazy" src="{{background_image_src}}" alt="{{background_image_alt}}">
			{{php}}<?php

			}

			?>{{/php}}
		</picture>
		{{php}}<?php

		}

		if( !empty( $data->cards_group ) ) {

		?>{{/php}}
		<section class="ecode_section_5_131">
			{{cards_group_loop_start}}<?php

			foreach( $data->cards_group as $card ) {

				$card_counter_title  = $card['card_counter_title'];
				$card_svg_icon       = $card['card_svg_icon'];
				$card_image_id       = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
				$card_image_src      = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
				$card_image_alt      = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
				$card_image_alt     = !empty( $card_image_alt ) ? $card_image_alt : $card_counter_title;
				$card_counter_number = $card['card_counter_number'];


			?>{{/cards_group_loop_start}}
			<article class="article">
				{{php}}<?php

				if( !empty( $card_svg_icon ) || !empty( $card_image_src ) ) {

					if( !empty( $card_svg_icon ) ) {

				?>
				<i class="ecode_article_image">
					{{card_svg_icon}}
				</i>
				<?php

					} else {

				?>
				<figure class="ecode_article_image">
					<img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}">
				</figure>
				<?php

					}

				}

				?>{{/php}}
				{{builder}}{{card_svg_icon}}{{/builder}}
				{{php}}<?php

				if( !empty( $card_counter_number ) ) {

				?>{{/php}}
				<span class="counter number"{{builder}} data-edit="number"{{/builder}}>{{card_counter_number}}</span>
				{{php}}<?php

				}

				if( !empty( $card_counter_title ) ) {

				?>{{/php}}
				<p class="text"{{builder}} data-edit="text"{{/builder}}>{{card_counter_title}}</p>
				{{php}}<?php

				}

				?>{{/php}}
			</article>
			{{cards_group_loop_end}}<?php

			}

			?>{{/cards_group_loop_end}}
		</section>
		{{php}}<?php

		}

		?>{{/php}}
	</section>
</section>
