<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\SessionGuard as Guard;
use App\Models\Room;

class RoomController extends Controller
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
        $rooms = Room::all();
        $this->sendPage('/rooms/index',['rooms'=>$rooms]);
    }

    public function create()
    {
        $this->sendPage('rooms/create', [
            'errors' => session_get_once('errors'),
            'old' => $this->getSavedFormValues()
        ]);
    }

    public function store()
    {
        $data = $this->filterContactData($_POST);
        $model_errors = Room::validate($data);
        if (empty($model_errors)) {
            $room = new Room();
            $room->fill($data);
            // $room->room()->associate(Guard::room());
            $room->save();
            redirect('/dashboard/room');
        }
        // Lưu các giá trị của form vào $_SESSION['form']
        $this->saveFormValues($_POST);
        // Lưu các thông báo lỗi vào $_SESSION['errors']
        redirect('/room/add', ['errors' => $model_errors]);
    }

    protected function filterContactData(array $data)
    {
        return [
            'num' => $data['num'] ?? '',
            // 'phone' => preg_replace('/\D+/', '', $data['phone']),
            'notes' => $data['notes'] ?? ''
        ];
    }

    public function edit($roomId)
    {
        $room = Room::findOrFail($roomId);

        $form_values = $this->getSavedFormValues();
        $data = [
            'errors' => session_get_once('errors'),
            'room' => (!empty($form_values)) ?
                array_merge($form_values, ['id' => $room->id]) :
                $room->toArray()

        ];
        $this->sendPage('rooms/edit', $data);
    }

    public function update($roomId)
    {
        $room = Room::findOrFail($roomId);
        if (!$room) {
            $this->sendNotFound();
        }
        $data = $this->filterContactData($_POST);
        $model_errors = room::validate($data);
        if (empty($model_errors)) {
            $room->fill($data);
            $room->save();
            redirect('/dashboard/room');
        }
        $this->saveFormValues($_POST);
        redirect('/dashboard/room/edit/' . $roomId, [
            'errors' => $model_errors
        ]);
    }

    public function destroy($roomId)
    {
        $room = room::findOrFail($roomId);
        if (!$room) {
            $this->sendNotFound();
        }
        $room->delete();
        redirect('/dashboard/room');
    }
}