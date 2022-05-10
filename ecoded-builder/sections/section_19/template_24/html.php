{{php}}<?php

setlocale( LC_ALL, 'es_ES' );

$post_id = get_the_ID();
$post    = get_post( $post_id );

$post_title        = get_the_title();
$post_url          = get_permalink();
$post_thumbnail_id = get_post_thumbnail_id();
$post_content      = apply_filters( 'the_content', get_the_content() );
$post_author       = get_the_author_meta( 'display_name', $post->post_author );
$copy_author       = __( 'Por', 'frontecode' ) . ' ' . $post_author;
$post_date         = new DateTime( $post->post_date );
$format_post_date  = strftime( "%d %B, %Y", $post_date->getTimestamp() );
$copy_share        = __( 'Comparte este artículo', 'frontecode' );
$post_categories   = wp_get_post_categories( $post_id );
$cat_content       = '';

if( !empty( $post_categories ) ) {

	$cat_content = ' | ';

	for( $i = 0; $i < count( $post_categories ); $i++ ) {

		$cat = get_category( $post_categories[$i] );

		$cat_content .= '<a href="'. get_category_link( $post_categories[$i] ) .'">'. $cat->name . '</a>';

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

$url_facebook  = 'https://www.facebook.com/sharer/sharer.php?u=' . $post_url;
$url_twitter   = 'https://twitter.com/share?url=' . $post_url . '&text=' . $post_title;
$url_linkedin  = 'https://www.linkedin.com/sharing/share-offsite/?url=' . $post_url;
$url_whatsapp  = 'whatsapp://send?text=' . $post_title . ' visto en => ' . $post_url;
$url_pinterest = 'https://pinterest.com/pin/create/button/?url=' . $post_url . '&media=' . $post_thumbnail_src . '&description=' . $post_title;
$url_email     = 'mailto:?subject=' . $post_title . '&amp;body=' . __( 'Mira este artículo', 'frontecode' ) . ': ' . $post_url;

?>{{/php}}
<section id="page_section_{{page_section_id}}" {{builder}}class="page_section"{{/builder}}>
	<section class="ecode_section_19_template_24"{{builder}} data-edit="ecode_section_19_template_24"{{/builder}}>
		{{php}}<?php

		if( !empty( $post_thumbnail_src ) ) {

		?>{{/php}}
		<figure class="ecode_image" {{builder}} data-edit="ecode_image"{{/builder}}>
			<img loading="lazy" src="{{post_thumbnail_src}}" alt="{{post_thumbnail_alt}}">
		</figure>
		{{php}}<?php

		}

		?>{{/php}}
		<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
			{{post_content}}
		</div>
		<div class="ecode_author_categories">
			<p class="ecode_author_categories_text"{{builder}} data-edit="ecode_author_categories_text"{{/builder}}>{{copy_author}} | {{format_post_date}}{{cat_content}}</p>
		</div>
		<div class="ecode_shared_post">
			<p class="ecode_shared_text"{{builder}} data-edit="ecode_shared_text"{{/builder}}>{{copy_share}}</p>
			<div class="ecode_shared">
				<a href="{{url_facebook}}" class="facebook"><i><svg width="51px" height="100px" viewBox="0 0 51 100" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-41.000000, -11.000000)" fill="#FFFFFF"><g transform="translate(41.000000, 11.000000)"><path d="M41.621134,16.6041667 L50.7430611,16.6041667 L50.7430611,0.704166667 C49.1693101,0.4875 43.7569389,2.77555756e-17 37.4536082,2.77555756e-17 C24.3015464,2.77555756e-17 15.2920301,8.27916667 15.2920301,23.4958333 L15.2920301,37.5 L0.778548771,37.5 L0.778548771,55.275 L15.2920301,55.275 L15.2920301,100 L33.0862411,100 L33.0862411,55.2791667 L47.0126883,55.2791667 L49.2234338,37.5041667 L33.0820777,37.5041667 L33.0820777,25.2583333 C33.0862411,20.1208333 34.4684774,16.6041667 41.621134,16.6041667 Z"></path></g></g></g></svg></i>Compartir en Facebook</a>
				<a href="{{url_twitter}}" class="twitter"><i><svg width="194px" height="158px" viewBox="0 0 194 158" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-422.000000, -205.000000)" fill="#FFFFFF"><g transform="translate(422.000000, 205.000000)"><path d="M194,18.7047692 C186.785625,21.8769231 179.098375,23.9795385 171.08375,25.0004615 C179.32875,20.066 185.621625,12.3118462 188.580125,2.96553846 C180.892875,7.55969231 172.405375,10.8047692 163.360125,12.6156923 C156.060875,4.82507692 145.657625,0 134.308625,0 C112.289625,0 94.562875,17.9147692 94.562875,39.8767692 C94.562875,43.0367692 94.829625,46.0752308 95.484375,48.9678462 C62.4195,47.3513846 33.161875,31.4663077 13.50725,7.268 C10.075875,13.2355385 8.063125,20.066 8.063125,27.4190769 C8.063125,41.2258462 15.15625,53.4647692 25.72925,60.5504615 C19.339375,60.4289231 13.07075,58.5693846 7.76,55.6403077 C7.76,55.7618462 7.76,55.9198462 7.76,56.0778462 C7.76,75.4510769 21.546125,91.5427692 39.6245,95.2496923 C36.387125,96.1369231 32.85875,96.5623077 29.197,96.5623077 C26.65075,96.5623077 24.08025,96.4164615 21.667375,95.8816923 C26.8205,111.669538 41.44325,123.276462 58.8305,123.653231 C45.299,134.263538 28.117875,140.656462 9.518125,140.656462 C6.2565,140.656462 3.12825,140.510615 0,140.109538 C17.617625,151.497692 38.496875,158 61.013,158 C134.1995,158 174.212,97.2307692 174.212,44.556 C174.212,42.7936923 174.151375,41.0921538 174.0665,39.4027692 C181.959875,33.7876923 188.59225,26.7749231 194,18.7047692 Z"></path></g></g></g></svg></i>Compartir en Twitter</a>
				<a href="{{url_linkedin}}" class="linkedin"><i><svg width="194px" height="194px" viewBox="0 0 194 194" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-212.000000, -11.000000)" fill="#FFFFFF"><g transform="translate(212.000000, 11.000000)"><path d="M193.9515,194 L193.9515,193.991917 L194,193.991917 L194,122.842417 C194,88.0355833 186.50675,61.2231667 145.81525,61.2231667 C126.253583,61.2231667 113.12625,71.9578333 107.767,82.13475 L107.201167,82.13475 L107.201167,64.4726667 L68.6194167,64.4726667 L68.6194167,193.991917 L108.793583,193.991917 L108.793583,129.85875 C108.793583,112.972667 111.994583,96.6443333 132.906167,96.6443333 C153.510583,96.6443333 153.81775,115.915 153.81775,130.941917 L153.81775,194 L193.9515,194 Z"></path><polygon points="3.201 64.48075 43.4236667 64.48075 43.4236667 194 3.201 194"></polygon><path d="M23.2961667,0 C10.4355833,0 0,10.4355833 0,23.2961667 C0,36.15675 10.4355833,46.8105833 23.2961667,46.8105833 C36.15675,46.8105833 46.5923333,36.15675 46.5923333,23.2961667 C46.58425,10.4355833 36.1486667,3.58972111e-15 23.2961667,0 Z"></path></g></g></g></svg></i>Compartir en Linkedin</a>
				<a href="{{url_whatsapp}}" class="whatsapp"><i><svg width="194px" height="194px" viewBox="0 0 194 194" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-775.000000, -175.000000)" fill="#FFFFFF"><g transform="translate(775.000000, 175.000000)"><path d="M141.514917,115.64825 L141.442167,116.2545 C123.666917,107.395167 121.80775,106.215 119.512083,109.6585 C117.919667,112.043083 113.279833,117.450833 111.881417,119.051333 C110.466833,120.627583 109.060333,120.748833 106.659583,119.657583 C104.234583,118.445083 96.4503333,115.898833 87.2353333,107.653833 C80.0573333,101.227583 75.2396667,93.3463333 73.817,90.9213333 C71.4485833,86.8311667 76.4036667,86.2491667 80.9141667,77.7131667 C81.7225,76.0156667 81.31025,74.6819167 80.7120833,73.4775 C80.1058333,72.265 75.2800833,60.3825 73.25925,55.6456667 C71.31925,50.925 69.3226667,51.5231667 67.82725,51.5231667 C63.17125,51.119 59.7681667,51.1836667 56.76925,54.3038333 C43.72275,68.6436667 47.0126667,83.4361667 58.17575,99.1663333 C80.1139167,127.878333 91.8024167,133.164833 113.17475,140.5045 C118.94625,142.339417 124.2085,142.08075 128.371417,141.482583 C133.01125,140.747 142.654667,135.6545 144.667417,129.95575 C146.728667,124.257 146.728667,119.52825 146.122417,118.437 C145.52425,117.34575 143.939917,116.7395 141.514917,115.64825 Z"></path><path d="M165.87,27.8794167 C103.71725,-32.204 0.856833333,11.37325 0.816416667,96.1350833 C0.816416667,113.07775 5.25416667,129.600083 13.7093333,144.1905 L0,194 L51.2079167,180.646333 C115.106667,215.162167 193.967667,169.329667 194,96.1835833 C194,70.5109167 183.976667,46.3498333 165.74875,28.1946667 L165.87,27.8794167 Z M177.8495,95.9168333 C177.801,157.616917 110.07075,196.150167 56.5025,164.6575 L53.5925,162.927667 L23.28,170.808917 L31.40375,141.345167 L29.4718333,138.313917 C-3.86383333,85.2468333 34.435,15.8918333 97.582,15.8918333 C119.035167,15.8918333 139.17075,24.2580833 154.335083,39.4143333 C169.491333,54.44125 177.8495,74.5768333 177.8495,95.9168333 Z" fill-rule="nonzero"></path></g></g></g></svg></i>Compartir en WhatsApp</a>
				<a href="{{url_pinterest}}" class="pinterest"><i><svg width="158px" height="194px" viewBox="0 0 158 194" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-669.000000, -11.000000)" fill="#FFFFFF"><g transform="translate(667.000000, 11.000000)"><path d="M83.6406,1.25825276e-14 C30.3507,0.00808333333 2.025,34.0793333 2.025,71.2303333 C2.025,88.4559167 11.6721,109.9495 27.1188,116.76375 C31.5252,118.744167 30.942,116.32725 34.7328,101.858083 C35.0325,100.653667 34.8786,99.6109167 33.9066,98.4873333 C11.826,73.0005833 29.5974,20.6044167 80.4897,20.6044167 C154.143,20.6044167 140.3811,122.308917 93.3039,122.308917 C81.1701,122.308917 72.1305,112.802917 74.9898,101.041667 C78.4566,87.03325 85.2444,71.974 85.2444,61.8779167 C85.2444,36.4315833 47.2554,40.2065 47.2554,73.9220833 C47.2554,84.3415 50.949,91.374 50.949,91.374 C50.949,91.374 38.7261,140.65 36.4581,149.856917 C32.6187,165.441583 36.9765,190.669667 37.3572,192.844083 C37.5921,194.040417 38.9367,194.420333 39.69,193.434167 C40.8969,191.857917 55.6713,170.825083 59.8104,155.620333 C61.317,150.08325 67.4973,127.611583 67.4973,127.611583 C71.5716,134.95125 83.3166,141.094583 95.8311,141.094583 C133.0587,141.094583 159.9669,108.437917 159.9669,67.9161667 C159.8373,29.0676667 126.522,-1.77635684e-15 83.6406,1.25825276e-14 Z"></path></g></g></g></svg></i>Compartir en Pinterest</a>
				<a href="{{url_email}}" class="email"><i><svg width="100px" height="77px" viewBox="0 0 100 77" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-29.000000, -195.000000)" fill="#FFFFFF" fill-rule="nonzero"><g transform="translate(29.000000, 195.000000)"><path d="M91.2109375,0 L8.7890625,0 C3.94882812,0 0,3.95057891 0,8.80253767 L0,67.4861221 C0,72.3216495 3.93125,76.2886598 8.7890625,76.2886598 L91.2109375,76.2886598 C96.0390625,76.2886598 100,72.3513825 100,67.4861221 L100,8.80253767 C100,3.96701031 96.06875,0 91.2109375,0 Z M89.9972656,5.86835845 L50.1863281,45.7405287 L10.0310547,5.86835845 L89.9972656,5.86835845 Z M5.859375,66.2709807 L5.859375,9.98970658 L34.0779297,38.009162 L5.859375,66.2709807 Z M10.0025391,70.4203013 L38.2388672,42.140682 L48.1328125,51.9647053 C49.278125,53.1019931 51.1263672,53.0982765 52.2669922,51.9557071 L61.9140625,42.2938462 L89.9974609,70.4203013 L10.0025391,70.4203013 Z M94.140625,66.2707851 L66.0572266,38.1443299 L94.140625,10.0176791 L94.140625,66.2707851 Z"></path></g></g></g></svg></i>Compartir en Email</a>
			</div>
		</div>
	</section>
</section>
