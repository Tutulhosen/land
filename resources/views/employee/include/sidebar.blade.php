<div class="sidebar sidebar-style-2">
    <div class="sidebar-logo">
       <!-- Logo Header -->
       <div class="logo-header" data-background-color="blue">
          <a href="{{route('employee-dashboard')}}" class="logo">
          <img src="{{ asset('employee') }}/assets/img/onebiterp_logo_white.png" alt="navbar brand" class="navbar-brand" height="35">
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
    <div class="sidebar-wrapper">
       <div class="sidebar-content">
          <div class="card flex-fill blue-bg-1">
             <div class="card-body">
                <div class="text-center">
                    @if (Auth::user()->employee->employeeDocument)
                    <img src="{{ asset('storage/'. Auth::user()->employee->employeeDocument->profile_picture) }}" alt="..." class="client-profile-image2" style="width: 125px;">
                    @else
                    <img src="{{ asset('employee') }}/assets/img/demo-user.png" alt="..." class="client-profile-image2" style="width: 125px;">
                    @endif
                </div>
                <h6 class="emp-attendance-title2">{{Auth::user()->employee->salutations->name}} {{Auth::user()->employee->first_name}} {{Auth::user()->employee->last_name}}</h6>
                <p class="emp-designation-bg">{{Auth::user()->designation->designation_name ?? ''}}</p>
                <p class="emp-attendance-subtitle"><i class="bx bx-id-card bx-flashing"></i> {{Auth::user()->employee->emp_id}}</p>

                <?php
                    use App\Models\Admin\HrAdminSetup\Attendance;
                    use Illuminate\Support\Facades\Auth;
                    use Carbon\Carbon;
                    $today = Carbon::now()->format('Y-m-d');
                    $auth_id = Auth::user()->employee->id;
                    $checkin = Attendance::where('employee_id', $auth_id)->where('date', $today)->value('check_in');
                    $checkout = Attendance::where('employee_id', $auth_id)->where('date', $today)->value('check_out');
                ?>
                <div class="d-flex align-items-center justify-content-between border-top pt-2 mt-2">
                   <span class="emp-attendance-time d-inline-flex align-items-center">
                   <i class='bx bx-time-five bx-tada me-1'></i> {{$checkin?\Carbon\Carbon::parse($checkin)->format('h:i A'):"---"}}</span>
                   <p class="emp-attendance-time">{{$checkout?\Carbon\Carbon::parse($checkout)->format('h:i A'):"---"}} <i class='bx bx-time-five bx-tada'></i></p>
                </div>
                {{-- <div class="manual-attendance-box mt-2">
                   <ul>
                      <li><a href="#" class="manual-attendance-btn-1">Punch In</a></li>
                      <li><a href="#" class="manual-attendance-btn-2">Punch Out</a></li>
                   </ul>
                </div> --}}
{{-- 
                <form action="{{route('employee.attendance')}}" method="POST">
                    @csrf
                    <div  class="manual-attendance-box mt-2">
                        <ul>
                            <li>
                              <button type="submit" name="action" value="punch_in" class="manual-attendance-btn-1 border-0" {{$checkin?"disabled":""}}> {{$checkin?"Punched In":"Punch In"}}</button>
                            </li>
                            <li>
                              <button type="submit" name="action" value="punch_out" class="manual-attendance-btn-2 border-0" {{$checkout?"disabled":""}} {{$checkin?"":"disabled"}}>{{$checkout?"Punched Out":"Punch Out"}}</button>
                            </li>
                          </ul>
                    </div>
                </form> --}}

                <div class="manual-attendance-box mt-2">
                    <form id="attendance-form" action="{{route('employee.attendance')}}" method="POST">
                        @csrf
                      <ul>
                        <li>
                          <button type="button"
                                  class="manual-attendance-btn-1 border-0"
                                  id="punch-in-btn"
                                  {{ $checkin ? "disabled" : "" }}>
                            {{ $checkin ? "Punched In" : "Punch In" }}
                          </button>
                        </li>
                        <li>
                          <button type="button"
                                  class="manual-attendance-btn-2 border-0"
                                  id="punch-out-btn"
                                  {{ $checkout ? "disabled" : "" }} {{ $checkin ? "" : "disabled" }}>
                            {{ $checkout ? "Punched Out" : "Punch Out" }}
                          </button>
                        </li>
                      </ul>
                      <input type="hidden" name="action" id="attendance-action" />
                    </form>
                  </div>

             </div>
          </div>
          <div class="scroll-wrapper nav-sidebar-scroll scrollbar scrollbar-inner" style="position: relative;">
             <div class="nav-sidebar-scroll scrollbar scrollbar-inner scroll-content" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 515px;">
                <ul class="nav nav-primary">
                   <li class="nav-item {{ Route::currentRouteName() == 'employee-dashboard' ? 'active' : '' }}">
                      <a href="{{ route('employee-dashboard') }}">
                        <i class='bx bxs-home'></i>
                         <p>Dashboard</p>
                      </a>
                   </li>
                   <li class="nav-item {{ Route::currentRouteName() == 'employee-profile' ? 'active' : '' }}">
                      <a href="{{route('employee-profile',Auth::user()->employee->id )}}">
                         <i class='bx bxs-id-card'></i>
                         <p>Profile</p>
                      </a>
                   </li>
                   <li class="nav-item {{ Route::currentRouteName() == 'employee-announcement' ? 'active' : '' }}">
                      <a href="{{ route('employee-announcement') }}">
                         <i class="fas fa-bullhorn"></i>
                         <p>Announcement</p>
                      </a>
                   </li>
                   <li class="nav-item {{ Route::currentRouteName() == 'employee-notice' ? 'active' : '' }}">
                      <a href="{{ route('employee-notice') }}">
                         <i class='bx bx-conversation'></i>
                         <p>Notice</p>
                      </a>
                   </li>
                   <li class="nav-item {{ Route::currentRouteName() == 'employee-attendance' ? 'active' : '' }}">
                      <a href="{{ route('employee-attendance') }}">
                         <i class='bx bx-calendar'></i>
                         <p>My Attendance</p>
                      </a>
                   </li>
                   <li class="nav-item {{ Route::currentRouteName() == 'employee-leave-applications' ? 'active' : '' }}">
                      <a href="{{ route('employee-leave-applications') }}">
                         <i class='bx bx-file'></i>
                         <p>Leave Applications</p>
                      </a>
                   </li>
                   <li class="nav-item">
                      <a href="#">
                         <i class='bx bx-detail'></i>
                         <p>Official Letter</p>
                      </a>
                   </li>
                </ul>
             </div>
             <div class="scroll-element scroll-x" style="">
                <div class="scroll-element_outer">
                   <div class="scroll-element_size"></div>
                   <div class="scroll-element_track"></div>
                   <div class="scroll-bar" style="width: 0px;"></div>
                </div>
             </div>
             <div class="scroll-element scroll-y" style="">
                <div class="scroll-element_outer">
                   <div class="scroll-element_size"></div>
                   <div class="scroll-element_track"></div>
                   <div class="scroll-bar" style="height: 0px;"></div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

 @push('scripts')
 <script>
    $(document).ready(function () {
      $('#punch-in-btn').click(function () {
        swal({
          title: "Are you sure?",
          text: "Do you want to Punch In?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willPunchIn) => {
          if (willPunchIn) {
            $('#attendance-action').val('punch_in');
            $('#attendance-form').submit();
          }
        });
      });

      $('#punch-out-btn').click(function () {
        swal({
          title: "Are you sure?",
          text: "Do you want to Punch Out?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willPunchOut) => {
          if (willPunchOut) {
            $('#attendance-action').val('punch_out');
            $('#attendance-form').submit();
          }
        });
      });
    });
  </script>
 @endpush
