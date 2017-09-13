<?php
if ( ! defined( 'ABSPATH' ) ) exit;

 /*
  *  Theme constants.
  */

if ( ! defined( 'FLORIS_THEME_NAME' ) ) define( 'FLORIS_THEME_NAME', 'floris' );

define('FLORIS_THEME_DIR', trailingslashit( get_template_directory() ));
define('FLORIS_THEME_DIRURI', esc_url( trailingslashit( get_template_directory_uri() ) ));

define('FLORIS_URI', esc_url( trailingslashit( get_template_directory_uri() ) ));
define('FLORIS_PLUGINS', 'inc/plugins/');