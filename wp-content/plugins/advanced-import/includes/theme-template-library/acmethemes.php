<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Advanced_Import_Theme_Acmethemes' ) ) {

	/**
	 * Functions related to About Block
	 *
	 * @package Advanced Import
	 * @subpackage Advanced_Import_Theme_Acmethemes
	 * @since 1.0.5
	 */

	class Advanced_Import_Theme_Acmethemes extends Advanced_Import_Theme_Template_Library_Base {

		/**
		 * Theme author
		 * This class is created for acmethemes theme
		 * Check for author
		 *
		 * @since 1.0.5
		 * @access   protected
		 */
		protected $theme_author = 'acmethemes';

		/**
		 * Gets an instance of this object.
		 * Prevents duplicate instances which avoid artefacts and improves performance.
		 *
		 * @static
		 * @access public
		 * @since 1.0.5
		 * @return object
		 */
		public static function get_instance() {

			// Store the instance locally to avoid private static replication.
			static $instance = null;

			// Only run these methods if they haven't been ran previously.
			if ( null === $instance ) {
				$instance = new self();
			}

			// Always return the instance.
			return $instance;
		}
	}
}
Advanced_Import_Theme_Acmethemes::get_instance()->run();
