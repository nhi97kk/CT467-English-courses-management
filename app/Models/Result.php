<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';
    protected $fillable = ['student_id','course_id','result'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public static function validate( $data) 
    {
        $errors = [];

        if (!$data) {
            $errors = 'Invalid result.';
        } elseif ($data< 0 || $data> 10) {
            $errors = 'Invalid result.';
        }

        return $errors;
    }
}