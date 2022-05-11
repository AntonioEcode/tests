{{php}}<?php

$current_id = wpeb_get_id();
$page_title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

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
	<section class="ecode_section_89_template_105"{{builder}} data-edit="ecode_section_89_template_105"{{/builder}}>
		<div class="ecode_width_89_105">
			{{slides_group_loop_start}}<?php

			foreach( $data->slides_group as $slide ) {

				$slide_image_id  = empty( $slide['slide_image_id'] ) ? attachment_url_to_postid( $slide['slide_image'] ) : $slide['slide_image_id'];
				$slide_image_src = wp_get_attachment_image_src( $slide_image_id, 'full' )[0];
				$slide_image_alt = get_post_meta( $slide_image_id, '_wp_attachment_image_alt', TRUE );
				$slide_image_alt = !empty( $slide_image_alt ) ? $slide_image_alt : $page_title;

				$slide_url          = $slide['slide_url'];
				$slide_external_url = $slide['slide_external_url'];
				$slide_external_url_tags  = '';

				if( $slide_external_url ) {

					$slide_external_url_tags = " target='_blank' rel='nofollow noreferrer noopener'";

				}

				if( !empty( $slide_image_src ) ) {

			?>{{/slides_group_loop_start}}
			<article class="ecode_article">
				<figure class="ecode_figure"{{builder}} data-edit="ecode_figure"{{/builder}}>
					{{php}}<?php

					if( !empty( $slide_url ) ) {

					?>{{/php}}
					<a href="{{slide_url}}"{{php}}<?php echo $slide_external_url_tags; ?>{{/php}}>
					{{php}}<?php

					}

					?>{{/php}}
						<img loading="lazy" src="{{slide_image_src}}" alt="{{slide_image_alt}}">
					{{php}}<?php

					if( !empty( $slide_url ) ) {

					?>{{/php}}
					</a>
					{{php}}<?php

					}

					?>{{/php}}
				</figure>
			</article>
			{{slides_group_loop_end}}<?php

				}

			}

			?>{{/slides_group_loop_end}}
		</div>
	</section>
	{{php}}<?php

	}

	?>{{/php}}
</section>
