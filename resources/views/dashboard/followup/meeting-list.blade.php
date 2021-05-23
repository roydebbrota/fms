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

                          <div class="nk-block-head">
                              <div class="nk-block-head-content">
                                  <h4 class="nk-block-title">Meeting LIST</h4>
                              </div>
                          </div>
                          <div class="card card-preview">
                              <div class="card-inner">
                                  <table class="table datatable-init">
                                      <thead>
                                          <tr>
                                              <th>Sl</th>
                                              <th>Customer Name</th>
                                              <th>Meeting Type</th>
                                              <th>Meeting Time</th>
                                              <th>Meeting Address</th>
                                              <th>Next Step</th>
                                              <th>Client Status</th>
                                              <th>Date</th>
                                              <th>Details</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>

                                        @forelse ($meetings as $meeting)
                                            <tr>
                                              <td>{{$loop->index+1}}</td>
                                            <td>
                                                @if (!empty($meeting->customer->name))
                                                {{$meeting->customer->name}}
                                                @endif
                                            </td>

                                            <td>
                                                @if (!empty($meeting->meetingType->name))
                                                {{$meeting->meetingType->name}}
                                                @endif
                                            </td>

                                            <td>
                                                {{\Carbon\Carbon::createFromFormat('H:i:s',$meeting->meeting_time)->format('h:i A')}}

                                            </td>

                                            <td>
                                                {{$meeting->meeting_address}}
                                            </td>

                                            <td>
                                                @if (!empty($meeting->visitType->name))
                                                {{$meeting->visitType->name}}
                                                @endif
                                            </td>

                                              <td>
                                                    @if (!empty($meeting->clientStatus->name))
                                                    {{$meeting->clientStatus->name}}
                                                    @endif
                                              </td>

                                                <td>
                                                    {{$meeting->date}}
                                                </td>

                                               <td>
                                              <a data-toggle="modal" data-target="#details{{$meeting->id}}" class="btn btn-sm btn-warning"><em class="icon ni ni-eye"></em> View Details</a>
                                               </td>

                                              <td>
                                                <a href="{{route('meeting.form',['id'=>$meeting->customer_id])}}" class="btn btn-sm btn-info text-dark"><em class="icon ni ni-external"></em>Again Meeting</a>

                                                <form action="{{route('meeting.destroy',$meeting->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are your sure?')" class="text-danger"><em class="icon ni ni-delete-fill"></em>Delete</button>

                                                </form>
                                              </td>
                                            </tr>

                                             <!-- @@ Profile Edit Modal @e -->
                                        <div class="modal fade zoom" tabindex="-1" role="dialog" id="details{{$meeting->id}}">
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
                                                                {!! $meeting->details !!}
                                                            </div><!-- .tab-pane -->
                                                            </div>
                                                            </div><!-- .tab-pane -->
                                                        </div><!-- .tab-content -->
                                                    </div><!-- .modal-body -->
                                                </div><!-- .modal-content -->
                                            </div><!-- .modal-dialog -->
                                        </div><!-- .modal -->

                                            @empty
                                            <h2 class="text-danger text-center">There is no Meeting</h2>
                                        @endforelse




                                      </tbody>
                                  </table>

  <!-- content @e -->

@endsection
