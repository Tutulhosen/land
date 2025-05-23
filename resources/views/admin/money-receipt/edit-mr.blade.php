@extends('layouts.admin')
@section('title', 'Money Receipt')
@section('content')
    <div class="container">

        <div class="page-inner">
            <div class="row justify-content-center">
                <div class="col-xxl-10">
                    <div class="card">
                        <div class="card-header project-details-card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="project-details-card-header-title"><i class='bx bx-receipt bx-tada'></i>Edit
                                    New Money Recipet</h4>
                                <a href="{{ route('money.receipt.approvedMr') }}" class="create-button-1 ms-auto"
                                    data-bs-toggle="modal" data-bs-target="#addRowModal">
                                    <i class='bx bx-message-square-add bx-tada'></i>Money Recipet List</a>
                            </div>
                        </div>
                        <form class="needs-validation" novalidate id="invoice_form" method="POST"
                            action="{{ route('money.receipt.update', $moneyReceipt->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <!--invoice-1st-part-->
                                <div class="row invoice-1st-part">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            {{-- <input type="text" class="form-control custom-input" id="email2"
                                                placeholder="Goldeneye Developers LTD"> --}}
                                            <select name="project_id" id="project_id"
                                                class="form-select form-control custom-input select2">
                                                <option value="">Select a Project</option>
                                                @foreach ($project_lists as $project)
                                                    <option
                                                        {{ $moneyReceipt->project_id == $project->id ? 'selected' : '' }}
                                                        value="{{ $project->id }}">{{ $project->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>x
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            {{-- @dd($moneyReceipt) --}}
                                            <input name="mr_code" type="text" class="form-control custom-input"
                                                id="email2" placeholder="Money Recipet No."
                                                value="{{ $moneyReceipt->mr_code }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input name="reg_date" type="text" class="form-control custom-input"
                                                id="email2" placeholder="Money Receipt Date" value="<?php echo date('Y-m-d'); ?>"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <!--invoice-2nd-part-->
                                <div class="card invoice-2nd-part">
                                    <div class="card-body invoice-bg-1">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <h5 class="invoice-title-1">Money Recipet To:</h5>
                                                <!-- Customer Select -->
                                                <select name="customer_id" id="customer_id"
                                                    class="form-select form-control custom-input select2">
                                                    <option value="">Select a Customer</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}"
                                                            {{ $moneyReceipt->customer_id == $customer->id ? 'selected' : '' }}>
                                                            {{ $customer->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <!-- Plot Select (will be filled by Ajax) -->
                                                <div class="form-group mt-2">
                                                    <input type="text" id="booking_id" hidden>
                                                    <input type="text" id="previous_booking_id" hidden
                                                        value="{{ $moneyReceipt->booking_id }}">
                                                    <select name="booking_id" id="plot_no"
                                                        class="form-select form-control custom-input">
                                                        <option value="">Select Plot</option>

                                                    </select>
                                                </div>
                                                {{-- @dd($moneyReceipt) --}}
                                                <div class="form-group mt-2">
                                                    <select name="payment_mode" id="payment_mode"
                                                        class="form-select form-control custom-input">
                                                        <option value="">Select Payment Mode</option>
                                                        <option {{ $moneyReceipt->payment_mode == '1' ? 'selected' : '' }}
                                                            value="1">Cash</option>
                                                        <option {{ $moneyReceipt->payment_mode == '2' ? 'selected' : '' }}
                                                            value="2">Cheque</option>
                                                        <option {{ $moneyReceipt->payment_mode == '3' ? 'selected' : '' }}
                                                            value="3">Online</option>
                                                        <option {{ $moneyReceipt->payment_mode == '4' ? 'selected' : '' }}
                                                            value="4">DBD</option>
                                                    </select>
                                                </div>

                                                {{-- <div class="form-group" id="amount_field">
                                                    <input type="text" class="form-control custom-input" id="amount"
                                                        placeholder="Amount">
                                                </div> --}}
                                                <div class="form-group" id="bank_field">
                                                    <input name="bank_name" type="text" class="form-control custom-input"
                                                        id="bank" placeholder="Bank"
                                                        value="{{ $moneyReceipt->bank_name }}">
                                                </div>
                                                <div class="form-group" id="cheque_number_field" style="display: none;">
                                                    <input name="cheque_number" type="text"
                                                        class="form-control custom-input" id="cheque_number"
                                                        placeholder="Cheque Number">
                                                </div>
                                                <div class="form-group" id="cheque_date_field" style="display: none;">
                                                    <label for="cheque_date">Cheque Date</label>
                                                    <input name="cheque_date" type="date"
                                                        class="form-control custom-input" id="cheque_date">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-5 ms-auto">
                                                <h5 class="invoice-title-1">Transaction Summary:</h5>
                                                <table class="table table-bordered table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td style="font-weight: 500">Total Price</td>
                                                            <td id="total_amount">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 500">Installment Amount</td>
                                                            <td id="installment_amount">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 500">Booking Amount</td>
                                                            <td id="booking_amount">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 500">At a Time</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 500">Down Payment Amount</td>
                                                            <td id="down_payment">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 500">Total Recive Amount</td>
                                                            <td id="total_recieved">0</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight: 500">Total Due</td>
                                                            <td id="total_due">0</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--invoice-3rd-part-->
                                <div class="card invoice-3rd-part">
                                    <div class="card-body invoice-bg-2">
                                        <div class="table-responsive">
                                            <table class="invoice-table table table-borderless table-nowrap mb-0">
                                                <thead class="align-middle">
                                                    <tr class="table-active">
                                                        <th scope="col" style="width: 40px;">#</th>
                                                        <th scope="col">Transaction Item</th>
                                                        <th scope="col" class="installment-header"
                                                            style="width: 150px;">Installment No</th>
                                                        <th scope="col" class="installment-header"
                                                            style="width: 140px;">Inst. Month</th>

                                                        <th scope="col" class="text-end" style="width: 150px;">Total
                                                            Amount</th>
                                                        <th scope="col" class="text-end" style="width: 50px;"></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="newlink" class="border-0">
                                                    <tr id="1" class="product border-0">
                                                        <th scope="row" class="product-id">1</th>
                                                        <td class="text-start  ">
                                                            <div class="form-group" style="width: 35%">
                                                                <select name="payment_type" style="width: 150px;"
                                                                    class="form-select form-control custom-input"
                                                                    placeholder="Expense By" id="payment_type">
                                                                    {{-- <option>Select Product/Service/Item</option> --}}
                                                                    <option value="">Select Type</option>
                                                                    <option
                                                                        {{ $moneyReceipt->payment_type == '1' ? 'selected' : '' }}
                                                                        value="1">Down Payment</option>
                                                                    <option
                                                                        {{ $moneyReceipt->payment_type == '2' ? 'selected' : '' }}
                                                                        value="2">Installment</option>
                                                                    <option
                                                                        {{ $moneyReceipt->payment_type == '3' ? 'selected' : '' }}
                                                                        value="3">Booking</option>
                                                                    <option
                                                                        {{ $moneyReceipt->payment_type == '4' ? 'selected' : '' }}
                                                                        value="4">Name Transfer Fee</option>
                                                                    <option
                                                                        {{ $moneyReceipt->payment_type == '5' ? 'selected' : '' }}
                                                                        value="5">Registration Fees</option>
                                                                    <option
                                                                        {{ $moneyReceipt->payment_type == '6' ? 'selected' : '' }}
                                                                        value="6">At a Time</option>
                                                                    <option
                                                                        {{ $moneyReceipt->payment_type == '7' ? 'selected' : '' }}
                                                                        value="7">Sand Filling</option>
                                                                    <option
                                                                        {{ $moneyReceipt->payment_type == '8' ? 'selected' : '' }}
                                                                        value="8">Plot Transfer Fee</option>
                                                                    <option
                                                                        {{ $moneyReceipt->payment_type == '9' ? 'selected' : '' }}
                                                                        value="9">Mutation</option>
                                                                </select>
                                                            </div>

                                                        </td>
                                                        {{-- @dd($moneyReceipt) --}}
                                                        @if ($moneyReceipt->payment_type == '2')
                                                            <td class="installment-data text-end">
                                                                <div class="form-group">
                                                                    <input name="installment_no" type="number"
                                                                        class="form-control custom-input"
                                                                        placeholder="Inst No"
                                                                        value="{{ old('installment_no', $moneyReceipt->installment_no) }}">
                                                                </div>
                                                            </td>
                                                            <td class="installment-data">
                                                                <div class="form-group d-flex align-items-center gap-2">
                                                                    <input name="start_month" type="month"
                                                                        class="form-control custom-input" id="start_month"
                                                                        placeholder="From Month" style="max-width: 120px;"
                                                                        value="{{ old('start_month', $moneyReceipt->installment_month) }}">

                                                                    <span class="fw-bold">to</span>

                                                                    <input name="end_month" type="month"
                                                                        class="form-control custom-input" id="end_month"
                                                                        placeholder="To Month" style="max-width: 120px;"
                                                                        value="{{ old('end_month', $moneyReceipt->installment_month_to) }}">
                                                                </div>
                                                            </td>
                                                        @endif


                                                        <td class="text-end  ">
                                                            <div class="form-group">
                                                                <input name="amount" type="number"
                                                                    class="form-control custom-input" id="mainTotalAmount"
                                                                    placeholder="Total Amount"
                                                                    value="{{ $moneyReceipt->amount }}">

                                                            </div>
                                                        </td>
                                                        <td class="product-removal  ">
                                                            <a class="relode-button"><i
                                                                    class='bx bx-revision bx-tada'></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody class="border-0">
                                                    <tr id="newForm" class="border-0" style="display: none;">
                                                        <td class="d-none border-0" colspan="5">
                                                            <p>Add New Form</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end table-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="payment-summery" id="full_section">

                                                    <ul>
                                                        <li>
                                                            <h5 class="payment-price-title-3">
                                                                <span id="payment_type_name"></span>
                                                                Amount <span
                                                                    id="payment_type_amount_text">{{ $moneyReceipt->amount }}</span>
                                                                Received
                                                                from <span id="customer_name"></span>
                                                            </h5>
                                                        </li>

                                                    </ul>
                                                </div>
                                                {{-- Installment Amount Received 200,00.00 from Said --}}
                                            </div>
                                            <div class="col-md-5 ms-auto">
                                                <div class="price-summery">
                                                    <ul>
                                                        <li>
                                                            <h5 class="invoice-price-title-1"> Total Amount</h5>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control custom-input-3"
                                                                    id="summaryTotalAmount" placeholder="0.00 BDT"
                                                                    readonly value="{{ $moneyReceipt->amount }}">

                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            <h5 class=" invoice-price-title-1">Paid Amount</h5>
                                                        </li>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control custom-input-3"
                                                                    id="paidAmount" placeholder="0.00 BDT" readonly
                                                                    value="{{ $moneyReceipt->amount }}">

                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <ul>
                                                        <li>
                                                            <h5 class=" invoice-price-title-1"> Balance (Due/Advance)</h5>
                                                        </li>
                                                        </li>
                                                        <li>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control custom-input-3"
                                                                    id="balanceAmount" placeholder="0.00 BDT" readonly
                                                                    value="0">

                                                            </div>
                                                        </li>
                                                    </ul>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- @dd( $moneyReceipt) --}}
                                <div class="row">
                                    <div class="col-lg-7">
                                        <h5 class="invoice-title-1">Terms & Conditions:</h5>
                                        <div class="form-group">
                                            {{-- @dd( $moneyReceipt->termsAndCondition) --}}
                                            <textarea name="termsAndCondition" class="form-control custom-input" placeholder="Terms & Conditions:">{{ old('termsAndCondition', $moneyReceipt->termsAndCondition) }}</textarea>

                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-7">
                                        <h5 class="invoice-title-1">Note:</h5>
                                        <div class="form-group">
                                            <textarea name="note" class="form-control custom-input" placeholder="Note">{{ old('note', $moneyReceipt->note) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                    {{-- <a href="#" class="cancel-button-1"><i class='bx bx-printer bx-flashing'></i>
                                        Print</a> --}}
                                    <button type="submit" class="submit-button-1" style="border: none"><i
                                            class='bx bx-upload bx-flashing'></i>
                                        Update Invoice</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
            <!--end col-->
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            const customerId = $('#customer_id').val();
            const selectedBookingId = $('#previous_booking_id').val();
            //! set defallt booking data
            if (selectedBookingId) {
                $.ajax({
                    url: '/dashboard/plot-bookings/' + customerId,
                    type: 'GET',
                    success: function(response) {
                        $('#plot_no').empty().append('<option value="">Select Plot</option>');
                        response.forEach(function(booking) {
                            const plotText = booking.plot_details.road.sector.sector_name +
                                '-' +
                                booking.plot_details.road.road_name + '-' +
                                booking.plot_details.plot_name;

                            const selected = selectedBookingId == booking.id ? 'selected' : '';
                            $('#plot_no').append('<option value="' + booking.id + '" ' +
                                selected +
                                '>' + plotText + '</option>');
                        });
                    },
                    error: function() {
                        alert('Plot data not found!');
                    }
                });
            }

            $('#customer_id').on('change', function() {
                var customerId = $(this).val();


                if (customerId) {
                    $.ajax({
                        url: '/dashboard/plot-bookings/' + customerId,
                        type: 'GET',
                        success: function(response) {
                            $('#plot_no').empty().append(
                                '<option value="">Select Plot</option>');
                            response.forEach(function(booking) {
                                $('#plot_no').append('<option value="' + booking.id +
                                    '">' +
                                    booking.plot_details.road.sector.sector_name +
                                    '-' +
                                    booking.plot_details.road.road_name + '-' +
                                    booking.plot_details.plot_name + '</option>');
                            });
                        },
                        error: function() {
                            alert('Plot data not found!');
                        }
                    });
                } else {
                    $('#plot_no').empty().append('<option value="">Select Plot</option>');
                }
            });

        });
    </script>


    {{-- ! For toggle payment mode --}}
    <script>
        $(document).ready(function() {
            $('#payment_mode').on('change', function() {
                let selected = $(this).val();
                $('#cheque_date_field').hide();
                $('#cheque_number_field').hide();
                $('#bank_field').hide();
                $('#amount_field').hide();
                switch (selected) {
                    case "Cash":
                        $('#amount_field').show();
                        break;
                    case "Cheque":
                        $('#cheque_date_field').show();
                        $('#cheque_number_field').show();
                        $('#bank_field').show();
                        $('#amount_field').show();
                        break;
                    case "Online":
                        $('#bank_field').show();
                        $('#amount_field').show();
                    case "DBD":
                        $('#bank_field').show();
                        $('#amount_field').show();
                        break;
                    default:

                        break;
                }
                // if (selected === 'Cash') {
                //     $('#amount_field').show();
                // } else {
                //     $('#amount_field').hide();
                //     $('#amount').val(''); 
                // }
            });
        });
    </script>
    {{--  <script>
        $(document).ready(function() {
            // $('.installment-header, .installment-data').hide();

            $('#defaultSelect').on('change', function() {
                var selectedValue = $(this).val();

                if (selectedValue === '2') { // Installment
                    $('.installment-header, .installment-data').show();
                } else {
                    $('.installment-header, .installment-data').hide();
                }
            });
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            $('#mainTotalAmount').on('input', function() {
                const value = $(this).val();

                $('#summaryTotalAmount').val(value).prop('readonly', true);
                $('#paidAmount').val(value).prop('readonly', true);
                $('#balanceAmount').val('0.00').prop('readonly', true);
                $('#payment_type_amount').val(value);

                $('#payment_type_amount_text').text(value);
            });
            const selectedText = $('#customer_id option:selected').text();
            const paymentTypeSelectedText = $('#payment_type option:selected').text();
            // console.log(selectedText, paymentTypeSelectedText)
            $('#customer_name').text(selectedText);
            $('#payment_type_name').text(paymentTypeSelectedText);
            $('#payment_type').on('change', function() {
                const selectedText = $('#payment_type option:selected').text();
                const selectedValue = $(this).val();
                const customer_name = $('#customer_id option:selected').text();
                const total_amount = $('#mainTotalAmount').val();

                if (selectedValue !== '') {
                    if (selectedValue === '2') {
                        $('.installment-header, .installment-data').show();
                    } else {
                        // Hide fields
                        $('.installment-header, .installment-data').hide();

                        // Clear values
                        $('input[name="installment_no"]').val('');
                        $('#start_month').val('');
                        $('#end_month').val('');
                    }

                    $('#payment_type_name').text(selectedText);
                    $('#customer_name').text(customer_name);
                    $('#payment_type_amount_text').text(total_amount || '0');
                } else {
                    $('#payment_type_name').text('');
                    $('#customer_name').text('');
                    $('#payment_type_amount_text').text('0');

                    // Hide and clear if no payment type selected
                    $('.installment-header, .installment-data').hide();
                    $('input[name="installment_no"]').val('');
                    $('#start_month').val('');
                    $('#end_month').val('');
                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#start_month, #end_month').on('change', function() {
                const start = $('#start_month').val();
                const end = $('#end_month').val();

                if (start && end && start > end) {
                    alert("End Month must be after Start Month");
                    $('#end_month').val('');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            const selectedBookingId = $('#previous_booking_id').val();

            if (selectedBookingId) {
                $('#plot_no').val(selectedBookingId).trigger('change');
                getBookingDetails(selectedBookingId);
            }

            $('#plot_no').on('change', function() {
                var bookingId = $(this).val();
                getBookingDetails(bookingId);
            });

            function getBookingDetails(bookingId) {
                if (bookingId) {
                    $.ajax({
                        url: '/dashboard/plot-booking/' + bookingId,
                        type: 'GET',
                        success: function(response) {
                            const installment = parseInt(response.booking?.installment_amount || 0);
                            const bookingAmount = parseInt(response.booking_amount?.amount || 0);
                            const downPayment = parseInt(response.down_payment?.amount || 0);

                            const total_recieved = installment + bookingAmount + downPayment;
                            const total_due = parseInt(response.booking?.total_amount || 0) -
                                total_recieved;

                            $('#total_amount').text(response.booking?.total_amount || 0);
                            $('#installment_amount').text(installment);
                            $('#booking_amount').text(bookingAmount);
                            $('#down_payment').text(downPayment);
                            $('#total_recieved').text(total_recieved);
                            $('#total_due').text(total_due);
                        },
                        error: function(e) {
                            console.log(e);
                            $('#total_amount').text('0');
                            $('#installment_amount').text('0');
                            $('#booking_amount').text('0');
                            $('#down_payment').text('0');
                            $('#total_recieved').text('0');
                            $('#total_due').text('0');
                        }
                    });
                } else {
                    $('#total_amount').text('0');
                    $('#installment_amount').text('0');
                    $('#booking_amount').text('0');
                    $('#down_payment').text('0');
                    $('#total_recieved').text('0');
                    $('#total_due').text('0');
                }
            }
        });
    </script>
@endpush
