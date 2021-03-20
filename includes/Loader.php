<?php
/**
 * Loader.
 *
 * @package    Integration for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\IFBT;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Loader {

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

				add_action( 'after_setup_theme', __CLASS__ . '::after_setup_theme', 99 );

	} // /init

	/**
	 * After setup theme.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function after_setup_theme() {

		// Requirements check

			if ( ! class_exists( 'FLThemeBuilder' ) ) {
				return;
			}

			// Should we load this plugin functionality?
			$can_load = true;

				// Is the theme by WebMan Design?
				if ( false === strpos( wp_get_theme( IFBT_THEME_SLUG )->get( 'AuthorURI' ), 'webmandesign' ) ) {
					add_action( 'admin_notices', function() {
						printf(
							'<div class="error"><p>%s</p></div>',
							esc_html__( 'Sorry, the Integration for Beaver Themer plugin will not work with your theme. Please check WordPress themes by WebManDesign.eu.', 'integration-for-beaver-themer' )
						);
					} );
					$can_load = false;
				}

			if ( ! $can_load ) {
				return;
			}


		// Processing

			Content::init();
			Footer::init();
			Header::init();
			Parts::init();

			// Filters

				add_filter( Hook::get_name( 'assets/preloading_styles_enabled' ), '__return_false', 99 );

	} // /after_setup_theme

}
