<?php

class Bug_Tracker_Issue_Comments extends CI_Controller {

    public function index()
    {

    }

    public function create($issue_id)
    {
        if (!empty($_POST))
        {
            $now = date('Y-m-d H:i:s', time());

            $issueCommentObj = R::dispense("issue_comments");
            /*
             * @todo for later (user login)
             */
            $issueCommentObj->user_id_added = $this->auth->user_id;;
            $issueCommentObj->content  = $_POST['comment_text'];
            $issueCommentObj->issue_id   = $issue_id;
            $issueCommentObj->datetime_added = $now;
            $issueCommentObj->datetime_lastedited = $now;
            $issueCommentObj->approved = true;
            $issueCommentObj->visible = true;
            $issueCommentObj->deleted = false;

            $issueCommentID = R::store($issueCommentObj);

            echo 'Comment ' . $issueCommentID . '  for issue was created';
        }

        /**
         * view load
         */
        $this->load->view_page('bug_tracker/comments/create');

    }

    public function edit($id)
    {
        $issueCommentObj = R::load("issue_comments",$id);

        if(!$issueCommentObj->id){
            /**
             * @todo add redirect functionality
             */
        }

        if(!empty($_POST))
        {

            $now = date('Y-m-d H:i:s', time());

            $issueCommentObj->content = $_POST['comment_text'];
            $issueCommentObj->datetime_lastedited = $now;
//            $issueCommentObj->approved =  true;
//            $issueCommentObj->visible =  true;
//            $issueCommentObj->deleted =  false;
            $issueCommentID = R::store($issueCommentObj);

        }
        $data['issueCommentObj'] = $issueCommentObj;

        /**
         * view load
         */
        $this->load->view_page('bug_tracker/comments/edit',$data);


    }

    public function view($id)
    {
        $issueCommentObj = R::load("issue_comments",$id);

        $data['issueCommentObj'] = $issueCommentObj;

        /**
         * view load
         */
        $this->load->view_page('bug_tracker/comments/view', $data);

    }

    public function delete($id)
    {
        $issueCommentObj = R::load("issue_comments",$id);

        if(!$issueCommentObj->id){
            /**
             * @todo add redirect functionality
             */
        }

        $now = date('Y-m-d H:i:s', time());

        $issueCommentObj->datetime_lastedited = $now;
        $issueCommentObj->deleted = true;
        $issueID = R::store($issueCommentObj);

        $data['issueCommentObj'] = $issueCommentObj;

        /**
         * view load
         */
        $this->load->view_page('bug_tracker/comments/delete',$data);
    }

    public function list_action($issue_id = null, $sort='dateadded', $order='desc')
    {

        $sortArray = array('id', 'title', 'dateadded');

        if (!in_array($sort, $sortArray)) {
            /**
             * @todo redirect with error
             */
        }

        $commentsList = R::find('issue_comments',
            'issue_id = :issue_id AND deleted = 0 ORDER BY :sortorder',
            array( ':sortorder' => $sort,
                ':issue_id' => $issue_id
            ));

        $data['commentsList'] = $commentsList;

        $this->load->view_page('bug_tracker/comments/list',$data);

    }



}
