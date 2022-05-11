{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_88_template_104"{{builder}} data-edit="ecode_section_88_template_104"{{/builder}}>
		<div class="ecode_width_88_104">
			<div class="ecode_info">
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

				if( !empty( $data->author ) ) {

				?>{{/php}}
				<p class="ecode_name"{{builder}} data-edit="ecode_name"{{/builder}}>{{author}}</p>
				{{php}}<?php

				}

				if( !empty( $data->job_position ) ) {

				?>{{/php}}
				<p class="ecode_professional_position"{{builder}} data-edit="ecode_professional_position"{{/builder}}>{{job_position}}</p>
				{{php}}<?php

				}

				if( !empty( $data->back_image_src ) ) {

				?>{{/php}}
				<figure class="ecode_signature">
					<img loading="lazy" src="{{back_image_src}}" alt="{{back_image_alt}}">
				</figure>
				{{php}}<?php

				}

				?>{{/php}}
			</div>
			{{php}}<?php

			if( !empty( $data->image_hd_src ) ) {

			?>{{/php}}
			<picture class="ecode_image"{{builder}} data-edit="ecode_image"{{/builder}}>
				<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
				<source media="(min-width:768px)" srcset="{{image_hd_src}}">
				<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
			</picture>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
</section>
