@extends('dashboard.master.app')
@section('title')
   Project Visit Requisition
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

<div class="nk-block-head-content  mb-5">
    <h4 class="nk-block-title text-center">Modhucity</h4><br>
    <h4 class="nk-block-title text-center"><u>VEHICLE REQUISITION</u></h4>
</div>
<div class="mt-5">
    <form action="{{ route('requisition.save') }}" method="POST">
        @csrf
    <div class="row mb-3">

        @php
           $projects =  \App\InterestProject::all();

        @endphp

        <label for="project_name" class="col-md-2 col-form-label  mb-3"><span class="pl-4">Project Name:</span></label>
        <div class="col-md-4  mb-3 form-group">
                <select data-search="on" class="form-select @error('project_id') is-invalid @enderror" name="project_id">
                    @foreach (\App\InterestProject::get(); as $item)
                        <option value="{{$item->name}}">{{$item->name}}</option>
                    @endforeach
                </select>
        </div>

        <label for="emp_name" class="col-md-2 col-form-label  mb-3"><span class="pl-4"> Name:</span></label>
        <div class="col-md-4  mb-3">
            <input value="{{ $details->user->name }}" type="text" class="form-control" id="emp_name" name="emp_name" readonly>
        </div>

        <label for="designation" class="col-md-2 col-form-label  mb-3 text-center"><span class="pl-4"> Designation :</span></label>
        <div class="col-md-4  mb-3">
            <input value="{{ $details->user->designation?? '' }}" type="text" class="form-control" id="designation" name="designation" readonly>
        </div>

        <label for="mobile_number" class="col-md-2 col-form-label  mb-3"><span class="pl-4"> Mobile Number :</span></label>
        <div class="col-md-4  mb-3">
            <input value="{{ $details->user->email?? '' }}" type="text" class="form-control" id="mobile_number" name="mobile_number" readonly>
        </div>

        <label for="team" class="col-md-2 col-form-label  mb-3 text-center"><span class=""> Team :</span></label>
        <div class="col-md-4  mb-3">
            <input value="{{ $details->team->name?? '' }}" type="text" class="form-control" id="team" name="team" readonly>
        </div>

        <label for="number_of_person" class="col-md-2 col-form-label  mb-3"><span class="pl-4"> Number Of Person :</span></label>
        <div class="col-md-4  mb-3">
            <input  type="text" class="form-control" id="number_of_person" name="number_of_person">
        </div>

        <label for="requisition_date" class="col-md-2 col-form-label  mb-3 text-center "><span class="pl-4"> Visit Date :</span></label>
        <div class="col-md-4  mb-3">
            <input value="{{ $details->date	?? '' }}" type="text" class="form-control" id="requisition_date" name="requisition_date" readonly>
        </div>
        <label for="staff_pick_up_place" class="col-md-2 col-form-label  mb-3 "><span class="pl-4"> Staff Pick Up Place :</span></label>
        <div class="col-md-4  mb-3">
            <input  type="text" class="form-control" id="staff_pick_up_place" name="staff_pick_up_place">
        </div>

        <label for="client_pick_up_place" class="col-md-2 col-form-label  mb-3 text-center"><span class="pl-4"> Client Pick Up Place :</span></label>
        <div class="col-md-4  mb-3">
            <input  type="text" class="form-control" id="client_pick_up_place" name="client_pick_up_place">
        </div>
        <label for="starting_time" class="col-md-2 col-form-label  mb-3"><span class="pl-4">Starting Time :</span></label>
        <div class="col-md-4  mb-3">
            <input type="text" class="form-control time-picker" id="starting_time" name="starting_time"  autocomplete="off">
        </div>

        <label for="back_time" class="col-md-2 col-form-label  mb-3 text-center"><span class="pl-4"> Back Time :</span></label>
        <div class="col-md-4  mb-3">
            <input type="text" class="form-control time-picker" id="back_time" name="back_time" autocomplete="off" >
        </div>



        <div class="col-12 text-center mt-3">
        <button type="submit" class="btn btn-info px-5"> Submit</button>
        </div>



        {{-- <label for="requisition_date" class="col-md-2 col-form-label  mb-3"><span class="pl-4">Requisition Date:</span></label>
        <div class="col-md-4  mb-3">
            <input type="text" class="form-control" id="requisition_date" name="requisition_date" readonly>
        </div> --}}

        {{-- <label for="lead_id" class="col-md-2 col-form-label  mb-3"><span class="pl-4"> Lead ID :</span></label>
        <div class="col-md-4  mb-3">
            <input type="text" class="form-control" id="lead_id" name="lead_id" readonly>
        </div> --}}
    </div>
</form>
</div>

  <div class="col-12" ></div>


@endsection
