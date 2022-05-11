{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_136_template_205"{{builder}} data-edit-top-right="ecode_section_136_template_205"{{/builder}}>
		<div class="ecode_width_136_205">
			<section class="ecode_info_content">
				{{php}}<?php

				if( !empty( $data->description ) ) {

				?>{{/php}}
				<p class="ecode_description"{{builder}} data-edit="ecode_description"{{/builder}}>{{description}}</p>
				{{php}}<?php

				}

				if( !empty( $data->image_hd_src ) ) {

				?>{{/php}}
				<picture class="ecode_thumbnail"{{builder}} data-edit="ecode_thumbnail"{{/builder}}>
					<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
					<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
				</picture>
				{{php}}<?php

				}

				if( !empty( $data->content ) ) {

				?>{{/php}}
				<section class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
					{{content}}
				</section>
				{{php}}<?php

				}

				?>{{/php}}
			</section>
		</div>
	</section>
</section>
