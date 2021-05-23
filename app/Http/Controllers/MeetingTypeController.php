<?php

namespace App\Http\Controllers;

use App\MeetingType;
use Illuminate\Http\Request;

class MeetingTypeController extends Controller
{
    private $followup = 'dashboard.followup';
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
        $meeting_types = MeetingType::all();
        return view($this->followup.'.'.'meeting-type-create',compact('meeting_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request;
        $this->validate($request,[
            'name' => 'required|unique:meeting_types,name|max:255',
        ], [
            'name.required'=>'Meeting Type Required',
        ]);
         
        $meeting_type = new MeetingType();
        $meeting_type->name = $request->name;
        $meeting_type->save();
        return back()->with('message','Meeting Added Successfuly');
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
        $this->validate($request,[
            'ename' => 'required|unique:meeting_types,name|max:255',
        ], [
            'ename.required'=>'Meeting Type Required',
        ]);
        $meeting_type =  MeetingType::find($id);
        $meeting_type->name = $request->ename; 
        $meeting_type->update();
        return back()->with('message','Meeting Update Successfuly');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nameById = MeetingType::find($id);
        $nameById->delete();
        return back()->with('message','Meeting Delete Successfuly');
    
    }
}
