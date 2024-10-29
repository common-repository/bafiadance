<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bafiadance
 * @subpackage Bafiadance/admin
 * @author     ITkamer <sales@itkamer.com>
 */
class Bafiadance_Admin {

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
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $sys_name    The system name of this plugin.
	 */	
	private $sys_name;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->sys_name = 'Bafiadance';
		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bafiadance_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bafiadance_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bafiadance-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bafiadance_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bafiadance_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bafiadance-admin.js', array( 'jquery' ), $this->version, false );
    }

    // Our customisations
    /**
     *
     * admin/class-wp-cbf-admin.php - Don't add this
     *
     **/

    /**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     *
     * @since    1.0.0
     */

    public function add_plugin_admin_menu() {

        /*
         * Add a settings page for this plugin to the Settings menu.
         *
         * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
         *
         * Administration Menus: http://codex.wordpress.org/Administration_Menus
         *
         */
        add_options_page( 'FOP Pro Interactive', 'FOP Pro', 'manage_options', $this->sys_name, array($this, 'display_plugin_setup_page')
        );
    }

    /**
     * Add settings action link to the plugins page.
     *
     * @since    1.0.0
     */

    public function add_action_links( $links ) {
        /*
        *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
        */
        $settings_link = array(
            '<a href="' . admin_url( 'options-general.php?page=' . $this->sys_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
        );
        return array_merge(  $settings_link, $links );
    }

    /**
     * Render the settings page for this plugin.
     *
     * @since    1.0.0
     */

    public function display_plugin_setup_page() {
        include_once( 'partials/bafiadance-admin-display.php' );
    }

    /**
     * admin/class-wp-cbf-admin.php
     * We save our plugin settings here
     **/
    public function options_update() {
        register_setting($this->sys_name, $this->sys_name, array($this, 'validate'));
    }

    /**
     *
     * admin/class-wp-cbf-admin.php
     *
     **/
    public function validate($input) {
        // Array of options to save(inputs)
        $valid = array();

        // Validations or custom actions cab be made here
        // Check if the provided script id exist at http://bafiadance.club


        // Be sure to fill a correct script Id
        if(isset($input['script_id']) && !empty($input['script_id'])){
            $valid['script_id'] = preg_replace('/\s+/', '', $input['script_id']);
        }

        return $valid;
    }

}
