{{php}}<?php

$current_id = wpeb_get_id();
$title      = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$image_hd     = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}', TRUE );
$image_hd_id  = get_post_meta( $current_id, '_{{template_name}}_image_hd_{{page_section_id}}_id', TRUE );
$image_hd_id  = empty( $image_hd_id ) ? attachment_url_to_postid( $image_hd ) : $image_hd_id;
$image_hd_src = wp_get_attachment_image_src( $image_hd_id, 'full' )[0];
$image_alt    = get_post_meta( $image_hd_id, '_wp_attachment_image_alt', TRUE );
$image_alt    = !empty( $image_alt ) ? $image_alt : $title;

$image     = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}', TRUE );
$image_id  = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}_id', TRUE );
$image_id  = empty( $image_id ) ? attachment_url_to_postid( $image ) : $image_id;
$image_src = wp_get_attachment_image_src( $image_id, 'full' )[0];

$cards_group = get_post_meta( $current_id, '_{{template_name}}_cards_group_{{page_section_id}}', TRUE );

$form_title  = get_post_meta( $current_id, '_{{template_name}}_form_title_{{page_section_id}}', TRUE );
$form_title  = !empty( $form_title ) ? $form_title : $title;
$description = get_post_meta( $current_id, '_{{template_name}}_description_{{page_section_id}}', TRUE );

$description = apply_filters( 'the_content', $description );

$company_address     = get_option( 'ecode_company_address' );
$company_postal_code = get_option( 'ecode_company_postal_code' );
$company_city        = get_option( 'ecode_company_city' );

$copy_address = !empty( $company_address ) ? $company_address : '';

if( !empty( $company_city ) ) {

	$copy_address = !empty( $copy_address ) ? $copy_address . ', ' . $company_city : $copy_address;

}

if( !empty( $company_postal_code ) ) {

	$copy_address = !empty( $copy_address ) ? $copy_address . ' - ' . $company_postal_code : $copy_address;

}

$company_phone      = get_option( 'ecode_company_phone' );
$company_phone_trim = str_replace( ' ', '', $company_phone );
$company_email      = get_option( 'ecode_company_email' );

$contact_form_data = ecode_get_cf7_by_name( 'contact-form-1' );
$contact_form_data = empty( $contact_form_data ) ? ecode_get_cf7_by_name( 'formulario-de-contacto-1' ) : $contact_form_data;

if( !empty( $contact_form_data ) ) {

	$contact_form_shortcode = '[contact-form-7 id="' . $contact_form_data->ID . '" title="' . $contact_form_data->post_title . '"]';
	$contact_form           = do_shortcode( $contact_form_shortcode );

} else {

	$contact_form = __( 'No hay ningún formulario creado', 'frontecode' );

}

