<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\Student;
use App\Models\Result;

class StudentController extends Controller
{
    public function __construct()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        }else if(Guard::teacher()->role === 0){
            redirect('/');
        }

        parent::__construct();
    }

    public function index(){
        $student = Student::all();
        $this->sendPage('/students/index',['students'=>$student] );
    }

    public function create()
    {
        $this->sendPage('students/create', [
            'errors' => session_get_once('errors'),
            'old' => $this->getSavedFormValues()
        ]);
    }

    public function store()
    {
        $data = $this->filterContactData($_POST);
        $model_errors = Student::validate($data);
        if (empty($model_errors)) {
            $student = new Student();
            $student->fill($data);
            
            $student->save();
            redirect('/dashboard/student');
        }
        // Lưu các giá trị của form vào $_SESSION['form']
        $this->saveFormValues($_POST);
        // Lưu các thông báo lỗi vào $_SESSION['errors']
        redirect('/dashboard/student/create', ['errors' => $model_errors]);
    }

    protected function filterContactData(array $data)
    {
        return [
            'name' => $data['name'] ?? '',
            'address' => $data['address'] ?? '',
            'email' => $data['email'] ?? '',
            'phone' => preg_replace('/\D+/', '', $data['phone'])
        ];
    }
    // public function view($Id)
    // {
    //     $course = Course::findOrFail($courseId);
    //     // Lấy danh sách sinh viên đã tham gia khóa học
    //     $studentsJoin = Result::where('course_id', $courseId)->get();
    //     // Lấy danh sách sinh viên tương ứng
    //     $studentIds = $studentsJoin->pluck('student_id')->toArray();
    //     $students = Student::whereIn('id', $studentIds)->get();

    //     $data = [
    //         'course' => $course,
    //         'students' => $students
    //     ];

    //     $this->sendPage('results/view', $data);
    // }
    public function edit($studentId)
    {
        $student = Student::findOrFail($studentId);

        $form_values = $this->getSavedFormValues();
        $data = [
            'errors' => session_get_once('errors'),
            'student' => (!empty($form_values)) ?
                array_merge($form_values, ['id' => $student->id]) :
                $student->toArray()

        ];
        $this->sendPage('students/edit', $data);
    }

    public function update($studentId)
    {
        $student = Student::findOrFail($studentId);
        if (!$student) {
            $this->sendNotFound();
        }
        $data = $this->filterContactData($_POST);
        $oldphone = $student->phone;
        $oldemail = $student->email;
        $model_errors = Student::validateEdit($data, $oldphone, $oldemail);
        if (empty($model_errors)) {
            $student->fill($data);
            $student->save();
            redirect('/dashboard/student');
        }
        $this->saveFormValues($_POST);
        redirect('/dashboard/student/edit/' . $studentId, [
            'errors' => $model_errors
        ]);
    }

    public function destroy($studentId)
    {
        $student = Student::findOrFail($studentId);
        if (!$student) {
            $this->sendNotFound();
        }
        $student->delete();

        $results = Result::where('student_id', $studentId)->get();
    if(!empty($results)) {
        foreach ($results as $result) {
            $result->delete();
        }
    }
        redirect('/dashboard/student');
    }

    public function view($studentId){
        $results = Result::where('student_id', $studentId)->get();
        $this->sendPage('/students/view',['results'=>$results]);
    }
}