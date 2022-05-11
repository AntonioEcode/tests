{{php}}<?php

$current_id = wpeb_get_id();

$title = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$slides_group = get_post_meta( $current_id, '_{{template_name}}_slides_group_{{page_section_id}}', TRUE );

$address = get_post_meta( $current_id, '_{{template_name}}_address_{{page_section_id}}', TRUE );
$custom_title = get_post_meta( $current_id, '_{{template_name}}_title_{{page_section_id}}', TRUE );
$title = !empty( $custom_title ) ? $custom_title : $title;
$txt_button_1 = get_post_meta( $current_id, '_{{template_name}}_txt_button_1_{{page_section_id}}', TRUE );
$link_button_1 = get_post_meta( $current_id, '_{{template_name}}_link_button_1_{{page_section_id}}', TRUE );
$txt_button_2 = get_post_meta( $current_id, '_{{template_name}}_txt_button_2_{{page_section_id}}', TRUE );
$link_button_2 = get_post_meta( $current_id, '_{{template_name}}_link_button_2_{{page_section_id}}', TRUE );
$date = get_post_meta( $current_id, '_{{template_name}}_date_{{page_section_id}}', TRUE );
$city = get_post_meta( $current_id, '_{{template_name}}_city_{{page_section_id}}', TRUE );
$place = get_post_meta( $current_id, '_{{template_name}}_place_{{page_section_id}}', TRUE );
$image_hd = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}', TRUE );
$image_hd_id = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}_id', TRUE );
$image_hd_id = empty( $image_hd_id ) ? attachment_url_to_postid( $image_hd ) : $image_hd_id;
$image_hd_src = wp_get_attachment_image_src( $image_hd_id, 'full' )[0];
$image_alt = get_post_meta( $image_hd_id, '_wp_attachment_image_alt', TRUE );
$image_alt = !empty( $image_alt ) ? $image_alt : $title;

$image_desktop = get_post_meta( $current_id, '_{{template_name}}_image_desktop_{{page_section_id}}', TRUE );
$image_desktop_id = get_post_meta( $current_id, '_{{template_name}}_image_desktop_{{page_section_id}}_id', TRUE );
$image_desktop_id = empty( $image_desktop_id ) ? attachment_url_to_postid( $image_desktop ) : $image_desktop_id;
$image_desktop_src = wp_get_attachment_image_src( $image_desktop_id, 'full' )[0];

$image_tablet = get_post_meta( $current_id, '_{{template_name}}_image_tablet_{{page_section_id}}', TRUE );
$image_tablet_id = get_post_meta( $current_id, '_{{template_name}}_image_tablet_{{page_section_id}}_id', TRUE );
$image_tablet_id = empty( $image_tablet_id ) ? attachment_url_to_postid( $image_tablet ) : $image_tablet_id;
$image_tablet_src = !empty( $image_tablet_src = wp_get_attachment_image_src( $image_tablet_id, 'full' )[0] ) ? $image_tablet_src : $image_hd_src;

