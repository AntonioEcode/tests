{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_24_template_29"{{builder}} data-edit="ecode_section_24_template_29"{{/builder}}>
		{{php}}<?php

		if( !empty( $data->image_hd_src ) && !empty( $data->image_src ) ) {

		?>{{/php}}
		<figure class="ecode_image_back">
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
		</figure>
		{{php}}<?php

		}

		?>{{/php}}
		<div class="ecode_width">
			{{php}}<?php

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<p class="ecode_text"{{builder}} data-edit="ecode_text"{{/builder}}>{{title}}</p>
			{{php}}<?php

			}

			if( !empty( $data->button_txt ) && !empty( $data->button_url ) ) {

			?>{{/php}}
			<a href="{{button_url}}" class="ecode_button ecode_button_border_white"{{builder}} data-edit="ecode_button_border_white"{{/builder}}>{{button_txt}}</a>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
</section>
