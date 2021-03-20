<?php
/**
 * Content.
 *
 * @package    Integration for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\IFBT;

use FLThemeBuilderLayoutData;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Content {

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

				add_action( 'wp', __CLASS__ . '::setup_display', 99 );

	} // /init

	/**
	 * Setup custom template display.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function setup_display() {

		// Requirements check

			if ( is_admin() ) {
				return;
			}


		// Variables

			$layouts = array_keys( (array) FLThemeBuilderLayoutData::get_current_page_layouts() );


		// Processing

			if (
				! empty( $layouts )
				&& ! empty( array_intersect( $layouts, array( 'singular', '404', 'archive' ) ) )
			) {
				remove_all_actions( 'tha_content_before' );
				remove_all_actions( 'tha_content_top' );
				remove_all_actions( 'tha_content_bottom' );
				remove_all_actions( 'tha_content_after' );

				add_filter( Hook::get_name( 'sidebar/is_disabled' ), '__return_true', 99 );
			}

	} // /setup_display

}
