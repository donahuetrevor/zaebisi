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

//$route['default_controller'] = 'home/index';

$route['auth/(:any)'] = 'auth/$1';
$route['movies/(:any)'] = 'movies/$1';

$route['movie-reviews/create'] = 'movieReviews/create/$1';
$route['movie-reviews/edit/(\d+)'] = 'movieReviews/edit/$1';
$route['movie-reviews/delete/(\d+)'] = 'movieReviews/delete/$1';
$route['movie-reviews/lists'] = 'movieReviews/lists';

$route['movie-titles/(\d+)'] = 'movieTitles/view/$1';
$route['movie-titles/assign/(\d+)'] = 'movieTitles/assign/$1';

$route['bug-tracker-issue/create']      = 'bugTrackerIssue/create/$1';
$route['bug-tracker-issue/edit/(\d+)']  = 'bugTrackerIssue/edit/$1';
$route['bug-tracker-issue/view/(\d+)']  = 'bugTrackerIssue/view/$1';
$route['bug-tracker-issue/delete/(\d+)']  = 'bugTrackerIssue/delete/$1';
$route['bug-tracker-issue/list']  = 'bugTrackerIssue/list_action/';

$route['bug-tracker-issue-comment/create']      = 'BugTrackerIssueComments/create/$1';
$route['bug-tracker-issue-comment/edit/(\d+)']  = 'BugTrackerIssueComments/edit/$1';
$route['bug-tracker-issue-comment/view/(\d+)']  = 'BugTrackerIssueComments/view/$1';
$route['bug-tracker-issue-comment/delete/(\d+)']  = 'BugTrackerIssueComments/delete/$1';
$route['bug-tracker-issue-comment/list']  = 'BugTrackerIssueComments/list_action/';


//$route['news/([a-z]+)/(\d+)'] = 'news/$1/$2';
//$route['news'] = 'news';
//$route['(:any)'] = 'movies/view/$1';
//$route['default_controller'] = 'movies/view';

/* End of file routes.php */
/* Location: ./application/config/routes.php */