@extends('layouts.admin')
@section('title','Leave Type')
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
                            <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada'></i> Leave Type
                            </h4>
                            @can('Create LeaveType')
                            <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addRowModal-leavetypes"><i
                                    class='bx bx-message-square-add bx-tada'></i>
                                Create New Leave Type</a>
                            @endcan
                            @include('admin.hr-admin-setup.leave-type.create-modal')
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @can('View LeaveType')
                                        <table id="add-row" class="display table table-striped table-hover basic-datatables" role="grid"
                                            aria-describedby="add-row_info">
                                            <thead class="">
                                                <tr role="row">
                                                    <th class="text-center">Sl</th>
                                                    <th class="text-center">Leave Name</th>
                                                    <th class="text-start">Department</th>
                                                    <th class="text-center">Available For</th>
                                                    <th class="text-center">Notification Period </th>
                                                    <th class="text-center">Carry Forward Limit</th>
                                                    <th class="text-center">Created On </th>
                                                    <th class="text-center">Created By </th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($leavetypes as $leavetype)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">
                                                        {{ $leavetype->leave_name }}
                                                        <br>
                                                        {{ $leavetype->leave_days }} days
                                                        <br>
                                                        @if(!empty($leavetype->leaveDuration->name))
                                                        {{ $leavetype->leaveDuration->name }}
                                                        @endif
                                                    </td>

                                                    <td class="text-start">
                                                        @if($leavetype->leaveTypeAndDepartment->isNotEmpty())  <!-- Check if there are any related leave-typeAndDepartment records -->
                                                            <ul>
                                                                @foreach($leavetype->leaveTypeAndDepartment as $leaveTypeDepartment)
                                                                        <li>
                                                                            {{ $leaveTypeDepartment->department->department_name }}
                                                                            <a href="#" class="delete-leave-type-department-link text-danger float-end"
                                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                                data-bs-custom-class="custom-tooltip"
                                                                                data-bs-title="Detach Department"
                                                                                data-leave-type-department-id="{{ $leaveTypeDepartment->id }}">
                                                                                <i class='bx bx-trash-alt bx-tada'></i>
                                                                            </a>
                                                                        </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if(!empty($leavetype->available_for == 'all_employee'))
                                                            All Employee
                                                        @elseif (!empty($leavetype->available_for == 'gender_wise'))
                                                            {{ $leavetype->gender->name }}
                                                        @elseif (!empty($leavetype->available_for == 'religion_wise'))
                                                            {{ $leavetype->religion->name }}
                                                        @endif
                                                    </td>

                                                    <td class="text-center">    @if(!empty( $leavetype->notificationPeriod->name ))
                                                         {{ $leavetype->notificationPeriod->name }}
                                                        @endif
                                                    </td>
                                                    <td class="text-center">    @if(!empty($leavetype->carryForwardlimit->name ))
                                                         {{ $leavetype->carryForwardlimit->name }}
                                                        @endif
                                                    </td>
                                                    <td class="text-center">{{ \Carbon\Carbon::parse($leavetype->created_at)->format('d M Y') }}</td>

                                                    <td class="text-center">{{ $leavetype->createdBy->name }}</td>

                                                    <td class="text-center">
                                                        @can('Update LeaveType')
                                                        <form action="{{ route('leavetype.toggle', $leavetype->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            <button type="submit"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Click to change Status"
                                                                class="btn {{ $leavetype->status == 1 ? 'status-box-1' : 'status-box-2' }} toggle-status">
                                                                {{ $leavetype->status == 1 ? 'Active' : 'Inactive' }}
                                                            </button>
                                                        </form>
                                                        @endcan
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="form-button-action">

                                                            @can('Update LeaveType')
                                                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Edit">
                                                                    <button type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#editRowModal-leavetype-{{ $leavetype->id }}"
                                                                        title="" class="btn btn-link btn-primary btn-lg">
                                                                    <i class='bx bxs-edit'></i>
                                                                </button>
                                                            </span>
                                                            @endcan

                                                            @can('Delete LeaveType')
                                                            <a href="#" id="delete-leavetype-link" title="delete"
                                                                class="btn btn-link btn-danger btn-lg"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Delete"
                                                                data-leavetype-id="{{ $leavetype->id }}">
                                                                <i class='bx bx-trash-alt'></i>
                                                            </a>
                                                            @endcan
                                                            <form id="delete-leavetype-form-{{ $leavetype->id }}"
                                                                action="{{ route('leavetype.destroy', $leavetype->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                            @can('Update LeaveType')
                                                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Assign Department">
                                                                <button class="btn btn-success btn-link btn-lg" data-bs-toggle="modal"
                                                                data-bs-target="#department_assign_modal-{{ $leavetype->id }}">
                                                                    <i class='bx bx-message-square-add bx-tada'></i>
                                                                </button>
                                                            </span>
                                                            @endcan

                                                        </div>
                                                    </td>
                                                    @include('admin.hr-admin-setup.leave-type.department-assign-modal')
                                                    @include('admin.hr-admin-setup.leave-type.edit-modal')
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
    });
    // Use event delegation to handle click events for all delete buttons
    document.addEventListener('DOMContentLoaded', function() {
        const deleteLinks = document.querySelectorAll('[id^="delete-leavetype-link"]');

        deleteLinks.forEach(function(deleteLink) {
            deleteLink.addEventListener('click', function(e) {
                e.preventDefault();
                const leavetypeId = this.getAttribute('data-leavetype-id');
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
                        document.getElementById('delete-leavetype-form-' + leavetypeId).submit();
                    }
                });
            });
        });
    });
</script>

<script>
     $(document).ready(function () {

        $('.dept-Select2').select2({
            theme: "bootstrap",
            placeholder: "--Select--",
            width: "100%"
        });

        // Event listener for the delete button

        $(document).on('click', '.delete-leave-type-department-link', function (e) {
            e.preventDefault(); // Prevent the default link behavior

            const leaveTypeDepartmentId = $(this).data('leave-type-department-id');
            const deleteUrl = `{{route('leave-type-department.destroy', ':id')}}`.replace(':id', leaveTypeDepartmentId);
            console.log(deleteUrl);

            //  `/leave-type-department/${leaveTypeDepartmentId}/delete`; // Update as per your route

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this action!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
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
                            Swal.fire('Deleted!', response.message, 'success');
                            // Remove the deleted row from the DOM
                            $(`a[data-leave-type-department-id="${leaveTypeDepartmentId}"]`).closest('li').remove();
                        },
                        error: function (xhr) {
                            Swal.fire('Error!', 'Something went wrong.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        function loadDesignations(departmentId, designationSelectId) {
            if (departmentId) {
                $.ajax({
                    url: '/dashboard/leavetype/designations/' + departmentId, // Route for designations
                    type: 'GET',
                    success: function (data) {
                        var designationSelect = $(designationSelectId);
                        designationSelect.empty(); // Clear previous designations
                        designationSelect.append('<option value="" disabled>Select Designation</option>');

                        // Loop through and append designations to the dropdown
                        $.each(data, function (key, designation) {
                            designationSelect.append('<option value="' + designation.id + '">' + designation.designation_name + '</option>');
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
                    url: '/dashboard/leavetype/designations/' + departmentId, // Route to get designations
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
</script>

@endpush
