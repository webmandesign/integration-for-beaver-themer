<?php
/**
 * Action and filter hooks.
 *
 * @package    Integration for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\IFBT;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Hook {

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $hook
	 *
	 * @return  string
	 */
	public static function get_name( string $hook ) {

		// Output

			return apply_filters( 'IFBT/Hook/get_name', IFBT_THEME_SLUG . '/' . $hook, $hook );

	} // /get_name

}
