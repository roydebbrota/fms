<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
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
        $allTeamName = Team::all();
        return view('dashboard.team.create-team',compact('allTeamName'));
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
                'team_name' => 'required|unique:teams,name|max:255',
                'group_id' => 'required',
            ],
            [
                'team_name.required'=>'Team Name Required',
                'group_id.required'=>'Select A Group',
            ]);
        $new_team_name = new Team;
        $new_team_name->group_id = $request->group_id;
        $new_team_name->name = $request->team_name;
        $new_team_name->save();
        return back()->with('message','Team Name Add Successfuly');
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
                'eteam_name' => 'required|unique:teams,name|max:255',
                'egroup_id' => 'required',
            ],
            [
                'eteam_name.required'=>'Group Name Required',
                'egroup_id.required'=>'Select A Group',
            ]);
        $new_team_name = Team::find($id);
        $new_team_name->group_id = $request->egroup_id;
        $new_team_name->name = $request->eteam_name;
        $new_team_name->update();
        return back()->with('message','Team Name Update Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $nameById = Team::find($id);
       $nameById->delete();
       return back()->with('message','Team Name Delete Successfuly');
    }
}
