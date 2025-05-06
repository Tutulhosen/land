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
                            <h4 class="project-details-card-header-title"><i
                                    class='bx bx-user-check bx-tada'></i>Employees Transfer
                            </h4>
                            <button class="btn btn-outline-danger ms-auto" onclick="history.back()"> <i class="bx bx-arrow-to-left bx-fade-left"></i>Back</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card card-round">
                            <div class="row card-body">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="small-label-text">Branch</label>
                                        <select class="form-select form-control select2" name="branch"
                                            placeholder="branch" id="branch_id">
                                            <option selected disabled>Select Branch</option>
                                            @foreach ($branches as $branch)
                                            <option value="{{$branch->id}}">{{$branch->name}} ({{$branch->branch_code}})</option>
                                            @endforeach
                                        </select>
                                        @error('branch') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="small-label-text">Department</label>
                                        <select class="form-select form-control select2" name="department"
                                            placeholder="department" id="department_id">
                                            <option selected disabled>Select Department</option>
                                            @foreach ($departments as $department)
                                            <option value="{{$department->id}}">{{$department->department_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('department') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="small-label-text">Employee</label>
                                        <select class="form-select form-control select2" name="employee"
                                            placeholder="employee" id="employee_id">
                                            <option selected disabled>Select Employee</option>
                                        </select>
                                        @error('employee') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row  card-body">
                            <div class="col-sm-8">
                                <div class="card card-round">
                                    <div class="row  card-body showbox" style="display: none">
                                        <h3>Transfer Form</h3>
                                            <form method="POST" action="{{ route('employee.transfer.store') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <input type="text" class="selected_employee_id" name="employee_id" style="display: none">
                                                    <div class="col-sm-4 ">
                                                        <div class="form-group">
                                                            <label for="reporting_date">Reporitng Date<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control datepicker"
                                                                name="reporting_date" id="reporting_date"
                                                                value="{{ old('reporting_date') }}" required>
                                                            @error('reporting_date') <span
                                                                class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="small-label-text">Branch</label>
                                                            <select class="form-select form-control select2"
                                                                name="confirmation_branch" placeholder="branch"
                                                                id="confirmation_branch">
                                                                <option selected disabled>Select Branch</option>
                                                                @foreach ($branches as $branch)
                                                                <option value="{{$branch->id}}">{{$branch->name}} ({{$branch->branch_code}})
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            @error('confirmation_branch') <span
                                                                class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="small-label-text">Department</label>
                                                            <select class="form-select form-control select2"
                                                                name="confirmation_department" placeholder="department"
                                                                id="confirmation_department">
                                                                <option selected disabled>Select Department</option>
                                                                @foreach ($departments as $department)
                                                                <option value="{{$department->id}}">
                                                                    {{$department->department_name}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            @error('confirmation_department') <span
                                                                class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="small-label-text">Designation</label>
                                                            <select class="form-select form-control select2"
                                                                name="confirmation_designation"
                                                                placeholder="designation" id="confirmation_designation">
                                                                <option selected disabled>Select Designation</option>
                                                            </select>
                                                            @error('confirmation_designation') <span
                                                                class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label class="small-label-text">Grade</label>
                                                            <select class="form-select form-control select2"
                                                                name="confirmation_grade" placeholder="Grade"
                                                                id="confirmation_grade">
                                                                <option selected disabled>Select grade</option>
                                                            </select>
                                                            @error('confirmation_grade') <span
                                                                class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Reporting To (First)</label>
                                                            <select class="form-select form-control select2"
                                                                id="confirmation_reporting_to_first"
                                                                name="confirmation_reporting_to_first">
                                                                <option value="" selected>Reporting To (First)</option>
                                                            </select>
                                                            @error('confirmation_reporting_to_first') <span
                                                                class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Reporting To (Second)</label>
                                                            <select class="form-select form-control select2"
                                                                id="confirmation_reporting_to_second"
                                                                name="confirmation_reporting_to_second">
                                                                <option value="" selected>Reporting To (Second)</option>
                                                            </select>
                                                            @error('confirmation_reporting_to_second') <span
                                                                class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Reporting To (Third)</label>
                                                            <select class="form-select form-control select2"
                                                                id="confirmation_reporting_to_third"
                                                                name="confirmation_reporting_to_third">
                                                                <option value="" selected>Reporting To (Third)</option>
                                                            </select>
                                                            @error('confirmation_reporting_to_third') <span
                                                                class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 ">
                                                        <div class="form-group">
                                                            <label for="comment">Comment<span class="text-danger">*</span></label>
                                                            <textarea type="text" class="form-control summernote"
                                                                name="comment" id="comment" required>
                                                            </textarea>
                                                            @error('comment') <span
                                                                class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card shadow rounded-4 border-0">
                                    <div class="row  card-body showbox" style="display: none">
                                        <div class="text-center mb-3">
                                            <h4 class="fw-bold">Employee Summary</h4>
                                            <hr class="w-50 mx-auto" />
                                        </div>

                                        <div class="d-flex flex-column gap-3">
                                            <div class="bg-light rounded-3 p-3">
                                                <h5 class="mb-1 text-primary" id="summary_name">N/A</h5>
                                                <small class="text-muted" id="summary_designation">N/A</small>
                                                <div class="d-flex">
                                                    <span class="text-muted">Department: </span>
                                                    <span class="text-muted" id="summary_department">N/A</span>
                                                </div>
                                                <div class="d-flex">
                                                    <span class="text-muted">Branch: </span>
                                                    <span class="text-muted" id="summary_branch">N/A</span>
                                                </div>

                                            </div>

                                            <div class="bg-light rounded-3 p-3">
                                                <div class="d-flex justify-content-between">
                                                    <span class="text-muted">Joining Date</span>
                                                    <span id="summary_joining_date">N/A</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span class="text-muted">Grade</span>
                                                    <span id="summary_grade">N/A</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span class="text-muted">Salary</span>
                                                    <span id="summary_salary">N/A</span>
                                                </div>
                                            </div>

                                            <div class="bg-light rounded-3 p-3">
                                                <h6 class="mb-2">Reporting To</h6>
                                                <ul class="list-unstyled mb-0">
                                                    <li>1.<i class="bx bx-user-circle"></i><span id="summary_reporting_to_first">N/A</span></li>
                                                    <li>2.<i class="bx bx-user-circle"></i><span id="summary_reporting_to_second">N/A</span></li>
                                                    <li>3.<i class="bx bx-user-circle"></i><span id="summary_reporting_to_third">N/A</span></li>
                                                </ul>
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
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        var markGradeId = "";

        if ($('#switchButton').prop('checked')) {
            $('#probationExtend').show();
            $('#confirmationForm').hide();
            $('#switchLabelLeft').css('color', 'gray');
            $('#switchLabelRight').css('color', 'black');
        } else {
            $('#confirmationForm').show();
            $('#probationExtend').hide();
            $('#switchLabelLeft').css('color', 'black');
            $('#switchLabelRight').css('color', 'gray');
        }

        $('#switchButton').change(function () {
            if ($(this).prop('checked')) {
                $('#probationExtend').show();
                $('#confirmationForm').hide();
                $('#switchLabelLeft').css('color', 'gray');
                $('#switchLabelRight').css('color', 'black');
            } else {
                $('#confirmationForm').show();
                $('#probationExtend').hide();
                $('#switchLabelLeft').css('color', 'black');
                $('#switchLabelRight').css('color', 'gray');
            }
        });
    });


    function loademployees(departmentId, branchId, employeeSelectId) {
        if (departmentId) {
            $.ajax({
                url: '/dashboard/employee/transfer/employees/' + departmentId + '/' +
                    branchId,
                type: 'GET',
                success: function (data) {

                    var employeeSelect = $(employeeSelectId);
                    employeeSelect.empty();
                    employeeSelect.append(
                        '<option value="" slected>Select Employee</option>');

                    $.each(data, function (key, employee) {
                        var salutation = employee.salutations && employee.salutations.name ?
                            employee.salutations.name : "";
                        var fullName = salutation + " " + employee.first_name + " " + employee
                            .last_name;
                        employeeSelect.append('<option value=' + employee.id + '>' + fullName +
                            '</option>');
                    });

                },
                error: function () {
                    alert('Failed to load employees. Please try again.');
                }
            });
        } else {
            var employeeSelect = $(employeeSelectId);
            employeeSelect.empty();
            employeeSelect.append('<option value="">Select employee</option>');
        }
    }

    $('#department_id, #branch_id').change(function () {
        var departmentId = $('#department_id').val();
        var branchId = $('#branch_id').val();
        loademployees(departmentId, branchId, '#employee_id');
    });

    function formatAndSetDate(dateString, inputSelector) {
        if (!dateString) return;
        let date = new Date(dateString);
        let formattedDate = date.toLocaleDateString('en-GB', {
            day: '2-digit',
            month: 'short',
            year: 'numeric'
        }).replace(',', '');
        $(inputSelector).val(formattedDate);
    }

    function countDaysLeft(dateString, countdownSelector) {
        if (!dateString) return;

        let endDate = new Date(dateString);
        let today = new Date();

        let timeDiff = endDate.getTime() - today.getTime();
        let daysLeft = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));

        if (daysLeft > 0) {
            $(countdownSelector).text(daysLeft + " days left");
        } else if (daysLeft === 0) {
            $(countdownSelector).text("Last day today!");
        }
    }


    function loadDesignations(departmentId, designationSelectId, designationId) {
        if (departmentId) {
            $.ajax({
                url: '/dashboard/employee/designations/' + departmentId,
                type: 'GET',
                success: function (data) {
                    var designationSelect = $(designationSelectId);
                    designationSelect.empty();
                    designationSelect.append('<option value="">Select Designation</option>');
                    $.each(data, function (key, designation) {
                        designationSelect.append('<option value="' + designation.id + '">' +
                            designation.designation_name + '</option>');
                    });
                    if (designationId) {
                        designationSelect.val(designationId);

                        var confirmationDesignationId = $('#confirmation_designation').val();
                        loadGrades(confirmationDesignationId, '#confirmation_grade');
                    }
                },
                error: function () {
                    alert('Failed to load designations. Please try again.');
                }
            });
        } else {
            var designationSelect = $(designationSelectId);
            designationSelect.empty();
            designationSelect.append('<option value="" disabled>Select Designation</option>');
        }
    }

    $('#confirmation_department').change(function () {
        var departmentId = $(this).val();
        loadDesignations(departmentId, '#confirmation_designation', '');
    });


    function loadReportingTo(branchId, reportedToSelectId, reportEmployee) {
        if (branchId) {
            $.ajax({
                url: '/dashboard/employee/branch/employees/' + branchId,
                type: 'GET',
                success: function (data) {
                    console.log(data);
                    var getIdEmployee = $('#employee_id').val();
                    var reportedToSelect = $(reportedToSelectId);
                    reportedToSelect.empty();
                    reportedToSelect.append('<option value="">Select Designation</option>');
                    $.each(data, function (key, employees) {
                        if(employees.employee.id != getIdEmployee){
                            reportedToSelect.append('<option value="' + employees.employee.id + '">' +
                                employees.employee.salutations.name + '' +
                                employees.employee.first_name + ' ' +
                                employees.employee.last_name + '</option>');
                        }
                    });
                    if (reportEmployee) {
                        reportedToSelect.val(reportEmployee);
                    }
                },
                error: function () {
                    alert('Failed to load Reporting To. Please try again.');
                }
            });
        } else {
            var reportedToSelect = $(reportedToSelectId);
            reportedToSelect.empty();
            reportedToSelect.append('<option value="" disabled>Select Designation</option>');
        }
    }



    function loadGrades(confirmationDesignationId, gradeSelectId) {
        if (confirmationDesignationId) {
            $.ajax({
                url: '/dashboard/employee/designations/grades/' + confirmationDesignationId,
                type: 'GET',
                success: function (data) {
                    var gradeSelect = $(gradeSelectId);
                    gradeSelect.empty();
                    gradeSelect.append('<option value="">Select Designation</option>');
                    $.each(data, function (key, grade) {
                        gradeSelect.append('<option value="' + grade.id + '">' + grade.name +
                            '</option>');
                    });
                    if (markGradeId) {
                        gradeSelect.val(markGradeId);
                    }
                },
                error: function () {
                    alert('Failed to load designationgrades. Please try again.');
                }
            });
        } else {
            var gradeSelect = $(gradeSelectId);
            gradeSelect.empty();
            gradeSelect.append('<option value="" disabled>Select Grade</option>');
        }
    }

    $('#confirmation_designation').change(function () {
        var confirmationDesignationId = $(this).val();
        // console.log('confirmationDesignationId', confirmationDesignationId);

        loadGrades(confirmationDesignationId, '#confirmation_grade');
    });



    $(document).ready(function () {
        $('#employee_id').on('change', function () {
            var employeeId = $('#employee_id').val();

            if (employeeId) {
                $.ajax({
                    url: '/dashboard/employee/transfer/employees/' + employeeId,
                    type: 'GET',
                    success: function (data) {
                        console.log(data);

                        $('#confirmation_branch').val(data.official_information.branch_id)
                            .trigger('change');


                        var branchId = $('#confirmation_branch').val();

                        if(data.official_information.reporting_to_first != null){
                            var reportFirst = data.official_information.reportingfirst.id;
                            loadReportingTo(branchId, '#confirmation_reporting_to_first', reportFirst);
                        }

                        if(data.official_information.reporting_to_second != null){
                            var reportSecond = data.official_information.reportingsecond.id;
                            loadReportingTo(branchId, '#confirmation_reporting_to_second', reportSecond);
                        }

                        if(data.official_information.reporting_to_third != null){
                            var reportThird = data.official_information.reportingthird.id;
                            loadReportingTo(branchId, '#confirmation_reporting_to_third', reportThird);
                        }


                        $('#confirmation_department').val(data.official_information
                            .department_id).trigger('change');

                        // Event listener for the create modal
                        var departmentId = $('#confirmation_department').val();
                        var designationId = data.official_information.designation_id;
                        loadDesignations(departmentId, '#confirmation_designation',
                            designationId);

                        markGradeId = data.official_information.grade_id;

                        let probationDateString = data.pay_roll_information
                            .probation_period_end_date;
                        formatAndSetDate(probationDateString, '#last_probation_date');
                        countDaysLeft(probationDateString, '#countdown');


                        $('.selected_employee_id').val(employeeId);
                        $('#summary_name').text(data.salutations.name + ' ' + data
                            .first_name + ' ' + data.last_name);
                        $('#summary_joining_date').text(new Date(data.pay_roll_information.joining_date).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }));
                        $('#summary_branch').text(data.official_information.branch.name);
                        $('#summary_department').text(data.official_information.department
                            .department_name);
                        $('#summary_designation').text(data.official_information.designation
                            .designation_name);
                        $('#summary_grade').text(
                            data.official_information?.employee_grade?.name || 'N/A'
                        );

                        if (data.official_information?.employee_grade?.basic_salary) {
                            $('#summary_salary').text(data.official_information?.employee_grade?.basic_salary);
                        } else {
                            $('#summary_salary').text(data.pay_roll_information?.joining_sallery || 'N/A');
                        }


                        function getFullName(reportingPerson) {
                            if (reportingPerson) {
                                return (reportingPerson.salutations?.name || '') + ' ' +
                                    (reportingPerson.first_name || '') + ' ' +
                                    (reportingPerson.last_name || '');
                            }
                            return 'N/A'; // Return an empty string if null/undefined
                        }

                        if (data.official_information) {
                            $('#summary_reporting_to_first').text(getFullName(data.official_information.reportingfirst));
                            $('#summary_reporting_to_second').text(getFullName(data.official_information.reportingsecond));
                            $('#summary_reporting_to_third').text(getFullName(data.official_information.reportingthird));
                        }

                    },
                    error: function () {
                        alert('Failed to load employees. Please try again.');
                    }
                });
            }


            if (employeeId != "") {
                $('.showbox').show();
            } else {
                $('.showbox').hide();
            }
        });
    });



    $(document).ready(function () {
        $('#confirmation_branch').on('change', function () {
            var branchId = $('#confirmation_branch').val();
            if (branchId) {
                loadReportingTo(branchId, '#confirmation_reporting_to_first', "");
                loadReportingTo(branchId, '#confirmation_reporting_to_second', "");
                loadReportingTo(branchId, '#confirmation_reporting_to_third', "");
            }

        });
    });


</script>
@endpush
