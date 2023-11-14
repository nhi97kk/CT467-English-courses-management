<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $fillable = ['teacher_id', 'room_id', 'time_id'];

    public static function validate(array $data)
{
    $errors = [];

    if (!isset($data['teacher_id']) || empty($data['teacher_id'])) {
        $errors['teacher'] = 'Teacher ID is required.';
    }

    if (!isset($data['room_id']) || empty($data['room_id'])) {
        $errors['room'] = 'Room ID is required.';
    }

    if (!isset($data['time_id']) || empty($data['time_id'])) {
        $errors['time'] = 'Time ID is required.';
    }

    $existingSchedule = Schedule::where('teacher_id', $data['teacher_id'])->where('room_id', $data['room_id'])->first();

            if (empty($existingSchedule)) {
                $existingSchedule1 = Schedule::where('teacher_id', $data['teacher_id'])->where('time_id', $data['time_id'])->first();
                
            } else if($existingSchedule){
                $existingSchedule1 = Schedule::where('room_id', $data['room_id'])->where('time_id', $data['time_id'])->first();
            }

            if ($existingSchedule1) {
                $errors['note'] = 'Schedule with the provided room and time already exists.';
            }
    
    

    return $errors;
}

}