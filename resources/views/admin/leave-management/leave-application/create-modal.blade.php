<div id="leave-application-create" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="card modal-dialog large-modal" role="document">
        <form action="{{ route('leave-application.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="project-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Create Leave Application</h4>
                    <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <!-- Department Dropdown -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="department_id">Department <span class="text-danger">*</span></label>
                                    <select class="form-select form-control custom-input select2" id="department_id" name="department_id" required>
                                        <option value="">--Select--</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>{{ $department->department_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Employee Dropdown -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="employee_id">Employee <span class="text-danger">*</span></label>
                                    <select class="form-select form-control custom-input select2" id="employee_id" name="employee_id" required>
                                        <option value="">--Select--</option>
                                    </select>
                                    @error('employee_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Leave Type Dropdown -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="leave_type_id">Leave Type <span class="text-danger">*</span></label>
                                    <select class="form-select form-control custom-input select2" id="leave_type_id" name="leave_type_id" required>
                                        <option value="">--Select--</option>
                                    </select>
                                    @error('leave_type_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- From Date -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="from_date">From Date <span class="text-danger">*</span></label>
                                    <input class="form-control custom-input" type="date" placeholder="From Date" id="from_date" name="from_date" value="{{ old('from_date') }}" required>
                                    @error('from_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- To Date -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="to_date">To Date <span class="text-danger">*</span></label>
                                    <input class="form-control custom-input" type="date" placeholder="To Date" id="to_date" name="to_date" value="{{ old('to_date') }}" required>
                                    @error('to_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Error message placeholder -->
                                <div id="leave-error-message" class="text-danger"></div>
                            </div>

                            <!-- Hidden input for leave_days -->
                            <input type="hidden" id="leave_days" name="leave_days"> <!-- Default value -->

                            <!-- Document Upload -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="document">Documents</label>
                                    <input class="form-control custom-input" type="file" id="document" name="document">
                                    @error('document')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Leave Reason -->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="leave_reason">Leave Reasons <span class="text-danger">*</span></label>
                                    <textarea id="leave_reason" class="form-control" rows="3" cols="3" placeholder="Write here" name="leave_reason" required>{{ old('leave_reason') }}</textarea>
                                    @error('leave_reason')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <div class="modal-button-box">
                        <button type="submit" class="submit-button-1">
                            <i class='bx bx-upload bx-flashing'></i> Submit
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize Select2
    $(".select2").select2({
        dropdownParent: $('#leave-application-create'),
        dropdownAutoWidth: true,
        width: '100%'
    });

    // Department to Employee AJAX
    $('#department_id').change(function() {
        var department_id = $(this).val();
        if (department_id) {
            $.ajax({
                url: '/dashboard/leave-management/get-employees/' + department_id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#employee_id').empty();
                    $('#employee_id').append('<option value="">--Select--</option>');
                    $.each(data, function(key, employee) {
                        $('#employee_id').append('<option value="' + employee.id + '">' + employee.salutation + ' ' + employee.first_name + ' ' + employee.last_name + '</option>');
                    });
                    $('#employee_id').trigger('change');
                },
                error: function() {
                    alert('Error fetching employees.');
                }
            });
        } else {
            $('#employee_id').empty();
            $('#employee_id').append('<option value="">--Select Employee--</option>');
        }
    });

    // Employee to Leave Type AJAX
    $('#employee_id').change(function() {
        var employee_id = $(this).val();
        if (employee_id) {
            $.ajax({
                url: '/dashboard/leave-management/get-leave-types/' + employee_id,
                type: 'GET',
                dataType: 'json',
                success: function(leaveTypes) {
                    $('#leave_type_id').empty();
                    $('#leave_type_id').append('<option value="">--Select--</option>');
                    $.each(leaveTypes, function(key, leaveType) {
                        $('#leave_type_id').append('<option value="' + leaveType.id + '">' + leaveType.leave_name + '</option>');
                    });
                    $('#leave_type_id').trigger('change');
                },
                error: function() {
                    alert('Error fetching leave types.');
                }
            });
        } else {
            $('#leave_type_id').empty();
            $('#leave_type_id').append('<option value="">--Select--</option>');
        }
    });

    // Leave Type to Leave Days AJAX
    $('#leave_type_id').change(function() {
        var leaveTypeId = $(this).val();
        if (leaveTypeId) {
            $.ajax({
                url: '/dashboard/leave-management/get-leave-days/' + leaveTypeId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#leave_days').val(data.leave_days);
                },
                error: function() {
                    alert('Error fetching leave days.');
                }
            });
        } else {
            $('#leave_days').val(0);
        }
    });

    // Validate Leave Duration and Disable Submit Button
    $('#from_date, #to_date').change(function() {
        var fromDate = $('#from_date').val();
        var toDate = $('#to_date').val();
        var leaveDays = parseInt($('#leave_days').val());

        if (fromDate && toDate) {
            var start = new Date(fromDate);
            var end = new Date(toDate);
            var timeDiff = end - start;
            var dayDiff = Math.ceil(timeDiff / (1000 * 60 * 60 * 24)) + 1; // Including both dates

            if (dayDiff > leaveDays) {
                $('#leave-error-message').text('Leave duration exceeds the allowed limit of ' + leaveDays + ' days.');
                $('button[type="submit"]').prop('disabled', true); // Disable submit button
            } else {
                $('#leave-error-message').text('');
                $('button[type="submit"]').prop('disabled', false); // Enable submit button
            }
        } else {
            $('#leave-error-message').text('');
            $('button[type="submit"]').prop('disabled', false); // Enable submit button if dates are not selected
        }
    });
});
</script>
@endpush
