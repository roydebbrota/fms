<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientStatus;

class ClientStatusController extends Controller
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
        $allClientstatus = ClientStatus::all();
        return view('dashboard.clientstatus.create-clientstatus',compact('allClientstatus'));
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
                'clientstatus' => 'required|unique:client_statuses,name|max:255',
            ],
            [
                'clientstatus.required'=>'Client stats Required',
            ]);
        $new_clientstatus = new ClientStatus;
        $new_clientstatus->name = $request->clientstatus;
        $new_clientstatus->save();
        return back()->with('message','Client Status Add Successfuly');
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
                'eclientstatus' => 'required|unique:client_statuses,name|max:255',
            ],
            [
                'eclientstatus.required'=>'Client stats Required',
            ]);
        $new_clientstatus =ClientStatus::find($id);
        $new_clientstatus->name = $request->eclientstatus;
        $new_clientstatus->update();
        return back()->with('message','Client Status Update Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $nameById = ClientStatus::find($id);
       $nameById->delete();
       return back()->with('message','Client Status Delete Successfuly');
    }
}
