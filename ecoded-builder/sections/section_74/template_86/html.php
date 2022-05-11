{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_74_template_86"{{builder}} data-edit="ecode_section_74_template_86"{{/builder}}>
		{{php}}<?php

		if( !empty( $data->image_hd_src ) ) {

		?>{{/php}}
		<picture>
			{{php}}<?php

			if( !empty( $data->image_hd_src ) ) {

			?>{{/php}}
			<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
			<source media="(min-width:768px)" srcset="{{image_hd_src}}">
			{{php}}<?php

			}

			?>{{/php}}
			<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
		</picture>
		{{php}}<?php

		}

		?>{{/php}}
		<div class="ecode_width_74_86">
			{{php}}<?php

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
			{{php}}<?php

			}

			if( !empty( $data->subtitle ) ) {

			?>{{/php}}
			<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
				{{subtitle}}
			</div>
			{{php}}<?php

			}

			if( !empty( $data->button_title ) && !empty( $data->button_url ) ) {

			?>{{/php}}
			<a href="{{button_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{button_title}}</a>
			{{php}}<?php

			}

			if( !empty( $data->text_below_button ) ) {

			?>{{/php}}
			<p class="ecode_note"{{builder}} data-edit="ecode_note"{{/builder}}>{{text_below_button}}</p>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
</section>
