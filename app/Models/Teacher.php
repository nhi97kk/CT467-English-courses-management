<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $fillable = ['name', 'email','major','exp','phone', 'password','role'];

    public function courses() {
        return $this->hasMany(Course::class);
        }
    public static function validate(array $data)
    {
        $errors = [];

        if (!$data['email']) {
            $errors['email'] = 'Invalid email.';
        } elseif (static::where('email', $data['email'])->count() > 0) {
            $errors['email'] = 'Email already in use.';
        }

        if (strlen($data['password']) < 6) {
            $errors['password'] = 'Password must be at least 6 characters.';
        } elseif ($data['password'] != $data['password_confirmation']) {
            $errors['password'] = 'Password confirmation does not match.';
        }
        $validPhone = preg_match(
            '/^(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b$/',
            $data['phone']
        );
        if (!$validPhone) {
            $errors['phone'] = 'Invalid phone number.';
        }elseif (static::where('phone', $data['phone'])->count() > 0) {
            $errors['phone'] = 'Phone already in use.';
        }
        if (!$data['major']) {
            $errors['major'] = 'Invalid major.';}

        if (!$data['exp']) {
            $errors['exp'] = 'Invalid Exp.';}
        return $errors;
    }

    public static function validateChange(array $data)
    {
        $errors = [];

        if (strlen($data['password']) < 6) {
            $errors['password'] = 'Password must be at least 6 characters.';
        } elseif ($data['password'] != $data['password_confirmation']) {
            $errors['password'] = 'Password confirmation does not match.';
        }

        return $errors;
    }

    public static function validateCreate(array $data) 
    {
        $errors = [];

        if (!$data['email']) {
            $errors['email'] = 'Invalid email.';
        } elseif (static::where('email', $data['email'])->count() > 0) {
            $errors['email'] = 'Email already in use.';
        }

        if (!$data['name']) {
            $errors['name'] = 'Name is required.';
        }

        return $errors;
    } 

    public static function validateEdit(array $data,$oldphone, $oldemail) 
    {
        $errors = [];

        if (!$data['email']) {
            $errors['email'] = 'Invalid email.';
        }elseif (!$oldemail && static::where('email', $data['email'])->count() > 0) {
            $errors['email'] = 'Email already in use.';
        }


        if (!$data['name']) {
            $errors['name'] = 'Name is required.';
        }
        $validPhone = preg_match(
            '/^(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b$/',
            $data['phone']
        );
        if (!$validPhone) {
            $errors['phone'] = 'Invalid phone number.';
        }elseif (!$oldphone && static::where('phone', $data['phone'])->count() > 0) {
            $errors['phone'] = 'Phone already in use.';
        }
        
        if (!$data['major']) {
            $errors['major'] = 'Invalid major.';}
            
        if (!$data['exp']) {
            $errors['exp'] = 'Invalid Exp.';}

        return $errors;
    }
}
