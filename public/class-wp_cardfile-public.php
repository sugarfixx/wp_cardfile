<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       07.no
 * @since      1.0.0
 *
 * @package    Wp_cardfile
 * @subpackage Wp_cardfile/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_cardfile
 * @subpackage Wp_cardfile/public
 * @author     Ingar Torsrud <ingar.torsrud@07.no>
 */
class Wp_cardfile_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_cardfile_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_cardfile_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$file = get_template_directory().'/'.$this->plugin_name.'/css/wp-cardfile.css';
		if (!file_exists($file)) {
		    $file = plugin_dir_url( __FILE__ ) . 'css/wp_cardfile-public.css';
        }
		wp_enqueue_style( $this->plugin_name, $file , array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_cardfile_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_cardfile_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


        $bootstrap = plugin_dir_url( __FILE__ ) . 'js/bootstrap.js';
        wp_register_script('bootstrap', $bootstrap, null, $this->version, true );
        wp_enqueue_script('bootstrap');

        $jquery = plugin_dir_url( __FILE__ ) . 'js/jquery.js';
        wp_register_script('jquery', $jquery, null, $this->version, true );
        wp_enqueue_script('jquery');

        $jqueryValidate = plugin_dir_url( __FILE__ ) . 'js/jquery-validate.js';
        wp_register_script('jquery-validate', $jqueryValidate, null, $this->version, true );
        wp_enqueue_script('jquery-validate');

        $custom_ajax = get_template_directory().'/'.$this->plugin_name.'/js/wp-cardfile.js';
        if (!file_exists($custom_ajax)) {
            $custom_ajax = plugin_dir_url( __FILE__ ) . 'js/wp_cardfile-public.js';
        }


        wp_register_script('custom_ajax', $custom_ajax, null, $this->version, true );
        wp_localize_script('custom_ajax', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php')));
        wp_enqueue_script('custom_ajax');



		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp_cardfile-public.js', array( 'jquery' ), $this->version, false );

	}

    public function cardfile_register_shortcodes(){

        add_shortcode("cardfile", array($this,'display_cardfile'));
    }

    public function display_cardfile($atts) {

        shortcode_atts( array('view' => 'register'), $atts );

        $file = get_template_directory().'/'.$this->plugin_name.'/wp_cardfile-public-display.php';
        if (!file_exists($file)) {
            $file = 'partials/wp_cardfile-public-display.php';
        }

        include_once( $file );
    }

    /**
     * @ $_POST[first_name]
     * @ $_POST[last_name]
     * $_POST[born]
     * $_POST[phone_number]
     * $_POST[address_line_1]
     * $_POST[address_line_2]
     * $_POST[postal_code]
     * $_POST[city]
     * $_POST[email]
     * $_POST[unit]
     * $_POST[branch]
     */
    public function cardfile_post_public() {
        $errors = array();      // array to hold validation errors
        $data = array();      // array to pass back data
        if (empty($_POST['first_name']))
            $errors['first_name'] = 'Fornavn kreves';
        if (empty($_POST['last_name']))
            $errors['last_name'] = 'Etternavn kreves';
        if (empty($_POST['email']))
            $errors['email'] = 'Epost adresse kreves';
        $user = $this->getOrCreateUser($_POST['email'], $_POST['first_name'], $_POST['last_name']);

        if ($_POST['type'] != 'kid') {
            // create parent entry
            $parentVars = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'phone' => $_POST['phone'],
                'address_line_1' => $_POST['address_line_1'],
                'address_line_2' => $_POST['address_line_2'],
                'postal_code' => $_POST['postal_code'],
                'city' => $_POST['city'],
                'email' => $_POST['email'],
                'born' => $_POST['born']
            ];
            $this->insertToDb($user, 'add_parent', $parentVars);
            // add child entry
            $childVars = [
                'first_name' => $_POST['child_first_name'],
                'last_name' => $_POST['child_last_name'],
                'phone_number' => $_POST['child_phone'],
                'email' => $_POST['child_email'],
                'born' => $_POST['child_born'],
                'unit' =>$_POST['unit'],
                'branch' => $_POST['branch']
            ];
            $this->insertToDb($user, 'add_child', $childVars);
        } else {
            // create user without children
            $postVars = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'phone' => $_POST['phone'],
                'address_line_1' => $_POST['address_line_1'],
                'address_line_2' => $_POST['address_line_2'],
                'postal_code' => $_POST['postal_code'],
                'city' => $_POST['city'],
                'email' => $_POST['email'],
                'born' => $_POST['born'],
                'unit' =>$_POST['unit'],
                'branch' => $_POST['branch']
            ];
            $this->insertToDb($user, 'add_youth', $postVars);
        }

        if ( ! empty($errors)) {
            $data['success'] = false;
            $data['errors']  = $errors;
        } else {
            $data['success'] = true;
            $data['message'] = 'Success!';
        }
        echo json_encode($data);
        wp_die();

    }

    public function insertToDb($wp_uid, $type, $postVars) {
        $wp_user_id = ($type === 'add_child') ? null : $wp_uid;
        $parent_id = ($type === 'add_child') ? $wp_uid : null;
        global $wpdb;

        $table_name = $wpdb->prefix . 'cardfile_users';
        $wpdb->insert($table_name, [
            'wp_user_id' => $wp_user_id,
            'parent_id' => $parent_id,
            'first_name' => $postVars['first_name'],
            'last_name' => $postVars['last_name'],
            'born' => $postVars['born'],
            'phone_number' => $postVars['phone_number'],
            'address_line_1' => $postVars['address_line_1'],
            'address_line_2' => $postVars['address_line_2'],
            'postal_code' => $postVars['postal_code'],
            'city' => $postVars['city'],
            'unit' => $postVars['unit'],
            'branch' => $postVars['branch'],
            'time' => current_time( 'mysql' ),
        ]);
    }

    public function updateInDb($postVars) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'cardfile_users';

        $wpdb->update($table_name, [
            'parent_id' => $postVars['parent_id'],
            'first_name' => $postVars['first_name'],
            'last_name' => $postVars['last_name'],
            'born' => $postVars['born'],
            'phone_number' => $postVars['phone_number'],
            'address_line_1' => $postVars['address_line_1'],
            'address_line_2' => $postVars['address_line_2'],
            'postal_code' => $postVars['postal_code'],
            'city' => $postVars['city'],
            'unit' => $postVars['unit'],
            'branch' => $postVars['branch'],
            'time' => current_time( 'mysql' ),
        ],[
            'id' => $postVars['id']
        ]);
    }

    public function getOrCreateUser($email, $firstName, $lastName) {
        $user = get_user_by('email', $email);
        if ($user) {
            return $user->ID;
        }
        $user_name = $firstName .'_'. $lastName;
        $random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
        $user_id = wp_create_user( $user_name, $random_password, $email );
        return $user_id;
    }

}
