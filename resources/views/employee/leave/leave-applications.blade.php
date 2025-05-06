@extends('layouts.employee')
@section('title','Employee Leave Applications')
@push('styles')
<style>
    .select2-dropdown {
        z-index: 99999 !important;
    }
</style>
@endpush
@section('content')
<div class="container">
    <div class="page-inner">
       <div class="row">
          <div class="col-xl-12">
             <div class="card">
                <div class="card-header">
                   <div class="card-head-row">
                      <div class="project-details-card-header-title">Leave Applications</div>

                      <div class="card-tools">
                         <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm pt-3" id="pills-tab" role="tablist">
                            <li class="nav-item submenu" role="presentation">
                               <a href="#" class=" nav-link btn btn-primary btn-sm text-light" data-bs-toggle="modal" data-bs-target="#leave-application-create"><i class='bx bx-message-square-add bx-tada' ></i> Apply For Leave</a>
                            </li>
                            {{-- <li class="nav-item submenu" role="presentation">
                               <a class="nav-link" id="pills-today" data-bs-toggle="pill" href="#pills-today" role="tab" aria-selected="false" tabindex="-1" aria-labelledby="pills-today">Pending</a>
                            </li>
                            <li class="nav-item submenu" role="presentation">
                               <a class="nav-link" id="pills-week" data-bs-toggle="pill" href="#pills-week" role="tab" aria-selected="true" aria-labelledby="pills-week">Approved</a>
                            </li>
                            <li class="nav-item submenu" role="presentation">
                               <a class="nav-link" id="pills-month" data-bs-toggle="pill" href="#pills-month" role="tab" aria-selected="false" tabindex="-1" aria-labelledby="pills-month">Reject</a>
                            </li> --}}
                         </ul>
                      </div>
                   </div>
                </div>
                <!-- leave application create modal -->
                @include('employee.leave.create-modal')
                <!-- leave application create modal -->
                <!-- end card header -->
                <div class="card-body">
                   <div class="tab-content">
                      <div class="tab-pane fade active show" id="pills-today" role="tabpanel" aria-labelledby="pills-today">
                         <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                               <div class="row">
                                  <div class="col-sm-12">
                                     <table id="add-row" class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                        <thead class="text-muted table-primary">
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
                                               </td>
                                               <td>
                                                  {{ $leave->decided_by ? $leave->decidedBy->name : '' }}
                                                  <br />
                                                  {{ $leave->decided_at ? \Carbon\Carbon::parse($leave->decided_at)->format('d M Y') : '' }}
                                               </td>
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
             <!-- .card-->
          </div>

       </div>

    </div>
 </div>
@endsection
