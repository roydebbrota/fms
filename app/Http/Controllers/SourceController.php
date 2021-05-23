<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Source;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allSourceName = Source::all();
       return view('dashboard.source.create-source',compact('allSourceName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'source_name' => 'required|unique:sources,name|max:255',
            ],
            [
                'source_name.required'=>'Profession Name Required',
            ]);
        $new_source = new Source;
        $new_source->name = $request->source_name;
        $new_source->save();
        return back()->with('message','Source Add Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'esource_name' => 'required|unique:professions,name|max:255',
            ],
            [
                'esource_name.required'=>'Profession Name Required',
            ]);
        $nameById = Source::find($id);
        $nameById->name = $request->esource_name;
        $nameById->update();
        return back()->with('message','Source Update Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $nameById = Source::find($id);
       $nameById->delete();
       return back()->with('message','Source Delete Successfuly');
    }
}
