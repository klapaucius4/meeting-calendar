<?php

/**
 * Fired during plugin activation
 *
 * @link       michalkowalik.pl
 * @since      1.0.0
 *
 * @package    Meeting_Calendar
 * @subpackage Meeting_Calendar/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Meeting_Calendar
 * @subpackage Meeting_Calendar/includes
 * @author     Michał Kowalik <kontakt@michalkowalik.pl>
 */
class Meeting_Calendar_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		Meeting_Calendar_Activator::create_custom_mysql_tables();
	}



	public static function create_custom_mysql_tables(){
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		//* Create the teams table
		$table_name = $wpdb->prefix . 'imie_nazwisko';
		$sql = "CREATE TABLE $table_name (
		meeting_id INTEGER NOT NULL AUTO_INCREMENT,
		meeting_name VARCHAR(255) NOT NULL,
		person VARCHAR(255) NOT NULL,
		meeting_date VARCHAR(255) NOT NULL,
		PRIMARY KEY (meeting_id)
		) $charset_collate;";
		dbDelta( $sql );
	}

}
