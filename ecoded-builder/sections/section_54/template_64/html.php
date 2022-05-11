{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_54_template_64"{{builder}} data-edit="ecode_section_54_template_64"{{/builder}}>
		{{php}}<?php

		if( !empty( $data->image_src ) ) {

		?>{{/php}}
		<figure class="ecode_figure">
			{{php}}<?php

			if( !empty( $data->image_hd_src ) ) {

			?>{{/php}}
			<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
			<source media="(min-width:768px)" srcset="{{image_hd_src}}">
			{{php}}<?php

			}

			?>{{/php}}
			<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
		</figure>
		{{php}}<?php

		}

		if( !empty( $data->pretitle ) ) {

		?>{{/php}}
		<p class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{pretitle}}</p>
		{{php}}<?php

		}

		if( !empty( $data->title ) ) {

		?>{{/php}}
		<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
		{{php}}<?php

		}

		if( !empty( $data->cards_group ) ) {

		?>{{/php}}
		<section>
			{{cards_group_loop_start}}<?php

			foreach( $data->cards_group as $card ) {

				$card_title     = $card['card_title'];
				$card_subtitle  = $card['card_subtitle'];
				$card_image_id  = empty( $card['card_image_id'] ) ? attachment_url_to_postid( $card['card_image'] ) : $card['card_image_id'];
				$card_image_src = wp_get_attachment_image_src( $card_image_id, 'full' )[0];
				$card_image_alt = get_post_meta( $card_image_id, '_wp_attachment_image_alt', TRUE );
				$card_image_alt = !empty( $card_image_alt ) ? $card_image_alt : $card_title;

			?>{{/cards_group_loop_start}}
			<article class="ecode_article">
				{{php}}<?php

				if( !empty( $card_title ) ) {

				?>{{/php}}
				<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>{{card_title}}</h3>
				{{php}}<?php

				}

				if( !empty( $card_subtitle ) ) {

				?>{{/php}}
				<span class="ecode_article_subtitle"{{builder}} data-edit="ecode_article_subtitle"{{/builder}}>{{card_subtitle}}</span>
				{{php}}<?php

				}

				if( !empty( $card_image_src ) ) {

				?>{{/php}}
				<figure class="ecode_article_figure"{{builder}} data-edit="ecode_article_figure"{{/builder}}>
					<img loading="lazy" src="{{card_image_src}}" alt="{{card_image_alt}}">
				</figure>
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
		array_s54_t64 = document.getElementsByClassName( 'ecode_section_54_template_64' );
		for (var i = 0; i < array_s54_t64.length; i++) {
			array_articles = array_s54_t64[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
