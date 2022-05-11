<?php

/******************************************************************************/
/*                             General functions                              */
/******************************************************************************/
require_once WPEB_PLUGIN_INC . '/functions/check-edit-builder-sections.php';
require_once WPEB_PLUGIN_INC . '/functions/get-icon-dashboard.php';
require_once WPEB_PLUGIN_INC . '/functions/get-template-name-by-id.php';
require_once WPEB_PLUGIN_INC . '/functions/check-is-global-template.php';
require_once WPEB_PLUGIN_INC . '/functions/upload-image-to-media.php';

/******************************************************************************/
/*                              Load CSS and JS                               */
/******************************************************************************/

require_once WPEB_PLUGIN_INC . '/functions/load_css_js/load_css.php';
require_once WPEB_PLUGIN_INC . '/functions/load_css_js/load_js.php';

/******************************************************************************/
/*                             Read config json                               */
/******************************************************************************/

require_once WPEB_PLUGIN_INC . '/functions/read_config_json/read_config_db.php';

/******************************************************************************/
/*                         Functions used in services                         */
/******************************************************************************/

require_once WPEB_PLUGIN_INC . '/functions/services/user_exists.php';
require_once WPEB_PLUGIN_INC . '/functions/services/check_ajax_access.php';
require_once WPEB_PLUGIN_INC . '/functions/services/get_content_matches.php';
require_once WPEB_PLUGIN_INC . '/functions/services/get_real_data.php';
require_once WPEB_PLUGIN_INC . '/functions/services/demo_dictionary.php';
require_once WPEB_PLUGIN_INC . '/functions/services/get_html_demo.php';
require_once WPEB_PLUGIN_INC . '/functions/services/get_template_code.php';
require_once WPEB_PLUGIN_INC . '/functions/services/get_compile_global_styles_content.php';
require_once WPEB_PLUGIN_INC . '/functions/services/delete_custom_compile_style_section.php';
require_once WPEB_PLUGIN_INC . '/functions/services/set_global_styles_to_css_template.php';
require_once WPEB_PLUGIN_INC . '/functions/services/get_wp_pages_data_by_page_type_id.php';
require_once WPEB_PLUGIN_INC . '/functions/services/get_section_data_by.php';

?>
