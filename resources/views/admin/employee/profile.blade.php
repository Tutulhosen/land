@extends('layouts.admin')
@section('title','Customer Edit')
@section('content')     

            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header"
                                    style="background-image: url('assets/img/client-profile-bg.jpg'); background-size: cover; height: 100px; border-radius: 10px 10px 0 0;">
                                    <div class="client-profile-image-box">
                                        <img src="/assets/img/avatar-3.jpg" alt="..."
                                            class="client-profile-image">
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <!--<span class="avatar avatar-xl avatar-rounded border border-2 border-white m-auto d-flex mb-2">-->
                                    <!--    <img src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/users/user-13.jpg"  alt="Img">-->
                                    <!--</span>-->
                                    <div class="text-center px-3 pb-3 border-bottom">
                                        <div class="mt-5 border-bottom pb-3">
                                            <h5
                                                class="d-flex align-items-center justify-content-center client-main-title">
                                                {{$customers->name}}<i class="bx bx-badge-check text-success ms-1"></i>
                                            </h5>
                                            <p class="client-info mb-1">{{$customers->occupation}}</p>
                                            <span class="btn status-box-1">{{$customers->designation}}</span>
                                        </div>
                                        <div class="pt-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <span class="d-inline-flex align-items-center client-info">
                                                    <i class="fas fa-magnet"></i>
                                                    Customer ID:
                                                </span>
                                                <span class="d-inline-flex align-items-center client-info">
                                                    <i class="bx bx-id-card"></i>
                                                   {{$customers->code}}
                                                </span>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="d-inline-flex align-items-center client-info">
                                                    <i class='bx bx-calendar bx-flashing'></i>
                                                    Customer Entry Date:
                                                </span>
                                                <p class="client-info">{{$customers->reg_date}}</p>
                                            </div>
                                            <div class="client-button-box mt-2">
                                                <a href="#" class="client-button1"><i
                                                        class='bx bx-phone-outgoing bx-tada'></i> Call</a>
                                                <a href="#" class="client-button2"><i
                                                        class='bx bx-message-detail bx-flashing'></i> Message</a>
                                                <a href="#" class="client-button3"><i
                                                        class='bx bx-envelope bx-flashing'></i> Email</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-3 border-bottom">
                                        <ul class="specification-list list-unstyled">
    <li class="d-flex align-items-center justify-content-between client-info">
        <span class="name-specification"><i class='bx bx-phone-outgoing bx-tada'></i> Phone</span>
        <span class="status-specification">{{ $customers->number ?? 'N/A' }}</span>
    </li>
    <li class="d-flex align-items-center justify-content-between client-info">
        <span class="name-specification"><i class='bx bx-mail-send bx-tada'></i> Email</span>
        <span class="status-specification">{{ $customers->email ? $customers->email . '@gmail.com' : 'N/A' }}</span>
    </li>
    <li class="d-flex align-items-center justify-content-between client-info">
        <span class="name-specification"><i class='bx bxl-whatsapp bx-flashing'></i> WhatsApp</span>
        <span class="status-specification">{{ $customers->number ?? 'N/A' }}</span>
    </li>
    <li class="d-flex align-items-center justify-content-between client-info">
        <span class="name-specification"><i class='bx bx-link bx-flashing'></i> Website</span>
        <span class="status-specification">www.akhalequefoundation.com</span>
    </li>
    <li class="d-flex align-items-center justify-content-between client-info">
        <span class="name-specification"><i class='bx bx-map bx-flashing'></i> Address</span>
        <span class="status-specification">{{ $customers->address ?? 'N/A' }}</span>
    </li>
