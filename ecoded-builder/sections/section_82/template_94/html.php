{{php}}<?php

$blog_url = get_bloginfo( 'url' ) . '/';

$logo_id  = !empty( get_option( 'wpeb_logo' ) ) ? get_option( 'wpeb_logo' ) : '';

// Check if contains URL or int
if( !empty( $logo_id ) ) {

	if( is_numeric( $logo_id ) ) {

		$logo_src = wp_get_attachment_image_src( $logo_id, 'full' )[0];
		$logo_alt = get_post_meta( $logo_id, '_wp_attachment_image_alt', TRUE );
		$logo_alt = !empty( $logo_alt ) ? $logo_alt : get_bloginfo( 'name' );

	} elseif( is_string( $logo_id ) ) {

		$logo_src = $logo_id;
		$logo_alt = get_bloginfo( 'name' );

	}

}

$company_phone      = get_option( 'ecode_company_phone' );
$company_phone_trim = str_replace( ' ', '', $company_phone );
$company_email      = get_option( 'ecode_company_email' );
$company_schedule   = get_option( 'ecode_schedule_time' );

$class_without_info_contact = '';

if( empty( $company_phone ) && empty( $company_email ) && empty( $company_schedule ) ) {

	$class_without_info_contact = ' ecode_section_without_info_contact';

}

$menu_nav = wp_nav_menu(
	array(
		'theme_location' => 'menu_header_main',
		'container' => 'nav',
		'items_wrap' => '<ul id="%1$s" class="menu-item %2$s">%3$s</ul>',
		'container_class' => 'nav_main_menu',
		'menu_class' => 'ul_main_menu',
		'menu_id' => 'ul_main_menu',
		'echo' => FALSE,
		'walker' => new Walker_Nav_Main_Menu,
	)
);

