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
                                                <h4 class="nk-block-title text-primary">Client Information</h4>
                                            </div>

                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFollowUp">Follow Up Again</button>
                                        </div>
                                    </div>


                        <div class="mt-5">
                            <div class="row mb-3">
                                    <label for="emp_name" class="col-md-2 col-form-label text-center mb-3">Client Name :</label>
                                    <div class="col-md-4  mb-3">
                                        <input type="text" class="form-control" id="emp_name" name="emp_name" value="{{$customer_info->name?? $customer_info->name}}" readonly>
                                    </div>

                                    <label for="inputEmail3" class="col-md-2 col-form-label text-center mb-3">Profession :</label>
                                    <div class="col-md-4 mb-3">
                                        <input type="email" value="{{$customer_info->profession->name?? $customer_info->profession->name}}" class="form-control" id="inputEmail3" readonly>
                                    </div>

                                    <label for="inputEmail3" class="col-md-2 col-form-label text-center mb-3">Address :</label>
                                    <div class="col-md-4  mb-3">
                                         {!!$customer_info->address?? $customer_info->address!!}
                                    </div>

                                    <label for="inputEmail3" class="col-md-2 col-form-label text-center mb-3">Office Address :</label>
                                    <div class="col-md-4  mb-3">
                                        <div class="col-md-4  mb-3">
                                            {!!$customer_info->office_address?? $customer_info->office_address!!}
                                       </div>
                                    </div>


                                    <label for="inputEmail3" class="col-md-2 col-form-label text-center mb-3">Mobile :</label>
                                    <div class="col-md-4  mb-3">
                                        <input type="text" class="form-control"id="inputEmail3" value="{{$customer_info->mobile_one?? $customer_info->mobile_one}}" readonly > <br>
                                        <input type="text" value="{{$customer_info->mobile_two?? $customer_info->mobile_two}}" class="form-control"  readonly >

                                    </div>

                                    <label for="inputEmail3" class="col-md-2 col-form-label text-center mb-3">Res. Phone :</label>

                                    <div class="col-md-4  mb-3">
                                        <input value="{{$customer_info->phone?? $customer_info->phone}}" type="text" class="form-control" id="inputEmail3" readonly>
                                    </div>

                                    <label for="inputEmail3" class="col-md-2 col-form-label text-center mb-3">Email :</label>
                                    <div class="col-md-4  mb-3">
                                        <input value="{{$customer_info->email?? $customer_info->email}}" type="text" class="form-control" id="inputEmail3" readonly>
                                    </div>



                                    <label for="inputEmail3" class="col-md-2 col-form-label text-center mb-3">Sales Person:</label>
                                    <div class="col-md-4  mb-3">
                                        <input value="{{$customer_info->user->name?? $customer_info->user->name}}" type="text" class="form-control" id="inputEmail3" readonly>
                                    </div>

                                    <label for="inputEmail3" class="col-md-2 col-form-label text-center mb-3">Status:</label>
                                    <div class="col-md-4  mb-3">
                                        <input value="{{$customer_info->clientStatus->name?? $customer_info->clientStatus->name}}" type="text" class="form-control" id="inputEmail3" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-aside-wrap">
                                <div class="card-inner card-inner-lg">
                                    <div class="nk-block-head nk-block-head-lg">
                                        <div class="nk-block-between">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title text-primary">Client Interest</h4>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Project Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $projects = json_decode($customer_info->project_id);
                                                @endphp
                                                @forelse ($projects as $project)
                                                <tr>
                                                    <td>{{$loop->index + 1}}</td>
                                                    @php
                                                        $name = App\InterestProject::where('id',$project)->first()
                                                    @endphp
                                                    <td>{{$name->name}}</td>
                                                </tr>
                                                @empty
                                                    <h3 class="text-warning text-center">There is no interest project</h3>
                                                @endforelse

                                            </tbody>
                                        </table>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-aside-wrap">
                                <div class="card-inner card-inner-lg">
                                    <div class="nk-block-head nk-block-head-lg">
                                        <div class="nk-block-between">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title text-primary">Discussion Details</h4>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>Contact</th>
                                                    <th>Discussion Details</th>
                                                    <th>Next Contact</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($followups as $followup)
                                                <tr>
                                                    <td>{{$loop->index + 1}}</td>
                                                    @php
                                                       $created = \Carbon\Carbon::parse($followup->created_at);

                                                       $nextDate = \Carbon\Carbon::parse($followup->next_follow_up_date);
                                                    @endphp
                                                    <td>
                                                        {{ $created->format('M d Y') }}
                                                    </td>
                                                    <td>{!!$followup->details!!}</td>
                                                    <td>{{$nextDate->format('M d Y')}}</td>

                                                </tr>
                                                @empty
                                                <h3 class="text-warning text-center">There Is No Descussion Details</h3>
                                                 @endforelse
                                            </tbody>
                                        </table>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <!-- Modal Trigger Code -->

