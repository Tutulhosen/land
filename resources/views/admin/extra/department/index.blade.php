@extends('layouts.admin')
@section('title','Department')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada'></i> Departments
                            </h4>
                            <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addRowModal-departments"><i
                                    class='bx bx-message-square-add bx-tada'></i> Create New Department</a>
                            @include('admin.department.create-modal')
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
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
                                                    <td class="sorting_1">{{ $loop->iteration }}</td>
                                                    <td>{{ $department->department_name }}</td>
                                                    <td>{{ $department->department_id }}</td>
                                                    <td>{{ $department->description }}</td>

                                                    <td> @if($department->status == 1)
                                                        <button class="btn status-box-1">Active</button>
                                                        @elseif($department->status == 0)
                                                        <button class="btn status-box-1">InActive</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="form-button-action">

                                                            <button type="button" data-bs-toggle="modal" data-bs-target="#editRowModal-department-{{ $department->id }}" title="" class="btn btn-link btn-success btn-lg" >
                                                                <i class='bx bxs-edit'></i>
                                                            </button>


                                                            <a href="#" id="delete-department-link" title="delete"
                                                                class="btn btn-link btn-danger btn-lg"
                                                                data-department-id="{{ $department->id }}">
                                                                <i class='bx bx-trash-alt'></i>
                                                            </a>

                                                            <form id="delete-department-form-{{ $department->id }}"
                                                                action="{{ route('department.destroy', $department->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>

                                                        </div>
                                                    </td>
                                                    @include('admin.department.edit-modal')
                                                </tr>
                                                @endforeach
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
</div>
@endsection
@push('scripts')
<script>
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
