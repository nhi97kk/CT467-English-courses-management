<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\Time;

class TimeController extends Controller
{
    public function __construct()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        }

        parent::__construct();
    }

    public function index(){
        $times = Time::all();
        $this->sendPage('/times/index',['times'=>$times]);
    }

    public function create()
    {
        $this->sendPage('times/create', [
            'errors' => session_get_once('errors'),
            'old' => $this->getSavedFormValues()
        ]);
    }

    public function store()
    {
        $data = $this->filterContactData($_POST);
        $model_errors = time::validate($data);
        if (empty($model_errors)) {
            $time = new time();
            $time->fill($data);
            // $time->time()->associate(Guard::time());
            $time->save();
            redirect('/dashboard/time');
        }
        // Lưu các giá trị của form vào $_SESSION['form']
        $this->saveFormValues($_POST);
        // Lưu các thông báo lỗi vào $_SESSION['errors']
        redirect('/time/add', ['errors' => $model_errors]);
    }

    protected function filterContactData(array $data)
    {
        return [
            'name' => $data['name'] ?? '',
            // 'phone' => preg_replace('/\D+/', '', $data['phone']),
            'start' => $data['start'] ?? '',
            'end' => $data['end'] ?? ''
        ];
    }

    public function edit($timeId)
    {
        $time = Time::findOrFail($timeId);

        $form_values = $this->getSavedFormValues();
        $data = [
            'errors' => session_get_once('errors'),
            'time' => (!empty($form_values)) ?
                array_merge($form_values, ['id' => $time->id]) :
                $time->toArray()

        ];
        $this->sendPage('times/edit', $data);
    }

    public function update($timeId)
    {
        $time = Time::findOrFail($timeId);
        if (!$time) {
            $this->sendNotFound();
        }
        $data = $this->filterContactData($_POST);
        $model_errors = time::validate($data);
        if (empty($model_errors)) {
            $time->fill($data);
            $time->save();
            redirect('/dashboard/time');
        }
        $this->saveFormValues($_POST);
        redirect('/dashboard/time/edit/' . $timeId, [
            'errors' => $model_errors
        ]);
    }

    public function destroy($timeId)
    {
        $time = Time::findOrFail($timeId);
        if (!$time) {
            $this->sendNotFound();
        }
        $time->delete();
        redirect('/dashboard/time');
    }
    
}