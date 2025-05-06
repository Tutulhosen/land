@extends('layouts.admin')
@section('title','Department')
@section('content')
<style>
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
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="project-details-card-header-title"><i class='bx bx-usb bx-tada'></i> Departments
                            </h4>
                            @can('Create Department')
                            <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addRowModal-departments"><i
                                    class='bx bx-message-square-add bx-tada'></i> Create New Department</a>
                            @endcan
                            @include('admin.hr-admin-setup.department.create-modal')
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @can('View Department')
                                        <table class="display table table-striped table-hover basic-datatables" role="grid"
                                            aria-describedby="add-row_info">
                                            <thead class="">
                                                <tr role="row">
                                                    <th>Sl</th>
                                                    <th>Department Name</th>
                                                    <th>ID</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($departments as $department)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{$loop->iteration}}</td>
                                                    <td>{{ $department->department_name }}</td>
                                                    <td>{{ $department->department_id }}</td>
                                                    <td>{{ $department->description }}</td>
                                                    <td>
                                                        @can('Update Department')
                                                        <form action="{{ route('department.toggle', $department->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            <button type="button" class="btn {{ $department->status == 1 ? 'status-box-1' : 'status-box-2' }} toggle-status"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Click to change Status">
                                                                {{ $department->status == 1 ? 'Active' : 'Inactive' }}
                                                            </button>
                                                        </form>
                                                        @endcan
                                                    </td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            @can('Update Department')
                                                                <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    data-bs-custom-class="custom-tooltip"
                                                                    data-bs-title="Edit">
                                                                        <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#editRowModal-department-{{ $department->id }}"
                                                                            title="" class="btn btn-link btn-success btn-lg" >
                                                                        <i class='bx bxs-edit'></i>
                                                                    </button>
                                                                </span>
                                                            @endcan
                                                            @can('Delete Department')
                                                            <a href="#" id="delete-department-link" title="delete"
                                                                class="btn btn-link btn-danger btn-lg"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Delete"
                                                                data-department-id="{{ $department->id }}">
                                                                <i class='bx bx-trash-alt'></i>
                                                            </a>
                                                            @endcan
                                                            <form id="delete-department-form-{{ $department->id }}"
                                                                action="{{ route('department.destroy', $department->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>

                                                        </div>
                                                    </td>
                                                    @include('admin.hr-admin-setup.department.edit-modal')
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                        <h4 class="text-center">You Don't Have Permission</h4>
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
        const deleteLinks = document.querySelectorAll('[id^="delete-department-link"]');

        deleteLinks.forEach(function(deleteLink) {
            deleteLink.addEventListener('click', function(e) {
                e.preventDefault();
                const departmentId = this.getAttribute('data-department-id');
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
                        document.getElementById('delete-department-form-' + departmentId).submit();
                    }
                });
            });
        });
    });

</script>
@endpush
