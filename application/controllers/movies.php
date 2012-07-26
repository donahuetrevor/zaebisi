<?php

class Movies extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('movie');
	}

	public function index() {

		$data = array();

		/**
		 * view load
		 */
		$this->load->view_page('movies/index', $data);
	}

	public function list_action($page = 'auto-list') {

		$movie_list = $this->movie->getByAll();

		$data['movie_list'] = $movie_list;

//		print_r();
//		exit();

//		$movieList = R::find('movies', '1 ORDER BY :sortorder', array( ':sortorder'=> 'date'));

//		$this->gettext_language->load_gettext('ro_RO');
//
//		echo _('username');
//		exit();


		/**
		 * view load
		 */
		$this->load->view_page('movies/list', $data);

    }

	public function create() {

		if (!empty($_POST)) {
			$now = date('Y-m-d H:i:s', now());

			$movieObj = R::dispense('movies');
			$movieObj->user_id = $this->auth->user_id;
			$movieObj->datetime_added = $now;
			$movieObj->approved = true;
			$movieObj->visible = true;

			$movieTitleObj = R::dispense('movie_titles');
			$movieTitleObj->user_id = 1;
			$movieTitleObj->title = $_POST['movie-title'];
			$movieTitleObj->datetime_added = $now;
			$movieTitleObj->approved = true;
			$movieTitleObj->visible = true;
			$movieTitleObj->current = true;

			$movieTitleObj->movie = $movieObj;
			$movieTitleId = R::store($movieTitleObj);

			/**
			 * @todo logs
			 */

			/**
			 * @todo
			 * $dkghfdkhg->addErrorMsg('lkdsfjks');
			 * $->redirect('list');
			 */
			echo 'movie with id ' . $movieObj->id . ' created';
		}

		$data = array();

//		$this->data['keywords'] = 'create, movie, form';
//		$this->data['description'] = '';


		/**
		 * view load
		 */
		$this->load->view_page('movies/create', $data);

	}

	public function edit($id) {

		$data = array();

		/**
		 * view load
		 */
		$this->load->view_page('movies/edit', $data);
	}

}