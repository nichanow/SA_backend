<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Summary;
use App\Models\Work;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function getSummary($id){
        $summary = Summary::find($id);
        return $summary;
    }

    public function createSummary(Request $request){
        
        $validator = Validator::make($request->all(), [
            'work_id' => 'required',
            'summary_detail' => 'required',
            'conclusion' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return [
                "status" => "error",
                "error" => $errors
            ];
        } else {
           
            $summary = new Summary();
            $summary->work_id = $request->work_id;
            $summary->summary_detail = $request->summary_detail;
            $summary->conclusion = $request->conclusion;
            $work = Work::find($request->work_id);
            $work->status = $request->conclusion;

            if ($summary->save() && $work->save()) {

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

}
