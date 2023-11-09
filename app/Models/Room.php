<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    protected $fillable = ['num', 'notes'];

    public static function validate(array $data) 
    {
        $errors = [];

        if (!$data['num']) {
            $errors['num'] = 'Invalid room number.';
        } 

        if (!$data['notes']) {
            $errors['notes'] = 'Notes is required.';
        }

        return $errors;
    } 


}
