<?php

/******************************************************************************/
/*                             Queries template ID                            */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/queries/queries-template.php';

/******************************************************************************/
/*                                 Queries theme                              */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/queries/queries-theme.php';

/******************************************************************************/
/*                              Default Shortcodes                            */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/shortcodes/default-shortcodes.php';

/******************************************************************************/
/*                               Custom Metabox                               */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/custom-metabox.php';

/******************************************************************************/
/*                             Custom Oembed HTML                             */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/custom-oembed-html.php';

/******************************************************************************/
/*                             Custom Capabilities                            */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/custom-capabilities.php';

/******************************************************************************/
/*                               Walker main menu                             */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/walkers/walker-main-menu.php';

/******************************************************************************/
/*                              Walker Comments Blog                          */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/walkers/walker-comments.php';

/******************************************************************************/
/*                             Enqueue custom scripts                         */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/enqueue-custom-scripts.php';

/******************************************************************************/
/*                                Icons web svg                               */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/icons-web-svg.php';

/******************************************************************************/
/*                                  Default image                             */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/default-image.php';

/******************************************************************************/
/*                           Widget featured posts                            */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/widgets/widget-ecoded-featured-posts.php';

/******************************************************************************/
/*                             Widget RRSS links                              */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/widgets/widget-ecoded-rrss-links.php';

/******************************************************************************/
/*                             Widget menu links                              */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/widgets/widget-ecoded-menu-links.php';

/******************************************************************************/
/*                        Registration Menus and Sidebars                     */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/register-menu-sidebar.php';

/******************************************************************************/
/*                        Metabox for Widgets in posts                        */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/templates/template-posts.php';

/******************************************************************************/
/*                     Metabox for Widgets in categories                      */
/******************************************************************************/
// require WPEB_PLUGIN_INC . 'theme-functions/templates/template-category.php';

/******************************************************************************/
/*                 Metabox for Widgets in blog page ( Home )                  */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/templates/template-home.php';

/******************************************************************************/
/*                          Personalization WordPress                         */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/personalization-wp.php';

/******************************************************************************/
/*                          Custom Login admin WordPress                      */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/custom-login.php';

/******************************************************************************/
/*                          Custom Filters Contact Form 7                     */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/custom-cf7.php';

/******************************************************************************/
/*                               Custom Filters Yoast                         */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/custom-yoast.php';

/******************************************************************************/
/*                           Dashboard redirections                           */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/dashboard-redirects.php';

/******************************************************************************/
/*                          Custom Filters Duplicate Post                     */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/custom-duplicate-post.php';

/******************************************************************************/
/*                            Custom Icons Gallery                            */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/custom-icons-gallery.php';

/******************************************************************************/
/*                     Function to get dat of specific template               */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/get-data.php';

/******************************************************************************/
/*                       Function to print HTML of RRSS                       */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/get-rrss.php';

/******************************************************************************/
/*                        Function to maintenance mode                        */
/******************************************************************************/
require WPEB_PLUGIN_INC . 'theme-functions/maintenance_mode.php';

?>
