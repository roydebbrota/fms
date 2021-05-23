@extends('dashboard.master.app')
@section('title')
   Follow Up
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
                                                <h4 class="nk-block-title">Add Meeting</h4>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->

                                    <div class="nk-block">
                                        <div class="nk-data data-list">
                                        <form action="{{route('meeting.store')}}" method="POST">
                                                  @csrf
                                                 <input type="hidden" name="users_id" value="{{$user_id}}">

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label">Meeting Type</label>
                                                            <div data-search="on" class="form-control-wrap @error('meeting_type_id') is-invalid @enderror">
                                                                <select class="form-select" name="meeting_type_id">
                                                                    <option value="">Select</option>
                                                                    @foreach (\App\MeetingType::get(); as $item)
                                                                     <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach


                                                                </select>
                                                            </div>

                                                            @error('meeting_type_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group @error('time') is-invalid @enderror">
                                                            <label class="form-label" for="time">Meeting Time</label>
                                                            <div class="form-control-wrap">
                                                                <input type="time" name="time" value="22:00" class="form-control" id="time"   autocomplete="off">
                                                            </div>

                                                            @error('time')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                          @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group @error('address') is-invalid @enderror">
                                                            <label class="form-label" for="time">Meeting Address</label>
                                                            <div class="form-control-wrap">
                                                                <textarea class="form-control" name="address" id="address"></textarea>
                                                            </div>

                                                            @error('address')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                          @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label">Next Step</label>
                                                            <div data-search="on" class="form-control-wrap @error('visit_type_id') is-invalid @enderror">
                                                                <select class="form-select" name="visit_type_id">
                                                                    <option value="">Select</option>
                                                                    @foreach (\App\VisitType::get(); as $item)
                                                                     <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach


                                                                </select>
                                                            </div>

                                                            @error('visit_type_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-7">
                                                        <div class="form-group @error('client_status_id') is-invalid @enderror">
                                                            <label class="form-label">Client Status</label>
                                                            <div class="form-control-wrap">
                                                                <select data-search="on" class="form-select" name="client_status_id">
                                                                    <option value="">Select</option>
                                                                    @foreach (\App\ClientStatus::get(); as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            @error('client_status_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-7">
                                                        <div class="form-group @error('date') is-invalid @enderror">
                                                            <label class="form-label" for="date">Date</label>
                                                            <div class="form-control-wrap">
                                                                <input type="date" class="form-control" id="date" name="date" autocomplete="off">
                                                            </div>

                                                            @error('date')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                          @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-12">
                                                        <div class="form-group @error('text') is-invalid @enderror">
                                                            <label class="form-label">Details</label>
                                                            <div class="card card-bordered">
                                                                <div class="card-inner">
                                                                    <textarea name="details" class="summernote-basic"  ></textarea>
                                                                </div>
                                                            </div>

                                                            @error('details')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group">

                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-primary">Next Followup</button>
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>
                                    <!-- .nk-block -->
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
