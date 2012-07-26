<?php

class Movie_genres extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->genre_name_min_length = 5;
//		$this->load->model('movie');
	}

	public function index() {

		$data = array();

		/**
		 * view load
		 */
		$this->load->view_page('movies/genres/index', $data);
	}

	public function list_action($sort='dateadded', $order='desc') {

		$sortArray = array(
			'id' => 'id',
			'name' => 'name',
			'dateadded' => 'datetime_added',
			'datelastedit' => 'datetime_lastedited'
		);

		if (!array_key_exists($sort, $sortArray)) {
			/**
			 * @todo Log this error
			 */
			$this->add_error_msg(_('unknown sort field'));
			redirect('movie_genres/list_action', 'refresh');
		}

		if ($order !== 'asc' && $order !== 'desc') {
			redirect('movie_genres/list_action/'.$sort, 'refresh');
		}

		$movie_genres_array = R::find('movie_genres',
			'deleted = 0 ORDER BY :sortorder :order',
			array(
				':sortorder' => $sort,
				':order' => $order
			));

		$user_obj_array = array();
		foreach($movie_genres_array as $key => $movie_genre_obj)
		{
			if (!array_key_exists($movie_genre_obj->user_id, $user_obj_array))
			{
				$user_obj = R::load('users',$movie_genre_obj->user_id);

				if (!$user_obj->id)
				{
					/**
					 * very unlikely
					 */
					/**
					 * @todo log error
					 */
				}
				else
				{
					$user_obj_array[$movie_genre_obj->user_id] = $user_obj;
				}
			}
			$movie_genres_array[$key]->user_obj = $user_obj_array[$movie_genre_obj->user_id];
		}

		$data['movie_genres_array'] = $movie_genres_array;

		/**
		 * view load
		 */
		$this->load->view_page('movies/genres/list', $data);

    }

	public function create() {

		if (!empty($_POST)) {
			$now = date('Y-m-d H:i:s', now());

			$this->form_validation->set_rules('name', ucfirst(_('genre name')), 'required|min_length['.$this->genre_name_min_length.']');

			if ($this->form_validation->run() == FALSE)
			{
				/**
				 * @todo Log this error
				 */
				$this->add_error_msg(validation_errors());
				redirect('movie_genres/create', 'refresh');
			}
			else
			{
				$movie_genre_obj = R::dispense('movie_genres');
				$movie_genre_obj->name = $this->input->post('name');
				/**
				 * @todo admin can create movie genre as another user (add a field to see this)
				 */
				$movie_genre_obj->user_id = $this->auth->user_id;
				$movie_genre_obj->datetime_added = $now;
				$movie_genre_obj->approved = true;
				$movie_genre_obj->visible = true;
				$movie_genre_obj->deleted = false;

				$movie_genre_id = R::store($movie_genre_obj);

				/**
				 * @todo logs
				 */
				$this->add_success_msg(_('movie genre successfully created'));
				redirect('movie_genres/create', 'refresh');
			}
		}

		$data['genre_name_min_length'] = $this->genre_name_min_length;

		/**
		 * view load
		 */
		$this->load->view_page('movies/genres/create', $data);

	}

	public function edit($id = NULL) {

		/**
		 * @todo obviously not needed... restrict all access from movie_genres/*
		 */
		if(!$id){
			$this->add_error_msg(_('Error 404 - Not Found'));
			redirect('movie_genres/list_action', 'refresh');
		}

		$movie_genre_obj = R::load("movie_genres",$id);

		if(!$movie_genre_obj->id){
			/**
			 * @todo error keyword for error msgs
			 */
			$this->add_error_msg(_('Error 404 - Not Found'));
			redirect('movie_genres/list_action', 'refresh');
		}

		if (!empty($_POST)) {
			$now = date('Y-m-d H:i:s', now());

			$this->form_validation->set_rules('name', ucfirst(_('genre name')), 'required|min_length['.$this->genre_name_min_length.']');

			if ($this->form_validation->run() == FALSE)
			{
				$this->add_error_msg(validation_errors());
				redirect('movie_genres/edit/'.$id, 'refresh');
			}
			else
			{
				$movie_genre_obj->name = $this->input->post('name');
				/**
				 * @todo admin can create movie genre as another user (add a field to see this)
				 */
				$movie_genre_obj->user_id = $this->auth->user_id;
				$movie_genre_obj->datetime_added = $now;
				$movie_genre_obj->approved = true;
				$movie_genre_obj->visible = true;
				$movie_genre_obj->deleted = false;

				$movie_genre_id = R::store($movie_genre_obj);

				/**
				 * @todo logs
				 */
				$this->add_success_msg(_('movie genre successfully created'));
				redirect('movie_genres/edit/'.$id, 'refresh');
			}
		}

		$data['movie_genre_obj'] = $movie_genre_obj;
		$data['genre_name_min_length'] = $this->genre_name_min_length;

		/**
		 * view load
		 */
		$this->load->view_page('movies/genres/edit', $data);
	}

}