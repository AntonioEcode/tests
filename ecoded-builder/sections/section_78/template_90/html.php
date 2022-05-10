{{php}}<?php

setlocale( LC_ALL, 'es_ES' );

$post_id = get_the_ID();
$post    = get_post( $post_id );

$post_title           = get_the_title();
$post_excerpt         = get_the_excerpt();
$post_url             = get_permalink();
$post_thumbnail_id    = get_post_thumbnail_id();
$post_content         = apply_filters( 'the_content', get_the_content() );
$post_author          = get_the_author_meta( 'display_name', $post->post_author );
$copy_author          = __( 'Por', 'frontecode' ) . ' ' . $post_author;
$post_date            = new DateTime( $post->post_date );
$format_post_date     = strftime( "%d %B, %Y", $post_date->getTimestamp() );
$post_categories      = wp_get_post_categories( $post_id );
$post_number_comments = get_comments_number() . ' ' . __( 'comentarios', 'frontecode' );
$cat_content          = '';

if( !empty( $post_categories ) ) {

	for( $i = 0; $i < count( $post_categories ); $i++ ) {

		$cat = get_category( $post_categories[$i] );

		// $cat_content .= '<a class="ecode_article_categories_link" href="'. get_category_link( $post_categories[$i] ) .'">'. $cat->name . '</a>';
		$cat_content .= $cat->name;

		if( $i < ( count( $post_categories ) - 1 ) ) {

			$cat_content .= ', ';

		}

	}

}

if( !empty( $post_thumbnail_id ) ) {

	$post_thumbnail_mobile_src = wp_get_attachment_image_src( $post_thumbnail_id, 'large' )[0];
	$post_thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'full' )[0];
	$post_thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', TRUE );
	$post_thumbnail_alt = !empty( $post_thumbnail_alt ) ? $post_thumbnail_alt : $post_title;

} else {

	$post_thumbnail_mobile_src = default_image_post( 'url' );
	$post_thumbnail_src = default_image_post( 'url' );
	$post_thumbnail_alt = $post_title;

}

$url_twitter   = 'https://twitter.com/share?url=' . $post_url . '&text=' . $post_title;
$url_facebook  = 'https://www.facebook.com/sharer/sharer.php?u=' . $post_url;
$url_linkedin  = 'https://www.linkedin.com/sharing/share-offsite/?url=' . $post_url;

