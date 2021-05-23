<?php

namespace App\Http\Controllers;

use App\ProjectVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectVisitController extends Controller
{
    private $path = 'dashboard.followup';

    public function projectVisitForm($id){
        $user_id = $id;
        return view($this->path.'.'.'project-visit-form',compact('user_id'));
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (!empty(Auth::user()->id)) {
            $project_visits = ProjectVisit::where('user_id',Auth::user()->id)->get();
           }else {
            $project_visits =  ProjectVisit::all();
           }
        return view($this->path.'.'.'project-visit-list',compact('project_visits'));
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
            'visit_type_id' => 'required',
            'details' => 'required',
        ]);

        $visit = new ProjectVisit();
        $visit->customer_id = $request->users_id;
        $visit->project_type_id = $request->project_type_id;
        $visit->visit_time = $request->time;
        $visit->vehicle_type_id = $request->vehicle_type_id;
        $visit->no_of_client = $request->no_of_client;
        $visit->pick_up_place = $request->pick_up_place;
        $visit->staff_up_place = $request->staff_up_place;
        $visit->visit_type_id = $request->visit_type_id;
        $visit->date = $request->date;
        $visit->client_status_id = $request->client_status_id;
        if(!empty(Auth::user()->id)){
            $visit->user_id = Auth::user()->id;
         }
        $visit->details = $request->details;
        $visit->save();
        return redirect()->route('project-visit.index');
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
        $nameById = ProjectVisit::find($id);
        $nameById->delete();
        return back()->with('message','Project Visit Delete Successfuly');
    }
}
