<?php
namespace lsx_starter_plugin\classes;
/**
 * LSX Starter Plugin Admin Class.
 *
 * @package lsx-starter-plugin
 */
class Setup {

	/**
	 * Holds class instance
	 *
	 * @since 1.0.0
	 *
	 * @var      object \lsx_starter_plugin\classes\Setup()
	 */
	protected static $instance = null;

	/**
	 * @var object \lsx_health_plan\classes\Post_Type();
	 */
	public $post_types;

	/**
	 * Contructor
	 */
	public function __construct() {
		require_once( LSX_STARTER_PLUGIN_PATH . 'classes/class-post-type.php' );
		$this->post_types = Post_Type::get_instance();
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since 1.0.0
	 *
	 * @return    object \lsx_starter_plugin\classes\Setup()    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;

	}
}
