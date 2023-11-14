<?php

namespace App\Controllers\Teacher;

use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Result;

class ManageController extends Controller{
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
        $this->sendPage('page/teachers/students/index', [
            'courses' => Guard::teacher()->courses
        ]);
    }

    public function manage($courseId)
    {
        $course = Course::findOrFail($courseId);
        $students = Student::all();

        // Kiểm tra xem sinh viên đã tồn tại trong khóa học chưa
        $existingStudents = Result::where('course_id', $courseId)->pluck('student_id')->toArray();

        $filteredStudents = $students->reject(function ($student) use ($existingStudents) {
            return in_array($student->id, $existingStudents);
        });

        $data = ['course' => $course, 'students' => $filteredStudents];

        $this->sendPage('page/teachers/students/add', $data);
    }

    public function add()
    {
        $courseId = $_POST['courseId'];
        $studentId = $_POST['studentId'];

        // Kiểm tra xem sinh viên và khóa học có tồn tại hay không
        $student = Student::find($studentId);
        $course = Course::find($courseId);
        // if (!$student || !$course) {
        //     echo "Invalid student or course";
        //     return;
        // }
        // Thêm một mảng giá trị [student_id, course_id] vào bảng result
        $result = new Result();
        $result->student_id = $studentId;
        $result->course_id = $courseId;
        $result->save();

        // echo "Student added successfully to the course";
        redirect('/teacher/manage/' . $courseId);
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

        $this->sendPage('page/teachers/students/view', $data);
    }

    public function destroy(){
        $courseId = $_POST['courseId'];
        $studentId = $_POST['studentId'];

        Result::where('course_id', $courseId)
         ->where('student_id', $studentId)
         ->delete();

         redirect('/teacher/view/' . $courseId);
    }
}