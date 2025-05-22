@extends('layouts.admin')
@section('title','Plot-Manage')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">

            <div class="col-xl-12 col-lg-12 ">
                <div class="card">
                    {{-- <div class="card-header">
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
                    </div> --}}

                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="project-details-card-header-title"><i class='bx bx-group bx-tada'></i> Manage Plot Sale
                            </h4>
                            @can('Create Employee')
                            <a href="{{ route('plot.manage.sale.create') }}" class="purchase-button ms-auto" ><i class='bx bx-message-square-add bx-tada' ></i>  New Plot sale</a>
                            @else

                            <a class="ms-auto alert alert-danger" role="alert">
                                <strong>Sorry!</strong> You don't have permission New Plot sale.
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
                                                <th> Sale Date</th>
                                                <th>Customer Name</th>
                                                <th>Plot Number</th>
                                                <th>Total Price</th>
                                                <th>Recived Amount</th>
                                                <th>Total Due</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                                @foreach($plot_sale_datas as $key => $plot_sale_data)
                                                    <tr role="row">
                                                        <td class="text-center">{{ $plot_sale_datas->firstItem() + $key }}</td>
                                                        <td>
                                                                {{ $plot_sale_data->created_at ? $plot_sale_data->created_at->format('Y-m-d') : 'N/A' }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{$plot_sale_data->customer->name ?? 'N/A'}}
                                                        </td>
                                                        <td>
                                                            {{$plot_sale_data->plot->plot_name ?? 'N/A'}}
                                                        </td>
                                                        <td class="text-center">
                                                            {{$plot_sale_data->total_amount ?? 'N/A'}}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $plot_sale_data->total_amount ?? 'N/A' }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $plot_sale_data->total_amount ?? 'N/A' }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $plot_sale_data->total_amount ?? 'N/A' }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $plot_sale_data->total_amount ?? 'N/A' }}
                                                        </td>
                                                       
                                                     
                                                        <td>
                                                            <div class="form-button-action">
                                                                <a href="{{route('customer.profile.view', $plot_sale_data->id)}}" class="btn btn-link btn-secondary btn-lg" title="View">
                                                                    <i class='bx bx-show'></i>
                                                                </a>
                                                                <a href="{{route('customer.edit', $plot_sale_data->id)}}" class="btn btn-link  btn-lg" title="Edit">
                                                                    <i class='bx bxs-edit'></i>
                                                                </a>
                                                                <form action="{{route('customer.destroy', $plot_sale_data->id)}}" method="POST" style="display:inline;" id="delete-customer" class="delete-customer">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-link btn-danger btn-lg" >
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
                                            {{ $plot_sale_datas->links('pagination::bootstrap-4') }}
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

@push('scripts')
<script>
    $(document).ready(function () {

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

        $('.road').on('change', function () {
            var roadId = $(this).val();
            if (roadId) {

                // NEW: Fetch plots for selected road
                $.ajax({
                    url: "{{ url('/dashboard/get_plots_by_road') }}/" + roadId,
                    type: "GET",
                    dataType: "json",
                    success: function (plots) {
                        if (plots.length > 0) {
                            $('#plot-section').show(); // Show the section
                            let plotList = $('#plot-list');
                            plotList.empty(); // Clear previous data

                            $.each(plots, function (index, plot) {
                                let box = `<div class="number-box">${plot.plot_name}</div>`;
                                plotList.append(box);
                            });
                        } else {
                            $('#plot-section').hide(); // Hide if no plots
                        }
                    }
                });

            } else {
                $('.road').empty().append('<option value="">--select Road--</option>');
                $('#plot-section').hide();
            }
        });


    });

</script>
@endpush

