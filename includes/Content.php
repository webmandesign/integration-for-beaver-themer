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
	 * Template post type.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string
	 */
	private static $post_type = 'fl-theme-layout';

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

				add_action( 'wp_enqueue_scripts', __CLASS__ . '::styles', 99 );

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

	/**
	 * Add editor styles.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function styles() {

		// Requirements check

			if ( ! wp_style_is( 'fl-theme-builder-layout-frontend-edit', 'enqueued' ) ) {
				return;
			}


		// Processing

			wp_add_inline_style( 'fl-theme-builder-layout-frontend-edit', '

				.fl-theme-builder-header .entry-content-singular > div,
				.fl-theme-builder-footer .entry-content-singular > div {
					height: auto;
					padding: 3em !important;
					font-size: 1.5em;
					font-weight: 300;
					font-style: italic;
					text-align: center;
					background-image: repeating-linear-gradient(
						-45deg,
						rgba( 0,0,0, .05 ),
						rgba( 0,0,0, .05 ) 5px,
						rgba( 255,255,255, .1 ) 5px,
						rgba( 255,255,255, .1 ) 10px
					);
					opacity: 1 !important;
				}

			' );

	} // /styles

}
