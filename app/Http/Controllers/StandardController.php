<?php

namespace App\Http\Controllers;

use App\Models\Standard;
use Illuminate\Http\Request;

class StandardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $standard = Standard::all();
        return view('standards.standard', ['standard' => $standard]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('standards.add_std');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $standard = $request->all();
        Standard::create($standard);
        return redirect()->route('standard.index');
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
        $std = Standard::find($id);
        return view('standards.edit_std', compact('std'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $std = Standard::findOrFail($id);
        $std->update($request->all());
        $std->save();
        return redirect()->route('standard.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $std = Standard::find($id);
        $std->delete();
        return redirect()->route('standard.index');
    }
}
