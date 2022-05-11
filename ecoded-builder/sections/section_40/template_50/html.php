{{php}}<?php

$comments_number = get_comments_number();
$copy_comments   = __( 'Comentarios', 'frontecode' );

?>{{/php}}
<section id="page_section_{{page_section_id}}" {{builder}}class="page_section"{{/builder}}>
	<section class="ecode_section_40_template_50">
		<section class="blog_comments">
			<div class="ecode_comments_total">
				<span class="ecode_comments_total_number">{{comments_number}}</span>
				<p class="ecode_comments_total_text">{{copy_comments}}</p>
			</div>
			<section class="comments">
				{{php}}<?php

				comments_template();

				?>{{/php}}
				{{builder}}{{comments_content}}{{/builder}}
			</section>
		</section>
	</section>
</section>