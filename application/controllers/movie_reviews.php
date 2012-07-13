<?php
class Movie_Reviews extends CI_Controller {

    public function index()
    {

    }

    public function create()
    {

        $now = date('Y-m-d H:i:s', time());
        if(!empty($_POST)){

            $movie_review_obj = R::dispense("movie_reviews");
	        $movie_review_obj->user_id_added = 1;
	        $movie_review_obj->review = $_POST['movieReview'];
	        $movie_review_obj->datetime_added = $now;
	        $movie_review_obj->datetime_lastedited = $now;
	        $movie_review_obj->approved = (boolean) true;
	        $movie_review_obj->visible = (boolean) true;
	        $movie_review_obj->deleted = (boolean) false;

            $id = R::store($movie_review_obj);
        }

        /*
        * load view
        */
        $this->load->view_page('movies/reviews/create');
    }
    public  function edit($id){

	    $movie_review_obj = R::load("movie_reviews",$id);

        if(!$movie_review_obj->id){
            /**
             * @todo add redirect functionality
             */
        }

        $now = date('Y-m-d H:i:s', time());
//        print_r($movie_review_obj);

        if(!empty($_POST)){

	        $movie_review_obj->review = $_POST['movie-review'];
	        $movie_review_obj->datetime_lastedited = $now;
//            $movieRiew->approved = (boolean) true;
//            $movieRiew->visible = (boolean) true;
//            $movieRiew->deleted = (boolean) false;
            $id = R::store($movie_review_obj);

        }
        $data['movie_review_obj'] = $movie_review_obj;

        $this->load->view_page('movies/reviews/edit',$data);

    }

    public function delete($id){

		$movie_review_obj = R::load("movie_reviews",$id);

		if(!$movie_review_obj->id){
		    /**
		     * @todo add redirect functionality
		     */
		    exit();
		}

		if($_GET['accept']) {

		    $now = date('Y-m-d H:i:s', time());

			$movie_review_obj->datetime_lastedited = $now;
//            $movieRiew->approved = true;
//            $movieRiew->visible = true;
			$movie_review_obj->deleted = true;

		    $movieReviewId = R::store($movie_review_obj);
	    }

	    $data['movie_review_obj'] = $movie_review_obj;

//	    redirect('');
//        $this->load->view_page('movies/reviews/list', $data);

    }

    public function list_action(){

    }
}
?>