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
                                <div class="pull-left"><i class="fas fa-cogs"></i><span class="right-nav-text">Users</span></div>
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


                                        
                    
                    <!-- Dashboard-->
                    <li>
                        <a href="{{ url('/') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>


                    <!--Search Files -->
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
                                <li><a href="{{route('supervisor.psscases.index')}}">All PSS Cases</a></li>
                                <li><a href="{{ route('supervisor.statistics.index') }}">Statistics</a></li>
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


                    
                    <br>
                    <br>
                    <br>



                    <!-- classes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{trans('main_trans.classes')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Classrooms.index')}}">{{trans('main_trans.List_classes')}}</a></li>
                        </ul>
                    </li>


                    <!-- sections-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                            <div class="pull-left"><i class="fas fa-chalkboard"></i></i><span
                                    class="right-nav-text">{{trans('main_trans.sections')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Sections.index')}}">{{trans('main_trans.List_sections')}}</a></li>
                        </ul>
                    </li>


                    <!-- students-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu">
                            <div class="pull-left"><i class="fas fa-user-graduate"></i></i></i><span
                                    class="right-nav-text">{{trans('main_trans.students')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="calendar.html">Events Calendar </a> </li>
                            <li> <a href="calendar-list.html">List Calendar</a> </li>
                        </ul>
                    </li>



                    <!-- Teachers-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                            <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i></i><span
                                    class="right-nav-text">{{trans('main_trans.Teachers')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('Teachers.index')}}">{{trans('main_trans.List_Teachers')}}</a> </li>
                        </ul>
                    </li>


                    <!-- Parents-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                            <div class="pull-left"><i class="fas fa-user-tie"></i><span
                                    class="right-nav-text">{{trans('main_trans.Parents')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{url('add_parent')}}">{{trans('main_trans.List_Parents')}}</a> </li>
                        </ul>
                    </li>

                    <!-- Accounts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                            <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                                    class="right-nav-text">{{trans('main_trans.Accounts')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="calendar.html">Events Calendar </a> </li>
                            <li> <a href="calendar-list.html">List Calendar</a> </li>
                        </ul>
                    </li>

                    <!-- Attendance-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">
                            <div class="pull-left"><i class="fas fa-calendar-alt"></i><span class="right-nav-text">{{trans('main_trans.Attendance')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li>

                    <!-- Exams-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span class="right-nav-text">{{trans('main_trans.Exams')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li>


                    <!-- library-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                            <div class="pull-left"><i class="fas fa-book"></i><span class="right-nav-text">{{trans('main_trans.library')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li>


                    <!-- Onlinec lasses-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                            <div class="pull-left"><i class="fas fa-video"></i><span class="right-nav-text">{{trans('main_trans.Onlineclasses')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li> 


                    <!-- Users-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-icon">
                            <div class="pull-left"><i class="fas fa-users"></i><span class="right-nav-text">{{trans('main_trans.Users')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Users-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li> --}}

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
