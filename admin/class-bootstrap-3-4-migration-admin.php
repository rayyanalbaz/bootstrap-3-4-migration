<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://bitbucket.org/1101c/
 * @since      1.0.0
 *
 * @package    Bootstrap_3_4_Migration
 * @subpackage Bootstrap_3_4_Migration/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bootstrap_3_4_Migration
 * @subpackage Bootstrap_3_4_Migration/admin
 * @author     Calin Armenean <calin13@yorku.ca>
 */
class Bootstrap_3_4_Migration_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bootstrap_3_4_Migration_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bootstrap_3_4_Migration_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/bootstrap-3-4-migration-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bootstrap_3_4_Migration_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bootstrap_3_4_Migration_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/bootstrap-3-4-migration-admin.js', array('jquery'), $this->version, false);
	}
	/**
	 * Create settings page.
	 *
	 * @since    1.0.0
	 */
	public function display_admin_page()
	{
		add_menu_page(
			'Bootstrap Migration Admin',
			'Bootstrap Migration',
			'manage_options',
			'bootstrap-migration-options',

			array($this, 'include_overview_partial'),
			'',
			9999
		);
	}

	public function include_overview_partial()
	{
		include_once(PLUGIN_PATH . 'admin/partials/bootstrap-3-4-migration-admin-display.php');
	}
	/**
	 * Invoke the upgrade class function.
	 *
	 * @since    1.0.0
	 */
	public static function invoke_upgrade()
	{
		$migration_manager = new bootstrap_migration();
		$migration_manager->upgrade_class();
	}

	function general_admin_notice(){
		// global $pagenow;
		// if ( $pagenow == 'admin.php' && get_transient( 'fx-admin-notice-panel' )) {
		// 	if ( get_option('bootstrap_update' , 'success') == 'fail'){
		// 		echo '<div class="notice notice-error is-dismissible">
		// 		 <p>error.</p>
		// 	 </div>';
		// 	} else {
		// 		echo '<div class="notice notice-success is-dismissible">
		// 		<p>Cool.</p>
		// 	</div>';
		// 	}
		// 	delete_option('bootstrap_update');
		// 	delete_transient( 'fx-admin-notice-panel' );

		// }

		// if( get_transient( 'fx-admin-notice-panel' ) ){
			
		// 	echo '<div class="notice notice-success is-dismissible">
		// 		 <p>cool.</p>
		// 	 </div>';
		// 	/* Delete transient, only display this notice once. */
		// 	delete_transient( 'fx-admin-notice-panel' );
		// }
		global $rayyan;
		$rayyan = false;
	}
	function my_admin_notice(){
		// echo 'hello';
	}
}
