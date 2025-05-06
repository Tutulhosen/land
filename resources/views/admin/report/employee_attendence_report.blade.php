@extends('layouts.admin')
@section('title','Employee Attendence Report')
@section('content')
<style>
    .friday {
        background-color: #ff000052 !important;
  color: black !important;
    }
</style>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="project-details-card-header-title">
                                <i class='bx bx-group bx-tada'></i>
                                Employees Attendence Report
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
                                    <label for="monthyear">Select Month and Year</label>
                                    <input type="text" name="monthyear" id="monthyear" class="form-control monthyearpicker">

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
                                                            <th>Branch Name</th>
                                                            <th>Department</th>
                                                            <th>Designation</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

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
            var monthyear = $('#monthyear').val() || ''; // example: "2025/04"
if (monthyear) {
    var parts = monthyear.split('/');
    var year = parseInt(parts[0], 10);
    var month = parseInt(parts[1], 10);

    var daysInMonth = new Date(year, month, 0).getDate();

    var weekdayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    // Find the "Designation" column header
    var $designationTh = $('thead.table-light tr th').eq(4);
    var fridayIndexes = [];
    var currentIndex = $designationTh.index();

    for (var day = 1; day <= daysInMonth; day++) {
        var date = new Date(year, month - 1, day); // month is 0-indexed
        var weekday = weekdayNames[date.getDay()];
        var dayString = weekday + '<br>' + day;

        var th = $('<th>').html(dayString);

        if (weekday === 'Fri') {
            th.addClass('friday');
            fridayIndexes.push(currentIndex + 1); // next column index
        }

        $designationTh.after(th);
        $designationTh = th;
        currentIndex++;
    }

    // Now highlight the full column in tbody
    $('tbody tr').each(function () {
        var $cells = $(this).find('td');
        fridayIndexes.forEach(function (idx) {
            $cells.eq(idx).css('background-color', 'red');
            $cells.eq(idx).css('color', 'white'); // optional: make text white for contrast
        });
    });
}

            var data = {
                branchId: branchId,
                departmentId: departmentId,
                designationId: designationId,
                monthyear: monthyear
            };

            $.ajax({
                url: '/reports/employee-attendence-report/search-employee',
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
                            employee.official_information?.branch?.name ?? 'N/A',
                            employee.official_information?.department?.department_name ?? 'N/A',
                            employee.official_information?.designation?.designation_name ?? 'N/A',
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
        window.location.href = '/reports/employee-attendence-report/search-employee/pdf?' +
            'branchId=' + branchId +
            '&departmentId=' + departmentId +
            '&designationId=' + designationId +
            '&status=' + status;
    });
});


</script>
@endpush