$copy_author_title    = __( 'Autor', 'frontecode' );
$copy_category_title  = __( 'Categoría', 'frontecode' );
$copy_post_date_title = __( 'Publicado el', 'frontecode' );
$copy_share           = __( 'Comparte este artículo', 'frontecode' );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_78_template_90"{{builder}} data-edit="ecode_section_78_template_90"{{/builder}}>
		<div class="ecode_width_78_90">
			<section class="ecode_post_info_content"{{builder}} data-edit="ecode_post_info_content"{{/builder}}>
				{{php}}<?php

				if( !empty( $post_excerpt ) ) {

				?>{{/php}}
				<p class="ecode_description"{{builder}} data-edit="ecode_description"{{/builder}}>{{post_excerpt}}</p>
				{{php}}<?php

				}

				if( !empty( $post_thumbnail_src ) ) {

				?>{{/php}}
				<picture class="ecode_thumbnail">
					<source media="(min-width:1024px)" srcset="{{post_thumbnail_src}}">
					<img loading="lazy" src="{{post_thumbnail_mobile_src}}" alt="{{post_thumbnail_alt}}">
				</picture>
				{{php}}<?php

				}

				?>{{/php}}
				<section class="ecode_post_info"{{builder}} data-edit="ecode_post_info"{{/builder}}>
					<div class="ecode_info"{{builder}} data-edit="ecode_info"{{/builder}}>
						<p class="ecode_info_title"{{builder}} data-edit="ecode_info_title"{{/builder}}>{{copy_author_title}}</p>
						<p class="ecode_info_text"{{builder}} data-edit="ecode_info_text"{{/builder}}>{{post_author}}</p>
					</div>
					<div class="ecode_info"{{builder}} data-edit="ecode_info"{{/builder}}>
						<p class="ecode_info_title"{{builder}} data-edit="ecode_info_title"{{/builder}}>{{copy_category_title}}</p>
						<p class="ecode_info_text"{{builder}} data-edit="ecode_info_text"{{/builder}}>{{cat_content}}</p>
					</div>
					<div class="ecode_info"{{builder}} data-edit="ecode_info"{{/builder}}>
						<p class="ecode_info_title"{{builder}} data-edit="ecode_info_title"{{/builder}}>{{copy_post_date_title}}</p>
						<p class="ecode_info_text"{{builder}} data-edit="ecode_info_text"{{/builder}}>{{format_post_date}}</p>
					</div>
				</section>
				<section class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
					{{post_content}}
				</section>
			</section>
			<section class="ecode_post_author_date_comments">
				<p class="ecode_text_author_date_comments"{{builder}} data-edit="ecode_text_author_date_comments"{{/builder}}>{{copy_author}} | {{format_post_date}} | {{post_number_comments}}</p>
			</section>
			<section class="ecode_post_shared"{{builder}} data-edit="ecode_post_shared"{{/builder}}>
				<p class="ecode_title_shared"{{builder}} data-edit="ecode_title_shared"{{/builder}}>{{copy_share}}</p>
				<div class="ecode_social">
					<a href="{{url_facebook}}"><!-- Facebook -->
						<svg width="9px" height="16px" viewBox="0 0 9 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-101.000000, -53.000000)" fill="#6B6B6B"><g transform="translate(101.000000, 53.000000)"><path d="M6.921,2.65666667 L8.43784615,2.65666667 L8.43784615,0.112666667 C8.17615385,0.078 7.27615385,2.77555756e-17 6.228,2.77555756e-17 C4.041,2.77555756e-17 2.54284615,1.32466667 2.54284615,3.75933333 L2.54284615,6 L0.129461538,6 L0.129461538,8.844 L2.54284615,8.844 L2.54284615,16 L5.50176923,16 L5.50176923,8.84466667 L7.81753846,8.84466667 L8.18515385,6.00066667 L5.50107692,6.00066667 L5.50107692,4.04133333 C5.50176923,3.21933333 5.73161538,2.65666667 6.921,2.65666667 Z"></path></g></g></g></svg>
					</a>
					<a href="{{url_twitter}}"><!-- Twitter -->
						<svg width="16px" height="13px" viewBox="0 0 16 13" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-203.000000, -46.000000)" fill="#6B6B6B"><g transform="translate(203.000000, 46.000000)"><path d="M16,1.539 C15.405,1.8 14.771,1.973 14.11,2.057 C14.79,1.651 15.309,1.013 15.553,0.244 C14.919,0.622 14.219,0.889 13.473,1.038 C12.871,0.397 12.013,0 11.077,0 C9.261,0 7.799,1.474 7.799,3.281 C7.799,3.541 7.821,3.791 7.875,4.029 C5.148,3.896 2.735,2.589 1.114,0.598 C0.831,1.089 0.665,1.651 0.665,2.256 C0.665,3.392 1.25,4.399 2.122,4.982 C1.595,4.972 1.078,4.819 0.64,4.578 C0.64,4.588 0.64,4.601 0.64,4.614 C0.64,6.208 1.777,7.532 3.268,7.837 C3.001,7.91 2.71,7.945 2.408,7.945 C2.198,7.945 1.986,7.933 1.787,7.889 C2.212,9.188 3.418,10.143 4.852,10.174 C3.736,11.047 2.319,11.573 0.785,11.573 C0.516,11.573 0.258,11.561 -5.32907052e-14,11.528 C1.453,12.465 3.175,13 5.032,13 C11.068,13 14.368,8 14.368,3.666 C14.368,3.521 14.363,3.381 14.356,3.242 C15.007,2.78 15.554,2.203 16,1.539 Z"></path></g></g></g></svg>
					</a>
					<a href="{{url_linkedin}}"><!-- Linkedin -->
						<svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-47.000000, -138.000000)" fill="#6B6B6B"><g transform="translate(47.000000, 138.000000)"><path d="M49.9875,50 L49.9875,49.9979167 L50,49.9979167 L50,31.6604167 C50,22.6895833 48.06875,15.7791667 37.58125,15.7791667 C32.5395833,15.7791667 29.15625,18.5458333 27.775,21.16875 L27.6291667,21.16875 L27.6291667,16.6166667 L17.6854167,16.6166667 L17.6854167,49.9979167 L28.0395833,49.9979167 L28.0395833,33.46875 C28.0395833,29.1166667 28.8645833,24.9083333 34.2541667,24.9083333 C39.5645833,24.9083333 39.64375,29.875 39.64375,33.7479167 L39.64375,50 L49.9875,50 Z"></path><polygon points="0.825 16.61875 11.1916667 16.61875 11.1916667 50 0.825 50"></polygon><path d="M6.00416667,0 C2.68958333,0 0,2.68958333 0,6.00416667 C0,9.31875 2.68958333,12.0645833 6.00416667,12.0645833 C9.31875,12.0645833 12.0083333,9.31875 12.0083333,6.00416667 C12.00625,2.68958333 9.31666667,9.25185854e-16 6.00416667,0 Z"></path></g></g></g></svg>
					</a>
				</div>
			</section>
		</div>
	</section>
</section>
