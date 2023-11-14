<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\Time;
use App\Models\Schedule;
use App\Models\Teacher;
use App\Models\Room;

class ScheduleController extends Controller
{
    public function __construct()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        }else if(Guard::teacher()->role === 0){
            redirect('/');
        }

        parent::__construct();
    }

    public function index(){
        $schedules = Schedule::all();
        $this->sendPage('/schedules/index',['schedules'=>$schedules]);
    }

    public function create(){
        $this->sendPage('schedules/create', [
            'errors' => session_get_once('errors'),
            'old' => $this->getSavedFormValues()
        ]);
    }

    public function store()
    {
        $data = $this->filterContactData($_POST);
        $model_errors = schedule::validate($data);
        if (empty($model_errors)) {
            $existingSchedule = Schedule::where('teacher_id', $data['teacher_id'])->where('room_id', $data['room_id'])->first();
            if (empty($existingSchedule)) {
                $existingSchedule1 = Schedule::where('teacher_id', $data['teacher_id'])->where('time_id', $data['time_id'])->first();
                
            } else if($existingSchedule){
                $existingSchedule1 = Schedule::where('room_id', $data['room_id'])->where('time_id', $data['time_id'])->first();
            }

            if(!$existingSchedule1){
                $schedule = new schedule();
                $schedule->fill($data);
                $schedule->save();
                redirect('/dashboard/schedule');
            }
                
        }
        // Lưu các giá trị của form vào $_SESSION['form']
        $this->saveFormValues($_POST);
        // Lưu các thông báo lỗi vào $_SESSION['errors']
        redirect('/dashboard/schedule/create', ['errors' => $model_errors]);
    }

    protected function filterContactData(array $data)
    {
        return [
            'teacher_id' => $data['teacher_id'] ?? '',
            'room_id' => $data['room_id'] ??'',
            // 'phone' => preg_replace('/\D+/', '', $data['phone']),
            'time_id' => $data['time_id'] ?? ''
        ];
    }

    public function edit($scheduleId){
        $schedule = Schedule::find($scheduleId);

        $form_values = $this->getSavedFormValues();
        $data = [
            'errors' => session_get_once('errors'),
            'schedule' => (!empty($form_values)) ?
            array_merge($form_values, ['id' => $schedule->id]) :
            $schedule->toArray()
            ];
        
            $this->sendPage('schedules/edit', $data);
    }

    public function update($scheduleId)
    {
        $schedule = schedule::findOrFail($scheduleId);
        if (!$schedule) {
            $this->sendNotFound();
        }
        $data = $this->filterContactData($_POST);
        $model_errors = schedule::validate($data);
        if (empty($model_errors)) {
            $existingSchedule = Schedule::where('teacher_id', $data['teacher_id'])->where('room_id', $data['room_id'])->first();
            if (empty($existingSchedule)) {
                $existingSchedule1 = Schedule::where('teacher_id', $data['teacher_id'])->where('time_id', $data['time_id'])->first();
                
            } else if($existingSchedule){
                $existingSchedule1 = Schedule::where('room_id', $data['room_id'])->where('time_id', $data['time_id'])->first();
            }

            if(!$existingSchedule1){
                $schedule->fill($data);
                $schedule->save();
                redirect('/dashboard/schedule');
            }
                
        }
        $this->saveFormValues($_POST);
        redirect('/dashboard/schedule/edit/' . $scheduleId, [
            'errors' => $model_errors
        ]);
    }

    public function destroy($scheduleId)
    {
        $schedule = schedule::findOrFail($scheduleId);
        if (!$schedule) {
            $this->sendNotFound();
        }
        $schedule->delete();
        redirect('/dashboard/schedule');
    }    
}