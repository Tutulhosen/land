@extends('layouts.admin')
@section('title','Employee Registration Report')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="project-details-card-header-title">
                                <i class='bx bx-group bx-tada'></i>
                                Employees Registration Report
                            </h4>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="branch">Branch</label>
                                    <select name="selectBranch" id="selectBranch" class="form-control select2">
                                        <option value="">Select Branch</option>
                                        @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}
                                            ({{ $branch->branch_code }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Department">Department</label>
                                    <select name="department" id="selectDepartment" class="form-control select2">
                                        <option value="">Select Department</option>
                                        @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->department_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Designation">Designation</label>
                                    <select name="designation" id="selectDesignation" class="form-control select2">
                                        <option value="">Select Designation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1 d-flex align-items-end pb-1">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary w-100"
                                        id="searchButton">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="display: none;">
                        <div class="card card-round">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-container">
                                            <div class="dt-buttons mb-3">
                                                <button class="btn btn-success" id="exportExcelBtn" type="button">
                                                    <i class="bx bx-file"></i> Export Excel
                                                </button>
                                                <button class="btn btn-danger" id="exportPdfBtn" type="button">
                                                    <i class="bx bx-file"></i> Export PDF
                                                </button>
                                            </div>
                                            <!-- Added table-responsive for better mobile support -->
                                            <div class="table-responsive">
                                                <table id="employeeTable" class="display table table-bordered table-hover text-center mt-3 basic-datatables">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>SL No</th>
                                                            <th>Employee Name</th>
                                                            <th>Employee Code</th>
                                                            <th>Current Grade</th>
                                                            <th>Designation</th>
                                                            <th>Department</th>
                                                            <th>Project Name</th>
                                                            <th>Branch Name</th>
                                                            <th>Phone Number</th>
                                                            <th>Joining Date</th>
                                                            <th>Father’s Name</th>
                                                            <th>Identification Number</th>
                                                            <th>Current Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>01</td>
                                                            <td>Md. Saokat Hossain</td>
                                                            <td>DS09663</td>
                                                            <td>2</td>
                                                            <td>Sr. Manager</td>
                                                            <td>HR & Admin</td>
                                                            <td>Microfinance</td>
                                                            <td>Dhaka</td>
                                                            <td>01711274688</td>
                                                            <td>10 March 2015</td>
                                                            <td>Md. Nurul Amin</td>
                                                            <td>09346554754235346</td>
                                                            <td class="text-success fw-bold">Active</td>
                                                        </tr>
                                                        <!-- Add more rows as needed -->
                                                    </tbody>
                                                </table>
                                            </div> <!-- End table-responsive -->
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
{{-- ******dynamic Employee datatable  ******* --}}
<script>
    $(document).ready(function () {

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
                            designationSelect.append('<option value="' + designation.id +
                                '">' + designation.designation_name + '</option>');
                        });
                    },
                    error: function () {
                        alert('Failed to load designations. Please try again.');
                    }
                });
            } else {
                var designationSelect = $(designationSelectId);
                designationSelect.empty();
                designationSelect.append('<option value="">Select Designation</option>');
            }
        }

        // Event listener for the create modal
        $('#selectDepartment').change(function () {
            var departmentId = $(this).val();
            loadDesignations(departmentId, '#selectDesignation');
        });
    });

    $(document).ready(function () {
        $('#searchButton').click(function () {
            var branchId = $('#selectBranch').val() || '';
            var departmentId = $('#selectDepartment').val() || '';
            var designationId = $('#selectDesignation').val() || '';
            var status = $('#status').val() || '';

            var data = {
                branchId: branchId,
                departmentId: departmentId,
                designationId: designationId,
                status: status
            };

            $.ajax({
                url: '/reports/employee-registration-report/search-employee',
                type: 'GET',
                data: data,
                success: function(response) {
                    $('.card-body').show();
                    let table = $('#employeeTable').DataTable(); // Get DataTable instance
                    table.clear().draw(); // Clear the table before appending new data

                    $.each(response, function(index, employee) {
                        console.log(employee);

                        let row = [
                            index + 1,
                            `${employee.salutations?.name ?? ''} ${employee.first_name} ${employee.last_name}`,
                            employee.emp_id,
                            employee.official_information?.employee_grade?.name ?? 'N/A',
                            employee.official_information?.designation?.designation_name ?? 'N/A',
                            employee.official_information?.department?.department_name ?? 'N/A',
                            employee.official_information?.employee_project?.name ?? 'N/A',
                            employee.official_information?.branch?.name ?? 'N/A',
                            employee.contact?.contact_number ?? 'N/A',
                            new Date(employee.pay_roll_information?.joining_date).toLocaleDateString('en-GB', {
                                day: '2-digit',
                                month: 'short',
                                year: 'numeric'
                            }) ?? 'N/A',
                            employee.fathers_name,
                            employee.identification_number,
                            `<span class="${employee.status == 1 ? 'text-success fw-bold' : 'text-danger fw-bold'}">
                                ${employee.status == 1 ? 'Active' : 'Inactive'}
                            </span>`
                        ];
                        table.row.add(row);
                    });

                    table.draw(); // Redraw DataTable with new data
                },
                error: function (xhr, status, error) {
                    console.error('Error: ' + error);
                    alert('An error occurred while fetching data. Please try again.');
                }
            });
        });
    });


    $(document).ready(function () {
    $('#exportPdfBtn').click(function () {
        var branchId = $('#selectBranch').val() || '';
        var departmentId = $('#selectDepartment').val() || '';
        var designationId = $('#selectDesignation').val() || '';
        var status = $('#status').val() || '';

        // Redirect the user to the URL to download the PDF
        window.location.href = '/reports/employee-registration-report/search-employee/pdf?' +
            'branchId=' + branchId +
            '&departmentId=' + departmentId +
            '&designationId=' + designationId +
            '&status=' + status;
    });
});


</script>
@endpush
