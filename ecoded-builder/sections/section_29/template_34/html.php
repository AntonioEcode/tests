{{php}}<?php

$current_id = wpeb_get_id();

$footer_description  = get_option( 'ecode_footer_description' );
$footer_info         = get_option( 'ecode_footer_info' );
$footer_logo_copyright_src = WPEB_PLUGIN_THEME_FRONT . 'img/logo_ecoded_copyright_white.png';
$company_address     = get_option( 'ecode_company_address' );
$company_postal_code = get_option( 'ecode_company_postal_code' );
$company_city        = get_option( 'ecode_company_city' );
$company_province    = get_option( 'ecode_company_province' );
$copy_address        = $company_city . ', ' . $company_postal_code . ' (' . $company_province . ')';

$company_phone       = get_option( 'ecode_company_phone' );
$company_phone_trim  = str_replace( ' ', '', $company_phone );

$company_whatsapp      = get_option( 'ecode_company_whatsapp' );
$company_whatsapp_trim = str_replace( ' ', '', $company_whatsapp );
$company_whatsapp_trim = strpos( $company_whatsapp_trim, '+34' ) === FALSE ? '+34' . $company_whatsapp_trim : $company_whatsapp_trim;

$company_email       = get_option( 'ecode_company_email' );
$schedule_time       = get_option( 'ecode_schedule_time' );

$copy_interesting    = __( 'Información de interés', 'frontecode' );
$copy_location       = __( 'Ubicación', 'frontecode' );
$copy_timetables     = __( 'Horarios', 'frontecode' );
$copy_projects       = __( 'Últimos proyectos', 'frontecode' );

$menu_nav = wp_nav_menu(
	array(
		'theme_location' => 'menu_footer',
		'container' => 'nav',
		'items_wrap' => '<ul id="%1$s" class="menu-item %2$s">%3$s</ul>',
		'container_class' => 'nav_main_menu',
		'menu_class' => 'ul_main_menu',
		'menu_id' => 'ul_main_menu',
		'echo' => FALSE,
		'walker' => new Walker_Nav_Main_Menu,
	)
);

// Get 3 last works
$works = array();

$args = array(
    'post_type'      => 'page',
    'post_status'    => 'publish',
	'posts_per_page' => '3',
	'orderby'        => 'date',
	'order'          => 'DESC',
    'meta_query'     => array(
		array(
			'key' => '_wp_page_template',
			'value' => 'page-templates/work.php',
		)
    )
);

$query = new WP_Query( $args );

if( $query->have_posts() ) {

	setlocale( LC_ALL, 'es_ES' );

	while( $query->have_posts() ) {

		$query->the_post();
		$post_id = get_the_ID();

		$post_title   = get_the_title( $post_id );
		$post_url     = get_permalink( $post_id );

		$post_date = new DateTime( $post->post_date );
		$format_post_date = strftime( "%B %e, %Y - %l:%M %p", $post_date->getTimestamp() );

		$post_thumbnail_id = get_post_thumbnail_id( $post_id );

		if( !empty( $post_thumbnail_id ) ) {

			$post_thumbnail_src = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' )[0];
			$post_thumbnail_alt = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', TRUE );

		} else {

			$post_thumbnail_src = default_image_post( 'url' );
			$post_thumbnail_alt = $post_title;

		}

		$works[] = array(
			'work_id'            => $post_id,
			'work_title'         => $post_title,
			'work_url'           => $post_url,
			'format_work_date'   => $format_post_date,
			'work_thumbnail_src' => $post_thumbnail_src,
			'work_thumbnail_alt' => $post_thumbnail_alt,
		);

	}

}

