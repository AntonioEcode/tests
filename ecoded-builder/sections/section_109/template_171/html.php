{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

if( !empty( $data->image_hd_src ) && !empty( $data->title ) && !empty( $data->url ) ) {

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_109_template_171">
		<picture>
			<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
			<img src="{{image_src}}" alt="{{image_alt}}">
		</picture>
		<h3 class="ecode_title"{{builder}} data-edit="ecode_title a"{{/builder}}><a href="{{url}}">{{title}}</a></h3>
	</section>
</section>
{{php}}<?php

}

?>{{/php}}
