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

	if( !empty( $data->title ) && !empty( $data->description ) ) {

	?>{{/php}}
	<section class="ecode_section_125_template_191"{{builder}} data-edit="ecode_section_125_template_191"{{/builder}}>
		<div class="ecode_width_125_191">
			<div class="ecode_content">
				<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
				<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
					{{description}}
				</div>
				{{php}}<?php

				if( !empty( $data->button_text ) && !empty( $data->button_url ) ) {

				?>{{/php}}
				<a href="{{button_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{button_text}}</a>
				{{php}}<?php

				}

				?>{{/php}}
			</div>
		</div>
	</section>
	{{php}}<?php

	}

	?>{{/php}}
</section>
