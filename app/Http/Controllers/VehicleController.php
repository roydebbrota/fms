<?php

namespace App\Http\Controllers;

use App\VehicleType;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    private $path = 'dashboard.followup';
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
        $vehicle_types = VehicleType::all();
       return view($this->path.'.'.'vehicle-type-create',compact('vehicle_types'));
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
            'name' => 'required|unique:vehicle_types,name|max:255',
        ], [
            'name.required'=>'Meeting Type Required',
        ]);
        
        $vehicle_type = new VehicleType();
        $vehicle_type->name = $request->name;
        $vehicle_type->save();
        return back()->with('message','Vehicle Added Successfuly');    }

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
            'ename' => 'required|unique:vehicle_types,name|max:255',
        ], [
            'ename.required'=>'Visit Type Required',
        ]);
        $vehicle_type =  VehicleType::find($id);
        $vehicle_type->name = $request->ename; 
        $vehicle_type->update();
        return back()->with('message','Vehicle Type Update Successfully');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nameById = VehicleType::find($id);
        $nameById->delete();
        return back()->with('message','Vehicle Type Delete Successfuly'); 
    }
}
