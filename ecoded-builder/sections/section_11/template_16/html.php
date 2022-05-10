{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_11_template_16">
		<picture class="ecode_img_back"{{builder}} data-edit="ecode_img_back::after"{{/builder}}>
			{{php}}<?php

			if( !empty( $data->image_hd_src ) ) {

			?>{{/php}}
			<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
			<source media="(min-width:768px)" srcset="{{image_hd_src}}">
			{{php}}<?php

			}

			if( !empty( $data->image_src ) ) {

			?>{{/php}}
			<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
			{{php}}<?php

			}

			?>{{/php}}
		</picture>
		<div class="ecode_content_width">
			{{php}}<?php

			if( !empty( $data->title ) && !empty( $data->description ) ) {

			?>{{/php}}
			<div>
				{{php}}<?php

				if( !empty( $data->title ) ) {

				?>{{/php}}
				<h3 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h3>
				{{php}}<?php

				}

				if( !empty( $data->description ) ) {

				?>{{/php}}
				<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
					{{description}}
				</div>
				{{php}}<?php

				}

				?>{{/php}}
			</div>
			{{php}}<?php

			}

			if( !empty( $data->button_title ) && !empty( $data->button_url ) ) {

			?>{{/php}}
			<div>
				<a href="{{button_url}}" class="ecode_button ecode_button_primary"{{builder}} data-edit="ecode_button_primary"{{/builder}}>{{button_title}}</a>
				{{php}}<?php

				if( !empty( $data->text_below_button ) ) {

				?>{{/php}}
				<span class="ecode_note"{{builder}} data-edit="ecode_note"{{/builder}}>{{text_below_button}}</span>
				{{php}}<?php

				}

				?>{{/php}}
			</div>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
</section>
