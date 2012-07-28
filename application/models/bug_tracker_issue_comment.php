<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bug_Tracker_Issue_Comment extends CI_Model {
    public function get_all_by($issue_id='', $issue_comments_id=array()) {


        $results = R::getAll( "

			SELECT		ics.id AS id,
						ics.datetime_added,
						ics.content,
						ics.visible,
						ics.deleted,
						ics.user_id_added,

						u.id AS user_id,
						u.first_name,
						u.last_name
			FROM        users u,
			            (SELECT
                                    ic.id AS id,
                                    ic.datetime_added,
                                    ic.content,
                                    ic.visible,
                                    ic.deleted,
                                    ic.user_id_added,

                                    i.id AS issue_id
                        FROM        issue_comments ic,
                                    issues i
                        WHERE       ic.issue_id = i.id AND ic.deleted = 0 AND  i.id IN  ({$issue_id})
                        ORDER BY	ic.datetime_added)  ics

            WHERE       u.id = ics.user_id_added
		");



        $results = $this->convertArrayToObject($results);

        return $results;
    }
}