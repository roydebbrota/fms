<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Group;
use Symfony\Component\HttpFoundation\Session\Session;


class GroupController extends Controller
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
         $allGroupName = Group::all();
        return view('dashboard.group.create-group',compact('allGroupName'));
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
                'group_name' => 'required|unique:groups,name|max:255',
            ],
            [
                'group_name.required'=>'Group Name Required',
            ]);

        $new_group_name = new Group;
        $new_group_name->name = $request->group_name;
        $new_group_name->save();
        return back()->with('message','Group Name Add Successfuly')
        ->with('modalError');
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
        $validatedData = Validator::make($request->all(),
            [
                'egroup_name' => 'required|unique:groups,name|max:255',
            ],
            [
                'egroup_name.required'=>'roup Name Required',
            ]);
            if($validatedData->fails()){
                return back()
                ->withErrors($validatedData)
                ->withInput()
                ->with('modalError','modal'.$id);
            }
        $new_group_name = Group::find($id);
        $new_group_name->name = $request->egroup_name;
        $new_group_name->update();

        return back()->with('message','Group Name Update Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $nameById = Group::find($id);
       $nameById->delete();
       return back()->with('message','Group Name Delete Successfuly');
    }
}
