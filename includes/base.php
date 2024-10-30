<?php
defined( 'ABSPATH' ) || die();

/**
 * Base class
 */
if( !class_exists('IHEM_Base') ){
	class IHEM_Base {

		/**
		 * Instance
		 */
		private static $_instance = null;

		public static function instance() {

			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;

		}

		/**
		 * Constructor
		 */
		public function __construct() {

			add_action( 'init', [ $this, 'i18n' ] );
			add_action( 'plugins_loaded', [ $this, 'init' ] );

		}

		/**
		 * Load Textdomain
		 */
		public function i18n() {

			load_plugin_textdomain( 'ihem', false, IHEM_PL_ROOT_DIR. '/languages' );

		}

		/**
		 * Initialize this plugin
		 *
		 * Load this plugin only after Elementor (and other plugins) are loaded.
		 * Checks for basic plugin requirements, if one check fail don't continue,
		 * if all check have passed load the files required to run this plugin.
		 *
		 * Fired by `plugins_loaded` action hook.
		 */
		public function init() {
			// Check if Elementor installed and activated
			if ( ! did_action( 'elementor/loaded' ) ) {
				add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
				return;
			}

			// Register widget scripts
			add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

			// Register widgets
			add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have Elementor installed or activated.
		 */
		public function admin_notice_missing_main_plugin() {

			if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

			$message = sprintf(
				/* translators: 1: Plugin name 2: Elementor */
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'ihem' ),
				'<strong>' . esc_html__( 'Image Hover Effects For Elementor', 'ihem' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'ihem' ) . '</strong>'
			);

			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

		}

		/**
		 * Widget scripts
		 */
		public function widget_scripts() {

			wp_register_style( 'ihem-imagehover', IHEM_PL_ROOT_URL. '/assets/css/imagehover.css' );
			wp_register_style( 'ihem-ihover', IHEM_PL_ROOT_URL. '/assets/css/ihover.css' );

		}

		/**
		 * Register Widgets
		 */
		public function register_widgets() {

			// Its is now safe to include Widgets files
			require_once( __DIR__ . '/ihem-elementor-widget.php' );
			
		}
	}

	IHEM_Base::instance();
}