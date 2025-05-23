@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
<div class="container">
   <div class="page-inner ms-lg-0">
      <!-- Welcome Wrap -->
      <div class="card mb-0">
         <div class="card-body d-flex align-items-center justify-content-between flex-wrap">
            <div class="d-flex align-items-center">
               <span class="avatar avatar-xl flex-shrink-0">
               <img src="assets/img/avatar-3.jpg" class="rounded-circle" alt="img">
               </span>
               <div class="ms-3">
                  <h3 class="mb-2 project-details-card-header-title">Welcome Back, Admin <a href="javascript:void(0);" class="edit-icon"><i class="ti ti-edit fs-14"></i></a></h3>
                  <p class="mb-0 expense-title-1">You have <span class="text-primary text-decoration-underline">21</span> Pending Money Receipt for Approvals<span class="text-primary text-decoration-underline"></p>
               </div>
            </div>
            <div class="d-flex align-items-center flex-wrap">
           <a href="customer.php" class="btn btn-secondary btn-md me-2"><i class="ti ti-square-rounded-plus me-1"></i>Add Customer</a>
               <a href="#" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#add_leaves"><i class="ti ti-square-rounded-plus me-1"></i>Money Receipt</a>
            </div>
         </div>
      </div>
      <!-- /Welcome Wrap -->       
       
       
       <div class="row mt-4">
         <!--Revenue-->
         <div class="col-xl-6">
            <div class="card flex-fill h-100 mb-0">
               <div class="card-header pb-2 pt-2">
                  <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2">
                     <h5 class="project-details-card-header-title">MR Approved & Pending Status</h5>
                     <div class="dropdown">
                        <a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
                        <i class="ti ti-calendar me-1"></i>2025
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                           <li>
                              <a href="javascript:void(0);" class="dropdown-item rounded-1">2025</a>
                           </li>
                           <li>
                              <a href="javascript:void(0);" class="dropdown-item rounded-1">2024</a>
                           </li>
                           <li>
                              <a href="javascript:void(0);" class="dropdown-item rounded-1">2023</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card-body pt-3 pb-0">
                  <div class="d-flex align-items-center justify-content-between flex-wrap">
                     <div class="d-flex align-items-center mb-1">
                        <p class="fs-13 text-gray-9 me-3 mb-0"><i class='bx bxs-square-rounded me-2 text-gray-9' ></i>Pending MR</p>
                        <p class="fs-13 text-gray-9 mb-0"><i class='bx bxs-square-rounded me-2 text-danger' ></i>Approved MR</p>
                     </div>
                     <p class="fs-13 mb-1">Last Updated at 11:30PM</p>
                  </div>
                  <div id="sales-income"></div>
               </div>
            </div>
         </div>
         <!--Revenue-->
         <!--Client Info-->
         <div class="col-xl-3">
            <div class="card flex-fill h-100 mb-0">
               <div class="card-header pb-2 pt-2">
                  <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2">
                     <h5 class="project-details-card-header-title">Project Status</h5>
                     <div class="dropdown">
                        <a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
                        <i class="ti ti-calendar me-1"></i>2025
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                           <li>
                              <a href="javascript:void(0);" class="dropdown-item rounded-1">2024</a>
                           </li>
                           <li>
                              <a href="javascript:void(0);" class="dropdown-item rounded-1">2023</a>
                           </li>
                           <li>
                              <a href="javascript:void(0);" class="dropdown-item rounded-1">2022</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div id="donut-chart-2"></div>
                  <div>
                     <div class="mb-3 d-flex align-items-center justify-content-between">
                        <p class="expense-title-1 mb-0">
                           <i class="bx bxs-square-rounded fs-10 text-dark me-2"></i>Total Customer
                        </p>
                        <span class="expense-title-1 mb-0">1254</span>
                     </div>
                     <div class="mb-3 d-flex align-items-center justify-content-between">
                        <p class="expense-title-1 mb-0">
                           <i class="bx bxs-square-rounded fs-10 text-dark me-2"></i>Total Sale
                        </p>
                        <span class="expense-title-1 mb-0">1254</span>
                     </div>
                     <div class="mb-3 d-flex align-items-center justify-content-between">
                        <p class="expense-title-1 mb-0">
                           <i class="bx bxs-square-rounded fs-10 text-dark me-2"></i>Total Booking
                        </p>
                        <span class="expense-title-1 mb-0">1254</span>
                     </div>
                     <div class="mb-0 d-flex align-items-center justify-content-between">
                        <p class="expense-title-1 mb-0">
                           <i class="bx bxs-square-rounded fs-10 text-dark me-2"></i>Available Plot
                        </p>
                        <span class="expense-title-1 mb-0">1254</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--Client Info-->
         <!--Login Info-->
         <div class="col-xl-3">
            <div class="card flex-fill h-100 mb-0">
               <div class="card-header pb-2 pt-2">
                  <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2">
                     <h5 class="project-details-card-header-title">Login Activities</h5>
                     <div class="dropdown">
                        <a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
                        <i class="ti ti-calendar me-1"></i>Today
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end p-3">
                           <li>
                              <a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
                           </li>
                           <li>
                              <a href="javascript:void(0);" class="dropdown-item rounded-1">This Weak</a>
                           </li>
                           <li>
                              <a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="card-body schedule-timeline">
                  <div class="d-flex align-items-start">
                     <div class="align-items-center active-time">
                        <span>09:25 AM</span>
                     </div>
                     <span class="point-devider-1"><i class='bx bxs-square-rounded text-primary fs-13' ></i></span>
                     <div class="flex-fill ps-3 timeline-flow">
                        <div class="mt-3">
                           <p class="fw-semibold mb-0">192.168.68.205</p>
                           <span>12 March 2025</span>
                        </div>
                     </div>
                  </div>
                  <div class="d-flex align-items-start">
                     <div class="align-items-center active-time">
                        <span>09:20 AM</span>
                     </div>
                     <span class="point-devider-1"><i class='bx bxs-square-rounded text-warning fs-13' ></i></span>
                     <div class="flex-fill ps-3 timeline-flow">
                        <div class="mt-3">
                           <p class="fw-semibold mb-0">192.168.68.205</p>
                           <span>12 March 2025</span>
                        </div>
                     </div>
                  </div>
                  <div class="d-flex align-items-start">
                     <div class="align-items-center active-time">
                        <span>09:18 AM</span>
                     </div>
                     <span class="point-devider-1"><i class='bx bxs-square-rounded text-success fs-13' ></i></span>
                     <div class="flex-fill ps-3 timeline-flow">
                        <div class="mt-3">
                           <p class="fw-semibold mb-0">192.168.68.205</p>
                           <span>12 March 2025</span>
                        </div>
                     </div>
                  </div>
                  <div class="d-flex align-items-start">
                     <div class="align-items-center active-time">
                        <span>09:10 AM</span>
                     </div>
                     <span class="point-devider-1"><i class='bx bxs-square-rounded text-danger fs-13' ></i></span>
                     <div class="flex-fill ps-3 timeline-flow">
                        <div class="mt-3">
                           <p class="fw-semibold mb-0">192.168.68.205</p>
                           <span>12 March 2025</span>
                        </div>
                     </div>
                  </div>
                  <div class="d-flex align-items-start">
                     <div class="align-items-center active-time">
                        <span>09:10 AM</span>
                     </div>
                     <span class="point-devider-1"><i class='bx bxs-square-rounded text-danger fs-13' ></i></span>
                     <div class="flex-fill ps-3 timeline-flow">
                        <div class="mt-3">
                           <p class="fw-semibold mb-0">192.168.68.205</p>
                           <span>12 March 2025</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--Login Info-->
      </div>

       
       
       
       

      <div class="row mt-4">
         <div class="col-xl-3 col-md-6">
            <div class="card position-relative mb-0">
               <div class="card-body p-2">
                  <div class="d-flex align-items-center">
                     <div class="top-counter-inner">
                        <ul>
                           <li>
                              <div class="counter-icon">
                                 <i class='bx bxs-buildings bx-flashing' ></i>
                              </div>
                              <div class="counter-info-1">
                                 <h5 class="expense-title-1">Available Plot</h5>
                                 <p class="expense-title-2">365</p>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <span class="position-absolute top-0 end-0"><img src="assets/img/bg/card-bg-04.png" alt="Img"></span>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-md-6">
            <div class="card position-relative mb-0">
               <div class="card-body p-2">
                  <div class="d-flex align-items-center">
                     <div class="top-counter-inner">
                        <ul>
                           <li>
                              <div class="counter-icon">
                                 <i class='bx bxs-user-account bx-tada' ></i>
                              </div>
                              <div class="counter-info-1">
                                 <h5 class="expense-title-1">Sales Plot</h5>
                                 <p class="expense-title-2">340</p>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <span class="position-absolute top-0 end-0"><img src="assets/img/bg/card-bg-04.png" alt="Img"></span>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-md-6">
            <div class="card position-relative mb-0">
               <div class="card-body p-2">
                  <div class="d-flex align-items-center">
                     <div class="top-counter-inner">
                        <ul>
                           <li>
                              <div class="counter-icon">
                                 <i class='bx bx-user-check text-success' ></i>
                              </div>
                              <div class="counter-info-1">
                                 <h5 class="expense-title-1">Total Agency</h5>
                                 <p class="expense-title-2">290</p>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <span class="position-absolute top-0 end-0"><img src="assets/img/bg/card-bg-04.png" alt="Img"></span>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-md-6">
            <div class="card position-relative mb-0">
               <div class="card-body p-2">
                  <div class="d-flex align-items-center">
                     <div class="top-counter-inner">
                        <ul>
                           <li>
                              <div class="counter-icon">
                                 <i class='bx bx-user-x text-danger'></i>
                              </div>
                              <div class="counter-info-1">
                                 <h5 class="expense-title-1">Total Salesman</h5>
                                 <p class="expense-title-2">50</p>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <span class="position-absolute top-0 end-0"><img src="assets/img/bg/card-bg-04.png" alt="Img"></span>
               </div>
            </div>
         </div>
      </div>
      <div class="row mt-4">
         <div class="col-md-4">
            <div class="card flex-fill h-100 mb-0">
               <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
                  <h5 class="project-details-card-header-title">Salesman Status</h5>
                  <div class="dropdown mb-2">
                     <a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
                     <i class="ti ti-calendar me-1"></i>This Week
                     </a>
                     <ul class="dropdown-menu  dropdown-menu-end p-3">
                        <li>
                           <a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
                        </li>
                        <li>
                           <a href="javascript:void(0);" class="dropdown-item rounded-1">This Week</a>
                        </li>
                        <li>
                           <a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between mb-1">
                     <p class="expense-title-1 mb-3">Total Employee</p>
                     <h3 class="mb-3 display-1">154</h3>
                  </div>
                  <div class="progress-stacked emp-stack mb-3">
                     <div class="progress" role="progressbar" aria-label="Segment one" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                        <div class="progress-bar bg-warning"></div>
                     </div>
                     <div class="progress" role="progressbar" aria-label="Segment two" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        <div class="progress-bar bg-secondary"></div>
                     </div>
                     <div class="progress" role="progressbar" aria-label="Segment three" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                        <div class="progress-bar bg-danger"></div>
                     </div>
                     <div class="progress" role="progressbar" aria-label="Segment four" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                        <div class="progress-bar bg-pink"></div>
                     </div>
                  </div>
                  <div class="border mb-3">
                     <div class="row gx-0">
                        <div class="col-6 border-end border-bottom">
                           <div class="p-2 flex-fill">
                              <p class="fs-13 mb-1"><i class='bx bxs-square-rounded'></i> Fulltime <span class="text-gray-9">(48%)</span></p>
                              <h2 class="display-1 mb-0">450</h2>
                           </div>
                        </div>
                        <div class="col-6 border-bottom">
                           <div class="p-2 flex-fill text-end">
                              <p class="fs-13 mb-1"><i class='bx bxs-square-rounded'></i> Part Time <span class="text-gray-9">(20%)</span></p>
                              <h2 class="display-1 mb-0">112</h2>
                           </div>
                        </div>
                        <div class="col-6 border-end border-bottom">
                           <div class="p-2 flex-fill">
                              <p class="fs-13 mb-1"><i class='bx bxs-square-rounded'></i> Probation <span class="text-gray-9">(22%)</span></p>
                              <h2 class="display-1 mb-0">76</h2>
                           </div>
                        </div>
                        <div class="col-6 border-bottom">
                           <div class="p-2 flex-fill text-end">
                              <p class="fs-13 mb-1"><i class='bx bxs-square-rounded'></i> Permanent <span class="text-gray-9">(20%)</span></p>
                              <h2 class="display-1 mb-0">298</h2>
                           </div>
                        </div>
                        <div class="col-6 border-end">
                           <div class="p-2 flex-fill">
                              <p class="fs-13 mb-1"><i class='bx bxs-square-rounded'></i> Contractual <span class="text-gray-9">(22%)</span></p>
                              <h2 class="display-1 mb-0">70</h2>
                           </div>
                        </div>
                        <div class="col-6">
                           <div class="p-2 flex-fill text-end">
                              <p class="fs-13 mb-1"><i class='bx bxs-square-rounded'></i> Terminated <span class="text-gray-9">(20%)</span></p>
                              <h2 class="display-1 mb-0">36</h2>
                           </div>
                        </div>
                     </div>
                  </div>
                  <button class="btn btn-primary w-100"><b>View All Employee</b></button>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="card flex-fill h-100 mb-0">
               <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
                  <h5 class="project-details-card-header-title">Agency Overview</h5>
                  <div class="dropdown mb-2">
                     <a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
                     <i class="ti ti-calendar me-1"></i>Today
                     </a>
                     <ul class="dropdown-menu  dropdown-menu-end p-3">
                        <li>
                           <a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
                        </li>
                        <li>
                           <a href="javascript:void(0);" class="dropdown-item rounded-1">This Week</a>
                        </li>
                        <li>
                           <a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="card-body">
                  <div class="chartjs-wrapper-demo position-relative mb-4">
                     <canvas id="attendance" height="200"></canvas>
                     <div class="position-absolute text-center attendance-canvas">
                        <p class="fs-13 mb-1">Agency Total</p>
                        <h3 class="display-1">120</h3>
                     </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between">
                     <p class="fs-15 mb-2 text-gray-9"><i class='bx bxs-square-rounded text-success'></i> GoldenEye</p>
                     <p class="fs-15 fw-medium mb-2">59%</p>
                  </div>
                  <div class="d-flex align-items-center justify-content-between">
                     <p class="fs-15 mb-2 text-gray-9"><i class='bx bxs-square-rounded text-secondary'></i> Land Mark</p>
                     <p class="fs-15 fw-medium mb-2">21%</p>
                  </div>
                  <div class="d-flex align-items-center justify-content-between">
                     <p class="fs-15 mb-2 text-gray-9"><i class='bx bxs-square-rounded text-warning'></i> SystemEye</p>
                     <p class="fs-15 fw-medium mb-2">2%</p>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-2">
                     <p class="fs-15 mb-2 text-gray-9"><i class='bx bxs-square-rounded text-danger'></i> Rupayon</p>
                     <p class="fs-15 fw-medium mb-2">15%</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="card flex-fill h-100 mb-0">
               <div class="card-header pb-2 d-flex align-items-center justify-content-between flex-wrap">
                  <h5 class="project-details-card-header-title">Cheque Clearing Status</h5>
                  <div class="dropdown mb-2">
                     <a href="javascript:void(0);" class="btn btn-white border btn-sm d-inline-flex align-items-center" data-bs-toggle="dropdown">
                     <i class="ti ti-calendar me-1"></i>Today
                     </a>
                     <ul class="dropdown-menu  dropdown-menu-end p-3">
                        <li>
                           <a href="javascript:void(0);" class="dropdown-item rounded-1">Today</a>
                        </li>
                        <li>
                           <a href="javascript:void(0);" class="dropdown-item rounded-1">Tomorow</a>
                        </li>
                        <li>
                           <a href="javascript:void(0);" class="dropdown-item rounded-1">This Week</a>
                        </li>
                        <li>
                           <a href="javascript:void(0);" class="dropdown-item rounded-1">This Month</a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="card-body">
                  <div data-simplebar="init" data-simplebar-auto-hide="false" class="simplebar-scrollable-y h-100">
                     <div class="simplebar-wrapper">
                        <div class="simplebar-height-auto-observer-wrapper">
                           <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                           <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                              <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden scroll;">
                                 <div class="simplebar-content">
                                    <div class="bg-light p-2 border border-dashed rounded-top mb-3">
                                       <div class="d-flex align-items-center justify-content-between">
                                          <div class="d-flex align-items-center">
                                             <a href="javascript:void(0);" class="avatar">
                                             <img src="assets/img/avatar-3.jpg" class="rounded-circle" alt="img">
                                             </a>
                                             <div class="ms-2 overflow-hidden">
                                                <h6 class="fs-medium mb-0">Shadhin Mojumder</h6>
                                                <p class="fs-13 mb-0">National Bank LLC</p>
                                                <p class="fs-13 mb-0">Amount: 1,20,000</p>
                                             </div>
                                          </div>
                                          <a href="javascript:void(0);" class="btn btn-secondary btn-xs"><i class='bx bxs-cake' ></i> Remainder</a>
                                       </div>
                                    </div>
                                    <div class="bg-light p-2 border border-dashed rounded-top mb-3">
                                       <div class="d-flex align-items-center justify-content-between">
                                          <div class="d-flex align-items-center">
                                             <a href="javascript:void(0);" class="avatar">
                                             <img src="assets/img/avatar-3.jpg" class="rounded-circle" alt="img">
                                             </a>
                                             <div class="ms-2 overflow-hidden">
                                                <h6 class="fs-medium" mb-0><a href="javascript:void(0);">Mary Zeen</a></h6>
                                                <p class="fs-13 mb-0">UI/UX Designer</p>
                                             </div>
                                          </div>
                                          <a href="javascript:void(0);" class="btn btn-secondary btn-xs"><i class='bx bxs-cake' ></i> Send</a>
                                       </div>
                                    </div>
                                    <div class="bg-light p-2 border border-dashed rounded-top mb-3">
                                       <div class="d-flex align-items-center justify-content-between">
                                          <div class="d-flex align-items-center">
                                             <a href="javascript:void(0);" class="avatar">
                                             <img src="assets/img/avatar-3.jpg" class="rounded-circle" alt="img">
                                             </a>
                                             <div class="ms-2 overflow-hidden">
                                                <h6 class="fs-medium  mb-0"><a href="javascript:void(0);">Antony Lewis</a></h6>
                                                <p class="fs-13  mb-0">Android Developer</p>
                                             </div>
                                          </div>
                                          <a href="javascript:void(0);" class="btn btn-secondary btn-xs"><i class='bx bxs-cake' ></i> Send</a>
                                       </div>
                                    </div>
                                    <div class="bg-light p-2 border border-dashed rounded-top mb-3">
                                       <div class="d-flex align-items-center justify-content-between">
                                          <div class="d-flex align-items-center">
                                             <span class="avatar">
                                             <img src="assets/img/avatar-3.jpg" class="rounded-circle" alt="img">
                                             </span>
                                             <div class="ms-2 overflow-hidden">
                                                <h6 class="fs-medium mb-0">Doglas Martini</h6>
                                                <p class="fs-13 mb-0">.Net Developer</p>
                                             </div>
                                          </div>
                                          <a href="javascript:void(0);" class="btn btn-secondary btn-xs"><i class='bx bxs-cake' ></i> Send</a>
                                       </div>
                                    </div>
                                    <div class="bg-light p-2 border border-dashed rounded-top mb-3">
                                       <div class="d-flex align-items-center justify-content-between">
                                          <div class="d-flex align-items-center">
                                             <span class="avatar">
                                             <img src="assets/img/avatar-3.jpg" class="rounded-circle" alt="img">
                                             </span>
                                             <div class="ms-2 overflow-hidden">
                                                <h6 class="fs-medium mb-0">Doglas Martini</h6>
                                                <p class="fs-13 mb-0">.Net Developer</p>
                                             </div>
                                          </div>
                                          <a href="javascript:void(0);" class="btn btn-secondary btn-xs"><i class='bx bxs-cake' ></i> Send</a>
                                       </div>
                                    </div>
                                    <div class="bg-light p-2 border border-dashed rounded-top mb-3">
                                       <div class="d-flex align-items-center justify-content-between">
                                          <div class="d-flex align-items-center">
                                             <span class="avatar">
                                             <img src="assets/img/avatar-3.jpg" class="rounded-circle" alt="img">
                                             </span>
                                             <div class="ms-2 overflow-hidden">
                                                <h6 class="fs-medium mb-0">Doglas Martini</h6>
                                                <p class="fs-13 mb-0">.Net Developer</p>
                                             </div>
                                          </div>
                                          <a href="javascript:void(0);" class="btn btn-secondary btn-xs"><i class='bx bxs-cake' ></i> Send</a>
                                       </div>
                                    </div>
                                    <div class="bg-light p-2 border border-dashed rounded-top mb-3">
                                       <div class="d-flex align-items-center justify-content-between">
                                          <div class="d-flex align-items-center">
                                             <span class="avatar">
                                             <img src="assets/img/avatar-3.jpg" class="rounded-circle" alt="img">
                                             </span>
                                             <div class="ms-2 overflow-hidden">
                                                <h6 class="fs-medium mb-0">Doglas Martini</h6>
                                                <p class="fs-13 mb-0">.Net Developer</p>
                                             </div>
                                          </div>
                                          <a href="javascript:void(0);" class="btn btn-secondary btn-xs"><i class='bx bxs-cake' ></i> Send</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: 607px; height: 321px;"></div>
                     </div>
                     <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar simplebar-visible" style="width: 0px; display: none;"></div>
                     </div>
                     <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar simplebar-visible" style="height: 150px; transform: translate3d(0px, 70px, 0px); display: block;"></div>
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
    $(document).ready(function() {
        if($('#attendance-chartjs').length > 0) {
            var ctx = document.getElementById('attendance-chartjs').getContext('2d');
            var mySemiDonutChart = new Chart(ctx, {
                type: 'doughnut', // Chart type
                data: {
                    labels: ['Late','Present', 'Permission', 'Absent'],
                    datasets: [{
                        label: 'Semi Donut',
                        data: [40, 20, 30, 10],
                        backgroundColor: ['#0C4B5E', '#03C95A', '#FFC107', '#E70D0D'],
                        borderWidth: 5,
                        borderRadius: 10,
                        borderColor: '#fff', // Border between segments
                        hoverBorderWidth: 0,   // Border radius for curved edges
                        cutout: '60%',
                    }]
                },
                options: {
                    rotation: -100,
                    circumference: 200,
                    layout: {
                        padding: {
                            top: -20,    // Set to 0 to remove top padding
                            bottom: -20, // Set to 0 to remove bottom padding
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false // Hide the legend
                        }
                    },
                }
            });
        }
    });
</script>
@endpush
