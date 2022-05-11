{{php}}<?php

setlocale( LC_ALL, 'es_ES' );

date_default_timezone_set( 'Europe/Madrid' );

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	{{php}}<?php

	if( !empty( $data->elements_group ) ) {

	?>{{/php}}
	<section class="ecode_section_157_template_254">
		<div class="ecode_width_157_254">
			{{php}}<?php

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h2>
			{{php}}<?php

			}

			?>{{/php}}
			<section class="ecode_articles">
				{{elements_group_loop_start}}<?php

				foreach( $data->elements_group as $element ) {

					$element_title       = $element['element_title'];
					$element_url         = $element['element_url'];
					$element_event_day   = $element['element_event_day'];
					$element_schedule    = $element['element_schedule'];
					$element_description = $element['element_description'];
					$element_location    = $element['element_location'];
					$element_address     = $element['element_address'];

					// If have specific conference selected
					if( !empty( $element['service_id'] ) ) {

						$service_id       = $element['service_id'];
						$conference_title = get_the_title( $service_id );
						$conference_link  = get_permalink( $service_id );

						$element_title = !empty( $element_title ) ? $element_title : $conference_title;
						$element_url   = !empty( $element_url ) ? $element_url : $conference_link;

					}

					$day_month = '';
					$day       = '';

					if( !empty( $element_event_day ) ) {

						$date            = new DateTime( $element_event_day );
						$data->day_month = $date->format( 'd M' );
						$data->day       = $date->format( 'l' );

					}

				?>{{/elements_group_loop_start}}
				<article class="ecode_article">
					<div class="ecode_article_icon_title">
						<i>
							<svg width="51px" height="42px" viewBox="0 0 51 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-596.000000, -12.000000)" fill="#222222" fill-rule="nonzero"><g transform="translate(596.256410, 12.000000)"><path d="M45,3.75 L40,3.75 L40,1.25 C40,0.5625 39.4375,0 38.75,0 C38.0625,0 37.5,0.5625 37.5,1.25 L37.5,3.75 L12.5,3.75 L12.5,1.25 C12.5,0.5625 11.9375,0 11.25,0 C10.5625,0 10,0.5625 10,1.25 L10,3.75 L5,3.75 C2.25,3.75 0,6 0,8.75 L0,36.25 C0,39 2.25,41.25 5,41.25 L45,41.25 C47.75,41.25 50,39 50,36.25 L50,8.75 C50,6 47.75,3.75 45,3.75 Z M47.5,36.25 C47.5,37.625 46.375,38.75 45,38.75 L5,38.75 C3.625,38.75 2.5,37.625 2.5,36.25 L2.5,17.5 L47.5,17.5 L47.5,36.25 Z M47.5,15 L2.5,15 L2.5,8.75 C2.5,7.375 3.625,6.25 5,6.25 L10,6.25 L10,10 C10,10.6875 10.5625,11.25 11.25,11.25 C11.9375,11.25 12.5,10.6875 12.5,10 L12.5,6.25 L37.5,6.25 L37.5,10 C37.5,10.6875 38.0625,11.25 38.75,11.25 C39.4375,11.25 40,10.6875 40,10 L40,6.25 L45,6.25 C46.375,6.25 47.5,7.375 47.5,8.75 L47.5,15 Z"></path></g></g></g></svg>
						</i>
						{{php}}<?php

						if( !empty( $element_title ) ) {

						?>{{/php}}
						<h3 class="ecode_article_title"{{builder}} data-edit="ecode_article_title"{{/builder}}>
							{{php}}<?php

							if( !empty( $element_url ) ) {

							?>{{/php}}
							<a href="{{element_url}}">
							{{php}}<?php

							}

							?>{{/php}}
								{{element_title}}
							{{php}}<?php

							if( !empty( $element_url ) ) {

							?>{{/php}}
							</a>
							{{php}}<?php

							}

							?>{{/php}}
						</h3>
						{{php}}<?php

						}

						?>{{/php}}
					</div>
					<div class="ecode_article_info">
						<div class="ecode_article_date">
							{{php}}<?php

							if( !empty( $element_event_day ) ) {

							?>{{/php}}
							<span class="ecode_article_date_day"{{builder}} data-edit="ecode_article_date_day"{{/builder}}>{{day_month}}</span>
							<span>{{day}}</span>
							{{php}}<?php

							}

							if( !empty( $element_schedule ) ) {

							?>{{/php}}
							<span>| {{element_schedule}}</span>
							{{php}}<?php

							}

							?>{{/php}}
						</div>
						{{php}}<?php

						if( !empty( $element_location ) || !empty( $element_address ) ) {

						?>{{/php}}
						<div class="ecode_article_location">
							{{php}}<?php

							if( !empty( $element_location ) ) {

							?>{{/php}}
							<p class="ecode_article_location_place"{{builder}} data-edit="ecode_article_location_place"{{/builder}}>{{element_location}}</p>
							{{php}}<?php

							}

							if( !empty( $element_address ) ) {

							?>{{/php}}
							<p class="ecode_article_location_street"{{builder}} data-edit="ecode_article_location_street"{{/builder}}>{{element_address}}</p>
							{{php}}<?php

							}

							?>{{/php}}
						</div>
						{{php}}<?php

						}

						if( !empty( $element_description ) ) {

						?>{{/php}}
						<p class="ecode_article_desc"{{builder}} data-edit="ecode_article_desc"{{/builder}}>{{element_description}}</p>
						{{php}}<?php

						}

						?>{{/php}}
					</div>
				</article>
				{{elements_group_loop_end}}<?php

				}

				?>{{/elements_group_loop_end}}
			</section>
		</div>
	</section>
	{{php}}<?php

	}

	?>{{/php}}
</section>
