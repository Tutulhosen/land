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
                                    <label for="">Project Name</label>
                                    <select name="project" id="project" class="form-control">
                                        <option value="">Select Project</option>
                                        @foreach ($projects as $project)
                                            <option value="{{$project->id}}">{{$project->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="col-xl-3">
                                <div class="mb-3">
                                    <label for="">Agency Name</label>
                                    <select class="form-select customer_agency_name " id="customer_agency_name" name="customer_agency_name">
                                        <option selected disabled>-- Select Agency --</option>
                                        @foreach ($agencies as $agency)
                                            <option value="{{ $agency->id }}">{{ $agency->agency_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="mb-3">
                                    <label for="">Salesman</label>
                                    <select class="form-select customer_salesman_name" id="customer_salesman_name" name="customer_salesman_name">
                                        <option selected disabled>-- Select Salesman --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="mb-3">
                                    <label for="">Customer</label>
                                    <select class="form-select customer_name" id="customer_name" name="customer_name">
                                        <option selected disabled>-- Select Customer --</option>
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col-xl-10">
            
                            </div>
                            <div class="col-xl-2" style="text-align: right; border-radius:5px">
                                <button type="button" id="search_btn" class="btn btn-sm btn-primary search_btn">search</button>
                            </div> --}}
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
                                        <table  class="display table table-striped table-hover customer-list" role="grid"
                                            aria-describedby="add-row_info" id="customer-list">
                                            <thead class="">
                                                <tr role="row">
                                                <th>Sl</th>
                                                <th>Customer </th>
                                                <th>Father's Name </th>
                                                <th>Contact Information </th>
                                                <th>Plot No </th>
                                                {{-- <th>NID Number</th> --}}
                                                <th>Status</th>
                                                <th>Additional</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                                <tbody id="customer-list-body">
                                                    @include('admin.employee.partials.customer_list', ['customers' => $customers])
                                                </tbody>
                                                {{-- <tbody id="customer-list-body">
                                                    @include('admin.employee.partials._customer_list', ['customers' => $customers])
                                                </tbody> --}}
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
    // Wrap AJAX call in a function for reuse
    function fetchFilteredCustomers() {
        $.ajax({
            url: "{{ route('customer.index') }}",
            type: 'GET',
            data: {
                project_id: $('#project').val(),
                agency_id: $('#customer_agency_name').val(),
                salesman_id: $('#customer_salesman_name').val(),
                customer_id: $('#customer_name').val(),
            },
            success: function (response) {
                $('#customer-list-body').html(response.html);
            }
        });
    }

    // Trigger on change for all search fields
    $('#project, #customer_agency_name, #customer_salesman_name, #customer_name').on('change', function () {
        fetchFilteredCustomers();
    });

    $(document).ready(function() {
        $('#customer_salesman_name').select2({
            placeholder: "-- Select Salesman --",
            allowClear: true
        });

        $('#customer_name').select2({
            placeholder: "-- Select Customer --",
            allowClear: true
        });

        $('#customer_agency_name').select2({
            placeholder: "-- Select Agency --",
            allowClear: true
        });
        $('#project').select2({
            placeholder: "-- Select Project --",
            allowClear: true
        });
            
    });
</script>
<script>
    
    document.querySelectorAll('.delete-customer').forEach(function(form) {
        form.querySelector('button').addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': form.querySelector('[name=_token]').value,
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: new URLSearchParams(new FormData(form))
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Deleted!', data.success, 'success').then(() => {
                                location.reload(); // or redirect if needed
                            });
                        }
                    });
                }
            });
        });
    });

    $(document).ready(function () {

        $('.select2, .datepicker').on('change', function () {
            table.draw();  // Reload DataTable with new filter values
        });

        $('.customer_agency_name').on('change', function () {

            var customer_agency_nameId = $(this).val();

            if (customer_agency_nameId) {
                $.ajax({
                    url: "{{ url('/dashboard/get_salesman_by_agency') }}/" + customer_agency_nameId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('.customer_salesman_name').empty();
                        $('.customer_salesman_name').append('<option value="">--select Salesman--</option>');
                        $.each(data, function (key, value) {
                            $('.customer_salesman_name').append('<option value="' + value.id + '">' + value.salesman_name + '</option>');
                        });
                    }
                });
            } else {
                $('.customer_salesman_name').empty();
                $('.customer_salesman_name').append('<option value="">--select--</option>');
            }
        });

        $('.customer_salesman_name').on('change', function () {
            var customer_salesman_nameId = $(this).val();
            if (customer_salesman_nameId) {
                $.ajax({
                    url: "{{ url('/dashboard/get_customer_by_salesman') }}/" + customer_salesman_nameId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('.customer_name').empty();
                        $('.customer_name').append('<option value="">--select Customer--</option>');
                        $.each(data, function (key, value) {
                            $('.customer_name').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('.customer_name').empty();
                $('.customer_name').append('<option value="">--select--</option>');
            }
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



    });
</script>

@endpush
