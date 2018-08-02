<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'page';

/*This route indicates which controller class should be loaded if the requested controller is not found. It will override the default 404 error page. Same per-directory rules as with ‘default_controller’ apply here as well.

It won’t affect to the show_404() function, which will continue loading the default error_404.php file at application/views/errors/error_404.php.*/
$route['404_override'] = 'page';

$route['article/(:num)/(:any)'] = 'article/index/$1/$2';

$route['translate_uri_dashes'] = FALSE;


/*:any) will match a segment containing any character (except for ‘/’, which is the segment delimiter).
$route['(:any)'] = 'pages/view/$1'; means that anything you type on the url will proceed to pages/view/$1 the $1 here is the parameter you would like to pass to a controller/method example

$route['login/(:any)'] = 'home/bacon/$1';

in this example you are telling CI that anything that goes to login with any parameter like login/john will proceed to your home/bacon/john (:any) will match all string and integer if you use (:num) it will only match integer parameters like

$route['login/(':num')'] = 'home/bacon/$1'

in this config you are specifying that if a url login has a integer after it like login/1234, you would like it to redirect to home/bacon/1234 if you don't know how many parameters you would like to pass you could try $route['login/(:any).*'] = 'home/bacon/$1' 

*/
//$route['(:any).*'] = 'page/index/$1';