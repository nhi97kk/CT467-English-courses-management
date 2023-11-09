<?php

namespace App;

use App\Models\Teacher;

class SessionGuard
{
    protected static $teacher;

    public static function login(Teacher $teacher, array $credentials)
    {
        $verified = password_verify($credentials['password'], $teacher->password);
        
        if ($verified) {
            $_SESSION['teacher_id'] = $teacher->id;
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
    
}
