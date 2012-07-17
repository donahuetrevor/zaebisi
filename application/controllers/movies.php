<?php

class Movies extends CI_Controller {

	public function index($page = 'auto-list') {

//		$list = R::find('movies', 'ORDER BY :sortorder', array( ':sortorder'=> 'date'));


//		$this->gettext_language->load_gettext('ro_RO');
//
//		echo _('username');
//		exit();

//        $now = date('Y-m-d H:i:s', time());
//
//        $movie = R::dispense('movies');
//        $movie->user_id_added = 1;
//        $movie->datetime_added = $now;
//        $movie->approved = true;
//        $movie->visible = true;
//        $movieId = R::store($movie);
//
//        $movieTitle = R::dispense('movie_titles');
//        $movieTitle->movie_id = 1;
//        $movieTitle->user_id_added = 1;
//        $movieTitle->datetime_added = $now;
//        $movieTitle->current = true;
//        $movieTitle->approved = true;
//        $movieTitle->visible = true;
//
//        $movieTitleId = R::store($movieTitle);

		/**
		 * view load
		 */
		$this->load->view_page('movies/index', $this->data);

    }

	public function create() {

		if (!empty($_POST)) {
			$now = date('Y-m-d H:i:s', time());

			$movieObj = R::dispense('movies');
			$movieObj->user_id_added = 1;
			$movieObj->datetime_added = $now;
			$movieObj->approved = true;
			$movieObj->visible = true;
			$movieId = R::store($movieObj);

			$movieTitleObj = R::dispense('movie_titles');
			$movieTitleObj->user_id_added = 1;
			$movieTitleObj->movie_id_assigned = $movieId;
			$movieTitleObj->title = $_POST['movie-title'];
			$movieTitleObj->datetime_added = $now;
			$movieTitleObj->approved = true;
			$movieTitleObj->visible = true;
			$movieTitleId = R::store($movieTitleObj);

			//            $movieTitleArray = R::find('movies', 'ORDER BY :sortorder', array( ':sortorder'=> 'date'));

			/**
			 * @todo
			 * $dkghfdkhg->addErrorMsg('lkdsfjks');
			 * $->redirect('list');
			 */
			echo 'movie with id ' . $movieId . ' created';
		}

//		$this->data['keywords'] = 'create, movie, form';
//		$this->data['description'] = '';


		/**
		 * view load
		 */
		$this->load->view_page('movies/create', $this->data);


	}

}