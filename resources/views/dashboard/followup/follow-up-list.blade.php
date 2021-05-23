@extends('dashboard.master.app')
@section('title')
   Follow Up List
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
      <div class="container-fluid">
          <div class="nk-content-inner">
              <div class="nk-content-body">
                  <div class="components-preview wide-md mx-auto">
                       
                      <div class="nk-block nk-block-lg">
                          <div class="nk-block-head">
                              <div class="nk-block-head-content">
                                  <h4 class="nk-block-title">Follow Up LIST</h4> 
                              </div>
                          </div>
                          <div class="card card-preview">
                              <div class="card-inner">
                                  <table class="table datatable-init">
                                      <thead>
                                          <tr>
                                              <th>Sl</th> 
                                              <th>Customer Name</th> 
                                              <th>Visit Type</th> 
                                              <th>Client Status</th> 
                                              <th>Date</th> 
                                              <th>Details</th> 
                                              <th>Action</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>

            <table class="table datatable-init">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Customer Name</th>
                        <th>Next Activity </th>
                        <th>Last Activity</th>
                        <th>Client Status</th>
                        <th>Date</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                @forelse ($followups as $customer)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                    <td>
                        @if (!empty($customer->customer->name))
                        {{$customer->customer->name}}
                        @endif
                    </td>
                    @php
                        $followupLastTwo = App\FollowUp::orderby('id', 'desc')->where('customer_id',$customer->customer_id)->limit(2)->get();
                    @endphp
                   @forelse($followupLastTwo as $item)
                   <td>

<<<<<<< HEAD
                                              <td> 
                                                @if (!empty($customer->clientStatus->name))
                                                {{$customer->clientStatus->name}}
                                                @endif 
                                              </td>
                                                <td>
                                                    {{$customer->date}}
                                                </td>
                                              <td>
                                              <button  data-toggle="modal" data-target="#details{{$customer->id}}" class="btn btn-sm btn-warning"><em class="icon ni ni-eye"></em> View Details</button>
                                              </td>
                                              <td>
                                              <a href="{{route('followup.form',['id'=>$customer->customer_id])}}" class="btn btn-sm btn-info text-dark"><em class="icon ni ni-external"></em>Again Follow Up</a>
                                              </td>
                                              <td> 
                                                <form action="{{route('followup.destroy',$customer->id)}}" method="POST">       
                                                    @csrf
                                                    @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are your sure?')" class="text-danger"><em class="icon ni ni-delete-fill"></em>Delete</button>
=======
                    {{$item->visitType->name?? ''}}
                </td>
                 @empty
                 <td>{{ 'ddg' }}</td>
                   @endforelse
>>>>>>> 5c7b6bb072390796da140d84066c72028b8b077f

                        <td>
                        @if (!empty($customer->clientStatus->name))
                        {{$customer->clientStatus->name}}
                        @endif
                        </td>
                        <td>
                            {{$customer->date}}
                        </td>
                        <td>
                        <button  data-toggle="modal" data-target="#details{{$customer->id}}" class="btn btn-sm btn-warning"><em class="icon ni ni-eye"></em> View Details</button>
                        </td>
                        <td>
                        <a href="{{route('followup.form',['id'=>$customer->customer_id])}}" class="btn btn-sm btn-info text-dark"><em class="icon ni ni-external"></em>Again Follow Up</a>

                        <a href="{{route('meeting.form',['id'=>$customer->id])}}" class="btn btn-sm btn-info text-dark"><em class="icon ni ni-external"></em>Add Meeting</a>

                        <a href="{{route('project.form',['id'=>$customer->id])}}" class="btn btn-sm btn-info text-dark"><em class="icon ni ni-external"></em>Project Visit</a>
                        @php
                        $followupLastOne = App\FollowUp::orderby('id', 'desc')->where('customer_id',$customer->customer_id)->first();
                        @endphp
                        @if ($followupLastOne->visitType->name == 'outdoor visit')
                        <a href="{{route('requisition.form',['id'=>$customer->id])}}" class="btn btn-sm btn-info text-dark"><em class="icon ni ni-external"></em>Download Requisition</a>
                        @endif
                        </td>
                    </tr>

                        <!-- @@ Profile Edit Modal @e -->
                <div class="modal fade zoom" tabindex="-1" role="dialog" id="details{{$customer->id}}">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                            <div class="modal-body modal-body-lg">
                                <h5 class="title">Details</h5>
                                <ul class="nk-nav nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#personal">Lead Details</a>
                                    </li>
                                </ul><!-- .nav-tabs -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="personal">
                                        {!! $customer->details !!}
                                    </div><!-- .tab-pane -->
                                    </div>
                                    </div><!-- .tab-pane -->
                                </div><!-- .tab-content -->
                            </div><!-- .modal-body -->
                        </div><!-- .modal-content -->
                    </div><!-- .modal-dialog -->
                </div><!-- .modal -->

                    @empty
                    <h2 class="text-danger text-center">There is no List</h2>
                @endforelse




                </tbody>
            </table>

@endsection
