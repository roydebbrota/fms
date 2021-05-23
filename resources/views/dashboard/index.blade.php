@extends('dashboard.master.app')
@section('title')
    YouthFireIT | Dashboard
@endsection

@section('content')
 <!-- content @s -->
 <div class="nk-content ">
  <div class="container-fluid">
      <div class="nk-content-inner">
          <div class="nk-content-body">
              <div class="nk-block">
                  <div class="row g-gs">
                      <div class="col-xxl-12">
                        <div class="row g-gs">
                            <div class="col-sm-6 col-lg-12 col-xxl-12">
                              <h3 class="title text-info">Find By Date</h3>
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <div class="card-title-group align-start mb-2">
                                            <div class="card-title">

                                    <form id="filterForm" action="{{route('filter.by.date')}}" method="POST">
                                      @csrf
                                      <div class="row g-4">
                                          <div class="col-lg-4 ">
                                              <div class="form-group">
                                                  <label class="form-label" for="to">from</label>
                                                  <div class="form-control-wrap">
                                                      <input name="from" type="text" class="form-control date-picker" id="from" autocomplete="off">
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="col-lg-4">
                                              <div class="form-group">
                                                  <label class="form-label" for="to">to</label>
                                                  <div class="form-control-wrap ">
                                                      <input name="to"  class="form-control date-picker" id="to" autocomplete="off">
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="col-lg-4">
                                              <div class="form-group">
                                                  <label class="form-label" for="to">Filter</label>
                                                  <div class="form-control-wrap ">
                                                       <button class="btn btn-md btn-warning">Filter</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </form>

                                    </div>
                                            <div class="card-tools">
                                                <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Find By Date"></em>
                                            </div>
                                        </div>
                                        <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">

                                        </div>
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->

                            <div class="col-sm-6 col-lg-12 col-xxl-12">
                                <div class="card card-bordered">
                                    <div id="filterData" class="card-inner">





                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                      </div><!-- .col -->



                      <div class="col-xxl-12">
                        <div class="nk-block-head-content">
                          <h3 class="nk-block-title page-title text-info">Upcoming Visit</h3>
                          <div class="nk-block-des text-soft">
                              <p></p>
                          </div>
                        </div>
                          <div class="card card-bordered card-full">

                              <div class="card-inner p-0 border-top">
                                  <div class="nk-tb-list nk-tb-orders">
                                      <div class="nk-tb-item nk-tb-head">
                                          <div class="nk-tb-col"><span>SL</span></div>
                                          <div class="nk-tb-col tb-col-sm"><span>Customer</span></div>
                                          <div class="nk-tb-col tb-col-md"><span>Next Followup Date</span></div>
                                          <div class="nk-tb-col tb-col-lg"><span>Visit Type</span></div>
                                          <div class="nk-tb-col"><span class="d-none d-sm-inline">Status</span></div>
                                          <div class="nk-tb-col"><span>&nbsp;</span></div>
                                      </div>
                                      @forelse ($latest as $item)
                                      <div class="nk-tb-item">
                                        <div class="nk-tb-col">
                                            <span class="tb-lead"><a href="#">{{$loop->index + 1}}</a></span>
                                        </div>
                                        <div class="nk-tb-col tb-col-sm">
                                            <div class="user-card">
                                                <div class="user-name">
                                                    <span class="tb-lead">{{$item->customer->name}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span class="tb-sub">{{ $item->next_follow_up_date }}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-lg">
                                            <span class="tb-sub text-primary">{{ $item->visitType->name }}</span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="badge badge-dot badge-dot-xs badge-success">{{ $item->clientStatus->name }}</span>
                                        </div>
                                        {{-- <div class="nk-tb-col nk-tb-col-action">
                                            <div class="dropdown">
                                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                    <ul class="link-list-plain">
                                                        <li><a href="#">View</a></li>
                                                        <li><a href="#">Invoice</a></li>
                                                        <li><a href="#">Print</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> --}}
                                      </div>
                                      @empty
                                          <h2 class="text-center text-warning">There is no followup</h2>
                                      @endforelse


                                  </div>
                              </div>


                              <div class="card-inner-sm border-top text-center d-sm-none">
                                  <a href="#" class="btn btn-link btn-block">See History</a>
                              </div>
                          </div><!-- .card -->
                      </div><!-- .col -->



                  </div><!-- .row -->
              </div><!-- .nk-block -->
          </div>
      </div>
  </div>
</div>
<!-- content @e -->
    <div id="overlay">
    <div class="loader"></div>
    </div>
    <style>#overlay .loader{display: none} </style>
@endsection


@section('scripts')
<script>
  $('#filterForm').submit(function(e){
  e.preventDefault();
  let url = $(this).attr('action');
  let method = $(this).attr('method');
  let data = $(this).serialize();
  // alert(data);
  $('#overlay .loader').show();
  $.ajax({
      type: method,
      url: url,
      data: data,
      success: function(data){
        $('#overlay .loader').hide();
        $('#filterData').empty().html(data);
      }
  });
});
</script>
@endsection
