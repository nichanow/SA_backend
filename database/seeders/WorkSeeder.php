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
        $work->title = "ตรวจสอบการทุจริตในหลวงเอาภาษีประชาชนไปใช้";
        $work->accused_name = "10";
        $work->user_id =3;
        $work->complainer_name = "คุณแบงค์กี้ ไกรกาญจน์";
        $work->detail = "เห็นว่าไปอยู่เยอรมันนาน แล้วมันเอาเงินที่ไหนใช้ถ้าไม่ได้เอามาจากภาษีประชาชน";
        $work->type = "ร้องเรียนเกี่ยวกับการตรวจสอบ";
        $work->status = "เห็นชอบ";
        $work->province = "นนทบุรี";
        $work->file = "file_upload/Test_1.docx";
        $work->save();

        // id 2
        $work = new Work();
        $work->title = "ตรวจสอบการทุจริต";
        $work->user_id = 2;
        $work->accused_name = "ร้านโชห่วยข้างบ้าน";
        $work->complainer_name = "พี่หนูรัตน์";
        $work->detail = "คิดว่ามีการฟอกเงินเกิดขึ้นจึงเรียนแจ้งมา";
        $work->type = "ร้องเรียนเกี่ยวกับการตรวจสอบ";
        $work->status = "เห็นชอบ";
        $work->province = "นนทบุรี";
        $work->file = "file_upload/Test_2.pdf";
   
        $work->save();

        // id 3
        $work = new Work();
        $work->title = "ตรวจสอบการฟอกเงิน";
        $work->accused_name = "หน่วยงานตำรวจ จังหวัดปทุมธานี";
        $work->user_id = 3;
        $work->complainer_name = "คุณสมโชค";
        $work->detail = "เอาเงินไปซื้อปืน ซื้อกระสุน ซื้อแก๊สน้ำตาได้จึงเกิดข้อสงสัย";
        $work->type = "ร้องเรียนเกี่ยวกับการตรวจสอบ";
        $work->status = "ไม่เห็นชอบ";
        $work->province = "กำแพงเพชร";
        $work->save();

        // id 4
        $work = new Work();
        $work->title = "ตรวจสอบการลักลอกขนเงินข้ามจังหวัด";
        $work->accused_name = "หน่วยงานการไฟฟ้าแห่งประเทศไทย";
        $work->complainer_name = "ปุณยาพร";
        $work->detail = "เห็นมีการขนเงินอย่างมีพิรุธตอนกลางคืน";
        $work->type = "ร้องเรียนเกี่ยวกับการตรวจสอบ";
        $work->province = "ปทุมธานี";
        $work->status = "รอดำเนินการ";
        $work->file = "file_upload/Test_3.pdf";
        $work->save();

        // id 5
        $work = new Work();
        $work->title = "ตรวจสอบเงินแผ่นดินของธนาคาร";
        $work->accused_name = "ธนาคารแห่งประเทศไทย";
        $work->complainer_name = "ธิดาพร ชาวคูเวียง";
        $work->detail = "คิดว่าเอาเงินไปให้ ร.10 แน่";
        $work->type = "ร้องเรียนเกี่ยวกับการตรวจสอบ";
        $work->province = "นนทบุรี";
        $work->status = "รอดำเนินการ";
        $work->file = "file_upload/Test_4.pdf";
        $work->save();
    }
}
