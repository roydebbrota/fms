@extends('dashboard.master.app')
@section('title')
   Project Visit Type
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

    <div class="nk-block-head-content">
        <h4 class="nk-block-title">Project Visit LIST</h4>
    </div>
</div>
<table class="table datatable-init">
    <thead>
        <tr>
            <th>Sl</th>
            <th>Customer Name</th>
            <th>Project</th>
            <th>Visit Time</th>
            <th>Vehicles Type</th>
            <th>No of client</th>
            <th>Pick Up Place</th>
            <th>Next Step</th>
            <th>Date</th>
            <th>Client Status</th>
            <th>Details</th>
            <th>Again Project Visit</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

    @forelse ($project_visits as $project_visit)
        <tr>
            <td>{{$loop->index+1}}</td>
        <td>
            @if (!empty($project_visit->customer->name))
            {{$project_visit->customer->name}}
            @endif
        </td>

        <td>
            @if (!empty($project_visit->project->name))
            {{$project_visit->project->name}}
            @endif
        </td>

        <td>
            {{\Carbon\Carbon::createFromFormat('H:i:s',$project_visit->visit_time)->format('h:i A')}}
        </td>

        <td>
            @if (!empty($project_visit->vehicleType->name))
            {{$project_visit->vehicleType->name}}
            @endif
        </td>

        <td>
            {{$project_visit->no_of_client}}
        </td>

        <td>
            {{$project_visit->pick_up_place}}
        </td>

        <td>
            @if (!empty($project_visit->visitType->name))
            {{$project_visit->visitType->name}}
            @endif
        </td>

        <td>
            {{$project_visit->date}}
        </td>

        <td>
            @if (!empty($project_visit->clientStatus->name))
            {{$project_visit->clientStatus->name}}
            @endif
        </td>

            <td>
            <button  data-toggle="modal" data-target="#details{{$project_visit->id}}" class="btn btn-sm btn-warning"><em class="icon ni ni-eye"></em> View Details</button>
            </td>

            <td>
            <a href="{{route('project.form',['id'=>$project_visit->customer_id])}}" class="btn btn-sm btn-info text-dark"><em class="icon ni ni-external"></em>Again Project Visit</a>
            </td>

            <td>
            <form action="{{route('project-visit.destroy',$project_visit->id)}}" method="POST">
                @csrf
                @method('DELETE')
            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are your sure?')" class="text-danger"><em class="icon ni ni-delete-fill"></em>Delete</button>

            </form>
            </td>
        </tr>

            <!-- @@ Profile Edit Modal @e -->
    <div class="modal fade zoom" tabindex="-1" role="dialog" id="details{{$project_visit->id}}">
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
                            {!! $project_visit->details !!}
                        </div><!-- .tab-pane -->
                        </div>
                        </div><!-- .tab-pane -->
                    </div><!-- .tab-content -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->

        @empty
        <h2 class="text-danger text-center">There is no Project Visit</h2>
    @endforelse
    </tbody>
</table>
  <!-- content @e -->

@endsection
