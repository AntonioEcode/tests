{{php}}<?php

$current_id = wpeb_get_id();

$section_title        = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );
$section_left_column  = get_post_meta( $current_id, '_{{template_name}}_section_left_column_{{page_section_id}}', TRUE );
$section_left_column  = apply_filters( 'the_content', $section_left_column );
$section_right_column = get_post_meta( $current_id, '_{{template_name}}_section_right_column_{{page_section_id}}', TRUE );
$section_right_column = apply_filters( 'the_content', $section_right_column );

$elements_group  = get_post_meta( $current_id, '_{{template_name}}_elements_group_{{page_section_id}}', TRUE );

$section_subtitle      = get_post_meta( $current_id, '_{{template_name}}_section_subtitle_{{page_section_id}}', TRUE );
$section_basic_content = get_post_meta( $current_id, '_{{template_name}}_section_basic_content_{{page_section_id}}', TRUE );
$section_basic_content = apply_filters( 'the_content', $section_basic_content );
$section_box_content   = get_post_meta( $current_id, '_{{template_name}}_section_box_content_{{page_section_id}}', TRUE );
$section_box_content   = apply_filters( 'the_content', $section_box_content );

$structure_data = '';

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_37_template_47">
		{{php}}<?php

		if( !empty( $section_title ) ) {

		?>{{/php}}
		<h1 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{section_title}}</h1>
		{{php}}<?php

		}

		if( !empty( $section_left_column ) && !empty( $section_right_column ) ) {

		?>{{/php}}
		<section class="ecode_columns ecode_columns_2">
			<div class="ecode_column ecode_container_content">
				{{section_left_column}}
			</div>
			<div class="ecode_column ecode_container_content">
				{{section_right_column}}
			</div>
		</section>
		{{php}}<?php

		}

		if( !empty( $elements_group ) ) {

		?>{{/php}}
		<section class="ecode_container_faq ecode_container_faq_37_47">
			{{elements_group_loop_start}}<?php

			foreach( $elements_group as $element ) {

				$element_question = $element['element_question'];
				$element_answer   = $element['element_answer'];
				$element_answer   = apply_filters( 'the_content', $element_answer );

				if( !empty( $element_question ) && !empty( $element_answer ) ) {

					if( !empty( $structure_data ) ) {

						$structure_data .= ',';

					}

					$structure_data .= '{';
						$structure_data .= '"@type": "Question",';
						$structure_data .= '"name": "' . $element_question . '",';
						$structure_data .= '"acceptedAnswer": {';
							$structure_data .= '"@type": "Answer",';
							$structure_data .= '"text": "' . strip_tags( $element_answer ) . '"';
						$structure_data .= '}';
					$structure_data .= '}';

			?>{{/elements_group_loop_start}}
			<article class="ecode_faq">
				<p class="ecode_question"{{builder}} data-edit="ecode_question"{{/builder}}><span></span>{{element_question}}</p>
				<div class="ecode_container_content ecode_answer">
					{{element_answer}}
				</div>
			</article>
			{{elements_group_loop_end}}<?php

				}

			}
			?>{{/elements_group_loop_end}}
		</section>
		{{php}}<?php

		}

		if( !empty( $section_title ) ) {

		?>{{/php}}
		<h2 class="ecode_title">{{section_subtitle}}</h2>
		{{php}}<?php

		}

		if( !empty( $section_basic_content ) || !empty( $section_box_content ) ) {

			if( !empty( $section_basic_content ) ) {

		?>{{/php}}
		<div class="ecode_container_content">
			{{section_basic_content}}
		</div>
		{{php}}<?php

			}

			if( !empty( $section_box_content ) ) {

		?>{{/php}}
		<div class="ecode_container_content ecode_footer">
			{{section_box_content}}
		</div>
		{{php}}<?php

			}

		}

		?>{{/php}}
	</section>
</section>
{{php}}<?php

if( !empty( $structure_data ) ) {

?>
<script type="application/ld+json">
	{
	  "@context": "https://schema.org",
	  "@type": "FAQPage",
	  "mainEntity": [<?php echo $structure_data; ?>]
	}
</script>
<?php

}

?>{{/php}}
