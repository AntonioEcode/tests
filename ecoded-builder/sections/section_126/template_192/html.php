{{php}}<?php

$current_id = wpeb_get_id();
$title      = ( is_archive() || is_tag() ) ? get_the_archive_title() : get_the_title( $current_id );

$image     = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}', TRUE );
$image_id  = get_post_meta( $current_id, '_{{template_name}}_image_{{page_section_id}}_id', TRUE );
$image_id  = empty( $image_id ) ? attachment_url_to_postid( $image ) : $image_id;
$image_src = wp_get_attachment_image_src( $image_id, 'full' )[0];
$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', TRUE );
$image_alt = !empty( $image_alt ) ? $image_alt : $title;

$description = get_post_meta( $current_id, '_{{template_name}}_description_{{page_section_id}}', TRUE );

$company_phone       = get_option( 'ecode_company_landline_phone' );
$company_phone_trim  = str_replace( ' ', '', $company_phone );
$company_mobile      = get_option( 'ecode_company_phone' );
$company_mobile_trim = str_replace( ' ', '', $company_mobile );

$contact_form_data = ecode_get_cf7_by_name( 'contact-form-1' );
$contact_form_data = empty( $contact_form_data ) ? ecode_get_cf7_by_name( 'formulario-de-contacto-1' ) : $contact_form_data;

if( !empty( $contact_form_data ) ) {

	$contact_form_shortcode = '[contact-form-7 id="' . $contact_form_data->ID . '" title="' . $contact_form_data->post_title . '"]';
	$contact_form           = do_shortcode( $contact_form_shortcode );

} else {

	$contact_form = __( 'No hay ningún formulario creado', 'frontecode' );

}

