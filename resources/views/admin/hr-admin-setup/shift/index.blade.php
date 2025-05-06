@extends('layouts.admin')
@section('title','Shift')
@push('styles')
<style>
    .select2-dropdown {
        z-index: 99999 !important;
    }
    .status-box-2 {
        font-size: 11px;
        font-weight: 300;
        color: #686D76 !important;
        background: #F0DCDC;
        background-color: rgb(240, 220, 220);
        padding: 3px 10px;
        line-height: 11px;
    }
</style>
@endpush
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada'></i> Shifts
                            </h4>
                            @can('Create Shift')
                            <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addRowModal-shifts"><i class='bx bx-message-square-add bx-tada'></i>
                                Create New Shifts</a>
                            @endcan
                            @include('admin.hr-admin-setup.shift.create-modal')
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @can('View Shift')
                                        <table class="display table table-striped table-hover basic-datatables"
                                            role="grid" aria-describedby="add-row_info">
                                            <thead class="">
                                                <tr role="row">
                                                    <th class="text-center">Sl</th>
                                                    <th class="text-center">Shift Name</th>
                                                    <th class="text-start">Department</th>
                                                    <th class="text-center">Shift Time</th>
                                                    <th class="text-center">Shift Hour</th>
                                                    <th class="text-center">Shift Type</th>
                                                    {{-- <th>Max Start Time</th>
                                                    <th>Max End Time</th> --}}
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($shifts as $shift)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ $shift->shift_name }}</td>
                                                     <td class="text-start">
                                                        @if($shift->shiftAndDepartment->isNotEmpty())  <!-- Check if there are any related shiftAndDepartment records -->
                                                            <ul>
                                                                @foreach($shift->shiftAndDepartment as $shiftDepartment)
                                                                        <li>
                                                                            {{ $shiftDepartment->department->department_name }}
                                                                            <a href="#" class="delete-shift-department-link text-danger float-end"
                                                                                data-shift-department-id="{{ $shiftDepartment->id }}"
                                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                                data-bs-custom-class="custom-tooltip"
                                                                                data-bs-title="Detach Department">
                                                                                <i class='bx bxs-tag-x bx-tada'></i>
                                                                            </a>
                                                                        </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($shift->start_time && $shift->end_time)
                                                            Start: <span class="badge bg-secondary">{{ \Carbon\Carbon::parse($shift->start_time)->format('h:i a') }}</span> <br>
                                                            End: <span class="badge bg-secondary">{{ \Carbon\Carbon::parse($shift->end_time)->format('h:i a') }}</span>
                                                        @endif
                                                    </td>

                                                    <td class="text-center">
                                                        @if ($shift->start_time && $shift->end_time)
                                                        {{ \Carbon\Carbon::parse($shift->start_time)->diff(\Carbon\Carbon::parse($shift->end_time))->format('%H:%I') }}
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if(!empty($shift->shift_type))
                                                        {{ $shift->shift_type->name }}
                                                        @endif
                                                    </td>
                                                    {{-- <td>{{ \Carbon\Carbon::parse($shift->max_start_time)->format('h:i a') }}
                                                    <td>{{ \Carbon\Carbon::parse($shift->max_end_time)->format('h:i a') }} --}}
                                                    </td>
                                                    <td class="text-center">
                                                        <form action="{{ route('shift.toggle', $shift->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn {{ $shift->status == 1 ? 'status-box-1' : 'status-box-2' }} toggle-status"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Click to change Status">
                                                                {{ $shift->status == 1 ? 'Active' : 'Inactive' }}
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="form-button-action">
                                                            @can('Update Shift')
                                                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Edit">
                                                                <button type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#editRowModal-shift-{{ $shift->id }}"
                                                                    title="" class="btn btn-link btn-primary btn-lg">
                                                                    <i class='bx bxs-edit'></i>
                                                                </button>
                                                            </span>
                                                            @endcan
                                                            @can('Delete Shift')
                                                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Delete">

                                                                <a href="#" id="delete-shift-link" title="delete"
                                                                    class="btn btn-link btn-danger btn-lg"
                                                                    data-shift-id="{{ $shift->id }}">
                                                                    <i class='bx bx-trash-alt'></i>
                                                                </a>
                                                            </span>
                                                            @endcan
                                                            <form id="delete-shift-form-{{ $shift->id }}"
                                                                action="{{ route('shift.destroy', $shift->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            @can('Update Shift')
                                                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Assign Department">

                                                                <button class="btn btn-success btn-link btn-lg" data-bs-toggle="modal"
                                                                data-bs-target="#department_assign_modal-{{ $shift->id }}">
                                                                <i class='bx bx-message-square-add bx-tada'></i>
                                                                </button>
                                                            </span>
                                                            @endcan
                                                        </div>
                                                    </td>
                                                    @include('admin.hr-admin-setup.shift.department-assign-modal')
                                                    @include('admin.hr-admin-setup.shift.edit-modal')
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @endcan
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
        $(".toggle-status").on('click',function (e) {
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

        $(document).on('click', '.delete-shift-department-link', function (e) {
            e.preventDefault(); // Prevent the default link behavior

            const shiftDepartmentId = $(this).data('shift-department-id');
            const deleteUrl = `{{route('shift-department.destroy', ':id')}}`.replace(':id', shiftDepartmentId);
            console.log(deleteUrl);

            Swal.fire({
                title: 'Do you want to detach department?',
                text: "You won't be able to revert this action!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, detach it!',
                cancelButtonText: 'No, cancel!',
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-info'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: deleteUrl,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for security
                        },
                        success: function (response) {
                            Swal.fire('Detached!', response.message, 'success');
                            // Remove the deleted row from the DOM
                            $(`a[data-shift-department-id="${shiftDepartmentId}"]`).closest('li').remove();
                        },
                        error: function (xhr) {
                            Swal.fire('Error!', 'Something went wrong.', 'error');
                        }
                    });
                }
            });
        });



        $('#department_id').select2({
            theme: "bootstrap",
            dropdownParent: $('#addRowModal-shifts'),
        });
    });
    // Use event delegation to handle click events for all delete buttons
    document.addEventListener('DOMContentLoaded', function () {
        const deleteLinks = document.querySelectorAll('[id^="delete-shift-link"]');

        deleteLinks.forEach(function (deleteLink) {
            deleteLink.addEventListener('click', function (e) {
                e.preventDefault();
                const shiftId = this.getAttribute('data-shift-id');
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
                        document.getElementById('delete-shift-form-' + shiftId)
                    .submit();
                    }
                });
            });
        });
    });

