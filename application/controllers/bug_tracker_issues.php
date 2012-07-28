<?php

class Bug_Tracker_Issues extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model('bug_tracker_issue_comment');
    }

    public function index() {

    }

    public function create()
    {
        //echo "<pre>"; print_r($this->auth->user_id); echo"</pre>";

        if ( ! empty($_POST))
        {
            $now = date('Y-m-d H:i:s', time());

            $issue_obj = R::dispense("issues");
            $issue_obj->user_id_added = $this->auth->user_id;
            $issue_obj->name = $_POST['issue_name'];
            $issue_obj->description = $_POST['issue_detail'];
            $issue_obj->status = $_POST['select_status'];
            $issue_obj->priority = $_POST['select_priority'];
            $issue_obj->tags = $_POST['issue_tags'];
            $issue_obj->visible = (empty($_POST['issue_visible'])) ? FALSE : TRUE;
            $issue_obj->commentmode =  (empty($_POST['issue_comment_mode'])) ? FALSE : TRUE;
            $issue_obj->approved = TRUE;
            $issue_obj->deleted = FALSE;
            $issue_obj->datetime_added = $now;
            $issue_obj->datetime_lastedited = $now;

            $issue_assign_obj = R::dispense('issue_assignations');
            $issue_assign_obj->user_id_assignator = $_POST['assign_user'];
            $issue_assign_obj->user_id = $this->auth->user_id;
            $issue_assign_obj->deleted = FALSE;
            $issue_assign_obj->datetime_added = $now;
            $issue_assign_obj->datetime_lastedited = $now;

            $issue_assign_obj->issue = $issue_obj;


            $issue_assign_id = R::store($issue_assign_obj);

        }
        $issue_list = R::findAll('users',' ORDER BY first_name');

        $data['issue_list'] = $issue_list;


        /**
         * view load
         */
        $this->load->view_page('bug_tracker/issues/create', $data);

    }
    public function edit($id)
    {
        $issue_obj = R::load("issues",$id);

        if(!$issue_obj->id){
            /**
             * @todo add redirect functionality
             */
        }

        if(!empty($_POST))
        {


            $now = date('Y-m-d H:i:s', time());

            $issue_obj->name = $_POST['issue_name'];
            $issue_obj->description = $_POST['issue_detail'];
            $issue_obj->status = $_POST['select_status'];
            $issue_obj->priority = $_POST['select_priority'];
            $issue_obj->tags = $_POST['issue_tags'];
            $issue_obj->visible = (empty($_POST['issue_visible'])) ? FALSE : TRUE;
            $issue_obj->commentmode =  (empty($_POST['issue_comment_mode'])) ? FALSE : TRUE;
            $issue_obj->datetime_lastedited = $now;

            $issue_assign_obj = R::dispense('issue_assignations');
            $issue_assign_obj->user_id_assignator = $_POST['assign_user'];
            $issue_assign_obj->user_id = $this->auth->user_id;
            $issue_assign_obj->deleted = FALSE;
            $issue_assign_obj->datetime_added = $now;
            $issue_assign_obj->datetime_lastedited = $now;

            $issue_assign_obj->issue = $issue_obj;


            $issue_assign_id = R::store($issue_assign_obj);

        }
        $data['issue_obj'] = $issue_obj;

        /**
         * view load
         */
        $this->load->view_page('bug_tracker/issues/edit',$data);


    }

    public function view($id,$sort='dateadded', $order='desc')
    {
        $issue_obj = R::load("issues",$id);

        $data['issue_obj'] = $issue_obj;

        $sortArray = array('id', 'title', 'dateadded');

        if (!in_array($sort, $sortArray)) {
            /**
             * @todo redirect with error
             */
        }

        $comments_list = $this->bug_tracker_issue_comment->get_all_by($id);

        $data['comments_list'] = $comments_list;

        $user_obj = R::load("users",$issue_obj->user_id_added);

        $data['user_obj'] = $user_obj;


        /**
         * view load
         */
        $this->load->view_page('bug_tracker/issues/view', $data);

    }

    public function delete($id)
    {
        $issue_obj = R::load("issues",$id);

        if(!$issue_obj->id){
            /**
             * @todo add redirect functionality
             */
        }

        $now = date('Y-m-d H:i:s', time());

        $issue_obj->datetime_lastedited = $now;
        $issue_obj->deleted = TRUE;
        $issueID = R::store($issue_obj);

        $data['issue_obj'] = $issue_obj;

        /**
         * view load
         */
        $this->load->view_page('bug_tracker/issues/delete',$data);
    }

    public function list_action($sort='dateadded', $order='desc')
    {
        $issueList = R::find('issues');


        $sort_array = array('id', 'title', 'dateadded');

        if (!in_array($sort, $sort_array)) {
            /**
             * @todo redirect with error
             */
        }

        $issue_list = R::find('issues',
            'deleted = 0 ORDER BY :sortorder',
            array( ':sortorder' => $sort
            ));

        $data['issue_list'] = $issue_list;

        $this->load->view_page('bug_tracker/issues/list',$data);

    }
}
 
