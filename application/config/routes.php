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
*/

$route['default_controller'] = "dashboard";
$route['404_override'] = '';
$route['api/(:any)'] = 'dashboard/api/$1';
$route['fetchComment'] = 'dashboard/fetchComment';
$route['manuBaseline'] = 'dashboard/baseline';
$route['AssemblyBaseline'] = 'dashboard/assemblybaseline';
$route['getOverallProgress'] = 'dashboard/OverallProgress';
$route['outStandingProgress'] = 'dashboard/OutStandingProgress';
$route['gettrainData'] = 'dashboard/trainDataGet';
$route['addComment/(:any)'] = 'dashboard/addComment/$1';
$route['setapi/(:any)'] = 'dashboard/setapi/$1';
$route['portlet/(:any)'] = 'dashboard/portlet/$1';
$route['draw'] = 'dashboard/draw';
$route['save'] = 'dashboard/save';
$route['front'] = 'dashboard/front';
$route['login'] = 'dashboard/login';
$route['logout'] = 'dashboard/logout';
$route['debug'] = 'dashboard/debug';
$route['toexcel'] = 'dashboard/toexcel';
$route['topdf'] = 'dashboard/topdf';
$route['(:any)/(:any)/(:any)'] = 'dashboard/view/$1/$2/$3';
$route['(:any)/(:any)'] = 'dashboard/view/$1/$2';
$route['(:any)'] = 'dashboard/view/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */