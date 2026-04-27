<?php // phpcs:ignore Class file names should be based on the class name with "class-" prepended.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme Menu Page.
 *
 * @link       https://www.acmeit.org/
 * @since      1.0.0
 *
 * @package    Wp_Block_Theme_Boilerplate
 * @subpackage Wp_Block_Theme_Boilerplate/Advanced_Import_Admin_Template
 */

/**
 * Class used to add theme menu page and content on it.
 *
 * @package    Wp_Block_Theme_Boilerplate
 * @subpackage Wp_Block_Theme_Boilerplate/Advanced_Import_Admin_Template
 * @author     codersantosh <codersantosh@gmail.com>
 */
class Advanced_Import_Admin_Template {

	/**
	 * Current added Menu hook_suffix
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $hook_suffix    Store current added Menu hook_suffix.
	 */
	private $hook_suffix;

	/**
	 * Id of this class.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $id    Store id of this class.
	 */
	private $id = 'advanced-import-template';

	/**
	 * API url.
	 *
	 * @since 1.4.6
	 * @access   protected
	 */
	protected $api_url = 'https://demo.patternswp.com/wp-json/patternswp-demo-setup/v1/acmeit-demos';

	/**
	 * Empty Constructor
	 */
	private function __construct() {}

	/**
	 * Gets an instance of this object.
	 * Prevents duplicate instances which avoid artefacts and improves performance.
	 *
	 * @static
	 * @access public
	 * @since 1.0.0
	 * @return object
	 */
	public static function instance() {
		// Store the instance locally to avoid private static replication.
		static $instance = null;

		// Only run these methods if they haven't been ran previously.
		if ( null === $instance ) {
			$instance = new self();
		}

		// Always return the instance.
		return $instance;
	}

	/**
	 * Initialize the class.
	 *
	 * @access public
	 * @return void
	 */
	public function run() {
		add_action( 'admin_menu', array( $this, 'add_theme_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_resources' ) );
	}

	/**
	 * Add Theme Page Menu page.
	 *
	 * @access public
	 *
	 * @since    1.0.0
	 */
	public function add_theme_menu() {
		$this->hook_suffix[] = add_theme_page( esc_html__( 'Template Import', 'advanced-import' ), esc_html__( 'Template Import', 'advanced-import' ), 'edit_theme_options', $this->id, array( $this, 'info_screen' ) );
	}

	/**
	 * Register the CSS/JavaScript Resources for the admin menu.
	 *
	 * @access public
	 * Use Condition to Load it Only When it is Necessary
	 *
	 * @param string $hook_suffix   The current admin page.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_resources( $hook_suffix ) {
		if ( ! is_array( $this->hook_suffix ) || ! in_array( $hook_suffix, $this->hook_suffix, true ) ) {
			return;
		}

		advanced_import_admin()->wp_enqueue_styles();
		advanced_import_admin()->wp_enqueue_scripts();
	}

	/**
	 * Add menu page.
	 *
	 * @see templates/theme-info.php
	 *
	 * @access public
	 *
	 * @since    1.0.0
	 */
	public function info_screen() {
		do_action( 'advanced_import_before_demo_import_screen' );

		echo '<div class="ai-body">';

		advanced_import_admin()->get_header();

		echo '<div class="ai-content">';
		echo '<div class="ai-content-blocker hidden">';
		echo '<div class="ai-notification-title"><p>' . esc_html__( 'Processing... Please do not refresh this page or do not go to other url!', 'advanced-import' ) . '</p></div>';
		echo '<div id="ai-demo-popup"></div>';
		echo '</div>';
		$this->init_demo_import();
		echo '</div>';
		echo '</div>';/*ai-body*/
		do_action( 'advanced_import_after_demo_import_screen' );
	}

	/**
	 * 1st step of demo import view
	 * Upload Zip file
	 * Demo List
	 */
	public function init_demo_import() {

		$author_template_lists = apply_filters( 'advanced_import_template_lists', array() );
		$args                  = apply_filters( 'advanced_import_template_api_args', array() );
		$url                   = add_query_arg( $args, $this->api_url );

		$acmeit_template_lists = advanced_import_get_api_data( $url );

		advanced_import_admin()->demo_lists = array_merge( $author_template_lists, $acmeit_template_lists );
		$demo_lists                         = advanced_import_admin()->demo_lists;

		$total_demo = is_array( $demo_lists ) ? count( $demo_lists ) : 0;
		if ( $total_demo >= 1 ) {
			advanced_import_admin()->demo_list( $demo_lists, $total_demo, false );
		}
	}
}

/**
 * Return instance of Advanced_Import_Admin_Template class
 *
 * @since 1.0.0
 *
 * @return Advanced_Import_Admin_Template
 */
function advanced_import_admin_template() { //phpcs:ignore
	return Advanced_Import_Admin_Template::instance();
}
advanced_import_admin_template()->run();
