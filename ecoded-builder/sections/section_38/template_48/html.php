{{php}}<?php

setlocale( LC_ALL, 'es_ES' );

$post_id = get_the_ID();
$post    = get_post( $post_id );

$post_title           = get_the_title();
$post_url             = get_permalink();
$post_thumbnail_id    = get_post_thumbnail_id();
$post_content         = apply_filters( 'the_content', get_the_content() );
$post_author          = get_the_author_meta( 'display_name', $post->post_author );
$copy_author          = __( 'Por', 'frontecode' ) . ' ' . $post_author;
$post_date            = new DateTime( $post->post_date );
$format_post_date     = strftime( "%d %B, %Y", $post_date->getTimestamp() );
$copy_share           = __( 'Comparte este artículo', 'frontecode' );
$post_categories      = wp_get_post_categories( $post_id );
$post_number_comments = get_comments_number() . ' ' . __( 'comentarios', 'frontecode' );
$cat_content          = '';

if( !empty( $post_categories ) ) {

	for( $i = 0; $i < count( $post_categories ); $i++ ) {

		$cat = get_category( $post_categories[$i] );

		$cat_content .= '<a class="ecode_article_categories_link" href="'. get_category_link( $post_categories[$i] ) .'">'. $cat->name . '</a>';

		if( $i < ( count( $post_categories ) - 1 ) ) {

			$cat_content .= ', ';

		}

	}

}

if( !empty( $post_thumbnail_id ) ) {

	$post_thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'large' )[0];
	$post_thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', TRUE );
	$post_thumbnail_alt = !empty( $post_thumbnail_alt ) ? $post_thumbnail_alt : $post_title;

} else {

	$post_thumbnail_src = default_image_post( 'url' );
	$post_thumbnail_alt = $post_title;

}

// Get video ID
$post_url_video    = get_post_meta( $post_id, '_{{template_name}}_url_video', TRUE );
$post_url_video_id = '';

if( !empty( $post_url_video ) ) {

	preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $post_url_video, $match );
	$post_url_video_id = $match[1];

}