</script>
{{-- dynamic designation --}}
{{-- <script>
    $(document).ready(function () {
        function loadDesignations(departmentId, designationSelectId) {
            if (departmentId) {
                $.ajax({
                    url: '/dashboard/shift/designations/' + departmentId, // Route for designations
                    type: 'GET',
                    success: function (data) {

                        var designationSelect = $(designationSelectId);
                        designationSelect.empty(); // Clear previous designations
                        designationSelect.append(
                            '<option value="" disabled>Select Designation</option>');

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
                designationSelect.append('<option value="" disabled>Select Designation</option>');
            }
        }

        // Event listener for the create modal
        $('#department_id').change(function () {
            var departmentId = $(this).val();
            loadDesignations(departmentId, '#designation_id');
        });

        function loadDesignationsEdit(departmentId, designationSelectId, selectedDesignationId = null) {
            if (departmentId) {
                $.ajax({
                    url: '/dashboard/shift/designations/' + departmentId, // Route to get designations
                    type: 'GET',
                    success: function (data) {
                        var designationSelect = $(designationSelectId);
                        designationSelect.empty(); // Clear previous options
                        designationSelect.append(
                            '<option value="" disabled>Select Designation</option>');

                        $.each(data, function (key, designation) {
                            let selected = selectedDesignationId == designation.id ?
                                'selected' : '';
                            designationSelect.append('<option value="' + designation.id +
                                '" ' + selected + '>' + designation.designation_name +
                                '</option>');
                        });
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

        // Handle change event in the edit modal
        $('.edit_department_id').change(function () {
            var departmentId = $(this).val();
            var designationSelect = $(this).closest('.row').find('.edit_designation_id');
            var selectedDesignationId = designationSelect.val(); // Get the current selected designation

            loadDesignationsEdit(departmentId, designationSelect, selectedDesignationId);
        });

        // Pre-load designations when modal opens
        $('.edit_department_id').each(function () {
            var departmentId = $(this).val();
            var designationSelect = $(this).closest('.row').find('.edit_designation_id');
            var selectedDesignationId = designationSelect
        .val(); // Get the existing selected designation

            if (departmentId) {
                loadDesignationsEdit(departmentId, designationSelect, selectedDesignationId);
            }
        });
    });

</script> --}}


{{-- department assign erorr message --}}
@if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...!',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
@endpush
