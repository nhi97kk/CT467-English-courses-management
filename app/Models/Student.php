<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = ['name', 'email','phone'];

    public static function validate(array $data){
        if (!$data['name']) {
            $errors['name'] = 'Name is required.';
        }
        $validPhone = preg_match(
            '/^(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b$/',
            $data['phone']
        );
        if (!$validPhone) {
            $errors['phone'] = 'Invalid phone number.';
        }
        if (!$data['email']) {
            $errors['email'] = 'Email is required.';
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

        if (!$data['phone']) {
            $errors['phone'] = 'Phone is required.';
        }

        return $errors;
    }
}