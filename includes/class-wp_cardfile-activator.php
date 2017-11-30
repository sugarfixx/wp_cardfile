<?php

/**
 * Fired during plugin activation
 *
 * @link       07.no
 * @since      1.0.0
 *
 * @package    Wp_cardfile
 * @subpackage Wp_cardfile/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wp_cardfile
 * @subpackage Wp_cardfile/includes
 * @author     Ingar Torsrud <ingar.torsrud@07.no>
 */
class Wp_cardfile_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        self::createDB();
        self::createUnitsDB();
	}

	public static function createDB() {
	    global $wpdb;
	    $charset_collate = $wpdb->get_charset_collate();
	    $table_name = $wpdb->prefix . 'cardfile_users';
	    $sql = "CREATE TABLE $table_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                blog_id smallint(5) NOT NULL,
                wp_user_id mediumint(9),
                parent_id mediumint(9),
                first_name varchar(64),
                last_name varchar(64),
                born varchar(16),
                phone_number varchar(16),
                address_line_1 varchar(128),
                address_line_2 varchar(128),
                postal_code mediumint(9),
                city varchar(64),
                email varchar(64),
                unit varchar(64),
                branch varchar(64),
                time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                UNIQUE KEY id (id)
	    ) $charset_collate";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    public static function createUnitsDB() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'cardfile_units';
        $sql = "CREATE TABLE $table_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                cardfile_user_id mediumint(9) NOT NULL,
                name varchar(64),
                branch varchar(64),
                time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                UNIQUE KEY id (id)
	    ) $charset_collate";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }






}
