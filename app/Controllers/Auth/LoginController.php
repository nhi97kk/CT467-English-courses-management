<?php

namespace App\Controllers\Auth;

use App\Models\Teacher;
use App\Models\Student;
use App\Controllers\Controller;
use App\SessionGuard as Guard;

class LoginController extends Controller
{
    public function create()
    {
        if (Guard::isUserLoggedIn() && Guard::teacher()->role === 0) {
            redirect('/');
        }
        if (Guard::isUserLoggedIn() && Guard::teacher()->role === 1) {
            redirect('/dashboard');
        }

        $data = [
            'messages' => session_get_once('messages'),
            'old' => $this->getSavedFormValues(),
            'errors' => session_get_once('errors')
        ];

        $this->sendPage('auth/login', $data);
    }

    public function createStu()
    {
        if (Guard::isUserLoggedInStu()) {
            redirect('/student');
        }

        $data = [
            'messages' => session_get_once('messages'),
            'old' => $this->getSavedFormValues(),
            'errors' => session_get_once('errors')
        ];

        $this->sendPage('auth/loginStu', $data);
    }

    public function store()
    {
        $user_credentials = $this->filterUserCredentials($_POST);
        $errors = [];
        $user = Teacher::where('email', $user_credentials['email'])->first();
        if (!$user) {
            // Người dùng không tồn tại...
            $errors['email'] = 'Invalid email or password';
        } else if (Guard::login($user, $user_credentials)) {
            // Đăng nhập thành công...
            if ($user->role === 0) {
                redirect('/');}
            else redirect('/dashboard');
        } else {
            // Sai mật khẩu...
            $errors['password'] = 'Invalid email or password.wth' . $user_credentials['password'] . $user->password;
        }

        // Đăng nhập không thành công: lưu giá trị trong form, trừ password
        $this->saveFormValues($_POST, ['password']);
        redirect('/login', ['errors' => $errors]);
    }

    public function storeStu()
    {
        $user_credentials = $this->filterUserCredentialsStu($_POST);
        $errors = [];
        $user = Student::where('email', $user_credentials['email'])->first();
        if (!$user) {
            // Người dùng không tồn tại...
            $errors['email'] = 'Invalid email or password';
        } else if (Guard::loginStu($user, $user_credentials)) {
            redirect('/student');}
        else
        

        // Đăng nhập không thành công: lưu giá trị trong form, trừ password
        // $this->saveFormValues($_POST, ['password']);
        redirect('/loginStudent', ['errors' => $errors]);
    }

    public function destroy()
    {
        Guard::logout();
        redirect('/login');
    }

    public function destroyStu()
    {
        Guard::logoutStu();
        redirect('/loginStudent');
    }

    protected function filterUserCredentials(array $data)
    {
        return [
            'email' => filter_var($data['email'], FILTER_VALIDATE_EMAIL),
            'password' => $data['password'] ?? null
        ];
    }

    protected function filterUserCredentialsStu(array $data)
    {
        return [
            'email' => filter_var($data['email'], FILTER_VALIDATE_EMAIL)          
        ];
    }
}
