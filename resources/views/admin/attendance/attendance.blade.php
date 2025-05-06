@extends('layouts.admin')
@section('title','Attendance History')
@section('content')
<style>
    .status-box-1 {
        color: #fff !important;
    }
</style>
<div class="container">
    <div class="page-inner">
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-header project-details-card-header client-box-bg-2">
                    <div class="d-flex align-items-center pb-2">
                        <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada'></i> Employee
                            Attendance</h4>
                    </div>

                </div>
                <div class="card-body client-box-bg-1">
                    <div class="row table-search-box">
                        <div class="col-md-10 m-auto">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="date">Date <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control custom-input datepicker" id="date"
                                            placeholder="Select Date">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="department">Department</label>
                                        <select class="form-select form-control custom-input nice-select" id="department">
                                            <option value="">Select Department</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="employee">Employee</label>
                                        <select class="form-select form-control custom-input nice-Select2" id="employee" multiple>
                                            <option value="">Select Employee</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="form-label d-block">Icon input</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <button type="button" class="btn btn-info w-100"
                                                data-bs-toggle="modal" data-bs-target="#mark_attendance">
                                                    Mark Attendance
                                                </button>
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <!--Bank Account Modal-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="attendanceTable" class="table table-bordered table-head-bg-info"
                                        >
                                        <thead class="">
                                            <tr role="row">
                                                <th>Sl</th>
                                                <th>Employee</th>
                                                <th>Shift</th>
                                                <th>Check In</th>
                                                {{-- <th>Method</th> --}}
                                                <th>Check Out</th>
                                                {{-- <th>Method</th> --}}
                                                <th>Status</th>
                                                <th>Late</th>
                                                <th>Working Hour</th>
                                                <th>Overtime</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr><td colspan="11" class="text-center">No employees Selected</td></tr>
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


