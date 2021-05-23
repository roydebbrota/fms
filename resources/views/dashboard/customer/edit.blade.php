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
                        <a href="#" class="btn btn-round btn-outline-secondary"><em class="icon ni ni-user"></em><span>New Customer</span> </a>

                        <a href="#" class="btn btn-round btn-info"><em class="icon ni ni-user"></em><span>Followup</span> </a>
                        <a href="#" class="btn btn-round btn-info"><em class="icon ni ni-user"></em><span>Project Visit</span> </a>
                        <a href="#" class="btn btn-round btn-info"><em class="icon ni ni-user"></em><span>Office Visit</span> </a>
                         
                        <div class="card card-bordered">
                          
                            <div class="card-aside-wrap">
                                <div class="card-inner card-inner-lg">
                                    
                                    <div class="nk-block-head nk-block-head-lg">

                                        
                                        <div class="nk-block-between">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Create New Customer</h4>
                                                <div class="nk-block-des">
                                                    <p>New Customer</p>
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
                                                            <label class="form-label" for=" name">Name</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="name" name="name">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label" for="mobile">Mobile No</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="mobile" name="mobile">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label">Profession</label>
                                                            <div data-search="on" class="form-control-wrap">
                                                                <select class="form-select" name="profession_id">
                                                                    <option value="">Select</option>
                                                                    
                                                                    @foreach (\App\Profession::get(); as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label" for="company">Company</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="company" name="company">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label" for="designation">Designation</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="designation" name="designation">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label" for="email">Email Id</label>
                                                            <div class="form-control-wrap">
                                                                <input type="email" class="form-control" id="email" name="email">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label">Source</label>
                                                            <div data-search="on" class="form-control-wrap">
                                                                <select class="form-select" name="source_id">
                                                                    <option value="">Select</option>
                                                                    @foreach (\App\Source::get(); as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label">Interested Project</label>
                                                            <div class="form-control-wrap">
                                                                <select data-search="on" class="form-select" name="project_id">
                                                                    <option value="">Select</option>
                                                                    @foreach (\App\InterestProject::get(); as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label">Plot Size</label>
                                                            <div class="form-control-wrap">
                                                                <select data-search="on" class="form-select" name="plot_id">
                                                                    <option value="">Select</option>
                                                                    @foreach (\App\PlotSize::get(); as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label" for="budget">Budget</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="budget" name="budget">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label">Client Status</label>
                                                            <div class="form-control-wrap">
                                                                <select data-search="on" class="form-select" name="client_status_id">
                                                                    <option value="">Select</option>
                                                                    @foreach (\App\ClientStatus::get(); as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Text</label>
                                                            <div class="card card-bordered">
                                                                <div class="card-inner"> 
                                                                    <textarea name="text" class="summernote-basic"  ></textarea>
                                                                </div>
                                                            </div> 
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