$copy_location     = __( 'Ubicación', 'frontecode' );
$copy_contact_info = __( 'Información de contacto', 'frontecode' );
$copy_schedules    = __( 'Horario', 'frontecode' );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_75_template_87"{{builder}} data-edit="ecode_section_75_template_87"{{/builder}}>
		<div class="ecode_width_75_87">
			<section class="ecode_contact_info">
				{{php}}<?php

				if( !empty( $image_src ) ) {

				?>{{/php}}
				<figure>
					{{php}}<?php

					if( !empty( $image_hd_src ) ) {

					?>{{/php}}
					<source media="(min-width:1024px)" srcset="{{image_hd_src}}">
					<source media="(min-width:768px)" srcset="{{image_hd_src}}">
					{{php}}<?php

					}

					?>{{/php}}
					<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
				</figure>
				{{php}}<?php

				}

				if( !empty( $copy_address ) ) {

				?>{{/php}}
				<div class="ecode_contact"{{builder}} data-edit="ecode_contact"{{/builder}}>
					<i class="ecode_contact_icon"{{builder}} data-edit="ecode_contact_icon"{{/builder}}><svg width="35px" height="50px" viewBox="0 0 35 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-440.000000, 0.000000)" fill="#EE5827" fill-rule="nonzero"><g transform="translate(439.979167, 0.000000)"><path d="M32.0252437,8.54551657 C28.9966862,3.31900585 23.6173489,0.125925926 17.6353801,0.00389863548 C17.3800195,-0.00136452242 17.1230019,-0.00136452242 16.8675439,0.00389863548 C10.8856725,0.125925926 5.50633528,3.31900585 2.47768031,8.54551657 C-0.618031189,13.8878168 -0.702729045,20.3049708 2.25107212,25.711501 L14.6256335,48.361306 C14.6311891,48.371345 14.6367446,48.381384 14.6424951,48.3913255 C15.1869396,49.3376218 16.1622807,49.9025341 17.2516569,49.9025341 C18.3409357,49.9025341 19.3162768,49.3375244 19.8606238,48.3913255 C19.8663743,48.381384 19.8719298,48.371345 19.8774854,48.361306 L32.2520468,25.711501 C35.205653,20.3049708 35.1209552,13.8878168 32.0252437,8.54551657 Z M17.251462,22.6120858 C13.3819688,22.6120858 10.2339181,19.4640351 10.2339181,15.5945419 C10.2339181,11.7250487 13.3819688,8.57699805 17.251462,8.57699805 C21.1209552,8.57699805 24.2690058,11.7250487 24.2690058,15.5945419 C24.2690058,19.4640351 21.1210526,22.6120858 17.251462,22.6120858 Z"></path></g></g></g></svg></i>
					<p class="ecode_contact_title"{{builder}} data-edit="ecode_contact_title"{{/builder}}>{{copy_location}}</p>
					<p class="ecode_contact_text"{{builder}} data-edit="ecode_contact_text"{{/builder}}>{{copy_address}}</p>
				</div>
				{{php}}<?php

				}

				if( !empty( $company_phone ) || !empty( $company_email ) ) {

				?>{{/php}}
				<div class="ecode_contact"{{builder}} data-edit="ecode_contact"{{/builder}}>
					<i class="ecode_contact_icon"{{builder}} data-edit="ecode_contact_icon"{{/builder}}><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-532.000000, -6.000000)" fill="#EE5827"><g transform="translate(532.000000, 6.000000)"><path d="M48.6050584,36.6692607 L41.6322957,29.6964981 C39.1420233,27.2062257 34.9085603,28.2024319 33.9124514,31.4396887 C33.1653696,33.6810311 30.6750973,34.9261673 28.4338521,34.4280156 C23.4533074,33.1828794 16.729572,26.7081712 15.4844358,21.4785992 C14.7373541,19.2372568 16.2315175,16.7469844 18.4727626,16 C21.7101167,15.0038911 22.7062257,10.770428 20.2159533,8.28015564 L13.2431907,1.307393 C11.2509728,-0.435797665 8.26264591,-0.435797665 6.51945525,1.307393 L1.78793774,6.03891051 C-2.94357977,11.0194553 2.28599222,24.2178988 13.9902724,35.922179 C25.6945525,47.6264591 38.8929961,53.1051556 43.8735409,48.1245136 L48.6050584,43.3929961 C50.3483463,41.4007782 50.3483463,38.4124514 48.6050584,36.6692607 Z"></path></g></g></g></svg></i>
					<p class="ecode_contact_title"{{builder}} data-edit="ecode_contact_title"{{/builder}}>{{copy_contact_info}}</p>
					{{php}}<?php

					if( !empty( $company_phone ) ) {

					?>{{/php}}
					<p class="ecode_contact_text"{{builder}} data-edit="ecode_contact_text"{{/builder}}><a href="tel:{{company_phone_trim}}">{{company_phone}}</a></p>
					{{php}}<?php

					}

					if( !empty( $company_email ) ) {

					?>{{/php}}
					<p class="ecode_contact_text"{{builder}} data-edit="ecode_contact_text"{{/builder}}><a href="mailto:{{company_email}}">{{company_email}}</a></p>
					{{php}}<?php

					}

					?>{{/php}}
				</div>
				{{php}}<?php

				}

				if( !empty( $cards_group ) ) {

				?>{{/php}}
				<div class="ecode_contact"{{builder}} data-edit="ecode_contact"{{/builder}}>
					<i class="ecode_contact_icon"{{builder}} data-edit="ecode_contact_icon"{{/builder}}><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-487.000000, -98.000000)" fill="#EE5827" fill-rule="nonzero"><g transform="translate(487.000000, 98.000000)"><path d="M25,0 C11.2144471,0 0,11.2144471 0,25 C0,38.7855529 11.2144471,50 25,50 C38.7855529,50 50,38.7855529 50,25 C50,11.2144471 38.7855529,0 25,0 Z M36.8896484,37.9310607 C36.4833832,38.3373261 35.9500885,38.5417938 35.4167938,38.5417938 C34.8834991,38.5417938 34.349823,38.3373261 33.9439393,37.9310607 L23.5271454,27.5146484 C23.135376,27.1251679 22.9167938,26.5956879 22.9167938,26.0417938 L22.9167938,12.5 C22.9167938,11.3479614 23.8498687,10.4167938 25,10.4167938 C26.1501312,10.4167938 27.0832062,11.3479614 27.0832062,12.5 L27.0832062,25.1792908 L36.8896484,34.9853516 C37.7040863,35.8001709 37.7040863,37.1166229 36.8896484,37.9310607 Z"></path></g></g></g></svg></i>
					<p class="ecode_contact_title"{{builder}} data-edit="ecode_contact_title"{{/builder}}>{{copy_schedules}}</p>
					{{cards_group_loop_start}}<?php

					foreach( $cards_group as $card ) {

						$card_hours = $card['card_hours'];
						$card_days  = $card['card_days'];

						if( !empty( $card_hours ) && !empty( $card_days ) ) {

					?>{{/cards_group_loop_start}}
					<p class="ecode_contact_text"{{builder}} data-edit="ecode_contact_text"{{/builder}}>{{card_days}}</p>
					<p class="ecode_contact_text"{{builder}} data-edit="ecode_contact_text"{{/builder}}>{{card_hours}}</p>
					{{cards_group_loop_end}}<?php

						}

					}

					?>{{/cards_group_loop_end}}
				</div>
				{{php}}<?php

				}

				?>{{/php}}
				<div class="ecode_contact_social"{{builder}} data-edit="ecode_contact_social"{{/builder}}>
					{{php}}<?php

					// Display RRSS
					wpeb_get_rrss();

					?>{{/php}}{{builder}}<div class="ecode_social">
						<a href="#" target="_blank" rel="nofollow noopener noreferrer"><i><svg width="9px" height="16px" viewBox="0 0 9 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-101.000000, -53.000000)" fill="#000000"><g transform="translate(101.000000, 53.000000)"><path d="M6.921,2.65666667 L8.43784615,2.65666667 L8.43784615,0.112666667 C8.17615385,0.078 7.27615385,2.77555756e-17 6.228,2.77555756e-17 C4.041,2.77555756e-17 2.54284615,1.32466667 2.54284615,3.75933333 L2.54284615,6 L0.129461538,6 L0.129461538,8.844 L2.54284615,8.844 L2.54284615,16 L5.50176923,16 L5.50176923,8.84466667 L7.81753846,8.84466667 L8.18515385,6.00066667 L5.50107692,6.00066667 L5.50107692,4.04133333 C5.50176923,3.21933333 5.73161538,2.65666667 6.921,2.65666667 Z"></path></g></g></g></svg></i></a>
						<a href="#" target="_blank" rel="nofollow noopener noreferrer"><i><svg width="16px" height="13px" viewBox="0 0 16 13" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-203.000000, -46.000000)" fill="#000000"><g transform="translate(203.000000, 46.000000)"><path d="M16,1.539 C15.405,1.8 14.771,1.973 14.11,2.057 C14.79,1.651 15.309,1.013 15.553,0.244 C14.919,0.622 14.219,0.889 13.473,1.038 C12.871,0.397 12.013,0 11.077,0 C9.261,0 7.799,1.474 7.799,3.281 C7.799,3.541 7.821,3.791 7.875,4.029 C5.148,3.896 2.735,2.589 1.114,0.598 C0.831,1.089 0.665,1.651 0.665,2.256 C0.665,3.392 1.25,4.399 2.122,4.982 C1.595,4.972 1.078,4.819 0.64,4.578 C0.64,4.588 0.64,4.601 0.64,4.614 C0.64,6.208 1.777,7.532 3.268,7.837 C3.001,7.91 2.71,7.945 2.408,7.945 C2.198,7.945 1.986,7.933 1.787,7.889 C2.212,9.188 3.418,10.143 4.852,10.174 C3.736,11.047 2.319,11.573 0.785,11.573 C0.516,11.573 0.258,11.561 -5.32907052e-14,11.528 C1.453,12.465 3.175,13 5.032,13 C11.068,13 14.368,8 14.368,3.666 C14.368,3.521 14.363,3.381 14.356,3.242 C15.007,2.78 15.554,2.203 16,1.539 Z"></path></g></g></g></svg></i></a>
						<a href="#" target="_blank" rel="nofollow noopener noreferrer"><i><svg width="16px" height="16px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-158.000000, -46.000000)" fill="#000000"><g transform="translate(158.000000, 46.000000)"><path d="M11.3522813,0 L4.64775,0 C2.08496875,0 0,2.08496875 0,4.64775 L0,11.35225 C0,13.9150313 2.08496875,16 4.64775,16 L11.35225,16 C13.9150313,16 16,13.9150313 16,11.3522813 L16,4.64775 C16,2.08496875 13.9150313,0 11.3522813,0 Z M14.75,11.35225 C14.75,13.2257813 13.2257813,14.75 11.3522813,14.75 L4.64775,14.75 C2.77421875,14.75 1.25,13.2257813 1.25,11.3522813 L1.25,4.64775 C1.25,2.77421875 2.77421875,1.25 4.64775,1.25 L11.35225,1.25 C13.2257813,1.25 14.75,2.77421875 14.75,4.64775 L14.75,11.35225 Z" fill-rule="nonzero"></path><path d="M8,3.6875 C5.6220625,3.6875 3.6875,5.6220625 3.6875,8 C3.6875,10.3779375 5.6220625,12.3125 8,12.3125 C10.3779375,12.3125 12.3125,10.3779375 12.3125,8 C12.3125,5.6220625 10.3779375,3.6875 8,3.6875 Z M8,11.0625 C6.31134375,11.0625 4.9375,9.68865625 4.9375,8 C4.9375,6.31134375 6.31134375,4.9375 8,4.9375 C9.68865625,4.9375 11.0625,6.31134375 11.0625,8 C11.0625,9.68865625 9.68865625,11.0625 8,11.0625 Z" fill-rule="nonzero"></path><circle cx="12.375" cy="3.625" r="1"></circle></g></g></g></svg></i></a>
						<a href="#" target="_blank" rel="nofollow noopener noreferrer"><i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-47.000000, -138.000000)" fill="#000000"><g transform="translate(47.000000, 138.000000)"><path d="M49.9875,50 L49.9875,49.9979167 L50,49.9979167 L50,31.6604167 C50,22.6895833 48.06875,15.7791667 37.58125,15.7791667 C32.5395833,15.7791667 29.15625,18.5458333 27.775,21.16875 L27.6291667,21.16875 L27.6291667,16.6166667 L17.6854167,16.6166667 L17.6854167,49.9979167 L28.0395833,49.9979167 L28.0395833,33.46875 C28.0395833,29.1166667 28.8645833,24.9083333 34.2541667,24.9083333 C39.5645833,24.9083333 39.64375,29.875 39.64375,33.7479167 L39.64375,50 L49.9875,50 Z"></path><polygon points="0.825 16.61875 11.1916667 16.61875 11.1916667 50 0.825 50"></polygon><path d="M6.00416667,0 C2.68958333,0 0,2.68958333 0,6.00416667 C0,9.31875 2.68958333,12.0645833 6.00416667,12.0645833 C9.31875,12.0645833 12.0083333,9.31875 12.0083333,6.00416667 C12.00625,2.68958333 9.31666667,9.25185854e-16 6.00416667,0 Z"></path></g></g></g></svg></i></a>
						<a href="#" target="_blank" rel="nofollow noopener noreferrer"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 461.001 461.001" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg" style="" d="M365.257,67.393H95.744C42.866,67.393,0,110.259,0,163.137v134.728  c0,52.878,42.866,95.744,95.744,95.744h269.513c52.878,0,95.744-42.866,95.744-95.744V163.137  C461.001,110.259,418.135,67.393,365.257,67.393z M300.506,237.056l-126.06,60.123c-3.359,1.602-7.239-0.847-7.239-4.568V168.607  c0-3.774,3.982-6.22,7.348-4.514l126.06,63.881C304.363,229.873,304.298,235.248,300.506,237.056z" fill="#000000"></g></svg></i></a>
					</div>{{/builder}}
				</div>
			</section>
			<section class="ecode_contact_form">
				<div class="container_form">
					<h3 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{form_title}}</h3>
					{{php}}<?php

					if( !empty( $description ) ) {

					?>{{/php}}
					<div class="ecode_container_content"{{builder}} data-edit="ecode_container_content"{{/builder}}>
						{{description}}
					</div>
					{{php}}<?php

					}

					?>
					{{contact_form}}{{/php}}
					{{builder}}<div role="form" class="wpcf7" lang="es-ES" dir="ltr">
						<form action="#" method="post" class="wpcf7-form init" novalidate="novalidate" data-status="init">
							<div class="container_input">
								<label data-edit="wpcf7 .container_input label">Nombre</label>
								<span class="wpcf7-form-control-wrap your-name">
									<input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false">
								</span>
							</div>
							<div class="container_input">
								<label data-edit="wpcf7 .container_input label">Mail</label>
								<span class="wpcf7-form-control-wrap email">
									<input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false">
								</span>
							</div>
							<div class="container_input">
								<label data-edit="wpcf7 .container_input label">Teléfono</label>
								<span class="wpcf7-form-control-wrap tel">
									<input type="tel" name="tel" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false">
								</span>
							</div>
							<div class="container_input container_input_full">
								<label data-edit="wpcf7 .container_input label">Comentario</label>
								<span class="wpcf7-form-control-wrap message">
									<textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></textarea>
								</span>
							</div>
							<div class='container_legal'><p>La Responsable del Tratamiento de los datos recabados es XXXXX, XXXXX, con C.I.F.: XXXXXXXXX y con e-mail: <a href='mailto:#'>XXXX@XXXXXX.XXX</a>, con la finalidad de atender solicitudes de información, posibilitar la publicación de tus comentarios en los posts del Sitio Web y en redes sociales y remitir comunicaciones comerciales.</p><p>Tienes derecho a revocar el consentimiento en cualquier momento, así como los derechos de acceso, rectificación, supresión, limitación u oposición al tratamiento, a no ser objeto de decisiones automatizadas, así como a obtener información clara y transparente sobre el tratamiento de los datos, y formular una reclamación ante la AEPD. Más información en nuestra <a rel='nofollow' target='_black' href='#'>Política de Privacidad</a>.</p></div>
							<div class='acceptance'>
								<span class='wpcf7-form-control-wrap acceptance'>
									<span class='wpcf7-form-control wpcf7-acceptance'>
										<span class='wpcf7-list-item'>
											<label>
												<input type='checkbox' name='acceptance' value='1' aria-invalid='false'>
												<span class='wpcf7-list-item-label'>
													<p data-edit="wpcf7 .acceptance p:first-child">He leído y acepto las <a href='#'>Condiciones de los servicios y la Política de privacidad</a></p>
												</span>
											</label>
										</span>
									</span>
								</span>
							</div>
							<div class="container_button">
								<p class="wpcf7-form-control wpcf7-submit button button_primary" data-edit="wpcf7 .container_button .button">Get free quote</p>
							</div>
							<div class="wpcf7-response-output" aria-hidden="true"></div>
						</form>
					</div>{{/builder}}
				</div>
			</section>
		</div>
	</section>
</section>
