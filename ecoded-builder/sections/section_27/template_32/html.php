{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_27_template_32">
		{{php}}<?php

		if( !empty( $data->title ) ) {

		?>{{/php}}
		<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
		{{php}}<?php

		}

		if( !empty( $data->cards_group ) ) {

		?>{{/php}}
		<section class="ecode_section">
			{{cards_group_loop_start}}<?php

			foreach( $data->cards_group as $card ) {

				$card_image_id   = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
				$card_image_src  = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
				$card_image_alt  = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
				$card_title      = $card['card_title'];
				$card_button_url = $card['card_button_url'];

				// If have specific work selected
				if( !empty( $card['work_id'] ) ) {

					$work_id           = $card['work_id'];
					$work_title        = get_the_title( $work_id );
					$work_link         = get_permalink( $work_id );
					$work_thumbnail_id = get_post_thumbnail_id( $work_id );

					$card_title      = !empty( $card_title ) ? $card_title : $work_title;
					$card_button_url = !empty( $card_button_url ) ? $card_button_url : $work_link;

					if( empty( $card_image_src ) && !empty( $work_thumbnail_id ) ) {

						$card_image_src = wp_get_attachment_image_src( $work_thumbnail_id, 'large' )[0];
						$card_image_alt = get_post_meta( $work_thumbnail_id, '_wp_attachment_image_alt', TRUE );

					}

				}

				$card_image_alt  = !empty( $card_image_alt ) ? $card_image_alt : $card_title;

			?>{{/cards_group_loop_start}}
			<article class="ecode_article">
				{{php}}<?php

				if( !empty( $card_image_src ) ) {

				?>{{/php}}
				<figure class="ecode_article_figure ecode_false_link" data-link="h3"{{builder}} data-edit="ecode_article_figure"{{/builder}}>
					<img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}">
				</figure>
				{{php}}<?php

				}

				if( !empty( $card_title ) ) {

				?>{{/php}}
				<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}><a href="{{card_button_url}}">{{card_title}}</a></h3>
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
		array_s27_t32 = document.getElementsByClassName( 'ecode_section_27_template_32' );
		for (var i = 0; i < array_s27_t32.length; i++) {
			array_articles = array_s27_t32[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
