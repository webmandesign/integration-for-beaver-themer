<?php
/**
 * Footer.
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

class Footer {

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			add_theme_support( 'fl-theme-builder-footers' );

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
				|| empty( FLThemeBuilderLayoutData::get_current_page_footer_ids() )
			) {
				return;
			}


		// Processing

			remove_all_actions( 'tha_footer_before' );
			remove_all_actions( 'tha_footer_top' );
			remove_all_actions( 'tha_footer_bottom' );
			remove_all_actions( 'tha_footer_after' );

			add_action( 'tha_footer_top', 'FLThemeBuilderLayoutRenderer::render_footer' );

			add_filter( Hook::get_name( 'footer/is_disabled' ), '__return_true', 99 );

	} // /setup_display

}
