<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function __construct()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        }

        parent::__construct();
    }

    public function index(){
        $teachers = Teacher::where('role', 0)->get();
        $this->sendPage('/teachers/index',['teachers'=>$teachers]);
    }

    public function create()
    {
        $this->sendPage('teachers/create', [
            'errors' => session_get_once('errors'),
            'old' => $this->getSavedFormValues()
        ]);
    }

    public function store()
    {
        $data = $this->filterContactData($_POST);
        $model_errors = Teacher::validateCreate($data);
        if (empty($model_errors)) {
            $teacher = new Teacher();
            $teacher->fill($data);
            // $teacher->teacher()->associate(Guard::teacher());
            $teacher->save();
            redirect('/dashboard/teacher');
        }
        // Lưu các giá trị của form vào $_SESSION['form']
        $this->saveFormValues($_POST);
        // Lưu các thông báo lỗi vào $_SESSION['errors']
        redirect('/teacher/add', ['errors' => $model_errors]);
    }

    protected function filterContactData(array $data)
    {
        return [
            'name' => $data['name'] ?? '',
            // 'phone' => preg_replace('/\D+/', '', $data['phone']),
            'email' => $data['email'] ?? ''
        ];
    }

    public function edit($teacherId)
    {
        $teacher = Teacher::findOrFail($teacherId);

        $form_values = $this->getSavedFormValues();
        $data = [
            'errors' => session_get_once('errors'),
            'teacher' => (!empty($form_values)) ?
                array_merge($form_values, ['id' => $teacher->id]) :
                $teacher->toArray()

        ];
        $this->sendPage('teachers/edit', $data);
    }

    public function update($teacherId)
    {
        $teacher = Teacher::findOrFail($teacherId);
        if (!$teacher) {
            $this->sendNotFound();
        }
        $data = $this->filterContactData($_POST);
        $model_errors = Teacher::validateEdit($data);
        if (empty($model_errors)) {
            $teacher->fill($data);
            $teacher->save();
            redirect('/dashboard/teacher');
        }
        $this->saveFormValues($_POST);
        redirect('/dashboard/teacher/edit/' . $teacherId, [
            'errors' => $model_errors
        ]);
    }

    public function destroy($teacherId)
    {
        $teacher = Teacher::findOrFail($teacherId);
        if (!$teacher) {
            $this->sendNotFound();
        }
        $teacher->delete();
        redirect('/dashboard/teacher');
    }
}