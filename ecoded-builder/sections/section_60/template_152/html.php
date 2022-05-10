{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_60_template_152"{{builder}} data-edit="ecode_section_60_template_152"{{/builder}}>
		<article class="ecode_article">
			{{php}}<?php

			if( !empty( $data->back_image_src ) ) {

			?>{{/php}}
			<figure class="ecode_back">
				{{php}}<?php

				if( !empty( $data->back_image_hd ) ) {

				?>{{/php}}
				<source media="(min-width:1024px)" srcset="{{back_image_hd}}">
				<source media="(min-width:768px)" srcset="{{back_image_hd}}">
				{{php}}<?php

				}

				?>{{/php}}
				<img loading="lazy" src="{{back_image_src}}" alt="{{back_image_alt}}">
			</figure>
			{{php}}<?php

			}

			if( !empty( $data->section_image_src ) ) {

			?>{{/php}}
			<figure class="ecode_article_figure"{{builder}} data-edit="ecode_article_figure"{{/builder}}>
				<img loading="lazy" src="{{section_image_src}}" alt="{{section_image_alt}}">
			</figure>
			{{php}}<?php

			}

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h2 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>{{title}}</h2>
			{{php}}<?php

			}

			if( !empty( $data->subtitle ) ) {

			?>{{/php}}
			<span class="ecode_article_subtitle"{{builder}} data-edit="ecode_article_subtitle"{{/builder}}>{{subtitle}}</span>
			{{php}}<?php

			}

			if( !empty( $data->description ) ) {

			?>{{/php}}
			<p class="ecode_article_desc"{{builder}} data-edit="ecode_article_desc"{{/builder}}>{{description}}</p>
			{{php}}<?php

			}

			?>{{/php}}
		</article>
		{{php}}<?php

		if( !empty( $data->left_image_src ) ) {

		?>{{/php}}
		<figure class="ecode_figure"{{builder}} data-edit-center="ecode_figure"{{/builder}}>
			{{php}}<?php

			if( !empty( $data->left_image_hd_src ) ) {

			?>{{/php}}
			<source media="(min-width:1024px)" srcset="{{left_image_hd_src}}">
			<source media="(min-width:768px)" srcset="{{left_image_hd_src}}">
			{{php}}<?php

			}

			?>{{/php}}
			<img loading="lazy" src="{{left_image_src}}" alt="{{left_image_alt}}">
		</figure>
		{{php}}<?php

		} elseif( !empty( $data->video_src ) ) {

		?>
		<div class="ecode_video">
			<video src="{{video_src}}" muted autoplay playsinline loop></video>
		</div>
		<?php

		}

		?>{{/php}}
	</section>
	<script type="text/javascript">
		array_s60_t152 = document.getElementsByClassName( 'ecode_section_60_template_152' );
		for (var i = 0; i < array_s60_t152.length; i++) {
			array_articles = array_s60_t152[i].querySelectorAll( '.ecode_article, .ecode_figure' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
</section>
