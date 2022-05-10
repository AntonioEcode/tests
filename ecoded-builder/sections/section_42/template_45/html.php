{{php}}<?php

$current_id = wpeb_get_id();

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
	<section class="ecode_section_42_template_45">
		<section class="ecode_section">
			{{cards_group_loop_start}}<?php

			foreach( $data->cards_group as $card ) {

				$card_counter_pre_text  = $card['card_counter_pre_text'];
				$card_counter_number    = $card['card_counter_number'];
				$card_counter_post_text = $card['card_counter_post_text'];
				$card_counter_title     = $card['card_counter_title'];

			?>{{/cards_group_loop_start}}
			<article class="ecode_article">
				<p class="ecode_number"{{builder}} data-edit="ecode_number"{{/builder}}>{{card_counter_pre_text}}<span class="ecode_counter"{{builder}} data-edit="ecode_counter"{{/builder}}>{{card_counter_number}}</span>{{card_counter_post_text}}</p>
				<p class="ecode_text"{{builder}} data-edit="ecode_text"{{/builder}}>{{card_counter_title}}</p>
			</article>
			{{cards_group_loop_end}}<?php

			}

			?>{{/cards_group_loop_end}}
		</section>
	</section>
	{{php}}<?php

	}

	?>{{/php}}
</section>
