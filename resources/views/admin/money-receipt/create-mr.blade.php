@extends('layouts.admin')
@section('title', 'Money Receipt')
@section('content')
    <div class="container">
        <div class="panel-header expense-bg">
            <div class="top-counter-box">
                <div class="top-counter">
                    <ul>
                        <li>
                            <div class="top-counter-inner">
                                <ul>
                                    <li>
                                        <div class="counter-icon">
                                            <i class='bx bx-food-menu bx-flashing'></i>
                                        </div>
                                        <div class="counter-info-1">
                                            <h5 class="expense-title-1">Today's Invoices Amount</h5>
                                            <p class="expense-title-2">50,650.00</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="counter-icon">
                                            <i class='bx bx-food-menu bx-flashing'></i>
                                        </div>
                                        <div class="counter-info-1">
                                            <h5 class="expense-title-1">Today's Cash Invoices</h5>
                                            <p class="expense-title-2">25,650.00</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="counter-icon">
                                            <i class='bx bx-food-menu bx-flashing'></i>
                                        </div>
                                        <div class="counter-info-1">
                                            <h5 class="expense-title-1">Today's Pending Invoices</h5>
                                            <p class="expense-title-2">43,650.00</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="counter-icon">
                                            <i class='bx bx-food-menu bx-flashing'></i>
                                        </div>
                                        <div class="counter-info-1">
                                            <h5 class="expense-title-1">Today's Reject Invoices</h5>
                                            <p class="expense-title-2">236,650.00</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-inner">
            <div class="row justify-content-center">
                <div class="col-xxl-10">
                    <div class="card">
                        <div class="card-header project-details-card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="project-details-card-header-title"><i class='bx bx-receipt bx-tada'></i>Create
                                    New Money Recipet</h4>
                                <a href="add-expense.php" class="create-button-1 ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#addRowModal">
                                    <i class='bx bx-message-square-add bx-tada'></i>Money Recipet List</a>
                            </div>
                        </div>
                        <form class="needs-validation" novalidate="" id="invoice_form">
                            <div class="card-body">
                                <!--invoice-1st-part-->
                                <div class="row invoice-1st-part">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control custom-input" id="email2"
                                                placeholder="Goldeneye Developers LTD">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control custom-input" id="email2"
                                                placeholder="Money Recipet No.">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control custom-input" id="email2"
                                                placeholder="Money Recipet Date">
                                        </div>
                                    </div>
                                </div>
                                <!--invoice-2nd-part-->
                                <div class="card invoice-2nd-part">
                                    <div class="card-body invoice-bg-1">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <h5 class="invoice-title-1">Money Recipet To:</h5>
                                                <div class="form-group">
                                                    <select class="form-select form-control custom-input" id="defaultSelect"
                                                        placeholder="Expense By">
                                                        <option>Md. Saokat Hossain</option>
                                                        <option>Md. Saokat Shaon</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control custom-input" id="email2"
                                                        placeholder="Select Plot">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control custom-input" id="email2"
                                                        placeholder="Payment Mode">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control custom-input" id="email2"
                                                        placeholder="Name of Bank">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control custom-input" id="email2"
                                                        placeholder="Cheque Number">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control custom-input" id="email2"
                                                        placeholder="Cheque Clearing Date">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-5 ms-auto">
                                                <h5 class="invoice-title-1">Transaction Summary:</h5>
                                                <div class="form-group">
                                                    <input type="text" class="form-control custom-input" id="email2"
                                                        placeholder="Total Plot Price">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control custom-input"
                                                        id="email2" placeholder="Downpayment Received">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control custom-input"
                                                        id="email2" placeholder="Booking Money Received">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control custom-input"
                                                        id="email2" placeholder="Installment Received Amount">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control custom-input"
                                                        id="email2" placeholder="Total Received Amount">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control custom-input"
                                                        id="email2" placeholder="Total Due Amount">
                                                </div>
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
                                                        <th scope="col" style="width: 150px;">Installment No</th>
                                                        <th scope="col" style="width: 140px;">Inst. Month</th>
                                                        <th scope="col" class="text-end" style="width: 150px;">Total
                                                            Amount</th>
                                                        <th scope="col" class="text-end" style="width: 50px;"></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="newlink" class="border-0">
                                                    <tr id="1" class="product border-0">
                                                        <th scope="row" class="product-id">1</th>
                                                        <td class="text-start  ">
                                                            <div class="form-group">
                                                                <select class="form-select form-control custom-input"
                                                                    id="defaultSelect" placeholder="Expense By">
                                                                    <option>Select Product/Service/Item</option>
                                                                    <option>Inactive</option>
                                                                </select>
                                                            </div>

                                                        </td>
                                                        <td class="text-end  ">
                                                            <div class="form-group">
                                                                <input type="number" class="form-control custom-input"
                                                                    id="email2" placeholder="Inst No">
                                                            </div>
                                                        </td>
                                                        <td class=" ">
                                                            <div class="form-group">
                                                                <input type="number" class="form-control custom-input"
                                                                    id="email2" placeholder="Month">
                                                            </div>
                                                        </td>
                                                        <td class="text-end  ">
                                                            <div class="form-group">
                                                                <input type="number" class="form-control custom-input"
                                                                    id="email2" placeholder="Total Amount">
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
                                                <div class="payment-summery">

                                                    <ul>
                                                        <li>
                                                            <h5 class="payment-price-title-3">Installment Amount Received
                                                                from Mr. Abu Said</h5>
                                                        </li>
                                                        <li>
                                                            <h5 class="payment-price-title-3">: 200,00.00</h5>
                                                        </li>
                                                    </ul>
                                                </div>
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
                                                                    id="email2" placeholder="0.00 BDT">
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
                                                                    id="email2" placeholder="0.00 BDT">
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
                                                                    id="email2" placeholder="0.00 BDT">
                                                            </div>
                                                        </li>
                                                    </ul>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7">
                                        <h5 class="invoice-title-1">Terms & Conditions:</h5>
                                        <div class="form-group">
                                            <textarea class="form-control custom-input" id="comment" placeholder="Address"> </textarea>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-7">
                                        <h5 class="invoice-title-1">Note:</h5>
                                        <div class="form-group">
                                            <textarea class="form-control custom-input" id="comment" placeholder="Address"> </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                    <a href="#" class="cancel-button-1"><i class='bx bx-printer bx-flashing'></i>
                                        Print</a>
                                    <a href="#" class="submit-button-1"><i class='bx bx-upload bx-flashing'></i>
                                        Create Invoice</a>
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
