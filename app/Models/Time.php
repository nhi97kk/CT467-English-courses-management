<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = 'times';
    protected $fillable = ['name','day', 'start','end'];

    public static function validate(array $data) 
    {
        $errors = [];

        if (!$data['name']) {
            $errors['name'] = 'Invalid room number.';
        } 

        if (!$data['day']) {
            $errors['day'] = 'Invalid day.';
        }

        if (!$data['start']) {
            $errors['start'] = 'Time start is required.';
        }

        if (!$data['end']) {
            $errors['end'] = 'Time end is required.';
        }

        return $errors;
    } 


}
