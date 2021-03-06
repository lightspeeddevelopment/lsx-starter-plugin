<?php
namespace lsx_starter_plugin\classes;

/**
 * This class loads the other classes and function files
 *
 * @package lsx-starter-plugin
 */
class Core {

	/**
	 * Holds class instance
	 *
	 * @since 1.0.0
	 *
	 * @var      object \lsx_starter_plugin\classes\Core()
	 */
	protected static $instance = null;

	/**
	 * @var object \lsx_starter_plugin\classes\Setup();
	 */
	public $setup;

	/**
	 * @var object \lsx_starter_plugin\classes\Admin();
	 */
	public $admin;

	/**
	 * @var object \lsx_starter_plugin\classes\Frontend();
	 */
	public $frontend;

	/**
	 * @var object \lsx_starter_plugin\classes\Integrations();
	 */
	public $integrations;

	/**
	 * The post types available
	 *
	 * @var array
	 */
	public $post_types = array();

	/**
	 * Contructor
	 */
	public function __construct() {
		$this->load_classes();
		$this->load_includes();
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since 1.0.0
	 *
	 * @return    object \lsx_starter_plugin\classes\Core()    A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Loads the variable classes and the static classes.
	 */
	private function load_classes() {
		// Load plugin settings related functionality.
		require_once LSX_STARTER_PLUGIN_PATH . '/classes/class-setup.php';
		$this->setup = Setup::get_instance();

		// Load plugin admin related functionality.
		require_once LSX_STARTER_PLUGIN_PATH . 'classes/class-admin.php';
		$this->admin = Admin::get_instance();

		// Load front-end related functionality.
		require_once LSX_STARTER_PLUGIN_PATH . '/classes/class-frontend.php';
		$this->frontend = Frontend::get_instance();

		// Load 3rd party integrations here.
		require_once LSX_STARTER_PLUGIN_PATH . '/classes/class-integrations.php';
		$this->integrations = Integrations::get_instance();
	}

	/**
	 * Loads the plugin functions.
	 */
	private function load_includes() {
		require_once LSX_STARTER_PLUGIN_PATH . '/includes/functions.php';
	}

	/**
	 * Returns the post types currently active
	 *
	 * @return void
	 */
	public function get_post_types() {
		return apply_filters( 'lsx_starter_plugin_post_types', $this->post_types );
	}
}
