<?php
/**
 * WordPress and PHP compatibility.
 *
 * @package    Integration for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class IFBT_Compatibility {

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Actions

				add_action( 'admin_notices', __CLASS__ . '::the_notice' );

	} // /init

	/**
	 * Adds a message.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function the_notice() {

		// Output

			printf(
				'<div class="error"><p>%s</p></div>',
				esc_html( self::get_message() )
			);

	} // /the_notice

	/**
	 * Gets the message to warn the user about the plugin requirements not being met.
	 *
	 * @since  1.0.0
	 *
	 * @return  string  Message to show to the user.
	 */
	public static function get_message() {

		// Variables

			$output = array();


		// Processing

			if ( version_compare( $GLOBALS['wp_version'], IFBT_VERSION_WP, '<' ) ) {
				$output[] = sprintf(
					/* translators: 1: required WP version number, 2: available WP version number */
					__( 'The Integration for Beaver Themer plugin requires at least WordPress version %1$s. You are running version %2$s.', 'integration-for-beaver-themer' ),
					IFBT_VERSION_WP,
					$GLOBALS['wp_version']
				);
			}

			if ( version_compare( PHP_VERSION, IFBT_VERSION_PHP, '<' ) ) {
				$output[] = sprintf(
					/* translators: 1: required PHP version number, 2: available PHP version number */
					__( 'The Integration for Beaver Themer plugin requires at least PHP version %1$s. You are running version %2$s.', 'integration-for-beaver-themer' ),
					IFBT_VERSION_PHP,
					PHP_VERSION
				);
			}

			if ( ! empty( $output ) ) {
				$output[] = __( 'Please upgrade and try again.', 'integration-for-beaver-themer' );
			}


		// Output

			return implode( PHP_EOL, $output );

	} // /get_message

} // /IFBT_Compatibility

IFBT_Compatibility::init();
