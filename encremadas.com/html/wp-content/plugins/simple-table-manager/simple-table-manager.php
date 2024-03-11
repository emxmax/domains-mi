<?php
/*
Plugin Name: Simple Table Manager
Description: Enables editing table records and exporting them to CSV files through minimal database interface from your wp-admin page menu.
Version:     1.3
Author:      Ryo Inoue with contributions by @lorro
Author URI:  https://profiles.wordpress.org/ryo-inoue/
License:     GPL v3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: simple-table-manager
Domain Path: /languages/
*/

define( 'FILE_CSS', plugin_dir_url( __FILE__ ) . "/css/admin.css" );
define( 'FILE_VIEW_LIST', dirname( __FILE__ ) . "/templates/list.tpl" );
define( 'FILE_VIEW_SETTINGS', dirname( __FILE__ ) . "/templates/settings.tpl" );
define( 'FILE_VIEW_EDIT', dirname( __FILE__ ) . "/templates/edit.tpl" );
define( 'FILE_VIEW_ADD', dirname( __FILE__ ) . "/templates/add.tpl" );
define( 'DELMITER', ',' );
define( 'NEW_LINE', "\r\n" );
define( 'NEW_ID_HINT', " - Edit new ID" );

// settings
// add_option() will not change the option if it exists
add_option( 'stm_table_name', '' );
add_option( 'stm_rows_per_page', 20 );
add_option( 'stm_csv_file_name', 'export.csv' );
add_option( 'stm_csv_encoding', 'UTF-8' );
add_option( 'stm_base_slug', 'simple_table_manager' );

// translations
add_action( 'plugins_loaded', 'stm_load_textdomain' );
function stm_load_textdomain() {
  // load_plugin_textdomain( $domain, $abs_rel_path__DEPRECATED, $plugin_rel_path );
  load_plugin_textdomain( 'simple-table-manager', false,  basename( dirname( __FILE__ ) ). '/languages' );
}

// register style
add_action( 'wp_loaded', 'stm_register_style' );
function stm_register_style() {
  // wp_register_script( $handle, $src, $deps = array(), $ver, $in_footer );
  // $src = full url or path relative to wordpress root
  wp_register_style( 'stm_admin_css', FILE_CSS, array(), '1.3' );
}

// enqueue styles
add_action( 'admin_enqueue_scripts', 'stm_enqueue_admin_style' );
function stm_enqueue_admin_style() {
  wp_enqueue_style( 'stm_admin_css' );
}

require_once( 'includes/controller.php' );
require_once( 'includes/functions.php' );
require_once( 'includes/model.php' );

$control = new Controller();
