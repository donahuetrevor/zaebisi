<?php

class Home extends CI_Controller {

	public function index()
	{
		$data = array();
		/**
		 * maybe a cool dashboard, a clock, calendar, simple day to day task manager...
		 */
		$this->load->view_page('home/index', $data);
	}

}