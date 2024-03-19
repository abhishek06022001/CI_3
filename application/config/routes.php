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
$route['default_controller'] = 'Login_c';
$route['/'] = 'Login_c';
$route['404_override'] = '';
$route['DashBoard']= 'Home';
$route['login_check'] = 'Login_c/login_check';
$route['Employees']= 'Employee_c';
$route['empnew']= 'Employee_c/empnew';
$route['importdata']= 'Employee_c/importdata';
$route['logout'] = 'Logout_c';
$route['profile'] = 'Profile_c';
$route['profile_c/get_states']= 'Profile_c/get_states';
$route['update']='Profile_c/update';
$route['change_password']= 'Login_c/change_password';
$route['changed_password']= 'Login_c/changed_password';
$route['exportExcel']= 'Employee_c/exportExcel';
$route['partTime']= 'Employee_c/partTime';
$route['typeSearch']= 'Employee_c/typeSearch';
$route['Feature']= 'Feature_c';
$route['addFeature'] = 'Feature_c/addFeature';
$route['deleteFeature']='Feature_c/deleteFeature';
$route['user-management']='User_c';
$route['role-management']='Role_c';
$route['addrole'] = 'Role_c/addrole';
$route['add'] = 'Role_c/add';
$route['add/(:any)'] = 'Role_c/add/$1';

$route['deleteRole'] = 'Role_c/deleteRole';
$route['saveEdit'] = 'Role_c/saveEdit';








