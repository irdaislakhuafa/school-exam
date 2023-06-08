<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'StudentController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// students
$route['student'] = 'StudentController';
$route['student/authlogin'] = 'StudentController/login';
$route['student/register'] = 'StudentController/register';
$route['student/register/save'] = 'StudentController/saveRegister';
$route['student/maps'] = 'StudentController/maps';
$route['student/maps/(:any)'] = 'StudentController/maps/$1';
$route['student/materi/(:any)'] = 'StudentController/materi/$1';
$route['student/materi/(:any)/(:any)'] = 'StudentController/materi/$1/$2';
$route['student/checkAlreadyAnswer/(:any)'] = 'StudentController/checkAlreadyAnswer/$1';
// $route['student/subtema/(:any)/(:any)'] = 'StudentController/subtema/$1/$2';
$route['student/soal/(:any)'] = 'StudentController/soal/$1';
$route['student/soal/(:any)/(:any)'] = 'StudentController/soal/$1/$2';
$route['student/saveAnswer/(:any)/(:any)'] = 'StudentController/saveAnswer/$1/$2';
$route['student/nilai/(:any)'] = 'StudentController/nilai/$1';

// teachers
$route['teacher'] = 'TeacherController';
$route['teacher/register'] = 'TeacherController/register';
$route['teacher/register/save'] = 'TeacherController/saveRegister';
$route['teacher/login'] = 'TeacherController/login';
$route['teacher/home'] = 'TeacherController/home';
$route['teacher/class/new'] = 'TeacherController/newClass';
$route['teacher/class/create'] = 'TeacherController/createClass';
$route['teacher/class/edit'] = 'TeacherController/editClass';
$route['teacher/class/update'] = 'TeacherController/updateClass';
$route['teacher/class/subtema/select'] = 'TeacherController/selectSubtema';
$route['teacher/class/subtema/select/(:any)'] = 'TeacherController/selectSubtema/$1';
$route['teacher/class/subtema/selectEdit'] = 'TeacherController/selectEditSubtema';
$route['teacher/class/subtema/materi/new/(:any)'] = 'TeacherController/newMateri/$1';
$route['teacher/class/subtema/materi/new/(:any)/(:any)'] = 'TeacherController/newMateri/$1/$2';
$route['teacher/class/subtema/materi/new/(:any)/(:any)/(:any)'] = 'TeacherController/newMateri/$1/$2/$3';
$route['teacher/class/subtema/selectResult'] = 'TeacherController/selectSubtemaResult';
$route['teacher/class/subtema/resultMateri/(:any)/(:any)'] = 'TeacherController/resultMateri/$1/$2';
$route['teacher/class/subtema/resultSubtema/(:any)'] = 'TeacherController/resultSubtema/$1';
$route['teacher/class/subtema/resultStudent/(:any)/(:any)'] = 'TeacherController/resultStudent/$1/$2';
$route['teacher/class/subtema/saveScores'] = 'TeacherController/saveScores';
$route['teacher/class/materi/new'] = 'TeacherController/newMateriSoal';
$route['teacher/class/result/subtema/view/(:any)'] = 'TeacherController/viewResultSubtema/$1';
$route['teacher/class/result/materi/view/(:any)/(:any)'] = 'TeacherController/viewResultMateri/$1/$2';
$route['teacher/class/result/student/view/(:any)/(:any)'] = 'TeacherController/viewResultStudent/$1/$2';
