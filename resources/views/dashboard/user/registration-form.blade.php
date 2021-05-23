@extends('dashboard.master.app')
@section('title')
    YouthFireIT | Dashboard
@endsection

@section('content')
@if (Session::get('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong class="text-success">Message: {{  Session::get('message')  }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
    <!-- content @s -->
    <div class="nk-content ">
        <div class="nk-split nk-split-page nk-split-md">
            <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                    <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                </div>
                <div class="nk-block nk-block-middle nk-auth-body">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Create User</h5>
                        </div>
                    </div><!-- .nk-block-head -->

                    {{--===== Register Start ====== --}}

                <form method="POST" action="{{route('user-save')}}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Role</label>
                            {{-- <div class="form-control-wrap"> --}}
                                <select data-search="on" class="form-control form-control-lg  @error('role') is-invalid @enderror" name="role">
                                    <option value="">Select</option>
                                    @foreach (\App\Role::where([
                                        ['name', '!=', 'SuperAdmin'],
                                    ])->get(); as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            {{-- </div> --}}
                            @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                        </div>


                        <div class="form-group">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" id="name" required autocomplete="name" autofocus placeholder="Enter your name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" required autocomplete="email" id="email" placeholder="Enter your email address">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

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

                        <div class="form-group">
                            <label class="form-label" for="password">Confirm Password</label>
                            <div class="form-control-wrap">
                                <input type="password" class="form-control form-control-lg" id="password" name="password_confirmation" required autocomplete="new-password" placeholder="Re-Enter your Password">
                            </div>
                        </div>



                        {{-- <div class="col-lg-10"> --}}
                            <div class="form-group">
                                <label class="form-label" for="employee_designation">Employee Designation :</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control form-control-lg @error('employee_designation') is-invalid @enderror" id="employee_designation" name="employee_designation">
                                    @error('employee_designation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        {{-- </div> --}}


                        <div class="form-group">
                            <label class="form-label" for="group_id"> Select Group :</label>
                            {{-- <div data-search="on" class="form-control form-control-lg @error('group_id') is-invalid @enderror"> --}}
                                <select data-search="on" class="form-control form-control-lg @error('group_id') is-invalid @enderror" name="group_id">
                                    <option value="">Select</option>

                                    @foreach (\App\Group::get(); as $group)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                            {{-- </div> --}}

                            @error('group_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>


                        {{-- <div class="col-lg-10"> --}}
                            <div class="form-group">
                                <label class="form-label" for="team_id">Select Team :</label>
                                {{-- <div data-search="on" class="form-control-wrap @error('team_id') is-invalid @enderror"> --}}
                                    <select data-search="on" class="form-control form-control-lg @error('team_id') is-invalid @enderror" name="team_id">
                                        <option value="">Select</option>

                                        @foreach (\App\Team::get(); as $team)
                                    <option value="{{$team->id}}">{{$team->name}}</option>
                                        @endforeach
                                    </select>
                                {{-- </div> --}}

                                @error('team_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        {{-- </div> --}}

                        {{-- <div class="col-lg-10"> --}}
                            <div class="form-group">
                                <label class="form-label" for="team_leader">Is Team Leader :</label>
                                {{-- <div data-search="on" class="form-control form-control-lg  @error('team_leader') is-invalid @enderror"> --}}
                                    <select data-search="on" class="form-control form-control-lg  @error('team_leader') is-invalid @enderror" name="team_leader">

                                        <option value="">Select</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>

                                    </select>
                                {{-- </div> --}}

                                @error('team_leader')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        {{-- </div> --}}
                        {{-- <div class="col-lg-10"> --}}
                            <div class="form-group">
                                <label class="form-label" for="joining_date">Joining Date :</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="date-picker form-control form-control-lg @error('joining_date') is-invalid @enderror" id="joining_date" name="joining_date">
                                    @error('joining_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        {{-- </div> --}}

                        {{-- <div class="form-group"> --}}
                            <button type="submit" class="btn btn-lg  btn-primary">Save User</button>
                        {{-- </div> --}}
                    </form>
                    <!-- form -->

                    {{-- Register End --}}

                </div><!-- .nk-block -->

            </div><!-- nk-split-content -->

        </div><!-- nk-split -->
    </div>
    <!-- wrap @e -->
</div>
<!-- content @e -->
@endsection
