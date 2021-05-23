@extends('dashboard.master.app')
@section('title')
    Dash Board
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
                                                <h4 class="nk-block-title">Create New Client Status</h4>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->

                                    <div class="nk-block">
                                        <div class="nk-data data-list">
                                                <form action="{{ route('cliectstatus.store') }}" method="POST">
                                                     @csrf

                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="clientstatus">Client Status</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('clientstatus') is-invalid @enderror" id="clientstatus" name="clientstatus">
                                                                @error('clientstatus')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-5">
                                                        <div class="form-group mt-4">
                                                            <button type="submit" class="btn btn-lg btn-primary">Add Client Status</button>
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
                                                <th> Client Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody >

                                            @forelse($allClientstatus  as $clientstatus)
                                                <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>{{ $clientstatus->name}}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-info" style="width: 63px;" data-toggle="modal" data-target="#modal{{ $clientstatus->id}}"><em class="icon ni ni-edit-alt"></em>Edit
                                                        </button>
                                                        <button class="btn btn-sm btn-danger" onclick="if(confirm('do you wont to delete')){document.getElementById('clientststus_delete_form').submit();
                                                            }else{event.preventDefault();return false;}">Delete</button>
                                                        <div class="modal fade" id="modal{{ $clientstatus->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Update Client Status</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>
                                                                   <div class="modal-body">
                                                                        <form action="{{ route('cliectstatus.update',$clientstatus->id) }}" method="POST">
                                                                         @csrf
                                                                         <input type="hidden" name="_method" value="PUT">

                                                                            <div class="">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for=" eclientstatus">Client Status</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="text" class="form-control @error('eclientstatus') is-invalid @enderror" id="eclientstatus}" name="eclientstatus" value="{{ $clientstatus->name}}">
                                                                                        @error('eclientstatus')
                                                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-5">
                                                                                <div class="form-group mt-4">
                                                                                    <button type="submit" class="btn btn-lg btn-primary">Update Size</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <form action="{{ route('cliectstatus.destroy',$clientstatus->id) }}" method="POST" id="clientststus_delete_form">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>

                                                    </td>
                                                </tr>
                                            @empty
                                            <h4> No Client Status Available</h4>
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

