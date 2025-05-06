@extends('layouts.admin')
@section('title','Employee transfer')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="project-details-card-header-title"><i class='bx bx-user-check bx-tada'></i> Employees
                                transfer
                            </h4>
                            <a href="{{route('employee.transfer.create')}}" class="purchase-button ms-auto"><i class='bx bx-check-square bx-tada'></i>
                                Transfer</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="display table table-striped table-hover basic-datatables"
                                            role="grid" aria-describedby="add-row_info">
                                            <thead class="">
                                                <tr role="row">
                                                    <th class="text-center">Sl</th>
                                                    <th class="text-center">Employee</th>
                                                    <th class="text-center">New Official Info</th>
                                                    <th class="text-center">Old Official Info</th>
                                                    <th class="text-center">Transfer</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($confrimemployees as $key => $confrimemployee)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1 text-center">{{$key+1}}</td>
                                                    <td class="text-center">
                                                        <a href="#"><i class='bx bx-user-circle'></i> {{ $confrimemployee->employee->salutations ? $confrimemployee->employee->salutations->name : '' }} {{ $confrimemployee->employee->first_name ?? ''}} {{ $confrimemployee->employee->last_name ?? ''}}</a>
                                                        <br />{{ $confrimemployee->employee->officialInformation->designation ? $confrimemployee->employee->officialInformation->designation->designation_name : "N/A" }}
                                                        <br /><i class='bx bx-id-card bx-flashing'></i> {{ $confrimemployee->employee->emp_id }}
                                                    </td>
                                                    <td class="text-center">
                                                        <span>
                                                            <i class='bx bx-buildings bx-flashing'></i>
                                                            {{$confrimemployee->newBranch ? $confrimemployee->newBranch->name : "N/A"}}
                                                        </span>
                                                        <br>
                                                        {{ $confrimemployee->newDepartment ? $confrimemployee->newDepartment->department_name : "N/A"}}
                                                        <br>
                                                        {{ $confrimemployee->newDesignation ? $confrimemployee->newDesignation->designation_name : "N/A"}}
                                                        <br/><b>Reporting Person:</b>
                                                        @if ($confrimemployee->newReportingfirst)
                                                        <br><a href="#" class="client-info"><i class="bx bx-user-voice"></i>{{$confrimemployee->newReportingfirst->first_name}} {{$confrimemployee->newReportingfirst->last_name}}</a>
                                                        @endif
                                                        @if ($confrimemployee->newReportingsecond)
                                                        <br/><a href="#" class="client-info"><i class="bx bx-user-voice"></i>{{$confrimemployee->newReportingsecond->first_name}} {{$confrimemployee->newReportingsecond->last_name}}</a>
                                                        @endif
                                                        @if ($confrimemployee->newReportingthird)
                                                        <br/><a href="#" class="client-info"><i class="bx bx-user-voice"></i>{{$confrimemployee->newReportingthird->first_name}} {{$confrimemployee->newReportingthird->last_name}}</a>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <span>
                                                            <i class='bx bx-buildings bx-flashing'></i>
                                                            {{$confrimemployee->oldBranch ? $confrimemployee->oldBranch->name : "N/A"}}
                                                        </span>
                                                        <br>
                                                        {{ $confrimemployee->oldDepartment ? $confrimemployee->oldDepartment->department_name : "N/A"}}
                                                        <br>
                                                        {{ $confrimemployee->oldDesignation ? $confrimemployee->oldDesignation->designation_name : "N/A"}}
                                                        <br/><b>Reporting Person:</b>
                                                        @if ($confrimemployee->oldReportingfirst)
                                                        <br><a href="#" class="client-info"><i class="bx bx-user-voice"></i> {{$confrimemployee->oldReportingfirst->first_name}} {{$confrimemployee->oldReportingfirst->last_name}}</a>
                                                        @endif
                                                        @if ($confrimemployee->oldReportingsecond)
                                                        <br/><a href="#" class="client-info"><i class="bx bx-user-voice"></i> {{$confrimemployee->oldReportingsecond->first_name}} {{$confrimemployee->oldReportingsecond->last_name}}</a>
                                                        @endif
                                                        @if ($confrimemployee->oldReportingthird)
                                                        <br/><a href="#" class="client-info"><i class="bx bx-user-voice"></i> {{$confrimemployee->oldReportingthird->first_name}} {{$confrimemployee->oldReportingthird->last_name}}</a>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="toggle-status  btn status-box-1 btn btn-success" data-bs-toggle="tooltip" data-bs-title="Employee Transfered">
                                                            Transfered
                                                        </button>
                                                        <br>
                                                        <span><i class='bx bx-buildings bx-flashing'></i>
                                                            {{ \Carbon\Carbon::parse($confrimemployee->created_at)->format('d M Y') }}
                                                        </span>
                                                        <br>
                                                        By: <i class='bx bx-user-circle'></i> {{$confrimemployee->user->name}}

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
    </div>
</div>
@endsection
@push('scripts')

@endpush
