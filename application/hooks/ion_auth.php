<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ion_Auth_Hook {

	var $CI;

	function __construct()
	{
		$this->CI =& get_instance();
//		$this->CI->load->library('ion_auth');
		$this->CI->load->library('auth_dummy');
	}

	public function check_logged_in()
	{

		if (!isset($this->CI->session)) {
			return;
		}

		$auth_dummy = new Auth_dummy();

//		$auth_dummy->redirect_if_needed();

		$auth_dummy->load($this->CI->session->all_userdata());
		$this->CI->load->auth = $auth_dummy;
		$this->CI->auth = $auth_dummy;
	}

}