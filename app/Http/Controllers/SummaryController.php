<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Summary;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
            'file' => 'mimes:doc,pdf,docx,txt'
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
            
            if (!empty($request->file)) {
                $summary->file = 'file_upload/' . $request->file->hashName();
                $request->file->store('file_upload', 'public');
            }

            if ($summary->save() && $work->save()) {
                if (!empty($request->file)) {
                    $summary['file_upload'] = env('APP_URL', false) . Storage::url('file_upload/'. $request->file->hashName());
                }
                $work['user'] = $work->user;
                $work['summary'] = $summary;
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
