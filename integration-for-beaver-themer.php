<?php
/**
 * Plugin Name:  Integration for Beaver Themer
 * Plugin URI:   https://www.webmandesign.eu/portfolio/integration-for-beaver-themer-wordpress-plugin/
 * Description:  Provides support for Beaver Themer in WebMan Design accessibility ready themes.
 * Version:      1.0.0
 * Author:       WebMan Design, Oliver Juhas
 * Author URI:   https://www.webmandesign.eu/
 * License:      GNU General Public License v3
 * License URI:  http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:  integration-for-beaver-themer
 * Domain Path:  /languages
 *
 * GitHub Plugin URI:  https://github.com/webmandesign/integration-for-beaver-themer
 *
 * @copyright  WebMan Design, Oliver Juhas
 * @license    GPL-3.0, https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @link  https://github.com/webmandesign/integration-for-beaver-themer
 * @link  https://www.webmandesign.eu
 *
 * @package  Integration for Beaver Themer
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Constants:

	define( 'IFBT_FILE', __FILE__ );
	define( 'IFBT_PATH', plugin_dir_path( IFBT_FILE ) ); // Trailing slashed.
	define( 'IFBT_THEME_SLUG', get_template() );

	define( 'IFBT_VERSION_WP', '5.2' );
	define( 'IFBT_VERSION_PHP', '7.0' );

// Check that the site meets the minimum WP and PHP requirements.
if (
	version_compare( $GLOBALS['wp_version'], IFBT_VERSION_WP, '<' )
	|| version_compare( PHP_VERSION, IFBT_VERSION_PHP, '<' )
) {
	require_once IFBT_PATH . 'includes/Compatibility.php';
	return;
}

// Load the functionality.
require_once IFBT_PATH . 'includes/Autoload.php';
WebManDesign\IFBT\Loader::init();
