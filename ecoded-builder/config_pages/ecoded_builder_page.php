<?php

// Get page types
$page_types_data = wpeb_get_page_types( $id = NULL, $order = 'ASC' );

?>
<div class="ecode_page ecode_page_builder">
	<h1 class="ecoded_builder_title"><?php echo __( 'Ecoded builder', 'ecoded_builder' ); ?></h1>
	<p class="ecoded_builder_description"><?php echo __( 'Selecciona los bloques que desees para cada uno de los siguientes tipos de página', 'ecoded_builder' ); ?></p>
	<div id="button_compile_theme" class="save_page">
		<i><?php echo get_icon_dashboard( 'icon_save' ); ?></i>
	</div>
	<div class="ecode_page_buttons_actions">
		<select id="select_page_urls" class="select_page_urls ecode_button_builder_hidden">
			<option value="-"><?php echo __( '--- Seleccionar página ---', 'frontecode' ); ?></option>
		</select>
		<a href="#" id="ecode_button_view_page" class="ecode_button_builder ecode_button_builder_c_c ecode_button_view_page ecode_button_builder_disabled"><?php echo __( 'Ver página', 'frontecode' ); ?></a>
		<a href="#" id="ecode_button_edit_page" class="ecode_button_builder ecode_button_builder_c_c ecode_button_edit_page ecode_button_builder_disabled"><?php echo __( 'Editar contenido', 'frontecode' ); ?></a>
	</div>
	<div class="ecode_page_buttons_templates">
		<?php

		if( !empty( $page_types_data ) ) {

			foreach( $page_types_data as $page_type ) {

				if( $page_type->template_status != 'trash' ) {

		?>
		<button class="ecode_button_template" name="<?php echo $page_type->id; ?>" data-template="<?php echo $page_type->template_name; ?>"><?php echo $page_type->name; ?></button>
		<?php

				}

			}

		}

		?>
	</div>
</div>
<section id="ecode_page_template" class="ecode_page_template"></section>
<section id="ecoded_builder_container_popup" class="ecoded_builder_container_popup"></section>
<section id="ecoded_builder_container_compile" class="ecoded_builder_container_compile"></section>
<section id="ecode_container_loader" class="ecode_container_loader">
	<div class="ecode_container_loader_width">
		<span class="loader"></span>
		<p><?php echo __( 'Cargando datos...', 'ecoded_builder' ); ?></p>
	</div>
</section>
<section id="ecode_container_create_ecoded" class="ecode_container_loader">
	<div class="ecode_container_loader_width">
		<span class="loader"></span>
		<p><?php echo __( 'Estamos creando tu ecoded...', 'ecoded_builder' ); ?></p>
	</div>
</section>
<?php

require_once WPEB_PLUGIN_DIR . '/config_pages/template-parts/builder-page/content-styles.php';
require_once WPEB_PLUGIN_DIR . '/config_pages/template-parts/builder-page/content-scripts.php';

?>
