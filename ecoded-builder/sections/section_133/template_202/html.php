{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_133_template_202"{{builder}} data-edit="ecode_section_133_template_202"{{/builder}}>
		<div class="ecode_width_133_202">
			<div class="ecode_info">
				{{php}}<?php

				if( !empty( $data->image_hd_src ) ) {

				?>{{/php}}
				<picture class="ecode_info_image"{{builder}} data-edit="ecode_info_image"{{/builder}}>
					<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
					<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
				</picture>
				{{php}}<?php

				}

				?>{{/php}}
				<div class="ecode_description"{{builder}} data-edit="ecode_description"{{/builder}}>
					{{php}}<?php

					if( !empty( $data->title ) ) {

					?>{{/php}}
					<h3 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h3>
					{{php}}<?php

					}

					if( !empty( $data->description ) ) {

					?>{{/php}}
					<p class="ecode_text"{{builder}} data-edit="ecode_text"{{/builder}}>{{description}}</p>
					{{php}}<?php

					}

					if( !empty( $data->tag ) ) {

					?>{{/php}}
					<span class="ecode_price"{{builder}} data-edit="ecode_price"{{/builder}}>{{tag}}</span>
					{{php}}<?php

					}

					if( !empty( $data->button_text ) && !empty( $data->button_url ) ) {

					?>{{/php}}
					<a href="{{button_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>
						{{php}}<?php

						if( !empty( $data->button_svg_icon ) ) {

						?>{{/php}}
						<i>{{button_svg_icon}}</i>
						{{php}}<?php

						}

						?>{{/php}}
						{{button_text}}
					</a>
					{{php}}<?php

					}

					?>{{/php}}
				</div>
			</div>
			<div class="ecode_additional">
				{{php}}<?php

				if( !empty( $data->additional_description ) ) {

				?>{{/php}}
				<div class="ecode_additional_desc">
					{{php}}<?php

					if( !empty( $data->additional_title ) ) {

					?>{{/php}}
					<h3 class="ecode_additional_title"{{builder}} data-edit="ecode_additional_title"{{/builder}}>{{additional_title}}</h3>
					{{php}}<?php

					}

					?>{{/php}}
					<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
						{{additional_description}}
					</div>
				</div>
				{{php}}<?php

					}

					if( !empty( $data->cards_group ) ) {

				?>{{/php}}
				<div class="ecode_additional_table">
					<ul>
						{{cards_group_loop_start}}<?php

						foreach( $data->cards_group as $card ) {

							$card_attribute = $card['card_attribute'];
							$card_value  = $card['card_value'];

						?>{{/cards_group_loop_start}}
						<li>
							{{php}}<?php

							if( !empty( $card_attribute ) ) {

							?>{{/php}}
							<p class="ecode_additional_row">{{card_attribute}}</p>
							{{php}}<?php

							}

							if( !empty( $card_value ) ) {

							?>{{/php}}
							<p class="ecode_additional_row">{{card_value}}</p>
							{{php}}<?php

							}

							?>{{/php}}
						</li>
						{{cards_group_loop_end}}<?php

						}

						?>{{/cards_group_loop_end}}
					</ul>
				</div>
				{{php}}<?php

				}

				?>{{/php}}
			</div>
		</div>
	</section>
</section>
