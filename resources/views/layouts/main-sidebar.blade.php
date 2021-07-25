<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                

                    <!-- Users Menu-->
                    @can('users-menu')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                                <div class="pull-left"><i class="fas fa-users"></i><span class="right-nav-text">Users</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="users" class="collapse" data-parent="#sidebarnav">
                                
                                @can('user-list')
                                <li> <a href="{{ route('users.index') }}">Users</a> </li>
                                @endcan

                                @can('role-list')
                                    <li> <a href="{{ route('roles.index') }}">roles</a> </li>
                                @endcan
                                
                            </ul>
                        </li>
                    @endcan

                    <!-- Settings Menu-->
                    @can('settings-menu')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#settings">
                                <div class="pull-left"><i class="fas fa-cogs"></i><span class="right-nav-text">Settings</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="settings" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{ route('employees.index') }}">Employees</a> </li>
                                <li> <a href="/teams">Manage Teams</a> </li>
                                <li> <a href="/psworkers">Manage PS Workers</a> </li>
                                <li> <a href="{{ url('/referralsources') }}">Manage Referral Sources</a> </li>
                                <li> <a href="{{ url('/nationalities') }}">Manage Nationalities</a> </li>
                                <li> <a href="{{ url('/casestatuses') }}">Manage Case Statuses</a> </li>
                                <li> <a href="{{ url('/casetypes') }}">Manage Case Types</a> </li>
                                <li> <a href="#">Manage Locations</a> </li>
                                <li> <a href="#">Manage Job Titles</a> </li>
                            </ul>
                        </li>
                    @endcan


                                        
                    
{{--                     <!-- Dashboard-->
                    <li>
                        <a href="{{ url('/') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li> --}}

                    <!-- Add Individual -->
                    <li>
                        <a href="{{ url('/') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Add Individual</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>

                    <!-- Individuals -->
                    <li>
                        <a href="{{ url('individuals') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Individuals</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>

                    <!-- Beneficiaries -->
                    <li>
                        <a href="{{ url('beneficiaries') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Beneficiaries</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>


                    <!-- Files -->
                    @can('file-search')
                        <li>
                            <a href="{{ route('files.index') }}">
                                <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Search Files</span>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                    @endcan
                    

                    <!-- Psychosocial -->
                    @can('psychosocial-menu')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#supervisor-menu">
                                <div class="pull-left"><i class="fas fa-school"></i><span
                                        class="right-nav-text">Psychosocial</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="supervisor-menu" class="collapse" data-parent="#sidebarnav">
                                <li><a href="{{route('psscases.index')}}">All PSS Cases</a></li>
                                <li><a href="#">Statistics</a></li>
                            </ul>
                        </li>
                    @endcan


                    <!-- PSW-->
                    @can('psw-menu')
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#psw-menu">
                                <div class="pull-left"><i class="fas fa-school"></i><span
                                        class="right-nav-text">PSW</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="psw-menu" class="collapse" data-parent="#sidebarnav">
                                <li><a href="{{route('psw.psscases.index')}}">PSS Cases</a></li>
                            </ul>
                        </li>
                    @endcan




{{-- 
                    
                        @can('surveys-menu')
                        <!-- Surveys-->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#surveys-menu">
                                <div class="pull-left"><i class="fas fa-school"></i><span
                                        class="right-nav-text">Surveys</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="surveys-menu" class="collapse" data-parent="#sidebarnav">
                                <li><a href="{{route('surveys.index')}}">Survey List</a></li>

                            </ul>
                        </li>
                    @endcan


                    <!-- Inventory-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#inventory-menu">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-text">Inventory</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="inventory-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('surveys.index')}}">Inventory List</a></li>

                        </ul>
                    </li>

                    <!-- Psychosocial-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#psychosocial-menu">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-text">Psychosocial</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="psychosocial-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('visits.index')}}">Case Visits</a></li>
                            <li><a href="{{route('pscaseactivities.index')}}">Case Activities</a></li>
                            <li><a href="{{route('identitycards.index')}}">UNHCR Cards</a></li>
                            <li><a href="#">Statistics</a></li>
                        </ul>
                    </li>

 --}}

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
