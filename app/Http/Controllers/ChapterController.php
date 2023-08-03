<?php

namespace App\Http\Controllers;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chapter = Chapter::all();
        return view('chapter',['chapter'=>$chapter]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_chap');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $chapter = $request->all();
        Chapter::create($chapter);
        return redirect()->route('chapter.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $chapter = Chapter::find($id);
        return view('edit_chap',compact('chapter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $chapter = Chapter::findOrFail($id);
        $chapter->update($request->all());
        $chapter->save();
        return redirect()->route('chapter.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $chapter = Chapter::find($id);
        $chapter->delete();
        return redirect()->route('chapter.index');
    }
}