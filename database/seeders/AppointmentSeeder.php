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
        $appointment->title = 'นัดคุยปรึกษาเรื่องการทุจริต';
        $appointment->detail = 'อยากทราบรายละเอียดเพิ่มเติมเพื่อนำไปตัดสินใจ';
        $appointment->booking_date = "2021-11-04";
        $appointment->booking_time = '15:00';
        $appointment->status = 'Waiting';
        $appointment->save();

        // id 2
        $appointment = new Appointment();
        $appointment->sender_id = 3;
        $appointment->receiver_id = 1;
        $appointment->title = 'นัดคุยหัวข้อที่ได้รับมา';
        $appointment->detail = 'อยากทราบรายละเอียดเพิ่มเติมเพื่อนำไปตัดสินใจ';
        $appointment->booking_date = "2021-11-04";
        $appointment->booking_time = '16:00';
        $appointment->status = 'Confirmed';
        $appointment->save();

        // id 3

        $appointment = new Appointment();
        $appointment->sender_id = 2;
        $appointment->receiver_id = 1;
        $appointment->title = 'ปรึกษาการรับเรื่องร้องเรียนเพิ่ม';
        $appointment->detail = 'อยากทราบรายละเอียดเพิ่มเติมเพื่อนำไปตัดสินใจ';
        $appointment->booking_date = "2021-11-02";
        $appointment->booking_time = '08:00';
        $appointment->status = 'Confirmed';
        $appointment->save();

        // id 4
        $appointment = new Appointment();
        $appointment->sender_id = 4;
        $appointment->receiver_id = 1;
        $appointment->title = 'ลดจำนวนงานที่ได้รับ';
        $appointment->detail = 'อยากทราบรายละเอียดเพิ่มเติมเพื่อนำไปตัดสินใจ';
        $appointment->booking_date = "2021-11-01";
        $appointment->booking_time = '10:00';
        $appointment->status = 'Confirmed';
        $appointment->save();

        // id 5
        $appointment = new Appointment();
        $appointment->sender_id = 2;
        $appointment->receiver_id = 1;
        $appointment->title = 'มีปัญหาเกี่ยวกับงาน';
        $appointment->detail = 'อยากทราบรายละเอียดเพิ่มเติมเพื่อนำไปตัดสินใจ';
        $appointment->booking_date = "2021-11-05";
        $appointment->booking_time = '12:00';
        $appointment->status = 'Confirmed';
        $appointment->save();

        // id 5
        $appointment = new Appointment();
        $appointment->sender_id = 3;
        $appointment->receiver_id = 1;
        $appointment->title = 'ของดรับงานร้องเรียนชั่วคราว';
        $appointment->detail = 'อยากทราบรายละเอียดเพิ่มเติมเพื่อนำไปตัดสินใจ';
        $appointment->booking_date = "2021-11-02";
        $appointment->booking_time = '11:00';
        $appointment->status = 'Confirmed';
        $appointment->save();
    }
}
