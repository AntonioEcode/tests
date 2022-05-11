<?php

$array_icons = array(
	'icon_content_1'    => get_icon_dashboard( 'icon_template_content_1' ),
	'icon_content_2'    => get_icon_dashboard( 'icon_template_content_2' ),
	'icon_footer'       => get_icon_dashboard( 'icon_template_footer' ),
	'icon_header'       => get_icon_dashboard( 'icon_template_header' ),
	'icon_main'         => get_icon_dashboard( 'icon_template_main' ),
	'icon_arrow_right'  => get_icon_dashboard( 'icon_arrow_right' ),
	'icon_edit'         => get_icon_dashboard( 'icon_edit' ),
	'icon_delete'       => get_icon_dashboard( 'icon_delete' ),
	'icon_arrow_down'   => get_icon_dashboard( 'icon_arrow_down' ),
	'icon_arrow_switch' => get_icon_dashboard( 'icon_arrow_switch' ),
	'icon_content'      => get_icon_dashboard( 'icon_content' ),
	'icon_hover'        => get_icon_dashboard( 'icon_hover' ),
);

$array_global_colors = array(
	'primary_color'   => !empty( get_option( 'wpeb_primary_color' ) ) ? get_option( 'wpeb_primary_color' ) : '',
	'secondary_color' => !empty( get_option( 'wpeb_secondary_color' ) ) ? get_option( 'wpeb_secondary_color' ) : ''
);

$template_selected = isset( $_GET['template'] ) ? $_GET['template'] : '';

$wpeb_css_version = !empty( get_option( 'wpeb_css_version' ) ) ? get_option( 'wpeb_css_version' ) : '0';

?>
<script type="text/javascript">
	var var_url = '<?php echo base64_encode( site_url() ); ?>';
	var ajax_url = '<?php echo base64_encode( admin_url( 'admin-ajax.php' ) ); ?>';
	var array_icons = <?php echo json_encode( $array_icons ); ?>;
	var array_global_colors = <?php echo json_encode( $array_global_colors ); ?>;
	var template_selected = '<?php echo $template_selected; ?>';
	var css_version = <?php echo json_encode( $wpeb_css_version ); ?>;
</script>
