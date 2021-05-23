<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InterestProject;

class InterestProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allProjectName = InterestProject::all();
       return view('dashboard.interestedproject.create-project',compact('allProjectName'));
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
                'project_name' => 'required|unique:interest_projects,name|max:255',
            ],
            [
                'project_name.required'=>'Project Name Required',
            ]);
        $new_project = new InterestProject;
        $new_project->name = $request->project_name;
        $new_project->save();
        return back()->with('message','Project Add Successfuly');
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
                'eproject_name' => 'required|unique:interest_projects,name|max:255',
            ],
            [
                'eproject_name.required'=>'Project Name Required',
            ]);
        $nameById = InterestProject::find($id);
        $nameById->name = $request->eproject_name;
        $nameById->update();
        return back()->with('message','Project Update Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $nameById = InterestProject::find($id);
       $nameById->delete();
       return back()->with('message','Project Delete Successfuly');
    }
}
