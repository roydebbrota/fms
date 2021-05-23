<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profession;

class ProfessionController extends Controller
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
       $allProfessionName = Profession::all();
       return view('dashboard.profession.create-profession',compact('allProfessionName'));
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
                'profession_name' => 'required|unique:professions,name|max:255',
            ],
            [
                'profession_name.required'=>'Profession Name Required',
            ]);
        $new_Profession = new Profession;
        $new_Profession->name = $request->profession_name;
        $new_Profession->save();
        return back()->with('message','Profession Add Successfuly');
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
                'eprofession_name' => 'required|unique:professions,name|max:255',
            ],
            [
                'eprofession_name.required'=>'Profession Name Required',
            ]);
         $nameById = Profession::find($id);
         $nameById->name = $request->eprofession_name;
         $nameById->update();
         return back()->with('message','Profession Update Successfuly');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $nameById = Profession::find($id);
       $nameById->delete();
       return back()->with('message','Profession Delete Successfuly');
    }

    
}
