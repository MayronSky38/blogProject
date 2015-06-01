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
$route ['(:any)/(:num)/banComent/(:num)/(:num)'] = 'Coment_controller/banComent/$2/$3/$4';	//Ruta per esborrar comentaris. $1 -> nom del topic, $2 -> id del post, $3 -> id del comentari
$route ['(:any)/(:num)/deleteComent/(:num)'] = 'Coment_controller/deleteComent/$2/$3';	//Ruta per esborrar comentaris. $1 -> nom del topic, $2 -> id del post, $3 -> id del comentari
$route['(:any)/banPost/(:num)/(:num)'] = 'Post_controller/banPost/$2/$3';
$route['(:any)/deletePost/(:num)'] = 'Post_controller/deletePost/$2';					//Ruta per esborrar posts. $1 -> nom del topic, $2 -> id del post.
$route['(:any)/(:num)/createComent'] = 'Coment_controller/createComent/$1/$2';			//Ruta per crear comentaris. $1 -> nom del topic, $2 -> id del post.
$route['(:any)/createPost'] = 'Post_controller/createPost/$1';							//Ruta per crear posts. El parametre fa referencia al nom del topic.
$route['(:any)/post/(:num)'] = 'Coment_controller/listAllComents/$2'; 					//Llistar els comentaris d'un post a un topic. $1 name topic $2 idPost
$route['(:any)/(:num)'] = 'Post_controller/listAllPosts/$2'; 							//Llistar els posts d'un topic.  	$1 name Topic $2 id Topic
$route['logout'] = 'User_controller/logout';											//Ruta per fer logout de la pagina. Redirigit a home.
$route['login'] = 'User_controller/login';												//Ruta per fer login a la pagina. Redirigit a home.
$route['home'] = 'Topic_controller/listAllTopics';										//Pagina principal del blog.


$route['inserts'] = 'AutoInserts_controller/generate';
$route['users/(:any)'] = 'User_controller/view/$1';
$route['users'] = 'User_controller/index';
$route['default_controller'] = 'Topic_controller/listAllTopics';




