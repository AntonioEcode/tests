{{php}}<?php

$current_id = wpeb_get_id();

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
	<section class="ecode_section_98_template_115"{{builder}} data-edit="ecode_section_98_template_115"{{/builder}}>
		<div class="ecode_width_98_115">
			{{cards_group_loop_start}}<?php

			foreach( $data->cards_group as $card ) {

				$card_title       = $card['card_title'];
				$card_description = $card['card_description'];

				$card_description = apply_filters( 'the_content', $card_description );

				if( !empty( $card_title ) || !empty( $card_description ) ) {

			?>{{/cards_group_loop_start}}
			<article class="ecode_article">
				{{php}}<?php

				if( !empty( $card_title ) ) {

				?>{{/php}}
				<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>{{card_title}}</h3>
				{{php}}<?php

				}

				if( !empty( $card_description ) ) {

				?>{{/php}}
				<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
					{{card_description}}
				</div>
				{{php}}<?php

				}

				?>{{/php}}
			</article>
			{{cards_group_loop_end}}<?php

				}

			}

			?>{{/cards_group_loop_end}}
		</div>
	</section>
	<script type="text/javascript">
		array_s98_t115 = document.getElementsByClassName( 'ecode_section_98_template_115' );
		for (var i = 0; i < array_s98_t115.length; i++) {
			array_articles = array_s98_t115[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
	{{php}}<?php

	}

	?>{{/php}}
</section>