$image = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}', TRUE );
$image_id = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}_id', TRUE );
$image_id = empty( $image_id ) ? attachment_url_to_postid( $image ) : $image_id;
$image_src = !empty( $image_src = wp_get_attachment_image_src( $image_id, 'full' )[0] ) ? $image_src : $image_hd_src;

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_147_template_222">
		{{php}}<?php

		if( !empty( $image_hd_src ) ) {

		?>{{/php}}
		<picture class="ecode_image">
			<source media="(min-width:1440px)" srcset="{{image_hd_src}}">
			<source media="(min-width:1024px)" srcset="{{image_desktop_src}}">
			<source media="(min-width:768px)" srcset="{{image_tablet_src}}">
			<img src="{{image_src}}" alt="{{image_alt}}">
		</picture>
		{{php}}<?php

		}

		?>{{/php}}
		<section class="ecode_curves">
			<svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1480 60"><path d="M43.5 22L0 60h87.1zM130.6 22L87.1 60h87zM217.6 22l-43.5 38h87.1zM304.7 22l-43.5 38h87zM391.8 22l-43.6 38h87.1zM478.8 22l-43.5 38h87.1zM565.9 22l-43.5 38h87zM652.9 22l-43.5 38h87.1zM740 22l-43.5 38h87zM827.1 22l-43.6 38h87.1zM914.1 22l-43.5 38h87zM1001.2 22l-43.6 38h87.1zM1088.2 22l-43.5 38h87.1zM1175.3 22l-43.5 38h87zM1262.4 22l-43.6 38h87.1zM1349.4 22l-43.5 38h87zM1436.5 22l-43.6 38h87.1z"></path></svg>
		</section>
		<div class="ecode_width_147_222">
			<h1 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h1>
			{{php}}<?php

			if( !empty( $address ) ) {

			?>{{/php}}
			<h2 class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{address}}</h2>
			{{php}}<?php

			}

			if( !empty( $date ) || !empty( $city ) || !empty( $place ) ) {

			?>{{/php}}
			<ul class="ecode_article_ul">
				{{php}}<?php

				if( !empty( $date ) ) {

				?>{{/php}}
				<li class="ecode_article_li"{{builder}} data-edit="ecode_article_li"{{/builder}}>
					<i>
						<svg width="51px" height="42px" viewBox="0 0 51 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-596.000000, -12.000000)" fill="#FFBB00" fill-rule="nonzero"><g transform="translate(596.256410, 12.000000)"><path d="M45,3.75 L40,3.75 L40,1.25 C40,0.5625 39.4375,0 38.75,0 C38.0625,0 37.5,0.5625 37.5,1.25 L37.5,3.75 L12.5,3.75 L12.5,1.25 C12.5,0.5625 11.9375,0 11.25,0 C10.5625,0 10,0.5625 10,1.25 L10,3.75 L5,3.75 C2.25,3.75 0,6 0,8.75 L0,36.25 C0,39 2.25,41.25 5,41.25 L45,41.25 C47.75,41.25 50,39 50,36.25 L50,8.75 C50,6 47.75,3.75 45,3.75 Z M47.5,36.25 C47.5,37.625 46.375,38.75 45,38.75 L5,38.75 C3.625,38.75 2.5,37.625 2.5,36.25 L2.5,17.5 L47.5,17.5 L47.5,36.25 Z M47.5,15 L2.5,15 L2.5,8.75 C2.5,7.375 3.625,6.25 5,6.25 L10,6.25 L10,10 C10,10.6875 10.5625,11.25 11.25,11.25 C11.9375,11.25 12.5,10.6875 12.5,10 L12.5,6.25 L37.5,6.25 L37.5,10 C37.5,10.6875 38.0625,11.25 38.75,11.25 C39.4375,11.25 40,10.6875 40,10 L40,6.25 L45,6.25 C46.375,6.25 47.5,7.375 47.5,8.75 L47.5,15 Z"></path></g></g></g></svg>
					</i>
					<span>{{date}}</span>
				</li>
				{{php}}<?php

				}

				if( !empty( $city ) ) {

				?>{{/php}}
				<li class="ecode_article_li"{{builder}} data-edit="ecode_article_li"{{/builder}}>
					<i>
						<svg width="41px" height="50px" viewBox="0 0 41 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-757.000000, -10.000000)" fill="#FFBB00" fill-rule="nonzero"><g transform="translate(756.256410, 10.000000)"><path d="M21.6666667,50 C20.2590139,49.9877201 18.9217507,49.3826236 17.9833333,48.3333333 C11.9,41.6666667 1.66666667,28.9833333 1.66666667,20.6 C1.50899886,9.39180426 10.4587065,0.17360543 21.6666667,0 C32.8746269,0.17360543 41.8243345,9.39180426 41.6666667,20.6 C41.6666667,28.9333333 31.4333333,41.5833333 25.35,48.35 C24.4086045,49.3931139 23.0717459,49.9919781 21.6666667,50 Z M21.6666667,3.33333333 C12.3035363,3.51577869 4.85132214,11.2362726 5,20.6 C5,25.8333333 10.7833333,35.3666667 20.4666667,46.1166667 C20.7808054,46.4425865 21.2140003,46.6267099 21.6666667,46.6267099 C22.119333,46.6267099 22.5525279,46.4425865 22.8666667,46.1166667 C32.55,35.3666667 38.3333333,25.8333333 38.3333333,20.6 C38.4820112,11.2362726 31.029797,3.51577869 21.6666667,3.33333333 Z"></path><path d="M21.6666667,30 C16.1438192,30 11.6666667,25.5228475 11.6666667,20 C11.6666667,14.4771525 16.1438192,10 21.6666667,10 C27.1895142,10 31.6666667,14.4771525 31.6666667,20 C31.6666667,25.5228475 27.1895142,30 21.6666667,30 Z M21.6666667,13.3333333 C17.9847683,13.3333333 15,16.3181017 15,20 C15,23.6818983 17.9847683,26.6666667 21.6666667,26.6666667 C25.348565,26.6666667 28.3333333,23.6818983 28.3333333,20 C28.3333333,18.2318901 27.6309544,16.5361973 26.3807119,15.2859548 C25.1304694,14.0357123 23.4347766,13.3333333 21.6666667,13.3333333 Z"></path></g></g></g></svg>
					</i>
					<span>{{city}}</span>
				</li>
				{{php}}<?php

				}

				if( !empty( $place ) ) {

				?>{{/php}}
				<li class="ecode_article_li"{{builder}} data-edit="ecode_article_li"{{/builder}}>
					<i>
						<svg width="51px" height="45px" viewBox="0 0 51 45" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-676.000000, -12.000000)" fill="#FFBB00" fill-rule="nonzero"><g transform="translate(676.256410, 12.000000)"><path d="M17.1945313,0.72421875 L0,7.27421875 L0,44.8835938 L17.1804687,38.3390625 L32.8054688,44.5890625 L50,38.0382812 L50,0.42890625 L32.8195312,6.9734375 L17.1945313,0.72421875 Z M17.96875,2.71640625 L32.03125,8.34140625 L32.03125,42.5960938 L17.96875,36.9710938 L17.96875,2.71640625 Z M1.5625,8.35078125 L16.40625,2.69609375 L16.40625,36.9617188 L1.5625,42.6164063 L1.5625,8.35078125 Z M48.4375,36.9617188 L33.59375,42.6164063 L33.59375,8.35078125 L48.4375,2.69609375 L48.4375,36.9617188 Z"></path></g></g></g></svg>
					</i>
					<span>{{place}}</span>
				</li>
				{{php}}<?php

				}

				?>{{/php}}
			</ul>
			{{php}}<?php

			}

			if( ( !empty( $txt_button_1 ) && !empty( $lnk_button_1 ) ) || ( !empty( $txt_button_2 ) && !empty( $link_button_2 ) ) ) {

			?>{{/php}}
			<div class="ecode_buttons">
				{{php}}<?php

				if( !empty( $link_button_1 ) && !empty( $txt_button_1 ) ) {

				?>{{/php}}
				<a href="{{link_button_1}}" class="ecode_article_button ecode_article_button_1"{{builder}} data-edit="ecode_article_button_1"{{/builder}}>{{txt_button_1}}</a>
				{{php}}<?php

				}

				if( !empty( $link_button_2 ) && !empty( $txt_button_2 ) ) {

				?>{{/php}}
				<a href="{{link_button_2}}" class="ecode_article_button ecode_article_button_2"{{builder}} data-edit="ecode_article_button_2"{{/builder}}>{{txt_button_2}}</a>
				{{php}}<?php

				}

				?>{{/php}}
			</div>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
</section>
