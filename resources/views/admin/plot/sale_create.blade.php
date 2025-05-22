@extends('layouts.admin')
@section('title','Plot-Manage')
@push('styles')
    <style>
            .number-box {
                background: linear-gradient(to bottom, red, #6c3f3f);
                color: white;
                border: 1px solid #777c83;
            }
            .number-box.clickable {
                cursor: pointer;
            }

            .number-box.clickable:hover {
                transform: scale(1.05);
                box-shadow: 0 0 10px rgba(0,0,0,0.2);
            }
    </style>
@endpush
@section('content')
<div class="container">
    <div class="page-inner">

        <div id="preloader" style="display: none; position: fixed; z-index: 9999; background: rgba(255,255,255,0.7); top: 0; left: 0; width: 100%; height: 100%;">
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

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
                    <label for="sector">Sector</label>
                    <select class="form-control gradient-select sector" name="sector" id="sector" style="height: 45px;">
                        <option selected disabled>Select Sector</option>
                        @foreach ($sectors as $sector)
                            <option value="{{$sector->id}}">{{$sector->sector_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3" style="max-width: 300px;">
                    <label for="block">Block</label>
                    <select class="form-control gradient-select block" style="height: 45px;" name="block" id="block">
                        <option selected disabled>Select Block</option>

                    </select>
                </div>

                <div class="mb-3" style="max-width: 300px;">
                    <label for="road">Road</label>
                    <select class="form-control gradient-select road" name="road" id="road" style="height: 45px;">
                        <option selected disabled>Select Road</option>

                    </select>
                </div>
                <!--  Plot selection -->
               <section id="plot-section" style="display: none; text-align:center">
                <label for="plot-list" ><h3 >Plot List</h3></label>
                    <div id="plot-list" class="d-flex flex-wrap gap-2">
                        <!-- Plot boxes will be appended here -->
                    </div>
                </section>


                <!-- </div> -->
            </div>

            <!-- Right section (70%) -->
            <div class="col-12 col-md-8 mx-auto">
                <div class="card shadow-sm p-4">
                    <h5 class="mb-4">Sales Entry</h5>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="date_of_sale" class="form-label">Date of Sale</label>
                            <input type="date" id="date_of_sale" class="form-control date_of_sale" placeholder="Date of Sale">

                        </div>
                        <div class="col-md-6">
                            <label for="customer_agency_name" class="form-label">Agency</label>
                            <select class="form-select customer_agency_name" id="customer_agency_name" name="customer_agency_name">
                                <option selected disabled>-- Select Agency --</option>
                                @foreach ($agencies as $agency)
                                    <option value="{{ $agency->id }}">{{ $agency->agency_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="customer_salesman_name" class="form-label">Salesman</label>
                            <select class="form-select customer_salesman_name" id="customer_salesman_name" name="customer_salesman_name">
                                <option selected disabled>-- Select Salesman --</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="customer_name" class="form-label">Customer</label>
                            <select class="form-select customer_name" id="customer_name" name="customer_name">
                                <option selected disabled>-- Select Customer --</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="sale_type" class="form-label">Sale Type</label>
                            <select class="form-select sale_type" id="sale_type" name="sale_type">
                                <option selected disabled>-- Select Sale Type --</option>
                                <option value="2">At-a-Time</option>
                                <option value="1">Instalment</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="note" class="form-label">Note</label>
                            <input type="text" id="note" name="note" class="form-control note" placeholder="Note">
                        </div>
                    </div>

                    <div class="row mb-3 instalment-section" style="display: none;">
                        <input type="hidden" class="plot_id_hidden" id="plot_id_hidden" name="plot_id_hidden">
                        <div class="col-md-6">
                            <label for="number_of_instalment" class="form-label">Number Of Instalments</label>
                            <input type="text" id="number_of_instalment" name="number_of_instalment" class="form-control number_of_instalment" placeholder="Number of Instalments">
                        </div>
                        <div class="col-md-6">
                            <label for="per_instalment_amount" class="form-label">Per Instalment Amount</label>
                            <input type="text" id="per_instalment_amount" name="per_instalment_amount" class="form-control per_instalment_amount" placeholder="Per Instalment Amount" readonly>
                        </div>
                    </div>

                    <hr>

                    <h6 class="mb-3">Plot Information</h6>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="plot_size" class="form-label">Plot Size</label>
                            <input type="text" id="plot_size" class="form-control plot_size" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="per_katha_rate" class="form-label">Per Katha Rate</label>
                            <input type="text" id="per_katha_rate" class="form-control per_katha_rate" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="total_price" class="form-label">Total Price</label>
                            <input type="text" id="total_price" class="form-control total_price" >
                        </div>
                    </div>

                    <div class="text-end">
                        <button class="btn btn-secondary me-2" id="cancel_btn">Cancel</button>
                        <button class="btn btn-success" id="submit_btn">Submit Now</button>
                    </div>
                </div>
            </div>

        </div>
    
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#number_of_instalment').on('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Set today's date as the default
        let today = new Date().toISOString().split('T')[0];
        $('#date_of_sale').val(today);

        // Open date picker when input is clicked
        $('#date_of_sale').on('click', function() {
            if (this.showPicker) {
                this.showPicker(); // Modern browsers
            } else {
                this.focus(); // Fallback
            }
        });
    });


    $(document).ready(function () {

        $('.sale_type').on('change', function () {
            let type_id = $(this).val();
            let plotSize = $('#plot_size').val();

            if (!plotSize) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Plot Not Selected',
                    text: 'Please select a plot first!'
                });

                // Reset the selection
                $(this).prop('selectedIndex', 0);;
                $('.instalment-section').hide();
                return;
            }

            if (type_id == 1) {
                $('.instalment-section').show();
            } else {
                $('.instalment-section').hide();
            }
        });

        $(document).on('keyup', '#number_of_instalment', function () {
            let totalPrice = parseFloat($('#total_price').val()) || 0;
            let numOfInstalments = parseInt($(this).val()) || 0;

            if (totalPrice > 0 && numOfInstalments > 0) {
                let perInstalment = (totalPrice / numOfInstalments).toFixed(2);
                $('#per_instalment_amount').val(perInstalment);
            } else {
                $('#per_instalment_amount').val('');
            }
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
                                let className = 'number-box';
                                let extraAttr = `data-id="${plot.id}"`; // add plot ID as data attribute

                                if (plot.plot_booking_status == 0) {
                                    style = 'background: linear-gradient(to bottom, #4CAF50, #81C784); color: white;';
                                    className += ' clickable';
                                    extraAttr += ` onclick="handlePlotClick(${plot.id})"`; // pass plot ID to handler
                                } else if (plot.plot_booking_status == 1) {
                                    style = 'background: linear-gradient(to bottom, #f44336, #e57373); color: white;';
                                    extraAttr += ` onclick="handlePlotClick(${plot.id})"`;
                                } else if (plot.plot_booking_status == 2) {
                                    style = 'background: linear-gradient(to bottom, #ffeb3b, #fff176); color: black;';
                                    extraAttr += ` onclick="handlePlotClick(${plot.id})"`;
                                }

                                let box = `<div class="${className}" style="${style}" ${extraAttr}>${plot.plot_name}</div>`;
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

        //plot id to data
        $(document).on('click', '.number-box.clickable', function() {

            $('#plot_id_hidden').val('');
            let plotId = $(this).data('id'); // Get plot ID from data-id
            $('#plot_id_hidden').val(plotId);
            if (plotId) {

                // Reset sale_type dropdown and hide instalment section
                $('#sale_type').prop('selectedIndex', 0);
                $('.instalment-section').hide(); // Hide the section if visible

                // Also reset instalment-related fields (optional)
                $('#number_of_instalment').val('');
                $('#per_instalment_amount').val('');

                
                $.ajax({
                    url: "{{ url('/dashboard/get_plot_data_by_id') }}/" + plotId,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        // Populate input fields with data
                        $('#plot_size').val(response.plot_size);
                        $('#per_katha_rate').val(response.per_katha_rate);
                        $('#total_price').val(response.total_price);
                    },
                    error: function(xhr, status, error) {
                        console.error("Failed to fetch plot data:", error);
                    }
                });
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

         // Submit button functionality
        $('#submit_btn').on('click', function (e) {
            e.preventDefault();

            // Show preloader
            $('#preloader').show();

            let data = {
                date_of_sale: $('#date_of_sale').val(),
                sector_id: $('#sector').val(),
                block_id: $('#block').val(),
                road_id: $('#road').val(),
                agency_id: $('#customer_agency_name').val(),
                salesman_id: $('#customer_salesman_name').val(),
                customer_id: $('#customer_name').val(),
                sale_type: $('#sale_type').val(),
                note: $('#note').val(),
                number_of_instalment: $('#number_of_instalment').val(),
                per_instalment_amount: $('#per_instalment_amount').val(),
                plot_size: $('#plot_size').val(),
                per_katha_rate: $('#per_katha_rate').val(),
                total_price: $('#total_price').val(),
                plot_id: $('#plot_id_hidden').val(),
            };

            $.ajax({
                url: '{{ route("plot.manage.sale.store") }}',
                method: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (response) {
                    $('#preloader').hide();

                    Swal.fire({
                        title: 'Success!',
                        text: 'Plot booked successfully!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // Redirect to index page
                        window.location.href = '{{ route("plot.manage.index") }}';
                    });
                },
                error: function (xhr) {
                    $('#preloader').hide();

                    let message = 'Something went wrong while booking the plot.';
                    if (xhr.status === 422 && xhr.responseJSON?.errors) {
                        const errors = xhr.responseJSON.errors;
                        message = Object.values(errors).flat().join('\n');
                    }

                    Swal.fire({
                        title: 'Error!',
                        text: message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });



    });

</script>
@endpush

