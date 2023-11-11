<?php

namespace App;

use App\Models\Teacher;
use App\Models\Student;

class SessionGuard
{
    protected static $teacher;
    protected static $student;

    public static function login(Teacher $teacher, array $credentials)
    {
        $verified = password_verify($credentials['password'], $teacher->password);
        
        if ($verified) {
            $_SESSION['teacher_id'] = $teacher->id;
        }
        return $verified;
    }

    public static function loginStu(Student $student, array $credentials)
    {
        $verified = $credentials['email'] === $student->email;
        
        if ($verified) {
            $_SESSION['student_id'] = $student->id;
        }
        return $verified;
    }

    public static function teacher()
    {
        if (!static::$teacher && static::isUserLoggedIn()) {
            static::$teacher = Teacher::find($_SESSION['teacher_id']);
        }
        return static::$teacher;
    }

    public static function student()
    {
        if (!static::$student && static::isUserLoggedInStu()) {
            static::$student = Student::find($_SESSION['student_id']);
        }
        return static::$student;
    }

    public static function logout()
    {
        static::$teacher = null;
        session_unset();
        session_destroy();
    }

    public static function isUserLoggedIn()
    {
        return isset($_SESSION['teacher_id']);
    }

    //Admin sesion
    public static function logoutStu()
    {
        static::$student = null;
        session_unset();
        session_destroy();
    }

    public static function isUserLoggedInStu()
    {
        return isset($_SESSION['student_id']);
    }  
}