<!-- Modal Content Code -->
<div class="modal fade" tabindex="-1" id="modalFollowUp">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close text-dark bg-danger" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header bg-info">
                <h5 class="modal-title">Follow Up Again</h5>
            </div>
            <div class="modal-body">
                <form id="followupForm" action="{{route('followup.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="users_id" value="{{$user_id}}">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label" for="visit_type_id">Next Step</label>
                            <div data-search="on" class="form-control-wrap">
                                <select class="form-select @error('visit_type_id') is-invalid @enderror" id="visit_type_id" name="visit_type_id">
                                    <option value="">Select</option>
                                    @foreach (\App\VisitType::get(); as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('visit_type_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Client Status</label>
                            <div class="form-control-wrap">
                                <select data-search="on" class="form-select  @error('client_status_id') is-invalid @enderror" name="client_status_id">
                                    <option value="">Select</option>
                                    @foreach (\App\ClientStatus::get(); as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('client_status_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label" for="date">Date</label>
                            <div class="form-control-wrap">
                                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" autocomplete="off">
                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label" for="next_follow_up_date">Next Follow Up Date</label>
                            <div class="form-control-wrap">
                                <input type="date" class="form-control @error('next_follow_up_date') is-invalid @enderror" id="next_follow_up_date" name="next_follow_up_date" autocomplete="off">
                            @error('next_follow_up_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="details" class="form-label">Details</label>
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <textarea name="details" id="details" class="summernote-basic @error('details') is-invalid @enderror"  ></textarea>
                            @error('details')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">

                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary ">Next Followup</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


            {{-- <div class="nk-block">
                <div class="card card-bordered">

                    <div class="card-aside-wrap">
                        <div class="card-inner card-inner-lg">

                            <div class="nk-block-head nk-block-head-lg">

                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Follow Up</h4>
                                    </div>
                                    <div class="nk-block-head-content align-self-start d-lg-none">
                                        <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                    </div>
                                </div>
                            </div>
                            <!-- .nk-block-head -->

                            <div class="nk-block">
                                <div class="nk-data data-list">
                                <form action="{{route('followup.store')}}" method="POST">
                                            @csrf

                                            <input type="hidden" name="users_id" value="{{$user_id}}">

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

                                                    @error('profession_id')
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
                                            <div class="col-lg-7">
                                                <div class="form-group @error('next_follow_up_date') is-invalid @enderror">
                                                    <label class="form-label" for="next_follow_up_date">Next Follow Up Date</label>
                                                    <div class="form-control-wrap">
                                                        <input type="date" class="form-control" id="next_follow_up_date" name="next_follow_up_date" autocomplete="off">
                                                    </div>

                                                    @error('next_follow_up_date')
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
            </div> --}}
            <!-- .nk-block -->
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
 <script src="./assets/js/example-sweetalert.js?ver=1.9.2"></script>
@if(Session::has('modalError'))
<script>
  $('#modalFollowUp').modal('show');
</script>
@endif
 @endsection

