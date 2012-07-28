<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|

$route['default_controller'] = "welcome";
$route['404_override'] = '';

*/

/**
 * default
 */
$route['default_controller'] = 'home/index';

/**
 * Auth (users)
 */
//$route['auth/(:any)'] = 'auth/$1';
$route['auth/(\d+)'] = 'auth/view/$1';

/**
 * Movies
 */
//$route['movies/(:any)'] = 'movies/$1';
$route['movies/list'] = 'movies/list_action';
$route['movies/edit/(\d+)'] = 'movies/edit/$1';

/**
 * Movie genres
 */
$tmp = 'movie-genres';
$route[$tmp.'/list/(:any)/(:any)'] = 'movie_genres/list_action/$1/$2';
$route[$tmp.'/list/(:any)'] = 'movie_genres/list_action/$1';
$route[$tmp.'/list'] = 'movie_genres/list_action';
$route[$tmp.'/edit/(\d+)'] = 'movie_genres/edit/$1';
$route['movie-genres/(:any)'] = 'movie_genres/$1';
$route[$tmp] = 'movie_genres';

/**
 * Movie reviews
 */
$route['movie-reviews/create'] = 'movie_reviews/create';
$route['movie-reviews/edit/(\d+)'] = 'movie_reviews/edit/$1';
$route['movie-reviews/delete/(\d+)'] = 'movie_reviews/delete/$1';
$route['movie-reviews/lists'] = 'movie_reviews/list_action';

/**
 * Movie titles
 */
$route['movie-titles/(\d+)'] = 'movie_titles/view/$1';

/**
 * @todo find something shorter
 */
$route['movie-titles/([a-z]+)/([a-z]+)'] = 'movie_titles/list_action/$1/$2';
$route['movie-titles/([a-z]+)'] = 'movie_titles/list_action/$1';
$route['movie-titles'] = 'movie_titles/list_action';

$route['movie-titles/assign/(\d+)'] = 'movie_titles/assign/$1';

/**
 * Bug Tracker issues
 */
$route['bug-tracker-issues/create']      = 'bug_tracker_issues/create';
$route['bug-tracker-issues/edit/(\d+)']  = 'bug_tracker_issues/edit/$1';
$route['bug-tracker-issues/view/(\d+)']  = 'bug_tracker_issues/view/$1';
$route['bug-tracker-issues/delete/(\d+)']  = 'bug_tracker_issues/delete/$1';
$route['bug-tracker-issues/list']  = 'bug_tracker_issues/list_action';

/**
 * Bug Tracker issue comments
 */
$route['bug-tracker-issue-comments/create/(\d+)']      = 'bug_tracker_issue_comments/create/$1';
$route['bug-tracker-issue-comments/edit/(\d+)']  = 'bug_tracker_issue_comments/edit/$1';
$route['bug-tracker-issue-comments/view/(\d+)']  = 'bug_tracker_issue_comments/view/$1';
$route['bug-tracker-issue-comments/delete/(\d+)']  = 'bug_tracker_issue_comments/delete/$1';
$route['bug-tracker-issue-comments/list/(\d+)']  = 'bug_tracker_issue_comments/list_action/$1';

/**
 * Bug Tracker issue asignations
 */
$route['bug-tracker-issue-assignations/create/(\d+)']      = 'bug_tracker_issue_assignations/create/$1';
$route['bug-tracker-issue-assignations/delete/(\d+)']  = 'bug_tracker_issue_assignations/delete/$1';
$route['bug-tracker-issue-assignations/list']  = 'bug_tracker_issue_assignations/list_action';


$route['changes-log']  = 'changes_log/index';
$route['changes-log/(:any)']  = 'changes_log/$1';

//$route['news/([a-z]+)/(\d+)'] = 'news/$1/$2';
//$route['news'] = 'news';
//$route['(:any)'] = 'movies/view/$1';
//$route['default_controller'] = 'movies/view';

/* End of file routes.php */
/* Location: ./application/config/routes.php */