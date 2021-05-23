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
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Lead List</h4>
        </div>
    </div>
    <div class="mt-4">
        <table class="table datatable-init">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Profession Name</th>
                    <th>Company</th>
                    <th>Designation</th>
                    <th>Email</th>
                    <th>Source</th>
                    <th>Project</th>
                    <th>Plot</th>
                    <th>Budget</th>
                    <th>Client Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            @forelse ($customers as $customer)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->mobile}}</td>
                    <td>
                    @if (!empty($customer->profession->name))
                    {{$customer->profession->name}}
                    @endif
                    </td>
                    <td>{{$customer->company}}</td>
                    <td>

                    {{$customer->designation}}

                    </td>
                    <td>
                    @if (!empty($customer->email))
                        {{$customer->email}}
                    @endif
                    </td>
                    <td>
                    @if (!empty($customer->source->name))
                        {{$customer->source->name}}
                    @endif
                    </td>

                    <td>
                    @if (!empty($customer->project->name))
                    {{$customer->project->name}}
                    @endif
                    </td>

                    <td>
                    @if (!empty($customer->plot->name))
                    {{$customer->plot->name}}
                    @endif
                    </td>
                    <td>{{$customer->budget}}</td>
                    <td>
                    @if (!empty($customer->clientStatus->name))
                    {{$customer->clientStatus->name}}
                    @endif
                    </td>

                    <td>
                        
                    <a href="{{route('followup.form',['id'=>$customer->id])}}" class="btn btn-sm btn-info text-dark"><em class="icon ni ni-external"></em>Follow Up</a>

                    <button class="btn btn-sm btn-danger" onclick="if(confirm('do you wont to ')){document.getElementById('delete_form').submit();
                    }else{event.preventDefault();return false;}">Delete</button>

                    <form action="{{route('customer.destroy',$customer->id)}}" method="POST" id="delete_form">
                        @csrf
                        @method('DELETE')
                        
                    </form>
                    </td>

                </tr>
                @empty
                <h2 class="text-danger">There is no Lead</h2>
            @endforelse



            </tbody>
        </table>
    </div>
  <!-- content @e -->
@endsection
