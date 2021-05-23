@extends('dashboard.master.app')
@section('title')
   Create Vehicle Type
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
                                                <h4 class="nk-block-title">Create Vehicle Type</h4>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->

                                    <div class="nk-block">
                                        <div class="nk-data data-list">
                                                <form action="{{ route('vehicle-type.store') }}" method="POST">
                                                     @csrf

                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="name">Name</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                                                                @error('name')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-5">
                                                        <div class="form-group mt-4">
                                                            <button type="submit" class="btn btn-lg btn-primary">Add Vehicle Type</button>
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
                                                <th> Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody >

                                      @forelse($vehicle_types  as $type)
                                          <tr>
                                              <td>{{$loop->index+1}}</td>
                                              <td>{{ $type->name}}</td>
                                              <td>
                                                  <button class=" btn btn-sm btn-info" style="width: 62px;" class="mr-2" data-toggle="modal" data-target="#modal{{ $type->id}}"><em class="icon ni ni-edit"></em>Edit
                                                  </button>
                                                  <button class="btn btn-sm btn-danger" onclick="if(confirm('do you wont to ')){document.getElementById('vehicle_delete_form').submit();
                                                            }else{event.preventDefault();return false;}"><em class="icon ni ni-delete"></em>Delete</button>
                                                  <div class="modal fade" id="modal{{ $type->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog modal-lg" role="document">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="exampleModalLabel">Update Visit Type</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                              </button>
                                                            </div>
                                                              <div class="modal-body">
                                                                  <form action="{{ route('vehicle-type.update',$type->id) }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="_method" value="PUT">

                                                          <div class="">
                                                              <div class="form-group">
                                                                  <label class="form-label" for="name">Name</label>
                                                                  <div class="form-control-wrap">
                                                                      <input type="text" class="form-control @error('ename') is-invalid @enderror" id="name" name="ename" value="{{ $type->name}}">
                                                                      @error('ename')
                                                                          <div class="alert alert-danger">{{ $message }}</div>
                                                                      @enderror
                                                                  </div>
                                                              </div>
                                                          </div>

                                                                <div class="col-lg-5">
                                                                    <div class="form-group mt-4">
                                                                        <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="{{route('vehicle-type.destroy',$type->id)}}" method="POST" id="vehicle_delete_form">
                                                @csrf
                                                @method('DELETE')
                                                {{-- <button type="submit" class="btn-sm btn-danger" onclick="return confirm('Are you sure?')"><em class="icon ni ni-delete"></em> Delete</button> --}}
                                            </form>
                                              </td>
                                          </tr>
                                          @empty
                                               <h2 class="text-danger text-center">There is no Vehicle type</h2>
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
