<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\Student;

class StudentController extends Controller
{
    public function __construct()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
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
            // $student->student()->associate(Guard::student());
            $student->save();
            redirect('/dashboard/student');
        }
        // Lưu các giá trị của form vào $_SESSION['form']
        $this->saveFormValues($_POST);
        // Lưu các thông báo lỗi vào $_SESSION['errors']
        redirect('/student/add', ['errors' => $model_errors]);
    }

    protected function filterContactData(array $data)
    {
        return [
            'name' => $data['name'] ?? '',
            'email' => $data['email'] ?? '',
            'phone' => preg_replace('/\D+/', '', $data['phone'])
        ];
    }

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
        $model_errors = Student::validateEdit($data);
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
        redirect('/dashboard/student');
    }
}