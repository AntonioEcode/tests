{{php}}<?php

$current_id = wpeb_get_id();

$title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	{{php}}<?php

	if( !empty( $data->slides_group ) ) {

	?>{{/php}}
	<section class="ecode_section_41_template_46">
		<section id="ecode_slider_41_46" class="ecode_container_sliders">
			{{slides_group_loop_start}}<?php

			foreach( $data->slides_group as $slide ) {

				$slide_image_hd_id  = empty( $slide['slide_image_hd_id'] ) ? attachment_url_to_postid( $slide['slide_image'] ) : $slide['slide_image_hd_id'];
				$slide_image_hd_src = wp_get_attachment_image_src( $slide_image_hd_id, 'full' )[0];
				$slide_image_hd_alt = get_post_meta( $slide_image_hd_id, '_wp_attachment_image_alt', TRUE );
				$slide_image_hd_alt = !empty( $slide_image_hd_alt ) ? $slide_image_hd_alt : $title;

				$slide_image_id  = empty( $slide['slide_image_id'] ) ? attachment_url_to_postid( $slide['slide_image'] ) : $slide['slide_image_id'];
				$slide_image_src = wp_get_attachment_image_src( $slide_image_id, 'full' )[0];

			?>{{/slides_group_loop_start}}
			<article class="ecode_article">
				{{php}}<?php

				if( !empty( $slide_image_hd_src ) && !empty( $slide_image_src ) ) {

				?>{{/php}}
				<figure class="ecode_image">
					{{php}}<?php

					if( !empty( $slide_image_hd_src ) ) {

					?>{{/php}}
					<source media="(min-width:1024px)" srcset="{{slide_image_hd_src}}">
					<source media="(min-width:768px)" srcset="{{slide_image_hd_src}}">
					{{php}}<?php

					}

					if( !empty( $slide_image_src ) ) {

					?>{{/php}}
					<img loading="lazy" src="{{slide_image_src}}" alt="{{slide_image_hd_alt}}">
					{{php}}<?php

					}

					?>{{/php}}
				</figure>
				{{php}}<?php

				}

				?>{{/php}}
			</article>
			{{slides_group_loop_end}}<?php

			}

			?>{{/slides_group_loop_end}}
		</section>
	</section>
	{{php}}<?php

	}

	?>{{/php}}
</section>
