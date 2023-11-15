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

    if (empty($data['name'])) {
        $errors['name'] = 'Invalid time name.';
    }

    if (empty($data['day'])) {
        $errors['day'] = 'Invalid day.';
    } elseif (!in_array(strtolower($data['day']), ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'])) {
        $errors['day'] = 'Invalid day of the week.';
    }

    if (empty($data['start'])) {
        $errors['start'] = 'Time start is required.';
    } elseif (!preg_match('/^([01]\d|2[0-3]):([0-5]\d):([0-5]\d)$/', $data['start'])) {
        $errors['start'] = 'Invalid start time format. Please use the format HH:MM.';
    }
    
    if (empty($data['end'])) {
        $errors['end'] = 'Time end is required.';
    } elseif (!preg_match('/^([01]\d|2[0-3]):([0-5]\d):([0-5]\d)$/', $data['end'])) {
        $errors['end'] = 'Invalid end time format. Please use the format HH:MM.';
    }

    if (!empty($data['start']) && !empty($data['end'])) {
        $startTimestamp = strtotime($data['start']);
        $endTimestamp = strtotime($data['end']);
    
        if ($endTimestamp <= $startTimestamp) {
            $errors['end'] = 'End time must be after start time.';
        }
    }
    // Check for existing records with the same day and start time
    $existingRecord = self::where('day', $data['day'])
        ->where('start', $data['start'])
        ->first();
    if ($existingRecord) {
        $errors['start'] = 'A record with the same day and start time already exists.';
        $errors['day'] = 'A record with the same day and start time already exists.';
    }

    return $errors;
} 

public static function validateEdit(array $data,$oldday, $oldstart)
{
    $errors = [];

    if (empty($data['name'])) {
        $errors['name'] = 'Invalid time name.';
    }

    if (empty($data['day'])) {
        $errors['day'] = 'Invalid day.';
    } elseif (!in_array(strtolower($data['day']), ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'])) {
        $errors['day'] = 'Invalid day of the week.';
    }

    if (empty($data['start'])) {
        $errors['start'] = 'Time start is required.';
    } elseif ( !preg_match('/^([01]\d|2[0-3]):([0-5]\d):([0-5]\d)$/', $data['start'])) {
        $errors['start'] = 'Invalid start time format. Please use the format HH:MM.';
    }
    
    if (empty($data['end'])) {
        $errors['end'] = 'Time end is required.';
    } elseif (!preg_match('/^([01]\d|2[0-3]):([0-5]\d):([0-5]\d)$/', $data['end'])) {
        $errors['end'] = 'Invalid end time format. Please use the format HH:MM.';
    }

    if (!empty($data['start']) && !empty($data['end'])) {
        $startTimestamp = strtotime($data['start']);
        $endTimestamp = strtotime($data['end']);
    
        if ($endTimestamp <= $startTimestamp) {
            $errors['end'] = 'End time must be after start time.';
        }
    }
    // Check for existing records with the same day and start time
    if(!(strtolower($data['day'])==strtolower($oldday) && $data['start']==$oldstart)){
        $existingRecord = self::where('day', $data['day'])
        ->where('start', $data['start'])
        ->first();
    if ($existingRecord) {
        $errors['start'] = 'A record with the same day and start time already exists.';
        $errors['day'] = 'A record with the same day and start time already exists.';
    }
    }
    
    

    return $errors;
} 
}
