{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

if( !empty( $data->cards_group ) ) {

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_70_template_82"{{builder}} data-edit="ecode_section_70_template_82"{{/builder}}>
		<div class="ecode_width_70_82">
			{{cards_group_loop_start}}<?php

			foreach( $data->cards_group as $card ) {

				$card_svg_icon    = $card['card_svg_icon'];
				$card_title       = $card['card_title'];
				$card_description = $card['card_description'];

				$card_description = apply_filters( 'the_content', $card_description );

			?>{{/cards_group_loop_start}}
			<article class="ecode_article">
				{{php}}<?php

				if( !empty( $card_svg_icon ) ) {

				?>{{/php}}
				<i>{{card_svg_icon}}</i>
				{{php}}<?php

				}

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

			?>{{/cards_group_loop_end}}
		</div>
	</section>
	<script type="text/javascript">
		array_s70_t82 = document.getElementsByClassName( 'ecode_section_70_template_82' );
		for (var i = 0; i < array_s70_t82.length; i++) {
			array_articles = array_s70_t82[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
{{php}}<?php

}

?>{{/php}}
