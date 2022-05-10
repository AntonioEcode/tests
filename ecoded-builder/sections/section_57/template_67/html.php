{{php}}<?php

setlocale( LC_ALL, 'es_ES' );

$post_id = get_the_ID();
$post    = get_post( $post_id );

$post_content = apply_filters( 'the_content', get_the_content() );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_57_template_67"{{builder}} data-edit="ecode_section_57_template_67"{{/builder}}>
		<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
			{{php}}<?php

			if( !empty( $post_content ) ) {

			?>{{/php}}
			{{post_content}}
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
</section>
