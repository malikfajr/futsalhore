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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = 'welcome/not_found';
$route['translate_uri_dashes'] = FALSE;

// Authentication
$route['auth/login']['get'] = 'AuthController/login';
$route['auth/login']['post'] = 'AuthController/authenticate';
$route['auth/logout']['get'] = 'AuthController/logout';

// Admin routing
$route['admin']['get'] = 'Admin/DashboardController/index';


// Admin Facility Routing
$route['admin/facility']['get'] = 'Admin/FacilityController/index';
$route['admin/facility']['post'] = 'Admin/FacilityController/store';
$route['admin/facility/(:any)']['post'] = 'Admin/FacilityController/update/$1';
$route['admin/facility/(:any)']['delete'] = 'Admin/FacilityController/destroy/$1';

// Admin Lapangan Routing
$route['admin/lapangan']['get'] = 'Admin/LapanganController/index';
$route['admin/lapangan']['post'] = 'Admin/LapanganController/store';
$route['admin/lapangan/add']['get'] = 'Admin/LapanganController/add';
$route['admin/lapangan/edit/(:any)']['get'] = 'Admin/LapanganController/edit/$1';
$route['admin/lapangan/edit/(:any)']['post'] = 'Admin/LapanganController/update/$1';
$route['admin/lapangan/delete/(:any)'] = 'Admin/LapanganController/destroy/$1';




// User routing
$route['profile']['get'] = 'UserController/profile';
$route['profile/update']['post'] = 'UserController/update';
$route['edit/password']['post'] = 'UserController/edit_password';
$route['booking']['get'] = 'UserController/booking_view';
$route['booking']['post'] = 'UserController/booking_store';

// Guest Routing