<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\Teacher;

class InfoController extends Controller{
    public function __construct()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        }elseif(Guard::teacher()->role === 0) {
            redirect('/');}

        parent::__construct();
    }

    public function change(){
        $data = [
            'old' => $this->getSavedFormValues(),
            'errors' => session_get_once('errors')
        ];

        $this->sendPage('changePass', $data);
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
        redirect('/dashboard/change-password', ['errors' => $model_errors]);
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
       redirect('/dashboard/change-password/success');     
    }

    public function success(){
        $this->sendPage('success');
    }
}