<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Summary;

class SummarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // id 1
        $summary = new Summary();
        $summary->work_id = 1;
        $summary->summary_detail = "จากการตรวจสอบมาผลเป็นอย่างที่ผู้ร้องทุกข์ได้แจ้งมาและจะทำการส่งเรื่องไปที่สำนักงานใหญ่อีกครั้ง";
        $summary->conclusion = "เห็นชอบ";
        $summary->pdf_file = "";
        $summary->save();

        // id 2
        $summary = new Summary();
        $summary->work_id = 2;
        $summary->summary_detail = "มีการแนบไฟล์ข้อมูลไปให้ด้วย จากการทำสรุปการทุจริตเรื่องนี้";
        $summary->conclusion = "เห็นชอบ";
        $summary->pdf_file = "";
        $summary->save();

        // id 3
        $summary = new Summary();
        $summary->work_id = 3;
        $summary->summary_detail = "จากการที่ไปตรวจสอบและลงพื้นที่มา ทำให้มีผลให้ทราบคือไม่ได้มีการทุจริตอย่างทีมีแจ้งมา";
        $summary->conclusion = "ไม่เห็นชอบ";
        $summary->pdf_file = "";
        $summary->save();
    }
}
