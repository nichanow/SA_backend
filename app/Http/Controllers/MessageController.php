<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MessageController extends Controller
{
    public function getUserMessages(Request $request)
    {
        $token = $request->header('Authorization');
        $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
        $message = Message::where('receiver_id', $credentials->sub)->get();

        return $message;
    }

    public function createMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'receiver_id' => 'required',
            'detail' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return [
                "status" => "error",
                "error" => $errors
            ];
        } else {

            $message = new Message();
            $message->sender_id = User::where('role', 'ADMIN')->first()->id;
            $message->receiver_id = $request->receiver_id;
            $message->detail = $request->detail;
   

            if ($message->save()) {
                return $message;
            } else {
                return
                    [
                        "status" => "error",
                        "error" => "สร้างไม่ได้"
                    ];
            }
        }
    }
}