?>{{/php}}
<section id="page_section_{{page_section_id}}"{{builder}} class="page_section"{{/builder}}>
	{{php}}<header id="ecode_section_82_template_94" class="ecode_section_82_template_94<?php echo $class_without_info_contact; ?>">{{/php}}
	{{builder}}<header id="ecode_section_82_template_94" class="ecode_section_82_template_94" data-edit="ecode_section_82_template_94">{{/builder}}
		<div class="header_width">
			<figure class="logo">
				<a href="{{blog_url}}">
					<img src="{{logo_src}}" alt="{{logo_alt}}">
				</a>
			</figure>
			<div id="toggle_menu" class="toggle_menu">
				<span class="top"></span>
				<span class="middle"></span>
				<span class="bottom"></span>
			</div>
			<section id="container_main_menu" class="container_main_menu">
				{{php}}{{menu_nav}}{{/php}}{{builder}}
				<nav class="nav_main_menu">
					<ul class="menu-item ul_main_menu">
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item current_page_item">
							<a href="#">Home</a>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page">
							<a href="#">About us</a>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children current-menu-ancestor">
							<span class="element_without_link">Service</span>
							<ul class="sub-menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item">
									<a href="#">Service 1</a>
								</li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page">
									<a href="#">Service 2</a>
								</li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page">
									<a href="#">Service 3</a>
								</li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page">
									<a href="#">Service 4</a>
								</li>
							</ul>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page">
							<a href="#">Our Team</a>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page">
							<a href="#">Blog</a>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page">
							<a href="#">Contact Us</a>
						</li>
					</ul>
				</nav>{{/builder}}
				{{php}}<?php

				if( empty( $class_without_info_contact ) ) {

				?>{{/php}}
				<section class="ecode_header_info_contact">
					<div class="ecode_header_info_contact_width">
						<div class="ecode_header_contact">
							<p class="ecode_header_contact_text" {{builder}} data-edit="ecode_header_contact_text"{{/builder}}><a href="tel:{{company_phone_trim}}"><i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-20.000000, -20.000000)" fill="#4E6DCC"><g transform="translate(20.000000, 20.000000)"><path d="M45.8685714,32.8192708 C42.8153247,32.8192708 39.8174026,32.3404948 36.9764935,31.3992187 C35.5844156,30.9231771 33.8731169,31.3598958 33.0235065,32.2347656 L27.4161039,36.478776 C20.9131169,32.9984375 16.9074026,28.9835937 13.4835065,22.5126302 L17.5919481,17.0371094 C18.6593506,15.9683594 19.0422078,14.4071615 18.5835065,12.9423177 C17.6406494,10.0790365 17.1616883,7.07473958 17.1616883,4.01223958 C17.1618182,1.79986979 15.3666234,0 13.1601299,0 L4.00168831,0 C1.79519481,0 0,1.79986979 0,4.01210937 C0,29.3701823 20.5763636,50 45.8685714,50 C48.0750649,50 49.8702597,48.2001302 49.8702597,45.9878906 L49.8702597,36.83125 C49.8701299,34.6191406 48.0749351,32.8192708 45.8685714,32.8192708 Z"></path></g></g></g></svg></i>{{company_phone}}</a></p>
							<p class="ecode_header_contact_text" {{builder}} data-edit="ecode_header_contact_text"{{/builder}}><i><svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-90.000000, -20.000000)" fill="#4E6DCC" fill-rule="nonzero"><g transform="translate(90.000000, 20.000000)"><path d="M25,0 C11.2149414,0 0,11.2149414 0,25 C0,38.7850586 11.2149414,50 25,50 C38.7850586,50 50,38.7850586 50,25 C50,11.2149414 38.7850586,0 25,0 Z M36.3379883,28.4506836 L24.5070313,28.4506836 C24.4832031,28.4506836 24.4601563,28.4478516 24.4366211,28.447168 C24.4130859,28.4480469 24.3900391,28.4506836 24.3662109,28.4506836 C23.1994141,28.4506836 22.2535156,27.5047852 22.2535156,26.3379883 L22.2535156,9.15498047 C22.2535156,7.98818359 23.1994141,7.04228516 24.3662109,7.04228516 C25.5330078,7.04228516 26.4789063,7.98818359 26.4789063,9.15498047 L26.4789063,24.2253906 L36.3380859,24.2253906 C37.5048828,24.2253906 38.4507813,25.1712891 38.4507813,26.3380859 C38.4507813,27.5048828 37.5047852,28.4506836 36.3379883,28.4506836 Z"></path></g></g></g></svg></i><span>{{company_schedule}}</span></p>
							<p class="ecode_header_contact_text" {{builder}} data-edit="ecode_header_contact_text"{{/builder}}><a href="mailto:{{company_email}}"><i><svg width="50px" height="38px" viewBox="0 0 50 38" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-160.000000, -26.000000)" fill="#4E6DCC"><g transform="translate(160.000000, 26.000000)"><path d="M22.5488281,18.7398385 C23.8543945,19.6218542 26.1452148,19.6219531 27.4510742,18.7397396 C27.4512695,18.7396406 27.4515625,18.7394427 27.4517578,18.7393438 L49.7041992,3.70648438 C48.9743164,1.56740104 46.9680664,0.026421875 44.612207,0.026421875 L5.38730469,0.026421875 C3.03134766,0.026421875 1.02519531,1.56740104 0.295214844,3.70648438 L22.5481445,18.7394427 C22.5484375,18.7396406 22.5486328,18.7396406 22.5488281,18.7398385 Z"></path><path d="M29.0767578,21.2095417 C29.0764648,21.2097396 29.0762695,21.2099375 29.0760742,21.2100365 C27.9333008,21.9820104 26.4663086,22.3680469 24.9998047,22.3680469 C23.5330078,22.3680469 22.0666016,21.9821094 20.9237305,21.2099375 C20.9235352,21.2098385 20.9234375,21.2097396 20.9232422,21.2096406 L0,7.07492708 L0,32.5143438 C0,35.5243594 2.41669922,37.9731823 5.38730469,37.9731823 L44.6125,37.9731823 C47.5830078,37.9731823 49.9996094,35.5243594 49.9996094,32.5143438 L49.9996094,7.07492708 L29.0767578,21.2095417 Z"></path></g></g></g></svg></i>{{company_email}}</a></p>
						</div>
					</div>
				</section>
				{{php}}<?php

				}

				?>{{/php}}
			</section>
		</div>
	</header>
</section>
