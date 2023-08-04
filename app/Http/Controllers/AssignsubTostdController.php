<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use App\Models\Standard;
use Illuminate\Http\Request;

class AssignsubTostdController extends Controller
{
    public function assign(){
        $subject = Subject::all();
        $standard = Standard::all();
        return view('subtostd.subtostd',['subject'=>$subject,'standard'=>$standard]);
    }

    public function store(Request $request){
        $standardID = $request->input('standard');
        $subjectId = $request->input('subjects',[]);

        $standard = Standard::find($standardID);
        $standard->subjects()->sync($subjectId);
    }
}
