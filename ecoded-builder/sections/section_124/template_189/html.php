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

	if( !empty( $data->first_column_content ) && !empty( $data->second_column_content ) ) {

	?>{{/php}}
	<section class="ecode_section_124_template_189"{{builder}} data-edit="ecode_section_124_template_189"{{/builder}}>
		<div class="ecode_width_124_189">
			<div class="ecode_content">
				{{php}}<?php

				if( !empty( $data->first_column_title ) ) {

				?>{{/php}}
				<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{first_column_title}}</h2>
				{{php}}<?php

				}

				?>{{/php}}
				<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
					{{first_column_content}}
				</div>
			</div>
			<div class="ecode_content">
				{{php}}<?php

				if( !empty( $data->second_column_title ) ) {

				?>{{/php}}
				<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{second_column_title}}</h2>
				{{php}}<?php

				}

				?>{{/php}}
				<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
					{{second_column_content}}
				</div>
			</div>
		</div>
	</section>
	{{php}}<?php

	}

	?>{{/php}}
</section>
