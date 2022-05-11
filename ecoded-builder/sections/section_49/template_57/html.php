{{php}}<?php

setlocale( LC_ALL, 'es_ES' );

$current_id = wpeb_get_id();

$pretitle = get_post_meta( $current_id, '_{{template_name}}_pretitle_{{page_section_id}}', TRUE );
$title = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );

$button_txt = get_post_meta( $current_id, '_{{template_name}}_button_txt_{{page_section_id}}', TRUE );
$button_url = get_post_meta( $current_id, '_{{template_name}}_button_url_{{page_section_id}}', TRUE );

if( empty( $button_url ) ) {

	$button_url = !empty( get_permalink( get_option( 'page_for_posts' ) ) ) ? get_permalink( get_option( 'page_for_posts' ) ) : '';

}

if( empty( $button_txt ) ) {

	$button_txt = __( 'Ver todo', 'frontecode' );

}

$posts_blog = get_post_meta( $current_id, '_{{template_name}}_posts_blog_slide_{{page_section_id}}', TRUE );

if( empty( $posts_blog ) ) {

	$posts_blog = array();

	$args = array(
		'post_status'    => 'publish',
		'post_type'      => 'post',
		'posts_per_page' => '3',
		'orderby'        => 'date',
		'order'          => 'DESC',
	);

	$query = new WP_Query( $args );

	if( $query->have_posts() ) {

		while( $query->have_posts() ) {

			$query->the_post();
            $post_id = get_the_ID();

			$posts_blog[] = array(
				'post_id' => $post_id,
			);

		}

	}

	wp_reset_postdata();

}

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	{{php}}<?php

	if( !empty( $posts_blog ) ) {

	?>{{/php}}
	<section class="ecode_section_49_template_57"{{builder}} data-edit-bottom-center="ecode_section_49_template_57"{{/builder}}>
		<div class="ecode_triangle"{{builder}} data-edit-center="ecode_triangle::after"{{/builder}}></div>
		{{php}}<?php

		if( !empty( $pretitle ) ) {

		?>{{/php}}
		<p class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{pretitle}}</p>
		{{php}}<?php

		}

		if( !empty( $title ) ) {

		?>{{/php}}
		<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
		{{php}}<?php

		}

		?>{{/php}}
		<section>
			{{posts_loop_start}}<?php


			$cont = 0;

			foreach( $posts_blog as $post ) {

				$post_id = $post['post_id'];
				$post = get_post( $post_id );

				$post_title   = get_the_title( $post_id );
				$post_url     = get_permalink( $post_id );
				$post_excerpt = get_the_excerpt( $post_id );

				$post_thumbnail_id = get_post_thumbnail_id( $post_id );

				if( !empty( $post_thumbnail_id ) ) {

					$post_thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'medium_large' )[0];
					$post_thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', TRUE );
					$post_thumbnail_alt = !empty( $post_thumbnail_alt ) ? $post_thumbnail_alt : $post_title;

				} else {

					$post_thumbnail_src = default_image_post( 'url' );
					$post_thumbnail_alt = $post_title;

				}

			?>{{/posts_loop_start}}
			<article class="ecode_article">
				{{php}}<?php

				if( !empty( $post_thumbnail_src ) ) {

				?>{{/php}}
				<figure class="ecode_article_figure ecode_false_link" data-link="h3"{{builder}} data-edit="ecode_article_figure"{{/builder}}><img loading="lazy" src="{{post_thumbnail_src}}" alt="{{post_thumbnail_alt}}"></figure>
				{{php}}<?php

				}

				?>{{/php}}
				<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}><a href="{{post_url}}">{{post_title}}</a></h3>
				{{php}}<?php

				if( !empty( $post_excerpt ) ) {

				?>{{/php}}
				<p class="ecode_article_desc"{{builder}} data-edit="ecode_article_desc"{{/builder}}>{{post_excerpt}}</p>
				{{php}}<?php

				}

				?>{{/php}}
			</article>
			{{posts_loop_end}}<?php

				$cont++;

				if( $cont == 3 ) { break; }

			}

			wp_reset_postdata();

			?>{{/posts_loop_end}}
		</section>
		{{php}}<?php

		if( !empty( $button_txt ) && !empty( $button_url ) ) {

		?>{{/php}}
		<div class="ecode_buttons">
			<a href="{{button_url}}" class="ecode_button"{{builder}} data-edit="ecode_button"{{/builder}}>{{button_txt}}</a>
		</div>
		{{php}}<?php

		}

		?>{{/php}}
	</section>
	<script type="text/javascript">
		array_s49_t57 = document.getElementsByClassName( 'ecode_section_49_template_57' );
		for (var i = 0; i < array_s49_t57.length; i++) {
			array_articles = array_s49_t57[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
	{{php}}<?php

	}

	?>{{/php}}
</section>
