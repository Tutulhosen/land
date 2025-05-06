@extends('layouts.admin')
@section('title','Employee Confirmation')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="project-details-card-header-title"><i class='bx bx-user-check bx-tada'></i> Employees
                                Confirmation
                            </h4>
                            <a href="{{route('employee.confirmation.create')}}" class="purchase-button ms-auto"><i class='bx bx-check-square bx-tada'></i>
                                Confirm Employee</a>
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
                                                    <th class="text-center">Official</th>
                                                    <th class="text-center">Confirmation/Probation Extend</th>
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
                                                            {{$confrimemployee->employee->officialInformation->branch ? $confrimemployee->employee->officialInformation->branch->name : "N/A"}}
                                                        </span>
                                                        <br>
                                                        {{ $confrimemployee->employee->officialInformation->department ? $confrimemployee->employee->officialInformation->department->department_name : "N/A"}}
                                                        @if ($confrimemployee->employee->officialInformation->reportingfirst)
                                                        <br/><b>Reporting Person:</b> <a href="#" class="client-info"><i class="bx bx-user-voice"></i> {{$confrimemployee->employee->officialInformation->reportingfirst->first_name}} {{$confrimemployee->employee->officialInformation->reportingfirst->last_name}}</a>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($confrimemployee->confirm_or_extend == 1)
                                                        <button type="button" class="toggle-status  btn status-box-1 btn btn-success" data-bs-toggle="tooltip" data-bs-title="Employee is confirmed">
                                                            Confirm
                                                        </button>
                                                        <br>
                                                        <span><i class='bx bx-buildings bx-flashing'></i>
                                                            {{ \Carbon\Carbon::parse($confrimemployee->confirmation_date)->format('d M Y') }}
                                                        </span>
                                                        @endif

                                                        @if ($confrimemployee->confirm_or_extend == 0)
                                                        <button type="button" class="toggle-status  btn status-box-1 btn btn-warning" data-bs-toggle="tooltip" data-bs-title="Employee Probation is extended">
                                                            Probation Extend
                                                        </button>
                                                        <br>
                                                        <span><i class='bx bx-buildings bx-flashing'></i>
                                                            {{ \Carbon\Carbon::parse($confrimemployee->created_at)->format('d M Y') }}
                                                        </span>
                                                        @endif
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