@endsection
@push('scripts')
<script>

    $(document).ready(function () {

        $('.timepicker2').datetimepicker({
            format: 'h:mm A',
        });


        function fetchEmployees(departmentId, date)
        {
            $.ajax({
                url: "{{ route('get.department.employees') }}",
                type: "GET",
                data: { department_id: departmentId, date: date },
                success: function (response) {
                    $('#employee').empty().append('<option value="">Select Employee</option>');
                    $('#attendanceTable tbody').empty();
                    // console.log(response);

                    if (response.length > 0) {
                        $.each(response, function (index, employee) {
                            $('#employee').append(`<option value="${employee.id}">${employee.first_name} ${employee.last_name}</option>`);
                            let alreadyCheckedIn = employee.attendance && employee.attendance.check_in ? true : false;
                            let alreadyCheckedOut = employee.attendance && employee.attendance.check_out ? true : false;
                            // console.log(alreadyCheckedIn);

                            addEmployeeRow(employee, alreadyCheckedIn, alreadyCheckedOut);
                        });

                        // Initialize datetimepicker and manually trigger change
                        $('.timepicker2').datetimepicker({
                            format: 'h:mm A'
                        }).on('dp.change', function () {
                            $(this).trigger('change');
                        });

                    } else {
                        $('#attendanceTable tbody').append('<tr><td colspan="11" class="text-center">No employees found</td></tr>');
                    }
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        }


        function addEmployeeRow(employee, alreadyCheckedIn, alreadyCheckedOut) {
            let checkInDisabled = alreadyCheckedIn ? 'disabled' : '';
            let designation = employee.official_information?.designation?.designation_name ?? 'N/A';
            let shift = employee.pay_roll_information?.shift?.shift_name ?? 'N/A';
            let shiftId = employee.pay_roll_information?.shift?.id ?? '';
            let checkIn = employee.pay_roll_information?.shift?.start_time ?? '';
            let checkOut = employee.pay_roll_information?.shift?.end_time ?? '';

            let statusBox = `
                <span class="badge bg-danger status-box-1 text-light">Absent</span>
            `;
            if(employee.attendance && employee.attendance.status == 'Present') {
                statusBox = `
                    <span class="badge bg-success status-box-1 text-light">Present</span>
                `;
            }
            else if(employee.attendance && employee.attendance.status == 'Half Day') {
                statusBox = `
                    <span class="badge bg-warning status-box-1 text-light">Half Day</span>
                `;
            }
            else if(employee.attendance && employee.attendance.status == 'Early Leave') {
                statusBox = `
                    <span class="badge bg-warning status-box-1 text-light">Early Leave</span>
                `;
            }
            else if(employee.attendance && employee.attendance.status == 'Overtime') {
                statusBox = `
                    <span class="badge bg-warning status-box-1 text-light">Overtime</span>
                `;
            }
            let statusBox2 = `
                <span class="badge status-box-2 text-light"></span>
            `;

            let row = `
                <tr data-employee-id="${employee.id}">
                    <td>${employee.id}</td>
                    <td>
                        <div class="d-lg-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="avatar-xs rounded">
                                    <img src="${employee.profile_photo ?? 'assets/img/avatar-default.jpg'}"
                                        alt="" class="member-img img-fluid d-block rounded">
                                </div>
                            </div>
                            <div class="ms-lg-3 my-3 my-lg-0">
                                <h5 class="client-main-title">${employee.first_name} ${employee.last_name}</h5>
                                <p class="client-sub-title pt-0">${designation}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge bg-info">${shift}</span> <br>
                        <span class="badge bg-secondary shiftCheckIn">${checkIn}</span> -
                        <span class="badge bg-secondary shiftCheckOut">${checkOut}</span>
                    </td>
                    <td><input type="time" class="form-control custom-input-s check_in"
                        value="${employee.attendance ? employee.attendance.check_in : ''}"
                        name="check_in[${employee.id}]"
                        ${checkInDisabled} required>
                    </td>
                    <td><input type="time" class="form-control custom-input-s check_out"
                        value="${employee.attendance ? employee.attendance.check_out : ''}"
                         name="check_out[${employee.id}]"></td>
                    <td>
                    ${statusBox} <br>
                    ${statusBox2}
                    </td>
                    <td><span class="btn late-count">${employee.attendance ? employee.attendance.late : '0'} min</span></td>
                    <td><span class="btn working-hours">${employee.attendance ? employee.attendance.total_hours : '0'} Hrs</span></td>
                    <td><span class="btn overtime-count">${employee.attendance ? employee.attendance.overtime_hours : '0'} min</span></td>
                    <td class="action-btn">
                        <button type="button" class="btn btn-link btn-success btn-lg mark-present"
                        data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-custom-class="custom-tooltip"
                        data-bs-title="Mark as Present"
                        style="${alreadyCheckedOut ? 'display:none' : ''}">
                        @can("Create Attendance")
                        <button type="button" class="btn btn-link btn-success btn-lg mark-present" style="${alreadyCheckedOut ? 'display:none' : ''}">
                            <i class='bx bx-message-square-check bx-md'></i>
                        </button>
                        @endcan
                    </td>
                    <!-- Hidden Input Fields for Form Submission -->
                    <td style="display: none;">
                        <input type="hidden" name="employee_id[${employee.id}]" value="${employee.id}">
                        <input type="hidden" class="date" name="date[${employee.id}]" value="${$('#date').val()}">
                        <input type="hidden" class="shiftID" name="shift[${employee.id}]" value="${shiftId}">
                        <input type="hidden" class="hidden-working-hours" name="working_hours[${employee.id}]" value="0">
                        <input type="hidden" class="late-minutes" name="late_minutes[${employee.id}]" value="0">
                        <input type="hidden" class="overtime-minutes" name="overtime_minutes[${employee.id}]" value="0">
                        <input type="hidden" class="status" name="status[${employee.id}]" value="Absent">
                    </td>
                </tr>
            `;
            $('#attendanceTable tbody').append(row);
        }

        // Handle Department Change
        $('#department').on('change', function () {
            let departmentId = $(this).val();
            $('#employee').empty().append('<option value="">Select Employee</option>'); // Reset Employee Dropdown
            $('#attendanceTable tbody').empty(); // Reset Attendance Table
            var date = $('#date').val();
            if (!date) {
                alert('Please select a date');
                return;
            }
            if (departmentId) {
                fetchEmployees(departmentId, date);
            }
        });

        // Employee selection change
        $('#employee').on('change', function () {
            let selectedEmployees = $(this).val();
            $('#attendanceTable tbody').empty();
            var date = $('#date').val();
            if (!date){
                alert('Please select a date');
                return;
            }
            if (selectedEmployees.length > 0) {
                $.ajax({
                    url: "{{ route('get.selected.employees') }}",
                    type: "GET",
                    data: { employee_ids: selectedEmployees, date: date },
                    success: function (response) {
                        $.each(response, function (index, employee) {
                            let alreadyCheckedIn = employee.attendance && employee.attendance.check_in ? true : false;
                            let alreadyCheckedOut = employee.attendance && employee.attendance.check_out ? true : false;
                            addEmployeeRow(employee, alreadyCheckedIn, alreadyCheckedOut);
                        });

                        // Initialize datetimepicker after adding new rows
                        $('.timepicker2').datetimepicker({
                            format: 'h:mm A'
                        }).on('dp.change', function () {
                            $(this).trigger('change');
                        });
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });

        $(document).on('change', '.check_in, .check_out', function () {
            let row = $(this).closest('tr');
            let checkIn = row.find('.check_in').val();
            let checkOut = row.find('.check_out').val();
            let shiftStart = row.find('.shiftCheckIn').text().trim();
            let shiftEnd = row.find('.shiftCheckOut').text().trim();
            let date = $('#date').val();

            console.log(checkIn, checkOut, shiftStart, shiftEnd);

            if (checkIn || checkOut) {
                let checkInTime = moment(checkIn, 'h:mm A');
                let checkOutTime = moment(checkOut, 'h:mm A');
                let shiftStartTime = moment(shiftStart, 'h:mm A');
                let shiftEndTime = moment(shiftEnd, 'h:mm A');

                // Calculate Working Hours
                let workingHours = Math.max(0,moment.duration(checkOutTime.diff(checkInTime)).asHours());
                let workingHoursFixed = workingHours.toFixed(2);
                row.find('.working-hours').text(workingHoursFixed > 0 ? `Working Hour ${workingHoursFixed}hrs`: `0 Hrs`);

                // Calculate Late Minutes
                let lateMinutes = Math.max(0, moment.duration(checkInTime.diff(shiftStartTime)).asMinutes());
                row.find('.late-count').text(lateMinutes > 0 ? `Late ${lateMinutes}min` : 'On Time');

                // Calculate Overtime
                let overtimeMinutes = Math.max(0, moment.duration(checkOutTime.diff(shiftEndTime)).asMinutes());
                row.find('.overtime-count').text(overtimeMinutes > 0 ? `Overtime ${overtimeMinutes}min` : 'No Overtime');

                // Status Determination
                let statusBox = row.find('.status-box-1');
                let status = "";

                if (workingHours < 4 ) {
                    status = "Half-day";
                    statusBox.text(status).removeClass('bg-danger text-light bg-success').addClass('bg-warning');
                } else if (checkInTime) {
                    status = "Present";
                    statusBox.text(status).removeClass('bg-danger text-light bg-warning').addClass('bg-success');
                } else if (workingHours >= 4 && workingHours < 8 && checkOutTime.isBefore(shiftEndTime)){
                    status = "Early Leave";
                    statusBox.text(status).removeClass('bg-danger text-light bg-success').addClass('bg-warning');
                } else if (overtimeMinutes >= 60 ) {
                    status = "Overtime";
                    statusBox.text(status).removeClass('bg-danger text-light bg-success').addClass('bg-warning');
                }

                let statusBox2 = row.find('.status-box-2');
                let status2 = "";

                if(lateMinutes > 0) {
                    status2 = "Late";
                    statusBox2.text(status2).addClass('bg-warning');
                }

                // Set Hidden Inputs
                row.find('.hidden-working-hours').val(isNaN(workingHoursFixed) ? 0 : workingHoursFixed);
                row.find('.late-minutes').val(lateMinutes);
                row.find('.overtime-minutes').val(isNaN(overtimeMinutes) ? 0 : overtimeMinutes);
                row.find('.status').val(status);

            } else {
                // Mark as Absent if check-in or check-out is missing
                row.find('.status-box-1').text('Absent').removeClass('bg-warning bg-success').addClass('bg-danger text-light');
                row.find('.status').val('Absent');
            }

        });

        $(document).on('click', '.mark-present', function () {
            let row = $(this).closest('tr');
            let employeeId = row.data('employee-id');

            // Collect input data
            let data = {
                employee_id: employeeId,
                date: row.find('.date').val(),
                check_in: row.find('.check_in').val(),
                check_out: row.find('.check_out').val(),
                shift: row.find('.shiftID').val(),
                working_hours: row.find('.working-hours').val(),
                late_minutes: row.find('.late-minutes').val(),
                overtime_minutes: row.find('.overtime-minutes').val(),
                status: row.find('.status').val(),
                _token: $('meta[name="csrf-token"]').attr('content') // CSRF Token for Laravel
            };

            console.log("Submitting data: ", data); // Debugging log

            // Send AJAX request to submit data
            $.ajax({
                url: "{{route('attendance.store')}}",  // Update with your backend route
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                            timer: 2000
                        });
                        row.find('.action-btn').html(`
                            <button type="button" class="btn btn-success btn-sm saved text-white" disabled>
                                <i class='bx bx-check bx-md'></i> Saved
                            </button>
                        `);
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: response.message,
                            icon: "error"
                        });
                    }
                },
                error: function (xhr, status, error) {
                    Swal.fire({
                        title: "Error!",
                        text: "Something went wrong!",
                        icon: "error"
                    });
                    console.error(xhr.responseText);
                }
            });
        });


        $('.nice-select').select2({
            theme: "bootstrap",
            width: "100%"
        });


        $('.nice-Select2').select2({
            theme: "bootstrap",
            placeholder: "--Select--",
            width: "100%"
        });
    });

</script>
@endpush
