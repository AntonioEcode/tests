{{php}}<?php

$current_id = wpeb_get_id();

$title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}" {{builder}}class="page_section"{{/builder}}>
	<section class="ecode_section_2_template_4"{{builder}} data-edit="ecode_section_2_template_4"{{/builder}}>
		<div class="content_width">
			{{php}}<?php

			if( !empty( $title ) ) {

			?>{{/php}}
			<h1 class="title"{{builder}} data-edit="title"{{/builder}}>{{title}}</h1>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
</section>
