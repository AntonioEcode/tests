{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_118_template_183"{{builder}} data-edit="ecode_section_118_template_183"{{/builder}}>
		<div class="ecode_width_118_183">
			<section>
				{{php}}<?php

				if( !empty( $data->first_title ) && !empty( $data->first_cards_group ) ) {

				?>{{/php}}
				<article class="ecode_article">
					<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>{{first_title}}</h3>
					{{first_cards_group_loop_start}}<?php

					foreach( $data->first_cards_group as $card ) {

						$card_title       = $card['card_title'];
						$card_price       = $card['card_price'];
						$card_description = $card['card_description'];

						if( !empty( $card_title ) && !empty( $card_price ) ) {

					?>{{/first_cards_group_loop_start}}
					<div>
						<h4 class="ecode_div_title"{{builder}} data-edit="ecode_div_title"{{/builder}}>{{card_title}}</h4>
						<span class="ecode_div_price"{{builder}} data-edit="ecode_div_price"{{/builder}}>{{card_price}}</span>
						{{php}}<?php

						if( !empty( $card_description ) ) {

						?>{{/php}}
						<p class="ecode_div_desc"{{builder}} data-edit="ecode_div_desc"{{/builder}}>{{card_description}}</p>
						{{php}}<?php

						}

						?>{{/php}}
					</div>
					{{first_cards_group_loop_end}}<?php

						}

					}

					?>{{/first_cards_group_loop_end}}
				</article>
				{{php}}<?php

				}

				if( !empty( $data->second_title ) && !empty( $data->second_cards_group ) ) {

				?>{{/php}}
				<article class="ecode_article ecode_article_featured">
					{{php}}<?php

					if( !empty( $data->second_back_image_src ) ) {

					?>{{/php}}
					<figure>
						<img loading="lazy" src="{{second_back_image_src}}" alt="{{second_back_image_alt}}">
					</figure>
					{{php}}<?php

					}

					?>{{/php}}
					<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>{{second_title}}</h3>
					{{second_cards_group_loop_start}}<?php

					foreach( $data->second_cards_group as $card ) {

						$card_title       = $card['card_title'];
						$card_price       = $card['card_price'];
						$card_description = $card['card_description'];

						if( !empty( $card_title ) && !empty( $card_price ) ) {

					?>{{/second_cards_group_loop_start}}
					<div>
						<h4 class="ecode_div_title"{{builder}} data-edit="ecode_div_title"{{/builder}}>{{card_title}}</h4>
						<span class="ecode_div_price"{{builder}} data-edit="ecode_div_price"{{/builder}}>{{card_price}}</span>
						{{php}}<?php

						if( !empty( $card_description ) ) {

						?>{{/php}}
						<p class="ecode_div_desc"{{builder}} data-edit="ecode_div_desc"{{/builder}}>{{card_description}}</p>
						{{php}}<?php

						}

						?>{{/php}}
					</div>
					{{second_cards_group_loop_end}}<?php

						}

					}

					?>{{/second_cards_group_loop_end}}
				</article>
				{{php}}<?php

				}

				if( !empty( $data->third_title ) && !empty( $data->third_cards_group ) ) {

				?>{{/php}}
				<article class="ecode_article">
					<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>{{third_title}}</h3>
					{{third_cards_group_loop_start}}<?php

					foreach( $data->third_cards_group as $card ) {

						$card_title       = $card['card_title'];
						$card_price       = $card['card_price'];
						$card_description = $card['card_description'];

						if( !empty( $card_title ) && !empty( $card_price ) ) {

					?>{{/third_cards_group_loop_start}}
					<div>
						<h4 class="ecode_div_title"{{builder}} data-edit="ecode_div_title"{{/builder}}>{{card_title}}</h4>
						<span class="ecode_div_price"{{builder}} data-edit="ecode_div_price"{{/builder}}>{{card_price}}</span>
						{{php}}<?php

						if( !empty( $card_description ) ) {

						?>{{/php}}
						<p class="ecode_div_desc"{{builder}} data-edit="ecode_div_desc"{{/builder}}>{{card_description}}</p>
						{{php}}<?php

						}

						?>{{/php}}
					</div>
					{{third_cards_group_loop_end}}<?php

						}

					}

					?>{{/third_cards_group_loop_end}}
				</article>
				{{php}}<?php

				}

				?>{{/php}}
			</section>
		</div>
	</section>
	<script type="text/javascript">
		array_s118_t183 = document.getElementsByClassName( 'ecode_section_118_template_183' );
		for (var i = 0; i < array_s118_t183.length; i++) {
			array_articles = array_s118_t183[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
