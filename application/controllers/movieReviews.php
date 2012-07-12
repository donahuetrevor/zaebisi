<?php
class MovieReviews extends CI_Controller {

    public function index() {

    }
    public function create() {

        $now = date('Y-m-d H:i:s', time());
        if(!empty($_POST)){

            $movieRiew = R::dispense("movie-reviews");
            $movieRiew->user_id_added = 1;
            $movieRiew->review = $_POST['movieReview'];
            $movieRiew->datetime_added = $now;
            $movieRiew->datetime_lastedited = $now;
            $movieRiew->approved = (boolean) true;
            $movieRiew->visible = (boolean) true;
            $movieRiew->deleted = (boolean) false;


            $id = R::store($movieRiew);

        }
        /*
        * load view
        */
        $this->load->view('movies/reviews/create');
    }
    public  function edit($id){

        $movieRiew = R::load("moviereviews",$id);

        if(!$movieRiew->id){
            /**
             * @todo add redirect functionality
             */
        }

        $now = date('Y-m-d H:i:s', time());
        print_r($movieRiew);

        if(!empty($_POST)){
            $movieRiew->review = $_POST['movieReview'];
            $movieRiew->datetime_lastedited = $now;
//            $movieRiew->approved = (boolean) true;
//            $movieRiew->visible = (boolean) true;
//            $movieRiew->deleted = (boolean) false;
            $id = R::store($movieRiew);

        }
        $data['movieReviewObj'] = $movieRiew;

        $this->load->view('movies/reviews/edit',$data);

    }

    public function delete($id){
        $movieRiew = R::load("moviereviews",$id);
        if(!$movieRiew->id){
            /**
             * @todo add redirect functionality
             */
        }


        print_r($movieRiew);

        if(!empty($_GET)){

            $now = date('Y-m-d H:i:s', time());
            $movieRiew->datetime_lastedited = $now;
//            $movieRiew->approved = (boolean) true;
//            $movieRiew->visible = (boolean) true;
           $movieRiew->deleted = (boolean) true;
            $id = R::store($movieRiew);

        }
        $data['movieReviewObj'] = $movieRiew;

        $this->load->view('movies/reviews/list',$data);

    }

    public function lists(){
        
    }
}
?>