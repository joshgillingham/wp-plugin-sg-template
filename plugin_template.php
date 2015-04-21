<?php
/**
* Plugin Name:  Plugin Template
* Plugin URI:   
* Description:  Awesome description
* Version:      2.0
* Author:       
* Author URI:   
* License: GPL Copyright YYYY
*/
defined('ABSPATH') or die("No script kiddies please!");
/**
 * Plugin Template
 *
 * @package		
 * @version 	
 * @author	
 */
if ( ! class_exists( 'Plugin_Template' ) ) {
	register_activation_hook(__FILE__, array('Plugin_Template', 'activate_it'));
	register_deactivation_hook(__FILE__, array('Plugin_Template', 'deactivate_it'));
	register_uninstall_hook(__FILE__, array('Plugin_Template', 'uninstall_it'));
			
	class Plugin_Template
	{
		public static $plugin_name = "Plugin Template";
		public static $plugin_shortname = "ptemp";//some short name used for option naming
		private static $plugin_dir, $plugin_url, $plugin_file;
		
		protected static $instance = null;
		
		function __construct()
		{
			$this->settings = get_option( $this->plugin_shortname . "settings" );
			$this->plugin_dir = plugin_dir_path(__FILE__);
			$this->plugin_url = plugin_dir_url(__FILE__);	
			$this->plugin_file = plugin_basename(__FILE__);
			if ( is_admin() )
			{
				add_filter( 'admin_init', array($this, "admin_init" ) );
				add_filter( 'admin_menu', array($this, "admin_menu" ) );
			}
			add_filter('non_admin_init', array($this, "init" ), 10 );
		}
		
		public static function get_instance()
		{
			if(self::$instance == null) {
				self:$instance = new self;
			}
			return self::$instance;
		}
		
		/**
		 * User Initialize.
		 *
		 * @return 	void
		 * @since 	0.1
		 */
		public function non_admin_init()
		{
		}
		
		/**
		 * Admin initialize.
		 * Actions to take on admin pages
		 *
		 * @return 	void
		 * @since 	0.1
		 */
		public function admin_init()
		{
		}
		
		/**
		 * Admin menu.
		 * Add link to admin nav menu
		 *
		 * @return 	void
		 * @since 	0.1
		 */
		public function admin_menu()
		{
			// add_options_page('My Plugin Options', 'My Plugin', 'manage_options', 'my-unique-identifier', 'my_plugin_options');
			add_options_page( 'Settings', $this->plugin_name, 'manage_options', $this->plugin_shortname . "options_page_slug", array( $this, "options_page_callback" ) );
			//add plugin url to plugin page
			add_filter( 'plugin_action_links_'.plugin_basename( $plugin_dir . $plugin_file), __CLASS__, 'admin_plugin_settings_link' ) );
		}
		//add the settings link to the plugin on the plugin list page
		public static function admin_plugin_settings_link( $links ) 
		{ 
		}
		
		/**
		 * Register settings
		 * Register settings sections and field settings for admin options page
		 *
		 * @return 	void
		 * @since 	0.1
		 */
		private function register_settings()
		{
		}
		
		/**
		 * Can edit options
		 * Callback function for admin edit check
		 *
		 * @return 	void
		 * @since 	0.1
		 */
		private function edit_options()
		{  
		}
		
		/**
		 * Admin options callback
		 * Prepare plugin options page
		 *
		 * @return 	void
		 * @since 	0.1
		 */
		private function options_page_callback()
		{
		}
		
		/**
		 * Admin plugins settings field
		 * 
		 * @return 	void
		 * @since 	0.1
		 */
		private function settings_field_plugins()
		{
		}
		
		//
		// Hooks
		// Use these in a functions.php by
		// 		add_action('hook1', 'some_awesome_function', 1)
		public function hook1()
		{
			do_action('hook1');	
		}
		
		//
		// Activate, deactivate, uninstall
		//
		private function activate_it() 
		{	
		}
		
		private function deactivate_it() 
		{	
		}
		
		private function uninstall_it() 
		{	
		}
	}
}
//instantiate the class
$Plugin_Template::get_instance;