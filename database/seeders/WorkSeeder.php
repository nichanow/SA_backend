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
        // // id 1
        // $work = new Work();
        // $work->title = "ตรวจสอบการทุจริตในหลวงเอาภาษีประชาชนไปใช้";
        // $work->accused_name = "10";
        // $work->user_id =3;
        // $work->complainer_name = "คุณแบงค์กี้ ไกรกาญจน์";
        // $work->detail = "เห็นว่าไปอยู่เยอรมันนาน แล้วมันเอาเงินที่ไหนใช้ถ้าไม่ได้เอามาจากภาษีประชาชน";
        // $work->type = "ร้องเรียนเกี่ยวกับการตรวจสอบ";
        // $work->status = "เห็นชอบ";
        // $work->province = "ปทุมธานี";
        // $work->pdf_file = "sdfdsffdsdsdsfdfs";
        // $work->save();

        // // id 2
        // $work = new Work();
        // $work->title = "2";
        // $work->user_id =2;
        // $work->accused_name = "ร้านโชห่วยข้างบ้าน";
        // $work->complainer_name = "พี่หนูรัตน์";
        // $work->detail = "ฟอกเงินแน่";
        // $work->type = "ร้องเรียนเกี่ยวกับการตรวจสอบ";
        // $work->status = "เห็นชอบ";
        // $work->province = "นนทบุรี";
        // $work->pdf_file = "nsdfsddfssfdfsds";
        // $work->save();

        // // id 3
        // $work = new Work();

        // $work->title = "3";
        // $work->accused_name = "10";
        // $work->user_id =2;
        // $work->complainer_name = "คุณแบงค์กี้ ไกรกาญจน์";
        // $work->detail = "เห็นว่าไปอยู่เยอรมันนาน แล้วมันเอาเงินที่ไหนใช้ถ้าไม่ได้เอามาจากภาษีประชาชน";
        // $work->type = "ร้องเรียนเกี่ยวกับการตรวจสอบ";
        // $work->status = "ไม่เห็นชอบ";
        // $work->province = "ปทุมธานี";
     
        // $work->save();

        // id 4
        $work = new Work();
        $work->title = "4";
           $work->user_id =2;
        $work->accused_name = "10";
        $work->complainer_name = "คุณแบงค์กี้ ไกรกาญจน์";
        $work->detail = "เห็นว่าไปอยู่เยอรมันนาน แล้วมันเอาเงินที่ไหนใช้ถ้าไม่ได้เอามาจากภาษีประชาชน";
        $work->type = "ร้องเรียนเกี่ยวกับการตรวจสอบ";
        $work->province = "ปทุมธานี";
        $work->status = "รอดำเนินการ";

        $work->save();

        // id 5
        $work = new Work();
        $work->user_id =2;
        $work->title = "5";
        $work->accused_name = "10";
        $work->complainer_name = "คุณแบงค์กี้ ไกรกาญจน์";
        $work->detail = "เห็นว่าไปอยู่เยอรมันนาน แล้วมันเอาเงินที่ไหนใช้ถ้าไม่ได้เอามาจากภาษีประชาชน";
        $work->type = "ร้องเรียนเกี่ยวกับการตรวจสอบ";
        $work->province = "ปทุมธานี";
        $work->status = "รอดำเนินการ";
    
        $work->save();
    }
}