</ul>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="bg-white rounded">
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap mb-4" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active fw-medium d-flex align-items-center justify-content-center"
                                            href="#bottom-justified-tab1" data-bs-toggle="tab" aria-selected="false"
                                            role="tab">
                                            <i class="bx bx-star me-1"></i>
                                            Overview
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link fw-medium d-flex align-items-center justify-content-center"
                                            href="#bottom-justified-tab2" data-bs-toggle="tab" aria-selected="false"
                                            role="tab">
                                            <i class="bx bx-box me-1"></i>
                                            Plot Status
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link fw-medium d-flex align-items-center justify-content-center"
                                            href="#bottom-justified-tab3" data-bs-toggle="tab" aria-selected="true"
                                            role="tab">
                                            <i class="bx bx-basket me-1"></i>
                                            Summary
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link fw-medium d-flex align-items-center justify-content-center"
                                            href="#bottom-justified-tab4" data-bs-toggle="tab" aria-selected="true"
                                            role="tab">
                                            <i class="bx bx-file me-1"></i>
                                            MR List
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link fw-medium d-flex align-items-center justify-content-center"
                                            href="#bottom-justified-tab5" data-bs-toggle="tab" aria-selected="true"
                                            role="tab">
                                            <i class="bx bx-file-blank me-1"></i>
                                            No & Go
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link fw-medium d-flex align-items-center justify-content-center"
                                            href="#bottom-justified-tab6" data-bs-toggle="tab" aria-selected="true"
                                            role="tab">
                                            <i class="bx bx-folder-open me-1"></i>
                                            Documents
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content custom-accordion-items client-accordion">
                                <div class="tab-pane active show" id="bottom-justified-tab1" role="tabpanel">
                                    <div class="accordion accordions-items-seperate" id="accordionExample">
                                        <div class="accordion-item">
                                            <div class="accordion-header" id="headingOne">
                                                <div class="accordion-button bg-white" data-bs-toggle="collapse"
                                                    data-bs-target="#primaryBorderOne" aria-expanded="true"
                                                    aria-controls="primaryBorderOne" role="button">
                                                    <h5>Plot Status</h5>
                                                </div>
                                            </div>
                                            <div id="primaryBorderOne"
                                                class="accordion-collapse collapse show border-top"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body pb-0">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-lg-12 col-md-6">
                                                            <div class="card project-details-box">
                                                                <div class="card-header project-header-bg">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-grow-1">
                                                                            <a href="project-overview.php"
                                                                                class="project-main-title">Plot #
                                                                                17</a>
                                                                        </div>
                                                                        <div class="flex-shrink-0">
                                                                            <div
                                                                                class="d-flex gap-1 align-items-center my-n2">
                                                                                <div class="dropdown">
                                                                                    <button
                                                                                        class="project-menue btn btn-link text-muted p-1 mt-n2 py-0 text-decoration-none fs-15 material-shadow-none"
                                                                                        data-bs-toggle="dropdown"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="true">
                                                                                        <i
                                                                                            class="bx bx-qr bx-burst"></i>
                                                                                    </button>
                                                                                    <div
                                                                                        class="dropdown-menu dropdown-menu-end">
                                                                                        <a class="dropdown-item"
                                                                                            href="project-overview.php"><i
                                                                                                class="bx bx-show"></i>
                                                                                            View</a>
                                                                                        <a class="dropdown-item"
                                                                                            href="apps-projects-create.html"><i
                                                                                                class="bx bxs-edit"></i>
                                                                                            Edit</a>
                                                                                        <div class="dropdown-divider">
                                                                                        </div>
                                                                                        <a class="dropdown-item"
                                                                                            href="#"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#removeProjectModal"><i
                                                                                                class="bx bx-trash"></i>
                                                                                            Remove</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body p-3">
                                                                    <div class="project-list-sec-1 pb-2">
                                                                        <ul>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Booking
                                                                                    Date</p>
                                                                                <h5 class="project-semi-details-1">18
                                                                                    Sep, 2021</h5>
                                                                            </li>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Plot
                                                                                    Price</p>
                                                                                <h5 class="project-semi-details-1">
                                                                                    85,000 BDT</h5>
                                                                            </li>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Booking
                                                                                    BDT</p>
                                                                                <h5 class="project-semi-details-1">
                                                                                    10,00,000</h5>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div
                                                                        class="project-list-sec-1 pt-3 border-bottom-0 pb-0">
                                                                        <ul>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Plot
                                                                                    Status</p>
                                                                                <button class="btn status-box-1">At a
                                                                                    Time</button>
                                                                            </li>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Down
                                                                                    Payment</p>
                                                                                <h5 class="project-semi-details-1">
                                                                                    1,00,000</h5>
                                                                            </li>
                                                                            <li>
                                                                                <p class="project-semi-title-3">
                                                                                    Installment</p>
                                                                                <div class="mt-2 d-flex">
                                                                                    <a href="javascript: void(0);"
                                                                                        class="avatar-group-item material-shadow"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-trigger="hover"
                                                                                        data-bs-placement="top"
                                                                                        data-bs-original-title="Sylvia Wright">
                                                                                        <div class="">
                                                                                            <div
                                                                                                class="profile-team-member-title rounded-circle bg-secondary">
                                                                                                S
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                    <a href="javascript: void(0);"
                                                                                        class="avatar-group-item material-shadow"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-trigger="hover"
                                                                                        data-bs-placement="top"
                                                                                        data-bs-original-title="Sylvia Wright">
                                                                                        <div class="">
                                                                                            <div
                                                                                                class="profile-team-member-title rounded-circle bg-secondary">
                                                                                                S
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                    <a href="javascript: void(0);"
                                                                                        class="avatar-group-item material-shadow"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-trigger="hover"
                                                                                        data-bs-placement="top"
                                                                                        data-bs-original-title="Sylvia Wright">
                                                                                        <div class="">
                                                                                            <div
                                                                                                class="profile-team-member-title rounded-circle bg-secondary">
                                                                                                S
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                    <a href="javascript: void(0);"
                                                                                        class="avatar-group-item material-shadow"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-trigger="hover"
                                                                                        data-bs-placement="top"
                                                                                        data-bs-original-title="Add Members">
                                                                                        <div class=""
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#inviteMembersModal">
                                                                                            <div
                                                                                                class="profile-team-member-title fs-16 rounded-circle bg-light border-dashed border text-primary">
                                                                                                +
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div>
                                                                        <!-- /.progress -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xxl-6 col-lg-12 col-md-6">
                                                            <div class="card project-details-box">
                                                                <div class="card-header project-header-bg">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-grow-1">
                                                                            <a href="project-overview.php"
                                                                                class="project-main-title">Plot #
                                                                                23</a>
                                                                        </div>
                                                                        <div class="flex-shrink-0">
                                                                            <div
                                                                                class="d-flex gap-1 align-items-center my-n2">
                                                                                <div class="dropdown">
                                                                                    <button
                                                                                        class="project-menue btn btn-link text-muted p-1 mt-n2 py-0 text-decoration-none fs-15 material-shadow-none"
                                                                                        data-bs-toggle="dropdown"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="true">
                                                                                        <i
                                                                                            class="bx bx-qr bx-burst"></i>
                                                                                    </button>
                                                                                    <div
                                                                                        class="dropdown-menu dropdown-menu-end">
                                                                                        <a class="dropdown-item"
                                                                                            href="project-overview.php"><i
                                                                                                class="bx bx-show"></i>
                                                                                            View</a>
                                                                                        <a class="dropdown-item"
                                                                                            href="apps-projects-create.html"><i
                                                                                                class="bx bxs-edit"></i>
                                                                                            Edit</a>
                                                                                        <div class="dropdown-divider">
                                                                                        </div>
                                                                                        <a class="dropdown-item"
                                                                                            href="#"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#removeProjectModal"><i
                                                                                                class="bx bx-trash"></i>
                                                                                            Remove</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body p-3">
                                                                    <div class="project-list-sec-1 pb-2">
                                                                        <ul>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Start
                                                                                    Date</p>
                                                                                <h5 class="project-semi-details-1">18
                                                                                    Sep, 2021</h5>
                                                                            </li>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Project
                                                                                    Budget</p>
                                                                                <h5 class="project-semi-details-1">
                                                                                    85,000 BDT</h5>
                                                                            </li>
                                                                            <li>
                                                                                <p class="project-semi-title-1">
                                                                                    Deadline</p>
                                                                                <h5 class="project-semi-details-1">18
                                                                                    Sep, 2021</h5>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div
                                                                        class="project-list-sec-1 pt-3 border-bottom-0 pb-0">
                                                                        <ul>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Project
                                                                                    Status</p>
                                                                                <button
                                                                                    class="btn status-box-1">Inprogress</button>
                                                                            </li>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Project
                                                                                    Head</p>
                                                                                <h5 class="project-semi-details-1">
                                                                                    Masud Ahmed</h5>
                                                                            </li>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Team
                                                                                    Members</p>
                                                                                <div class="mt-2 d-flex">
                                                                                    <a href="javascript: void(0);"
                                                                                        class="avatar-group-item material-shadow"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-trigger="hover"
                                                                                        data-bs-placement="top"
                                                                                        data-bs-original-title="Sylvia Wright">
                                                                                        <div class="">
                                                                                            <div
                                                                                                class="profile-team-member-title rounded-circle bg-secondary">
                                                                                                S
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                    <a href="javascript: void(0);"
                                                                                        class="avatar-group-item material-shadow"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-trigger="hover"
                                                                                        data-bs-placement="top"
                                                                                        data-bs-original-title="Sylvia Wright">
                                                                                        <div class="">
                                                                                            <div
                                                                                                class="profile-team-member-title rounded-circle bg-secondary">
                                                                                                S
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                    <a href="javascript: void(0);"
                                                                                        class="avatar-group-item material-shadow"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-trigger="hover"
                                                                                        data-bs-placement="top"
                                                                                        data-bs-original-title="Sylvia Wright">
                                                                                        <div class="">
                                                                                            <div
                                                                                                class="profile-team-member-title rounded-circle bg-secondary">
                                                                                                S
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                    <a href="javascript: void(0);"
                                                                                        class="avatar-group-item material-shadow"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-trigger="hover"
                                                                                        data-bs-placement="top"
                                                                                        data-bs-original-title="Add Members">
                                                                                        <div class=""
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#inviteMembersModal">
                                                                                            <div
                                                                                                class="profile-team-member-title fs-16 rounded-circle bg-light border-dashed border text-primary">
                                                                                                +
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div>
                                                                        <!-- /.progress -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div class="accordion-header" id="headingSix">
                                                <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#primaryBorderTwo" aria-expanded="false"
                                                    aria-controls="primaryBorderTwo" role="button">
                                                    <h5>Task</h5>
                                                </div>
                                            </div>
                                            <div id="primaryBorderTwo" class="accordion-collapse collapse border-top"
                                                aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <table id="add-row"
                                                        class="display table table-striped table-hover p-3"
                                                        role="grid" aria-describedby="add-row_info">
                                                        <thead class="">
                                                            <tr role="row">
                                                                <th>Sl</th>
                                                                <th>Task ID</th>
                                                                <th>Task Summary</th>
                                                                <th>Start Date</th>
                                                                <th>Due Date</th>
                                                                <th>Task Status</th>
                                                                <th>Completed</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1">01</td>
                                                                <td>TP1225-01</td>
                                                                <td>Change Login Page UI Update
                                                                    <br><small><b>Project:</b> <br><a href="#"
                                                                            class="client-info">PROJECT-ACC</a></small>
                                                                </td>
                                                                <td>3 Jan 2025</td>
                                                                <td>22 Jan 2024</td>
                                                                <td><span class="badge badge-info">In Review</span>
                                                                    <br /><span class="badge badge-warning">High</span>
                                                                </td>
                                                                <td>24 Jan 2025
                                                                    <br><small><b>Overdue:</b> <br><a href="#"
                                                                            class="client-info"><i
                                                                                class="bx bx-dna bx-tada"></i> 09h
                                                                            50m</a></small>
                                                                </td>
                                                                <td>
                                                                    <div class="form-button-action">
                                                                        <button type="button"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            class="btn btn-link btn-secondary btn-lg">
                                                                            <i class="bx bx-show"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            class="btn btn-link btn-success btn-lg">
                                                                            <i class="bx bxs-edit"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            class="btn btn-link btn-danger btn-lg"
                                                                            data-original-title="Remove">
                                                                            <i class="bx bx-trash-alt"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div class="accordion-header" id="headingTwo">
                                                <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#primaryBorderTwo" aria-expanded="false"
                                                    aria-controls="primaryBorderTwo" role="button">
                                                    <h5>Invoices</h5>
                                                </div>
                                            </div>
                                            <div id="primaryBorderTwo" class="accordion-collapse collapse border-top"
                                                aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div class="accordion-header" id="headingThree">
                                                <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    role="button" data-bs-target="#primaryBorderThree"
                                                    aria-expanded="false" aria-controls="primaryBorderThree">
                                                    <h5>Payments</h5>
                                                </div>
                                            </div>
                                            <div id="primaryBorderThree"
                                                class="accordion-collapse collapse border-top"
                                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div class="accordion-header" id="headingFour">
                                                <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    role="button" data-bs-target="#primaryBorderFour"
                                                    aria-expanded="false" aria-controls="primaryBorderFour">
                                                    <h5>Documents</h5>
                                                </div>
                                            </div>
                                            <div id="primaryBorderFour" class="accordion-collapse collapse border-top"
                                                aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div class="accordion-header" id="headingFive">
                                                <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    role="button" data-bs-target="#primaryBorderFive"
                                                    aria-expanded="false" aria-controls="primaryBorderFive">
                                                    <h5>Tickets</h5>
                                                </div>
                                            </div>
                                            <div id="primaryBorderFive" class="accordion-collapse collapse border-top"
                                                aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div class="accordion-header" id="headingSix">
                                                <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#primaryBorderTwo" aria-expanded="false"
                                                    aria-controls="primaryBorderTwo" role="button">
                                                    <h5>Order's</h5>
                                                </div>
                                            </div>
                                            <div id="primaryBorderTwo" class="accordion-collapse collapse border-top"
                                                aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div class="accordion-header" id="headingSix">
                                                <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#primaryBorderTwo" aria-expanded="false"
                                                    aria-controls="primaryBorderTwo" role="button">
                                                    <h5>Notes</h5>
                                                </div>
                                            </div>
                                            <div id="primaryBorderTwo" class="accordion-collapse collapse border-top"
                                                aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="bottom-justified-tab2" role="tabpanel">
                                    <div class="accordion accordions-items-seperate">
                                        <div class="accordion-item">
                                            <div class="accordion-header" id="headingOne2">
                                                <div class="accordion-button bg-white" data-bs-toggle="collapse"
                                                    data-bs-target="#primaryBorderOne2" aria-expanded="true"
                                                    aria-controls="primaryBorderOne2" role="button">
                                                    <h5>Projects</h5>
                                                </div>
                                            </div>
                                            <div id="primaryBorderOne2"
                                                class="accordion-collapse collapse show border-top"
                                                aria-labelledby="headingOne2">
                                                <div class="accordion-body pb-0">
                                                    <div class="row">
                                                        <div class="col-xxl-6 col-lg-12 col-md-6">
                                                            <div class="card project-details-box">
                                                                <div class="card-header project-header-bg">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-grow-1">
                                                                            <a href="project-overview.php"
                                                                                class="project-main-title">Multipurpose
                                                                                landing template</a>
                                                                        </div>
                                                                        <div class="flex-shrink-0">
                                                                            <div
                                                                                class="d-flex gap-1 align-items-center my-n2">
                                                                                <div class="dropdown">
                                                                                    <button
                                                                                        class="project-menue btn btn-link text-muted p-1 mt-n2 py-0 text-decoration-none fs-15 material-shadow-none"
                                                                                        data-bs-toggle="dropdown"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="true">
                                                                                        <i
                                                                                            class="bx bx-qr bx-burst"></i>
                                                                                    </button>
                                                                                    <div
                                                                                        class="dropdown-menu dropdown-menu-end">
                                                                                        <a class="dropdown-item"
                                                                                            href="project-overview.php"><i
                                                                                                class="bx bx-show"></i>
                                                                                            View</a>
                                                                                        <a class="dropdown-item"
                                                                                            href="apps-projects-create.html"><i
                                                                                                class="bx bxs-edit"></i>
                                                                                            Edit</a>
                                                                                        <div class="dropdown-divider">
                                                                                        </div>
                                                                                        <a class="dropdown-item"
                                                                                            href="#"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#removeProjectModal"><i
                                                                                                class="bx bx-trash"></i>
                                                                                            Remove</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body p-3">
                                                                    <div class="project-list-sec-1 pb-2">
                                                                        <ul>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Start
                                                                                    Date</p>
                                                                                <h5 class="project-semi-details-1">18
                                                                                    Sep, 2021</h5>
                                                                            </li>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Project
                                                                                    Budget</p>
                                                                                <h5 class="project-semi-details-1">
                                                                                    85,000 BDT</h5>
                                                                            </li>
                                                                            <li>
                                                                                <p class="project-semi-title-1">
                                                                                    Deadline</p>
                                                                                <h5 class="project-semi-details-1">18
                                                                                    Sep, 2021</h5>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div
                                                                        class="project-list-sec-1 pt-3 border-bottom-0 pb-0">
                                                                        <ul>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Project
                                                                                    Status</p>
                                                                                <button
                                                                                    class="btn status-box-1">Inprogress</button>
                                                                            </li>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Project
                                                                                    Head</p>
                                                                                <h5 class="project-semi-details-1">
                                                                                    Masud Ahmed</h5>
                                                                            </li>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Team
                                                                                    Members</p>
                                                                                <div class="mt-2 d-flex">
                                                                                    <a href="javascript: void(0);"
                                                                                        class="avatar-group-item material-shadow"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-trigger="hover"
                                                                                        data-bs-placement="top"
                                                                                        data-bs-original-title="Sylvia Wright">
                                                                                        <div class="">
                                                                                            <div
                                                                                                class="profile-team-member-title rounded-circle bg-secondary">
                                                                                                S
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                    <a href="javascript: void(0);"
                                                                                        class="avatar-group-item material-shadow"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-trigger="hover"
                                                                                        data-bs-placement="top"
                                                                                        data-bs-original-title="Sylvia Wright">
                                                                                        <div class="">
                                                                                            <div
                                                                                                class="profile-team-member-title rounded-circle bg-secondary">
                                                                                                S
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                    <a href="javascript: void(0);"
                                                                                        class="avatar-group-item material-shadow"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-trigger="hover"
                                                                                        data-bs-placement="top"
                                                                                        data-bs-original-title="Sylvia Wright">
                                                                                        <div class="">
                                                                                            <div
                                                                                                class="profile-team-member-title rounded-circle bg-secondary">
                                                                                                S
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                    <a href="javascript: void(0);"
                                                                                        class="avatar-group-item material-shadow"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-trigger="hover"
                                                                                        data-bs-placement="top"
                                                                                        data-bs-original-title="Add Members">
                                                                                        <div class=""
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#inviteMembersModal">
                                                                                            <div
                                                                                                class="profile-team-member-title fs-16 rounded-circle bg-light border-dashed border text-primary">
                                                                                                +
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div>
                                                                        <!-- /.progress -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xxl-6 col-lg-12 col-md-6">
                                                            <div class="card project-details-box">
                                                                <div class="card-header project-header-bg">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-grow-1">
                                                                            <a href="project-overview.php"
                                                                                class="project-main-title">Multipurpose
                                                                                landing template</a>
                                                                        </div>
                                                                        <div class="flex-shrink-0">
                                                                            <div
                                                                                class="d-flex gap-1 align-items-center my-n2">
                                                                                <div class="dropdown">
                                                                                    <button
                                                                                        class="project-menue btn btn-link text-muted p-1 mt-n2 py-0 text-decoration-none fs-15 material-shadow-none"
                                                                                        data-bs-toggle="dropdown"
                                                                                        aria-haspopup="true"
                                                                                        aria-expanded="true">
                                                                                        <i
                                                                                            class="bx bx-qr bx-burst"></i>
                                                                                    </button>
                                                                                    <div
                                                                                        class="dropdown-menu dropdown-menu-end">
                                                                                        <a class="dropdown-item"
                                                                                            href="project-overview.php"><i
                                                                                                class="bx bx-show"></i>
                                                                                            View</a>
                                                                                        <a class="dropdown-item"
                                                                                            href="apps-projects-create.html"><i
                                                                                                class="bx bxs-edit"></i>
                                                                                            Edit</a>
                                                                                        <div class="dropdown-divider">
                                                                                        </div>
                                                                                        <a class="dropdown-item"
                                                                                            href="#"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#removeProjectModal"><i
                                                                                                class="bx bx-trash"></i>
                                                                                            Remove</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-body p-3">
                                                                    <div class="project-list-sec-1 pb-2">
                                                                        <ul>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Start
                                                                                    Date</p>
                                                                                <h5 class="project-semi-details-1">18
                                                                                    Sep, 2021</h5>
                                                                            </li>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Project
                                                                                    Budget</p>
                                                                                <h5 class="project-semi-details-1">
                                                                                    85,000 BDT</h5>
                                                                            </li>
                                                                            <li>
                                                                                <p class="project-semi-title-1">
                                                                                    Deadline</p>
                                                                                <h5 class="project-semi-details-1">18
                                                                                    Sep, 2021</h5>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div
                                                                        class="project-list-sec-1 pt-3 border-bottom-0 pb-0">
                                                                        <ul>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Project
                                                                                    Status</p>
                                                                                <button
                                                                                    class="btn status-box-1">Inprogress</button>
                                                                            </li>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Project
                                                                                    Head</p>
                                                                                <h5 class="project-semi-details-1">
                                                                                    Masud Ahmed</h5>
                                                                            </li>
                                                                            <li>
                                                                                <p class="project-semi-title-3">Team
                                                                                    Members</p>
                                                                                <div class="mt-2 d-flex">
                                                                                    <a href="javascript: void(0);"
                                                                                        class="avatar-group-item material-shadow"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-trigger="hover"
                                                                                        data-bs-placement="top"
                                                                                        data-bs-original-title="Sylvia Wright">
                                                                                        <div class="">
                                                                                            <div
                                                                                                class="profile-team-member-title rounded-circle bg-secondary">
                                                                                                S
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                    <a href="javascript: void(0);"
                                                                                        class="avatar-group-item material-shadow"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-trigger="hover"
                                                                                        data-bs-placement="top"
                                                                                        data-bs-original-title="Sylvia Wright">
                                                                                        <div class="">
                                                                                            <div
                                                                                                class="profile-team-member-title rounded-circle bg-secondary">
                                                                                                S
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                    <a href="javascript: void(0);"
                                                                                        class="avatar-group-item material-shadow"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-trigger="hover"
                                                                                        data-bs-placement="top"
                                                                                        data-bs-original-title="Sylvia Wright">
                                                                                        <div class="">
                                                                                            <div
                                                                                                class="profile-team-member-title rounded-circle bg-secondary">
                                                                                                S
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                    <a href="javascript: void(0);"
                                                                                        class="avatar-group-item material-shadow"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-trigger="hover"
                                                                                        data-bs-placement="top"
                                                                                        data-bs-original-title="Add Members">
                                                                                        <div class=""
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#inviteMembersModal">
                                                                                            <div
                                                                                                class="profile-team-member-title fs-16 rounded-circle bg-light border-dashed border text-primary">
                                                                                                +
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div>
                                                                        <!-- /.progress -->
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
                                <div class="tab-pane" id="bottom-justified-tab3" role="tabpanel">
                                    <div class="accordion accordions-items-seperate">
                                        <div class="accordion-item">
                                            <div class="accordion-header" id="headingTwo2">
                                                <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    role="button" data-bs-target="#primaryBorderTwo2"
                                                    aria-expanded="true" aria-controls="primaryBorderTwo2">
                                                    <h5>Tasks</h5>
                                                </div>
                                            </div>
                                            <div id="primaryBorderTwo2"
                                                class="accordion-collapse collapse show border-top"
                                                aria-labelledby="headingTwo2">
                                                <div class="accordion-body">
                                                    <table id="add-row"
                                                        class="display table table-striped table-hover p-3"
                                                        role="grid" aria-describedby="add-row_info">
                                                        <thead class="">
                                                            <tr role="row">
                                                                <th>Sl</th>
                                                                <th>Task ID</th>
                                                                <th>Task Summary</th>
                                                                <th>Start Date</th>
                                                                <th>Due Date</th>
                                                                <th>Task Status</th>
                                                                <th>Completed</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1">01</td>
                                                                <td>TP1225-01</td>
                                                                <td>Change Login Page UI Update
                                                                    <br><small><b>Project:</b> <br><a href="#"
                                                                            class="client-info">PROJECT-ACC</a></small>
                                                                </td>
                                                                <td>3 Jan 2025</td>
                                                                <td>22 Jan 2024</td>
                                                                <td><span class="badge badge-info">In Review</span>
                                                                    <br /><span class="badge badge-warning">High</span>
                                                                </td>
                                                                <td>24 Jan 2025
                                                                    <br><small><b>Overdue:</b> <br><a href="#"
                                                                            class="client-info"><i
                                                                                class="bx bx-dna bx-tada"></i> 09h
                                                                            50m</a></small>
                                                                </td>
                                                                <td>
                                                                    <div class="form-button-action">
                                                                        <button type="button"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            class="btn btn-link btn-secondary btn-lg">
                                                                            <i class="bx bx-show"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            class="btn btn-link btn-success btn-lg">
                                                                            <i class="bx bxs-edit"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            data-bs-toggle="tooltip" title=""
                                                                            class="btn btn-link btn-danger btn-lg"
                                                                            data-original-title="Remove">
                                                                            <i class="bx bx-trash-alt"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="bottom-justified-tab4" role="tabpanel">
                                    <div class="accordion accordions-items-seperate">
                                        <div class="accordion-item">
                                            <div class="accordion-header" id="headingThree2">
                                                <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    role="button" data-bs-target="#primaryBorderThree2"
                                                    aria-expanded="true" aria-controls="primaryBorderThree2">
                                                    <h5>Invoices</h5>
                                                </div>
                                            </div>
                                            <div id="primaryBorderThree2"
                                                class="accordion-collapse collapse show border-top"
                                                aria-labelledby="headingThree2">
                                                <div class="accordion-body">
                                                    <div class="row align-items-center g-3 mb-3">
                                                        <div class="col-sm-8">
                                                            <h6>Total No of Invoice : 45</h6>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="position-relative input-icon">
                                                                <span class="input-icon-addon">
                                                                    <i class="bx bx-search"></i>
                                                                </span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Search">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="list-group-custom list-group-flush mb-3">
                                                        <div class="list-group-item border rounded mb-2 p-2">
                                                            <div class="row align-items-center g-3">
                                                                <div class="col-sm-6">
                                                                    <div class="d-flex align-items-center">
                                                                        <span
                                                                            class="avatar avatar-lg bg-light flex-shrink-0 me-2"><i
                                                                                class="bx bx-file text-dark fs-24"></i></span>
                                                                        <div>
                                                                            <h6 class="fw-medium mb-1">Phase 2
                                                                                Completion</h6>
                                                                            <p><a href="#"
                                                                                    class="text-info">#INV-123 </a> 11
                                                                                Sep 2025, 05:35 pm</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div>
                                                                        <span>Amount</span>
                                                                        <p class="text-dark">$6,598</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-sm-end">
                                                                        <span
                                                                            class="badge badge-soft-success d-inline-flex  align-items-center me-4"><i
                                                                                class="fas fa-circle me-1"></i>Paid</span>
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-sm"><i
                                                                                class="bx bx-edit"></i></a>
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-sm "><i
                                                                                class="bx bx-trash"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="list-group-item border rounded mb-2 p-2">
                                                            <div class="row align-items-center g-3">
                                                                <div class="col-sm-6">
                                                                    <div class="d-flex align-items-center">
                                                                        <span
                                                                            class="avatar avatar-lg bg-light flex-shrink-0 me-2"><i
                                                                                class="bx bx-file text-dark fs-24"></i></span>
                                                                        <div>
                                                                            <h6 class="fw-medium mb-1">Advance for
                                                                                Project</h6>
                                                                            <p><a href="#"
                                                                                    class="text-info">#INV-124 </a> 14
                                                                                Sep 2025, 05:35 pm</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div>
                                                                        <span>Amount</span>
                                                                        <p class="text-dark">$3312</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-sm-end">
                                                                        <span
                                                                            class="badge badge-soft-success d-inline-flex  align-items-center me-4"><i
                                                                                class="fas fa-circle me-1"></i>Hold</span>
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-sm"><i
                                                                                class="bx bx-edit"></i></a>
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-sm "><i
                                                                                class="bx bx-trash"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="list-group-item border rounded mb-2 p-2">
                                                            <div class="row align-items-center g-3">
                                                                <div class="col-sm-6">
                                                                    <div class="d-flex align-items-center">
                                                                        <span
                                                                            class="avatar avatar-lg bg-light flex-shrink-0 me-2"><i
                                                                                class="bx bx-file text-dark fs-24"></i></span>
                                                                        <div>
                                                                            <h6 class="fw-medium mb-1">Changes & design
                                                                                Alignments</h6>
                                                                            <p><a href="#"
                                                                                    class="text-info">#INV-125 </a> 15
                                                                                Sep 2025, 05:35 pm</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div>
                                                                        <span>Amount</span>
                                                                        <p class="text-dark">$4154</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-sm-end">
                                                                        <span
                                                                            class="badge badge-soft-success d-inline-flex  align-items-center me-4"><i
                                                                                class="fas fa-circle me-1"></i>Paid</span>
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-sm"><i
                                                                                class="bx bx-edit"></i></a>
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-sm "><i
                                                                                class="bx bx-trash"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="list-group-item border rounded mb-2 p-2">
                                                            <div class="row align-items-center g-3">
                                                                <div class="col-sm-6">
                                                                    <div class="d-flex align-items-center">
                                                                        <span
                                                                            class="avatar avatar-lg bg-light flex-shrink-0 me-2"><i
                                                                                class="bx bx-file text-dark fs-24"></i></span>
                                                                        <div>
                                                                            <h6 class="fw-medium mb-1">Added New
                                                                                Functionality</h6>
                                                                            <p><a href="#"
                                                                                    class="text-info">#INV-126 </a> 16
                                                                                Sep 2025, 05:35 pm</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div>
                                                                        <span>Amount</span>
                                                                        <p class="text-dark">$658</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-sm-end">
                                                                        <span
                                                                            class="badge badge-soft-success d-inline-flex  align-items-center me-4"><i
                                                                                class="fas fa-circle me-1"></i>Paid</span>
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-sm"><i
                                                                                class="bx bx-edit"></i></a>
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-sm "><i
                                                                                class="bx bx-trash"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="list-group-item border rounded p-2">
                                                            <div class="row align-items-center g-3">
                                                                <div class="col-sm-6">
                                                                    <div class="d-flex align-items-center">
                                                                        <span
                                                                            class="avatar avatar-lg bg-light flex-shrink-0 me-2"><i
                                                                                class="bx bx-file text-dark fs-24"></i></span>
                                                                        <div>
                                                                            <h6 class="fw-medium mb-1">Phase 1
                                                                                Completion</h6>
                                                                            <p><a href="#"
                                                                                    class="text-info">#INV-127 </a> 17
                                                                                Sep 2025, 05:35 pm</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div>
                                                                        <span>Amount</span>
                                                                        <p class="text-dark">$1259</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-sm-end">
                                                                        <span
                                                                            class="badge badge-soft-danger d-inline-flex  align-items-center me-4"><i
                                                                                class="fas fa-circle me-1"></i>unpaid</span>
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-sm"><i
                                                                                class="bx bx-edit"></i></a>
                                                                        <a href="#"
                                                                            class="btn btn-icon btn-sm "><i
                                                                                class="bx bx-trash"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <a href="#" class="btn btn-primary btn-sm">Load
                                                            More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="bottom-justified-tab5" role="tabpanel">
                                    <div class="accordion accordions-items-seperate">
                                        <div class="accordion-item">
                                            <div class="accordion-header" id="headingFour2">
                                                <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    role="button" data-bs-target="#primaryBorderFour2"
                                                    aria-expanded="true" aria-controls="primaryBorderFour2">
                                                    <h5>Notes</h5>
                                                </div>
                                            </div>
                                            <div id="primaryBorderFour2"
                                                class="accordion-collapse collapse show border-top"
                                                aria-labelledby="headingFour2">
                                                <div class="accordion-body">
                                                    <div class="row align-items-center g-3 mb-3">
                                                        <div class="col-sm-8">
                                                            <h6>Total No of Notes : 45</h6>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="position-relative input-icon">
                                                                <span class="input-icon-addon">
                                                                    <i class="bx bx-search"></i>
                                                                </span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Search">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-6 d-flex">
                                                            <div class="card flex-fill">
                                                                <div class="card-body">
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-between mb-2">
                                                                        <h6 class="text-gray-5 fw-medium">15 May 2025
                                                                        </h6>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);"
                                                                                class="d-inline-flex align-items-center"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                <i class="bx bx-dots-vertical"></i>
                                                                            </a>
                                                                            <ul
                                                                                class="dropdown-menu dropdown-menu-end p-3">
                                                                                <li>
                                                                                    <a href="javascript:void(0);"
                                                                                        class="dropdown-item rounded-1"><i
                                                                                            class="bx bx-edit me-2"></i>Edit</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:void(0);"
                                                                                        class="dropdown-item rounded-1"><i
                                                                                            class="bx bx-trash me-1"></i>Delete</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <h6 class="d-flex align-items-center mb-2"><i
                                                                            class="fas fa-circle text-primary me-1"></i>Changes
                                                                        & design</h6>
                                                                    <p class="text-truncate line-clamb-3">An office
                                                                        management app project streamlines
                                                                        administrative tasks by integrating
                                                                        tools for scheduling, communication, and
                                                                        task management, enhancing overall productivity
                                                                        and efficiency.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 d-flex">
                                                            <div class="card flex-fill">
                                                                <div class="card-body">
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-between mb-2">
                                                                        <h6 class="text-gray-5 fw-medium">16 May 2025
                                                                        </h6>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);"
                                                                                class="d-inline-flex align-items-center"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                <i class="bx bx-dots-vertical"></i>
                                                                            </a>
                                                                            <ul
                                                                                class="dropdown-menu dropdown-menu-end p-3">
                                                                                <li>
                                                                                    <a href="javascript:void(0);"
                                                                                        class="dropdown-item rounded-1"><i
                                                                                            class="bx bx-edit me-2"></i>Edit</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:void(0);"
                                                                                        class="dropdown-item rounded-1"><i
                                                                                            class="bx bx-trash me-1"></i>Delete</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <h6 class="d-flex align-items-center mb-2"><i
                                                                            class="fas fa-circle text-success me-1"></i>Phase
                                                                        1 Completion</h6>
                                                                    <p class="text-truncate line-clamb-3">
                                                                        An office management app project streamlines
                                                                        administrative tasks by integrating tools for
                                                                        scheduling, communication, and task
                                                                        management, enhancing overall productivity and
                                                                        efficiency.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 d-flex">
                                                            <div class="card flex-fill">
                                                                <div class="card-body">
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-between mb-2">
                                                                        <h6 class="text-gray-5 fw-medium">17 May 2025
                                                                        </h6>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);"
                                                                                class="d-inline-flex align-items-center"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                <i class="bx bx-dots-vertical"></i>
                                                                            </a>
                                                                            <ul
                                                                                class="dropdown-menu dropdown-menu-end p-3">
                                                                                <li>
                                                                                    <a href="javascript:void(0);"
                                                                                        class="dropdown-item rounded-1"><i
                                                                                            class="bx bx-edit me-2"></i>Edit</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:void(0);"
                                                                                        class="dropdown-item rounded-1"><i
                                                                                            class="bx bx-trash me-1"></i>Delete</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <h6 class="d-flex align-items-center mb-2"><i
                                                                            class="fas fa-circle text-danger me-1"></i>Phase
                                                                        2 Completion</h6>
                                                                    <p class="text-truncate line-clamb-3">
                                                                        An office management app project streamlines
                                                                        administrative tasks by integrating tools for
                                                                        scheduling, communication, and task
                                                                        management, enhancing overall productivity and
                                                                        efficiency.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="text-center">
                                                                <a href="#"
                                                                    class="btn btn-primary btn-sm">Load More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="bottom-justified-tab6" role="tabpanel">
                                    <div class="accordion accordions-items-seperate">
                                        <div class="accordion-item">
                                            <div class="accordion-header" id="headingFive2">
                                                <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    role="button" data-bs-target="#primaryBorderFive2"
                                                    aria-expanded="true" aria-controls="primaryBorderFive2">
                                                    <h5>Documents</h5>
                                                </div>
                                            </div>
                                            <div id="primaryBorderFive2"
                                                class="accordion-collapse collapse show border-top"
                                                aria-labelledby="headingFive2">
                                                <div class="accordion-body">
                                                    <div class="row align-items-center g-3 mb-3">
                                                        <div class="col-sm-4">
                                                            <h6>Total No of Documents : 45</h6>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="d-flex align-items-center">
                                                                <div class="dropdown me-2">
                                                                    <a href="javascript:void(0);"
                                                                        class="dropdown-toggle btn btn-white"
                                                                        data-bs-toggle="dropdown"
                                                                        aria-expanded="false">
                                                                        Sort By : Docs Type
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-menu-end p-3">
                                                                        <li>
                                                                            <a href="javascript:void(0);"
                                                                                class="dropdown-item rounded-1">Docs</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:void(0);"
                                                                                class="dropdown-item rounded-1">Pdf</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:void(0);"
                                                                                class="dropdown-item rounded-1">Image</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:void(0);"
                                                                                class="dropdown-item rounded-1">Folder</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:void(0);"
                                                                                class="dropdown-item rounded-1">Xml</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="position-relative input-icon flex-fill">
                                                                    <span class="input-icon-addon">
                                                                        <i class="bx bx-search"></i>
                                                                    </span>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Search">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="custom-datatable-filter table-responsive no-datatable-length border">
                                                        <table class="table datatable">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Size</th>
                                                                    <th>Type</th>
                                                                    <th>Modified</th>
                                                                    <th>Share</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div
                                                                            class="d-flex align-items-center file-name-icon">
                                                                            <a href="#"
                                                                                class="avatar avatar-md bg-light"
                                                                                data-bs-toggle="offcanvas"
                                                                                data-bs-target="#preview">
                                                                                <img src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/icons/file-01.svg"
                                                                                    class="img-fluid"
                                                                                    alt="img"></a>
                                                                            <div class="ms-2">
                                                                                <p class="text-title fw-medium  mb-0">
                                                                                    <a href="#"
                                                                                        data-bs-toggle="offcanvas"
                                                                                        data-bs-target="#preview">Secret</a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>7.6 MB</td>
                                                                    <td>Doc</td>
                                                                    <td>
                                                                        <p class="text-title mb-0">Mar 15, 2025</p>
                                                                        <span>05:00:14 PM</span>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="avatar-list-stacked avatar-group-sm">
                                                                            <span class="avatar avatar-rounded">
                                                                                <img class="border border-white"
                                                                                    src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/profiles/avatar-27.jpg"
                                                                                    alt="img">
                                                                            </span>
                                                                            <span class="avatar avatar-rounded">
                                                                                <img class="border border-white"
                                                                                    src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/profiles/avatar-29.jpg"
                                                                                    alt="img">
                                                                            </span>
                                                                            <span class="avatar avatar-rounded">
                                                                                <img class="border border-white"
                                                                                    src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/profiles/avatar-12.jpg"
                                                                                    alt="img">
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="rating-select me-2">
                                                                                <a href="javascript:void(0);"><i
                                                                                        class="bx bx-star"></i></a>
                                                                            </div>
                                                                            <div class="dropdown">
                                                                                <a href="#"
                                                                                    class="d-flex align-items-center justify-content-center"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="false">
                                                                                    <i
                                                                                        class="bx bx-dots-horizontal-rounded fs-14"></i>
                                                                                </a>
                                                                                <ul
                                                                                    class="dropdown-menu dropdown-menu-right p-3">
                                                                                    <li>
                                                                                        <a class="dropdown-item rounded-1"
                                                                                            href="#">
                                                                                            <i
                                                                                                class="bx bx-trash me-2"></i>Permanent
                                                                                            Delete
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a class="dropdown-item rounded-1"
                                                                                            href="#">
                                                                                            <i
                                                                                                class="bx bx-edit me-2"></i>Restore
                                                                                            File
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div
                                                                            class="d-flex align-items-center file-name-icon">
                                                                            <a href="#"
                                                                                class="avatar avatar-md bg-light"
                                                                                data-bs-toggle="offcanvas"
                                                                                data-bs-target="#preview">
                                                                                <img src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/icons/file-02.svg"
                                                                                    class="img-fluid"
                                                                                    alt="img"></a>
                                                                            <div class="ms-2">
                                                                                <p class="text-title fw-medium  mb-0">
                                                                                    <a href="#"
                                                                                        data-bs-toggle="offcanvas"
                                                                                        data-bs-target="#preview">Sophie
                                                                                        Headrick</a></p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>7.4 MB</td>
                                                                    <td>PDF</td>
                                                                    <td>
                                                                        <p class="text-title mb-0">Jan 8, 2025</p>
                                                                        <span>08:20:13 PM</span>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="avatar-list-stacked avatar-group-sm">
                                                                            <span class="avatar avatar-rounded">
                                                                                <img class="border border-white"
                                                                                    src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/profiles/avatar-15.jpg"
                                                                                    alt="img">
                                                                            </span>
                                                                            <span class="avatar avatar-rounded">
                                                                                <img class="border border-white"
                                                                                    src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/profiles/avatar-16.jpg"
                                                                                    alt="img">
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="rating-select me-2">
                                                                                <a href="javascript:void(0);"><i
                                                                                        class="bx bx-star"></i></a>
                                                                            </div>
                                                                            <div class="dropdown">
                                                                                <a href="#"
                                                                                    class="d-flex align-items-center justify-content-center"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="false">
                                                                                    <i
                                                                                        class="bx bx-dots-horizontal-rounded fs-14"></i>
                                                                                </a>
                                                                                <ul
                                                                                    class="dropdown-menu dropdown-menu-right p-3">
                                                                                    <li>
                                                                                        <a class="dropdown-item rounded-1"
                                                                                            href="#">
                                                                                            <i
                                                                                                class="bx bx-trash me-2"></i>Permanent
                                                                                            Delete
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a class="dropdown-item rounded-1"
                                                                                            href="#">
                                                                                            <i
                                                                                                class="bx bx-message-square-edit me-2"></i>Restore
                                                                                            File
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div
                                                                            class="d-flex align-items-center file-name-icon">
                                                                            <a href="#"
                                                                                class="avatar avatar-md bg-light"
                                                                                data-bs-toggle="offcanvas"
                                                                                data-bs-target="#preview">
                                                                                <img src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/icons/file-03.svg"
                                                                                    class="img-fluid"
                                                                                    alt="img"></a>
                                                                            <div class="ms-2">
                                                                                <p class="text-title fw-medium  mb-0">
                                                                                    <a href="#"
                                                                                        data-bs-toggle="offcanvas"
                                                                                        data-bs-target="#preview">Gallery</a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>6.1 MB</td>
                                                                    <td>Image</td>
                                                                    <td>
                                                                        <p class="text-title mb-0">Aug 6, 2025</p>
                                                                        <span>04:10:12 PM</span>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="avatar-list-stacked avatar-group-sm">
                                                                            <span class="avatar avatar-rounded">
                                                                                <img class="border border-white"
                                                                                    src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/profiles/avatar-02.jpg"
                                                                                    alt="img">
                                                                            </span>
                                                                            <span class="avatar avatar-rounded">
                                                                                <img class="border border-white"
                                                                                    src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/profiles/avatar-03.jpg"
                                                                                    alt="img">
                                                                            </span>
                                                                            <span class="avatar avatar-rounded">
                                                                                <img class="border border-white"
                                                                                    src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/profiles/avatar-05.jpg"
                                                                                    alt="img">
                                                                            </span>
                                                                            <span class="avatar avatar-rounded">
                                                                                <img class="border border-white"
                                                                                    src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/profiles/avatar-06.jpg"
                                                                                    alt="img">
                                                                            </span>
                                                                            <a class="avatar bg-primary avatar-rounded text-fixed-white"
                                                                                href="javascript:void(0);">
                                                                                +1
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="rating-select me-2">
                                                                                <a href="javascript:void(0);"><i
                                                                                        class="bx bx-star"></i></a>
                                                                            </div>
                                                                            <div class="dropdown">
                                                                                <a href="#"
                                                                                    class="d-flex align-items-center justify-content-center"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="false">
                                                                                    <i
                                                                                        class="bx bx-dots-horizontal-rounded fs-14"></i>
                                                                                </a>
                                                                                <ul
                                                                                    class="dropdown-menu dropdown-menu-right p-3">
                                                                                    <li>
                                                                                        <a class="dropdown-item rounded-1"
                                                                                            href="#">
                                                                                            <i
                                                                                                class="bx bx-trash me-2"></i>Permanent
                                                                                            Delete
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a class="dropdown-item rounded-1"
                                                                                            href="#">
                                                                                            <i
                                                                                                class="bx bx-message-square-edit me-2"></i>Restore
                                                                                            File
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div
                                                                            class="d-flex align-items-center file-name-icon">
                                                                            <a href="#"
                                                                                class="avatar avatar-md bg-light"
                                                                                data-bs-toggle="offcanvas"
                                                                                data-bs-target="#preview">
                                                                                <img src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/icons/file-04.svg"
                                                                                    class="img-fluid"
                                                                                    alt="img"></a>
                                                                            <div class="ms-2">
                                                                                <p class="text-title fw-medium  mb-0">
                                                                                    <a href="#"
                                                                                        data-bs-toggle="offcanvas"
                                                                                        data-bs-target="#preview">Doris
                                                                                        Crowley</a></p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>5.2 MB</td>
                                                                    <td>Folder</td>
                                                                    <td>
                                                                        <p class="text-title mb-0">Jan 6, 2025</p>
                                                                        <span>03:40:14 PM</span>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="avatar-list-stacked avatar-group-sm">
                                                                            <span class="avatar avatar-rounded">
                                                                                <img class="border border-white"
                                                                                    src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/profiles/avatar-06.jpg"
                                                                                    alt="img">
                                                                            </span>
                                                                            <span class="avatar avatar-rounded">
                                                                                <img class="border border-white"
                                                                                    src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/profiles/avatar-10.jpg"
                                                                                    alt="img">
                                                                            </span>
                                                                            <span class="avatar avatar-rounded">
                                                                                <img class="border border-white"
                                                                                    src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/profiles/avatar-15.jpg"
                                                                                    alt="img">
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="rating-select me-2">
                                                                                <a href="javascript:void(0);"><i
                                                                                        class="bx bx-star"></i></a>
                                                                            </div>
                                                                            <div class="dropdown">
                                                                                <a href="#"
                                                                                    class="d-flex align-items-center justify-content-center"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="false">
                                                                                    <i
                                                                                        class="bx bx-dots-horizontal-rounded fs-14"></i>
                                                                                </a>
                                                                                <ul
                                                                                    class="dropdown-menu dropdown-menu-right p-3">
                                                                                    <li>
                                                                                        <a class="dropdown-item rounded-1"
                                                                                            href="#">
                                                                                            <i
                                                                                                class="bx bx-trash me-2"></i>Permanent
                                                                                            Delete
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a class="dropdown-item rounded-1"
                                                                                            href="#">
                                                                                            <i
                                                                                                class="bx bx-message-square-edit me-2"></i>Restore
                                                                                            File
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div
                                                                            class="d-flex align-items-center file-name-icon">
                                                                            <a href="#"
                                                                                class="avatar avatar-md bg-light"
                                                                                data-bs-toggle="offcanvas"
                                                                                data-bs-target="#preview">
                                                                                <img src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/icons/file-05.svg"
                                                                                    class="img-fluid"
                                                                                    alt="img"></a>
                                                                            <div class="ms-2">
                                                                                <p class="text-title fw-medium  mb-0">
                                                                                    <a href="#"
                                                                                        data-bs-toggle="offcanvas"
                                                                                        data-bs-target="#preview">Cheat_codez</a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>8 MB</td>
                                                                    <td>Xml</td>
                                                                    <td>
                                                                        <p class="text-title mb-0">Oct 12, 2025</p>
                                                                        <span>05:00:14 PM</span>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="avatar-list-stacked avatar-group-sm">
                                                                            <span class="avatar avatar-rounded">
                                                                                <img class="border border-white"
                                                                                    src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/profiles/avatar-04.jpg"
                                                                                    alt="img">
                                                                            </span>
                                                                            <span class="avatar avatar-rounded">
                                                                                <img class="border border-white"
                                                                                    src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/profiles/avatar-28.jpg"
                                                                                    alt="img">
                                                                            </span>
                                                                            <span class="avatar avatar-rounded">
                                                                                <img class="border border-white"
                                                                                    src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/profiles/avatar-14.jpg"
                                                                                    alt="img">
                                                                            </span>
                                                                            <span class="avatar avatar-rounded">
                                                                                <img class="border border-white"
                                                                                    src="https://smarthr.dreamstechnologies.com/laravel/template/public/build/img/profiles/avatar-15.jpg"
                                                                                    alt="img">
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="rating-select me-2">
                                                                                <a href="javascript:void(0);"><i
                                                                                        class="bx bx-star"></i></a>
                                                                            </div>
                                                                            <div class="dropdown">
                                                                                <a href="#"
                                                                                    class="d-flex align-items-center justify-content-center"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="false">
                                                                                    <i
                                                                                        class="bx bx-dots-horizontal-rounded fs-14"></i>
                                                                                </a>
                                                                                <ul
                                                                                    class="dropdown-menu dropdown-menu-right p-3">
                                                                                    <li>
                                                                                        <a class="dropdown-item rounded-1"
                                                                                            href="#">
                                                                                            <i
                                                                                                class="bx bx-trash me-2"></i>Permanent
                                                                                            Delete
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a class="dropdown-item rounded-1"
                                                                                            href="#">
                                                                                            <i
                                                                                                class="bx bx-message-square-edit me-2"></i>Restore
                                                                                            File
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
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
            </div>

          
    
    {{-- @include('admin.employee.js.employee_view_js') --}}

@endsection