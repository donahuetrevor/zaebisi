<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Auth_dummy
{
	private $CI;

	function __construct()
	{
		$this->CI =& get_instance();

		if (!@$this->CI->ion_auth) {
			/**
			 * @todo corresponding error message
			 */
			exit('no ion_auth in Auth_dummy class');
		}
	}

	public function load($data) {
		foreach($data as $key => $val) {
			$this->$key = $val;
		}
	}

	public function redirect_if_needed() {

//		var_dump(preg_match('/auth\/*/', uri_string()));
//		exit();

		if ( !((boolean) preg_match('/auth\/*/', uri_string())) && !$this->CI->ion_auth->logged_in()) {
			/**
			 * @todo error message => please log in
			 */
			redirect('auth/login', 'refresh');
		}
	}

	public function logged_in() {
		return $this->CI->ion_auth->logged_in();
	}

	public function pack() {
		$result = array();
//		$result
	}

}