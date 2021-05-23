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
                                                <h4 class="nk-block-title">Create New Team</h4>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->

                                    <div class="nk-block">
                                        <div class="nk-data data-list">
                                                <form action="{{ route('team.store') }}" method="POST">
                                                     @csrf

                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label" for="team_name">Team Name :</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('team_name') is-invalid @enderror" id="team_name" name="team_name" value="{{ old('team_name') }}">
                                                                @error('team_name')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label class="form-label" for="group_id">Select Group :</label>
                                                            <div data-search="on" class="form-control-wrap @error('group_id') is-invalid @enderror">
                                                                <select class="form-select" name="group_id">
                                                                    <option value="">Select</option>
                                                                    @forelse (\App\Group::get(); as $group)
                                                                <option value="{{$group->id}}">{{$group->name}}</option>
                                                                    @empty
                                                                <option value="">No Group Here</option>
                                                                    @endforelse
                                                                </select>
                                                            </div>

                                                            @error('group_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-5">
                                                        <div class="form-group mt-4">
                                                            <button type="submit" class="btn btn-lg btn-primary">Add Team</button>
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>
                                    <!-- .nk-block -->
                                </div>
                                <div class="mt-4">
                                    <table class="table datatable-init">
                                        <thead>
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Team Name</th>
                                                <th>Group Name</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody >

                                            @forelse($allTeamName  as $teamName)
                                                <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>{{ $teamName->name}}</td>
                                                    <td>{{ $teamName->group->name}}</td>
                                                    <td>
                                                        <button class=" btn btn-sm btn-info" style="width: 62px;" class="mr-2" data-toggle="modal" data-target="#modal{{ $teamName->id}}"><em class="icon ni ni-edit-alt"></em>Edit
                                                        </button>
                                                        <button class="btn btn-sm btn-danger" onclick="if(confirm('do you wont to ')){document.getElementById('team_delete_form').submit();
                                                            }else{event.preventDefault();return false;}"><em class="icon ni ni-delete"></em>Delete</button>
                                                        <div class="modal fade" id="modal{{ $teamName->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Update Team</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>
                                                                   <div class="modal-body">
                                                                        <form action="{{ route('team.update',$teamName->id) }}" method="POST">
                                                                         @csrf
                                                                         <input type="hidden" name="_method" value="PUT">

                                                                            <div class="col-lg-7">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for=" eteam_name">Team Name</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="text" class="form-control @error('eteam_name') is-invalid @enderror" id="eteam_name" name="eteam_name" value="{{ $teamName->name}}">
                                                                                        @error('eteam_name')
                                                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-7">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="egroup_id">Select Group :</label>
                                                                                    <div data-search="on" class="form-control-wrap @error('egroup_id') is-invalid @enderror">
                                                                                        <select class="form-select" name="egroup_id">
                                                                                            <option value="">Select</option>
                                                                                            @forelse (\App\Group::get(); as $group)
                                                                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                                                                            @empty
                                                                                        <option value="">No Group Here</option>
                                                                                            @endforelse
                                                                                        </select>
                                                                                    </div>

                                                                                    @error('egroup_id')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-5">
                                                                                <div class="form-group mt-4">
                                                                                    <button type="submit" class="btn btn-lg btn-primary">Update Team</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <form action="{{route('team.destroy',$teamName->id)}}" method="POST" id="team_delete_form">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>

                                                    </td>
                                                </tr>
                                            @empty
                                            <h4 class="text-center">Please Add Some Team</h4>
                                            @endforelse
                                        </tbody>
                                    </table>
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
