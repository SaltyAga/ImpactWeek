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
$route['default_controller'] = 'friends';
$route['registration'] = 'friends/registration';
$route['logout'] = 'friends/logout';
$route['login'] = 'friends/login';
$route['all_emails'] = 'friends/all_emails';
$route['login_admin'] = 'friends/login_admin';
$route['make_admin'] = 'friends/make_admin';
$route['remove_admin'] = 'friends/remove_admin';
$route['admin'] = 'friends/admin';
$route['members'] = 'friends/members';
$route['members_search'] = 'friends/members_search';
$route['profile'] = 'friends/profile';
$route['edit_profile'] = 'friends/edit_profile';
$route['update_profile'] = 'friends/update_profile';
$route['friend_request'] = 'friends/friend_request';
$route['add_friend'] = 'friends/add_friend';
$route['friend_profile'] = 'friends/friend_profile';
$route['friend_request_recieved'] = 'friends/friend_request_recieved';
$route['show_friends'] = 'friends/show_friends';
$route['show_friends/(:any)'] = 'friends/show_friends/$1';
// $route['show_friends_id/(:any)'] = 'friends/show_friends_id/$1';
$route['show_friends_id'] = 'friends/show_friends_id';
$route['my_friends'] = 'friends/my_friends';
$route['all_posts'] = 'friends/all_posts';
$route['all_comm'] = 'friends/all_comm';
$route['add_comm'] = 'friends/add_comm';
$route['add_post'] = 'friends/add_post';
$route['add_event'] = 'friends/add_event';
$route['get_event'] = 'friends/get_event';
$route['all_events'] = 'friends/all_events';
$route['challenge'] = 'friends/challenge';
$route['friend_request'] = 'friends/friend_request';
$route['friend_request_sent'] = 'friends/friend_request_sent';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
