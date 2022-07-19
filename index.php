<?php
/**
 * @package           GMDS
 * @author            Aman Khan
 * @license           GPL-2.0-or-later
 * Plugin Name:       Google Maps Data Autosaver
 * Plugin URI:        https://github.com/RayhanKhan8975/google-maps-data-autosaver
 * Description:       Saves ACF data in Google Maps Field.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Aman Khan
 * Author URI:        https://github.com/RayhanKhan8975
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       gmds
 * Domain Path:       /languages
 */

if ( ! function_exists( 'add_action' ) ) {
	esc_html_e( 'Hi there!  I\'m just a plugin, not much I can do when called directly.', 'codeable' );
	exit;
}

// Setup.
DEFINE( 'GMDS_PATH', __FILE__ );
DEFINE( 'MAP_API_KEY', 'AIzaSyBHV1uAlXcl-KNx-CBlyRgLxILVlWq5XBU' );

// includes.
require 'utilities/geocode.php';
require 'includes/gmds-save-post.php';
require 'includes/gmds-set-acf-key.php';

add_action( 'wp_insert_post', 'save_google_data', 10, 3 );
add_filter( 'acf/fields/google_map/api', 'my_acf_google_map_api' );
