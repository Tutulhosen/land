@extends('layouts.admin')
@section('title','Plot-Manage')
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
                        <!-- <span class="input-group-text bg-transparent border-0">
                            <i class="fas fa-calendar-alt text-muted"></i>
                        </span> -->
                    </div>

                    <div class="input-group custom-date-input">
                        <input type="date" class="form-control border-0 shadow-none custom-date-input"
                            placeholder="Date of Sales">
                        <!-- <span class="input-group-text bg-transparent border-0">
                            <i class="fas fa-calendar-alt text-muted"></i>
                        </span> -->
                    </div>
                </div>
                <div class="form-group d-flex gap-2">
                    <div class="input-group custom-date-input mr-3">
                        <input type="date" class="form-control border-0 shadow-none custom-date-input"
                            placeholder="Date of Sales">
                        <!-- <span class="input-group-text bg-transparent border-0">
                            <i class="fas fa-calendar-alt text-muted"></i>
                        </span> -->
                    </div>

                    <div class="input-group custom-date-input">
                        <input type="date" class="form-control border-0 shadow-none custom-date-input"
                            placeholder="Date of Sales">
                        <!-- <span class="input-group-text bg-transparent border-0">
                            <i class="fas fa-calendar-alt text-muted"></i>
                        </span> -->
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
                        <div class="plot-pill w-100 mr-3">
                            Plot Size
                        </div>
                        <!-- </div> -->

                        <div class="plot-pill w-100">
                            Plot Size
                        </div>
                    </div>
                    <div class="form-group d-flex gap-2">
                        <!-- <div class="input-group custom-date-input mr-3"> -->
                        <div class="plot-pill w-100 mr-3">
                            Plot Size
                        </div>
                        <!-- </div> -->

                        <div class="plot-pill w-100">
                            Plot Size
                        </div>
                    </div>
                    <div class="form-group d-flex gap-2">
                        <!-- <div class="input-group custom-date-input mr-3"> -->
                        <div class="plot-pill w-100 mr-3">
                            Plot Size
                        </div>
                        <!-- </div> -->

                        <div class="plot-pill w-100">
                            Plot Size
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
                        <button class="btn btn-submit">
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
            var sector_id = $('.sector').val();
            alert(sector_id);
            if (blockId) {
                $.ajax({
                    url: "{{ url('/dashboard/get_road_with_default_block_by_sector') }}/" + blockId,
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

