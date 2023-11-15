<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = ['name', 'desc','start','end', 'teacher_id'];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function result() {
        return $this->hasMany(Result::class);
        }
    public static function validate(array $data)
    {
        $errors = [];
        if (!$data['name']) {
            $errors['name'] = 'Name is required.';
        }
        if (!$data['start']) {
            $errors['start'] = 'Vui lòng nhập ngày bắt đầu.';
        } elseif (strtotime($data['start']) < strtotime(date('Y-m-d'))) {
            $errors['start'] = 'Ngày bắt đầu phải lớn hơn hoặc bằng ngày hôm nay.';
        }
        
        if (!$data['end']) {
            $errors['end'] = 'Vui lòng nhập ngày kết thúc.';
        } elseif ($data['start'] && strtotime($data['end']) <= strtotime($data['start'])) {
            $errors['end'] = 'Ngày kết thúc phải lớn hơn ngày bắt đầu.';
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