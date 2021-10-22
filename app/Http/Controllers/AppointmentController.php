<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AppointmentController extends Controller
{
    public function getAllAppointments()
    {
        $appointment = Appointment::all();

        foreach ($appointment as $papa) {
            $papa['user'] = $papa->user();
        }
        return $appointment;
    }

    public function createAppointment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
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
            $appointment = new Appointment();
            $appointment->user_id = $request->user_id;
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
