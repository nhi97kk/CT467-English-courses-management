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
    // $router->get('/dashboard/course/create', '\App\Controllers\Admin\AdminController@create');
    // $router->post('/dashboard/course', '\App\Controllers\Admin\AdminController@store');
    // $router->get('/dashboard/course/edit/(\d+)','\App\Controllers\Admin\AdminController@edit');
    // $router->post('/dashboard/course/(\d+)','\App\Controllers\Admin\AdminController@update');
    $router->post('/dashboard/course/delete/(\d+)','\App\Controllers\Admin\AdminController@destroy');
    //Admin teacher
    $router->get('/dashboard/teacher','\App\Controllers\Admin\TeacherController@index');
    // $router->get('/dashboard/teacher/create', '\App\Controllers\Admin\TeacherController@create');
    // $router->post('/dashboard/teacher', '\App\Controllers\Admin\TeacherController@store');
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
    $router->get('/dashboard/student/view/(\d+)', '\App\Controllers\Admin\StudentController@view');
    //Admin room
    $router->get('/dashboard/room','\App\Controllers\Admin\RoomController@index');
    $router->get('/dashboard/room/create', '\App\Controllers\Admin\RoomController@create');
    $router->post('/dashboard/room', '\App\Controllers\Admin\RoomController@store');
    $router->get('/dashboard/room/edit/(\d+)','\App\Controllers\Admin\RoomController@edit');
    $router->post('/dashboard/room/(\d+)','\App\Controllers\Admin\RoomController@update');
    $router->post('/dashboard/room/delete/(\d+)','\App\Controllers\Admin\RoomController@destroy');
    //Admin time
    $router->get('/dashboard/time','\App\Controllers\Admin\TimeController@index');
    $router->get('/dashboard/time/create', '\App\Controllers\Admin\TimeController@create');
    $router->post('/dashboard/time', '\App\Controllers\Admin\TimeController@store');
    $router->get('/dashboard/time/edit/(\d+)','\App\Controllers\Admin\TimeController@edit');
    $router->post('/dashboard/time/(\d+)','\App\Controllers\Admin\TimeController@update');
    $router->post('/dashboard/time/delete/(\d+)','\App\Controllers\Admin\TimeController@destroy');
    //Admin Schedule 
    $router->get('/dashboard/schedule','\App\Controllers\Admin\ScheduleController@index');
    $router->get('/dashboard/schedule/create', '\App\Controllers\Admin\ScheduleController@create');
    $router->post('/dashboard/schedule', '\App\Controllers\Admin\ScheduleController@store');
    $router->get('/dashboard/schedule/edit/(\d+)','\App\Controllers\Admin\ScheduleController@edit');
    $router->post('/dashboard/schedule/(\d+)','\App\Controllers\Admin\ScheduleController@update');
    $router->post('/dashboard/schedule/delete/(\d+)','\App\Controllers\Admin\ScheduleController@destroy');
    //Admin result
    $router->get('/dashboard/result','\App\Controllers\Admin\ResultController@index');
    $router->get('/dashboard/result/(\d+)','\App\Controllers\Admin\ResultController@result');
    $router->post('/dashboard/result/add','\App\Controllers\Admin\ResultController@update');
    $router->get('/dashboard/result/view/(\d+)','\App\Controllers\Admin\ResultController@view');
    //Admin changePass
    $router->get('/dashboard/change-password','\App\Controllers\Admin\InfoController@change');
    $router->post('/dashboard/change-password','\App\Controllers\Admin\InfoController@store');
    $router->get('/dashboard/change-password/success','\App\Controllers\Admin\InfoController@success');


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
    //Admin Schedule 
    $router->get('/teacher/schedule','\App\Controllers\Teacher\ScheduleController@index');
    $router->get('/teacher/schedule/set/(\d+)','\App\Controllers\Teacher\ScheduleController@chose');
    $router->post('/teacher/schedule/set','\App\Controllers\Teacher\ScheduleController@set');

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
$router->get('/','\App\Controllers\Teacher\CourseController@index');

//Student routes
$router->get('/student','\App\Controllers\Student\StudentController@index');


$router->set404('\App\Controllers\Controller@sendNotFound');

$router->run();
