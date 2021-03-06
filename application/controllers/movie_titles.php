<?php

class Movie_Titles extends CI_Controller {

//    public function index($page = 'auto-list') {
//
//    }

    public function list_action($sort='dateadded', $order='desc') {

        $perPage = 5;

        $sortArray = array('id', 'title', 'dateadded');

        if (!in_array($sort, $sortArray)) {
            /**
             * @todo redirect with error
             */
        }

        $movieTitleList = R::find('movie_titles',
                                  ' 1 ORDER BY :sortorder LIMIT :perPage ',
                                  array(':sortorder' => $sort,
                                        ':perPage' => $perPage));

	    $this->load->view_page('movies/titles/list');

    }

    public function assign($id) {
        $movieTitleId = (int) $id;

        echo 'assigning movieTitleId: '.$movieTitleId;
    }

    public function view($id) {

        if (!empty($_POST)) {

        }

        $movieTitleObj = R::load('movieTitles', $id);

        if (!$movieTitleObj->id) {
            /**
             * @todo redirect to list
             */
        }



        /**
         * load view
         */
        $this->load->view_page('movies/titles/view');
    }

}