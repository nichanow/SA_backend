<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AppointmentController extends Controller
{

    public function getCalender(){
        $calender = array();
        $appointments = Appointment::all();
        foreach($appointments as $papa){
            $time = $papa['booking_time'];
            $arrays = explode(":",$time);
            $arrays[0] = $arrays[0] + 1;

            array_push($calender, [
                'name' => $papa['title'],
                'start' => $papa['booking_date'].' '.$papa['booking_time'],
                'end' => $papa['booking_date'].' '.$arrays[0].':00',
                'date' => $papa['booking_date'],
                'time' => $papa['booking_time'],
                'endtime' => $arrays[0].':00',
                'sender' => $papa->sender,
                'color' => 'grey darken-1'
            ]);
        }
        return $calender;
    }

    public function getAllAppointments()
    {
        $appointment = Appointment::all();

        foreach ($appointment as $papa){
            $papa['name'] = $papa->sender->name;
        }

        return $appointment;
    }

    public function getAppointment($id)
    {
        $appointment = Appointment::find($id);
        return $appointment;
    }

    public function getUserAppointments(Request $request){
        $token = $request->header('Authorization');
        $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
    
        $appointment = Appointment::where('sender_id', $credentials->sub)->get();
        // foreach ($appointment as $papa) {
        //     $papa['sender'] = $papa->sender;
        // }

        return $appointment;  
    }

    public function updateStatus(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();

            return [
                "status" => "error",
                "error" => $errors
            ];
        } else {
            $appointment->status = $request->status;

            if ($appointment->save()) {
                $appointment['name']=$appointment->sender->name;
                return $appointment;
            } else {
                return
                    [
                        "status" => "error",
                        "error" => "เปลี่ยนสถานะไม่ได้"
                    ];
            }
        }
    }

    public function createAppointment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'detail' => 'required',
            'booking_date' => 'required',
            'booking_time' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return [
                "status" => "error",
                "error" => $errors
            ];
        } else {
            $token = $request->header('Authorization');
            $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
            $user = User::find($credentials->sub);

            $appointment = new Appointment();
            $appointment->sender_id = $user->id;
            $appointment->receiver_id = User::where('role','ADMIN')->first()->id;
            $appointment->title = $request->title;
            $appointment->detail = $request->detail;
            $appointment->booking_time = $request->booking_time;
            $appointment->booking_date = $request->booking_date;

            if ($appointment->save()) {
                return $appointment;
            } else {
                return
                    [
                        "status" => "error",
                        "error" => "สร้างไม่ได้"
                    ];
            }
        }
    }
    public function getTime($date){
        $appointments = Appointment::where('booking_date',$date)->get();
        $times = array(
            '08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00'
        );
        foreach( $appointments as $appointment ){
            if(in_array($appointment['booking_time'],$times)){
                $index = array_search($appointment['booking_time'],$times);
                array_splice($times, $index ,1);
            }
        }
        return $times;
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        if ($appointment->delete()) {

            return [
                "status" => "success"
            ];
        } else {
            return [
                "status" => "error",
                "error" => "ลบไม่ได้"
            ];
        }
    }
}
