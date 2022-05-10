{{php}}<?php

setlocale( LC_ALL, 'es_ES' );

$copy_without_notice = __( 'Todavía no hay noticias en nuestro blog.', 'frontecode' );

?>{{/php}}
<section id="page_section_{{page_section_id}}" {{builder}}class="page_section"{{/builder}}>
	<section class="ecode_section_17_template_22"{{builder}} data-edit="ecode_section_17_template_22"{{/builder}}>
		{{posts_loop_start}}<?php

		if( have_posts() ) {

			while( have_posts() ) {

	            the_post();

				$post_id = get_the_ID();
				$post = get_post( $post_id );

				$post_url          = get_permalink();
				$post_title        = get_the_title();
				$post_thumbnail_id = get_post_thumbnail_id();
				$post_excerpt      = get_the_excerpt();
				$post_author       = get_the_author_meta( 'display_name', $post->post_author );
				$copy_author       = __( 'Por', 'frontecode' ) . ' ' . $post_author;
				$post_categories   = wp_get_post_categories( $post_id );
				$copy_read_more    = __( 'Leer más >', 'frontecode' );

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

					$copy_categories .= ' | ';

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
			{{php}}<?php

			if( !empty( $post_thumbnail_src ) ) {

			?>{{/php}}
			<figure class="ecode_image ecode_false_link" data-link="h2"{{builder}} data-edit-center="ecode_image"{{/builder}}>
				<img loading="lazy" src="{{post_thumbnail_src}}" alt="{{post_thumbnail_alt}}">
			</figure>
			{{php}}<?php

			}

			?>{{/php}}
			<h2 class="ecode_title"><a href="{{post_url}}" class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{post_title}}</a></h2>
			{{php}}<?php

			if( !empty( $post_excerpt ) ) {

			?>{{/php}}
			<p class="ecode_excerpt"{{builder}} data-edit="ecode_excerpt"{{/builder}}>{{post_excerpt}}</p>
			{{php}}<?php

			}

			?>{{/php}}
			<div class="ecode_author_categories_read_more">
				<p class="ecode_author_categories"{{builder}} data-edit="ecode_author_categories"{{/builder}}>{{copy_author}}{{copy_categories}}</p>
				<span class="ecode_read_more ecode_false_link" data-link="h2_parent"{{builder}} data-edit="ecode_read_more"{{/builder}}>{{copy_read_more}}</span>
			</div>
		</article>
		{{posts_loop_end}}<?php

			}

		} else {

		?>
		<h2>{{copy_without_notice}}</h2>
		<?php

		}

		?>{{/posts_loop_end}}
		<div class="ecode_container_pagination">
			{{php}}<?php

			$args_pagination = array(
				'prev_text' => __( 'Anteriores', 'frontecode' ),
				'next_text' => __( 'Siguientes', 'frontecode' ),
			);

			$array_pages = paginate_links( $args_pagination );

			echo $array_pages;

			?>{{/php}}
			{{builder}}<a class="prev page-numbers" href="#">Anteriores</a>
			<span class="page-numbers">1</span>
			<a class="page-numbers current" href="#">2</a>
			<a class="page-numbers" href="#">3</a>
			<a class="next page-numbers" href="#">Siguientes</a>{{/builder}}
		</div>
	</section>
</section>
