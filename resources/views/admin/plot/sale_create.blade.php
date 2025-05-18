@extends('layouts.admin')
@section('title','Plot-Manage')
@push('styles')
    <style>
            .number-box {
                background: linear-gradient(to bottom, red, #6c3f3f);
                color: white;
                border: 1px solid #777c83;
            }
    </style>
@endpush
@section('content')
<div class="container">
    <div class="page-inner">
        
        <div class="row">
            <div class="card">
                <div class="card-header project-details-card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="project-details-card-header-title"><i class='bx bx-user bx-tada'></i>
                            New Plot Ssale</h4>
                    </div>
                </div>
            </div>
            <!-- Left section (30%) -->
            <div class="col-12 col-md-4">
                <!-- <div class="container mt-5"> -->
                <div class="mb-3" style="max-width: 300px;">
                    <select class="form-control gradient-select sector" name="sector" id="sector" style="height: 45px;">
                        <option selected disabled>Select Sector</option>
                        @foreach ($sectors as $sector)
                            <option value="{{$sector->id}}">{{$sector->sector_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3" style="max-width: 300px;">
                    <select class="form-control gradient-select block" style="height: 45px;" name="block" id="block">
                        <option selected disabled>Select Block</option>

                    </select>
                </div>

                <div class="mb-3" style="max-width: 300px;">
                    <select class="form-control gradient-select road" name="road" id="road" style="height: 45px;">
                        <option selected disabled>Select Road</option>

                    </select>
                </div>
                <!--  Plot selection -->
               <section id="plot-section" style="display: none">
                    <div id="plot-list" class="d-flex flex-wrap gap-2">
                        <!-- Plot boxes will be appended here -->
                    </div>
                </section>


                <!-- </div> -->
            </div>

            <!-- Right section (70%) -->
            <div class="col-12 col-md-8">
                <!-- <div class="container mt-3"> -->
                <div class="form-group d-flex gap-2">
                    <div class="input-group custom-date-input mr-3">
                        <input type="date" class="form-control border-0 shadow-none custom-date-input"
                            placeholder="Date of Sales">

                    </div>

                    <div class="input-group">
                        <select class="form-select form-control customer_agency_name" name="customer_agency_name" id="customer_agency_name">
                            <option>--Select Arency--</option>
                            @foreach ($agencies as $agency)
                                <option value="{{$agency->id}}">{{$agency->agency_name}}</option>
                            @endforeach
                
                        </select>
                    </div>
                </div>
                <div class="form-group d-flex gap-2">
                    <div class="input-group">
                        <select class="form-select form-control customer_salesman_name" name="customer_salesman_name" id="customer_salesman_name">
                            <option>--Select Salesman--</option>

                        </select>
                    </div>

                    <div class="input-group">
                        <select class="form-select form-control customer_name" name="customer_name" id="customer_name">
                            <option>--Select Customer--</option>

                        </select>
                    </div>
                </div>

                <div class="form-group d-flex gap-2">
                    <div class="input-group">
                        <select class="form-select form-control sale_type" name="sale_type" id="sale_type">
                            <option>--Select Sale Type--</option>
                            <option value="1">At-a-Time</option>
                            <option value="2">Instalment</option>

                        </select>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control note" id="note" name="note" placeholder="Note">
                    </div>
                    
                </div>
                <div class="form-group d-flex gap-2">
                    <div class="input-group">
                        <input type="text" class="form-control number_of_instalment" id="number_of_instalment" name="number_of_instalment" placeholder="Number Of Instalment">
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control per_instalment_amount" id="per_instalment_amount" name="per_instalment_amount" placeholder="Per Instalment amount" readonly>
                    </div>
                   
                </div>


                <div style="margin-top: 50px;">
                    <h6 class="section-title">Plot Information</h6>
                    <hr class="section-divider">
                </div>

                <!-- Plot section  -->
                <section class="mt-5">
                    <div class="form-group d-flex gap-2">
                        <!-- <div class="input-group custom-date-input mr-3"> -->
                        <div class="plot-pill w-100 mr-3" class="plot_size">
                            Plot Size
                        </div>
                        <!-- </div> -->

                        <div class="plot-pill w-100" class="per_katha_rate">
                            Per Katha Rate
                        </div>
                    </div>
                    <div class="form-group d-flex gap-2">
                        <!-- <div class="input-group custom-date-input mr-3"> -->
                        <div class="plot-pill w-100 mr-3" class="total_price">
                            Total Price
                        </div>
                        <!-- </div> -->

                        <div class="plot-pill w-100" class="type_of_payment">
                            Type of Payment
                        </div>
                    </div>
                    <div class="form-group d-flex gap-2">
                        <!-- <div class="input-group custom-date-input mr-3"> -->
                        <div class="plot-pill w-100 mr-3" class="number_of_instalment">
                            Number Of Instalment
                        </div>
                        <!-- </div> -->

                        <div class="plot-pill w-100" class="instalment_amount">
                            Per Instalment Amount
                        </div>
                    </div>
                </section>
                <!-- Submit section -->
                <section class="text-center mt-5 ">
                    <div class="container d-inline ">
                        <button class="btn btn-cancel">
                            Cancel
                        </button>
                    </div>
                    <div class="container d-inline ">
                        <button class="btn btn-success">
                            Submit Now
                        </button>
                    </div>
                </section>
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
                                let style = '';

                                if (plot.plot_booking_status == 0) {
                                    style = 'background: linear-gradient(to bottom, green, #2c3c31); color: white;';
                                } else if (plot.plot_booking_status == 1) {
                                    style = 'background: linear-gradient(to bottom, red, #6c3f3f); color: white;';
                                } else if (plot.plot_booking_status == 2) {
                                    style = 'background: linear-gradient(to bottom, yellow, #4e4935); color: black;';
                                }

                                let box = `<div class="number-box" style="${style}">${plot.plot_name}</div>`;
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


    });

</script>
@endpush

