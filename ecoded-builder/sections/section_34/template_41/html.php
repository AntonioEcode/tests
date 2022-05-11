{{php}}<?php

$current_id = wpeb_get_id();

$title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}" {{builder}}class="page_section"{{/builder}}>
	<section class="ecode_section_34_template_41">
		{{php}}<?php

		if( !empty( $data->image_hd_src ) && !empty( $data->image_src ) ) {

			if( !empty( $data->map_url ) ) {

		?>{{/php}}
		<a href="{{map_url}}" class="ecode_image" target="_blank">
		{{php}}<?php

			}

		?>{{/php}}
			<picture>
				<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
				<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
			</picture>
		{{php}}<?php

			if( !empty( $data->map_url ) ) {

		?>{{/php}}
		</a>
		{{php}}<?php

			}

		}

		?>{{/php}}
	</section>
</section>
