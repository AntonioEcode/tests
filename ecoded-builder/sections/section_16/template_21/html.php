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
	<section class="ecode_section_16_template_21"{{builder}} data-edit="ecode_section_16_template_21"{{/builder}}>
		<div class="circles circle_top"{{builder}} data-edit-bottom-center="circle_top"{{/builder}}></div>
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

		if( !empty( $data->cards_group ) ) {

		?>{{/php}}
		<section class="ecode_section">
			{{cards_group_loop_start}}<?php

			foreach( $data->cards_group as $card ) {

				$card_image_id    = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
				$card_image_src   = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
				$card_image_alt   = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
				$card_image_alt   = !empty( $card_image_alt ) ? $card_image_alt : $page_title;
				$card_name        = $card['card_name'];
				$card_position    = $card['card_position'];
				$card_description = $card['card_description'];
				$card_facebook    = $card['card_facebook'];
				$card_twitter     = $card['card_twitter'];
				$card_instagram   = $card['card_instagram'];
				$card_linkedin    = $card['card_linkedin'];
				$card_youtube     = $card['card_youtube'];

			?>{{/cards_group_loop_start}}
			<article class="ecode_article">
				{{php}}<?php

				if( !empty( $card_image_src ) ) {

				?>{{/php}}
				<figure class="ecode_person_image"{{builder}} data-edit="ecode_person_image"{{/builder}}>
					<img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}">
				</figure>
				{{php}}<?php

				}

				?>{{/php}}
				<div class="ecode_person_info"{{builder}} data-edit="ecode_person_info"{{/builder}}>
					{{php}}<?php

					if( !empty( $card_name ) ) {

					?>{{/php}}
					<h4 class="ecode_person_name"{{builder}} data-edit="ecode_person_name"{{/builder}}>{{card_name}}</h4>
					{{php}}<?php

					}

					if( !empty( $card_position ) ) {

					?>{{/php}}
					<p class="ecode_person_position"{{builder}} data-edit="ecode_person_position"{{/builder}}>{{card_position}}</p>
					{{php}}<?php

					}

					if( !empty( $card_facebook ) || !empty( $card_twitter ) || !empty( $card_instagram ) || !empty( $card_linkedin ) || !empty( $card_youtube ) ) {

					?>{{/php}}
					<div class="ecode_person_social">
						{{php}}<?php

						if( !empty( $card_facebook ) ) {

						?>{{/php}}
						<a href="{{card_facebook}}" class="ecode_link_social"{{builder}} data-edit="ecode_link_social"{{/builder}}>
							<i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#333333" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" /></svg></i>
						</a>
						{{php}}<?php

						}

						if( !empty( $card_twitter ) ) {

						?>{{/php}}
						<a href="{{card_twitter}}" class="ecode_link_social"{{builder}} data-edit="ecode_link_social"{{/builder}}>
							<i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#333333" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" /></svg></i>
						</a>
						{{php}}<?php

						}

						if( !empty( $card_instagram ) ) {

						?>{{/php}}
						<a href="{{card_instagram}}" class="ecode_link_social"{{builder}} data-edit="=""{{/builder}}>
							<i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#333333" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="16" height="16" rx="4" /><circle cx="12" cy="12" r="3" /><line x1="16.5" y1="7.5" x2="16.5" y2="7.501" /></svg></i>
						</a>
						{{php}}<?php

						}

						if( !empty( $card_linkedin ) ) {

						?>{{/php}}
						<a href="{{card_linkedin}}" class="ecode_link_social"{{builder}} data-edit="ecode_link_social"{{/builder}}>
							<i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#333333" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="16" height="16" rx="2" /><line x1="8" y1="11" x2="8" y2="16" /><line x1="8" y1="8" x2="8" y2="8.01" /><line x1="12" y1="16" x2="12" y2="11" /><path d="M16 16v-3a2 2 0 0 0 -4 0" /></svg></i>
						</a>
						{{php}}<?php

						}

						if( !empty( $card_youtube ) ) {

						?>{{/php}}
						<a href="{{card_youtube}}" class="ecode_link_social"{{builder}} data-edit="ecode_link_social"{{/builder}}>
							<i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#333333" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="4" /><path d="M10 9l5 3l-5 3z" /></svg></i>
						</a>
						{{php}}<?php

						}

						?>{{/php}}
					</div>
					{{php}}<?php

					}

					if( !empty( $card_description ) ) {

					?>{{/php}}
					<p class="ecode_person_description"{{builder}} data-edit="ecode_person_description"{{/builder}}>{{card_description}}</p>
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

		?>{{/php}}
	</section>
	<script type="text/javascript">
		array_s16_t21 = document.getElementsByClassName( 'ecode_section_16_template_21' );
		for (var i = 0; i < array_s16_t21.length; i++) {
			array_articles = array_s16_t21[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
