@extends('layouts.admin')
@section('title','Branches')
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
               <div class="card">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Plot Information</h4>
                        </div>
                    </div>
                </div>
            </div>
       </div>
       @can('View Branch')
       <div class="row">
        

        <div class="col-md-12">
           <div class="tab-content" id="v-pills-without-border-tabContent">
              <div class="tab-pane fade {{ session('activeTab') == 'plot' || !session('activeTab') ? 'active show' : '' }}" id="plot-nobd" role="tabpanel" aria-labelledby="plot-tab-nobd">
                @include('admin.system-configuration.plot.create-modal')
                <div class="card">
                   <div class="card-header project-details-card-header">
                      <div class="d-flex align-items-center">
                         <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Plot</h4>
                         <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-plot">
                             <i class='bx bx-message-square-add bx-tada' ></i> Add Plot</a>
                      </div>
                   </div>
                   <div class="card-body">
                    <div class="table-responsive">
                       <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                          <div class="row">
                             <div class="col-sm-12">
                                <table id="add-row" class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                   <thead class="">
                                      <tr role="row">
                                         <th class="text-center">Sl</th>
                                         <th class="text-start">Plot Name</th>
                                         <th class="text-start">Sector Name</th>
                                         <th class="text-start">Block Name</th>
                                         <th class="text-start">Road Name</th>
                                         <th class="text-start">Plot Type</th>
                                         <th class="text-start">Plot Size</th>
                                         <th class="text-start">Plot Price</th>
                                         <th class="text-center">Status</th>
                                         <th class="text-center">Action</th>
                                      </tr>
                                   </thead>
                                   <tbody>
                                        @foreach($plots as $index => $plot)
                                            <tr>
                                                <td class="sorting_1 text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $plot->plot_name ?? null }}</td>
                                                <td class="text-center">{{ $plot->sector->sector_name ?? null }}</td>
                                                <td class="text-center">{{ $plot->block->block_name ?? null }}</td>
                                                <td class="text-center">{{ $plot->road->road_name ?? null }}</td>
                                                <td class="text-center">{{ $plot->plot_type->name ?? null }}</td>
                                                <td class="text-center">{{ $plot->plot_size->size_name ?? null }}</td>
                                                <td class="text-center">{{ $plot->plot_price ?? null }}</td>
                                                

                                                <td class="text-center">
                                                    @can('Update Branch')
                                                    <form action="{{ route('plot.toggle', $plot->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        <button type="submit" class="btn {{ $plot->is_active == 1 ? 'status-box-1' : 'status-box-2' }} toggle-status">
                                                            {{ $plot->is_active == 1 ? 'Active' : 'Inactive' }}
                                                        </button>
                                                    </form>
                                                    @endcan
                                                </td>
                                                <td class="text-center">
                                                    <div class="form-button-action">
                                                        @can('Update Branch')
                                                        <button class="btn btn-primary btn-link btn-lg" data-bs-toggle="modal" data-bs-target="#editModalgrid-plot-{{ $plot->id }}">
                                                            <i class='bx bxs-edit bx-tada'></i>
                                                        </button>
                                                        @endcan
                                                        @can('Update Branch')
                                                            <a href="#" id="delete-plot-link" title="delete"
                                                            class="btn btn-link btn-danger btn-lg"
                                                            data-plot-id="{{ $plot->id }}">
                                                            <i class='bx bx-trash-alt'></i>
                                                        </a>
                                                        @endcan

                                                        <form id="delete-plot-form-{{ $plot->id }}"
                                                            action="{{ route('plot.destroy', $plot->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    
                                                    </div>
                                                </td>
                                                @include('admin.system-configuration.plot.edit-modal')
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
    @endcan
    </div>
 </div>
@endsection
@push('scripts')
{{-- sweat alert for multiple crud using funtion--}}
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

        $('.sector').on('change', function () {
            var sectorId = $(this).val();
            if (sectorId) {
                $.ajax({
                    url: "{{ url('/dashboard/get_block_by_sector') }}/" + sectorId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('.block').empty();
                        $('.block').append('<option value="">--select Block--</option>');
                        $.each(data, function (key, value) {
                            $('.block').append('<option value="' + value.id + '">' + value.block_name + '</option>');
                        });
                    }
                });
            } else {
                $('.block').empty();
                $('.block').append('<option value="">--select Block--</option>');
            }
        });

        $('.block').on('change', function () {
            var blockId = $(this).val();
            if (blockId) {
                $.ajax({
                    url: "{{ url('/dashboard/get_road_by_block') }}/" + blockId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('.road').empty();
                        $('.road').append('<option value="">--select Road--</option>');
                        $.each(data, function (key, value) {
                            $('.road').append('<option value="' + value.id + '">' + value.road_name + '</option>');
                        });
                    }
                });
            } else {
                $('.road').empty();
                $('.road').append('<option value="">--select Road--</option>');
            }
        });

        $('.plot_type').on('change', function () {
    
            var plotTypeId = $(this).val();
            if (plotTypeId) {
                $.ajax({
                    url: "{{ url('/dashboard/get_plot_size_by_plot') }}/" + plotTypeId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('.plot_size').empty();
                        $('.plot_size').append('<option value="">--select Plot Size--</option>');
                        $.each(data, function (key, value) {
                            $('.plot_size').append('<option value="' + value.id + '">' + value.size_name + '</option>');
                        });
                    }
                });
            } else {
                $('.plot_size').empty();
                $('.plot_size').append('<option value="">--select Plot Size--</option>');
            }
        });

        $('.plot_size').on('change', function () {
    
            var plotSizeId = $(this).val();
            if (plotSizeId) {
                $.ajax({
                    url: "{{ url('/dashboard/get_plot_price_by_size') }}/" + plotSizeId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        
                        $('.price').empty();
                        $('.price').val(data.plot_price);
                    
                    }
                });
            } else {
                $('.price').empty();
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        function handleDelete(deleteLink, entityType) {
            const entityId = deleteLink.getAttribute(`data-${entityType}-id`);
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
                    document.getElementById(`delete-${entityType}-form-${entityId}`).submit();
                }
            });
        }
        const deleteLinks = document.querySelectorAll('[id^="delete-"]');

        deleteLinks.forEach(function(deleteLink) {
            deleteLink.addEventListener('click', function(e) {
                e.preventDefault();
                const entityType = deleteLink.id.split('-')[1];
                handleDelete(deleteLink, entityType);
            });
        });
    });
</script>


{{-- branch assigned error message --}}
@if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...!',
            text: '{{ session('error') }}',
        });
    </script>
@endif

{{-- assigned branch delete --}}
<script>
$(document).ready(function () {
    $(document).on('click', '.delete-assigned-branch-link', function (e) {
            e.preventDefault(); // Prevent the default link behavior

            const assignedBranchId = $(this).data('assigned-branch-id');
            const deleteUrl = `{{route('assigned-branch.destroy', ':id')}}`.replace(':id', assignedBranchId);
            console.log(deleteUrl);

            //  `/assigned-branch/${assignedBranchId}/delete`; // Update as per your route

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
                            $(`a[data-assigned-branch-id="${assignedBranchId}"]`).closest('li').remove();
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


