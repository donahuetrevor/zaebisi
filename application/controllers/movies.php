<?php

class Movies extends CI_Controller {

    public function view($page = 'auto-list') {

        if ( ! file_exists('application/views/movies/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'List of movies';
        $data['keywords'] = '';
        $data['description'] = 'test description';
        $data['include'] = 'movies/auto-list.php';

        $needles = R::findAll('movies', ' ORDER BY datetime_added LIMIT 10 ');

        print_r($needles);
        exit();

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

        

        $this->load->view('page', $data);
    }
}