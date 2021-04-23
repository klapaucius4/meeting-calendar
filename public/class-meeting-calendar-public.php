<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       michalkowalik.pl
 * @since      1.0.0
 *
 * @package    Meeting_Calendar
 * @subpackage Meeting_Calendar/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Meeting_Calendar
 * @subpackage Meeting_Calendar/public
 * @author     Michał Kowalik <kontakt@michalkowalik.pl>
 */
class Meeting_Calendar_Public {

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
		 * defined in Meeting_Calendar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Meeting_Calendar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/meeting-calendar-public.css', array(), $this->version, 'all' );

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
		 * defined in Meeting_Calendar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Meeting_Calendar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/meeting-calendar-public.js', array( 'jquery' ), $this->version, false );

	}


	public function register_shortcodes(){
		add_shortcode('mc_table', array($this, 'meeting_table_shortcode'));
		add_shortcode('mc_form', array($this, 'meeting_form_shortcode'));
	}


	public function meeting_table_shortcode($atts, $content = null){
		$db = new Meeting_Calendar_Database('imie_nazwisko');
		$meetings = $db->get_all_rows();
		?>
		<table class="table">
			<thead class="thead-dark">
				<tr>
				<th scope="col"><?= __('ID', 'mc') ?></th>
				<th scope="col"><?= __('Nazwa spotkania', 'mc') ?></th>
				<th scope="col"><?= __('Osoba', 'mc') ?></th>
				<th scope="col"><?= __('Data', 'mc') ?></th>
				</tr>
			</thead>
			<tbody>
			<?php if(!empty($meetings)): ?>
				<?php foreach($meetings as $m): ?>
				<tr>
					<th scope="row"><?= $m['meeting_id'] ?></th>
					<td><?= $m['meeting_name'] ?></td>
					<td><?= $m['person'] ?></td>
					<td><?= $m['date'] ?></td>
				</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="4"><?= __('Tabela mysql jest pusta', 'mc') ?></td>
				</tr>
			<?php endif; ?>

			</tbody>
		</table>

		<?php
	}

}
