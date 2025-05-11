<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="blue">
            <a href="{{route('dashboard')}}" class="logo">
                <img src="{{ asset('employee') }}/assets/img/GED.png" alt="navbar brand"
                class="navbar-brand" height="35">
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <!--HRM Portion-->
            <ul class="nav nav-secondary">
                <li class="nav-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @can('ShowSideBar customer')
                    <li class="nav-item {{ Request::routeIs('customer.*') ? 'active submenu' : '' }}">
                        <a data-bs-toggle="collapse" href="#employees">
                            <i class="fas fa-users"></i>
                            <p>Customer</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ Request::routeIs('customer.*') ? 'show' : '' }}" id="employees">
                            <ul class="nav nav-collapse">
                                <li class="{{ Route::currentRouteName() == 'customer.index' ? 'active' : '' }}">
                                    <a href="{{route('customer.index')}}">
                                        <i class="fas fa-user-friends"></i>
                                    <span class="sub-item">Customer</span>
                                    </a>
                                </li>
                                {{-- <li class="{{ Request::routeIs('employee.confirmation.*') ? 'active' : '' }}">
                                    <a href="{{route('employee.confirmation.index')}}">
                                        <i class="fas fa-user-check"></i>
                                    <span class="sub-item">Employee Confirmation</span>
                                    </a>
                                </li>
                                <li class="{{ Request::routeIs('employee.transfer.*') ? 'active' : '' }}">
                                    <a href="{{route('employee.transfer.index')}}">
                                        <i class="fas fa-exchange-alt"></i>
                                    <span class="sub-item">Employee Transfer</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{route('admin.underdevelopment')}}">
                                        <i class="fas fa-user-tie"></i>
                                    <span class="sub-item">Promotion / Incriment</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{route('admin.underdevelopment')}}">
                                        <i class="fas fa-user-alt-slash"></i>
                                    <span class="sub-item">Employee Discontinuation</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{route('admin.underdevelopment')}}">
                                        <i class="fas fa-share-square"></i>
                                    <span class="sub-item">Re-Hired Employee</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{route('admin.underdevelopment')}}">
                                        <i class="fas fa-user-times"></i>
                                    <span class="sub-item">Employee Withhold</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                @endcan

                {{-- @can('ShowSideBar Attendance')
                    <!--Attendance-->
                    <li class="nav-item {{ Request::routeIs('attendance.*') ? 'active submenu' : '' }}">
                        <a data-bs-toggle="collapse" href="#attendance">
                            <i class="fas fa-tasks"></i>
                        <p>Attendance</p>
                        <span class="caret"></span>
                        </a>
                        <div class="collapse {{ Request::routeIs('attendance.*') ? 'show' : '' }}" id="attendance">
                        <ul class="nav nav-collapse">
                            <li class="{{ Route::currentRouteName() == 'attendance.index' ? 'active' : '' }}">
                                <a href="{{route('attendance.index')}}">
                                    <i class="fas fa-calendar-check"></i>
                                <span class="sub-item">Mark Attendance</span>
                                </a>
                            </li>
                            @can('View Attendance')
                            <li class="{{ Route::currentRouteName() == 'attendance.attendance-history' ? 'active' : '' }}">
                                <a href="{{route('attendance.attendance-history')}}">
                                    <i class="fas fa-tasks"></i>
                                <span class="sub-item">Attendance History</span>
                                </a>
                            </li>
                            @endcan
                            <li>
                                <a href="{{route('admin.underdevelopment')}}">
                                    <i class="fas fa-calendar-times"></i>
                                <span class="sub-item">Attendance Deduction</span>
                                </a>
                            </li>
                        </ul>
                        </div>
                    </li>
                @endcan --}}

                 <!--Attendance-->
                 {{-- @canany(['ShowSideBar OfficialLetters'])
                
                    <li class="nav-item {{ Request::routeIs('official-letters*') ? 'active submenu' : '' }}">
                        <a data-bs-toggle="collapse" href="#hr-documents">
                            <i class="fas fa-copy"></i>
                        <p>HR Documents</p>
                        <span class="caret"></span>
                        </a>
                        <div class="collapse {{ Request::routeIs('official-letters*',) ? 'show' : '' }} " id="hr-documents">
                        <ul class="nav nav-collapse">
                            @can('ShowSideBar OfficialLetters')
                            <li class="{{ Route::currentRouteName() == 'official-letters.index' ? 'active' : '' }}">
                                <a href="{{route('official-letters.index')}}">
                                    <i class="fas fa-file-alt"></i>
                                <span class="sub-item">Official Letters</span>
                                </a>
                            </li>
                            @endcan
                         
                        </ul>
                        </div>
                    </li>
                  
                 @endcanany --}}

                 {{-- @canany(['ShowSideBar Announcement', 'ShowSideBar Notice'])
                    <!--Announcement-->
                    <li class="nav-item {{ Request::routeIs('announcement*','noticeboard*') ? 'active submenu' : '' }}">
                        <a data-bs-toggle="collapse" href="#announcement">
                            <i class="fas fa-bullhorn"></i>
                        <p>Announcement/Notice</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ Request::routeIs('announcement*','noticeboard*') ? 'show' : '' }}" id="announcement">
                            <ul class="nav nav-collapse">
                                @can('ShowSideBar Announcement')
                                <li class="{{ Route::currentRouteName() == 'announcement.index' ? 'active' : '' }}">
                                    <a href="{{route('announcement.index')}}">
                                        <i class="fas fa-volume-up"></i>
                                        <span class="sub-item">Announcement</span>
                                    </a>
                                </li>
                                @endcan
                                @can('ShowSideBar Notice')
                                <li class="{{ Route::currentRouteName() == 'noticeboard.index' ? 'active' : '' }}">
                                    <a href="{{ route('noticeboard.index') }}">
                                        <i class="far fa-sticky-note"></i>
                                <span class="sub-item">Notice</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    <!--Announcement-->
                 @endcanany --}}

                {{-- @can('ShowSideBar LeaveApplication')
                    <!--Leave Management-->
                    <li class="nav-item {{ Request::routeIs('leave-application.*','leave-approve-reject.*') ? 'active submenu' : '' }}">
                        <a data-bs-toggle="collapse" href="#leave-management">
                            <i class="fas fa-calendar-alt"></i>
                        <p>Leave Management</p>
                        <span class="caret"></span>
                        </a>
                        <div class="collapse {{ Request::routeIs('leave-application*','leave-approve-reject*') ? 'show' : '' }}" id="leave-management">
                        <ul class="nav nav-collapse">
                            <li class="{{ Route::currentRouteName() == 'leave-application.index' ? 'active' : '' }}">
                                <a href="{{ route('leave-application.index') }}">
                                    <i class="far fa-file-alt"></i>
                                <span class="sub-item">Leave Application</span>
                                </a>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'leave-approve-reject.approveandreject' ? 'active' : '' }}">
                                <a href="{{route('leave-approve-reject.approveandreject')}}">
                                    <i class="fas fa-toggle-on"></i>
                                <span class="sub-item">Leave Approval / Reject</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{route('admin.underdevelopment')}}">
                                    <i class="fas fa-share"></i>
                                <span class="sub-item">Leave Forward</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{route('admin.underdevelopment')}}">
                                    <i class="fas fa-sync-alt"></i>
                                <span class="sub-item">Leave Encashment</span>
                                </a>
                            </li>
                        </ul>
                        </div>
                    </li>
                    <!--Leave Management-->
                @endcan --}}

                {{-- @can('ShowSideBar Shift')
                    <!--Shift Management-->
                    <li class="nav-item {{ Request::routeIs('shift.*') ? 'active submenu' : '' }}">
                        <a data-bs-toggle="collapse" href="#shift-management">
                            <i class="fas fa-calendar-alt"></i>
                        <p>Shift Management</p>
                        <span class="caret"></span>
                        </a>
                        <div class="collapse {{ Request::routeIs('shift.*') ? 'show' : '' }}" id="shift-management">
                        <ul class="nav nav-collapse">
                            <li class="{{ Route::currentRouteName() == 'shift.index' ? 'active' : '' }}">
                                <a href="{{ route('shift.index') }}">
                                    <i class="far fa-file-alt"></i>
                                <span class="sub-item">Create Shift</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{route('admin.underdevelopment')}}">
                                    <i class="fas fa-calendar-check"></i>
                                <span class="sub-item">Shift Assign</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{route('admin.underdevelopment')}}">
                                    <i class="fas fa-calendar-alt"></i>
                                <span class="sub-item">Shift Calendar</span>
                                </a>
                            </li>
                        </ul>
                        </div>
                    </li>
                    <!--Shift Management-->
                @endcan --}}

                 <!--employeemovement-->

                 {{-- <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#employeemovement">
                        <i class="fas fa-share-alt"></i>
                       <p>Employee Movement</p>
                       <span class="caret"></span>
                    </a>
                    <div class="collapse " id="employeemovement">
                       <ul class="nav nav-collapse">
                          <li>
                             <a href="{{route('admin.underdevelopment')}}">
                                <i class="fas fa-share-alt"></i>
                             <span class="sub-item">Movements</span>
                             </a>
                          </li>
                       </ul>
                    </div>
                 </li> --}}

                 <!--employeemovement-->

                 <!--finalsettelment-->
                 {{-- <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#finalsettelment">
                        <i class="fas fa-signature"></i>
                       <p>Final Settelment</p>
                       <span class="caret"></span>
                    </a>
                    <div class="collapse " id="finalsettelment">
                       <ul class="nav nav-collapse">
                          <li>
                             <a href="{{route('admin.underdevelopment')}}">
                                <i class="fas fa-signature"></i>
                             <span class="sub-item">Final Settelment</span>
                             </a>
                          </li>
                       </ul>
                    </div>
                 </li> --}}
                 <!--finalsettelment-->

                 {{-- <!--Payroll-->
                 <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#payroll">
                        <i class="fas fa-hand-holding-usd"></i>
                       <p>Payroll</p>
                       <span class="caret"></span>
                    </a>
                    <div class="collapse " id="payroll">
                       <ul class="nav nav-collapse">
                          <li>
                             <a href="index.php?module=HRM&page=views/generate-salary">
                                <i class="fas fa-cogs"></i>
                             <span class="sub-item">Generate Salary</span>
                             </a>
                          </li>
                          <li>
                             <a href="index.php?module=HRM&page=views/employee-salary">
                                <i class="fas fa-wallet"></i>
                             <span class="sub-item">Employee Salary</span>
                             </a>
                          </li>
                          <li>
                             <a href="index.php?module=HRM&page=views/payslip">
                                <i class="fas fa-file-invoice-dollar"></i>
                             <span class="sub-item">Payslip</span>
                             </a>
                          </li>
                       </ul>
                    </div>
                 </li>
                 <!--Payroll--> --}}

                 {{-- @canany(['ShowSideBar Department', 'ShowSideBar Designation','ShowSideBar LeaveType','ShowSideBar Holiday','ShowSideBar DocumentTemplate'])
                    <li class="nav-item {{ Request::routeIs('department.*', 'designation.*', 'leavetype.*', 'holiday.*', 'documenttemplate.*') ? 'active submenu' : '' }}">
                        <a data-bs-toggle="collapse" href="#admin-setup">
                            <i class="fas fa-user-cog"></i>
                            <p>HR Admin Setup</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ Request::routeIs('department.*', 'designation.*', 'leavetype.*', 'holiday.*', 'documenttemplate.*') ? 'show' : '' }}" id="admin-setup">
                            <ul class="nav nav-collapse">
                                @can("ShowSideBar Department")
                                <li class="{{ Route::currentRouteName() == 'department.index' ? 'active' : '' }}">
                                    <a href="{{ route('department.index') }}">
                                        <i class="fas fa-sitemap"></i>
                                        <span class="sub-item">Department</span>
                                    </a>
                                </li>
                                @endcan
                                @can("ShowSideBar Designation")
                                <li class="{{ Route::currentRouteName() == 'designation.index' ? 'active' : '' }}">
                                    <a href="{{ route('designation.index') }}">
                                        <i class="fas fa-graduation-cap"></i>
                                        <span class="sub-item">Designation</span>
                                    </a>
                                </li>
                                @endcan
                                @can("ShowSideBar LeaveType")
                                <li class="{{ Route::currentRouteName() == 'leavetype.index' ? 'active' : '' }}">
                                    <a href="{{ route('leavetype.index') }}">
                                        <i class="fas fa-user-clock"></i>
                                        <span class="sub-item">Leave Type</span>
                                    </a>
                                </li>
                                @endcan
                                @can("ShowSideBar Holiday")
                                <li class="{{ Route::currentRouteName() == 'holiday.index' ? 'active' : '' }}">
                                    <a href="{{ route('holiday.index') }}">
                                        <i class="far fa-calendar-alt"></i>
                                        <span class="sub-item">Holiday</span>
                                    </a>
                                </li>
                                @endcan
                                @can("ShowSideBar DocumentTemplate")
                                <li class="{{ Route::currentRouteName() == 'documenttemplate.index' ? 'active' : '' }}">
                                    <a href="{{ route('documenttemplate.index') }}">
                                        <i class="far fa-file-word"></i>
                                        <span class="sub-item">Document Template</span>
                                    </a>
                                </li>
                                @endcan
                                <li class="{{ Route::currentRouteName() == 'grade.index' ? 'active' : '' }}">
                                    <a href="{{ route('grade.index') }}">
                                        <i class="far fa-file-word"></i>
                                        <span class="sub-item">Grade</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                 @endcanany --}}

                @canany(['ShowSideBar AdditionalSetup', 'ShowSideBar CompanySetup','ShowSideBar Branch'])
                    <li class="nav-item {{ Request::routeIs('additional-setup.*', 'company.*', 'branch.*') ? 'active submenu' : '' }}">
                        <a data-bs-toggle="collapse" href="#configure">
                            <i class="fas fa-cogs"></i>
                            <p>Master Panel</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ Request::routeIs('additional-setup.*', 'company.*', 'branch.*') ? 'show' : '' }}" id="configure">
                            <ul class="nav nav-collapse">
                                @can('ShowSideBar AdditionalSetup')
                                <li class="{{ Route::currentRouteName() == 'additional-setup.index' ? 'active' : '' }}">
                                    <a href="{{ route('additional-setup.index') }}">
                                        <i class="fas fa-cog"></i>
                                        <span class="sub-item">Additional Setup</span>
                                    </a>
                                </li>
                                @endcan
                                @can('ShowSideBar CompanySetup')
                                <li class="{{ Route::currentRouteName() == 'company.index' ? 'active' : '' }}">
                                    <a href="{{ route('company.index') }}">
                                        <i class="fas fa-screwdriver"></i>
                                        <span class="sub-item">Company Setup</span>
                                    </a>
                                </li>
                                @endcan
                                @can('ShowSideBar Branch')
                                <li class="{{ Route::currentRouteName() == 'project-setup.index' ? 'active' : '' }}">
                                    <a href="{{ route('project-setup.index') }}">
                                        <i class='bx bx-task'></i>
                                        <span class="sub-item">Project Setup</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{route('plot.index')}}">
                                        <i class='bx bx-building-house'></i>
                                        <span class="sub-item">Plot Setup</span>
                                    </a>
                                </li>
                                @endcan

                            </ul>
                        </div>
                    </li>
                @endcanany

                {{-- @canany(['ShowSideBar User', 'ShowSideBar Role','ShowSideBar Permission'])
                    <li class="nav-item {{ Request::routeIs('manageuser.*', 'manageuserrole.*', 'permission.*') ? 'active submenu' : '' }}">
                        <a data-bs-toggle="collapse" href="#manageusers">
                            <i class="fas fa-pen-square"></i>
                            <p>User Management</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ Request::routeIs('manageuser.*', 'manageuserrole.*', 'permission.*') ? 'show' : '' }}" id="manageusers">
                            <ul class="nav nav-collapse">
                                @can("ShowSideBar User")
                                <li class="{{ Route::currentRouteName() == 'manageuser.index' ? 'active' : '' }}">
                                    <a href="{{route('manageuser.index')}}">
                                        <span class="sub-item">Users</span>
                                    </a>
                                </li>
                                @endcan
                                @can("ShowSideBar Role")
                                <li class="{{ Route::currentRouteName() == 'manageuserrole.index' ? 'active' : '' }}">
                                    <a href="{{route('manageuserrole.index')}}">
                                        <span class="sub-item">Role</span>
                                    </a>
                                </li>
                                @endcan
                                @can("ShowSideBar Permission")
                                <li class="{{ Route::currentRouteName() == 'permission.index' ? 'active' : '' }}">
                                    <a href="{{route('permission.index')}}">
                                        <span class="sub-item">Permission</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcanany --}}

                {{-- <li class="nav-item {{ Request::routeIs('reports.employee-registration-report','reports.employee-attendence-report') ? 'active submenu' : '' }}">
                    <a data-bs-toggle="collapse" href="#manageReports">
                        <i class="fas fa-file-invoice"></i>
                        <p>Reports</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::routeIs('reports.employee-registration-report','reports.employee-attendence-report') ? 'show' : '' }}" id="manageReports">
                        <ul class="nav nav-collapse">
                            @can("ShowSideBar User")
                            <li class="{{ Route::currentRouteName() == 'reports.employee-registration-report' ? 'active' : '' }}">
                                <a href="{{route('reports.employee-registration-report')}}">
                                    <i class="fas fa-user-tag"></i>
                                    <span class="sub-item">Employee Registration</span>
                                </a>
                            </li>
                            @endcan

                        </ul>
                        <ul class="nav nav-collapse">
                            @can("ShowSideBar User")
                            <li class="{{ Route::currentRouteName() == 'reports.employee-attendence-report' ? 'active' : '' }}">
                                <a href="{{route('reports.employee-attendence-report')}}">
                                    <i class="fas fa-clipboard-list"></i>
                                    <span class="sub-item">Employee Attendence</span>
                                </a>
                            </li>
                            @endcan

                        </ul>
                    </div>
                </li> --}}

                {{-- @can('ShowSideBar Maintenance')
                    <li class="nav-item {{ Route::currentRouteName() == 'maintenance' ? 'active' : '' }}">
                        <a href="{{ route('maintenance') }}">
                            <i class="fas fa-wrench"></i>
                            <p>Maintenance</p>
                        </a>
                    </li>
                @endcan --}}

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
