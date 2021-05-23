<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Employee;
use App\FollowUp;
use App\Requisition;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PDF;

class FollowUpController extends Controller
{
    private $path = 'dashboard.followup';

    /**
     * Follow Up Form.
     *
     * @return \Illuminate\Http\Response
     */

     public function followUpForm($id){
        $user_id = $id;

        $customer_info = Customer::where('id',$id)->first();
        $followups = FollowUp::where('customer_id',$id)->get();
        return view($this->path.'.'.'follow-up-form',compact('user_id','customer_info','followups'));
     }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!empty(Auth::user()->id)) {
            if(Auth::user()->is_team_leader==1){
                $followups = FollowUp::where('team_id',Auth::user()->team_id)->get()->unique('customer_id');
               }else{
                $followups = FollowUp::where('user_id',Auth::user()->id)->get()->unique('customer_id');
               }
            $followups = FollowUp::where('user_id',Auth::user()->id)->get()->unique('customer_id');
           }else {
            $followups = FollowUp::get()->unique('customer_id');
           }
        return view($this->path.'.'.'follow-up-list',compact('followups'));
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

    $validator = Validator::make($request->all(), [
        'visit_type_id' => 'required',
        'client_status_id' => 'required',
        'date' => 'required',
        'next_follow_up_date' => 'required',
        'details' => 'required',
    ],[
        'visit_type_id.requried' => 'Next Step Requried',
        'client_status_id.requried' => 'Client Status Requried',
        'date.requried' => 'Date Requried',
        'next_follow_up_date.requried' => 'Next Follow Up Date Requried',
        'details.requried' => 'Details Requried'
    ]);
    if($validator->fails()){
        return back()->withErrors($validator)
                    ->withInput()
                    ->with('modalError','followUpModal');
    }

    $followup = new FollowUp();
    $followup->customer_id = $request->users_id;
    $followup->visit_type_id = $request->visit_type_id;
    $followup->client_status_id = $request->client_status_id;
    if(!empty(Auth::user()->id)){
        $followup->user_id = Auth::user()->id;
        $followup->team_id = Auth::user()->team_id;
     }
    $followup->date = $request->date;
    $followup->next_follow_up_date = $request->next_follow_up_date;
    $followup->details = $request->details;
    $followup->save();
    return redirect()->route('followup.index');

    // return view('dashboard.followup.requisition');


    // return redirect()->route('followup.index');

    }



    public function requisitionForm($id){
        $details = FollowUp::find($id);
        return view('dashboard.followup.requisition',compact('details'));
    }


    public function requisitionSave(Request $request){
        // return $request;
        $requisition = new Requisition();
        $requisition->project_name = $request->project_id;
        $requisition->user_name = $request->emp_name;
        $requisition->designation = $request->designation;
        $requisition->mobile = $request->mobile_number;
        $requisition->team_name = $request->team;
        $requisition->number_of_person = $request->number_of_person;
        $requisition->visit_date = $request->requisition_date;
        $requisition->staff_pickup_place = $request->staff_pick_up_place;
        $requisition->client_pickup_place = $request->client_pick_up_place;
        $requisition->starting_time = $request->starting_time;
        $requisition->back_time = $request->back_time;
        $requisition->save();
        $req = $request->all();

        $pdf = PDF::loadView('dashboard.followup.requisiton-form',compact('req'));
        return $pdf->stream();

        // return view('dashboard.followup.requisiton-form',compact('req'));
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
        $nameById = FollowUp::find($id);
        $nameById->delete();
        return back()->with('message','Follow Up Delete Successfuly');

    }
}
