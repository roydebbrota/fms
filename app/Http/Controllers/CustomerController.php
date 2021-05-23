<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    private $path = 'dashboard.customer';
    /**
     * Display customer form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       if (!empty(Auth::user()->id)) {
           if(Auth::user()->is_team_leader==1){
            $customers = Customer::where('team_id',Auth::user()->team_id)->get();
           }else{
            $customers = Customer::where('user_id',Auth::user()->id)->get();
           }
       }else {
        $customers =  Customer::all();
       }
        return view($this->path.'.'.'customer-list',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->path.'.'.'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
        $this->validate($request,[
            "name" => "required",
            "phone"=> "required|unique:customers,phone,mobile_one,mobile_two|max:11|min:11",
            "mobile_one"=> "required|unique:customers,phone,mobile_one,mobile_two|max:11|min:11",
            "mobile_two"=> "required|unique:customers,phone,mobile_one,mobile_two|max:11|min:11",
            "profession_id"=> "required",
            "company"=> "required",
            "designation"=> "required",
            "email"=> "required",
            "source_id"=> "required",
            "project_id"=> "required",
            "plot_id"=> "required",
            "budget"=> "required",
            "client_status_id"=> "required",
            "discussion_details"=> "required",
        ]);



        $customer = new Customer();
        if(!empty($customer)){

            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->mobile_one = $request->mobile_one;
            $customer->mobile_two = $request->mobile_two;
            $customer->address = $request->address;
            $customer->office_address = $request->office_address;
            $customer->profession_id = $request->profession_id;
            $customer->company = $request->company;
            $customer->designation = $request->designation;
            $customer->email = $request->email;
            $customer->source_id = $request->source_id;
            $customer->plot_id = $request->plot_id;
            $customer->plot_id = $request->plot_id;
            $customer->project_id = json_encode($request->project_id);;
            $customer->client_status_id = $request->client_status_id;
            if(!empty(Auth::user()->id)){
               $customer->user_id = Auth::user()->id;
               $customer->team_id = Auth::user()->team_id;
            }
            $customer->discussion_details = $request->discussion_details;
            $customer->save();

        }
        return back()->with('message','Customer Added Successfully');

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
        //
        $nameById = Customer::find($id);
        $nameById->delete();
        return back()->with('message','Lead Delete Successfuly');

    }
}
