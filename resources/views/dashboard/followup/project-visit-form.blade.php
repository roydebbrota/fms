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
                                                <h4 class="nk-block-title">Add Project Visit</h4>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->

                                    <div class="nk-block">
                                        <div class="nk-data data-list">
                                        <form action="{{route('project-visit.store')}}" method="POST">
                                                  @csrf
                                                  <input type="hidden" name="users_id" value="{{$user_id}}">

                                                  <div class="col-lg-7">
                                                      <div class="form-group">
                                                          <label class="form-label">Project</label>
                                                          <div data-search="on" class="form-control-wrap @error('project_type_id') is-invalid @enderror">
                                                              <select class="form-select" name="project_type_id">
                                                                  <option value="">Select</option>
                                                                  @foreach (\App\InterestProject::get(); as $item)
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
                                                          <label class="form-label" for="time">Visit Time</label>
                                                          <div class="form-control-wrap">
                                                              <input type="time" name="time" value="22:00" class="form-control" id="time" autocomplete="off">
                                                          </div>

                                                          @error('time')
                                                          <span class="invalid-feedback" role="alert">
                                                              <strong>{{ $message }}</strong>
                                                          </span>
                                                        @enderror
                                                      </div>
                                                  </div>

                                                  <div class="col-lg-7">
                                                      <div class="form-group">
                                                          <label class="form-label">Vehicle Type</label>
                                                          <div data-search="on" class="form-control-wrap @error('vehicle_type_id') is-invalid @enderror">
                                                              <select class="form-select" name="vehicle_type_id">
                                                                  <option value="">Select</option>
                                                                  @foreach (\App\VehicleType::get(); as $item)
                                                                   <option value="{{$item->id}}">{{$item->name}}</option>
                                                                  @endforeach
                                                              </select>
                                                          </div>

                                                          @error('vehicle_type_id')
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
                                                    <div class="form-group @error('no_of_client') is-invalid @enderror">
                                                        <label class="form-label" for="no_of_client">No of Client</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="date" name="no_of_client" autocomplete="off">
                                                        </div>

                                                        @error('no_of_client')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                      @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-7">
                                                    <div class="form-group @error('pick_up_place') is-invalid @enderror">
                                                        <label class="form-label" for="pick_up_place">Client Pick Up Place</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="date" name="pick_up_place" autocomplete="off">
                                                        </div>

                                                        @error('pick_up_place')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                      @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group @error('staff_up_place') is-invalid @enderror">
                                                        <label class="form-label" for="staff_up_place">Staff Pick Up Place</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="date" name="staff_up_place" autocomplete="off">
                                                        </div>

                                                        @error('staff_up_place')
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
                                                            <button type="submit" class="btn btn-lg btn-primary">Add Project Visit</button>
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
 @section('scripts')
 <link rel="stylesheet" href="./assets/css/editors/summernote.css?ver=1.9.2">
 <script src="./assets/js/libs/editors/summernote.js?ver=1.9.2"></script>
 <script src="./assets/js/editors.js?ver=1.9.2"></script>
 @endsection
