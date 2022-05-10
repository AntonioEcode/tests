{{php}}<?php

$copy_comments   = __( 'Comentarios', 'frontecode' );
$copy_comments_2 = ' ' . __( 'de los usuarios', 'frontecode' );

?>{{/php}}
<section id="page_section_{{page_section_id}}" {{builder}}class="page_section"{{/builder}}>
	<section class="ecode_section_21_template_26">
		<section class="ecode_blog_comments">
			<h3 class="ecode_title_comments"{{builder}} data-edit="ecode_title_comments"{{/builder}}><span>{{copy_comments}}</span>{{copy_comments_2}}</h3>
			<section class="ecode_comments">
				{{php}}<?php

				comments_template();

				?>{{/php}}
				{{builder}}{{comments_content}}{{/builder}}
			</section>
		</section>
	</section>
</section>