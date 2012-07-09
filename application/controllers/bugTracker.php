<?php

class BugTracker extends CI_Controller {

    public function create_issue()
    {
        /**
         * view load
         */
        $this->load->view('bugTracker/issues');

        $issue = R::dispense("issues");
        if (isset($_POST['issue_name']))
        {
            $issue->name = $_POST['issue_name'];
            $issue->user_id_added = 2;
            $issue->datetime_added = date('m/d/Y H:i:s');
            $issue->approved = (boolean) true;
            $issue->visible = (boolean) true;
            $issue->deleted = (boolean) false;
            $id = R::store($issue);
        }

        $issueList = R::find('issues');
        $data['issueList'] = $issueList;
        $this->load->view('bugTracker/listIssues', $data);


    }

    public function detail_issue()
    {
        $issue = R::find('issues', ' id = :id', array(':id'=>$_GET['id_issue']) );
        $data['issue'] = $issue;
        $this->load->view('bugTracker/issueDetail', $data);

    }
}
 
