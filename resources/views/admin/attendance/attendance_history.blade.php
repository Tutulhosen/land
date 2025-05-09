@extends('layouts.admin')
@section('title','Attendance History')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">

            <div class="col-xl-12 col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title "><i class='bx bx-filter-alt'></i> Filter</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if (auth()->user()->is_superadmin == 1)
                            <div class="col-xl-3">
                                <div class="mb-3">
                                    <label for="">Branch</label>
                                    <select name="selectBranch" id="selectBranch" class="form-control select2">
                                        <option value="">Select Branch</option>
                                        @foreach ($branches as $branch)
                                            <option value="{{$branch->id}}">{{$branch->name}} ({{$branch->branch_code}})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="col-xl-3">
                                <div class="mb-3">
                                    <label for="">Department</label>
                                    <select name="selectDepartment" id="selectDepartment" class="form-control select2">
                                        <option value="">Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{$department->id}}">{{$department->department_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="mb-3">
                                    <label for="">Designation</label>
                                    <select name="selectDesignation" id="selectDesignation" class="form-control select2">
                                        <option value="">Select Designation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="mb-3">
                                    <label for="">Employee</label>
                                    <select name="selectEmployee" id="selectEmployee" class="form-control select2">
                                        <option value="">Select Employee</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="mb-3">
                                    <label for="">From Date</label>
                                    <input type="text" class="form-control datepicker" name="date" id="fromdate">
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="mb-3">
                                    <label for="">To Date</label>
                                    <input type="text" class="form-control datepicker" name="date" id="todate">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-round">
            <div class="card-header project-details-card-header">
                <div class="text-center">
                    <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada'></i>
                        Employee Attendance History
                    </h4>
                </div>
                <div class="text-right float-end">
                    <a href="{{route('attendance.index')}}" class="btn btn-outline-info btn-sm">
                        <i class="bx bx-plus"></i> Mark Attendance
                    </a>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="attendanceTable" class="display table table-striped table-hover" role="grid"
                                    aria-describedby="add-row_info">
                                    <thead class="">
                                        <tr role="row">
                                            <th>Sl</th>
                                            <th>Employee</th>
                                            <th>Date</th>
                                            <th>Punch In</th>
                                            <th>Punch Out</th>
                                            <th>Status</th>
                                            <th>Late</th>
                                            <th>Shift Hour</th>
                                            <th>Working Hour</th>
                                            <th>Overtime</th>
                                            <th>Device</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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
@endsection
@push('styles')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

@endpush
@push('scripts')
<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function () {

        let table = $('#attendanceTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('attendance.attendance-history') }}", // Your route to fetch data
                data: function (d) {
                    d.branch_id = $('#selectBranch').val();
                    d.department_id = $('#selectDepartment').val();
                    d.designation_id = $('#selectDesignation').val();
                    d.employee_id = $('#selectEmployee').val();
                    d.from_date = $('#fromdate').val();
                    d.to_date = $('#todate').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', className: "text-center", orderable: false, searchable: false },
                { data: 'employee', name: 'employee', className: "text-center" },
                { data: 'date', name: 'date', className: "text-center" },
                { data: 'punch_in', name: 'punch_in', className: "text-center" },
                { data: 'punch_out', name: 'punch_out', className: "text-center" },
                { data: 'status', name: 'status', className: "text-center" },
                { data: 'late', name: 'late', className: "text-center" },
                { data: 'shift_hour', name: 'shift_hour', className: "text-center" },
                { data: 'working_hour', name: 'working_hour', className: "text-center" },
                { data: 'overtime', name: 'overtime', className: "text-center" },
                { data: 'device', name: 'device', className: "text-center" }
            ],
            dom: 'Bfrtip', // Add buttons for export options
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: '<i class="bx bx-file"></i> Export Excel',
                    className: 'btn btn-success',
                    title: 'Attendance Report'
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="bx bx-file"></i> Export PDF',
                    className: 'btn btn-danger',
                    title: 'Attendance Report',
                    orientation: 'landscape',
                    pageSize: 'A4'
                }
            ]
        });

        $('.select2, .datepicker').on('change', function () {
            table.draw();  // Reload DataTable with new filter values
        });

        function loadDesignations(departmentId, designationSelectId) {
            if (departmentId) {
                $.ajax({
                    url: '/dashboard/employee/designations/' + departmentId, // Route for designations
                    type: 'GET',
                    success: function (data) {
                        var designationSelect = $(designationSelectId);
                        designationSelect.empty(); // Clear previous designations
                        designationSelect.append(
                            '<option value="">Select Designation</option>');

                        // Loop through and append designations to the dropdown
                        $.each(data, function (key, designation) {
                            designationSelect.append('<option value="' + designation.id +'">' + designation.designation_name + '</option>');
                        });
                    },
                    error: function () {
                        alert('Failed to load designations. Please try again.');
                    }
                });
            } else {
                var designationSelect = $(designationSelectId);
                designationSelect.empty();
                designationSelect.append('<option value="" >Select Designation</option>');
            }
        }

        // Event listener for the create modal
        $('#selectDepartment').change(function () {
            var departmentId = $(this).val();
            loadDesignations(departmentId, '#selectDesignation');
        });

        function loadEmployee(designationId, employeeselectId) {
            if (designationId) {
                if($('#selectBranch').val() != null){
                    var branchId = $("#selectBranch").val();
                }
                var departmentId = $("#selectDepartment").val();

                var data = {
                    branchId: branchId,
                    designationId: designationId,
                    departmentId: departmentId
                };                

                $.ajax({
                    url: '/dashboard/get-department-designation-employee' , // Route for Employee
                    type: 'GET',
                    data: data,
                    success: function (data) {
                        
                        var employeeSelect = $(employeeselectId);
                        employeeSelect.empty(); // Clear previous Employee
                        employeeSelect.append(
                            '<option value="" >Select Employee</option>');

                        // Loop through and append Employee to the dropdown
                        $.each(data, function (key, employee) {
                            employeeSelect.append('<option value="' + employee.id +'">' + employee.first_name+ ' '+ employee.last_name+ '</option>');
                        });
                    },
                    error: function () {
                        alert('Failed to load Employee. Please try again.');
                    }
                });
            } else {
                var employeeSelect = $(employeeselectId);
                employeeSelect.empty();
                employeeSelect.append('<option value="" >Select Employee</option>');
            }
        }

        // Event listener for the create modal
        $('#selectDesignation').change(function () {
            var designationId = $(this).val();
            loadEmployee(designationId, '#selectEmployee');
        });

    });
</script>

@endpush

