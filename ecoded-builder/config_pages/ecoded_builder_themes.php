<?php

$themes = array();

$url_directory_themes = WPEB_PLUGIN_DIR . '/themes/';

$array_themes = scandir( $url_directory_themes );

foreach( $array_themes as $theme ) {

	$theme_info = array(
		'name' => '',
		'images' => array()
	);

	// Check if folder theme_
	if( strpos( $theme, 'theme_' ) !== false ) {

		// Get name theme
		$theme_name = str_replace( 'theme_', '', $theme );

		$theme_info['name'] = $theme_name;

		// Get rute folder images
		$rute_theme_images = WPEB_PLUGIN_DIR . '/themes/' . $theme . '/img/';

		// Get array images
		$array_theme_images = scandir( $rute_theme_images );

		foreach( $array_theme_images as $img ) {

			if( strpos( $img, $theme_name ) !== false ) {

				$rute_image = WPEB_PLUGIN_FRONT_DIR . '/themes/' . $theme . '/img/' . $img;

				$theme_info['images'][] = $rute_image;

			}

		}

		$themes[] = $theme_info;

	}

}

?>
<div class="ecode_page">
	<h1 class="ecoded_builder_title"><?php echo __( 'Ecoded builder - Selector de tema predefinido', 'ecoded_builder' ); ?></h1>
	<p class="ecoded_builder_description"><?php echo __( 'Selecciona la estructura que desee para su sitio web.', 'ecoded_builder' ); ?></p>
	<section id="ecode_themes" class="ecode_themes">
		<?php

		$cont = 0;

		foreach ( $themes as $theme ) {

			$theme_name = ucfirst( $theme['name'] );
			$theme_image = $theme['images'][0];

		?>
		<article class="ecode_theme" data-id="<?php echo $cont; ?>">
			<figure>
				<img src="<?php echo $theme_image; ?>" alt="<?php echo $theme_name; ?>">
			</figure>
			<h2><?php echo $theme_name; ?></h2>
		</article>
		<?php

			$cont++;

		}

		?>
	</section>
	<section id="ecoded_builder_container_popup" class="ecoded_builder_container_popup"></section>
	<section id="ecoded_builder_container_compile" class="ecoded_builder_container_compile"></section>
	<section id="ecode_container_loader" class="ecode_container_loader">
		<div class="ecode_container_loader_width">
			<span class="loader"></span>
			<p><?php echo __( 'Cargando datos...', 'ecoded_builder' ); ?></p>
		</div>
	</section>
</div>
<script type="text/javascript">
var array_themes = <?php echo json_encode( $themes ); ?>;
</script>
