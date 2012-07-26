<?php

class Bug_Tracker_Issues extends CI_Controller {

    public function index() {

    }

    public function create()
    {
        //echo "<pre>"; print_r($this->auth->user_id); echo"</pre>";

        if ( ! empty($_POST))
        {
            $now = date('Y-m-d H:i:s', time());

            $issueObj = R::dispense("issues");
            $issueObj->user_id_added = $this->auth->user_id;
            $issueObj->name = $_POST['issue_name'];
            $issueObj->description = $_POST['issue_detail'];
            $issueObj->status = $_POST['select_status'];
            $issueObj->priority = $_POST['select_priority'];
            $issueObj->tags = $_POST['issue_tags'];
            $issueObj->visible = (empty($_POST['issue_visible'])) ? FALSE : TRUE;
            $issueObj->commentmode =  (empty($_POST['issue_comment_mode'])) ? FALSE : TRUE;
            $issueObj->approved = TRUE;
            $issueObj->deleted = FALSE;
            $issueObj->datetime_added = $now;
            $issueObj->datetime_lastedited = $now;

            $issueID = R::store($issueObj);

            echo 'Issue with id ' . $issueID . ' created';
        }

        /**
         * view load
         */
        $this->load->view_page('bug_tracker/issues/create');

    }
    public function edit($id)
    {
        $issueObj = R::load("issues",$id);

        if(!$issueObj->id){
            /**
             * @todo add redirect functionality
             */
        }

        if(!empty($_POST))
        {


            $now = date('Y-m-d H:i:s', time());

            $issueObj->name = $_POST['issue_name'];
            $issueObj->description = $_POST['issue_detail'];
            $issueObj->status = $_POST['select_status'];
            $issueObj->priority = $_POST['select_priority'];
            $issueObj->tags = $_POST['issue_tags'];
            $issueObj->visible = (empty($_POST['issue_visible'])) ? FALSE : TRUE;
            $issueObj->commentmode =  (empty($_POST['issue_comment_mode'])) ? FALSE : TRUE;
            $issueObj->datetime_lastedited = $now;

            $issueID = R::store($issueObj);

        }
        $data['issueObj'] = $issueObj;

        /**
         * view load
         */
        $this->load->view_page('bug_tracker/issues/edit',$data);


    }

    public function view($id,$sort='dateadded', $order='desc')
    {
        $issueObj = R::load("issues",$id);

        $data['issueObj'] = $issueObj;

        $sortArray = array('id', 'title', 'dateadded');

        if (!in_array($sort, $sortArray)) {
            /**
             * @todo redirect with error
             */
        }

        $ccommentsList = R::find('issue_comments',
            'issue_id = :issue_id AND deleted = 0 ORDER BY :sortorder',
            array( ':sortorder' => $sort,
                ':issue_id' => $id
            ));

        $data['commentsList'] = $ccommentsList;


        /**
         * view load
         */
        $this->load->view_page('bug_tracker/issues/view', $data);

    }

    public function delete($id)
    {
        $issueObj = R::load("issues",$id);

        if(!$issueObj->id){
            /**
             * @todo add redirect functionality
             */
        }

        $now = date('Y-m-d H:i:s', time());

        $issueObj->datetime_lastedited = $now;
        $issueObj->deleted = TRUE;
        $issueID = R::store($issueObj);

        $data['issueObj'] = $issueObj;

        /**
         * view load
         */
        $this->load->view_page('bug_tracker/issues/delete',$data);
    }

    public function list_action($sort='dateadded', $order='desc')
    {
        $issueList = R::find('issues');


        $sortArray = array('id', 'title', 'dateadded');

        if (!in_array($sort, $sortArray)) {
            /**
             * @todo redirect with error
             */
        }

        $issueList = R::find('issues',
            'deleted = 0 ORDER BY :sortorder',
            array( ':sortorder' => $sort
            ));

        $data['issueList'] = $issueList;

        $this->load->view_page('bug_tracker/issues/list',$data);

    }
}
 
