<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Appointment;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // id 1
        $appointment = new Appointment();
        $appointment->sender_id = 2;
        $appointment->receiver_id = 1;
        $appointment->title = 'นัดคุยหัวข้อที่ได้รับมา';
        $appointment->detail = 'อยากทราบรายละเอียดเพิ่มเติมเพื่อนำไปตัดสินใจ';
        $appointment->booking_date = Carbon::now();
        $appointment->booking_time = '15.00';
        $appointment->status = 'Waiting';
        $appointment->save();

        // id 2
        // user_id = 0 = ยังไม่ได้แจกงาน
        $appointment = new Appointment();
        $appointment->sender_id = 3;
        $appointment->receiver_id = 1;
        $appointment->title = 'นัดคุยหัวข้อที่ได้รับมา';
        $appointment->detail = 'อยากทราบรายละเอียดเพิ่มเติมเพื่อนำไปตัดสินใจ';
        $appointment->booking_date = Carbon::now();
        $appointment->booking_time = '20.00';
        $appointment->status = 'Confirmed';
        $appointment->save();

    }
}
