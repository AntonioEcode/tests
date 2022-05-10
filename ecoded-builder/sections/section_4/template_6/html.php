{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_4_template_6{{builder}} hover_effect{{/builder}}"{{builder}} data-edit="ecode_section_4_template_6"{{/builder}}>
		{{php}}<?php

		if( !empty( $data->title ) ) {

		?>{{/php}}
		<h3 class="title"{{builder}} data-edit="title"{{/builder}}>{{title}}</h3>
		{{php}}<?php

		}

		if( !empty( $data->description ) ) {

		?>{{/php}}
		<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>{{description}}</div>
		{{php}}<?php

		}

		if( !empty( $data->cards_group ) ) {

		?>{{/php}}
		<section>
			{{cards_group_loop_start}}<?php

			foreach( $data->cards_group as $card ) {

				$card_svg_icon         = $card['card_svg_icon'];
				$card_image_id         = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
				$card_image_src        = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
				$card_icon_alt         = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
				$card_title            = $card['card_title'];
				$card_description      = $card['card_description'];
				$back_card_title       = $card['back_card_title'];
				$back_card_description = $card['back_card_description'];
				$back_card_button_txt  = $card['back_card_button_txt'];
				$back_card_button_url  = $card['back_card_button_url'];

				// If have specific service selected
				if( !empty( $card['service_id'] ) ) {

					$service_id    = $card['service_id'];
					$service_title = get_the_title( $service_id );
					$service_link  = get_permalink( $service_id );

					$card_title           = !empty( $card_title ) ? $card_title : $service_title;
					$back_card_title      = !empty( $back_card_title ) ? $back_card_title : $service_title;
					$back_card_button_url = !empty( $back_card_button_url ) ? $back_card_button_url : $service_link;

				}

				$card_icon_alt = !empty( $card_icon_alt ) ? $card_icon_alt : $card_title;

			?>{{/cards_group_loop_start}}
			<article class="article">
				{{php}}<?php

				if( !empty( $card_svg_icon ) || !empty( $card_image_src ) ) {

					if( !empty( $card_svg_icon ) ) {

				?>
				<i class="ecode_false_link ecode_article_image" data-link="h3">
					{{card_svg_icon}}
				</i>
				<?php

					} else {

				?>
				<figure class="ecode_false_link ecode_article_image" data-link="h3">
					<img loading="lazy" src="{{card_image_src}}" alt="{{card_icon_alt}}">
				</figure>
				<?php

					}

				}

				?>{{/php}}
				{{builder}}{{card_svg_icon}}{{/builder}}
				{{php}}<?php

				if( !empty( $card_title ) ) {

				?>{{/php}}
				<h3 class="article_title"{{builder}} data-edit="article_title"{{/builder}}>{{card_title}}</h3>
				{{php}}<?php

				}

				if( !empty( $card_description ) ) {

				?>{{/php}}
				<p class="article_text"{{builder}} data-edit="article_text"{{/builder}}>{{card_description}}</p>
				{{php}}<?php

				}

				if( !empty( $back_card_title ) || !empty( $back_card_description ) || !empty( $back_card_button_txt ) ) {

				?>{{/php}}
				<div class="back"{{builder}} data-edit="back"{{/builder}}>
					{{php}}<?php

					if( !empty( $back_card_title ) ) {

					?>{{/php}}
					<p class="back_title"{{builder}} data-edit="back_title"{{/builder}}>{{back_card_title}}</p>
					{{php}}<?php

					}

					if( !empty( $back_card_description ) ) {

					?>{{/php}}
					<p class="back_text"{{builder}} data-edit="back_text"{{/builder}}>{{back_card_description}}</p>
					{{php}}<?php

					}

					if( !empty( $back_card_button_txt ) && !empty( $back_card_button_url ) ) {

					?>{{/php}}
					<a href="{{back_card_button_url}}" class="ecode_button button_primary2"{{builder}} data-edit="button_primary2"{{/builder}}>{{back_card_button_txt}}</a>
					{{php}}<?php

					}

					?>{{/php}}
				</div>
				{{php}}<?php

				}

				?>{{/php}}
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
		array_s4_t6 = document.getElementsByClassName( 'ecode_section_4_template_6' );
		for (var i = 0; i < array_s4_t6.length; i++) {
			array_articles = array_s4_t6[i].querySelectorAll( '.article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'article_hide' );
			}
		}
	</script>
</section>
