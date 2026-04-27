<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Advanced_Import_Theme_PatternsWP' ) ) {

	/**
	 * Functions related to About Block
	 *
	 * @package Advanced Import
	 * @subpackage Advanced_Import_Theme_PatternsWP
	 * @since 1.4.6
	 */
	class Advanced_Import_Theme_PatternsWP extends Advanced_Import_Theme_Template_Library_Base {


		/**
		 * Theme author
		 * This class is created for patternswp theme
		 * Check for author
		 *
		 * @since 1.4.6
		 * @access   protected
		 */
		protected $theme_author = 'patternswp';

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
Advanced_Import_Theme_PatternsWP::get_instance()->run();
