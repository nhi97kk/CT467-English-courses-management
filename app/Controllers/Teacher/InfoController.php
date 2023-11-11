<?php

namespace App\Controllers\Teacher;

use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\Teacher;

class InfoController extends Controller{
    public function __construct()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        }

        parent::__construct();
    }

    public function info(){
        $teacher = Guard::teacher();
        $this->sendPage('page/teachers/info',['teacher'=>$teacher]);
    }

    public function change(){
        $data = [
            'old' => $this->getSavedFormValues(),
            'errors' => session_get_once('errors')
        ];

        $this->sendPage('page/teachers/changePass', $data);
    }

    public function store()
    {
        $this->saveFormValues($_POST, ['password', 'password_confirmation']);

        $data = $this->filterUserData($_POST);
        $model_errors = Teacher::validateChange($data);
        if (empty($model_errors)) {
            // Dữ liệu hợp lệ...
            $this->changePass($data);

            // $messages = ['success' => 'User has been created successfully.'];
            // redirect('/login', ['messages' => $messages]);
        }

        // Dữ liệu không hợp lệ...
        redirect('/teacher/change-password', ['errors' => $model_errors]);
    }

    protected function filterUserData(array $data)
    {
        return [
            'password' => $data['password'] ?? null,
            'password_confirmation' => $data['password_confirmation'] ?? null
        ];
    }

    protected function changePass($data)
    {
       $password = password_hash($data['password'], PASSWORD_DEFAULT);
       $teacher = Guard::teacher();
       $teacher->password = $password;
       $teacher->save();
       redirect('/teacher/change-password/success');     
    }

    public function success(){
        $this->sendPage('/page/teachers/success');
    }
}