$copy_reserve = __( 'Reservar por teléfono', 'frontecode' );

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	<section class="ecode_section_126_template_192"{{builder}} data-edit="ecode_section_126_template_192"{{/builder}}>
		<div class="ecode_width_126_192">
			<section class="ecode_contact_info">
				{{php}}<?php

				if( !empty( $image_src ) ) {

				?>{{/php}}
				<figure class="ecode_figure"{{builder}} data-edit="ecode_figure"{{/builder}}>
					<img loading="lazy" src="{{image_src}}" alt="{{image_alt}}">
				</figure>
				{{php}}<?php

				}

				if( !empty( $description ) ) {

				?>{{/php}}
				<p class="ecode_text"{{builder}} data-edit="ecode_text"{{/builder}}>{{description}}</p>
				{{php}}<?php

				}

				?>{{/php}}
				<h2 class="ecode_title"{{builder}} data-edit="ecode_title"{{/builder}}>{{copy_reserve}}</h2>
				{{php}}<?php

				if( !empty( $company_phone ) ) {

				?>{{/php}}
				<p class="ecode_link_tel"{{builder}} data-edit="ecode_link_tel"{{/builder}}><i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-831.000000, -17.000000)" fill="#010002"><g transform="translate(831.000000, 17.000000)"><path d="M49.3371336,24.4620805 C50.2428339,23.435906 50.1553746,21.8630872 49.1418567,20.95 L26.8127036,0.821812081 C25.7991857,-0.0912751678 24.1742671,-0.072147651 23.1820847,0.864932886 L0.777035831,22.0231544 C-0.21514658,22.9602349 -0.263843648,24.5310403 0.669218241,25.5302013 L1.23094463,26.1328859 C2.16286645,27.132047 3.66921824,27.2511745 4.59332248,26.3981544 L6.26775244,24.8533557 L6.26775244,47.4694631 C6.26775244,48.857047 7.35912052,49.9803691 8.70504886,49.9803691 L17.4385993,49.9803691 C18.7845277,49.9803691 19.8758958,48.857047 19.8758958,47.4694631 L19.8758958,31.6473154 L31.0156352,31.6473154 L31.0156352,47.4694631 C30.9962541,48.8560403 31.9592834,49.9793624 33.3052117,49.9793624 L42.5605863,49.9793624 C43.9065147,49.9793624 44.9978827,48.8560403 44.9978827,47.4684564 L44.9978827,25.1718121 C44.9978827,25.1718121 45.4604235,25.5892617 46.0309446,26.1058725 C46.6004886,26.6214765 47.7967427,26.2080537 48.702443,25.1808725 L49.3371336,24.4620805 Z"></path></g></g></g></svg></i><a href="tel:{{company_phone_trim}}">{{company_phone}}</a></p>
				{{php}}<?php

				}

				if( !empty( $company_mobile ) ) {

				?>{{/php}}
				<p class="ecode_link_tel"{{builder}} data-edit="ecode_link_tel"{{/builder}}><i><svg width="29px" height="49px" viewBox="0 0 29 49" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-728.000000, -17.000000)" fill="#000000" fill-rule="nonzero"><g transform="translate(727.000000, 17.000000)"><path d="M25.8821429,0 L5.26428571,0 C3.29107143,0 1.69821429,1.6 1.69821429,3.56964286 L1.69821429,45.4375 C1.69821429,47.4053571 3.29107143,49.0035714 5.26428571,49.0035714 L25.8821429,49.0035714 C27.8517857,49.0035714 29.4482143,47.4053571 29.4482143,45.4375 L29.4482143,3.56964286 C29.4482143,1.6 27.8517857,0 25.8821429,0 Z M10.4857143,2.16785714 L20.6642857,2.16785714 C20.9214286,2.16785714 21.1303571,2.55178571 21.1303571,3.02678571 C21.1303571,3.50178571 20.9214286,3.8875 20.6642857,3.8875 L10.4857143,3.8875 C10.2267857,3.8875 10.0214286,3.50178571 10.0214286,3.02678571 C10.0214286,2.55178571 10.2267857,2.16785714 10.4857143,2.16785714 Z M15.575,45.4803571 C14.3196429,45.4803571 13.2982143,44.4589286 13.2982143,43.2017857 C13.2982143,41.9446429 14.3196429,40.9267857 15.575,40.9267857 C16.8267857,40.9267857 17.8482143,41.9446429 17.8482143,43.2017857 C17.8482143,44.4589286 16.8267857,45.4803571 15.575,45.4803571 Z M26.7767857,37.6785714 L4.37142857,37.6785714 L4.37142857,6.02321429 L26.7767857,6.02321429 L26.7767857,37.6785714 Z"></path></g></g></g></svg></i><a href="tel:{{company_mobile_trim}}">{{company_mobile}}</a></p>
				{{php}}<?php

				}

				// Display RRSS
				wpeb_get_rrss();

				?>{{/php}}{{builder}}<div class="ecode_social">
					<a href="#" target="_blank" rel="nofollow noopener noreferrer"><i><svg width="9px" height="16px" viewBox="0 0 9 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-101.000000, -53.000000)" fill="#000000"><g transform="translate(101.000000, 53.000000)"><path d="M6.921,2.65666667 L8.43784615,2.65666667 L8.43784615,0.112666667 C8.17615385,0.078 7.27615385,2.77555756e-17 6.228,2.77555756e-17 C4.041,2.77555756e-17 2.54284615,1.32466667 2.54284615,3.75933333 L2.54284615,6 L0.129461538,6 L0.129461538,8.844 L2.54284615,8.844 L2.54284615,16 L5.50176923,16 L5.50176923,8.84466667 L7.81753846,8.84466667 L8.18515385,6.00066667 L5.50107692,6.00066667 L5.50107692,4.04133333 C5.50176923,3.21933333 5.73161538,2.65666667 6.921,2.65666667 Z"></path></g></g></g></svg></i></a>
					<a href="#" target="_blank" rel="nofollow noopener noreferrer"><i><svg width="16px" height="13px" viewBox="0 0 16 13" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-203.000000, -46.000000)" fill="#000000"><g transform="translate(203.000000, 46.000000)"><path d="M16,1.539 C15.405,1.8 14.771,1.973 14.11,2.057 C14.79,1.651 15.309,1.013 15.553,0.244 C14.919,0.622 14.219,0.889 13.473,1.038 C12.871,0.397 12.013,0 11.077,0 C9.261,0 7.799,1.474 7.799,3.281 C7.799,3.541 7.821,3.791 7.875,4.029 C5.148,3.896 2.735,2.589 1.114,0.598 C0.831,1.089 0.665,1.651 0.665,2.256 C0.665,3.392 1.25,4.399 2.122,4.982 C1.595,4.972 1.078,4.819 0.64,4.578 C0.64,4.588 0.64,4.601 0.64,4.614 C0.64,6.208 1.777,7.532 3.268,7.837 C3.001,7.91 2.71,7.945 2.408,7.945 C2.198,7.945 1.986,7.933 1.787,7.889 C2.212,9.188 3.418,10.143 4.852,10.174 C3.736,11.047 2.319,11.573 0.785,11.573 C0.516,11.573 0.258,11.561 -5.32907052e-14,11.528 C1.453,12.465 3.175,13 5.032,13 C11.068,13 14.368,8 14.368,3.666 C14.368,3.521 14.363,3.381 14.356,3.242 C15.007,2.78 15.554,2.203 16,1.539 Z"></path></g></g></g></svg></i></a>
					<a href="#" target="_blank" rel="nofollow noopener noreferrer"><i><svg width="16px" height="16px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-158.000000, -46.000000)" fill="#000000"><g transform="translate(158.000000, 46.000000)"><path d="M11.3522813,0 L4.64775,0 C2.08496875,0 0,2.08496875 0,4.64775 L0,11.35225 C0,13.9150313 2.08496875,16 4.64775,16 L11.35225,16 C13.9150313,16 16,13.9150313 16,11.3522813 L16,4.64775 C16,2.08496875 13.9150313,0 11.3522813,0 Z M14.75,11.35225 C14.75,13.2257813 13.2257813,14.75 11.3522813,14.75 L4.64775,14.75 C2.77421875,14.75 1.25,13.2257813 1.25,11.3522813 L1.25,4.64775 C1.25,2.77421875 2.77421875,1.25 4.64775,1.25 L11.35225,1.25 C13.2257813,1.25 14.75,2.77421875 14.75,4.64775 L14.75,11.35225 Z" fill-rule="nonzero"></path><path d="M8,3.6875 C5.6220625,3.6875 3.6875,5.6220625 3.6875,8 C3.6875,10.3779375 5.6220625,12.3125 8,12.3125 C10.3779375,12.3125 12.3125,10.3779375 12.3125,8 C12.3125,5.6220625 10.3779375,3.6875 8,3.6875 Z M8,11.0625 C6.31134375,11.0625 4.9375,9.68865625 4.9375,8 C4.9375,6.31134375 6.31134375,4.9375 8,4.9375 C9.68865625,4.9375 11.0625,6.31134375 11.0625,8 C11.0625,9.68865625 9.68865625,11.0625 8,11.0625 Z" fill-rule="nonzero"></path><circle cx="12.375" cy="3.625" r="1"></circle></g></g></g></svg></i></a>
					<a href="#" target="_blank" rel="nofollow noopener noreferrer"><i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-47.000000, -138.000000)" fill="#000000"><g transform="translate(47.000000, 138.000000)"><path d="M49.9875,50 L49.9875,49.9979167 L50,49.9979167 L50,31.6604167 C50,22.6895833 48.06875,15.7791667 37.58125,15.7791667 C32.5395833,15.7791667 29.15625,18.5458333 27.775,21.16875 L27.6291667,21.16875 L27.6291667,16.6166667 L17.6854167,16.6166667 L17.6854167,49.9979167 L28.0395833,49.9979167 L28.0395833,33.46875 C28.0395833,29.1166667 28.8645833,24.9083333 34.2541667,24.9083333 C39.5645833,24.9083333 39.64375,29.875 39.64375,33.7479167 L39.64375,50 L49.9875,50 Z"></path><polygon points="0.825 16.61875 11.1916667 16.61875 11.1916667 50 0.825 50"></polygon><path d="M6.00416667,0 C2.68958333,0 0,2.68958333 0,6.00416667 C0,9.31875 2.68958333,12.0645833 6.00416667,12.0645833 C9.31875,12.0645833 12.0083333,9.31875 12.0083333,6.00416667 C12.00625,2.68958333 9.31666667,9.25185854e-16 6.00416667,0 Z"></path></g></g></g></svg></i></a>
					<a href="#" target="_blank" rel="nofollow noopener noreferrer"><i><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 461.001 461.001" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg" style="" d="M365.257,67.393H95.744C42.866,67.393,0,110.259,0,163.137v134.728  c0,52.878,42.866,95.744,95.744,95.744h269.513c52.878,0,95.744-42.866,95.744-95.744V163.137  C461.001,110.259,418.135,67.393,365.257,67.393z M300.506,237.056l-126.06,60.123c-3.359,1.602-7.239-0.847-7.239-4.568V168.607  c0-3.774,3.982-6.22,7.348-4.514l126.06,63.881C304.363,229.873,304.298,235.248,300.506,237.056z" fill="#000000"></g></svg></i></a>
				</div>{{/builder}}
			</section>
			<section class="ecode_contact_form">
				<div class="container_form">
					{{php}}{{contact_form}}{{/php}}{{builder}}
					<div role="form" class="wpcf7" lang="es-ES" dir="ltr">
						<form action="/grupoclickseguridad/contacto/#wpcf7-f75-o1" method="post" class="wpcf7-form init" novalidate="novalidate" data-status="init">
							<div class="container_input">
								<label data-edit="container_form .container_input label">Nombre</label>
								<span class="wpcf7-form-control-wrap your-name">
									<input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Nombre">
								</span>
							</div>
							<div class="container_input">
								<label data-edit="container_form .container_input label">Apellidos</label>
								<span class="wpcf7-form-control-wrap surname">
									<input type="text" name="surname" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false">
								</span>
							</div>
							<div class="container_input">
								<label data-edit="container_form .container_input label">Mail</label>
								<span class="wpcf7-form-control-wrap email">
									<input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Mail">
								</span>
							</div>
							<div class="container_input">
								<label data-edit="container_form .container_input label">Teléfono</label>
								<span class="wpcf7-form-control-wrap tel">
									<input type="tel" name="tel" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false" placeholder="Teléfono">
								</span>
							</div>
							<div class="container_input container_input_full">
								<label data-edit="container_form .container_input label">Comentario</label>
								<span class="wpcf7-form-control-wrap message">
									<textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Comentario"></textarea>
								</span>
							</div>
							<div class="container_legal">
								<p>La Responsable del Tratamiento de los datos recabados es XXXXX, XXXXX, con C.I.F.: XXXXXXXXX y con e-mail: <a href="mailto:#">XXXX@XXXXXX.XXX</a>, con la finalidad de atender solicitudes de información, posibilitar la publicación de tus comentarios en los posts del Sitio Web y en redes sociales y remitir comunicaciones comerciales.</p><p>Tienes derecho a revocar el consentimiento en cualquier momento, así como los derechos de acceso, rectificación, supresión, limitación u oposición al tratamiento, a no ser objeto de decisiones automatizadas, así como a obtener información clara y transparente sobre el tratamiento de los datos, y formular una reclamación ante la AEPD. Más información en nuestra <a rel="nofollow" target="_black" href="#">Política de Privacidad</a>.</p>
							</div>
							<div class='acceptance'>
								<span class='wpcf7-form-control-wrap acceptance'>
									<span class='wpcf7-form-control wpcf7-acceptance'>
										<span class='wpcf7-list-item'>
											<label>
												<input type='checkbox' name='acceptance' value='1' aria-invalid='false'>
												<span class='wpcf7-list-item-label'>
													<p>He leído y acepto las <a href='#'>Condiciones de los servicios y la Política de privacidad</a></p>
												</span>
											</label>
										</span>
									</span>
								</span>
							</div>
							<div class="container_button">
								<p class="wpcf7-form-control wpcf7-submit button button_primary" data-edit="container_form .container_button .button">Get free quote</p>
							</div>
							<div class="wpcf7-response-output" aria-hidden="true"></div>
						</form>
					</div>{{/builder}}
				</div>
			</section>
		</div>
	</section>
</section>
