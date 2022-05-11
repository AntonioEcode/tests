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
	<section class="ecode_section_73_template_85"{{builder}} data-edit="ecode_section_73_template_85"{{/builder}}>
		<div class="ecode_width_73_85">
			{{php}}<?php

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h3 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h3>
			{{php}}<?php

			}

			if( !empty( $data->subtitle ) ) {

			?>{{/php}}
			<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
				{{subtitle}}
			</div>
			{{php}}<?php

			}

			if( !empty( $data->cards_group ) ) {

			?>{{/php}}
			<section class="ecode_articles">
				{{cards_group_loop_start}}<?php

				foreach( $data->cards_group as $card ) {

					$card_name         = $card['card_name'];
					$card_job_position = $card['card_job_position'];
					$card_image_id     = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
					$card_image_src    = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
					$card_image_alt    = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
					$card_image_alt    = !empty( $card_image_alt ) ? $card_image_alt : $card_name;
					$card_image_alt    = !empty( $card_image_alt ) ? $card_image_alt : $page_title;

					if( !empty( $card_image_src ) || ( !empty( $card_name ) && !empty( $card_job_position ) ) ) {

				?>{{/cards_group_loop_start}}
				<article class="ecode_article">
					{{php}}<?php

					if( !empty( $card_image_src ) ) {

					?>{{/php}}
					<figure class="ecode_article_figure"{{builder}} data-edit="ecode_article_figure"{{/builder}}>
						<img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}">
					</figure>
					{{php}}<?php

					}

					?>{{/php}}
					<div class="ecode_article_info"{{builder}} data-edit="ecode_article_info"{{/builder}}>
						{{php}}<?php

						if( !empty( $card_name ) ) {

						?>{{/php}}
						<h4 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>{{card_name}}</h4>
						{{php}}<?php

						}

						if( !empty( $card_job_position ) ) {

						?>{{/php}}
						<p class="ecode_article_p"{{builder}} data-edit="ecode_article_p"{{/builder}}>{{card_job_position}}</p>
						{{php}}<?php

						}

						?>{{/php}}
					</div>
				</article>
				{{cards_group_loop_end}}<?php

					}

				}

				?>{{/cards_group_loop_end}}
			</section>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
	<script type="text/javascript">
		array_s73_t85 = document.getElementsByClassName( 'ecode_section_73_template_85' );
		for (var i = 0; i < array_s73_t85.length; i++) {
			array_articles = array_s73_t85[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
