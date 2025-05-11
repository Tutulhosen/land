@extends('layouts.admin')
@section('title','Employee')
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="project-details-card-header-title"><i class='bx bx-group bx-tada'></i> Customer
                            </h4>
                            @can('Create Employee')
                            <a href="{{ route('customer.create') }}" class="purchase-button ms-auto" ><i class='bx bx-message-square-add bx-tada' ></i> Add Customer</a>
                            @else

                            <a class="ms-auto alert alert-danger" role="alert">
                                <strong>Sorry!</strong> You don't have permission to Create Customer.
                            </a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        @can('View Employee')
                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table  class="display table table-striped table-hover" role="grid"
                                            aria-describedby="add-row_info" id="employeeTable">
                                            <thead class="">
                                                <tr role="row">
                                                <th>Sl</th>
                                                <th>Customer </th>
                                                <th>Father's Name </th>
                                                <th>Contact Information </th>
                                                <th>Plot No </th>
                                                <th>NID Number</th>
                                                <th>Status</th>
                                                <th>Additional</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                                @foreach($customers as $key => $customer)
                                                    <tr role="row">
                                                        <td class="text-center">{{ $customers->firstItem() + $key }}</td>
                                                        <td>
                                                            <i class='bx bx-user-circle'></i> {{ $customer->name }} 
                                                            <br/>{{ $customer->permanent_address ?? 'N/A' }}
                                                            <br/><i class='bx bx-id-card bx-flashing'></i> ID-{{ $customer->code }}
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="#" class="client-info">
                                                                <i class='bx bx-user-voice'></i> {{ $customer->father_name ?? 'N/A' }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="tel:{{ $customer->number }}" class="client-info">
                                                                <i class='bx bx-phone-outgoing bx-tada'></i> {{ $customer->number }}
                                                            </a><br/>
                                                            <a href="tel:{{ $customer->contact_number_emergency ?? $customer->contact_number_emergency }}" class="client-info">
                                                                <i class='bx bxl-whatsapp bx-tada'></i> {{ $customer->contact_number_emergency ?? 'N/A' }}
                                                            </a><br/>
                                                            <a href="mailto:{{ $customer->email }}" class="client-info">
                                                                <i class='bx bx-mail-send bx-tada'></i> {{ $customer->email ?? 'N/A' }}
                                                            </a>
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $customer->plot_no ?? 'N/A' }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $customer->passport_no ?? 'N/A' }}
                                                        </td>
                                                        <td>
                                                            <button class="btn {{ $customer->is_active == 1 ? 'status-box-1' : 'status-box-2' }}">
                                                                {{ $customer->is_active == 1 ? 'Active' : 'Inactive' }}
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-label-primary btn-round btn-xs" data-bs-toggle="modal" data-bs-target="#addRowModal-documents">
                                                                <i class='bx bx-cloud-download bx-flashing me-1'></i> Documents
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <a href="" class="btn btn-link btn-secondary btn-lg" title="View">
                                                                    <i class='bx bx-show'></i>
                                                                </a>
                                                                <a href="{{route('customer.edit', $customer->id)}}" class="btn btn-link btn-success btn-lg" title="Edit">
                                                                    <i class='bx bxs-edit'></i>
                                                                </a>
                                                                <form action="" method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-link btn-danger btn-lg" onclick="return confirm('Are you sure?')">
                                                                        <i class='bx bx-trash-alt'></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>
                                        
                                        </table>
                                        
                                        <div class="d-flex justify-content-center mt-3">
                                            {{ $customers->links('pagination::bootstrap-4') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="alert alert-danger" role="alert">
                            <strong>Sorry!</strong> You don't have permission to view employee.
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
<!-- DataTables CSS -->
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> --}}
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
   {{-- ******dynamic Employee datatable  ******* --}}
<script>


    $(document).ready(function () {
        let table = $('#employeeTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('customer.index') }}", // Your route to fetch data
                data: function (d) {
                    d.branch_id = $('#selectBranch').val();
                    d.department_id = $('#selectDepartment').val();
                    d.designation_id = $('#selectDesignation').val();
                    d.employee_id = $('#selectEmployee').val();
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', className: "text-center", orderable: false, searchable: false },
                { data: 'employee', name: 'employee', className: "text-center" },
                { data: 'official', name: 'official', className: "text-center" },
                { data: 'contact', name: 'contact', className: "text-center" },
                { data: 'shift', name: 'shift', className: "text-center" },
                // { data: 'week_off', name: 'week_off', className: "text-center" },
                { data: 'status', name: 'status', className: "text-center" },
                { data: 'additional', name: 'additional', className: "text-center" },
                { data: 'action', name: 'action', orderable: false, searchable: false, className: "text-center" }
            ],
            // dom: 'Bfrtip', // Add buttons for export options
            // buttons: [
            //     {
            //         extend: 'excelHtml5',
            //         text: '<i class="bx bx-file"></i> Export Excel',
            //         className: 'btn btn-success',
            //         title: 'Employee list'
            //     },
            //     {
            //         extend: 'pdfHtml5',
            //         text: '<i class="bx bx-file"></i> Export PDF',
            //         className: 'btn btn-danger',
            //         title: 'Employee list',
            //         orientation: 'landscape',
            //         pageSize: 'A4'
            //     }
            // ]
        });

        $('.select2, .datepicker').on('change', function () {
            table.draw();  // Reload DataTable with new filter values
        });

        $(document).on('click', '.delete-employee', function(e) {
            e.preventDefault();
            var employeeId = $(this).data('employee-id');
            let deleteUrl = $(this).attr('href');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this action!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-secondary'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, find the form and submit it
                    $.ajax({
                        url: deleteUrl,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for security
                        },
                        success: function (response) {
                            Swal.fire('Deleted!', response.message, 'success');
                            // Remove the deleted row from the DOM
                            $(`a[data-employee-id="${employeeId}"]`).closest('tr').remove();
                        },
                        error: function (xhr) {
                            Swal.fire('Error!', 'Something went wrong.', 'error');
                        }
                    });
                }
            });
        });

        $(document).on('click','.toggle-status',function (e) {
            e.preventDefault();

                // Submit the form when the switch is toggled
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to change status!",
                icon: '',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-primary'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, find the form and submit it
                    $(this).closest("form").submit();
                }else{
                    Swal.fire("Status is not changed", "", "info");
                }
            });
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
                            employeeSelect.append('<option value="' + employee.id +'">' +
                                 employee.first_name + ' '+ employee.last_name + '('+ employee.last_name +')'+
                            '</option>');
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
