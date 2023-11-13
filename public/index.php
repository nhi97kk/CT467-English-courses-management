<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/../bootstrap.php';

define('APPNAME', 'MyE');

session_start();

$router = new \Bramus\Router\Router();

//Admin routes
$router->get('/dashboard','\App\Controllers\Admin\AdminController@dashboard');
    //Admin course
    $router->get('/dashboard/course','\App\Controllers\Admin\AdminController@index');
    $router->get('/dashboard/course/create', '\App\Controllers\Admin\AdminController@create');
    $router->post('/dashboard/course', '\App\Controllers\Admin\AdminController@store');
    $router->get('/dashboard/course/edit/(\d+)','\App\Controllers\Admin\AdminController@edit');
    $router->post('/dashboard/course/(\d+)','\App\Controllers\Admin\AdminController@update');
    $router->post('/dashboard/course/delete/(\d+)','\App\Controllers\Admin\AdminController@destroy');
    //Admin teacher
    $router->get('/dashboard/teacher','\App\Controllers\Admin\TeacherController@index');
    $router->get('/dashboard/teacher/create', '\App\Controllers\Admin\TeacherController@create');
    $router->post('/dashboard/teacher', '\App\Controllers\Admin\TeacherController@store');
    $router->get('/dashboard/teacher/edit/(\d+)','\App\Controllers\Admin\TeacherController@edit');
    $router->post('/dashboard/teacher/(\d+)','\App\Controllers\Admin\TeacherController@update');
    $router->post('/dashboard/teacher/delete/(\d+)','\App\Controllers\Admin\TeacherController@destroy');
    //Admin teacher
    $router->get('/dashboard/student','\App\Controllers\Admin\StudentController@index');
    $router->get('/dashboard/student/create', '\App\Controllers\Admin\StudentController@create');
    $router->post('/dashboard/student', '\App\Controllers\Admin\StudentController@store');
    $router->get('/dashboard/student/edit/(\d+)','\App\Controllers\Admin\StudentController@edit');
    $router->post('/dashboard/student/(\d+)','\App\Controllers\Admin\StudentController@update');
    $router->post('/dashboard/student/delete/(\d+)','\App\Controllers\Admin\StudentController@destroy');
    //Admin room
    $router->get('/dashboard/room','\App\Controllers\Admin\RoomController@index');
    $router->get('/dashboard/room/create', '\App\Controllers\Admin\RoomController@create');
    $router->post('/dashboard/room', '\App\Controllers\Admin\RoomController@store');
    $router->get('/dashboard/room/edit/(\d+)','\App\Controllers\Admin\RoomController@edit');
    $router->post('/dashboard/room/(\d+)','\App\Controllers\Admin\RoomController@update');
    $router->post('/dashboard/room/delete/(\d+)','\App\Controllers\Admin\RoomController@destroy');
    //Admin room
    $router->get('/dashboard/time','\App\Controllers\Admin\TimeController@index');
    $router->get('/dashboard/time/create', '\App\Controllers\Admin\TimeController@create');
    $router->post('/dashboard/time', '\App\Controllers\Admin\TimeController@store');
    $router->get('/dashboard/time/edit/(\d+)','\App\Controllers\Admin\TimeController@edit');
    $router->post('/dashboard/time/(\d+)','\App\Controllers\Admin\TimeController@update');
    $router->post('/dashboard/time/delete/(\d+)','\App\Controllers\Admin\TimeController@destroy');

//Teacher routes
$router->get('/teacher/course','\App\Controllers\Teacher\CourseController@index');
$router->get('/teacher/course/create', '\App\Controllers\Teacher\CourseController@create');
$router->post('/teacher/course', '\App\Controllers\Teacher\CourseController@store');
$router->get('/teacher/course/edit/(\d+)','\App\Controllers\Teacher\CourseController@edit');
$router->post('/teacher/course/(\d+)','\App\Controllers\Teacher\CourseController@update');
    //info
    $router->get('/teacher/info','\App\Controllers\Teacher\InfoController@info');
    //manage student
    $router->get('/teacher/student','\App\Controllers\Teacher\ManageController@index');
    $router->get('/teacher/manage/(\d+)','\App\Controllers\Teacher\ManageController@manage');
    $router->post('/teacher/manage/add','\App\Controllers\Teacher\ManageController@add'); 
    $router->get('/teacher/view/(\d+)','\App\Controllers\Teacher\ManageController@view');
    $router->post('/teacher/view/delete','\App\Controllers\Teacher\ManageController@destroy');
    //result
    $router->get('/teacher/result','\App\Controllers\Teacher\ResultController@index');
    $router->get('/teacher/result/(\d+)','\App\Controllers\Teacher\ResultController@result');
    $router->post('/teacher/result/add','\App\Controllers\Teacher\ResultController@update');
    $router->get('/teacher/result/view/(\d+)','\App\Controllers\Teacher\ResultController@view');
    //changePass
    $router->get('/teacher/change-password','\App\Controllers\Teacher\InfoController@change');
    $router->post('/teacher/change-password','\App\Controllers\Teacher\InfoController@store');
    $router->get('/teacher/change-password/success','\App\Controllers\Teacher\InfoController@success');

// Auth routes
$router->post('/logout', '\App\Controllers\Auth\LoginController@destroy');
$router->get('/register', '\App\Controllers\Auth\RegisterController@create');
$router->post('/register', '\\App\Controllers\Auth\RegisterController@store');
$router->get('/login', '\App\Controllers\Auth\LoginController@create');
$router->post('/login', '\App\Controllers\Auth\LoginController@store');
$router->get('/loginStudent', '\App\Controllers\Auth\LoginController@createStu');
$router->post('/loginStudent', '\App\Controllers\Auth\LoginController@storeStu');
$router->post('/logoutStudent', '\App\Controllers\Auth\LoginController@destroyStu');

// Home routes
$router->get('/', '\App\Controllers\Admin\AdminController@index');



$router->set404('\App\Controllers\Controller@sendNotFound');

$router->run();
