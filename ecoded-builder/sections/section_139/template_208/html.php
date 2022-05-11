{{php}}<?php

$current_id = wpeb_get_id();

$template_name   = '{{template_name}}';
$page_section_id = '{{page_section_id}}';
$section_id      = '{{section_id}}';
$template_id     = '{{template_id}}';

$data = wpeb_get_data( $current_id, $template_name, $page_section_id, $section_id, $template_id );

$categories_filters = array();
$grouped_elements = array();

if( !empty( $data->elements_group ) ) {

	$cont = 0;

	foreach( $data->elements_group as $element ) {

		if( !empty( $element['element_category'] ) ) {

			if( !in_array( $element['element_category'], $categories_filters ) ) {

				$categories_filters[] = $element['element_category'];

			}

			if( !array_key_exists( $element['element_category'], $grouped_elements ) ) {

				$grouped_elements[$element['element_category']] = array();

			}

			if( !empty( $element['element_hour'] ) ) {

				$grouped_elements[$element['element_category']][$cont]['element_hour'] = $element['element_hour'];

			}

			if( !empty( $element['element_description'] ) ) {

				$grouped_elements[$element['element_category']][$cont]['element_description'] = $element['element_description'];

			}

		}

		$cont++;

	}

}

?>{{/php}}
<section id="page_section_{{page_section_id}}" {{builder}}class="page_section"{{/builder}}>
	{{php}}<?php

	if( !empty( $data->title ) || !empty( $data->subtitle ) || ( !empty( $categories_filters ) && !empty( $grouped_elements ) ) ) {

	?>{{/php}}
	<section class="ecode_section_139_template_208"{{builder}} data-edit="ecode_section_139_template_208"{{/builder}}>
		<div class="ecode_width_139_208">
			{{php}}<?php

			if( !empty( $data->title ) ) {

			?>{{/php}}
			<h3 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{title}}</h3>
			{{php}}<?php

			}

			if( !empty( $data->subtitle ) ) {

			?>{{/php}}
			<p class="ecode_subtitle"{{builder}} data-edit="ecode_subtitle"{{/builder}}>{{subtitle}}</p>
			{{php}}<?php

			}

			if( !empty( $categories_filters ) && !empty( $grouped_elements ) ) {

			?>{{/php}}
			<ul class="ecode_days">
				{{php}}<?php

				$cont = 0;

				foreach( $categories_filters as $category ) {

					$current_class = '';

					if( $cont == 0 ) {

						$current_class = ' ecode_day_current';

					}

				?>
				<li class="ecode_day<?php echo $current_class; ?>" data-id="<?php echo $cont; ?>"><?php echo $category; ?></li>
				<?php

					$cont++;

				}

				?>{{/php}}{{builder}}<li class="ecode_day ecode_day_current" data-id="0" data-edit="ecode_day">Día 1</li>
				<li class="ecode_day" data-id="1" data-edit="ecode_day">Día 2</li>
				<li class="ecode_day" data-id="2" data-edit="ecode_day">Día 3</li>{{/builder}}
			</ul>
			<section class="ecode_section">
				{{php}}<?php

				$cont_2 = 0;

				foreach( $grouped_elements as $grouped_element ) {

					$hide_class = '';

					if( $cont_2 != 0 ) {

						$hide_class = ' ecode_article_hide';

					}

				?>
				<article class="ecode_article<?php echo $hide_class; ?>">
					<ul class="ecode_article_ul">
						<?php

							foreach( $grouped_element as $element ) {

						?>
						<li class="ecode_article_li">
							<?php

							if( !empty( $element['element_hour'] ) ) {

							?>
							<p class="ecode_article_hour"><?php echo $element['element_hour']; ?></p>
							<?php

							}

							if( !empty( $element['element_description'] ) ) {

							?>
							<p class="ecode_article_desc"><?php echo $element['element_description']; ?></p>
							<?php

							}

							?>
						</li>
						<?php

							}

						?>
					</ul>
				</article>
				<?php

					$cont_2++;

				}

				?>{{/php}}{{builder}}<article class="ecode_article">
					<ul class="ecode_article_ul">
						<li class="ecode_article_li">
							<p class="ecode_article_hour" data-edit="ecode_article_hour">08:30</p>
							<p class="ecode_article_desc" data-edit="ecode_article_desc">Mauris rhoncus scelerisque lacus</p>
						</li>
						<li class="ecode_article_li">
							<p class="ecode_article_hour" data-edit="ecode_article_hour">09:00</p>
							<p class="ecode_article_desc" data-edit="ecode_article_desc">Phasellus efficitur interdum accumsan</p>
						</li>
						<li class="ecode_article_li">
							<p class="ecode_article_hour" data-edit="ecode_article_hour">10:30</p>
							<p class="ecode_article_desc" data-edit="ecode_article_desc">Praesent dignissim vestibulum</p>
						</li>
						<li class="ecode_article_li">
							<p class="ecode_article_hour" data-edit="ecode_article_hour">11:30</p>
							<p class="ecode_article_desc" data-edit="ecode_article_desc">Suspendisse semper dolor sed maximus magna fermentum</p>
						</li>
						<li class="ecode_article_li">
							<p class="ecode_article_hour" data-edit="ecode_article_hour">13:00</p>
							<p class="ecode_article_desc" data-edit="ecode_article_desc">Nam varius ipsum quis ipsum</p>
						</li>
					</ul>
				</article>
				<article class="ecode_article ecode_article_hide">
					<ul class="ecode_article_ul">
						<li class="ecode_article_li">
							<p class="ecode_article_hour" data-edit="ecode_article_hour">09:00</p>
							<p class="ecode_article_desc" data-edit="ecode_article_desc">Nunc a diam varius</p>
						</li>
						<li class="ecode_article_li">
							<p class="ecode_article_hour" data-edit="ecode_article_hour">10:30</p>
							<p class="ecode_article_desc" data-edit="ecode_article_desc">Mauris in hendrerit ipsum</p>
						</li>
						<li class="ecode_article_li">
							<p class="ecode_article_hour" data-edit="ecode_article_hour">13:45</p>
							<p class="ecode_article_desc" data-edit="ecode_article_desc">Nullam viverra odio a neque lobortis</p>
						</li>
						<li class="ecode_article_li">
							<p class="ecode_article_hour" data-edit="ecode_article_hour">14:30</p>
							<p class="ecode_article_desc" data-edit="ecode_article_desc">Praesent varius pretium condimentum</p>
						</li>
						<li class="ecode_article_li">
							<p class="ecode_article_hour" data-edit="ecode_article_hour">15:30</p>
							<p class="ecode_article_desc" data-edit="ecode_article_desc">Nam ipsum quis ipsum</p>
						</li>
					</ul>
				</article>
				<article class="ecode_article ecode_article_hide">
					<ul class="ecode_article_ul">
						<li class="ecode_article_li">
							<p class="ecode_article_hour" data-edit="ecode_article_hour">08:00</p>
							<p class="ecode_article_desc" data-edit="ecode_article_desc">Curabitur quis ullamcorper ligula</p>
						</li>
						<li class="ecode_article_li">
							<p class="ecode_article_hour" data-edit="ecode_article_hour">09:00</p>
							<p class="ecode_article_desc" data-edit="ecode_article_desc">Vivamus vitae quam dui</p>
						</li>
						<li class="ecode_article_li">
							<p class="ecode_article_hour" data-edit="ecode_article_hour">10:30</p>
							<p class="ecode_article_desc" data-edit="ecode_article_desc">Praesent varius pretium condimentum</p>
						</li>
						<li class="ecode_article_li">
							<p class="ecode_article_hour" data-edit="ecode_article_hour">11:30</p>
							<p class="ecode_article_desc" data-edit="ecode_article_desc">Duis vitae libero facilisis</p>
						</li>
						<li class="ecode_article_li">
							<p class="ecode_article_hour" data-edit="ecode_article_hour">13:00</p>
							<p class="ecode_article_desc" data-edit="ecode_article_desc">Pellentesque faucibus nec nequet</p>
						</li>
					</ul>
				</article>{{/builder}}
			</section>
			{{php}}<?php

			}

			?>{{/php}}
		</div>
	</section>
	{{php}}<?php

	}

	?>{{/php}}
</section>
