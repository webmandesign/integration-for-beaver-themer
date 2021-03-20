<?php
/**
 * Header.
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

class Header {

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			add_theme_support( 'fl-theme-builder-headers' );

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

			if (
				is_admin()
				|| empty( FLThemeBuilderLayoutData::get_current_page_header_ids() )
			) {
				return;
			}


		// Processing

			remove_all_actions( 'tha_header_before' );
			remove_all_actions( 'tha_header_top' );
			remove_all_actions( 'tha_header_bottom' );
			remove_all_actions( 'tha_header_after' );

			add_action( 'tha_header_top', 'FLThemeBuilderLayoutRenderer::render_header' );

			add_filter( Hook::get_name( 'header/is_disabled' ), '__return_true', 99 );

	} // /setup_display

}
