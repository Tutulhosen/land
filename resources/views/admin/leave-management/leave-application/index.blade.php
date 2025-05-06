@extends('layouts.admin')
@section('title','Leave Application')
@push('styles')
<style>
    .select2-dropdown {
        z-index: 99999 !important;
    }
</style>
@endpush
@section('content')
<div class="container">
    <div class="panel-header expense-bg">
       <div class="top-counter-box">
          <div class="top-counter">
             <ul>
                <li>
                    <h4 class="page-title-1">Leave Requests Overview</h4>
                    <div class="top-counter-inner">
                        <ul>
                            <li>
                                <div class="counter-icon">
                               <i class='bx bxs-user-account'></i>
                                </div>
                                <div class="counter-info-1">
                                <h5 class="expense-title-1">Total Leave Request</h5>
                                <p class="expense-title-2">{{ $totalLeaveRequests }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="counter-icon">
                               <i class='bx bxs-user-account'></i>
                                </div>
                                <div class="counter-info-1">
                                <h5 class="expense-title-1">Approved Leave</h5>
                                <p class="expense-title-2">{{ $approvedLeave }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="counter-icon">
                               <i class='bx bxs-user-account'></i>
                                </div>
                                <div class="counter-info-1">
                                <h5 class="expense-title-1">Rejected Leave</h5>
                                <p class="expense-title-2">{{ $rejectedLeave }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="counter-icon">
                               <i class='bx bxs-user-account'></i>
                                </div>
                                <div class="counter-info-1">
                                <h5 class="expense-title-1">Pending Leave</h5>
                                <p class="expense-title-2">{{ $pendingLeave }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
             </ul>
          </div>
       </div>
    </div>
    <div class="page-inner">
       <div class="row">
          <div class="col-md-12">
             <div class="card card-round">
                <div class="card-header project-details-card-header">
                   <div class="d-flex align-items-center">
                      <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Leave Applications</h4>
                      @can('Create LeaveApplication')
                      <a href="#" data-bs-toggle="modal" data-bs-target="#leave-application-create" class="purchase-button ms-auto" ><i class='bx bx-message-square-add bx-tada' ></i> Create Leave Application</a>
                      @endcan
                   </div>
                   @include('admin.leave-management.leave-application.create-modal')
                </div>
                <div class="card-body">
                   <div class="table-responsive">
                      <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                         <div class="row">
                            <div class="col-sm-12">
                                @can('View LeaveApplication')
                               <table id="add-row" class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-center">Sl</th>
                                            <th class="text-center">Employee</th>
                                            <th class="text-center">Leave Type</th>
                                            <th class="text-center">Number of Days</th>
                                            <th class="text-center">Applied On</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($leaveApplications as $index => $leave)
                                            <tr role="row">
                                                <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">
                                                    {{ $leave->employee->salutations->name }} {{ $leave->employee->first_name }} {{ $leave->employee->last_name }}
                                                    <br />{{ $leave->employee->officialInformation->designation->designation_name ?? 'N/A' }}
                                                    <br />{{ $leave->employee->officialInformation->department->department_name ?? 'N/A' }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $leave->leaveType->leave_name }}
                                                    <br />{{ $leave->leaveType?->leaveDuration?->name ?? 'N/A' }}

                                                </td>
                                                <td class="text-center">
                                                    {{ \Carbon\Carbon::parse($leave->from_date)->diffInDays(\Carbon\Carbon::parse($leave->to_date)) + 1 }} Days
                                                    <br />{{ $leave->from_date }} to {{ $leave->to_date }}
                                                </td>
                                                <td class="text-center">{{ $leave->created_at->format('d M Y') }}</td>
                                                <td class="text-center">
                                                    <div  class="badge {{ $leave->status == 'approved' ? 'badge-success' : ($leave->status == 'rejected' ? 'badge-danger' : 'badge-warning') }}">
                                                        {{ ucfirst($leave->status) }}
                                                    </div>
                                                    <br />
                                                    {{ $leave->decided_by ? $leave->decidedBy->name : '' }}
                                                    <br />
                                                    {{ $leave->decided_at ? \Carbon\Carbon::parse($leave->decided_at)->format('d M Y') : '' }}

                                                </td>
                                                <td class="text-center">
                                                    <div class="form-button-action">
                                                        @can('Update LeaveApplication')
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#leave-application-view-{{ $leave->id }}" class="btn btn-link btn-secondary btn-lg">
                                                            <i class='bx bxs-paper-plane'></i>
                                                        </a>
                                                        @endcan
                                                        {{-- <button type="button" data-bs-toggle="tooltip" title="Edit" class="btn btn-link btn-success btn-lg">
                                                            <i class="bx bxs-edit"></i>
                                                        </button> --}}

                                                        {{-- @can('Delete LeaveApplication')
                                                        <a href="#" id="delete-leave-link" title="delete"
                                                            class="btn btn-link btn-danger btn-lg"
                                                            data-leave-id="{{ $leave->id }}">
                                                            <i class='bx bx-trash-alt'></i>
                                                        </a>
                                                        @endcan

                                                        <form id="delete-leave-form-{{ $leave->id }}"
                                                            action="{{ route('leave-application.destroy', $leave->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form> --}}
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endcan
                                 @foreach($leaveApplications as $index => $leave)
                                 @include('admin.leave-management.leave-application.view-modal')
                                 @endforeach
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection

