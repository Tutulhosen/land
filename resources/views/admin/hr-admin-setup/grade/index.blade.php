
@extends('layouts.admin')
@section('title','Manage Grade')
@section('content')
<div class="container">
    <div class="page-inner">
       <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada'></i>Grade</h4>
                            <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-grade">
                                <i class='bx bx-message-square-add bx-tada'></i> New Grade</a>
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
                                                    <th class="text-center">Sl</th>
                                                    <th class="text-start">Grades</th>
                                                    <th class="text-start">Designation</th>
                                                    <th class="text-center">Basic Salary</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($grades as $grade)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-start">{{ $grade->name }}</td>
                                                    <td class="text-start">{{ $grade->designation->designation_name }}</td>
                                                    <td>
                                                        <span><i class='bx bxs-offer bx-tada' ></i> Basic Salary: {{ $grade->basic_salary}}</span><br>
                                                        <span class="badge bg-primary"> Increment: {{$grade->amount != null? $grade->amount : $grade->percentage .'%'}}</span><br>
                                                        @php
                                                            if ($grade->amount) {
                                                                # code...
                                                                $grade->total_salary = $grade->basic_salary + $grade->amount;
                                                            }else{
                                                                $grade->total_salary = $grade->basic_salary + ($grade->basic_salary * $grade->percentage / 100);
                                                            }
                                                        @endphp
                                                        <span><i class='bx bxs-offer bx-tada' ></i> Increment Salary: {{ $grade->total_salary}}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <form action="{{ route('grade.toggle', $grade->id) }}" method="POST"
                                                            style="display: inline;">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn toggle-status {{ $grade->status == 1 ? 'status-box-1' : 'status-box-2' }}">
                                                                {{ $grade->status == 1 ? 'Active' : 'Inactive' }}
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="form-button-action">
                                                            <span
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Edit">
                                                                <button class="btn btn-primary btn-link btn-lg me-2" data-bs-toggle="modal"
                                                                    data-bs-target="#Modal-grade-edit-{{ $grade->id }}">
                                                                    <i class='bx bxs-edit bx-tada'></i>
                                                                </button>
                                                            </span>

                                                            <a href="{{ route('grade.destroy', $grade->id) }}" id="delete-grade-link"
                                                                title="delete" class="btn btn-link btn-danger btn-lg delete"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Delete"
                                                                data-grade-id="{{ $grade->id }}">
                                                                <i class='bx bx-trash-alt'></i>
                                                            </a>

                                                        </div>
                                                    </td>
                                                    @include('admin.hr-admin-setup.grade.edit')
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
@include('admin.hr-admin-setup.grade.create')
@endsection
@push('styles')
<style>
    .form-check-input[type="checkbox"] {
        background-color: green !important;
        border: green !important;
        color: white;
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

        $(".delete").on('click',function (e) {
            e.preventDefault();
            let gradeId = $(this).data('grade-id');
            let deleteUrl = $(this).attr('href');
            // Submit the form when the switch is toggled
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
                            $(`a[data-grade-id="${gradeId}"]`).closest('tr').remove();
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
@endpush
