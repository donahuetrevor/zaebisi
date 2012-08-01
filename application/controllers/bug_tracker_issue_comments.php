<?php

class Bug_Tracker_Issue_Comments extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('bug_tracker_issue_comment');
    }

    public function index()
    {

    }

    public function create($issue_id)
    {
        if (!empty($_POST))
        {
            $now = date('Y-m-d H:i:s', time());

            $issue_comment_obj = R::dispense("issue_comments");

            $issue_comment_obj->user_id_added = $this->auth->user_id;;
            $issue_comment_obj->content  = $_POST['comment_text'];
            $issue_comment_obj->issue_id   = $issue_id;
            $issue_comment_obj->datetime_added = $now;
            $issue_comment_obj->datetime_lastedited = $now;
            $issue_comment_obj->approved = TRUE;
            $issue_comment_obj->visible = TRUE;
            $issue_comment_obj->deleted = FALSE;

            $issue_comment_ID = R::store($issue_comment_obj);

            $this->add_success_msg(_('comment was added'));
            redirect('bug_tracker_issues/view/'.$issue_id, 'refresh');

        }

        $data['issue_id'] = $issue_id;
        /**
         * view load
         */
        $this->load->view_page('bug_tracker/comments/create',$data);

    }

    public function edit($id)
    {
        $issue_comment_obj = R::load("issue_comments",$id);

        if(!$issue_comment_obj->id){
            /**
             * @todo add redirect functionality
             */
        }

        if(!empty($_POST))
        {

            $now = date('Y-m-d H:i:s', time());

            $issue_comment_obj->content = $_POST['comment_text'];
            $issue_comment_obj->datetime_lastedited = $now;
            $issueCommentID = R::store($issue_comment_obj);

            $this->add_success_msg(_('comment was successful updated'));
            redirect('bug_tracker_issues/view/'.$issue_comment_obj->issue_id, 'refresh');


        }
        $data['issue_comment_obj'] = $issue_comment_obj;




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
        $issue_comment_obj = R::load("issue_comments",$id);

        if(!$issue_comment_obj->id){
            /**
             * @todo add redirect functionality
             */
        }

        $now = date('Y-m-d H:i:s', time());

        $issue_comment_obj->datetime_lastedited = $now;
        $issue_comment_obj->deleted = true;
        $issueID = R::store($issue_comment_obj);

        $data['issue_comment_obj'] = $issue_comment_obj;

        /**
         * view load
         */
        $this->load->view_page('bug_tracker/comments/delete',$data);
    }

    public function list_action($issue_id = null)
    {

        $comments_list = $this->bug_tracker_issue_comment->getByAll($issue_id);

        $data['comments_list'] = $comments_list;

        $this->load->view_page('bug_tracker/comments/list',$data);

    }



}
