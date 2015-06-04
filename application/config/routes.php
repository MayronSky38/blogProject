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
|	http://codeigniter.com/user_guide/general/routing.html
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

$route['banPost/(:num)/(:num)'] = 'Post_controller/banPost/$1/$2';

//When this route executes, a post is eliminated by its Id.
$route['deletePost/(:num)'] = 'Post_controller/deletePost/$1' ;

//Displays de page for post creation.
$route['createPost'] =  'Post_controller/createPost';

//Lists all the coments for one post.
$route['post/(:num)'] = 'Coment_controller/listAllComents/$1';

//Destroys the actual session.
$route['logout'] = 'User_controller/logout';

//Login page.
$route['login'] = 'User_controller/login';

//Main page for the blog.												
$route['home'] = 'Post_controller/listAllPosts';										


$route['inserts'] = 'AutoInserts_controller/generate';
$route['users/(:any)'] = 'User_controller/view/$1';
$route['users'] = 'User_controller/index';
$route['default_controller'] = 'Topic_controller/listAllTopics';




