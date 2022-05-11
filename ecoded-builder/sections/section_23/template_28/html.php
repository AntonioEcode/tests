{{php}}<?php

$current_id = wpeb_get_id();

$slides_group = get_post_meta( $current_id, '_{{template_name}}_slides_group_{{page_section_id}}', TRUE );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	{{php}}<?php

	if( !empty( $slides_group ) ) {

	?>{{/php}}
	<section class="ecode_section_23_template_28">
		<section id="ecode_slider_23_28" class="ecode_container_sliders">
			{{slides_group_loop_start}}<?php

			$cont = 0;

			foreach( $slides_group as $slide ) {

				$content_alignment   = $slide['content_alignment'];
				$slide_title         = $slide['slide_title'];
				$slide_subtitle      = $slide['slide_subtitle'];
				$slide_txt_button_1  = $slide['slide_txt_button_1'];
				$slide_link_button_1 = $slide['slide_link_button_1'];
				$slide_txt_button_2  = $slide['slide_txt_button_2'];
				$slide_link_button_2 = $slide['slide_link_button_2'];

				if( $cont == 0 ) {

					$title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

					$slide_title = !empty( $slide_title ) ? $slide_title : $title;

				}

				$slide_image_hd_id  = empty( $slide['slide_image_hd_id'] ) ? attachment_url_to_postid( $slide['slide_image_hd'] ) : $slide['slide_image_hd_id'];
				$slide_image_hd_src = wp_get_attachment_image_src( $slide_image_hd_id, 'full' )[0];
				$slide_image_hd_alt = get_post_meta( $slide_image_hd_id, '_wp_attachment_image_alt', TRUE );
				$slide_image_hd_alt = !empty( $slide_image_hd_alt ) ? $slide_image_hd_alt : $slide_title;

				$slide_image_id  = empty( $slide['slide_image_id'] ) ? attachment_url_to_postid( $slide['slide_image'] ) : $slide['slide_image_id'];
				$slide_image_src = wp_get_attachment_image_src( $slide_image_id, 'full' )[0];

			?>{{/slides_group_loop_start}}
			<article class="ecode_article {{content_alignment}}">
				{{php}}<?php

				if( !empty( $slide_image_hd_src ) && !empty( $slide_image_src ) ) {

				?>{{/php}}
				<figure class="ecode_image"{{builder}} data-edit="ecode_image::after"{{/builder}}>
					{{php}}<?php

					if( !empty( $slide_image_hd_src ) ) {

					?>{{/php}}
					<source media="(min-width:1024px)" srcset="{{slide_image_hd_src}}">
					<source media="(min-width:768px)" srcset="{{slide_image_hd_src}}">
					{{php}}<?php

					}

					if( !empty( $slide_image_src ) ) {

					?>{{/php}}
					<img src="{{slide_image_src}}" alt="{{slide_image_hd_alt}}">
					{{php}}<?php

					}

					?>{{/php}}
				</figure>
				{{php}}<?php

				}

				if( !empty( $slide_title ) || !empty( $slide_subtitle ) || !empty( $slide_txt_button_1 ) || !empty( $slide_txt_button_2 ) ) {

				?>{{/php}}
				<div class="ecode_info">
					{{php}}<?php

					if( $cont == 0 ) {

						if( !empty( $slide_title ) ) {

					?>{{/php}}
					<h1 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{slide_title}}</h1>
					{{php}}<?php

						}

						if( !empty( $slide_subtitle ) ) {

					?>{{/php}}
					<h2 class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{slide_subtitle}}</h2>
					{{php}}<?php

						}

					} else {

						if( !empty( $slide_title ) ) {

					?>
					<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{slide_title}}</h2>
					<?php

						}

						if( !empty( $slide_subtitle ) ) {

					?>
					<h3 class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{slide_subtitle}}</h3>
					<?php

						}

					}

					if( ( !empty( $slide_txt_button_1 ) && !empty( $slide_link_button_1 ) ) || ( !empty( $slide_txt_button_2 ) && !empty( $slide_link_button_2 ) ) ) {

					?>{{/php}}
					<div class="ecode_buttons">
						{{php}}<?php

						if( !empty( $slide_txt_button_1 ) && !empty( $slide_link_button_1 ) ) {

						?>{{/php}}
						<a href="{{slide_link_button_1}}" class="ecode_button ecode_button_border_white"{{builder}} data-edit="ecode_button_border_white"{{/builder}}>{{slide_txt_button_1}}</a>
						{{php}}<?php

						}

						if( !empty( $slide_txt_button_2 ) && !empty( $slide_link_button_2 ) ) {

						?>{{/php}}
						<a href="{{slide_link_button_2}}" class="ecode_button ecode_button_c_c"{{builder}} data-edit="ecode_button_c_c"{{/builder}}>{{slide_txt_button_2}}</a>
						{{php}}<?php

						}

						?>{{/php}}
					</div>
					{{php}}<?php

					}

					?>{{/php}}
				</div>
				{{php}}<?php

				}

				?>{{/php}}
			</article>
			{{slides_group_loop_end}}<?php

				$cont++;

			}

			?>{{/slides_group_loop_end}}
		</section>
		<script type="text/javascript">
		classes = ['ecode_info_hide_top','ecode_info_hide_bottom','ecode_info_hide_left','ecode_info_hide_right'];
		array_slider_23_28_info = document.getElementById( 'ecode_slider_23_28' ).querySelectorAll( '.ecode_info' );
		for (var i = 0; i < array_slider_23_28_info.length; i++) {
			array_slider_23_28_info[i].classList.add( 'ecode_info_hide' );
			array_slider_23_28_info[i].classList.add( classes[Math.floor( Math.random() * classes.length ) ] );
		}
		</script>
	</section>
	{{php}}<?php

	}

	?>{{/php}}
</section>
