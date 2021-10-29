<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use App\Models\Work;
use Firebase\JWT\JWT;
use App\Models\User;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    
    public function getAllWork()
    {
        $work = [];
        $work['works'] = Work::all();
        $work['employees'] = User::where('role','EMPLOYEE')->get();
      
        foreach ($work['works'] as $papa){
            $papa['user'] = $papa->user;
            $papa['summary'] = $papa->summary;
        }

        return $work;
    }

    public function getWork($id)
    {
        $work = Work::find($id);
        return $work;
    }
    public function getUserWork(Request $request)
    {
        $token = $request->header('Authorization');
        $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);

        $work = Work::where('user_id',$credentials->sub)->get();
        foreach ($work as $papa){
            $papa['user'] = $papa->user;
            $papa['summary'] = $papa->summary;
        }

        return $work;
    }




    public function createWork(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'accused_name' => 'required',
            'complainer_name' => 'required',
            'detail' => 'required',
            'type' => 'required',
            'province' => 'required',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return [
                "status" => "error",
                "error" => $errors
            ];
        } 
        else 
        {
            $work = new Work();
            $work->title = $request->title;
            $work->status = "รอดำเนินการ";
            $work->accused_name = $request->accused_name;
            $work->complainer_name = $request->complainer_name;
            $work->detail = $request->detail;
            $work->type = $request->type;
            $work->province = $request->province;
        

            if ($work->save()) {
                return $work;
            } else {
                return
                    [
                        "status" => "error",
                        "error" => "สร้างไม่ได้"
                    ];
            }
        }
    }

    public function updateEmployee(Request $request, $id) {
        $work = Work::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return [
                "status" => "error",
                "error" => $errors
            ];
        } else {

           $work->user_id = $request->user_id;
            if ($work->save()) {
                $work['user'] = $work->user;
                return $work;
            } else {
                return
                    [
                        "status" => "error",
                        "error" => "ไม่สามารถให้งานกับลูกน้องคนนี้ได้"
                    ];
            }
        }
    }

    public function update(Request $request, $id)
    {
        $work = Work::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'accused_name' => 'required',
            'complainer_name' => 'required',
            'detail' => 'required',
            'type' => 'required',
            'province' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return [
                "status" => "error",
                "error" => $errors
            ];
        } else {
            $work->title = $request->title;
            $work->accused_name = $request->accused_name;
            $work->complainer_name = $request->complainer_name;
            $work->detail = $request->detail;
            $work->type = $request->type;
            $work->province = $request->province;
            $work->pdf_file = $request->pdf_file;

            if ($work->save()) {
                return $work;
            } else {
                return
                    [
                        "status" => "error",
                        "error" => "แก้ไขไม่ได้"
                    ];
            }
        }
    }
    public function destroy($id)
    {
        $work = Work::findOrFail($id);
        $work->summary()->delete();
        if ($work->delete()) {
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
