<?php

/******************************************************************************/
/*                        AJAX to get page structure                          */
/******************************************************************************/
require_once WPEB_PLUGIN_INC . '/services/get_page_type_sections.php';

/******************************************************************************/
/*   AJAX to get sections and templates by section_type_id for popup builder  */
/******************************************************************************/
require_once WPEB_PLUGIN_INC . '/services/get_sections_templates_by.php';

/******************************************************************************/
/*    AJAX to save template id selected for section and return section code   */
/******************************************************************************/
require_once WPEB_PLUGIN_INC . '/services/save_selected_template.php';

/******************************************************************************/
/*             AJAX to delete a template id selected for section              */
/******************************************************************************/
require_once WPEB_PLUGIN_INC . '/services/delete_selected_template.php';

/******************************************************************************/
/*        AJAX to update custom style of specific element in a section        */
/******************************************************************************/
require_once WPEB_PLUGIN_INC . '/services/update_custom_element_style.php';

/******************************************************************************/
/*        AJAX to delete custom style of specific element in a section        */
/******************************************************************************/
require_once WPEB_PLUGIN_INC . '/services/delete_custom_element_style.php';

/******************************************************************************/
/*       ACTION to set global sytles to the templates and compile theme       */
/******************************************************************************/
require_once WPEB_PLUGIN_INC . '/services/set_global_styles.php';

/******************************************************************************/
/*                 ACTION to save contact form configuration                  */
/******************************************************************************/
require_once WPEB_PLUGIN_INC . '/services/save_contact_form_settings.php';

/******************************************************************************/
/*                           ACTION to select theme                           */
/******************************************************************************/
require_once WPEB_PLUGIN_INC . '/services/select_theme.php';

/******************************************************************************/
/*                    AJAX to change order pages_sections                     */
/******************************************************************************/
require_once WPEB_PLUGIN_INC . '/services/change_order_sections.php';

/******************************************************************************/
/*                     AJAX to create new Global content                      */
/******************************************************************************/
require_once WPEB_PLUGIN_INC . '/services/create_new_global_content.php';

/******************************************************************************/
/*                     AJAX to create new Global content                      */
/******************************************************************************/
require_once WPEB_PLUGIN_INC . '/services/get_posts_by.php';

?>
