<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AppointmentController extends Controller
{
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
