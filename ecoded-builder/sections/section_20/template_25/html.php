{{php}}<?php

setlocale( LC_ALL, 'es_ES' );

$current_id = wpeb_get_id();

$title = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );

$posts_blog = get_post_meta( $current_id, '_{{template_name}}_related_posts_blog_{{page_section_id}}', TRUE );

if( empty( $posts_blog ) ) {

	$posts_blog = array();

	$args = array(
		'post_status'    => 'publish',
		'post_type'      => 'post',
		'posts_per_page' => '2',
		'category__in'   => wp_get_post_categories( $current_id ),
		'post__not_in'   => array( $current_id )
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
	<section class="ecode_section_20_template_25"{{builder}} data-edit="ecode_section_20_template_25"{{/builder}}>
		{{php}}<?php

		if( !empty( $title ) && !empty( $posts_blog ) ) {

		?>{{/php}}
		<h4 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h4>
		{{php}}<?php

		}

		?>{{/php}}
		<section class="ecode_section">
			{{posts_loop_start}}<?php

			if( !empty( $posts_blog ) ) {

				$cont = 0;

				foreach( $posts_blog as $post ) {

					$post_id = $post['post_id'];
					$post = get_post( $post_id );

					$post_title           = get_the_title( $post_id );
					$post_url             = get_permalink( $post_id );
					$post_comments_number = get_comments_number( $post_id );
					$copy_comments_number = $post_comments_number . ' ' . __( 'Comentarios', 'frontecode' );

					$post_date = new DateTime( $post->post_date );
					$format_post_date = strftime( "%d %B, %Y", $post_date->getTimestamp() );

					$post_thumbnail_id = get_post_thumbnail_id( $post_id );

					if( !empty( $post_thumbnail_id ) ) {

						$post_thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'large' )[0];
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
				<figure class="ecode_figure ecode_false_link" data-link="h3"{{builder}} data-edit="ecode_figure"{{/builder}}>
					<img loading="lazy" src="{{post_thumbnail_src}}" alt="{{post_thumbnail_alt}}">
				</figure>
				{{php}}<?php

				}

				?>{{/php}}
				<h3><a href="{{post_url}}" class="ecode_article_post"{{builder}} data-edit="ecode_article_post"{{/builder}}>{{post_title}}</a></h3>
				<p class="ecode_article_info"{{builder}} data-edit="ecode_article_info"{{/builder}}>{{format_post_date}} | {{copy_comments_number}}</p>
			</article>
			{{posts_loop_end}}<?php

					$cont++;

					if( $cont == 2 ) { break; }

				}

				wp_reset_postdata();

			}

			?>{{/posts_loop_end}}
		</section>
	</section>
</section>
