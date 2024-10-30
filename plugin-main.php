<?php 
/*
Plugin Name: Image Hover Effects For Elementor
Plugin URI: http://demo.azplugins.com/image-hover-effects/
Description: This plugin will allow you to easily implement scaleable image hover effects. You can choose hover effects from 40+ different effects and also there is a lot of customizing options to meet your need.
Author: AZ Plugins
Author URI: https://azplugins.com
Version: 1.0.5
Text Domain: ihem
Domain Path: /languages
*/

defined( 'ABSPATH' ) || die();

/*Some Set-up*/
define('IHEM_PL_ROOT_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) );
define('IHEM_PL_ROOT_DIR', dirname( __FILE__ ) );
define('IHEM_PL_VERSION', '1.0.5');

/* Include all files */
require_once( IHEM_PL_ROOT_DIR. '/includes/base.php');