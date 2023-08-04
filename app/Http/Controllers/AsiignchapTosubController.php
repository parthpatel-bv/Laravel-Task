<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Chapter;



class AsiignchapTosubController extends Controller
{
    public function assign(){
        $subject = Subject::all();
        $chapter = Chapter::all();
        return view('chapTosub.chaptosub',['subject'=>$subject,'chapter'=>$chapter]);
    }

    public function store(Request $request){
        $sub_id = $request->input('subject');
        $chap_id = $request->input('chapter',[]);

        $subject = Subject::find($sub_id);
        dd($subject->chapters()->sync($chap_id));
        
    }
}
