<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = ['name', 'email','phone','address'];

    public function result() {
        return $this->hasMany(Result::class);
        }

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
        }elseif (static::where('phone', $data['phone'])->count() > 0) {
            $errors['phone'] = 'Phone already in use.';
        }
        if (!$data['email']) {
            $errors['email'] = 'Invalid email.';
        } elseif (static::where('email', $data['email'])->count() > 0) {
            $errors['email'] = 'Email already in use.';
        }
        if (!$data['address']) {
            $errors['address'] = 'address is required.';
        }

        return $errors;
    }

    public static function validateEdit(array $data) 
    {
        $errors = [];

        if (!$data['email']) {
            $errors['email'] = 'Invalid email.';
        }elseif (static::where('email', $data['email'])->count() > 0) {
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
        }elseif (static::where('phone', $data['phone'])->count() > 0) {
            $errors['phone'] = 'Phone already in use.';
        }

        if (!$data['address']) {
            $errors['address'] = 'Address is required.';
        }

        return $errors;
    }
}