<?php
/**
 * Parts.
 *
 * @package    Integration for Beaver Themer
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\IFBT;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Parts {

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			add_theme_support( 'fl-theme-builder-parts' );

			// Filters

				add_filter( 'fl_theme_builder_part_hooks', __CLASS__ . '::part_hooks' );

	} // /init

	/**
	 * Register template part hooks.
	 *
	 * @since  1.0.0
	 *
	 * @return  array
	 */
	public static function part_hooks(): array {

		// Output

			return array(

				array(
					'label' => esc_html__( 'Page', 'integration-for-beaver-themer' ),
					'hooks' => array(
						'tha_body_top'    => 'body_top',
						'tha_body_bottom' => 'body_bottom',
					),
				),

				array(
					'label' => esc_html__( 'Header', 'integration-for-beaver-themer' ),
					'hooks' => array(
						'tha_header_before' => 'header_before',
						'tha_header_top'    => 'header_top',
						'tha_header_bottom' => 'header_bottom',
						'tha_header_after'  => 'header_after',
					),
				),

				array(
					'label' => esc_html__( 'Content Area', 'integration-for-beaver-themer' ),
					'hooks' => array(
						'tha_content_before' => 'content_before',
						'tha_content_top'    => 'content_top',
						'tha_content_bottom' => 'content_bottom',
						'tha_content_after'  => 'content_after',
					),
				),

				array(
					'label' => esc_html__( 'Post Entry', 'integration-for-beaver-themer' ),
					'hooks' => array(
						'tha_entry_before'         => 'entry_before',
						'tha_entry_top'            => 'entry_top',
						'tha_entry_content_before' => 'entry_content_before',
						'tha_entry_content_after'  => 'entry_content_after',
						'tha_entry_bottom'         => 'entry_bottom',
						'tha_entry_after'          => 'entry_after',
					),
				),

				array(
					'label' => esc_html__( 'Comments', 'integration-for-beaver-themer' ),
					'hooks' => array(
						'tha_comments_before' => 'comments_before',
						'tha_comments_after'  => 'comments_after',
					),
				),

				array(
					'label' => esc_html__( 'Posts List', 'integration-for-beaver-themer' ),
					'hooks' => array(
						Hook::get_name( 'postslist/before' ) => 'postslist_before',
						Hook::get_name( 'postslist/after' )  => 'postslist_after',
					),
				),

				array(
					'label' => esc_html__( 'Sidebar', 'integration-for-beaver-themer' ),
					'hooks' => array(
						'tha_sidebars_before' => 'sidebars_before',
						'tha_sidebar_top'     => 'sidebar_top',
						'tha_sidebar_bottom'  => 'sidebar_bottom',
						'tha_sidebars_after'  => 'sidebars_after',
					),
				),

				array(
					'label' => esc_html__( 'Footer', 'integration-for-beaver-themer' ),
					'hooks' => array(
						'tha_footer_before' => 'footer_before',
						'tha_footer_top'    => 'footer_top',
						'tha_footer_bottom' => 'footer_bottom',
						'tha_footer_after'  => 'footer_after',
					),
				),

			);

	} // /part_hooks

}
