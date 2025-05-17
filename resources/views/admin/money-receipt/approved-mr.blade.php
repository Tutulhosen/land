@extends('layouts.admin')
@section('title', 'Money Receipt')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-round">
                        <div class="card-header project-details-card-header">
                            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pb-2">
                                <div class="table-title">
                                    <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada'></i>Money
                                        Recipet List</h4>
                                </div>
                                <div class="multi-button-area ms-md-auto">
                                    <a href="#" class="purchase-button" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalgrid-leads">
                                        <i class='bx bx-message-square-add bx-tada'></i>Create New MR</a>
                                </div>
                            </div>
                        </div>
                        <!--Salary Payment MODAL-->
                        <div class="modal fade bs-example-modal-center" id="exampleModalgrid-leads" tabindex="-1"
                            aria-labelledby="exampleModalgridLabel" style="display: none;" aria-modal="true" role="dialog">
                            <div class="modal-dialog large-modal modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="project-details-card-header-title"><i
                                                class="bx bx-user-pin bx-tada bx-flip-horizontal"></i> Official Leads</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="javascript:void(0);">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="email2">Client Name</label>
                                                        <input type="text" class="form-control custom-input"
                                                            id="email2" placeholder="Account Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="email2">Company Name</label>
                                                        <input type="text" class="form-control custom-input"
                                                            id="email2" placeholder="Account Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="email2">Designation</label>
                                                        <input type="text" class="form-control custom-input"
                                                            id="email2" placeholder="Account Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="email2">Phone Number</label>
                                                        <input type="text" class="form-control custom-input"
                                                            id="email2" placeholder="Account Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="email2">Email Address</label>
                                                        <input type="email" class="form-control custom-input"
                                                            id="email2" placeholder="Account Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                        <label for="email2">Company Address</label>
                                                        <input type="text" class="form-control custom-input"
                                                            id="email2" placeholder="Account Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="email2">Industry</label>
                                                        <select class="form-select form-control custom-input"
                                                            id="defaultSelect" placeholder="Expense Category">
                                                            <option>Active</option>
                                                            <option>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="email2">Client Type</label>
                                                        <select class="form-select form-control custom-input"
                                                            id="defaultSelect" placeholder="Expense Category">
                                                            <option>Ledger Head</option>
                                                            <option>Cheque</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="email2">Project Type</label>
                                                        <select class="form-select form-control custom-input"
                                                            id="defaultSelect" placeholder="Expense Category">
                                                            <option>Active</option>
                                                            <option>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="email2">Project Value</label>
                                                        <input type="text" class="form-control custom-input"
                                                            id="email2" placeholder="Account Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="email2">Project Name/Title</label>
                                                        <input type="text" class="form-control custom-input"
                                                            id="email2" placeholder="Account Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="email2">Project Details</label>
                                                        <textarea class="form-control h-100" id="comment"> </textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label for="email2">Reference/Source</label>
                                                        <input type="text" class="form-control custom-input"
                                                            id="email2" placeholder="Account Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="email2">Commission</label>
                                                        <input type="text" class="form-control custom-input"
                                                            id="email2" placeholder="Account Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="email2">Status</label>
                                                        <select class="form-select form-control custom-input"
                                                            id="defaultSelect" placeholder="Expense Category">
                                                            <option>Cash</option>
                                                            <option>Cheque</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="hstack gap-2 justify-content-center pt-4 pb-3">
                                                        <a href="#" class="cancel-button-1"
                                                            data-bs-dismiss="modal"><i class='bx bx-x bx-flashing'></i>
                                                            Cancel</a>
                                                        <a href="#" class="submit-button-1"><i
                                                                class='bx bx-upload bx-flashing'></i> Submit</a>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Salary Payment MODAL-->
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="add-row" class="display table table-striped table-hover"
                                                role="grid" aria-describedby="add-row_info">
                                                <thead class="">
                                                    <tr role="row" class="text-center">
                                                        <th class="text-center">MR Code</th>
                                                        <th class="text-center">Customer Name</th>
                                                        <th class="text-center">Agency Name</th>
                                                        <th class="text-center">Transaction Type</th>
                                                        <th class="text-center">Transaction Amount</th>
                                                        <th class="text-center">Salesman</th>
                                                        <th class="text-center">MR Status</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1 text-center">01</td>
                                                        <td><a href="#" class="client-info"><i
                                                                    class='bx bx-user-voice'></i> Abdullah Al Fahad </a>
                                                            <br />
                                                            <b>Managing Director</b>
                                                            <br />
                                                            <a href="tel:9200368090" class="client-info"><i
                                                                    class='bx bxl-whatsapp bx-tada'></i> +8801844674502</a>
                                                            <br />
                                                            <a href="mailto:needhelp@company.com" class="client-info"><i
                                                                    class='bx bx-mail-send bx-tada'></i>
                                                                zwellhomes@gmail.com </a>
                                                        </td>
                                                        <td class="text-center">Onirban Bangladesh
                                                            <br /><b>Industry:</b> Agent
                                                        </td>
                                                        <td class="text-center">
                                                            Instalment
                                                        </td>
                                                        <td class="text-center"><b>85,000</b> <small>BDT</small></td>
                                                        <td class="text-center">
                                                            <i class='bx bx-user-circle'></i> Amit Roy
                                                            <br /><b>Commission:</b> 20%
                                                        </td>
                                                        <td class="text-center">
                                                            <button class="btn status-box-1">Approved</button>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-button-action">
                                                                <button class="btn btn-primary btn-link btn-lg me-2"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#addRowModal-generate-salary">
                                                                    <i class='bx bxs-edit bx-tada'></i> </button>
                                                                <button class="btn btn-danger btn-link btn-lg "
                                                                    data-bs-toggle="tooltip" data-bs-title="Edit Salary">
                                                                    <i class='bx bx-trash-alt'></i> </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="add-row_info" role="status"
                                                aria-live="polite">Showing 1 to 5 of 10 entries</div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers" id="add-row_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled"
                                                        id="add-row_previous"><a href="#" aria-controls="add-row"
                                                            data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                                    </li>
                                                    <li class="paginate_button page-item active"><a href="#"
                                                            aria-controls="add-row" data-dt-idx="1" tabindex="0"
                                                            class="page-link">1</a></li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                            aria-controls="add-row" data-dt-idx="2" tabindex="0"
                                                            class="page-link">2</a></li>
                                                    <li class="paginate_button page-item next" id="add-row_next"><a
                                                            href="#" aria-controls="add-row" data-dt-idx="3"
                                                            tabindex="0" class="page-link">Next</a></li>
                                                </ul>
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
    </div>
@endsection
