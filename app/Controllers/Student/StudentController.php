<?php

namespace App\Controllers\Student;

use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\Course;
use App\Models\Teacher;

class StudentController extends Controller
{
    public function __construct()
    {
        if (!Guard::isUserLoggedInStu()) {
            redirect('/login');
        }
        parent::__construct();
    }

    public function index(){
        $this->sendPage('/page/students/index');
    }
}