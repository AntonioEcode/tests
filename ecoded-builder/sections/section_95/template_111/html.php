{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_95_template_111"{{builder}} data-edit="ecode_section_95_template_111::after"{{/builder}}>
		{{php}}<?php

		if( !empty( $data->back_image_hd_src ) ) {

		?>{{/php}}
		<picture>
			<source media="(min-width:1024px)" srcset="{{back_image_hd_src}}">
			<source media="(min-width:768px)" srcset="{{back_image_hd_src}}">
			<img loading="lazy" src="{{back_image_src}}" alt="{{back_image_alt}}">
		</picture>
		{{php}}<?php

		}

		if( !empty( $data->cards_group ) ) {

		?>{{/php}}
		<div class="ecode_width_95_111">
			{{cards_group_loop_start}}<?php

			foreach( $data->cards_group as $card ) {

				$card_counter_number = $card['card_counter_number'];
				$card_counter_title  = $card['card_counter_title'];

				if( !empty( $card_counter_number ) ) {

			?>{{/cards_group_loop_start}}
			<article class="ecode_article">
				<p class="ecode_counter"{{builder}} data-edit="ecode_counter"{{/builder}}>{{card_counter_number}}</p>
				{{php}}<?php

				if( !empty( $card_counter_title ) ) {

				?>{{/php}}
				<p class="ecode_text"{{builder}} data-edit="ecode_text"{{/builder}}>{{card_counter_title}}</p>
				{{php}}<?php

				}

				?>{{/php}}
			</article>
			{{cards_group_loop_end}}<?php

				}

			}

			?>{{/cards_group_loop_end}}
		</div>
		{{php}}<?php

		}

		?>{{/php}}
	</section>
</section>
