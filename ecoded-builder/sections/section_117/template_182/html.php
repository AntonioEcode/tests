{{php}}<?php

$current_id = wpeb_get_id();
$page_title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$title = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );

$posts_blog = get_post_meta( $current_id, '_{{template_name}}_posts_blog_{{page_section_id}}', TRUE );

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
	<section class="ecode_section_117_template_182"{{builder}} data-edit="ecode_section_117_template_182"{{/builder}}>
		<div class="ecode_width_117_182">
			{{php}}<?php

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

					$post_title       = get_the_title( $post_id );
					$post_url         = get_permalink( $post_id );
					$post_excerpt     = get_the_excerpt( $post_id );
					$post_author      = get_the_author_meta( 'display_name', $post->post_author );
					$copy_author      = __( 'Por', 'frontecode' ) . ' ' . $post_author . ' ';
					$post_date        = new DateTime( $post->post_date );
					$format_post_date = ' ' . strftime( "%d %B, %Y", $post_date->getTimestamp() ) . ' ';
					$post_categories  = wp_get_post_categories( $post_id );

					$post_thumbnail_id = get_post_thumbnail_id( $post_id );

					if( !empty( $post_thumbnail_id ) ) {

						$post_thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'large' )[0];
						$post_thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', TRUE );
						$post_thumbnail_alt = !empty( $post_thumbnail_alt ) ? $post_thumbnail_alt : $post_title;

					} else {

						$post_thumbnail_src = default_image_post( 'url' );
						$post_thumbnail_alt = $post_title;

					}

					$copy_categories = '';

					if( !empty( $post_categories ) ) {

						$copy_categories = ' ' . __( 'Categorías', 'frontecode' ) . ': ';

						for( $i = 0; $i < count( $post_categories ); $i++ ) {

							$cat = get_category( $post_categories[$i] );

							$copy_categories .= '<a href="'. get_category_link( $post_categories[$i] ) .'">'. $cat->name . '</a>';

							if( $i < ( count( $post_categories ) - 1 ) ) {

								$copy_categories .= ', ';

							}

						}

					}

				?>{{/posts_loop_start}}
				<article class="ecode_article">
					<figure class="ecode_false_link ecode_article_figure" data-link="h3"{{builder}} data-edit="ecode_article_figure"{{/builder}}>
						<img loading="lazy" src="{{post_thumbnail_src}}" alt="{{post_thumbnail_alt}}">
					</figure>
					<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}><a href="{{post_url}}">{{post_title}}</a></h3>
					{{php}}<p class="ecode_article_info">{{copy_author}}|{{format_post_date}}|{{copy_categories}}</p>{{/php}}{{builder}}
					<p class="ecode_article_info" data-edit="ecode_article_info">Por Chicote | 7 de Julio 2021 | Categorías: <a href="#">Noticias</a></p>{{/builder}}
				</article>
				{{posts_loop_end}}<?php

					$cont++;

					if( $cont == 3 ) { break; }

				}

				wp_reset_postdata();

				?>{{/posts_loop_end}}
			</section>
		</div>
	</section>
	<script type="text/javascript">
		array_s117_t182 = document.getElementsByClassName( 'ecode_section_117_template_182' );
		for (var i = 0; i < array_s117_t182.length; i++) {
			array_articles = array_s117_t182[i].querySelectorAll( '.ecode_article' );
			for (var j = 0; j < array_articles.length; j++) {
				array_articles[j].classList.add( 'ecode_article_hide' );
			}
		}
	</script>
	{{php}}<?php

	}

	?>{{/php}}
</section>
