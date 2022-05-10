{{php}}<?php

$current_id = wpeb_get_id();
$page_title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$image_hd     = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}', TRUE );
$image_hd_id  = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}_id', TRUE );
$image_hd_id  = empty( $image_hd_id ) ? attachment_url_to_postid( $image_hd ) : $image_hd_id;
$image_hd_src = wp_get_attachment_image_src( $image_hd_id, 'full' )[0];
$image_alt    = get_post_meta( $image_hd_id, '_wp_attachment_image_alt', TRUE );
$image_alt    = !empty( $image_alt ) ? $image_alt : $page_title;

$image     = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}', TRUE );
$image_id  = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}_id', TRUE );
$image_id  = empty( $image_id ) ? attachment_url_to_postid( $image ) : $image_id;
$image_src = wp_get_attachment_image_src( $image_id, 'full' )[0];
$image_src = !empty( $image_src ) ? $image_src : $image_hd_src;

$check_breadcrumbs = get_post_meta( $current_id, '_{{template_name}}_check_breadcrumbs_{{page_section_id}}', TRUE );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_93_template_109"{{builder}} data-edit="ecode_section_93_template_109"{{/builder}}>
		{{php}}<?php

		if( !empty( $image_hd_src ) ) {

		?>{{/php}}
		<picture>
			{{php}}<?php

			if( !empty( $image_hd_src ) ) {

			?>{{/php}}
			<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
			<source media="(min-width:768px)" srcset="{{image_hd_src}}">
			{{php}}<?php

			}

			?>{{/php}}
			<img src="{{image_src}}" alt="{{image_alt}}">
		</picture>
		{{php}}<?php

		}

		?>{{/php}}
		<div class="ecode_width_93_109">
			<h1 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{page_title}}</h1>
			{{php}}<?php

			if( function_exists( 'yoast_breadcrumb' ) && !empty( $check_breadcrumbs ) ) {

			?>
			<section class="container_breadcrumb">
				<?php

				yoast_breadcrumb( '<p id="breadcrumbs" class="breadcrumbs">','</p>' );

				?>
			</section>
			<?php

			}

			?>{{/php}}{{builder}}
			<section class="container_breadcrumb">
				<p class="breadcrumbs">
					<span>
						<span>
							<a href="#" data-edit="container_breadcrumb span, .container_breadcrumb a">Home</a> /
							<span class="breadcrumb_last" aria-current="page" data-edit="container_breadcrumb span, .container_breadcrumb a">Title page</span>
						</span>
					</span>
				</p>
			</section>{{/builder}}
		</div>
	</section>
	<script type="text/javascript">
		array_s93_t109 = document.getElementsByClassName( 'ecode_section_93_template_109' );
		for (var i = 0; i < array_s93_t109.length; i++) {
			array_articles = array_s93_t109[i].querySelectorAll( '.ecode_width_93_109' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_width_93_109_hide' );
			}
		}
	</script>
</section>
