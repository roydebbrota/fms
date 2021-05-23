
<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
        <a href="{{route('home')}}" class="logo-link nk-sidebar-logo">
        <img class="logo-light logo-img" src=" " alt="logo">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="javascript:void(0)" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        </div>

    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <div class="form-group">
                    {{-- <h6 class="nk-menu-text">@lang('messages.change_language')</h6>
                    <div class="form-control-wrap">
                        <select class="form-select changeLang">
                             <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>@lang('messages.english')</option>

                            <option value="bn" {{ session()->get('locale') == 'bn' ? 'selected' : '' }}>@lang('messages.bangla')</option>
                        </select>
                    </div> --}}
                </div>
                <ul class="nk-menu">
                     {{-- ======Team Member====== --}}

                    @if (!empty(Auth::user()->roles->name) && Auth::user()->roles->name == 'Team Member')
                        <!-- Followup Manage -->
                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-user"></em></span>
                            <span class="nk-menu-text">Follow Up Manage</span>
                        </a>

                        <ul class="nk-menu-sub">

                            <li class="nk-menu-item">
                                <a href="{{ route('followup.index') }}" class="nk-menu-link"><span class="nk-menu-text">Follow Up List</span></a>
                            </li>

                            <li class="nk-menu-item">
                                <a href="{{ route('meeting.index') }}" class="nk-menu-link"><span class="nk-menu-text">Meeting List</span></a>
                            </li>

                            <li class="nk-menu-item">
                                <a href="{{ route('project-visit.index') }}" class="nk-menu-link"><span class="nk-menu-text">Project Visit List</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li>
                    <!-- Followup Manage -->


                     <!-- Customer Manage -->
                     <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">Lead Manage</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('customer.create') }}" class="nk-menu-link"><span class="nk-menu-text">New Lead</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('customer.index') }}" class="nk-menu-link"><span class="nk-menu-text">Lead List</span></a>
                            </li>

                        </ul><!-- .nk-menu-sub -->
                    </li>

                    @endif

                    {{-- Team Member --}}

                     {{-- ======Head Of Sale AREA====== --}}
                     @if (!empty(Auth::user()->roles->name) && Auth::user()->roles->name == 'Head Of Sales')

                    @endif

                    {{-- ======ADMIN AREA====== --}}
                    @if (!empty(Auth::user()->roles->name) && Auth::user()->roles->name == 'Admin')



                    @endif

                    {{-- ======SUPERADMIN AREA====== --}}

                    @if (!empty(Auth::user()->roles->name) && Auth::user()->roles->name == 'Superadmin')

                    <li class="nk-menu-item">
                        <a href="{{route('home')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-microsoft"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{route('showSettings')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>

                                <span class="nk-menu-text">{{ __('messages.settings') }}</span>
                        </a>
                    </li>

                    <!-- .nk-menu-item -->
                        {{-- <div class="col-md-4">
                            <select class="form-control changeLang">
                                <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>

                                <option value="bn" {{ session()->get('locale') == 'bn' ? 'selected' : '' }}>Bangla</option>

                            </select>
                        </div>   --}}


                        <!-- Admin Manage -->

                        <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-user"></em></span>
                            <span class="nk-menu-text">Admin Manage</span>
                        </a>

                        <ul class="nk-menu-sub">

                            <li class="nk-menu-item">
                                <a href="{{ route('user-registration') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-bitcoin-cash"></em></span>
                                <span class="nk-menu-text">Employee Registration</span>
                                </a>
                            </li>
                            <!-- .nk-menu-item -->

                            <li class="nk-menu-item">
                                <a href="{{ route('role.create') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-bitcoin-cash"></em></span>
                                <span class="nk-menu-text">Add Role</span>
                                </a>
                            </li>
                            <!-- .nk-menu-item -->

                            <li class="nk-menu-item">
                                <a href="{{ route('user-list') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-bitcoin-cash"></em></span>
                                <span class="nk-menu-text">@lang('messages.user list')</span>
                                </a>
                            </li>
                            <!-- .nk-menu-item -->
                        </ul><!-- .nk-menu-sub -->
                    </li>
                    <!-- Admin Manage -->






                    <!-- Followup Manage -->
                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-user"></em></span>
                            <span class="nk-menu-text">Follow Up Manage</span>
                        </a>

                        <ul class="nk-menu-sub">

                            <li class="nk-menu-item">
                                <a href="{{ route('followup.index') }}" class="nk-menu-link"><span class="nk-menu-text">Follow Up List</span></a>
                            </li>

                            <li class="nk-menu-item">
                                <a href="{{ route('meeting.index') }}" class="nk-menu-link"><span class="nk-menu-text">Meeting List</span></a>
                            </li>

                            <li class="nk-menu-item">
                                <a href="{{ route('project-visit.index') }}" class="nk-menu-link"><span class="nk-menu-text">Project Visit List</span></a>
                            </li>




                        </ul><!-- .nk-menu-sub -->
                    </li>
                    <!-- Followup Manage -->


                    <!-- Customer Manage -->
                    <li class="nk-menu-item has-sub">
                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">Lead Manage</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('customer.create') }}" class="nk-menu-link"><span class="nk-menu-text">New Lead</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('customer.index') }}" class="nk-menu-link"><span class="nk-menu-text">Lead List</span></a>
                            </li>

                        </ul><!-- .nk-menu-sub -->
                    </li>

                    <!-- Customer Manage -->
                    <li class="nk-menu-item has-sub">

                        <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">General Settings</span>
                        </a>

                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('group.create') }}" class="nk-menu-link"><span class="nk-menu-text">Add New Group</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('team.create') }}" class="nk-menu-link"><span class="nk-menu-text">Add New Team</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('project.create')}}" class="nk-menu-link"><span class="nk-menu-text">Add Interested Project</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('source.create')}}" class="nk-menu-link"><span class="nk-menu-text">Add Source Of Lead</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('plotsize.create')}}" class="nk-menu-link"><span class="nk-menu-text">Add Plot Size</span></a>
                            </li>

                            <li class="nk-menu-item">
                                <a href="{{ route('profession.create') }}" class="nk-menu-link"><span class="nk-menu-text">Add New Profession</span></a>
                            </li>

                            <li class="nk-menu-item">
                                <a href="{{ route('cliectstatus.create')}}" class="nk-menu-link"><span class="nk-menu-text">Add Client Status</span></a>
                            </li>

                            <li class="nk-menu-item">
                                <a href="{{ route('meetingtype.create') }}" class="nk-menu-link"><span class="nk-menu-text">Add Meeting Type</span></a>
                            </li>

                            <li class="nk-menu-item">
                                <a href="{{ route('visit-type.create') }}" class="nk-menu-link"><span class="nk-menu-text">Add Visit Type</span></a>
                            </li>

                            <li class="nk-menu-item">
                                <a href="{{ route('vehicle-type.create') }}" class="nk-menu-link"><span class="nk-menu-text">Add Vehicle Type</span></a>
                            </li>

                    @endif
                </ul>
                <!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
<!-- sidebar -->
