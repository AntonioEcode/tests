{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_61_template_72"{{builder}} data-edit="ecode_section_61_template_72"{{/builder}}>
		{{php}}<?php

		if( !empty( $data->image_src ) ) {

		?>{{/php}}
		<figure class="ecode_back">
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

		?>{{/php}}
		<section class="ecode_width_61_72">
			{{php}}<?php

			if( !empty( $data->pretitle ) ) {

			?>{{/php}}
			<p class="ecode_text"{{builder}} data-edit="ecode_text"{{/builder}}>{{pretitle}}</p>
			{{php}}<?php

			}

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h2 class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{title}}</h2>
			{{php}}<?php

			}

			if( !empty( $data->gallery ) ) {

			?>{{/php}}
			<section class="ecode_gallery_61_72">
				{{gallery_start}}<?php

				foreach( $data->gallery as $image_id => $image_src ) {

					$slide_medium_image_src = wp_get_attachment_image_src( $image_id, 'medium' )[0];
					$slide_full_image_src  = wp_get_attachment_image_src( $image_id, 'full' )[0];
					$slide_image_alt       = get_post_meta( $image_id, '_wp_attachment_image_alt', TRUE );
					$slide_image_alt       = empty( $slide_image_alt ) ? $post_title : $slide_image_alt;
					$slide_image_caption   = !empty( wp_get_attachment_caption( $image_id ) ) ? wp_get_attachment_caption( $image_id ) : '';

				?>{{/gallery_start}}
				<article data-src="{{slide_full_image_src}}" data-sub-html="{{slide_image_caption}}">
					<figure class="ecode_gallery_figure"{{builder}} data-edit="ecode_gallery_figure"{{/builder}}>
						<img loading="lazy" loading=lazy src="{{php}}{{slide_medium_image_src}}{{/php}}{{builder}}{{slide_full_image_src}}{{/builder}}" alt="{{slide_image_alt}}">
					</figure>
				</article>
				{{gallery_end}}<?php

				}

				?>{{/gallery_end}}
			</section>
			{{php}}<?php

			}

			if( !empty( $data->section_button_txt ) && !empty( $data->section_button_url ) ) {

			?>{{/php}}
			<div class="ecode_buttons">
				<a href="{{section_button_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{section_button_txt}}</a>
			</div>
			{{php}}<?php

			}

			?>{{/php}}
		</section>
	</section>
	<script type="text/javascript">
		array_s61_t72 = document.getElementsByClassName( 'ecode_section_61_template_72' );
		for (var i = 0; i < array_s61_t72.length; i++) {
			array_articles = array_s61_t72[i].querySelectorAll( '.ecode_gallery_61_72' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_gallery_61_72_hide' );
			}
		}
	</script>
</section>
