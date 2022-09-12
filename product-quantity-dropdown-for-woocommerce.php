<?php
/**
* Plugin Name: Product Quantity Dropdown For Woocommerce
* Description: This plugin allows Product Quantity dropdown add in Shop page and Product page.
* Version: 1.0
* Copyright: 2022
* Text Domain: product-quantity-dropdown-for-woocommerce
* Domain Path: /languages 
*/

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit();
}

define('PQDFW_PLUGIN_FILE', __FILE__ );

define('PQDFW_PLUGIN_DIR',plugins_url('', PQDFW_PLUGIN_FILE));

// include files
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
include_once('main/backend/pqdfw_comman.php');
include_once('main/backend/pqdfw_admin.php');
include_once('main/frontend/pqdfw-frontend.php');
include_once('main/resources/pqdfw-installation-require.php');
include_once('main/resources/pqdfw-language.php');
include_once('main/resources/pqdfw-load-js-css.php');
