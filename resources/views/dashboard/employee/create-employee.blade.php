@extends('dashboard.master.app')
@section('title')
    Create User
@endsection
@section('content')
@if (Session::get('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Message: </strong>{{  Session::get('message')  }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif


     <!-- content @s -->
     <div class="nk-content">
        <div class="container-fluid" id="viewUserBlad">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block">

                        <div class="card card-bordered">

                            <div class="card-aside-wrap">
                                <div class="card-inner card-inner-lg">

                                    <div class="nk-block-head nk-block-head-lg">


                                        <div class="nk-block-between">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Create New Employee</h4>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->

                                    <div class="nk-block">
                                        <div class="nk-data data-list">
                                                <form action="{{route('user-save')}}" method="POST">
                                                     @csrf
                                                  <div class="col-lg-10">
                                                     <div class="form-group">
                                                      <label class="form-label">Role</label>
                                                      <div class="form-control-wrap">
                                                          <select data-search="on" class="form-select @error('role') is-invalid @enderror" name="role">
                                                              <option value="">Select</option>
                                                              @foreach (\App\Role::where([
                                                                  ['name', '!=', 'SuperAdmin'],
                                                              ])->get(); as $item)
                                                              <option value="{{$item->id}}">{{$item->name}}</option>
                                                              @endforeach
                                                          </select>
                                                      </div>
                                                      @error('role')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                       @enderror
                                                  </div>
                                                </div>

                                                    <div class="col-lg-10">
                                                        <div class="form-group">
                                                            <label class="form-label" for="employee_name">Employee Name :</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('employee_name') is-invalid @enderror" id="employee_name" name="employee_name">
                                                                @error('employee_name')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-10">
                                                      <div class="form-group">
                                                          <label class="form-label" for="email">Email</label>
                                                          <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" required autocomplete="email" id="email" placeholder="Enter your email address">

                                                          @error('email')
                                                              <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                              </span>
                                                          @enderror
                                                      </div>
                                                    </div>

                                                    <div class="col-lg-10">
                                                      <div class="form-group">
                                                          <label class="form-label" for="password">Password</label>
                                                          <div class="form-control-wrap">
                                                              <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                                  <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                                  <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                              </a>
                                                              <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password" placeholder="Enter your Password">
                                                          </div>

                                                          @error('password')
                                                              <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                              </span>
                                                          @enderror
                                                      </div>
                                                    </div>

                                                    <div class="col-lg-10">
                                                      <div class="form-group">
                                                          <label class="form-label" for="password">Confirm Password</label>
                                                          <div class="form-control-wrap">
                                                              <input type="password" class="form-control form-control-lg" id="password" name="password_confirmation" required autocomplete="new-password" placeholder="Re-Enter your Password">
                                                          </div>
                                                      </div>
                                                    </div>

                                                    <div class="col-lg-10">
                                                        <div class="form-group">
                                                            <label class="form-label" for="employee_designation">Employee Designation :</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('employee_designation') is-invalid @enderror" id="employee_designation" name="employee_designation">
                                                                @error('employee_designation')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-10">
                                                        <div class="form-group">
                                                            <label class="form-label" for="group_id"> Select Group :</label>
                                                            <div data-search="on" class="form-control-wrap @error('group_id') is-invalid @enderror">
                                                                <select class="form-select" name="group_id">
                                                                    <option value="">Select</option>

                                                                    @foreach (\App\Group::get(); as $group)
                                                                <option value="{{$group->id}}">{{$group->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            @error('group_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-10">
                                                        <div class="form-group">
                                                            <label class="form-label" for="team_id">Select Team :</label>
                                                            <div data-search="on" class="form-control-wrap @error('team_id') is-invalid @enderror">
                                                                <select class="form-select" name="team_id">
                                                                    <option value="">Select</option>

                                                                    @foreach (\App\Team::get(); as $team)
                                                                <option value="{{$team->id}}">{{$team->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            @error('team_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="form-group">
                                                            <label class="form-label" for="team_leader">Is Team Leader :</label>
                                                            <div data-search="on" class="form-control-wrap @error('team_leader') is-invalid @enderror">
                                                                <select class="form-select" name="team_leader">

                                                                    <option value="">Select</option>
                                                                    <option value="0">No</option>
                                                                    <option value="1">Yes</option>

                                                                </select>
                                                            </div>

                                                            @error('team_leader')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="form-group">
                                                            <label class="form-label" for="joining_date">Joining Date :</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="date-picker form-control @error('joining_date') is-invalid @enderror" id="joining_date" name="joining_date">
                                                                @error('joining_date')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div class="form-group mt-4">
                                                            <button type="submit" class="btn btn-lg btn-primary">Add Employee</button>
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>
                                    <!-- .nk-block -->
                                </div>
                                <div class="mt-4">
                                    <table class="table datatable-init">
                                        <thead>
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Employee Name</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody >

                                            @forelse($allemployee  as $employee)
                                                <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>{{ $employee->name}}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-info" style="width: 62px;" class="mr-2" data-toggle="modal" data-target="#modal{{ $employee->id}}"><em class="icon ni ni-edit-alt"></em>Edit
                                                        </button>
                                                        <button class="btn btn-sm btn-danger" onclick="if(confirm('do you wont to delete')){document.getElementById('empoloyee_delete_form').submit();
                                                            }else{event.preventDefault();return false;}">Delete</button>
                                                        <div class="modal fade" id="modal{{ $employee->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Update employee</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>
                                                                   <div class="modal-body">
                                                                        <form action="{{ route('employee.update',$employee->id) }}" method="POST">
                                                                         @csrf
                                                                         <input type="hidden" name="_method" value="PUT">

                                                                      <div class="">
                                                                          <div class="form-group">
                                                                              <label class="form-label" for=" eemployee_name">Employee Name</label>
                                                                              <div class="form-control-wrap">
                                                                                  <input type="text" class="form-control @error('eemployee_name') is-invalid @enderror" id="eemployee_name" name="eemployee_name" value="{{ $employee->name}}">
                                                                                  @error('eemployee_name')
                                                                                      <div class="alert alert-danger">{{ $message }}</div>
                                                                                  @enderror
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                        <div class="col-lg-10">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="eemployee_designation">Employee Designation :</label>
                                                                                <div class="form-control-wrap">
                                                                                    <input type="text" class="form-control @error('eemployee_designation') is-invalid @enderror" id="eemployee_designation" name="eemployee_designation" value="{{ $employee->designation}}">
                                                                                    @error('eemployee_designation')
                                                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-10">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="egroup_id"> Select Group :</label>
                                                                                <div data-search="on" class="form-control-wrap @error('egroup_id') is-invalid @enderror">
                                                                                    <select class="form-select" name="egroup_id">
                                                                                        <option value="">Select</option>

                                                                                        @foreach (\App\Group::get(); as $group)
                                                                                    <option value="{{$group->id}}" {{ $group->id == $employee->group_id? 'selected': '' }}>{{$group->name}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>

                                                                                @error('egroup_id')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-10">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="eteam_id">Select Team :</label>
                                                                                <div data-search="on" class="form-control-wrap @error('eteam_id') is-invalid @enderror">
                                                                                    <select class="form-select" name="eteam_id">
                                                                                        <option value="">Select</option>

                                                                                        @foreach (\App\Team::get(); as $team)
                                                                                    <option value="{{$team->id}}" {{ $team->id == $employee->team_id? 'selected': '' }} >{{$team->name}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>

                                                                                @error('eteam_id')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-10">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="eteam_leader">Is Team Leader :</label>
                                                                                    <div data-search="on" class="form-control-wrap @error('eteam_leader') is-invalid @enderror">
                                                                                        <select class="form-select" name="eteam_leader">

                                                                                            <option value="">Select</option>
                                                                                            <option value="0" {{ $employee->is_team_leader == 0
                                                                                                ? 'selected': '' }} >No</option>
                                                                                            <option value="1" {{ $employee->is_team_leader == 1
                                                                                                ? 'selected': '' }} >Yes</option>

                                                                                        </select>
                                                                                    </div>

                                                                                    @error('eteam_leader')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-10">
                                                                                <div class="form-group mt-4">
                                                                                    <button type="submit" class="btn btn-lg btn-primary">Update Employee Name</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <form action="{{route('employee.destroy',$employee->id)}}" method="POST" id="empoloyee_delete_form">
                                                            @csrf
                                                            @method('DELETE')

                                                        </form>

                                                    </td>
                                                </tr>
                                            @empty
                                            <h4 class="text-center">First Add Some Emplloyee</h4>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>





                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

@endsection
