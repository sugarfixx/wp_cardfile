<?php

/**
 * Fired during plugin deactivation
 *
 * @link       07.no
 * @since      1.0.0
 *
 * @package    Wp_cardfile
 * @subpackage Wp_cardfile/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Wp_cardfile
 * @subpackage Wp_cardfile/includes
 * @author     Ingar Torsrud <ingar.torsrud@07.no>
 */
class Wp_cardfile_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
        self::dropDb();
	}

	public static function dropDb() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'cardfile_users';
        $wpdb->query( "DROP TABLE IF EXISTS $table_name" );
    }

}
