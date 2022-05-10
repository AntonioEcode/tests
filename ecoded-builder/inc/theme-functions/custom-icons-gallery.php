<?php

function custom_icons_gallery( $type ) {

	$html_icons = '';

	if( $type == 'build' ) {

		$html_icons .= '<i>' . get_icon( 'icon_build_1' ) . '</i>';
		$html_icons .= '<i>' . get_icon( 'icon_build_2' ) . '</i>';
		$html_icons .= '<i>' . get_icon( 'icon_build_3' ) . '</i>';
		$html_icons .= '<i>' . get_icon( 'icon_build_4' ) . '</i>';
		$html_icons .= '<i>' . get_icon( 'icon_build_5' ) . '</i>';
		$html_icons .= '<i>' . get_icon( 'icon_build_6' ) . '</i>';
		$html_icons .= '<i>' . get_icon( 'icon_build_7' ) . '</i>';

	} elseif( $type == 'beauty' ) {

		$html_icons .= '<i>' . get_icon( 'icon_beauty_1' ) . '</i>';
		$html_icons .= '<i>' . get_icon( 'icon_beauty_2' ) . '</i>';
		$html_icons .= '<i>' . get_icon( 'icon_beauty_3' ) . '</i>';
		$html_icons .= '<i>' . get_icon( 'icon_beauty_4' ) . '</i>';
		$html_icons .= '<i>' . get_icon( 'icon_beauty_5' ) . '</i>';
		$html_icons .= '<i>' . get_icon( 'icon_beauty_6' ) . '</i>';
		$html_icons .= '<i>' . get_icon( 'icon_beauty_7' ) . '</i>';
		$html_icons .= '<i>' . get_icon( 'icon_beauty_8' ) . '</i>';

	} elseif( $type == 'health' ) {

		$html_icons .= '<i>' . get_icon( 'icon_health_1' ) . '</i>';
		$html_icons .= '<i>' . get_icon( 'icon_health_2' ) . '</i>';
		$html_icons .= '<i>' . get_icon( 'icon_health_3' ) . '</i>';
		$html_icons .= '<i>' . get_icon( 'icon_health_4' ) . '</i>';
		$html_icons .= '<i>' . get_icon( 'icon_health_5' ) . '</i>';

	}

	return $html_icons;

}

?>
