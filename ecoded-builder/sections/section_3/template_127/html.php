{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_3_template_127"{{builder}} data-edit="ecode_section_3_template_127"{{/builder}}>
		{{php}}<?php

		if( !empty( $data->title ) ) {

		?>{{/php}}
		<p class="title"{{builder}} data-edit="title"{{/builder}}>{{title}}</p>
		{{php}}<?php

		}

		if( !empty( $data->button_txt ) && !empty( !empty( $data->button_url ) ) ) {

		?>{{/php}}
		<a href="{{button_url}}" class="ecode_button button_secondary"{{builder}} data-edit="button_secondary"{{/builder}}>{{button_txt}}</a>
		{{php}}<?php

		}

		?>{{/php}}
	</section>
</section>
