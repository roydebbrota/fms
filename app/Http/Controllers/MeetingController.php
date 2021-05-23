<?php

namespace App\Http\Controllers;

use App\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
{

    private $path = 'dashboard.followup';

    public function meetingForm($id){
        $user_id = $id;
        return view($this->path.'.'.'meeting-form',compact('user_id'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $meetings = Meeting::all();
        return view($this->path.'.'.'meeting-list',compact('meetings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'client_status_id' => 'required',
            'details' => 'required',
        ]);
    
        $meeting = new Meeting();
        $meeting->customer_id = $request->users_id;
        $meeting->meeting_type_id = $request->meeting_type_id;
        $meeting->meeting_time = $request->time;
        $meeting->meeting_address = $request->address; 
        $meeting->visit_type_id = $request->visit_type_id;
        $meeting->client_status_id = $request->client_status_id;
        if(!empty(Auth::user()->id)){
            $meeting->employee_id = Auth::user()->id;
         }
        $meeting->date = $request->date;
        $meeting->details = $request->details;
        $meeting->save();
        return redirect()->route('meeting.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $nameById = Meeting::find($id);
        $nameById->delete();
        return back()->with('message','Meeting Delete Successfuly');
    }
}
