<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {   // id 1
        $message = new Message();
        $message->sender_id = 1;
        $message->receiver_id = 2;
        $message->detail = "เรียกพบที่ทำงานเย็นนี้";
        $message->save();

        // id 2
        $message = new Message();
        $message->sender_id = 1;
        $message->receiver_id = 2;
        $message->detail = "โปรดเร่งงานให้เสร็จอย่างเร็วที่สุด";
        $message->save();

        // id 3
        $message = new Message();
        $message->sender_id = 1;
        $message->receiver_id = 3;
        $message->detail = "ที่นัดปรึกษามา วันนั้นไม่ว่าง โปรดจองมาในวันจันทร์";
        $message->save();

        
    }
}
