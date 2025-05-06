@extends('layouts.employee')
@section('title','Employee Dashboard')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
           <div class="col-xl-12 col-lg-12 d-flex">
              <div class="row flex-fill">
                <?php
                    use App\Models\Admin\HrAdminSetup\Attendance;
                    use Illuminate\Support\Facades\Auth;
                    use App\Models\Admin\Employee\EmployeePayRollInformation;
                    use App\Models\Admin\HrAdminSetup\Shift;
                    $today = \Carbon\Carbon::now()->format('Y-m-d');
                    $auth_id = Auth::user()->employee->id;
                    $checkin = Attendance::where('employee_id', $auth_id)->where('date', $today)->value('check_in');
                    $checkout = Attendance::where('employee_id', $auth_id)->where('date', $today)->value('check_out');
                    $totalMinutes = now()->diffInMinutes($checkin);
                    $thours = intdiv($totalMinutes, 60);
                    $tminutes = $totalMinutes % 60;
                    $totalHours = "{$thours} : {$tminutes}";
                    $shiftId = EmployeePayRollInformation::where('emp_personal_id', $auth_id)->value('shift_id');
                    $shiftStartTime = Shift::where('id', $shiftId)->value('start_time');
                    $shiftFinishTime = Shift::where('id', $shiftId)->value('end_time');
                    $shiftDuration = \Carbon\Carbon::parse($shiftFinishTime)->diffInMinutes(\Carbon\Carbon::parse($shiftStartTime));
                    $shours = intdiv($shiftDuration, 60);
                    $sminutes = $shiftDuration % 60;
                    $shiftHours = "{$shours} : {$sminutes}";
                    $durationPercent = ($totalMinutes / $shiftDuration) * 100;
                    $leftminutes = $shiftDuration - $totalMinutes;
                    $lhours = intdiv($leftminutes, 60);
                    $lminutes = $leftminutes % 60;
                    $leftHours = "{$lhours} : {$lminutes}";

                ?>
                @if ($checkin)
                    <div class="col-xl-3">
                        <div class="card shadow-1">
                        <div class="card-body">
                            <div class="mb-4 text-center">
                                <h6 class="expense-title-1">Attendance</h6>
                                <h4 class="project-details-card-header-title">{{$checkin?\Carbon\Carbon::parse($checkin)->format('D, d M, Y'):"---"}}</h4>
                            </div>
                            <div class="attendance-circle-progress attendance-progress mx-auto mb-3"  data-value='{{$durationPercent}}'>
                                <span class="progress-left">
                                <span class="progress-bar border-success"></span>
                                </span>
                                <span class="progress-right">
                                <span class="progress-bar border-success"></span>
                                </span>
                                <div class="total-work-hours text-center w-100">
                                    <span class="expense-title-1 mb-2">Total Hours</span>
                                    <h6 class="project-details-card-header-title">{{$totalHours}}</h6>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="production-hr">Production Hours :  {{$shiftHours}}</div>
                                <div class="production-hr" style="margin-top: 0px;">Left Hours :  {{$leftHours}}</div>
                                <h6 class="fw-medium d-flex align-items-center justify-content-center mb-4">
                                    <i class='bx bx-fingerprint' ></i>
                                    Punch In at  {{$checkin?\Carbon\Carbon::parse($checkin)->format('h:i A'):"---"}}
                                </h6>
                                <form id="dashboard-attendance-form" action="{{route('employee.attendance')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="action" id="dashboard-attendance-action" />
                                    <button type="button"
                                            class="btn punch-button w-100"
                                            id="dashboard-punch-out-btn"
                                            {{ $checkout ? "disabled" : "" }} {{ $checkin ? "" : "disabled" }}>
                                        {{ $checkout ? "Punched Out" : "Punch Out" }}
                                    </button>
                                </form>

                            </div>
                        </div>
                        </div>
                    </div>
                @endif

                <div class="{{ $checkin ? 'col-xl-3' : 'col-xl-4' }}">
                    <div class="card mb-4">
                       <div class="card-body pt-2 pb-2">
                          <div class="d-flex align-items-center justify-content-between border-bottom mb-1 pb-1">
                             <div>
                                <h5 class="attendance-counter-title-1"><b>Total Hours Week</b></h5>
                             </div>
                             <h3 class="attendance-counter-value-1 text-info">35 / <span class="text-info">42</span></h3>
                          </div>
                          <div class="d-flex justify-content-between">
                             <p class="attendance-progress-value-1 mb-0 text-success"><b>Present:</b> 6days</p>
                             <p class="attendance-progress-value-1 mb-0 text-danger"><b>Absent:</b> 1day</p>
                          </div>
                          <div class="d-flex justify-content-between">
                             <p class="attendance-progress-value-1 mb-0 text-danger"><b>Late:</b> 48m</p>
                             <p class="attendance-progress-value-1 mb-0 text-warning"><b>Early Leave:</b> 1h 22m</p>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="{{ $checkin ? 'col-xl-3' : 'col-xl-4' }}">
                    <div class="card mb-4">
                       <div class="card-body pt-2 pb-2">
                          <div class="d-flex align-items-center justify-content-between border-bottom mb-1 pb-1">
                             <div>
                                <h5 class="attendance-counter-title-1"><b>Total Hours Month</b></h5>
                             </div>
                             <h3 class="attendance-counter-value-1 text-success">35 / <span class="text-success">42</span></h3>
                          </div>
                          <div class="d-flex justify-content-between">
                             <p class="attendance-progress-value-1 mb-0 text-success"><b>Present:</b> 6days</p>
                             <p class="attendance-progress-value-1 mb-0 text-danger"><b>Absent:</b> 1day</p>
                          </div>
                          <div class="d-flex justify-content-between">
                             <p class="attendance-progress-value-1 mb-0 text-danger"><b>Late:</b> 48m</p>
                             <p class="attendance-progress-value-1 mb-0 text-warning"><b>Early Leave:</b> 1h 22m</p>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="{{ $checkin ? 'col-xl-3' : 'col-xl-4' }}">
                    <div class="card mb-4">
                       <div class="card-body pt-2 pb-2">
                          <div class="d-flex align-items-center justify-content-between border-bottom mb-1 pb-1">
                             <div>
                                <h5 class="attendance-counter-title-1"><b>Overtime this Month</b></h5>
                             </div>
                             <h3 class="attendance-counter-value-1 text-secondary">35 / <span class="text-secondary">42</span></h3>
                          </div>
                          <div class="d-flex justify-content-between">
                             <p class="attendance-progress-value-1 mb-0 text-success"><b>Present:</b> 6days</p>
                             <p class="attendance-progress-value-1 mb-0 text-danger"><b>Absent:</b> 1day</p>
                          </div>
                          <div class="d-flex justify-content-between">
                             <p class="attendance-progress-value-1 mb-0 text-danger"><b>Late:</b> 48m</p>
                             <p class="attendance-progress-value-1 mb-0 text-warning"><b>Early Leave:</b> 1h 22m</p>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <div class="row">
           <div class="col-xl-8">
              <div class="card card-height-100">
                 <div class="card-header align-items-center border-0 d-flex">
                    <h4 class="project-details-card-header-title mb-0 flex-grow-1">Leave Applications</h4>
                    <div class="flex-shrink-0">
                       <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                          <li class="nav-item" role="presentation">
                             <a class="nav-link active" data-bs-toggle="tab" href="#pendingrequest" role="tab" aria-selected="false" tabindex="-1">Pending</a>
                          </li>
                          <li class="nav-item" role="presentation">
                             <a class="nav-link" data-bs-toggle="tab" href="#approve" role="tab" aria-selected="true">Approved</a>
                          </li>
                          <li class="nav-item" role="presentation">
                             <a class="nav-link" data-bs-toggle="tab" href="#reject" role="tab" aria-selected="true">Reject</a>
                          </li>
                       </ul>
                       <!-- end ul -->
                    </div>
                 </div>
                 <!-- end cardheader -->
                 <div data-simplebar="init" style="max-height: 500px;" class="px-3 simplebar-scrollable-y">
                    <div class="simplebar-wrapper" style="margin: 0px -16px;">
                       <div class="simplebar-height-auto-observer-wrapper">
                          <div class="simplebar-height-auto-observer"></div>
                       </div>
                       <div class="simplebar-mask">
                          <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                             <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden scroll;">
                                <div class="simplebar-content" style="padding: 0px 16px;">
                                   <div class="card-body">
                                      <div class="tab-content p-0">
                                         <div class="tab-pane  active show" id="pendingrequest" role="tabpanel">
                                            <div class="table-responsive table-card">
                                                <table id="add-row" class="display table table-striped table-hover" role="grid" aria-describedby="add-row_info">
                                                    <thead class="table-primary">
                                                       <tr role="row">
                                                        <th style="font-size: 13px;" scope="col">Sl</th>
                                                        <th style="font-size: 13px;" scope="col">Leave Type</th>
                                                        <th style="font-size: 13px;" scope="col">Number of Days</th>
                                                        <th style="font-size: 13px;" scope="col">Applied On</th>
                                                        <th style="font-size: 13px;" scope="col">Status</th>
                                                        {{-- <th style="font-size: 13px;" scope="col">Approved By</th> --}}
                                                       </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($leaveApplications as $index => $leave)
                                                        @if ($leave->status == 'pending')
                                                        <tr role="row" class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>
                                                               {{ $leave->leaveType->leave_name }}
                                                               <br />{{ $leave->leaveType?->leaveDuration?->name }}
                                                            </td>
                                                            <td>
                                                               {{ \Carbon\Carbon::parse($leave->from_date)->diffInDays(\Carbon\Carbon::parse($leave->to_date)) + 1 }} Days
                                                               <br />{{$leave->from_date?\Carbon\Carbon::parse($leave->from_date)->format('d M Y'):"---"}} to {{$leave->to_date?\Carbon\Carbon::parse($leave->to_date)->format('d M Y'):"---"}}
                                                            </td>
                                                            <td>
                                                               {{ $leave->created_at->format('d M Y') }}
                                                            </td>
                                                            <td>
                                                               <div  class="badge {{ $leave->status == 'approved' ? 'badge-success' : ($leave->status == 'rejected' ? 'badge-danger' : 'badge-warning') }}">
                                                                   {{ ucfirst($leave->status) }}
                                                               </div>
                                                            </td>
                                                            {{-- <td>
                                                               {{ $leave->decided_by ? $leave->decidedBy->name : '' }}
                                                               <br />
                                                               {{ $leave->decided_at ? \Carbon\Carbon::parse($leave->decided_at)->format('d M Y') : '' }}
                                                            </td> --}}
                                                         </tr>
                                                        @endif
                                                        @endforeach
                                                     </tbody>
                                                    </tbody>
                                                </table>
                                               <!-- end table -->
                                            </div>
                                            <!-- end -->
                                         </div>
                                         <!-- end tabpane -->
                                         <div class="tab-pane" id="approve" role="tabpanel">
                                            <div class="table-responsive table-card">
                                                <table id="add-row" class="display table table-striped table-hover" role="grid" aria-describedby="add-row_info">
                                                    <thead class="table-primary">
                                                       <tr role="row">
                                                        <th style="font-size: 13px;" scope="col">Sl</th>
                                                        <th style="font-size: 13px;" scope="col">Leave Type</th>
                                                        <th style="font-size: 13px;" scope="col">Number of Days</th>
                                                        <th style="font-size: 13px;" scope="col">Applied On</th>
                                                        <th style="font-size: 13px;" scope="col">Status</th>
                                                        <th style="font-size: 13px;" scope="col">Approved By</th>
                                                       </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($leaveApplications as $index => $leave)
                                                        @if ($leave->status == 'approved')
                                                        <tr role="row" class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>
                                                               {{ $leave->leaveType->leave_name }}
                                                               <br />{{ $leave->leaveType?->leaveDuration?->name }}
                                                            </td>
                                                            <td>
                                                               {{ \Carbon\Carbon::parse($leave->from_date)->diffInDays(\Carbon\Carbon::parse($leave->to_date)) + 1 }} Days
                                                               <br />{{ $leave->from_date }} to {{ $leave->to_date }}
                                                            </td>
                                                            <td>
                                                               {{ $leave->created_at->format('d M Y') }}
                                                            </td>
                                                            <td>
                                                               <div  class="badge {{ $leave->status == 'approved' ? 'badge-success' : ($leave->status == 'rejected' ? 'badge-danger' : 'badge-warning') }}">
                                                                   {{ ucfirst($leave->status) }}
                                                               </div>
                                                               @if ($leave->reason)
                                                                <div>
                                                                    Reason: {{ $leave->reason?$leave->reason:"--" }}
                                                                </div>
                                                               @endif
                                                            </td>
                                                            <td>
                                                               {{ $leave->decided_by ? $leave->decidedBy->name : '' }}
                                                               <br />
                                                               {{ $leave->decided_at ? \Carbon\Carbon::parse($leave->decided_at)->format('d M Y') : '' }}
                                                            </td>
                                                         </tr>
                                                        @endif
                                                        @endforeach
                                                     </tbody>
                                                    </tbody>
                                                </table>
                                               <!-- end table -->
                                            </div>
                                            <!-- end -->
                                         </div>
                                         <!-- end tab pane -->
                                         <div class="tab-pane" id="reject" role="tabpanel">
                                            <div class="table-responsive table-card">
                                                <table id="add-row" class="display table table-striped table-hover" role="grid" aria-describedby="add-row_info">
                                                    <thead class="table-primary">
                                                       <tr role="row">
                                                        <th style="font-size: 13px;" scope="col">Sl</th>
                                                        <th style="font-size: 13px;" scope="col">Leave Type</th>
                                                        <th style="font-size: 13px;" scope="col">Number of Days</th>
                                                        <th style="font-size: 13px;" scope="col">Applied On</th>
                                                        <th style="font-size: 13px;" scope="col">Status</th>
                                                        <th style="font-size: 13px;" scope="col">Rejected By</th>
                                                       </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($leaveApplications as $index => $leave)
                                                        @if ($leave->status == 'rejected')
                                                        <tr role="row" class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>
                                                               {{ $leave->leaveType->leave_name }}
                                                               <br />{{ $leave->leaveType?->leaveDuration?->name }}
                                                            </td>
                                                            <td>
                                                               {{ \Carbon\Carbon::parse($leave->from_date)->diffInDays(\Carbon\Carbon::parse($leave->to_date)) + 1 }} Days
                                                               <br />{{ $leave->from_date }} to {{ $leave->to_date }}
                                                            </td>
                                                            <td>
                                                               {{ $leave->created_at->format('d M Y') }}
                                                            </td>
                                                            <td>
                                                               <div  class="badge {{ $leave->status == 'approved' ? 'badge-success' : ($leave->status == 'rejected' ? 'badge-danger' : 'badge-warning') }}">
                                                                   {{ ucfirst($leave->status) }}
                                                               </div>
                                                               @if ($leave->reason)
                                                                <div>
                                                                    Reason: {{ $leave->reason?$leave->reason:"--" }}
                                                                </div>
                                                               @endif

                                                            </td>
                                                            <td>
                                                               {{ $leave->decided_by ? $leave->decidedBy->name : '' }}
                                                               <br />
                                                               {{ $leave->decided_at ? \Carbon\Carbon::parse($leave->decided_at)->format('d M Y') : '' }}
                                                            </td>
                                                         </tr>
                                                        @endif
                                                        @endforeach
                                                     </tbody>
                                                    </tbody>
                                                </table>
                                               <!-- end table -->
                                            </div>
                                            <!-- end -->
                                         </div>
                                         <!-- end tab pane -->
                                      </div>
                                      <!-- end tab pane -->
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                       <div class="simplebar-placeholder" style="width: 607px; height: 337px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                       <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                       <div class="simplebar-scrollbar" style="height: 143px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                    </div>
                 </div>
                 <!-- end card body -->
              </div>
              <!-- end card -->
           </div>
           <div class="col-xl-4">
              <div class="card card-height-100">
                 <div class="card-header align-items-center border-0 d-flex">
                    <h4 class="project-details-card-header-title mb-0 flex-grow-1">Login Activity</h4>
                    <div class="flex-shrink-0">
                       <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                          <li class="nav-item" role="presentation">
                             <a class="nav-link" data-bs-toggle="tab" href="#buy-tab" role="tab" aria-selected="false" tabindex="-1">7days</a>
                          </li>
                          <li class="nav-item" role="presentation">
                             <a class="nav-link active" data-bs-toggle="tab" href="#sell-tab" role="tab" aria-selected="true">This Month</a>
                          </li>
                       </ul>
                       <!-- end ul -->
                    </div>
                 </div>
                 <!-- end cardheader -->
                 <div data-simplebar="init" style="max-height: 500px;" class="px-3 simplebar-scrollable-y">
                    <div class="simplebar-wrapper" style="margin: 0px -16px;">
                       <div class="simplebar-height-auto-observer-wrapper">
                          <div class="simplebar-height-auto-observer"></div>
                       </div>
                       <div class="simplebar-mask">
                          <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                             <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden scroll;">
                                <div class="simplebar-content" style="padding: 0px 16px;">
                                   <div class="card-body">
                                      <div class="tab-content p-0">
                                         <div class="tab-pane  active show" id="buy-tab" role="tabpanel">
                                            <div class="table-responsive table-card">
                                               <table id="add-row" class="display table table-striped table-hover" role="grid" aria-describedby="add-row_info">
                                                  <thead class="text-muted table-primary">
                                                     <tr role="row">
                                                        <th scope="col" style="width: 62; font-size: 13px;">Login IP</th>
                                                        <th scope="col" style="font-size: 13px;">Date</th>
                                                        <th scope="col" style="font-size: 13px;">Time</th>
                                                     </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach ($loginActivities as $activity)
                                                        @if (\Carbon\Carbon::parse($activity->date_time)->greaterThanOrEqualTo(\Carbon\Carbon::now()->subDays(7)))
                                                            <tr role="row" class="odd">
                                                                <td>{{ $activity->login_ip }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($activity->date_time)->format('d M Y') }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($activity->date_time)->format('h:i A') }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach

                                                  </tbody>
                                                  <!-- end tbody -->
                                               </table>
                                               <!-- end table -->
                                            </div>
                                            <!-- end -->
                                         </div>
                                         <!-- end tabpane -->
                                         <div class="tab-pane" id="sell-tab" role="tabpanel">
                                            <div class="table-responsive table-card">
                                               <table id="add-row" class="display table table-striped table-hover" role="grid" aria-describedby="add-row_info">
                                                  <thead class="text-muted table-primary">
                                                     <tr role="row">
                                                        <th scope="col" style="width: 62; font-size: 13px;">Login IP</th>
                                                        <th scope="col" style="font-size: 13px;">Date</th>
                                                        <th scope="col" style="font-size: 13px;">Time</th>
                                                     </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach ($loginActivities as $activity)
                                                        @php
                                                            $activityDate = \Carbon\Carbon::parse($activity->date_time);
                                                            $startOfMonth = \Carbon\Carbon::now()->startOfMonth();
                                                            $today = \Carbon\Carbon::now();
                                                        @endphp

                                                        @if ($activityDate->between($startOfMonth, $today))
                                                            <tr role="row" class="odd">
                                                                <td>{{ $activity->login_ip }}</td>
                                                                <td>{{ $activityDate->format('d M Y') }}</td>
                                                                <td>{{ $activityDate->format('h:i A') }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                  </tbody>
                                                  <!-- end tbody -->
                                               </table>
                                               <!-- end table -->
                                            </div>
                                            <!-- end -->
                                         </div>
                                         <!-- end tab pane -->
                                      </div>
                                      <!-- end tab pane -->
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                       <div class="simplebar-placeholder" style="width: 607px; height: 337px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                       <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                       <div class="simplebar-scrollbar" style="height: 143px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                    </div>
                 </div>
                 <!-- end card body -->
              </div>
              <!-- end card -->
           </div>
        </div>
        <div class="card card-round">
           <div class="card-header project-details-card-header">
              <div class="text-start">
                 <h4 class="project-details-card-header-title"><i class="bx bx-edit bx-tada"></i> Attendance History</h4>
              </div>
           </div>
           <div data-simplebar="init" style="max-height: 600px;" class="px-3 simplebar-scrollable-y">
              <div class="simplebar-wrapper" style="margin: 0px -16px;">
                 <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                 </div>
                 <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                       <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden scroll;">
                          <div class="simplebar-content">
                             <div class="card-body">
                                <div class="table-responsive">
                                   <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                      <div class="row">
                                         <div class="col-sm-12">
                                            <table id="add-row" class="display table table-striped table-hover" role="grid" aria-describedby="add-row_info">
                                                <thead class="table-primary">
                                                   <tr role="row">
                                                      <th style="font-size: 13px;">Sl</th>
                                                      <th style="font-size: 13px;">Date</th>
                                                      <th style="font-size: 13px;">Check In</th>
                                                      {{-- <th style="font-size: 13px;">Method</th> --}}
                                                      <th style="font-size: 13px;">Check Out</th>
                                                      {{-- <th style="font-size: 13px;">Method</th> --}}
                                                      <th style="font-size: 13px;">Status</th>
                                                      <th style="font-size: 13px;">Late</th>
                                                      <th style="font-size: 13px;">Working Hour</th>
                                                      <th style="font-size: 13px;">Overtime</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($attendances as $key => $attendance)
                                                   <tr role="row" class="odd">
                                                      <td class="sorting_1">{{$key+1}}</td>
                                                      <td>{{Carbon\Carbon::parse($attendance->date)->format('d M Y')}}</td>
                                                      <td>{{Carbon\Carbon::parse($attendance->check_in)->format('h:i a')}}</td>
                                                      {{-- <td><i class="bx bx-sad"></i> Face</td> --}}
                                                      <td>{{Carbon\Carbon::parse($attendance->check_out)->format('h:i a')}}</td>
                                                      {{-- <td><i class="bx bx-sad"></i> Face</td> --}}
                                                      <td>
                                                          @if ($attendance->status == 'Present')
                                                          <span class="badge badge-success">{{$attendance->status}}</span>
                                                          @elseif ($attendance->status == 'Absent')
                                                          <span class="badge badge-danger">{{$attendance->status}}</span>
                                                          @elseif ($attendance->status == 'Half Day')
                                                          <span class="badge badge-warning">{{$attendance->status}}</span>
                                                          @else
                                                          <span class="badge badge-info">{{$attendance->status}}</span>
                                                          @endif
                                                          <br>
                                                          @if ($attendance->late > 0)
                                                          <span class="badge badge-warning">Late</span>
                                                          @endif
                                                      </td>
                                                      <td>{{$attendance->late}} min</td>
                                                      <td>{{$attendance->total_hours ?? 0}} Hrs</td>
                                                      <td>{{$attendance->overtime_hours}} mins</td>
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="simplebar-placeholder" style="width: 607px; height: 337px;"></div>
              </div>
              <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                 <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
              </div>
              <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                 <div class="simplebar-scrollbar" style="height: 143px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
              </div>
           </div>
        </div>
     </div>
 </div>
 @endsection

 @push('scripts')
 <script>
    $(document).ready(function () {

      $('#dashboard-punch-out-btn').click(function () {
        swal({
          title: "Are you sure?",
          text: "Do you want to Punch Out?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willPunchOut) => {
          if (willPunchOut) {
            $('#dashboard-attendance-action').val('punch_out');
            $('#dashboard-attendance-form').submit();
          }
        });
      });
    });
  </script>
 @endpush
