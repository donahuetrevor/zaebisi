<?php
class News extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
    }

    public function index()
    {
        /*
        $album = R::dispense('album');
        $album->title = '13 Songs';
        $album->artist = 'Fugazi';
        $album->year = 1990;
        $album->rating = 5;
        $id = R::store($album);
        */

        $this->data['news'] = R::find('album',' year = ?', array( 1990 ));
        $this->data['title'] = 'test page';
        $this->data['keywords'] = 'test keywords,test2 keywords';
        $this->data['description'] = 'blablabla description';

        $this->gettext_language->load_gettext('ru_RU');

//        set_translation_language('ru_RU');


//        $this->load->view('base/header', $this->data);
//        $this->load->view('news/index', $this->data);
//        $this->load->view('base/footer');

        $this->load->view('page', $this->data);

        /*
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News archive';

        $this->load->view('base/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('base/footer');
         
         */
    }

    public function __destruct() {

    }

    public function view($slug)
    {
        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item']))
        {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('base/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('base/footer');
    }
}