{{php}}<?php

$current_id = wpeb_get_id();
$page_title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	{{php}}<?php

	if( !empty( $data->cards_group ) ) {

	?>{{/php}}
	<section class="ecode_section_111_template_174"{{builder}} data-edit="ecode_section_111_template_174"{{/builder}}>
		<div class="ecode_width_111_174">
			{{cards_group_loop_start}}<?php

			foreach( $data->cards_group as $card ) {

				$card_name         = $card['card_name'];
				$card_job_position = $card['card_job_position'];
				$card_description  = $card['card_description'];
				$card_description  = apply_filters( 'the_content', $card_description );
				$card_awards_title = $card['card_awards_title'];
				$card_awards       = $card['card_awards'];

				$card_image_id     = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
				$card_image_src    = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
				$card_image_alt    = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
				$card_image_alt    = !empty( $card_image_alt ) ? $card_image_alt : $card_name;
				$card_image_alt    = !empty( $card_image_alt ) ? $card_image_alt : $page_title;

				if( !empty( $card_image_src ) || ( !empty( $card_name ) && !empty( $card_job_position ) ) ) {

			?>{{/cards_group_loop_start}}
			<article>
				<figure class="ecode_article_figure"{{builder}} data-edit="ecode_article_figure"{{/builder}}>
					<img loading=lazy src="{{card_image_src}}" alt="{{card_image_alt}}">
				</figure>
				<div class="ecode_info">
					<p class="ecode_article_job"{{builder}} data-edit="ecode_article_job"{{/builder}}>{{card_job_position}}</p>
					<h2 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>{{card_name}}</h2>
					{{php}}<?php

					if( !empty( $card_description ) ) {

					?>{{/php}}
					<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
						{{card_description}}
					</div>
					{{php}}<?php

					}

					if( !empty( $card_awards_title ) && !empty( $card_awards ) ) {

						$awards = preg_split( '/\r\n|\r|\n/', $card_awards );

					?>{{/php}}
					<p class="ecode_article_title_list"{{builder}} data-edit="ecode_article_title_list"{{/builder}}>{{card_awards_title}}</p>
					{{php}}<ul>
						<?php

						foreach ( $awards as $award ) {

							$award = trim( $award );

						?>
						<li class="ecode_article_list"><i class="ecode_article_list_icon"><svg width="48px" height="50px" viewBox="0 0 48 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-92.000000, -10.000000)" fill="#000000"><g transform="translate(91.000000, 10.000000)"><path d="M47.5227273,31.4431818 L36.3636364,25 L47.5227273,18.5568182 C48.6090909,17.9295455 48.9818182,16.5386364 48.3545455,15.4522727 L44.9454545,9.54772727 C44.3181818,8.46136364 42.9295455,8.08863636 41.8409091,8.71590909 L30.6818182,15.1590909 L30.6818182,2.27272727 C30.6818182,1.01818182 29.6636364,0 28.4090909,0 L21.5909091,0 C20.3363636,0 19.3181818,1.01818182 19.3181818,2.27272727 L19.3181818,15.1590909 L8.15909091,8.71590909 C7.07045455,8.08863636 5.68181818,8.46136364 5.05454545,9.54772727 L1.64545455,15.4522727 C1.01818182,16.5386364 1.38863636,17.9295455 2.47727273,18.5568182 L13.6363636,25 L2.47727273,31.4431818 C1.39090909,32.0704545 1.01818182,33.4613636 1.64545455,34.5477273 L5.05454545,40.4522727 C5.68181818,41.5386364 7.07272727,41.9113636 8.15909091,41.2840909 L19.3181818,34.8409091 L19.3181818,47.7272727 C19.3181818,48.9818182 20.3363636,50 21.5909091,50 L28.4090909,50 C29.6636364,50 30.6818182,48.9818182 30.6818182,47.7272727 L30.6818182,34.8409091 L41.8409091,41.2840909 C42.9272727,41.9113636 44.3181818,41.5386364 44.9454545,40.4522727 L48.3545455,34.5477273 C48.9818182,33.4613636 48.6113636,32.0704545 47.5227273,31.4431818 Z"></path></g></g></g></svg></i><?php echo $award; ?></li>
						<?php

						}

						?>
					</ul>{{/php}}
					{{builder}}<ul>
						<li class="ecode_article_list" data-edit="ecode_article_list"><i class="ecode_article_list_icon"><svg width="48px" height="50px" viewBox="0 0 48 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-92.000000, -10.000000)" fill="#000000"><g transform="translate(91.000000, 10.000000)"><path d="M47.5227273,31.4431818 L36.3636364,25 L47.5227273,18.5568182 C48.6090909,17.9295455 48.9818182,16.5386364 48.3545455,15.4522727 L44.9454545,9.54772727 C44.3181818,8.46136364 42.9295455,8.08863636 41.8409091,8.71590909 L30.6818182,15.1590909 L30.6818182,2.27272727 C30.6818182,1.01818182 29.6636364,0 28.4090909,0 L21.5909091,0 C20.3363636,0 19.3181818,1.01818182 19.3181818,2.27272727 L19.3181818,15.1590909 L8.15909091,8.71590909 C7.07045455,8.08863636 5.68181818,8.46136364 5.05454545,9.54772727 L1.64545455,15.4522727 C1.01818182,16.5386364 1.38863636,17.9295455 2.47727273,18.5568182 L13.6363636,25 L2.47727273,31.4431818 C1.39090909,32.0704545 1.01818182,33.4613636 1.64545455,34.5477273 L5.05454545,40.4522727 C5.68181818,41.5386364 7.07272727,41.9113636 8.15909091,41.2840909 L19.3181818,34.8409091 L19.3181818,47.7272727 C19.3181818,48.9818182 20.3363636,50 21.5909091,50 L28.4090909,50 C29.6636364,50 30.6818182,48.9818182 30.6818182,47.7272727 L30.6818182,34.8409091 L41.8409091,41.2840909 C42.9272727,41.9113636 44.3181818,41.5386364 44.9454545,40.4522727 L48.3545455,34.5477273 C48.9818182,33.4613636 48.6113636,32.0704545 47.5227273,31.4431818 Z"></path></g></g></g></svg></i>World’s 50 best chefs list 2019</li>
						<li class="ecode_article_list" data-edit="ecode_article_list"><i class="ecode_article_list_icon"><svg width="48px" height="50px" viewBox="0 0 48 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-92.000000, -10.000000)" fill="#000000"><g transform="translate(91.000000, 10.000000)"><path d="M47.5227273,31.4431818 L36.3636364,25 L47.5227273,18.5568182 C48.6090909,17.9295455 48.9818182,16.5386364 48.3545455,15.4522727 L44.9454545,9.54772727 C44.3181818,8.46136364 42.9295455,8.08863636 41.8409091,8.71590909 L30.6818182,15.1590909 L30.6818182,2.27272727 C30.6818182,1.01818182 29.6636364,0 28.4090909,0 L21.5909091,0 C20.3363636,0 19.3181818,1.01818182 19.3181818,2.27272727 L19.3181818,15.1590909 L8.15909091,8.71590909 C7.07045455,8.08863636 5.68181818,8.46136364 5.05454545,9.54772727 L1.64545455,15.4522727 C1.01818182,16.5386364 1.38863636,17.9295455 2.47727273,18.5568182 L13.6363636,25 L2.47727273,31.4431818 C1.39090909,32.0704545 1.01818182,33.4613636 1.64545455,34.5477273 L5.05454545,40.4522727 C5.68181818,41.5386364 7.07272727,41.9113636 8.15909091,41.2840909 L19.3181818,34.8409091 L19.3181818,47.7272727 C19.3181818,48.9818182 20.3363636,50 21.5909091,50 L28.4090909,50 C29.6636364,50 30.6818182,48.9818182 30.6818182,47.7272727 L30.6818182,34.8409091 L41.8409091,41.2840909 C42.9272727,41.9113636 44.3181818,41.5386364 44.9454545,40.4522727 L48.3545455,34.5477273 C48.9818182,33.4613636 48.6113636,32.0704545 47.5227273,31.4431818 Z"></path></g></g></g></svg></i>2 Stars On The Michelin Guide 2017</li>
					</ul>{{/builder}}
					{{php}}<?php

					}

					?>{{/php}}
				</div>
			</article>
			{{cards_group_loop_end}}<?php

				}

			}

			?>{{/cards_group_loop_end}}
		</div>
		<script type="text/javascript">
			array_s111_t174 = document.getElementsByClassName( 'ecode_section_111_template_174' );
			for (var i = 0; i < array_s111_t174.length; i++) {
				array_articles = array_s111_t174[i].querySelectorAll( '.ecode_article' );
				for (var j = 0; j < array_articles.length; j++) {
					array_articles[j].classList.add( 'ecode_article_hide' );
				}
			}
		</script>
	</section>
	{{php}}<?php

	}

	?>{{/php}}
</section>
