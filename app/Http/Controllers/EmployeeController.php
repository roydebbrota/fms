<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\User;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
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
        $allemployee = Employee::all();
        return view('dashboard.employee.create-employee',compact('allemployee'));
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
        $validatedData = $request->validate(
            [
                'employee_name' => 'required|unique:employees,name|max:255',
                'employee_designation' => 'required|string|max:255',
                'group_id' => 'required',
                'team_id' => 'required',
                'team_leader' => 'required',
                'joining_date' => 'required',
                'role' => 'required',  
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ],
            [
                'employee_name.required'=>'Employee Name Required',
                'employee_designation.required'=>'Employee Designation Required',
                'employee_designation.string'=>'Invalid Format',
                'group_id.required'=>'Group Name Required',
                'team_leader.required'=>'Team leader Required',
                'joining_date.required'=>'Joining Date Required',
            ]);
        if($request->team_leader == '1'){
          $chack_team_leader =  Employee::where('team_id',$request->team_id)->where('group_id',$request->group_id)->first();
          if(!empty($chack_team_leader)){
            return back()->with('message','Team Leader Name Is '.$chack_team_leader->name.' ,First Change  '.$chack_team_leader->name.'  Team Leader Status');
          }
        }
        // $new_employee = new Employee;
        // $new_employee->name = $request->employee_name;
        // $new_employee->role = $request->role;
        // $new_employee->email = $request->email;
        // $new_employee->password = Hash::make( $request->password); 
        // $new_employee->designation = $request->employee_designation;
        // $new_employee->group_id = $request->group_id;
        // $new_employee->team_id = $request->team_id;
        // $new_employee->is_team_leader = $request->team_leader;
        // $new_employee->joining_date = $request->joining_date;
        // $new_employee->save();



        // $user = new User();
        // $user->role = $request->role;
        // $user->email = $request->email;
        // $user->password = Hash::make( $request->password);  
        // $user->save();

        

        return back()->with('message','Employee Add Successfuly');
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
                'eemployee_name' => 'required|unique:employees,name|max:255',
                'eemployee_designation' => 'required|string|max:255',
                'egroup_id' => 'required',
                'eteam_id' => 'required',
                'eteam_leader' => 'required',
            ],
            [
                'eemployee_name.required'=>'Employee Name Required',
                'eemployee_designation.required'=>'Employee Designation Required',
                'eemployee_designation.string'=>'Invalid Format',
                'egroup_id.required'=>'Group Name Required',
                'eteam_leader.required'=>'Team leader Required',
            ]);
        if($request->eteam_leader == '1'){
          $chack_team_leader =  Employee::where('team_id',$request->eteam_id)->where('group_id',$request->egroup_id)->first();
          if(!empty($chack_team_leader)){
            return back()->with('message','Team Leader Name Is '.$chack_team_leader->name.' ,First Change  '.$chack_team_leader->name.'  Team Leader Status');
          }
        }
        $nameById = Employee::find($id);
        $nameById->name = $request->eemployee_name;
        $nameById->designation = $request->eemployee_designation;
        $nameById->group_id = $request->egroup_id;
        $nameById->team_id = $request->eteam_id;
        $nameById->is_team_leader = $request->eteam_leader;
        $nameById->update();
        return back()->with('message','Employee Update Successfuly');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nameById = Employee::find($id);
       $nameById->delete();
       return back()->with('message','Employee Delete Successfuly');
    }
}
