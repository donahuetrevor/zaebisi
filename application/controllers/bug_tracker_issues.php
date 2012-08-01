<?php

class Bug_Tracker_Issues extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->issue_title_min_length = 5;
        $this->load->model('bug_tracker_issue_comment');
    }

    public function index() {

    }

    public function create()
    {

        if ( ! empty($_POST))
        {
            $now = date('Y-m-d H:i:s', time());

            $this->form_validation->set_rules('issue_name', ucfirst(_('issue title')), 'required|min_length['.$this->issue_title_min_length.']');

            if ($this->form_validation->run() == FALSE)
            {
                /**
                 * @todo Log this error
                 */
                $this->add_error_msg(validation_errors());
                redirect('bug_tracker_issues/create', 'refresh');
            }
            else
            {
                $issue_obj = R::dispense("issues");
                $issue_obj->user_id_added = $this->auth->user_id;
                $issue_obj->name = $_POST['issue_name'];
                $issue_obj->description = $_POST['issue_detail'];
                $issue_obj->status = 'new';
                $issue_obj->priority = $_POST['select_priority'];
                $issue_obj->tags = $_POST['issue_tags'];
                $issue_obj->visible = (empty($_POST['issue_visible'])) ? FALSE : TRUE;
                $issue_obj->commentmode =  (empty($_POST['issue_comment_mode'])) ? FALSE : TRUE;
                $issue_obj->approved = TRUE;
                $issue_obj->deleted = FALSE;
                $issue_obj->datetime_added = $now;
                $issue_obj->datetime_lastedited = $now;

                $users_assign_arr = (!empty($_POST['assign_user'])) ? $_POST['assign_user'] : array();

                if (count($users_assign_arr) >= 1)
                {
                    foreach($users_assign_arr as $user_assign)
                    {
                        $issue_assign_obj = R::dispense('issue_assignations');

                        $issue_assign_obj->user_id_assignator = $user_assign;
                        $issue_assign_obj->user_id = $this->auth->user_id;
                        $issue_assign_obj->deleted = FALSE;
                        $issue_assign_obj->datetime_added = $now;
                        $issue_assign_obj->datetime_lastedited = $now;

                        $issue_assign_obj->issue = $issue_obj;

                        $issue_assign_id = R::store($issue_assign_obj);

                    }
                }
                else
                {
                    $issue_id = R::store($issue_obj);
                }

                $this->add_success_msg(_('issue successfully created'));
                redirect('bug_tracker_issues/view/'.$issue_obj->id, 'refresh');


            }

        }

        $issue_users_list = R::findAll('users',' ORDER BY first_name');

        $data['issue_users_list'] = $issue_users_list;
        $data['issue_title_min_length'] = $this->issue_title_min_length;

        /**
         * view load
         */
        $this->load->view_page('bug_tracker/issues/create', $data);

    }
    public function edit($id)
    {

        if(!$id)
        {
            $this->add_error_msg(_('Error 404 - Not Found'));
            redirect('bug_tracker/list_action', 'refresh');
        }

        $issue_obj = R::load("issues",$id);

        if(!$issue_obj->id)
        {
            $this->add_error_msg(_('Error 404 - Not Found'));
            redirect('bug_tracker/list_action', 'refresh');
        }


        $issue_users_list_assign = R::find('issue_assignations',
            'deleted = 0 AND issue_id = :issue_id ORDER BY :sortorder',
            array( ':sortorder' => 'issue_id', ':issue_id' => $id
            ));


        $users_issue_assigned = array();
        $users_issue_assigned['users'] = array();
        $users_issue_assigned['issues_assign'] = array();


        foreach($issue_users_list_assign as $user_assign)
        {
            $users_issue_assigned['users'][] = $user_assign->user_id_assignator;
            $users_issue_assigned['issues_assign'][] = $user_assign->id;
        }

        $now = date('Y-m-d H:i:s', time());

        if(!empty($_POST))
        {


            $this->form_validation->set_rules('issue_name', ucfirst(_('issue title')), 'required|min_length['.$this->issue_title_min_length.']');

            if ($this->form_validation->run() == FALSE)
            {
                /**
                 * @todo Log this error
                 */
                $this->add_error_msg(validation_errors());
                redirect('bug_tracker_issues/edit/'.$id, 'refresh');
            }
            else
            {

                $users_assign_arr = (!empty($_POST['assign_user'])) ? $_POST['assign_user'] : array();

                $issue_obj->name = $_POST['issue_name'];
                $issue_obj->description = $_POST['issue_detail'];
                $issue_obj->status = $_POST['select_status'];
                $issue_obj->priority = $_POST['select_priority'];
                $issue_obj->tags = $_POST['issue_tags'];
                $issue_obj->visible = (empty($_POST['issue_visible'])) ? FALSE : TRUE;
                $issue_obj->commentmode =  (empty($_POST['issue_comment_mode'])) ? FALSE : TRUE;
                $issue_obj->datetime_lastedited = $now;

                $assign_user = array();

                $assign_user['deleted'] = array_values(array_diff($users_issue_assigned['users'],$users_assign_arr));
                $assign_user['added'] = array_values(array_diff($users_assign_arr,$users_issue_assigned['users']));

                if (!empty($assign_user['deleted']) || !empty($assign_user['added']))
                {
                    for($i = 0; $i < count($assign_user['deleted']); $i++)
                    {

                        if (in_array($users_issue_assigned['users'][$i],$assign_user['deleted']))
                        {
                            $issue_assign_obj = R::load('issue_assignations',$users_issue_assigned['issues_assign'][$i]);

                            $issue_assign_obj->deleted = TRUE;
                            $issue_assign_obj->datetime_lastedited = $now;

                        }


                        $issue_assign_id = R::store($issue_assign_obj);


                    }

                    for($i = 0; $i < count($assign_user['added']); $i++)
                    {

                        $issue_assign_obj = R::dispense('issue_assignations');

                        $issue_assign_obj->user_id_assignator = $assign_user['added'][$i];
                        $issue_assign_obj->user_id = $this->auth->user_id;
                        $issue_assign_obj->deleted = FALSE;
                        $issue_assign_obj->datetime_added = $now;
                        $issue_assign_obj->datetime_lastedited = $now;

                        $issue_assign_obj->issue = $issue_obj;

                        $issue_assign_id = R::store($issue_assign_obj);

                    }
                }
                else
                {
                    $issue_id = R::store($issue_obj);
                }

                $this->add_success_msg(_('issue successfully updated'));
                redirect('bug_tracker_issues/view/'.$id, 'refresh');


            }

        }

        $issue_users_list = R::findAll('users',' ORDER BY first_name');


        $data['issue_users_list'] = $issue_users_list;
        $data['users_issue_assigned'] = $users_issue_assigned['users'];
        $data['issue_title_min_length'] = $this->issue_title_min_length;
        $data['issue_obj'] = $issue_obj;

        /**
         * view load
         */
        $this->load->view_page('bug_tracker/issues/edit',$data);

    }

    public function view($id,$sort='dateadded', $order='desc')
    {

        if(!$id)
        {
            $this->add_error_msg(_('Error 404 - Not Found'));
            redirect('bug_tracker/list_action', 'refresh');
        }

        $issue_obj = R::load("issues",$id);

        if(!$issue_obj->id)
        {
            $this->add_error_msg(_('Error 404 - Not Found'));
            redirect('bug_tracker/list_action', 'refresh');
        }

        $issue_users_list_assign = R::find('issue_assignations',
            'deleted = 0 AND issue_id = :issue_id ORDER BY :sortorder',
            array( ':sortorder' => 'issue_id', ':issue_id' => $id
            ));

        $users_issue_assigned = array();

        foreach($issue_users_list_assign as $user_assign)
        {
            $users_issue_assigned[] = $user_assign->user_id_assignator;
        }


        if(!empty($_POST))
        {
            $issue_obj->status = $_POST['select_status'];
            $issue_id = R::store($issue_obj);

            $this->add_success_msg(_('issue successfully updated'));
            redirect('bug_tracker_issues/view/'.$issue_id, 'refresh');

        }
        $data['users_issue_assigned'] = $users_issue_assigned;
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
        $data['users_issue_assigned'] = $users_issue_assigned;


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
 
