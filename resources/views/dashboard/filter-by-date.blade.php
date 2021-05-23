<div class="card-inner p-0 border-top">
    <h2 class="text-info">Followup List</h2>
    <div class="nk-tb-list nk-tb-orders">
        <div class="nk-tb-item nk-tb-head">
            <div class="nk-tb-col"><span>SL</span></div>
            <div class="nk-tb-col tb-col-sm"><span>Customer</span></div>
            <div class="nk-tb-col tb-col-md"><span>Next Followup Date</span></div>
            <div class="nk-tb-col tb-col-lg"><span>Visit Type</span></div> 
            <div class="nk-tb-col"><span class="d-none d-sm-inline">Status</span></div>
            <div class="nk-tb-col"><span>&nbsp;</span></div>
        </div>
        @forelse ($filters as $item)
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