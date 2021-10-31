<?php

namespace Database\Seeders;

use App\Models\Work;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // id 1
        $work = new Work();
        $work->title = "ตรวจสอบการทุจริต";
        $work->accused_name = "หน่วยงานดับเพลิง";
        $work->user_id =3;
        $work->complainer_name = "ไชยเดช";
        $work->detail = "รายละเอียดเบื้องต้น";
        $work->type = "ร้องเรียนเกี่ยวกับการตรวจสอบ";
        $work->status = "เห็นชอบ";
        $work->province = "นนทบุรี";
        $work->file = "file_upload/Test_1.docx";
        $work->save();

        // id 2
        $work = new Work();
        $work->title = "ตรวจสอบการทุจริตภายในองค์กร";
        $work->user_id = 2;
        $work->accused_name = "หน่วยงานการไฟฟ้า";
        $work->complainer_name = "อภิสิทธิ์";
        $work->detail = "ต้องมีการลงพื้นที่เพื่อเข้าไปตรวจสอบ";
        $work->type = "ร้องเรียนเกี่ยวกับการตรวจสอบ";
        $work->status = "เห็นชอบ";
        $work->province = "นนทบุรี";
        $work->file = "file_upload/Test_2.pdf";
   
        $work->save();

        // id 3
        $work = new Work();
        $work->title = "การทุจริตภายในหน่วยงานโรงเรียน";
        $work->accused_name = "โรงเรียนสมยอด";
        $work->user_id = 3;
        $work->complainer_name = "สมหญิง เก่งมาก";
        $work->detail = "รายละเอียดเบื้องต้น";
        $work->type = "ร้องเรียนเกี่ยวกับการตรวจสอบ";
        $work->status = "ไม่เห็นชอบ";
        $work->province = "กำแพงเพชร";
        $work->save();

        // id 4
        $work = new Work();
        $work->title = "การทุจริตภายในโรงงาน";
        $work->accused_name = "โรงงานผลิตยาแก้ไอ";
        $work->complainer_name = "ปุณยาพร";
        $work->detail = "รายละเอียดเบื้องต้น";
        $work->type = "ร้องเรียนเกี่ยวกับการตรวจสอบ";
        $work->province = "ปทุมธานี";
        $work->status = "รอดำเนินการ";
        $work->file = "file_upload/Test_3.pdf";
        $work->save();

        // id 5
        $work = new Work();
        $work->title = "ร้องเรียนการทุจริตเงินส่วนกลาง";
        $work->accused_name = "ธนาคารแห่งประเทศไทย";
        $work->complainer_name = "ธิดาพร ชาวคูเวียง";
        $work->detail = "รายละเอียดเบื้องต้น";
        $work->type = "ร้องเรียนเกี่ยวกับการตรวจสอบ";
        $work->province = "นนทบุรี";
        $work->status = "รอดำเนินการ";
        $work->file = "file_upload/Test_4.pdf";
        $work->save();
    }
}
