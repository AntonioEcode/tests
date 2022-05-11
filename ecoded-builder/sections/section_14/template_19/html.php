{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

if( !empty( $data->anchors_content ) ) {

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_14_template_19">
		<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
			{{php}}{{anchors_content}}{{/php}}{{builder}}{{anchors_content_demo}}{{/builder}}
		</div>
		<div class="ecode_container_content_headers"></div>
	</section>
</section>
{{php}}<?php

}

?>{{/php}}
