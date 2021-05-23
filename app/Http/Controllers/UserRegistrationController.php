<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Http\Request;
class UserRegistrationController extends Controller
{

    //Show Registration Form
    public function showRegistrationForm(){
        if(Auth::user()->roles->name == 'Superadmin'){
            return view('dashboard.user.registration-form');
        }else{
            return redirect('/home');
        }
    }

    public function userSave(Request $request){
        // return $request->all();



        $this->validator($request->all())->validate();

        if($request->team_leader == 1){
            $chack_team_leader =  User::where('team_id',$request->team_id)->where('group_id',$request->group_id)->where('is_team_leader', 1)->first();
            // dd($chack_team_leader->name);
            if($chack_team_leader){
              return back()->with('message','Team Leader Name Is '.$chack_team_leader->name.' ,First Change  '.$chack_team_leader->name.'  Team Leader Status');
            }else{
                event(new Registered($user = $this->create($request->all())));

        return redirect('/home')->with('message','Registration Successfull');
            }
          }

        event(new Registered($user = $this->create($request->all())));

        return redirect('/home')->with('message','Registration Successfull');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'group_id' => ['required'],
            'team_id' => ['required'],
            'joining_date' => ['required'],
        ]);
    }



    // $validatedData = $request->validate(
    //     [
    //         'employee_name' => 'required|unique:employees,name|max:255',
    //         'employee_designation' => 'required|string|max:255',
    //         'group_id' => 'required',
    //         'team_id' => 'required',
    //         'team_leader' => 'required',
    //         'joining_date' => 'required',
    //         'role' => 'required',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:6|confirmed',
    //     ],
    //     [
    //         'employee_name.required'=>'Employee Name Required',
    //         'employee_designation.required'=>'Employee Designation Required',
    //         'employee_designation.string'=>'Invalid Format',
    //         'group_id.required'=>'Group Name Required',
    //         'team_leader.required'=>'Team leader Required',
    //         'joining_date.required'=>'Joining Date Required',
    //     ]);

    // if($request->team_leader == '1'){
    //   $chack_team_leader =  Employee::where('team_id',$request->team_id)->where('group_id',$request->group_id)->first();
    //   if(!empty($chack_team_leader)){
    //     return back()->with('message','Team Leader Name Is '.$chack_team_leader->name.' ,First Change  '.$chack_team_leader->name.'  Team Leader Status');
    //   }
    // }


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







    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        // if($data['team_leader'] == '1'){
        //     $chack_team_leader =  User::where('team_id',$data['team_id'])->where('group_id',$data['group_id'])->first();
        //     if(!empty($chack_team_leader)){
        //       return back()->with('message','Team Leader Name Is '.$chack_team_leader->name.' ,First Change  '.$chack_team_leader->name.'  Team Leader Status');
        //     }
        //   }

        return User::create([
            'role' => $data['role'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'designation' => $data['employee_designation'],
            'group_id' => $data['group_id'],
            'team_id' => $data['team_id'],
            'is_team_leader' => $data['team_leader'],
        ]);
    }

    //Get All Users
    public function userList(){
        $users = User::where([
            ['role', '!=', 'superAdmin'],
        ])->get();
        $userCount = $users->count();
        return view('dashboard.user.user-list',compact('users','userCount'));

    }

    public function statusActive($userId){
        $user = User::find($userId);
        $user->status = 1;
        $user->update();
        return redirect('user-list')->with('message','User Activated');
    }

    public function statusDeactive($userId){
        $user = User::find($userId);
        $user->status = 0;
        $user->update();
        return redirect('user-list')->with('message','User Deactivated');
    }
}
