<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function getAllWork()
    {
        $work = Work::all();
        return $work;
    }

    public function getWork($id)
    {
        $work = Work::find($id);
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
            'pdf_file' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return [
                "status" => "error",
                "error" => $errors
            ];
        } else {
            $work = new Work();
            $work->title = $request->title;
            $work->user_id = 0;
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
                        "error" => "สร้างไม่ได้"
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
            'pdf_file' => 'required',
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
