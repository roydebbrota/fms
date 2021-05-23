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
                                                <h4 class="nk-block-title">Create New Lead</h4>
                                                <div class="nk-block-des">
                                                    <p>New Lead</p>
                                                </div>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->

                                    <div class="nk-block">
                                        <div class="nk-data data-list">
                                        <form action="{{route('customer.store')}}" method="POST">
                                                  @csrf
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label" for=" name">Name<span class="text-danger">*</span></label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name">
                                                            </div>

                                                            @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label" for="phone">Phone<span class="text-danger">*</span></label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" id="phone" name="phone">
                                                            </div>

                                                            @error('phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label" for="mobile_one">Mobile 1</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('mobile_one') is-invalid @enderror" value="{{ old('mobile_one') }}" id="mobile_one" name="mobile_one">
                                                            </div>

                                                            @error('mobile_one')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label" for="mobile_two">Mobile 2</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('mobile_two') is-invalid @enderror" value="{{ old('mobile_two') }}" id="mobile_two" name="mobile_two">
                                                            </div>

                                                            @error('mobile_two')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label" for="address">Address</label>
                                                            <div class="card card-bordered">
                                                                <div class="card-inner">
                                                                    <textarea name="address" class="summernote-basic form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" id="address" name="address"></textarea>
                                                                </div>
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
                                                            <label class="form-label" for="office_address">Office Address</label>
                                                            <div class="card card-bordered">
                                                                <div class="card-inner">
                                                                    <textarea name="office_address" class="summernote-basic form-control @error('office_address') is-invalid @enderror" value="{{ old('office_address') }}" id="office_address" name="office_address"></textarea>
                                                                </div>
                                                            </div>

                                                            @error('office_address')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label">Profession<span class="text-danger">*</span></label>
                                                            <div data-search="on" class="form-control-wrap @error('profession_id') is-invalid @enderror">
                                                                <select class="form-select" name="profession_id">
                                                                    <option value="">Select</option>

                                                                    @foreach (\App\Profession::get(); as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            @error('profession_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label" for="company">Company</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" value="{{ old('company') }}" name="company">
                                                            </div>

                                                            @error('company')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label" for="designation">Designation</label>
                                                            <div class="form-control-wrap @error('designation') is-invalid @enderror">
                                                                <input type="text" class="form-control" id="designation" name="designation" value="{{ old('designation') }}">
                                                            </div>

                                                            @error('designation')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label" for="email">Email Id</label>
                                                            <div class="form-control-wrap @error('email') is-invalid @enderror">
                                                                <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email">
                                                            </div>
                                                            @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label">Source</label>
                                                            <div data-search="on" class="form-control-wrap @error('source_id') is-invalid @enderror">
                                                                <select class="form-select" name="source_id">
                                                                    <option value="">Select</option>
                                                                    @foreach (\App\Source::get(); as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            @error('source_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label">Interested Project</label>
                                                            <div class="form-control-wrap">
                                                                <select data-search="on"  multiple="multiple" data-placeholder="Select Multiple options" class="form-select @error('project_id') is-invalid @enderror" name="project_id[]">
                                                                    <option value="">Select</option>
                                                                    @foreach (\App\InterestProject::get(); as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @error('project_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label">Plot Size</label>
                                                            <div class="form-control-wrap @error('plot_id') is-invalid @enderror">
                                                                <select data-search="on" class="form-select" name="plot_id">
                                                                    <option value="">Select</option>
                                                                    @foreach (\App\PlotSize::get(); as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @error('plot_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group @error('budget') is-invalid @enderror">
                                                            <label class="form-label" for="budget">Budget</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="budget" name="budget">
                                                            </div>

                                                            @error('budget')
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
                                                        <div class="form-group @error('discussion_details') is-invalid @enderror">
                                                            <label class="form-label">Discussion Ddetails</label>
                                                            <div class="card card-bordered">
                                                                <div class="card-inner">
                                                                    <textarea name="discussion_details" class="summernote-basic"  ></textarea>
                                                                </div>
                                                            </div>

                                                            @error('discussion_details')
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
 @section('scripts')
 <link rel="stylesheet" href="./assets/css/editors/summernote.css?ver=1.9.2">
 <script src="./assets/js/libs/editors/summernote.js?ver=1.9.2"></script>
 <script src="./assets/js/editors.js?ver=1.9.2"></script>
 @endsection
