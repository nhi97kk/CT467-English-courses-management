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
        } elseif (static::where('num', $data['num'])->count() > 0) {
            $errors['num'] = 'Room already in use.';
        }


        if (!$data['notes']) {
            $errors['notes'] = 'Notes is required.';
        }

        return $errors;
    } 


}
