<?php

/**
 * Register all actions and filters for the plugin
 *
 * @link       michalkowalik.pl
 * @since      1.0.0
 *
 * @package    Meeting_Calendar
 * @subpackage Meeting_Calendar/includes
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Meeting_Calendar
 * @subpackage Meeting_Calendar/includes
 * @author     Michał Kowalik <kontakt@michalkowalik.pl>
 */
class Meeting_Calendar_Database {

	protected $datatable_name;

	public function __construct($datatable_name) {
		$this->datatable_name = $datatable_name;

	}
	
	public function get_all_rows(){
		global $wpdb;
		$posts = $wpdb->get_results("SELECT * FROM $wpdb->prefix.'_'.$wpdb->datatable_name WHERE post_status = 'publish'");

		return $posts;
	}

}
