{{php}}<?php

$comments_number = get_comments_number();
$copy_comments   = $comments_number . ' ' . __( 'comentarios', 'frontecode' );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_123_template_188"{{builder}} data-edit="ecode_section_123_template_188"{{/builder}}>
		<div class="ecode_width_123_188">
			<span class="ecode_line"><i><svg width="48px" height="50px" viewBox="0 0 48 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-92.000000, -10.000000)" fill="#e0e0e0"><g transform="translate(91.000000, 10.000000)"><path d="M47.5227273,31.4431818 L36.3636364,25 L47.5227273,18.5568182 C48.6090909,17.9295455 48.9818182,16.5386364 48.3545455,15.4522727 L44.9454545,9.54772727 C44.3181818,8.46136364 42.9295455,8.08863636 41.8409091,8.71590909 L30.6818182,15.1590909 L30.6818182,2.27272727 C30.6818182,1.01818182 29.6636364,0 28.4090909,0 L21.5909091,0 C20.3363636,0 19.3181818,1.01818182 19.3181818,2.27272727 L19.3181818,15.1590909 L8.15909091,8.71590909 C7.07045455,8.08863636 5.68181818,8.46136364 5.05454545,9.54772727 L1.64545455,15.4522727 C1.01818182,16.5386364 1.38863636,17.9295455 2.47727273,18.5568182 L13.6363636,25 L2.47727273,31.4431818 C1.39090909,32.0704545 1.01818182,33.4613636 1.64545455,34.5477273 L5.05454545,40.4522727 C5.68181818,41.5386364 7.07272727,41.9113636 8.15909091,41.2840909 L19.3181818,34.8409091 L19.3181818,47.7272727 C19.3181818,48.9818182 20.3363636,50 21.5909091,50 L28.4090909,50 C29.6636364,50 30.6818182,48.9818182 30.6818182,47.7272727 L30.6818182,34.8409091 L41.8409091,41.2840909 C42.9272727,41.9113636 44.3181818,41.5386364 44.9454545,40.4522727 L48.3545455,34.5477273 C48.9818182,33.4613636 48.6113636,32.0704545 47.5227273,31.4431818 Z"></path></g></g></g></svg></i></span>
			<section class="ecode_blog_comments">
				<p class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{copy_comments}}</p>
				<section class="comments">
					{{php}}<?php

					comments_template();

					?>{{/php}}
					{{builder}}{{comments_content}}{{/builder}}
				</section>
			</section>
		</div>
	</section>
</section>
