<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $fillable = ['name', 'email', 'password','role'];

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

    public static function validateEdit(array $data) 
    {
        $errors = [];

        if (!$data['email']) {
            $errors['email'] = 'Invalid email.';
        }

        if (!$data['name']) {
            $errors['name'] = 'Name is required.';
        }

        return $errors;
    }
}
