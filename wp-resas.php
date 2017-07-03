<?php
/**
 * Plugin Name:     RESAS API Client for WordPress
 * Plugin URI:      https://github.com/miya0001/wp-resas
 * Description:     RESAS API Client for WordPress
 * Author:          Takayuki Miyauchi
 * Author URI:      https://firegoby.jp/
 * Text Domain:     wp-resas
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         WP_Resas
 */

require dirname( __FILE__ ) . '/vendor/autoload.php';

$wp_resas_admin = new WP_RESAS\Admin();
$wp_resas_admin->register();
