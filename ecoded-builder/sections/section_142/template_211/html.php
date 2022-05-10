{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_142_template_211"{{builder}} data-edit="ecode_section_142_template_211::after"{{/builder}}>
		{{php}}<?php

		if( !empty( $data->background_image_hd_src ) ) {

		?>{{/php}}
		<picture class="ecode_image">
			<source media="(min-width:1440px)" srcset="{{background_image_hd_src}}">
			<source media="(min-width:1024px)" srcset="{{background_image_tablet_src}}">
			<source media="(min-width:768px)" srcset="{{background_image_src}}">
			<img src="{{background_image_src}}" alt="{{background_image_alt}}">
		</picture>
		{{php}}<?php

		}

		if( !empty( $data->cards_group ) ) {

		?>{{/php}}
		<div class="ecode_width_142_211">
			<section class="ecode_articles">
				{{cards_group_loop_start}}<?php

				foreach( $data->cards_group as $card ) {

					$card_svg_icon       = $card['card_svg_icon'];
					$card_counter_number = $card['card_counter_number'];
					$card_counter_title  = $card['card_counter_title'];

				?>{{/cards_group_loop_start}}
				<article class="ecode_article">
					{{php}}<?php

					if( !empty( $card_svg_icon ) ) {

					?>{{/php}}
					<i class="ecode_article_image"{{builder}} data-edit="ecode_article_image"{{/builder}}>
						{{card_svg_icon}}
					</i>
					{{php}}<?php

					}

					if( !empty( $card_counter_number ) ) {

					?>{{/php}}
					<span class="ecode_article_counter"{{builder}} data-edit="ecode_article_counter"{{/builder}}>{{card_counter_number}}</span>
					{{php}}<?php

					}

					if( !empty( $card_counter_title ) ) {

					?>{{/php}}
					<p class="ecode_article_text"{{builder}} data-edit="ecode_article_text"{{/builder}}>{{card_counter_title}}</p>
					{{php}}<?php

					}

					?>{{/php}}
				</article>
				{{cards_group_loop_end}}<?php

				}

				?>{{/cards_group_loop_end}}
			</section>
		</div>
		{{php}}<?php

		}

		?>{{/php}}
	</section>
</section>
