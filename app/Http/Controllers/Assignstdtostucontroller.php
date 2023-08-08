<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use App\Models\User_data;
use App\Models\Usertype; // Assuming you have Usertype, Userdata, and Accesstype models


use Illuminate\Http\Request;

class Assignstdtostucontroller extends Controller
{
    public function assign(){
        $standard = Standard::all();
        $check = 'Student';

        $students = Usertype::select('usertypes.userid', 'user_datas.fname')
            ->join('user_datas', 'user_datas.id', '=', 'usertypes.userid')
            ->join('accesstypes', 'accesstypes.id', '=', 'usertypes.access_id')
            ->where('accesstypes.access_type', $check)
            ->get();
        

        return view('stdtostu.stdtostu',['standard'=>$standard,'student'=>$students]);
    }

    public function store(Request $request){
        $std_id = $request->input('standard');
        $student_id = $request->input('students',[]);
        $standard = Standard::find($std_id);
        $standard->students()->sync($student_id);
        return redirect()->route('assign.stdtostu');
        
    }
}
