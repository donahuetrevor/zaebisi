<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	private static $instance;

    protected $data;

	protected $error_array;
	protected $success_array;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		self::$instance =& $this;
		
		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');

		$this->load->initialize();
		
		log_message('debug', "Controller Class Initialized");
	}

	public static function &get_instance()
	{
		return self::$instance;
	}

	public function add_error_msg($error_msg) {
		$this->error_array[] = strip_tags($error_msg, '<a>');
	}

	public function add_success_msg($success_msg) {
		$this->success_array[] = strip_tags($success_msg, '<a>');
	}

	public function __destruct() {
		/**
		 * Setting an error "flashdata" array that will only be available for the next server request,
		 * and is then automatically cleared
		 */
		$this->session->set_flashdata('errors', $this->error_array);
		$this->session->set_flashdata('success_msgs', $this->success_array);
	}


}
// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */