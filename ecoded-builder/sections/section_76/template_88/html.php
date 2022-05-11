{{php}}<?php

setlocale( LC_ALL, 'es_ES' );

$copy_without_notice = __( 'Todavía no hay noticias en nuestro blog.', 'frontecode' );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_76_template_88{{builder}} hover_effect{{/builder}}"{{builder}} data-edit="ecode_section_76_template_88"{{/builder}}>
		<div class="ecode_width_76_88">
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
					$post_number_comments = get_comments_number();
					$copy_read_more       = __( 'Leer más >', 'frontecode' );

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
				<div class="ecode_article_figure"{{builder}} data-edit="ecode_article_figure"{{/builder}}>
					<figure class="ecode_false_link" data-link="h3_parent">
						<img loading="lazy" src="{{post_thumbnail_src}}" alt="{{post_thumbnail_alt}}">
						<div class="back_info"{{builder}} data-edit="back_info"{{/builder}}>
							<span class="back_info_title"{{builder}} data-edit="back_info_title"{{/builder}}>{{post_title}}</span>
						</div>
					</figure>
				</div>
				<div class="ecode_featured_info"{{builder}} data-edit="ecode_featured_info"{{/builder}}>
					<h3 class="ecode_featured_title"{{builder}} data-edit="ecode_featured_title"{{/builder}}><a href="{{post_url}}">{{post_title}}</a></h3>
					<p class="ecode_featured_author_date"{{builder}} data-edit="ecode_featured_author_date"{{/builder}}>
						<span class="ecode_featured_author">{{copy_author}}</span>
						<time class="ecode_featured_date"{{builder}} data-edit="ecode_featured_date"{{/builder}}> | {{format_post_date}}</time>
					</p>
					{{php}}<?php

					if( !empty( $post_excerpt ) ) {

					?>{{/php}}
					<p class="ecode_featured_excerpt"{{builder}} data-edit="ecode_featured_excerpt"{{/builder}}>{{post_excerpt}}</p>
					{{php}}<?php

					}

					?>{{/php}}
					<div class="ecode_featured_button_comments">
						<span class="ecode_button_read_more ecode_false_link" data-link="h3_parent"{{builder}} data-edit="ecode_button_read_more"{{/builder}}>{{copy_read_more}}</span>
						{{php}}<?php

						if( !empty( $post_number_comments ) ) {

						?>{{/php}}
						<a href="{{post_url}}" class="ecode_button_comments"{{builder}} data-edit="ecode_button_comments"{{/builder}}><svg width="40px" height="40px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-171.000000, -11.000000)" fill="#333333"><g transform="translate(171.000000, 11.000000)"><path d="M8.851875,30.9483112 C5.61710937,27.7390309 3.63921875,23.5802557 3.18,19.0941446 C1.46078125,21.2893782 0.52859375,23.9818497 0.532890625,26.8076073 C0.53578125,28.6455177 0.9453125,30.472459 1.72132812,32.1245265 L0.121171875,36.8283617 C-0.15390625,37.6369949 0.04703125,38.5149937 0.645625,39.1197128 C1.066875,39.5452178 1.62226562,39.7718592 2.1934375,39.7718592 C2.43375,39.7718592 2.676875,39.7317708 2.91398437,39.6494634 L7.5709375,38.033065 C9.20648438,38.8169192 11.0151563,39.2305871 12.8346875,39.2335069 C15.6869531,39.2373737 18.4015625,38.2598643 20.5972656,36.4582544 C16.1822656,36.0547664 12.06375,34.1347854 8.851875,30.9483112 Z"></path><path d="M39.8559375,31.3953598 L37.5327344,24.5659722 C38.6525781,22.2536301 39.244375,19.681976 39.2483594,17.0944602 C39.2552344,12.5953283 37.5319531,8.34130366 34.3958594,5.1160827 C31.2591406,1.89015152 27.0792969,0.0743371212 22.6261719,0.00307765152 C18.0085937,-0.0707070707 13.6682812,1.70344066 10.4052344,4.99936869 C7.1421875,8.29537563 5.38546875,12.6794508 5.45859375,17.3439078 C5.52914062,21.841935 7.32679687,26.0640783 10.5203125,29.2324811 C13.7070312,32.3940972 17.9078125,34.1343119 22.3524219,34.134154 C22.3611719,34.134154 22.3703906,34.134154 22.3789844,34.134154 C24.9407031,34.1301294 27.4866406,33.5323548 29.7758594,32.4011995 L36.5371094,34.7479482 C36.8188281,34.8457229 37.1077344,34.893387 37.3932812,34.893387 C38.0720312,34.893387 38.7320312,34.6241319 39.2327344,34.1182923 C39.9440625,33.3997001 40.1828125,32.3564552 39.8559375,31.3953598 Z"></path></g></g></g></svg>{{post_number_comments}}</a>
						{{php}}<?php

						}

						?>{{/php}}
					</div>
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
					'prev_text' => __( '< Anteriores', 'frontecode' ),
					'next_text' => __( 'Siguientes >', 'frontecode' ),
				);

				$array_pages = paginate_links( $args_pagination );

				echo $array_pages;

				?>{{/php}}
				{{builder}}<a class="prev page-numbers" href="#">< Anteriores</a>
				<span class="page-numbers">1</span>
				<a class="page-numbers current" href="#">2</a>
				<a class="page-numbers" href="#">3</a>
				<a class="next page-numbers" href="#">Siguientes ></a>{{/builder}}
			</div>
		</div>
	</section>
</section>