wp_reset_postdata();

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<footer class="ecode_section_29_template_34">
		<section class="ecode_info">
			<section class="ecode_info_section ecode_company_info">
				{{php}}<?php

				if( !empty( $footer_description ) ) {

				?>{{/php}}
				<p class="ecode_info_title">{{copy_interesting}}</p>
				<p class="ecode_info_text">{{footer_description}}</p>
				{{php}}<?php

				}

				// Display RRSS
				wpeb_get_rrss();

				?>{{/php}}{{builder}}<div class="ecode_social">
					<a href="#" target="_blank" rel="nofollow noopener noreferrer" class="ecode_social_facebook"><i><svg width="9px" height="16px" viewBox="0 0 9 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-101.000000, -53.000000)" fill="#000000"><g transform="translate(101.000000, 53.000000)"><path d="M6.921,2.65666667 L8.43784615,2.65666667 L8.43784615,0.112666667 C8.17615385,0.078 7.27615385,2.77555756e-17 6.228,2.77555756e-17 C4.041,2.77555756e-17 2.54284615,1.32466667 2.54284615,3.75933333 L2.54284615,6 L0.129461538,6 L0.129461538,8.844 L2.54284615,8.844 L2.54284615,16 L5.50176923,16 L5.50176923,8.84466667 L7.81753846,8.84466667 L8.18515385,6.00066667 L5.50107692,6.00066667 L5.50107692,4.04133333 C5.50176923,3.21933333 5.73161538,2.65666667 6.921,2.65666667 Z"></path></g></g></g></svg></i></a>
					<a href="#" target="_blank" rel="nofollow noopener noreferrer" class="ecode_social_twitter"><i><svg width="16px" height="13px" viewBox="0 0 16 13" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-203.000000, -46.000000)" fill="#000000"><g transform="translate(203.000000, 46.000000)"><path d="M16,1.539 C15.405,1.8 14.771,1.973 14.11,2.057 C14.79,1.651 15.309,1.013 15.553,0.244 C14.919,0.622 14.219,0.889 13.473,1.038 C12.871,0.397 12.013,0 11.077,0 C9.261,0 7.799,1.474 7.799,3.281 C7.799,3.541 7.821,3.791 7.875,4.029 C5.148,3.896 2.735,2.589 1.114,0.598 C0.831,1.089 0.665,1.651 0.665,2.256 C0.665,3.392 1.25,4.399 2.122,4.982 C1.595,4.972 1.078,4.819 0.64,4.578 C0.64,4.588 0.64,4.601 0.64,4.614 C0.64,6.208 1.777,7.532 3.268,7.837 C3.001,7.91 2.71,7.945 2.408,7.945 C2.198,7.945 1.986,7.933 1.787,7.889 C2.212,9.188 3.418,10.143 4.852,10.174 C3.736,11.047 2.319,11.573 0.785,11.573 C0.516,11.573 0.258,11.561 -5.32907052e-14,11.528 C1.453,12.465 3.175,13 5.032,13 C11.068,13 14.368,8 14.368,3.666 C14.368,3.521 14.363,3.381 14.356,3.242 C15.007,2.78 15.554,2.203 16,1.539 Z"></path></g></g></g></svg></i></a>
					<a href="#" target="_blank" rel="nofollow noopener noreferrer" class="ecode_social_instagram"><i><svg width="16px" height="16px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-158.000000, -46.000000)" fill="#000000"><g transform="translate(158.000000, 46.000000)"><path d="M11.3522813,0 L4.64775,0 C2.08496875,0 0,2.08496875 0,4.64775 L0,11.35225 C0,13.9150313 2.08496875,16 4.64775,16 L11.35225,16 C13.9150313,16 16,13.9150313 16,11.3522813 L16,4.64775 C16,2.08496875 13.9150313,0 11.3522813,0 Z M14.75,11.35225 C14.75,13.2257813 13.2257813,14.75 11.3522813,14.75 L4.64775,14.75 C2.77421875,14.75 1.25,13.2257813 1.25,11.3522813 L1.25,4.64775 C1.25,2.77421875 2.77421875,1.25 4.64775,1.25 L11.35225,1.25 C13.2257813,1.25 14.75,2.77421875 14.75,4.64775 L14.75,11.35225 Z" fill-rule="nonzero"></path><path d="M8,3.6875 C5.6220625,3.6875 3.6875,5.6220625 3.6875,8 C3.6875,10.3779375 5.6220625,12.3125 8,12.3125 C10.3779375,12.3125 12.3125,10.3779375 12.3125,8 C12.3125,5.6220625 10.3779375,3.6875 8,3.6875 Z M8,11.0625 C6.31134375,11.0625 4.9375,9.68865625 4.9375,8 C4.9375,6.31134375 6.31134375,4.9375 8,4.9375 C9.68865625,4.9375 11.0625,6.31134375 11.0625,8 C11.0625,9.68865625 9.68865625,11.0625 8,11.0625 Z" fill-rule="nonzero"></path><circle cx="12.375" cy="3.625" r="1"></circle></g></g></g></svg></i></a>
					<a href="#" target="_blank" rel="nofollow noopener noreferrer" class="ecode_social_linkedin"><i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-47.000000, -138.000000)" fill="#000000"><g transform="translate(47.000000, 138.000000)"><path d="M49.9875,50 L49.9875,49.9979167 L50,49.9979167 L50,31.6604167 C50,22.6895833 48.06875,15.7791667 37.58125,15.7791667 C32.5395833,15.7791667 29.15625,18.5458333 27.775,21.16875 L27.6291667,21.16875 L27.6291667,16.6166667 L17.6854167,16.6166667 L17.6854167,49.9979167 L28.0395833,49.9979167 L28.0395833,33.46875 C28.0395833,29.1166667 28.8645833,24.9083333 34.2541667,24.9083333 C39.5645833,24.9083333 39.64375,29.875 39.64375,33.7479167 L39.64375,50 L49.9875,50 Z"></path><polygon points="0.825 16.61875 11.1916667 16.61875 11.1916667 50 0.825 50"></polygon><path d="M6.00416667,0 C2.68958333,0 0,2.68958333 0,6.00416667 C0,9.31875 2.68958333,12.0645833 6.00416667,12.0645833 C9.31875,12.0645833 12.0083333,9.31875 12.0083333,6.00416667 C12.00625,2.68958333 9.31666667,9.25185854e-16 6.00416667,0 Z"></path></g></g></g></svg></i></a>
					<a href="#" target="_blank" rel="nofollow noopener noreferrer" class="ecode_social_youtube"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 461.001 461.001" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg" style="" d="M365.257,67.393H95.744C42.866,67.393,0,110.259,0,163.137v134.728  c0,52.878,42.866,95.744,95.744,95.744h269.513c52.878,0,95.744-42.866,95.744-95.744V163.137  C461.001,110.259,418.135,67.393,365.257,67.393z M300.506,237.056l-126.06,60.123c-3.359,1.602-7.239-0.847-7.239-4.568V168.607  c0-3.774,3.982-6.22,7.348-4.514l126.06,63.881C304.363,229.873,304.298,235.248,300.506,237.056z" fill="#000000"></g></svg></i></a>
				</div>{{/builder}}
			</section>
			{{php}}<?php

			if( !empty( $company_address ) || !empty( $copy_address ) || !empty( $company_phone ) || !empty( $company_email ) ) {

			?>{{/php}}
			<section class="ecode_info_section ecode_location">
				{{php}}<?php

				if( !empty( $company_address ) || !empty( $copy_address ) ) {

				?>{{/php}}
				<p class="ecode_info_title">{{copy_location}}</p>
				<p class="ecode_info_text">{{company_address}}</p>
				<p class="ecode_info_text">{{copy_address}}</p>
				{{php}}<?php

				}

				if( !empty( $company_phone ) ) {

				?>{{/php}}
				<p class="ecode_info_text ecode_info_tel"><a href="tel:{{company_phone_trim}}" class="ecode_info_text">{{company_phone}}</a></p>
				{{php}}<?php

				}

				if( !empty( $company_email ) ) {

				?>{{/php}}
				<p class="ecode_info_text"><a href="mailto:{{company_email}}" class="ecode_info_text">{{company_email}}</a></p>
				{{php}}<?php

				}

				?>{{/php}}
			</section>
			{{php}}<?php

			}

			if( !empty( $schedule_time ) ) {

			?>{{/php}}
			<section class="ecode_info_section ecode_schedule">
				<p class="ecode_info_title">{{copy_timetables}}</p>
				<p class="ecode_info_text">{{schedule_time}}</p>
			</section>
			{{php}}<?php

			}

			if( !empty( $works ) ) {

			?>{{/php}}
			<section class="ecode_info_section ecode_list">
				<p class="ecode_info_title">{{copy_projects}}</p>
				<section class="ecode_section">
					{{works_group_loop_start}}<?php

					foreach( $works as $work ) {

						$work_title         = $work['work_title'];
						$work_url           = $work['work_url'];
						$format_work_date   = $work['format_work_date'];
						$work_thumbnail_src = $work['work_thumbnail_src'];
						$work_thumbnail_alt = $work['work_thumbnail_alt'];
						$work_thumbnail_alt = !empty( $work_thumbnail_alt ) ? $work_thumbnail_alt : $work_title;

					?>{{/works_group_loop_start}}
					<article class="ecode_article">
						<figure class="ecode_article_figure">
							<img loading="lazy" src="{{work_thumbnail_src}}" alt="{{work_thumbnail_alt}}">
						</figure>
						<p class="ecode_article_title"><a href="{{work_url}}">{{work_title}}</a></p>
						<p class="ecode_article_date">{{format_work_date}}</p>
					</article>
					{{works_group_loop_end}}<?php

					}

					?>{{/works_group_loop_end}}
				</section>
			</section>
			{{php}}<?php

			}

			?>{{/php}}
		</section>
		<section class="ecode_copy">
			<section class="ecode_copy_width">
				{{php}}<?php

				if( !empty( $footer_info ) ) {

				?>{{/php}}
				<p class="ecode_copy_text">{{footer_info}}</p>
				{{php}}<?php

				}

				if( !empty( $menu_nav ) ) {

				?>{{/php}}
				<section class="ecode_container_menu">
					{{menu_nav}}
				</section>
				{{php}}<?php

				}

				?>{{/php}}
				<div class="ecode_ecoded">
					<figure>
						<img src="{{footer_logo_copyright_src}}" alt="Logo ecoded">
					</figure>
				</div>
			</section>
		</section>
		{{php}}<?php

		if( !empty( $company_whatsapp ) ) {

		?>{{/php}}
		<div id="ecode_tabbar_whatsapp_29_34" class="ecode_tabbar_whatsapp_29_34">
			<a href="https://wa.me/{{company_whatsapp_trim}}">
				<i><svg width="100px" height="100px" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-165.000000, -122.000000)"><g transform="translate(165.000000, 122.000000)"><rect fill="#1BD741" x="0" y="0" width="99.9410088" height="99.9410088"></rect><g transform="translate(14.912281, 14.912281)" fill="#FFFFFF"><path d="M0.108333333,70.0460526 L5.00372807,52.6592105 C1.85570175,47.3111842 0.198245614,41.2263158 0.198245614,34.9754386 C0.198245614,15.7287281 15.8565789,0.0703947368 35.1032895,0.0703947368 C54.35,0.0703947368 70.008114,15.7287281 70.008114,34.9754386 C70.008114,54.2221491 54.35,69.8804825 35.1032895,69.8804825 C29.1061404,69.8804825 23.2337719,68.3453947 18.0388158,65.4304825 L0.108333333,70.0460526 Z M18.9554825,59.0802632 L20.0239035,59.7326754 C24.5532895,62.497807 29.7677632,63.9594298 35.1032895,63.9594298 C51.0850877,63.9594298 64.0870614,50.9572368 64.0870614,34.9754386 C64.0870614,18.9936404 51.0850877,5.99144737 35.1032895,5.99144737 C19.1214912,5.99144737 6.11929825,18.9936404 6.11929825,34.9754386 C6.11929825,40.5440789 7.70197368,45.9517544 10.6958333,50.6138158 L11.4153509,51.7342105 L8.59627193,61.7469298 L18.9554825,59.0802632 Z"></path><path d="M25.2980263,18.7296053 L23.033114,18.6061404 C22.3217105,18.5673246 21.6239035,18.8050439 21.0861842,19.2721491 C19.9881579,20.2256579 18.2324561,22.0690789 17.6932018,24.4712719 C16.8890351,28.0530702 18.1317982,32.4390351 21.3482456,36.825 C24.564693,41.2109649 30.5587719,48.2285088 41.158114,51.2256579 C44.5736842,52.1914474 47.2605263,51.5403509 49.3335526,50.2142544 C50.9754386,49.1640351 52.1072368,47.4782895 52.5151316,45.5725877 L52.8767544,43.8835526 C52.9916667,43.3467105 52.7190789,42.8019737 52.2203947,42.5721491 L44.5657895,39.0438596 C44.0688596,38.8149123 43.4796053,38.9596491 43.1453947,39.3927632 L40.1403509,43.2883772 C39.9133772,43.5826754 39.5247807,43.6993421 39.1739035,43.5760965 C37.1160088,42.8528509 30.2225877,39.9657895 26.4401316,32.6798246 C26.2760965,32.3638158 26.316886,31.9802632 26.5495614,31.7107456 L29.4214912,28.3883772 C29.7149123,28.0491228 29.7890351,27.5721491 29.6127193,27.1598684 L26.3131579,19.4403509 C26.1375,19.029386 25.7438596,18.7539474 25.2980263,18.7296053 Z"></path></g></g></g></g></svg></i>
			</a>
		</div>
		{{php}}<?php

		}

		?>{{/php}}
	</footer>
</section>
