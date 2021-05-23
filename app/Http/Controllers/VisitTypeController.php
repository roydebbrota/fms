<?php

namespace App\Http\Controllers;

use App\VisitType;
use Illuminate\Http\Request;

class VisitTypeController extends Controller
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
        $visit_types = VisitType::all();
        return view($this->followup.'.'.'visit-type-create',compact('visit_types')); 
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
            'name' => 'required|unique:visit_types,name|max:255',
        ], [
            'name.required'=>'Meeting Type Required',
        ]);
         
        $visit_type = new VisitType();
        $visit_type->name = $request->name;
        $visit_type->save();
        return back()->with('message','Visit Added Successfuly');
    
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
            'ename' => 'required|unique:visit_types,name|max:255',
        ], [
            'ename.required'=>'Visit Type Required',
        ]);
        $visit_type =  VisitType::find($id);
        $visit_type->name = $request->ename; 
        $visit_type->update();
        return back()->with('message','Visit Type Update Successfully');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nameById = VisitType::find($id);
        $nameById->delete();
        return back()->with('message','Visit Type Delete Successfuly'); 
    }
}
