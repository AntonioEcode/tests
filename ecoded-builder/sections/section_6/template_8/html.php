{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_6_template_8{{builder}} hover_effect{{/builder}}"{{builder}} data-edit="ecode_section_6_template_8"{{/builder}}>
		{{php}}<?php

		if( !empty( $data->title ) ) {

		?>{{/php}}
		<h3 class="title"{{builder}} data-edit="title"{{/builder}}>{{title}}</h3>
		{{php}}<?php

		}

		if( !empty( $data->description ) ) {

		?>{{/php}}
		<div class="ecode_container_content"{{builder}} data-edit="content"{{/builder}}>
			{{description}}
		</div>
		{{php}}<?php

		}

		if( !empty( $data->cards_group ) ) {

		?>{{/php}}
		<section>
			{{cards_group_loop_start}}<?php

			foreach( $data->cards_group as $card ) {

				$card_image_id         = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
				$card_image_src        = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
				$card_image_alt        = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
				$back_card_title       = $card['back_card_title'];
				$back_card_subtitle    = $card['back_card_subtitle'];
				$back_card_button_url  = $card['back_card_button_url'];

				// If have specific work selected
				if( !empty( $card['work_id'] ) ) {

					$work_id           = $card['work_id'];
					$work_title        = get_the_title( $work_id );
					$work_link         = get_permalink( $work_id );
					$work_thumbnail_id = get_post_thumbnail_id( $work_id );

					$back_card_title      = !empty( $back_card_title ) ? $back_card_title : $work_title;
					$back_card_button_url = !empty( $back_card_button_url ) ? $back_card_button_url : $work_link;

					if( empty( $card_image_src ) && !empty( $work_thumbnail_id ) ) {

						$card_image_src = wp_get_attachment_image_src( $work_thumbnail_id, 'large' )[0];
						$card_image_alt = get_post_meta( $work_thumbnail_id, '_wp_attachment_image_alt', TRUE );

					}

				}

				$card_image_alt = !empty( $card_image_alt ) ? $card_image_alt : $back_card_title;

			?>{{/cards_group_loop_start}}
			<article class="article">
				{{php}}<?php

				if( !empty( $card_image_src ) ) {

				?>{{/php}}
				<figure class="article_figure"{{builder}} data-edit="article_figure"{{/builder}}>
					<img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}">
				</figure>
				{{php}}<?php

				}

				?>{{/php}}
				<div class="article_info"{{builder}} data-edit="article_info"{{/builder}}>
					{{php}}<?php

					if( !empty( $back_card_button_url ) ) {

					?>{{/php}}
					<div class="icons">
						<i class="icon_link article_icon"{{builder}} data-edit="article_icon"{{/builder}}>
							<a href="{{back_card_button_url}}">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-link" width="24" height="24" viewBox="0 0 24 24" stroke-width="2.5" stroke="#fed03d" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" /><path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
							</a>
						</i>
					</div>
					{{php}}<?php

					}

					if( !empty( $back_card_title ) ) {

					?>{{/php}}
					<h4 class="article_title"{{builder}} data-edit="article_title"{{/builder}}>{{back_card_title}}</h4>
					{{php}}<?php

					}

					if( !empty( $back_card_subtitle ) ) {

					?>{{/php}}
					<p class="article_tag"{{builder}} data-edit="article_tag"{{/builder}}>{{back_card_subtitle}}</p>
					{{php}}<?php

					}

					?>{{/php}}
				</div>
			</article>
			{{cards_group_loop_end}}<?php

			}

			?>{{/cards_group_loop_end}}
		</section>
		{{php}}<?php

		}

		if( !empty( $data->button_txt ) && !empty( $data->button_url ) ) {

		?>{{/php}}
		<div class="container_button">
			<a href="{{button_url}}" class="ecode_button button_white"{{builder}} data-edit="button_white"{{/builder}}>{{button_txt}}</a>
		</div>
		{{php}}<?php

		}

		?>{{/php}}
	</section>
	<script type="text/javascript">
		array_s6_t8 = document.getElementsByClassName( 'ecode_section_6_template_8' );
		for (var i = 0; i < array_s6_t8.length; i++) {
			array_articles = array_s6_t8[i].querySelectorAll( '.article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'article_hide' );
			}
		}
	</script>
</section>
