<?php

namespace App\Controllers\Teacher;

use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Result;

class ResultController extends Controller{
    public function __construct()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        }elseif(Guard::teacher()->role === 1) {
            redirect('/dashboard');}

        parent::__construct();
    }
    public function index()
    {
        $this->sendPage('page/teachers/results/index', [
            'courses' => Guard::teacher()->courses
        ]);
    }

    public function result($courseId)
    {
        $course = Course::findOrFail($courseId);
        $students = Student::all();

        $studentsJoin = Result::where('course_id', $courseId)->get();
        // Lấy danh sách sinh viên tương ứng
        $studentIds = $studentsJoin->pluck('student_id')->toArray();
        $students = Student::whereIn('id', $studentIds)->get();

        $data = ['course' => $course, 'students' => $students];

        $this->sendPage('page/teachers/results/add', $data);
    }

    public function update()
{
    $courseId = $_POST['courseId'];
    $studentId = $_POST['studentId'];
    $resultUD = $_POST['result'];

    // Kiểm tra xem sinh viên và khóa học có tồn tại hay không
    $student = Student::find($studentId);
    $course = Course::find($courseId);
    if (!$student || !$course) {
        // Xử lý lỗi khi không tìm thấy sinh viên hoặc khóa học
        // Ví dụ: throw new Exception('Invalid student or course');
    }

    // Tìm và cập nhật bản ghi trong bảng Result
    $result = Result::where('course_id', $courseId)
                    ->where('student_id', $studentId)
                    ->first();
    $errors = Result::validate($resultUD);
    if (empty($errors)) {
        $result->result = $resultUD;
        $result->save();
        redirect('/teacher/result/' . $courseId);
    }

    redirect('/teacher/result/' . $courseId,['errors' => $errors]);
}

    public function view($courseId)
    {
        $course = Course::findOrFail($courseId);
        // Lấy danh sách sinh viên đã tham gia khóa học
        $studentsJoin = Result::where('course_id', $courseId)->get();
        // Lấy danh sách sinh viên tương ứng
        $studentIds = $studentsJoin->pluck('student_id')->toArray();
        $students = Student::whereIn('id', $studentIds)->get();

        $data = [
            'course' => $course,
            'students' => $students
        ];

        $this->sendPage('page/teachers/results/view', $data);
    }

}