$url_twitter   = 'https://twitter.com/share?url=' . $post_url . '&text=' . $post_title;
$url_facebook  = 'https://www.facebook.com/sharer/sharer.php?u=' . $post_url;
$url_linkedin  = 'https://www.linkedin.com/sharing/share-offsite/?url=' . $post_url;
$url_email     = 'mailto:?subject=' . $post_title . '&amp;body=' . __( 'Mira este artículo', 'frontecode' ) . ': ' . $post_url;

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_38_template_48">
		{{php}}<?php

		if( !empty( $cat_content ) ) {

		?>
		<p class="ecode_article_categories">{{cat_content}}</p>
		<?php

		}

		?>{{/php}}
		{{builder}}{{cat_content}}{{/builder}} 
		{{php}}<?php

		if( !empty( $post_thumbnail_src ) ) {

		?>{{/php}}
		<figure class="ecode_article_figure">
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

		?>{{/php}}
		<div class="ecode_container_content">
			{{post_content}}
		</div>
		<div class="ecode_article_info">
			<p{{builder}} data-edit="ecode_article_info_text"{{/builder}}>{{format_post_date}} | {{post_number_comments}} | {{copy_author}}</p>
		</div>
		<div class="ecode_article_shared">
			<p class="ecode_article_shared_title">{{copy_share}}</p>
			<div class="ecode_article_shared_links">
				<a href="{{url_twitter}}"><i><svg width="16px" height="14px" viewBox="0 0 16 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-270.000000, -16.000000)" fill="#9c9c9c"><g transform="translate(270.000000, 16.000000)"><path d="M16,1.54292002 C15.405,1.80458482 14.771,1.97802547 14.11,2.06223943 C14.79,1.6552053 15.309,1.01558023 15.553,0.244621498 C14.919,0.62358431 14.219,0.891264391 13.473,1.04064391 C12.871,0.398011207 12.013,0 11.077,0 C9.261,0 7.799,1.47775446 7.799,3.28935711 C7.799,3.55001936 7.821,3.80065614 7.875,4.03926235 C5.148,3.90592359 2.735,2.5955945 1.114,0.599523179 C0.831,1.09177382 0.665,1.6552053 0.665,2.26174631 C0.665,3.40063984 1.25,4.41020479 2.122,4.99468976 C1.595,4.98466429 1.078,4.83127458 0.64,4.58966072 C0.64,4.59968619 0.64,4.61271931 0.64,4.62575242 C0.64,6.22381253 1.777,7.55118492 3.268,7.85696179 C3.001,7.93014773 2.71,7.96523688 2.408,7.96523688 C2.198,7.96523688 1.986,7.95320632 1.787,7.90909424 C2.212,9.21140295 3.418,10.1688355 4.852,10.1999144 C3.736,11.0751381 2.319,11.6024778 0.785,11.6024778 C0.516,11.6024778 0.258,11.5904473 -5.32907052e-14,11.5573632 C1.453,12.4967499 3.175,13.0331126 5.032,13.0331126 C11.068,13.0331126 14.368,8.02037697 14.368,3.67533775 C14.368,3.52996842 14.363,3.38961182 14.356,3.25025777 C15.007,2.787081 15.554,2.20861131 16,1.54292002 Z"></path></g></g></g></svg></i></a>
				<a href="{{url_facebook}}"><i><svg width="9px" height="16px" viewBox="0 0 9 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-179.000000, -259.000000)" fill="#9c9c9c"><g transform="translate(179.000000, 259.000000)"><path d="M5.39323077,15.9116923 L5.39323077,8.65415385 L7.82830769,8.65415385 L8.19364103,5.82492308 L5.39323077,5.82492308 L5.39323077,4.01887179 C5.39323077,3.2 5.61969231,2.64194872 6.79528205,2.64194872 L8.29220513,2.64133333 L8.29220513,0.110769231 C8.03333333,0.0771282051 7.14471795,0 6.11046154,0 C3.95076923,0 2.47220513,1.31825641 2.47220513,3.73866667 L2.47220513,5.82492308 L0.0297435897,5.82492308 L0.0297435897,8.65415385 L2.47220513,8.65415385 L2.47220513,15.9116923 L5.39323077,15.9116923 Z"></path></g></g></g></svg></i></a>
				<a href="{{url_linkedin}}"><i><svg width="16px" height="16px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-345.000000, -168.000000)" fill="#9c9c9c"><g transform="translate(345.000000, 168.000000)"><rect x="0" y="5" width="3.578" height="11"></rect><path d="M13.324,5.129 C13.286,5.117 13.25,5.104 13.21,5.093 C13.162,5.082 13.114,5.073 13.065,5.065 C12.875,5.027 12.667,5 12.423,5 C10.337,5 9.014,6.517 8.578,7.103 L8.578,5 L5,5 L5,16 L8.578,16 L8.578,10 C8.578,10 11.282,6.234 12.423,9 C12.423,11.469 12.423,16 12.423,16 L16,16 L16,8.577 C16,6.915 14.861,5.53 13.324,5.129 Z"></path><circle cx="1.75" cy="1.75" r="1.75"></circle></g></g></g></svg></i></a>
				<a href="{{url_email}}"><i><svg width="50px" height="35px" viewBox="0 0 50 35" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-160.000000, -28.000000)" fill="#9c9c9c"><g transform="translate(160.000000, 28.000000)"><polygon points="33.14375 17.44375 50 28.1 50 6.3375"></polygon><polygon points="0 6.3375 0 28.1 16.85625 17.44375"></polygon><path d="M46.875,0 L3.125,0 C1.565625,0 0.328125,1.1625 0.09375,2.659375 L25,19.06875 L49.90625,2.659375 C49.671875,1.1625 48.434375,0 46.875,0 Z"></path><path d="M30.28125,19.33125 L25.859375,22.24375 C25.596875,22.415625 25.3,22.5 25,22.5 C24.7,22.5 24.403125,22.415625 24.140625,22.24375 L19.71875,19.328125 L0.1,31.7375 C0.340625,33.221875 1.571875,34.375 3.125,34.375 L46.875,34.375 C48.428125,34.375 49.659375,33.221875 49.9,31.7375 L30.28125,19.33125 Z"></path></g></g></g></svg></i></a>
			</div>
		</div>
	</section>
</section>