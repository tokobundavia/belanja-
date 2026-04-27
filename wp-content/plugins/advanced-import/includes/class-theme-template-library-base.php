<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Advanced_Import_Theme_Template_Library_Base' ) ) {

	/**
	 * Base Class For CosmosWP for common functions
	 *
	 * @package Advanced Import
	 * @subpackage  Advanced Import Template Library
	 * @since 1.0.0
	 */
	class Advanced_Import_Theme_Template_Library_Base {

		/**
		 * Theme author
		 * This class is created for acmethemes theme
		 * Check for author
		 *
		 * @since 1.4.6
		 * @access   protected
		 */
		protected $theme_author;


		/**
		 * Theme author
		 * This class is created for acmethemes theme
		 * Check for author
		 *
		 * @since 1.4.6
		 * @access   protected
		 */
		protected $api_url = 'https://demo.patternswp.com/wp-json/patternswp-demo-setup/v1/acmeit-demos';

		/**
		 * Run Block
		 *
		 * @access public
		 * @since 1.0.0
		 * @return void
		 */
		public function run() {
			add_filter( 'advanced_import_demo_lists', array( $this, 'add_template_library' ) );
			add_filter( 'advanced_import_template_api_args', array( $this, 'add_args' ) );
			add_filter( 'advanced_import_theme_api_args', array( $this, 'add_args' ) );
		}

		/**
		 * Load template library
		 *
		 * @since 1.0.5
		 * @package    Acmethemes
		 * @author     Acmethemes <info@acmethemes.com>
		 *
		 * @param array $current_demo_list Current demo list.
		 * @return array
		 */
		public function add_template_library( $current_demo_list ) {
			/* Common check */
			if ( advanced_import_get_current_theme_author() !== $this->theme_author ) {
				return $current_demo_list;
			}

			/* Prepare API arguments */
			$args = array(
				'theme-slug' => esc_attr( advanced_import_get_current_theme_slug() ),
			);
			$args = apply_filters( 'advanced_import_theme_api_args', $args );
			$url  = add_query_arg( $args, $this->api_url );
			/* Fetch cached or fresh API data */
			$templates_list = advanced_import_get_api_data( $url );

			if ( is_array( $templates_list ) ) {
				return array_merge( $current_demo_list, $templates_list );
			}

			return $current_demo_list;
		}

		/**
		 * Load template library
		 *
		 * @since 1.4.6
		 * @package    Acmethemes
		 * @author     Acmethemes <info@acmethemes.com>
		 *
		 * @param array $args Existing args.
		 * @return array
		 */
		public function add_args( $args ) {
			/* Common check */
			if ( advanced_import_get_current_theme_author() !== $this->theme_author ) {
				return $args;
			}

			$current_theme_slug = advanced_import_get_current_theme_slug();
			$license            = trim( get_option( $current_theme_slug . '_license_key' ) );
			if ( $license ) {
				$args['license-info'][ $current_theme_slug ] = array(
					'author'      => $this->theme_author,
					'license'     => $license,
					'url'         => home_url(),
					'environment' => function_exists( 'wp_get_environment_type' ) ? wp_get_environment_type() : 'production',
				);
			}

			return $args;
		}
	}
}
