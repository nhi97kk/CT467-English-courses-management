<?php

namespace App\Controllers\Student;

use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Result;
use App\Models\Student;
use App\Models\Schedule;

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
        $studentId = Guard::student()->id;
        $courses = Course::join('results', 'courses.id', '=', 'results.course_id')
        ->where('results.student_id', $studentId)
        ->get(['courses.*']);

        $this->sendPage('/page/students/index',['studentId'=>$studentId,
                                                'courses'=>$courses]);
    }
    
    

}