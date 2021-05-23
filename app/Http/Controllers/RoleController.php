<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    private $path = 'dashboard.user';
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
        if(Auth::user()->roles->name == 'Superadmin'){
            $roles = Role::all();
            return view($this->path.'.'.'role-create',compact('roles'));  
        }else{
            return redirect('/home');
        }
        
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
            'name' => 'required|unique:roles,name|max:255',
        ], [
            'name.required'=>'Role Name Required',
        ]);
        
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        return back()->with('message','Role Added Successfully');
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
            'ename' => 'required|unique:roles,name|max:255',
        ], [
            'ename.required'=>'Role name Required',
        ]);
        $role = Role::find($id);
        $role->name = $request->ename; 
        $role->update();
        return back()->with('message','Role Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->roles->name == 'Superadmin'){
            $nameById = Role::find($id);
            $nameById->delete();
            return back()->with('message','Role Delete Successfuly'); 
        }else{
            return redirect('/home');
        }
       
    }
}
