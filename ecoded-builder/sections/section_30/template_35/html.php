{{php}}<?php

setlocale( LC_ALL, 'es_ES' );

$copy_without_notice = __( 'Todavía no hay noticias en nuestro blog.', 'frontecode' );

?>{{/php}}
<section id="page_section_{{page_section_id}}" {{builder}}class="page_section"{{/builder}}>
	<section class="ecode_section_30_template_35">
		{{posts_loop_start}}<?php

		if( have_posts() ) {

			while( have_posts() ) {

				the_post();

				$post_id = get_the_ID();
				$post = get_post( $post_id );

				$post_url             = get_permalink();
				$post_title           = get_the_title();
				$post_thumbnail_id    = get_post_thumbnail_id();
				$post_excerpt         = get_the_excerpt();
				$post_author          = get_the_author_meta( 'display_name', $post->post_author );
				$copy_author          = __( 'Por', 'frontecode' ) . ' ' . $post_author;
				$post_date            = new DateTime( $post->post_date );
				$format_post_date     = strftime( "%d %B %Y", $post_date->getTimestamp() );
				$post_categories      = wp_get_post_categories( $post_id );
				$post_number_comments = get_comments_number() . ' ' . __( 'comentarios', 'frontecode' );
				$copy_read_more       = __( 'Leer más', 'frontecode' );

				if( !empty( $post_thumbnail_id ) ) {

					$post_thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'large' )[0];
					$post_thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', TRUE );
					$post_thumbnail_alt = !empty( $post_thumbnail_alt ) ? $post_thumbnail_alt : $post_title;

				} else {

					$post_thumbnail_src = default_image_post( 'url' );
					$post_thumbnail_alt = $post_title;

				}

				// Get video ID
				$post_url_video    = get_post_meta( $post_id, '_single-post_url_video', TRUE );
				$post_url_video_id = '';

				if( !empty( $post_url_video ) ) {

					preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $post_url_video, $match);
					$post_url_video_id = $match[1];

				}

				$cat_content = '';

				if( !empty( $post_categories ) ) {

					for( $i = 0; $i < count( $post_categories ); $i++ ) {

						$cat = get_category( $post_categories[$i] );

						$cat_content .= '<a class="ecode_article_categories_link" href="'. get_category_link( $post_categories[$i] ) .'">'. $cat->name . '</a>';

						if( $i < ( count( $post_categories ) - 1 ) ) {

							$cat_content .= ', ';

						}

					}

				}

		?>{{/posts_loop_start}}
		<article class="ecode_article">
			{{php}}<?php

			if( !empty( $cat_content ) ) {

			?>
			<p class="ecode_article_categories">{{cat_content}}</p>
			<?php

			}

			?>{{/php}}
			{{builder}}{{cat_content}}{{/builder}}
			<h2 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}><a href="{{post_url}}">{{post_title}}</a></h2>
			{{php}}<?php

			if( !empty( $post_thumbnail_src ) ) {

			?>{{/php}}
			<figure class="ecode_article_figure ecode_false_link" data-link="h2">
				{{php}}<?php

				if( !empty( $post_url_video_id ) ) {

				?>{{/php}}
				<i><svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M36.4498 29.1118L72.6289 49.9998L36.4498 70.8878L36.4498 29.1118Z" stroke="#fff" stroke-width="3"/><circle cx="50" cy="50" r="49" stroke="#fff" stroke-width="3"/></svg></i>
				<img loading="lazy" src="{{post_thumbnail_src}}" class="ecode_image_video" alt="{{post_thumbnail_alt}}" data-id="{{post_url_video_id}}">
				{{php}}<?php

				} else {

				?>
				<img loading="lazy" src="{{post_thumbnail_src}}" alt="{{post_thumbnail_alt}}">
				<?php

				}

				?>{{/php}}
			</figure>
			{{php}}<?php

			}

			if( !empty( $post_excerpt ) ) {

			?>{{/php}}
			<div class="ecode_container_content">
				{{post_excerpt}}
			</div>
			{{php}}<?php

			}

			?>{{/php}}
			<span class="ecode_button ecode_button_border_c_c ecode_false_link" data-link="h2"{{builder}} data-edit="ecode_button_border_c_c"{{/builder}}>{{copy_read_more}}</span>
			<div class="ecode_article_info">
				<p>{{format_post_date}} | {{post_number_comments}} | {{copy_author}}</p>
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
