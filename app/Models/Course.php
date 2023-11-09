<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = ['name', 'desc', 'teacher_id'];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public static function validate(array $data)
    {
        $errors = [];
        if (!$data['name']) {
            $errors['name'] = 'Name is required.';
        }
        // $validPhone = preg_match(
        //     '/^(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b$/',
        //     $data['phone']
        // );
        // if (!$validPhone) {
        //     $errors['phone'] = 'Invalid phone number.';
        // }
        if (strlen($data['desc']) > 500) {
            $errors['desc'] = 'Desc must be at most 500 characters.';
        }
        return $errors;
    }
}