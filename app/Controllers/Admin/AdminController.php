<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Student;

class AdminController extends Controller
{
    public function __construct()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        }

        parent::__construct();
    }

    public function dashboard(){
        $coursesCount = Course::count();
        $teachersCount = Teacher::count();
        $studentsCount = Student::count();

        $this->sendPage('/dashboard',
            ['coursesCount'=> $coursesCount,
            'teachersCount'=> $teachersCount,
            'studentsCount'=> $studentsCount
            ]
        );
    }
    public function index()
    {
        $this->sendPage('courses/index', [
            'courses' => Course::all()
        ]);
    }

    public function indexhome()
    {
        $this->sendPage('home', [
            'courses' => Course::all()
        ]);
    }
    public function create()
    {
        $this->sendPage('courses/create', [
            'errors' => session_get_once('errors'),
            'old' => $this->getSavedFormValues()
        ]);
    }
    public function store()
    {
        $data = $this->filterContactData($_POST);
        $model_errors = Course::validate($data);
        if (empty($model_errors)) {
            $course = new Course();
            $course->fill($data);
            $course->teacher()->associate(Guard::teacher());
            $course->save();
            redirect('/dashboard/course');
        }
        // Lưu các giá trị của form vào $_SESSION['form']
        $this->saveFormValues($_POST);
        // Lưu các thông báo lỗi vào $_SESSION['errors']
        redirect('/course/add', ['errors' => $model_errors]);
    }
    protected function filterContactData(array $data)
    {
        return [
            'name' => $data['name'] ?? '',
            // 'phone' => preg_replace('/\D+/', '', $data['phone']),
            'desc' => $data['desc'] ?? ''
        ];
    }

    public function edit($courseId)
    {
        // $course = Guard::teacher()->courses->find($courseId);
        // if (!$course) {
        //     $this->sendNotFound();
        // }
        $course = Course::findOrFail($courseId);

        $form_values = $this->getSavedFormValues();
        $data = [
            'errors' => session_get_once('errors'),
            'course' => (!empty($form_values)) ?
                array_merge($form_values, ['id' => $course->id]) :
                $course->toArray()

        ];
        $this->sendPage('courses/edit', $data);
    }
    public function update($courseId)
    {
        $course = Course::findOrFail($courseId);
        if (!$course) {
            $this->sendNotFound();
        }
        $data = $this->filterContactData($_POST);
        $model_errors = Course::validate($data);
        if (empty($model_errors)) {
            $course->fill($data);
            $course->save();
            redirect('/dashboard/course');
        }
        $this->saveFormValues($_POST);
        redirect('dashboard/course/edit/' . $courseId, [
            'errors' => $model_errors
        ]);
    }

    public function destroy($courseId)
    {
        // $course = Guard::teacher()->courses->find($courseId);
        $course = Course::findOrFail($courseId);
        if (!$course) {
            $this->sendNotFound();
        }
        $course->delete();
        redirect('/dashboard/course');
    }   
}