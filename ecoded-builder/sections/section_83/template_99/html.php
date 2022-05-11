{{php}}<?php

$current_id = wpeb_get_id();
$page_title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$cards_group = get_post_meta( $current_id, '_{{template_name}}_cards_group_{{page_section_id}}', TRUE );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	{{php}}<?php

	if( !empty( $cards_group ) ) {

	?>{{/php}}
	<section class="ecode_section_83_template_99"{{builder}} data-edit="ecode_section_83_template_99"{{/builder}}>
		<div class="ecode_width_83_99">
			{{cards_group_loop_start}}<?php

			$cont = 0;

			foreach( $cards_group as $card ) {

				$card_img_alignment = $card['card_img_alignment'];
				$card_title         = $card['card_title'];
				$card_subtitle      = $card['card_subtitle'];
				$card_button_text   = $card['card_button_text'];
				$card_button_url    = $card['card_button_url'];

				$card_subtitle = apply_filters( 'the_content', $card_subtitle );

				if( $cont == 0 ) {

					$card_title = !empty( $card_title ) ? $card_title : $page_title;

				}

				$card_img_alignment_class = '';

				if( $card_img_alignment == 'left' ) {

					$card_img_alignment_class = ' ecode_article_reverse';

				}

				$card_image_id  = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
				$card_image_src = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
				$card_image_alt = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
				$card_image_alt = !empty( $card_image_alt ) ? $card_image_alt : $card_title;
				$card_image_alt = !empty( $card_image_alt ) ? $card_image_alt : $page_title;

				if( !empty( $card_image_src ) || ( !empty( $card_title ) && !empty( $card_subtitle ) ) ) {

			?>{{/cards_group_loop_start}}
			{{php}}<article class="ecode_article<?php echo $card_img_alignment_class; ?>">{{/php}}{{builder}}
			<article class="ecode_article">{{/builder}}
				<div class="info">
					{{php}}<?php

					if( !empty( $card_title ) ) {

						if( $cont == 0 ) {

					?>{{/php}}
					<h1 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{card_title}}</h1>
					{{php}}<?php

						} else {

					?>
					<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{card_title}}</h2>
					<?php

						}

					}

					if( !empty( $card_subtitle ) ) {

					?>{{/php}}
					<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
						{{card_subtitle}}
					</div>
					{{php}}<?php

					}

					if( !empty( $card_button_text ) && !empty( $card_button_url ) ) {

					?>{{/php}}
					<a href="{{card_button_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{card_button_text}}<i{{builder}} data-edit="ecode_button i"{{/builder}}><svg width="29px" height="50px" viewBox="0 0 29 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-230.000000, -20.000000)" fill="#333333"><g transform="translate(230.000000, 20.000000)"><path d="M27.4824115,27.4659292 L5.99048673,48.9571903 C4.62334071,50.325 2.40674779,50.325 1.04026549,48.9571903 C-0.326327434,47.5905973 -0.326327434,45.374115 1.04026549,44.0076327 L20.0573009,24.9911504 L1.04081858,5.97533186 C-0.325774336,4.60818584 -0.325774336,2.39192478 1.04081858,1.02533186 C2.4074115,-0.341814159 4.62389381,-0.341814159 5.99103982,1.02533186 L27.4829646,22.5169248 C28.1662611,23.2005531 28.5075221,24.0955752 28.5075221,24.9910398 C28.5075221,25.8869469 28.1655973,26.7826327 27.4824115,27.4659292 Z"></path></g></g></g></svg></i></a>
					{{php}}<?php

					}

					?>{{/php}}
				</div>
				{{php}}<?php

				if( !empty( $card_image_src ) ) {

				?>{{/php}}
				<figure class="ecode_figure"{{builder}} data-edit="ecode_figure"{{/builder}}>
					<img src="{{card_image_src}}" alt="{{card_image_alt}}">
				</figure>
				{{php}}<?php

				}

				?>{{/php}}
			</article>
			{{cards_group_loop_end}}<?php

				}

				$cont++;

			}

			?>{{/cards_group_loop_end}}
		</div>
	</section>
	{{php}}<?php

	}

	?>{{/php}}
</section>
