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
                                                <h4 class="nk-block-title">Create New Profession</h4>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->

                                    <div class="nk-block">
                                        <div class="nk-data data-list">
                                                <form action="{{ route('profession.store') }}" method="POST">
                                                     @csrf

                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for=" profession_name">Profession Name</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('profession_name') is-invalid @enderror" id="profession_name" name="profession_name">
                                                                @error('profession_name')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-5">
                                                        <div class="form-group mt-4">
                                                            <button type="submit" class="btn btn-lg btn-primary">Add Profession</button>
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
                                                <th> Profession Name</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody >

                                            @foreach($allProfessionName  as $professionName)
                                                <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>{{ $professionName->name}}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-info" style="width: 63px;" class="mr-2" data-toggle="modal" data-target="#modal{{ $professionName->name}}"><em class="icon ni ni-edit-alt"></em>Edit
                                                        </button>
                                                        <button class="btn btn-sm btn-danger" onclick="if(confirm('do you wont to delete')){document.getElementById('profession_delete_form').submit();
                                                            }else{event.preventDefault();return false;}"><em class="icon ni ni-delete"></em>Delete
                                                            </button>
                                                        <div class="modal fade" id="modal{{ $professionName->name}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Update Profession</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>
                                                                   <div class="modal-body">
                                                                        <form action="{{ route('profession.update',$professionName->id) }}" method="POST">
                                                                         @csrf
                                                                         <input type="hidden" name="_method" value="PUT">

                                                                            <div class="col-lg-7">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for=" eprofession_name">Profession Name</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="text" class="form-control @error('eprofession_name') is-invalid @enderror" id="eprofession_name" name="eprofession_name" value="{{ $professionName->name}}">
                                                                                        @error('eprofession_name')
                                                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-5">
                                                                                <div class="form-group mt-4">
                                                                                    <button type="submit" class="btn btn-lg btn-primary">Update Profession</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <form action="{{route('profession.destroy',$professionName->id)}}" method="POST" id="profession_delete_form">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach
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
