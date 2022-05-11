{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_15_template_20">
		{{php}}<?php

		if( !empty( $data->title ) ) {

		?>{{/php}}
		<h3 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h3>
		{{php}}<?php

		}

		if( !empty( $data->description ) ) {

		?>{{/php}}
		<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
			{{description}}
		</div>
		{{php}}<?php

		}

		?>{{/php}}
		<picture class="ecode_image"{{builder}} data-edit="ecode_image"{{/builder}}>
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
		</picture>
	</section>
	<script type="text/javascript">
		array_s15_t20 = document.getElementsByClassName( 'ecode_section_15_template_20' );
		for (var i = 0; i < array_s15_t20.length; i++) {
			array_s15_t20[i].classList.add( 'ecode_section_15_template_20_hide' );
		}
	</script>
</section>
