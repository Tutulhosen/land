@extends('layouts.admin')
@section('title','Holiday')
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
                   <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pb-2">
                      <div class="table-title">
                         <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Holidays</h4>
                      </div>
                      @can('Create Holiday')
                      <div class="multi-button-area ms-md-auto">
                         <a href="#" class="purchase-button" data-bs-toggle="modal" data-bs-target="#addRowModal-holiday"><i class='bx bx-message-square-add bx-tada' ></i> Add Holiday</a>
                      </div>
                      @endcan
                      @include('admin.hr-admin-setup.holiday.create-modal')
                   </div>
                   <div class="row table-search-box">
                      <div class="col-sm-3">
                         <div class="form-group">
                            <select class="form-select form-control custom-input custom-input" id="defaultSelect" placeholder="Expense By">
                               <option>Holiday Type</option>
                               <option>Inactive</option>
                            </select>
                         </div>
                      </div>
                      <div class="col-sm-3">
                         <div class="form-group">
                            <select class="form-select form-control custom-input custom-input" id="defaultSelect" placeholder="Expense Category">
                               <option>Duration</option>
                               <option>Inactive</option>
                            </select>
                         </div>
                      </div>
                      <div class="col-sm-3">
                         <div class="form-group">
                            <select class="form-select form-control custom-input custom-input" id="defaultSelect" placeholder="Expense By">
                               <option>Month</option>
                               <option>Inactive</option>
                            </select>
                         </div>
                      </div>
                      <div class="col-sm-2">
                         <div class="form-group">
                            <select class="form-select form-control custom-input custom-input" id="defaultSelect" placeholder="Expense By">
                               <option>By Status</option>
                               <option>Paid</option>
                            </select>
                         </div>
                      </div>
                      <div class="col-sm-1">
                         <a class="relode-button"><i class='bx bx-revision bx-tada' ></i></a>
                      </div>
                   </div>
                </div>
                <div class="card-body">
                   <div class="table-responsive">
                      <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                         <div class="row">
                            <div class="col-sm-12">
                                @can('View Holiday')
                               <table class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                  <thead class="">
                                     <tr role="row">
                                        <th class="text-center">Sl</th>
                                        <th class="text-center">Occation/Holiday Name</th>
                                        <th class="text-center">Duration</th>
                                        <th class="text-center">Created By</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Department</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($holidays as $holiday)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $holiday->holiday_name }}</td>
                                        <td class="text-center">{{ $holiday->duration }}</td>
                                        <td class="text-center">{{ $holiday->created_by }}</td>
                                        <td class="text-center">{{ $holiday->description }}</td>
                                        <td class="text-center">
                                            @if ($holiday->department)
                                                {{ $holiday->department->department_name }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @can('Update Holiday')
                                            <form action="{{ route('holiday.toggle', $holiday->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="Click to change Status"
                                                    class="btn {{ $holiday->status == 1 ? 'status-box-1' : 'status-box-2' }} toggle-status">
                                                    {{ $holiday->status == 1 ? 'Active' : 'Inactive' }}
                                                </button>
                                            </form>
                                            @endcan
                                        </td>
                                        <td class="text-center">
                                            <div class="form-button-action">

                                                @can('Update Holiday')
                                                <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="Edit">
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#editRowModal-holiday-{{ $holiday->id }}"
                                                        title="" class="btn btn-link btn-success btn-lg">
                                                        <i class='bx bxs-edit'></i>
                                                    </button>
                                                </span>
                                                @endcan


                                                @can('Delete Holiday')
                                                <a href="#" id="delete-holiday-link" title="delete"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="Delete"
                                                    class="btn btn-link btn-danger btn-lg"
                                                    data-holiday-id="{{ $holiday->id }}">
                                                    <i class='bx bx-trash-alt'></i>
                                                </a>
                                                @endcan

                                                <form id="delete-holiday-form-{{ $holiday->id }}"
                                                    action="{{ route('holiday.destroy', $holiday->id) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                            </div>
                                        </td>
                                        @include('admin.hr-admin-setup.holiday.edit-modal')
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
        const deleteLinks = document.querySelectorAll('[id^="delete-holiday-link"]');

        deleteLinks.forEach(function(deleteLink) {
            deleteLink.addEventListener('click', function(e) {
                e.preventDefault();
                const holidayId = this.getAttribute('data-holiday-id');
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
                        document.getElementById('delete-holiday-form-' + holidayId).submit();
                    }
                });
            });
        });
    });

    $(document).ready(function () {
        // Function to calculate duration
        function calculateDuration() {
            let startDate = $("#start_date").val();
            let endDate = $("#end_date").val();
            console.log(startDate, endDate);

            if (startDate && endDate) {
                let start = new Date(startDate);
                let end = new Date(endDate);

                if (end >= start) {
                    let duration = Math.ceil((end - start) / (1000 * 60 * 60 * 24)); // Convert milliseconds to days
                    $("#duration").val(duration + " Days");
                } else {
                    $("#duration").val("Invalid Date Range");
                }
            } else {
                $("#duration").val("");
            }
        }

        // Trigger calculation when dates are selected
        $("#start_date, #end_date").on("change", calculateDuration);
    });
</script>

@endpush





