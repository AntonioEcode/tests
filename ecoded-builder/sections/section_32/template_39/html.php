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

	if( !empty( $data->section_content_1 ) || !empty( $data->section_content_2 ) ) {

	?>{{/php}}
	<section class="ecode_section_32_template_39">
		<div class="ecode_container_width">
			<div class="ecode_container_content">
				{{php}}<?php

				if( !empty( $data->section_content_1 ) ) {

				?>{{/php}}
				{{section_content_1}}
				{{php}}<?php

				}

				?>{{/php}}
			</div>
			<div class="ecode_container_content">
				{{php}}<?php

				if( !empty( $data->section_content_2 ) ) {

				?>{{/php}}
				{{section_content_2}}
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