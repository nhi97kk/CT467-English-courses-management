<?php

namespace App\Controllers\Teacher;

use App\Controllers\Controller;
use App\Models\Course;
use App\SessionGuard as Guard;
use App\Models\Time;
use App\Models\Schedule;
use App\Models\Teacher;
use App\Models\Room;

class ScheduleController extends Controller
{
    public function __construct()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        }else if(Guard::teacher()->role === 1){
            redirect('/dashboard');
        }

        parent::__construct();
    }

    public function index(){
        $teacher = Guard::teacher();
        $schedules = Schedule::where('teacher_id', $teacher->id)->get();
        $this->sendPage('page/teachers/schedules/index',['schedules'=>$schedules]);
    }

    public function chose($scheduleId){
        $courses = Guard::teacher()->courses;

        $this->sendPage('page/teachers/schedules/add',['scheduleId'=>$scheduleId,
        'courses'=>$courses]);
    }

    public function set(){
        $courseId = $_POST['courseId'];
        $scheduleId = $_POST['scheduleId'];

        $schedule = Schedule::where('id', $scheduleId)->first();

        $schedule->course_id =  $courseId;
        $schedule->save();

        redirect('/teacher/schedule');
    }
}