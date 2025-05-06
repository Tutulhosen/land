@extends('layouts.employee')
@section('title','details of '. $employeePersonal->first_name . ' ' . $employeePersonal->last_name )
@section('content')
<div class="container">
    <div class="page-content">
        <div class="container-fluid">
            <div class=" pb-4 profile-wrapper position-relative">
                <div class="text-white p-4" style="background: linear-gradient(to bottom, #6861ce, #EFBBFF);">
                    <div class="row align-items-center g-4" style="padding-top: 50px;">
                        <!-- Profile Image -->
                        <div class="col-auto position-relative">
                            <div class="avatar-xxxl">
                                @if ($employeePersonal->employeeDocument == null)
                                <img src="{{asset('admin')}}/assets/img/demo-user.jpg" alt="user-img"
                                    class="img-thumbnail rounded-circle border border-light shadow" />
                                @else
                                <img src="{{ asset('storage/'. $employeePersonal->employeeDocument->profile_picture) }}"
                                    alt="user-img" class="img-thumbnail rounded-circle border border-light shadow" />
                                @endif
                            </div>
                            <div class="position-absolute bottom-0 right-0 text-center" style="background-color: #00000077; color:#00000077; width: 125px; height: 62.5px; display: flex; justify-content: center; align-items: center; border-radius: 0 0 62.5px 62.5px;">
                                <i class="fas fa-edit fs-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="Upload Profile Picture" style="transition: color 0.3s; cursor: pointer"
                                onmouseover="this.style.color='#000000b7'" onmouseout="this.style.color='#00000059'" onclick="triggerFileInput()"></i>
                            </div>

                            <!-- Hidden file input -->

                            <!-- Form -->
                            <form method="POST" id="uploadForm" action="{{route('employee-profile.document.store')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="file" id="fileInput" style="display: none;" onchange="submitForm()" name="profile_picture"/>
                                <input type="text" name="employee_id" value="{{$employeePersonal->id}}" style="display: none;">
                                <!-- Your other form inputs go here -->
                            </form>
                        </div>
                        <!-- Profile Information -->
                        <div class="col">
                            <h3 class=" mb-1 fw-bold">{{$employeePersonal->salutations ? $employeePersonal->salutations->name: "N/A"}}
                                {{ $employeePersonal->first_name . ' ' . $employeePersonal->last_name }}</h3>
                            <p class="">
                                {{$employeePersonal->officialInformation ? $employeePersonal->officialInformation->designation ? $employeePersonal->officialInformation->designation->designation_name : "N/A" : "N/A" }}
                            </p>
                            <div class="d-flex  flex-wrap gap-3">
                                <div>
                                    <i class="ri-map-pin-user-line me-1  fs-16 align-middle"></i>
                                    {{$employeePersonal->contact->pres_add  ?? ''}}
                                </div>
                                <div>
                                    <i
                                        class="ri-building-line me-1 fs-16 align-middle"></i>{{$employeePersonal->contact->district  ?? ''}}
                                    - {{$employeePersonal->contact->postal_code  ?? ''}}
                                </div>
                            </div>
                        </div>

                        <!-- Followers & Following Section -->
                        <div class="col-auto ms-auto">
                            {{-- <div class="d-flex text-center  gap-4">
                                <div>
                                    <h4 class="mb-1 fw-bold ">24.3K</h4>
                                    <p class="fs-14 mb-0">Followers</p>
                                </div>
                                <div>
                                    <h4 class="mb-1 fw-bold">1.3K</h4>
                                    <p class="fs-14 mb-0">Following</p>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="d-flex profile-wrapper " style="margin: 20px 20px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                    <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                        class="d-none d-md-inline-block ">Overview</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab">
                                    <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span
                                        class="d-none d-md-inline-block ">Documents</span>
                                </a>
                            </li>
                        </ul>
                        {{-- <div class="flex-shrink-0">
                            <a href="{{ route('employee.edit', $employeePersonal->id) }}" class="btn btn-success"><i
                                    class="ri-edit-box-line align-bottom "></i> Edit Profile</a>
                        </div> --}}
                        <div class="flex-shrink-0 ms-2">
                            <a href="{{ route('employee-profile.download.profile', $employeePersonal->id) }}" class="btn btn-warning"><i
                                    class="ri-edit-box-line align-bottom "></i>Download Profile</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <!-- Tab panes -->
                            <div class="tab-content pt-4 text-muted">
                                <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                    <div class="row">
                                        <div class="col-xxl-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">Official Info</h5>
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Branch:</th>
                                                                    <td class="text-muted">
                                                                        {{$employeePersonal->officialInformation->branch ? $employeePersonal->officialInformation->branch->name: "N/A"}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Employee Type:</th>
                                                                    <td class="text-muted">
                                                                        {{$employeePersonal->officialInformation->employeeType ? $employeePersonal->officialInformation->employeeType->name: "N/A"}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Grade:</th>
                                                                    <td class="text-muted">
                                                                        {{$employeePersonal->officialInformation->employeeGrade ? $employeePersonal->officialInformation->employeeGrade->name: "N/A"}}
                                                                    </td>
                                                                </tr>
                                                                @if ($employeePersonal->officialInformation->reportingfirst != null)
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Reporting To (First):</th>
                                                                    <td class="text-muted">
                                                                        {{$employeePersonal->officialInformation->reportingfirst ? $employeePersonal->officialInformation->reportingfirst->salutations? $employeePersonal->officialInformation->reportingfirst->salutations->name: "" : ""}} {{$employeePersonal->officialInformation->reportingfirst ? $employeePersonal->officialInformation->reportingfirst->first_name:"" }} {{$employeePersonal->officialInformation->reportingfirst ? $employeePersonal->officialInformation->reportingfirst->last_name:""}}</td>
                                                                </tr>
                                                                @endif
                                                                @if ($employeePersonal->officialInformation->reportingsecond != null)
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Reporting To (Second):</th>
                                                                    <td class="text-muted">
                                                                        {{$employeePersonal->officialInformation->reportingsecond ? $employeePersonal->officialInformation->reportingsecond->salutations? $employeePersonal->officialInformation->reportingsecond->salutations->name: "" : ""}} {{$employeePersonal->officialInformation->reportingsecond ? $employeePersonal->officialInformation->reportingsecond->first_name:"" }} {{$employeePersonal->officialInformation->reportingsecond ? $employeePersonal->officialInformation->reportingsecond->last_name:""}}</td>
                                                                </tr>
                                                                @endif
                                                                @if ($employeePersonal->officialInformation->reportingthird != null)
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Reporting To (Third):</th>
                                                                    <td class="text-muted">
                                                                        {{$employeePersonal->officialInformation->reportingthird ? $employeePersonal->officialInformation->reportingthird->salutations? $employeePersonal->officialInformation->reportingthird->salutations->name: "" : ""}} {{$employeePersonal->officialInformation->reportingthird ? $employeePersonal->officialInformation->reportingthird->first_name:"" }} {{$employeePersonal->officialInformation->reportingthird ? $employeePersonal->officialInformation->reportingthird->last_name:""}}</td>
                                                                </tr>
                                                                @endif
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Official Phone:</th>
                                                                    <td class="text-muted text-black"><a
                                                                            href="tel:{{$employeePersonal->officialInformation->official_phone ?? ''}}"
                                                                            class="client-info">
                                                                            {{$employeePersonal->officialInformation->official_phone ?? ''}}
                                                                        </a></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Official Whatsapp:</th>
                                                                    <td class="text-muted text-black"><a
                                                                            href="https://wa.me/{{$employeePersonal->officialInformation->official_whatsapp ?? ''}}"
                                                                            class="client-info">
                                                                            {{$employeePersonal->officialInformation->official_whatsapp ?? ''}}
                                                                        </a></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Official E-mail:</th>
                                                                    <td class="text-muted text-black"><a
                                                                            href="mailto:{{$employeePersonal->officialInformation->official_email ?? ''}}"
                                                                            class="client-info">
                                                                            {{$employeePersonal->officialInformation->official_email ?? ''}}
                                                                        </a></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Notice Period Start Date:</th>
                                                                    <td class="text-muted">
                                                                        {{ $employeePersonal->officialInformation->notice_start_date ? \Carbon\Carbon::parse($employeePersonal->officialInformation->notice_start_date)->format('d M Y') : '' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Notice Period End Date:</th>
                                                                    <td class="text-muted">
                                                                        {{ $employeePersonal->officialInformation->notice_end_date ? \Carbon\Carbon::parse($employeePersonal->officialInformation->notice_end_date)->format('d M Y') : '' }}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-4">Pay Roll</h5>
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Weekly Holiday:</th>
                                                                    <td class="text-muted">
                                                                        {{$employeePersonal->payRollInformation->holiday ? $employeePersonal->payRollInformation->holiday->name: "N/A"}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Shift:</th>
                                                                    <td class="text-muted">
                                                                        {{$employeePersonal->payRollInformation->shift ? $employeePersonal->payRollInformation->shift->shift_name: "N/A"}}
                                                                    </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Overtime Enable:</th>
                                                                    <td class="text-muted">
                                                                        @if ($employeePersonal->payRollInformation->overtime_enable)
                                                                        Yes
                                                                        @else
                                                                        No
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Salary Payment By:</th>
                                                                    <td class="text-muted">
                                                                        {{$employeePersonal->payRollInformation->sallery_payment_by ?? " "}}
                                                                    </td>
                                                                </tr>
                                                                @if($employeePersonal->payRollInformation->sallery_payment_by == "Bank")
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Bank Name:</th>
                                                                    <td class="text-muted">
                                                                        {{$employeePersonal->payRollInformation->bank_name ?? " "}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Account Holder Name:</th>
                                                                    <td class="text-muted">
                                                                        {{$employeePersonal->payRollInformation->account_holder_name ?? " "}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Branch Name:</th>
                                                                    <td class="text-muted">
                                                                        {{$employeePersonal->payRollInformation->branch_name ?? " "}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Account Number:</th>
                                                                    <td class="text-muted">
                                                                        {{$employeePersonal->payRollInformation->account_number ?? " "}}
                                                                    </td>
                                                                </tr>
                                                                @endif
                                                                <tr>
                                                                    <th class="ps-0" scope="row">TIN Number:</th>
                                                                    <td class="text-muted">
                                                                        {{$employeePersonal->payRollInformation->tin_number ?? " "}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Joining Date:</th>
                                                                    <td class="text-muted">
                                                                        {{ $employeePersonal->payRollInformation->joining_date ? \Carbon\Carbon::parse($employeePersonal->payRollInformation->joining_date)->format('d M Y') : '' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Joining Salary:</th>
                                                                    <td class="text-muted">
                                                                        {{$employeePersonal->payRollInformation->joining_sallery ?? " "}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Probation Period (Month):</th>
                                                                    <td class="text-muted">
                                                                        {{$employeePersonal->payRollInformation->probation_period ?? " "}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Probation Period Start Date:</th>
                                                                    <td class="text-muted">
                                                                        {{ $employeePersonal->payRollInformation->probation_period_starting_date ? \Carbon\Carbon::parse($employeePersonal->payRollInformation->probation_period_starting_date)->format('d M Y') : '' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Probation Period End Date:</th>
                                                                    <td class="text-muted">
                                                                        {{ $employeePersonal->payRollInformation->probation_period_end_date ? \Carbon\Carbon::parse($employeePersonal->payRollInformation->probation_period_end_date)->format('d M Y') : '' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="ps-0" scope="row">Salary Type:</th>
                                                                    <td class="text-muted">
                                                                        {{$employeePersonal->payRollInformation->salary_type ?? " "}}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->

                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-4">Login Credintials</h5>
                                                    <div class="row">
                                                        @if ($employeePersonal->officialInformation!=null)
                                                        <div class="col-xxl-12 col-sm-12">
                                                            <div class="card profile-project-card  border border-1 profile-project-warning material-shadow">
                                                                @if ($employeePersonal->officialInformation->employeeProject!=null)
                                                                <div class="card-body p-4">
                                                                    <div class="d-flex">
                                                                        <div class="flex-grow-1 text-muted overflow-hidden">

                                                                            <p class="text-muted text-truncate mb-0">
                                                                                Email : <span class="fw-semibold text-body">{{$employeePersonal->officialInformation->user_email?? ""}}</span>
                                                                                <br>Password : <span class="fw-semibold text-body">
                                                                                    <a href="#" class="text-body btn btn-danger btn-sm">Send Password</a>
                                                                                </span>
                                                                                @php
                                                                                $last_login = DB::table('login_activities')->where('guard','employee')->where('user_id', $employeePersonal->officialInformation->id)->orderBy('id', 'desc')->first();
                                                                                @endphp
                                                                                <h5 class="fs-14 text-truncate">Last login at: {{$last_login->date_time}}, <br> IP: {{$last_login->login_ip}}</h5>
                                                                            </p>
                                                                        </div>
                                                                        <div class="flex-shrink-0 ms-2">
                                                                            @if ($employeePersonal->officialInformation->login_allowed == 1)
                                                                                <div  class="badge bg-success-subtle text-success fs-10">
                                                                                    Active
                                                                                </div>
                                                                            @else
                                                                                <div  class="badge bg-warning-subtle text-warning fs-10">
                                                                                    Deactive
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                <!-- end card body -->
                                                            </div>
                                                            <!-- end card -->
                                                        </div>
                                                        @endif

                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->

                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-4">Assign Project</h5>
                                                    <div class="row">
                                                        @if ($employeePersonal->officialInformation!=null)
                                                        <div class="col-xxl-12 col-sm-12">
                                                            <div class="card profile-project-card  border border-1 profile-project-warning material-shadow">
                                                                @if ($employeePersonal->officialInformation->employeeProject!=null)
                                                                <div class="card-body p-4">
                                                                    <div class="d-flex">
                                                                        <div class="flex-grow-1 text-muted overflow-hidden">
                                                                            <h5 class="fs-14 text-truncate"><a href="#"
                                                                                    class="text-body">{{$employeePersonal->officialInformation->employeeProject->name?? ""}}</a></h5>
                                                                            <p class="text-muted text-truncate mb-0">
                                                                                Last Update : <span class="fw-semibold text-body">{{ \Carbon\Carbon::parse($employeePersonal->officialInformation->employeeProject->updated_at)->diffInDays() ?? "No date available" }}  Days Ago                                                                              </span></p>
                                                                        </div>
                                                                        <div class="flex-shrink-0 ms-2">
                                                                            @if ($employeePersonal->officialInformation->employeeProject->status == 1)
                                                                                <div  class="badge bg-success-subtle text-success fs-10">
                                                                                    Active
                                                                                </div>
                                                                            @else
                                                                                <div  class="badge bg-warning-subtle text-warning fs-10">
                                                                                    Deactive
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="d-flex mt-4">
                                                                        <div class="flex-grow-1">
                                                                            <div
                                                                                class="d-flex align-items-center gap-2">
                                                                                <div>
                                                                                    <h5 class="fs-12 text-muted mb-0">
                                                                                        Members :
                                                                                    </h5>
                                                                                </div>
                                                                                <div class="avatar-group">
                                                                                    @foreach ($employeePersonal->officialInformation->employeeProject->employeeOfficials as $employeeOfficial)

                                                                                    <div
                                                                                        class="avatar-group-item material-shadow">
                                                                                        <div class="avatar-xs">
                                                                                                @if ($employeeOfficial->employee->employeeDocument == null)
                                                                                                <img src="{{asset('admin')}}/assets/img/demo-user.jpg" alt="user-img"
                                                                                                    class="rounded-circle img-fluid" />
                                                                                                @else
                                                                                                <img src="{{ asset('storage/'. $employeeOfficial->employee->employeeDocument->profile_picture) }}"
                                                                                                    alt="user-img" class="rounded-circle img-fluid" />
                                                                                                @endif
                                                                                        </div>
                                                                                    </div>


                                                                                    @endforeach


                                                                                    {{-- <div
                                                                                        class="avatar-group-item material-shadow">
                                                                                        <div class="avatar-xs">
                                                                                            <img src="{{asset('admin')}}/assets/img/demo-user.jpg"
                                                                                                alt=""
                                                                                                class="rounded-circle img-fluid" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="avatar-group-item material-shadow">
                                                                                        <div class="avatar-xs">
                                                                                            <div
                                                                                                class="avatar-title rounded-circle bg-light text-primary">
                                                                                                J
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> --}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                <!-- end card body -->
                                                            </div>
                                                            <!-- end card -->
                                                        </div>
                                                        @endif

                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->



                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-9">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-3">About</h5>
                                                            <div class="row mb-3">
                                                                <div class="col-md-2"><strong>Full Name:</strong></div>
                                                                <div class="col-md-4 text-muted">
                                                                    {{$employeePersonal->salutations ? $employeePersonal->salutations->name: "N/A"}}
                                                                    {{ $employeePersonal->first_name . ' ' . $employeePersonal->last_name }}
                                                                </div>
                                                                <div class="col-md-2"><strong>Employee Personal ID:</strong></div>
                                                                <div class="col-md-4 text-muted">
                                                                    <b>{{$employeePersonal->emp_id ? $employeePersonal->emp_id: "N/A"}}</b>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-md-2"><strong>Gender:</strong></div>
                                                                <div class="col-md-4 text-muted">
                                                                    {{$employeePersonal->genders ? $employeePersonal->genders->name: "N/A"}}
                                                                </div>
                                                                <div class="col-md-2"><strong>Religion:</strong></div>
                                                                <div class="col-md-4 text-muted">
                                                                    {{$employeePersonal->religions ? $employeePersonal->religions->name: "N/A"}}
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-md-2"><strong>Blood Group:</strong></div>
                                                                <div class="col-md-4 text-muted">
                                                                    {{$employeePersonal->bloodGroups ? $employeePersonal->bloodGroups->name: "N/A"}}
                                                                </div>
                                                                <div class="col-md-2"><strong>Joining Date:</strong></div>
                                                                <div class="col-md-4 text-muted">
                                                                    {{ $employeePersonal->payRollInformation->joining_date ? \Carbon\Carbon::parse($employeePersonal->payRollInformation->joining_date)->format('d M Y') : '' }}
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-md-2"><strong>Mobile:</strong></div>
                                                                <div class="col-md-4 text-muted">
                                                                    <a href="tel:{{$employeePersonal->contact->contact_number ?? ''}}" class="client-info">
                                                                        {{$employeePersonal->contact->contact_number ?? ''}}
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-2"><strong>E-mail:</strong></div>
                                                                <div class="col-md-4 text-muted">
                                                                    <a href="mailto:{{$employeePersonal->contact->email ?? ''}}" class="client-info">
                                                                        {{$employeePersonal->contact->email ?? ''}}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-md-2"><strong>Location:</strong></div>
                                                                <div class="col-md-10 text-muted">
                                                                    {{$employeePersonal->contact->pres_add ?? ''}},
                                                                    {{$employeePersonal->contact->district ?? ''}} -
                                                                    {{$employeePersonal->contact->postal_code ?? ''}}
                                                                </div>
                                                            </div>
                                                    <div class="row">
                                                        <div class="col-6 col-md-4">
                                                            <div class="d-flex mt-4">
                                                                <div
                                                                    class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                                    <div
                                                                        class="avatar-title bg-light rounded-circle fs-16 text-primary material-shadow">
                                                                        <i class="fas fa-user-graduate fs-2" style="color: #120b72c2;"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="mb-1">Designation :</p>
                                                                    <h6 class="text-truncate mb-0">{{$employeePersonal->officialInformation ? $employeePersonal->officialInformation->designation ? $employeePersonal->officialInformation->designation->designation_name : "N/A" : "N/A" }}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-6 col-md-4">
                                                            <div class="d-flex mt-4">
                                                                <div
                                                                    class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                                    <div
                                                                        class="avatar-title bg-light rounded-circle fs-16 text-primary material-shadow">
                                                                        <i class="fas fa-share-alt fs-2" style="color: #120b72c2;"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="mb-1">Department :</p>
                                                                    <a href="#" class="text-black mb-0">{{ $employeePersonal->officialInformation ? $employeePersonal->officialInformation->department ? $employeePersonal->officialInformation->department->department_name : "N/A" : "N/A" }}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                                <!--end card-body-->
                                            </div><!-- end card -->

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header align-items-center d-flex">
                                                            <h4 class="card-title mb-0  me-2">Qualifications</h4>
                                                            <div class="flex-shrink-0 ms-auto">
                                                                <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs border-bottom-0"
                                                                    role="tablist">

                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" data-bs-toggle="tab"
                                                                            href="#experience" role="tab">
                                                                            Experience
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-bs-toggle="tab"
                                                                            href="#training" role="tab">
                                                                            Training
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-bs-toggle="tab"
                                                                            href="#education" role="tab">
                                                                            Education
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="tab-content text-muted">

                                                                <div class="tab-pane active" id="experience" role="tabpanel">
                                                                    <div class="profile-timeline">
                                                                        <div class="accordion accordion-flush"
                                                                            id="experienceExample">
                                                                            <div class="container mt-4">
                                                                                @if ($employeePersonal->employeeExperiences)
                                                                                <div class="row g-3">
                                                                                    @foreach ($employeePersonal->employeeExperiences as $employeeExperience)
                                                                                    <!-- employeePersonal Experience Card -->
                                                                                    <div class="col-md-6 col-lg-6">
                                                                                        <div class="card shadow-sm">
                                                                                            <div class="card-header bg-info text-white text-center">
                                                                                                <h5 class="mb-0">{{$employeeExperience->job_position}} - {{$employeeExperience->company_name}}</h5>
                                                                                            </div>
                                                                                            <div class="card-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Years of Experience:</strong></div>
                                                                                                    <div class="col-7">{{$employeeExperience->years_of_experience}} Years</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Projects:</strong></div>
                                                                                                    <div class="col-7">{{$employeeExperience->projects}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Duration:</strong></div>
                                                                                                    <div class="col-7">{{$employeeExperience->duration}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>To Date:</strong></div>
                                                                                                    <div class="col-7">{{ \Carbon\Carbon::parse($employeeExperience->to_date)->format('d M Y') }}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>From Date:</strong></div>
                                                                                                    <div class="col-7">{{ \Carbon\Carbon::parse($employeeExperience->from_date)->format('d M Y') }}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Responsibilities:</strong></div>
                                                                                                    <div class="col-7">{{$employeeExperience->job_respons}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Department:</strong></div>
                                                                                                    <div class="col-7">{{$employeeExperience->department}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Job Position:</strong></div>
                                                                                                    <div class="col-7">{{$employeeExperience->job_position}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Company:</strong></div>
                                                                                                    <div class="col-7">{{$employeeExperience->company_name}}</div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                @endif

                                                                            </div>
                                                                        </div>
                                                                        <!--end accordion-->
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="training" role="tabpanel">
                                                                    <div class="profile-timeline">
                                                                        <div class="accordion accordion-flush"
                                                                            id="trainingExample">
                                                                            <div class="container mt-4">
                                                                                @if ($employeePersonal->employeeTrainings)
                                                                                <div class="row g-3">
                                                                                    @foreach ($employeePersonal->employeeTrainings as $employeeTraining)
                                                                                    <!-- Training Card -->
                                                                                    <div class="col-md-6 col-lg-6">
                                                                                        <div class="card border-info shadow-sm">
                                                                                            <div class="card-header bg-info text-white text-center">
                                                                                                <h5 class="mb-0">{{$employeeTraining->course_title}} - {{$employeeTraining->train_type}}</h5>
                                                                                            </div>
                                                                                            <div class="card-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Course Title:</strong></div>
                                                                                                    <div class="col-7">{{$employeeTraining->course_title}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Institute Name:</strong></div>
                                                                                                    <div class="col-7">{{$employeeTraining->institute_name}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Year:</strong></div>
                                                                                                    <div class="col-7">{{$employeeTraining->year}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Course Start:</strong></div>
                                                                                                    <div class="col-7">{{ \Carbon\Carbon::parse($employeeTraining->course_start)->format('d M Y') }}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Course End:</strong></div>
                                                                                                    <div class="col-7">{{ \Carbon\Carbon::parse($employeeTraining->course_end)->format('d M Y') }}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Duration:</strong></div>
                                                                                                    <div class="col-7">{{$employeeTraining->course_duration}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Result:</strong></div>
                                                                                                    <div class="col-7">{{$employeeTraining->result}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Trainer/Resource:</strong></div>
                                                                                                    <div class="col-7">{{$employeeTraining->resource}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Institute Address:</strong></div>
                                                                                                    <div class="col-7">{{$employeeTraining->institute_address}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Description:</strong></div>
                                                                                                    <div class="col-7">{{$employeeTraining->description}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Training Type:</strong></div>
                                                                                                    <div class="col-7">{{$employeeTraining->train_type}}</div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                @endif

                                                                            </div>
                                                                        </div>
                                                                        <!--end accordion-->
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="education" role="tabpanel">
                                                                    <div class="profile-timeline">
                                                                        <div class="accordion accordion-flush"
                                                                            id="educationExample">
                                                                            <div class="container mt-4">
                                                                                @if ($employeePersonal->employeeEducations)
                                                                                <div class="row g-3">
                                                                                    @foreach ($employeePersonal->employeeEducations as $employeeEducation)
                                                                                    <!-- Education Card -->
                                                                                    <div class="col-md-6 col-lg-6">
                                                                                        <div class="card shadow-sm">
                                                                                            <div class="card-header bg-info text-white text-center">
                                                                                                <h5 class="mb-0">{{$employeeEducation->educationLevel->name ?? ''}}- {{$employeeEducation->group_major_subject ?? ''}} [{{$employeeEducation->educationType->name ?? ''}}]</h5>
                                                                                            </div>
                                                                                            <div class="card-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Institution:</strong></div>
                                                                                                    <div class="col-7">{{$employeeEducation->institute_name}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Board:</strong></div>
                                                                                                    <div class="col-7">{{$employeeEducation->board_university}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Group:</strong></div>
                                                                                                    <div class="col-7">{{$employeeEducation->group_major_subject ?? ''}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Passing Year:</strong></div>
                                                                                                    <div class="col-7">{{$employeeEducation->passing_year}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Result:</strong></div>
                                                                                                    <div class="col-7">{{$employeeEducation->result_university}}</div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                @endif

                                                                            </div>
                                                                        </div>
                                                                        <!--end accordion-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- end card body -->
                                                    </div><!-- end card -->
                                                </div><!-- end col -->
                                            </div><!-- end row -->



                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header align-items-center d-flex">
                                                            <h4 class="card-title mb-0  me-2">Connections</h4>
                                                            <div class="flex-shrink-0 ms-auto">
                                                                <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs border-bottom-0"
                                                                    role="tablist">

                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" data-bs-toggle="tab"
                                                                            href="#reference" role="tab">
                                                                            Reference
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-bs-toggle="tab"
                                                                            href="#granter" role="tab">
                                                                            Granter
                                                                        </a>
                                                                    </li>
                                                                    @if ($employeePersonal->marital_status == "Married")
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-bs-toggle="tab"
                                                                            href="#spouse" role="tab">
                                                                            Spouse
                                                                        </a>
                                                                    </li>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="tab-content text-muted">

                                                                <div class="tab-pane active" id="reference" role="tabpanel">
                                                                    <div class="profile-timeline">
                                                                        <div class="accordion accordion-flush"
                                                                            id="referenceExample">
                                                                            <div class="container mt-4">
                                                                                @if ($employeePersonal->employeeReferences)
                                                                                <div class="row g-3">
                                                                                    @foreach ($employeePersonal->employeeReferences as $index => $employeeReference)
                                                                                    <!-- employee reference Card -->
                                                                                    <div class="col-md-6 col-lg-6">
                                                                                        <div class="card shadow-sm">
                                                                                            <div class="card-header bg-info text-white text-center">
                                                                                                <h5 class="mb-0">Reference - {{$index+1}}</h5>
                                                                                            </div>
                                                                                            <div class="card-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Name:</strong></div>
                                                                                                    <div class="col-7">{{$employeeReference->reference_name}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Relation:</strong></div>
                                                                                                    <div class="col-7">{{$employeeReference->relations->name}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Contact Number:</strong></div>
                                                                                                    <div class="col-7">
                                                                                                        <a href="tel:{{$employeeReference->reference_contact_number ?? ''}}" style="color: #2a2f5b;">
                                                                                                            {{$employeeReference->reference_contact_number ?? ''}}
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>ID Number:</strong></div>
                                                                                                    <div class="col-7">{{$employeeReference->reference_id_number}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Address:</strong></div>
                                                                                                    <div class="col-7">{{$employeeReference->reference_address}}</div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                @endif

                                                                            </div>
                                                                        </div>
                                                                        <!--end accordion-->
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="granter" role="tabpanel">
                                                                    <div class="profile-timeline">
                                                                        <div class="accordion accordion-flush"
                                                                            id="granterExample">
                                                                            <div class="container mt-4">
                                                                                @if ($employeePersonal->employeeGranters)
                                                                                <div class="row g-3">
                                                                                    @foreach ($employeePersonal->employeeGranters as $index => $employeeGranter)
                                                                                    <!-- employee granter Card -->
                                                                                    <div class="col-md-6 col-lg-6">
                                                                                        <div class="card shadow-sm">
                                                                                            <div class="card-header bg-info text-white text-center">
                                                                                                <h5 class="mb-0">Granter - {{$index+1}}</h5>
                                                                                            </div>
                                                                                            <div class="card-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Name:</strong></div>
                                                                                                    <div class="col-7">{{$employeeGranter->granter_name}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Relation:</strong></div>
                                                                                                    <div class="col-7">{{$employeeGranter->relations->name}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Contact Number:</strong></div>
                                                                                                    <div class="col-7">
                                                                                                        <a href="tel:{{$employeeGranter->granter_contact_number ?? ''}}" style="color: #2a2f5b;">
                                                                                                            {{$employeeGranter->granter_contact_number ?? ''}}
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>ID Number:</strong></div>
                                                                                                    <div class="col-7">{{$employeeGranter->granter_id_number}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Address:</strong></div>
                                                                                                    <div class="col-7">{{$employeeGranter->granter_address}}</div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                @endif

                                                                            </div>
                                                                        </div>
                                                                        <!--end accordion-->
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="spouse" role="tabpanel">
                                                                    <div class="profile-timeline">
                                                                        <div class="accordion accordion-flush"
                                                                            id="spouseExample">
                                                                            <div class="container mt-4">
                                                                                <div class="row g-3">
                                                                                    <div class="col-md-6 col-lg-6">
                                                                                        <div class="card shadow-sm">
                                                                                            <div class="card-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Name:</strong></div>
                                                                                                    <div class="col-7">{{$employeePersonal->spouse_name}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Occupation:</strong></div>
                                                                                                    <div class="col-7">{{$employeePersonal->spouse_occupation}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Organization:</strong></div>
                                                                                                    <div class="col-7">{{$employeePersonal->spouse_organization}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Contact Number:</strong></div>
                                                                                                    <div class="col-7">
                                                                                                        <a href="tel:{{$employeePersonal->spouse_mobile ?? ''}}" style="color: #2a2f5b;">
                                                                                                            {{$employeePersonal->spouse_mobile ?? ''}}
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>ID Number:</strong></div>
                                                                                                    <div class="col-7">{{$employeePersonal->spouse_nid_number}}</div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-5"><strong>Date of Birth:</strong></div>
                                                                                                    <div class="col-7">{{ $employeePersonal->spouse_dob ? \Carbon\Carbon::parse($employeePersonal->spouse_dob)->format('d M Y') : '' }}</div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--end accordion-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- end card body -->
                                                    </div><!-- end card -->
                                                </div><!-- end col -->
                                            </div><!-- end row -->

                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end tab-pane-->

                                <div class="tab-pane fade" id="documents" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-4">
                                                <h5 class="card-title flex-grow-1 mb-0">Documents</h5>
                                                <div class="flex-shrink-0">
                                                    @php
                                                            $hasDocuments = false;
                                                            if ($employeePersonal->employeeDocument != null) {
                                                                $hasDocuments = true;
                                                            }

                                                            if ($employeePersonal->spouse_nid != null) {
                                                                $hasDocuments = true;
                                                            }

                                                            if ($employeePersonal->employeeOtherDocuments->isNotEmpty()) {
                                                                $hasDocuments = true;
                                                            }

                                                            if ($employeePersonal->employeeEducations->isNotEmpty()) {
                                                                foreach ($employeePersonal->employeeEducations as $employeeEducation) {
                                                                    if ($employeeEducation->education_doc) {
                                                                        $hasDocuments = true;
                                                                    }
                                                                }
                                                            }

                                                            if ($employeePersonal->employeeTrainings->isNotEmpty()) {
                                                                foreach ($employeePersonal->employeeTrainings as $employeeTraining) {
                                                                    if ($employeeTraining->training_doc) {
                                                                        $hasDocuments = true;
                                                                    }
                                                                }
                                                            }

                                                            if ($employeePersonal->employeeExperiences->isNotEmpty()) {
                                                                foreach ($employeePersonal->employeeExperiences as $employeeExperience) {
                                                                    if ($employeeExperience->training_doc) {
                                                                        $hasDocuments = true;
                                                                    }
                                                                }
                                                            }
                                                        @endphp

                                                        @if ($hasDocuments)
                                                            <a class="btn btn-danger" href="{{ route('employee-profile.downloadzip.file', $employeePersonal->id) }}">Download All Files</a>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless align-middle mb-0">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th scope="col">File Name</th>
                                                                    <th scope="col">Type</th>
                                                                    <th scope="col">Size</th>
                                                                    <th scope="col">Upload Date</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th colspan="5"><h5>Documents</h5></th>
                                                                </tr>
                                                                @if ($employeePersonal->employeeDocument != null)
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-primary-subtle text-primary rounded fs-20 material-shadow">
                                                                                    @php
                                                                                        $fileExtension = pathinfo($employeePersonal->employeeDocument->profile_picture, PATHINFO_EXTENSION);
                                                                                    @endphp

                                                                                    @if ($employeePersonal->employeeDocument == null || $employeePersonal->employeeDocument->profile_picture == null)
                                                                                        <img src="{{ asset('admin') }}/assets/img/demo-user.jpg" alt="user-img" class="img-thumbnail" />
                                                                                    @elseif(!in_array(strtolower($fileExtension), ['jpg', 'png', 'jpeg', 'gif']))
                                                                                        <i class="fas fa-file fs-10"></i>
                                                                                    @else
                                                                                        <img src="{{ asset('storage/'. $employeePersonal->employeeDocument->profile_picture) }}" alt="user-img" class="img-thumbnail" />
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h6 class="fs-15 mb-0">
                                                                                    <a href="javascript:void(0)">
                                                                                        @if (!empty($employeePersonal->employeeDocument->profile_picture))
                                                                                            {{ basename($employeePersonal->employeeDocument->profile_picture) }}
                                                                                        @else
                                                                                            No Profile Picture found
                                                                                        @endif
                                                                                    </a>
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->employeeDocument->profile_picture))
                                                                            {{ strtoupper(pathinfo($employeePersonal->employeeDocument->profile_picture, PATHINFO_EXTENSION)) }} File
                                                                        @else
                                                                            No file found
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->employeeDocument->profile_picture))
                                                                            @php
                                                                                $filePath = storage_path('app/public/' . $employeePersonal->employeeDocument->profile_picture);
                                                                            @endphp

                                                                            @if (file_exists($filePath))
                                                                                {{ round(filesize($filePath) / (1024 * 1024), 2) }} MB
                                                                            @else
                                                                                <p>File not found</p>
                                                                            @endif
                                                                        @else
                                                                            <p>No profile picture available</p>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($employeePersonal->employeeDocument)
                                                                            @if($employeePersonal->employeeDocument->profile_picture)
                                                                                {{ $employeePersonal->employeeDocument->updated_at->format('d M Y') }}
                                                                            @else
                                                                                Not Uploaded yet
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink15" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="fas fa-bars"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->employeeDocument->profile_picture) }}" target="_blank"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->employeeDocument->profile_picture) }}" download><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-primary-subtle text-primary rounded fs-20 material-shadow">
                                                                                    @php
                                                                                        $fileExtension = pathinfo($employeePersonal->employeeDocument->signature, PATHINFO_EXTENSION);
                                                                                    @endphp

                                                                                    @if ($employeePersonal->employeeDocument == null || $employeePersonal->employeeDocument->signature == null)
                                                                                        <img src="{{ asset('admin') }}/assets/img/demo-user.jpg" alt="user-img" class="img-thumbnail" />
                                                                                        @elseif(!in_array(strtolower($fileExtension), ['jpg', 'png', 'jpeg', 'gif']))
                                                                                        <i class="fas fa-file fs-10"></i>
                                                                                    @else
                                                                                        <img src="{{ asset('storage/' . $employeePersonal->employeeDocument->signature) }}" alt="user-img" class="img-thumbnail" />
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h6 class="fs-15 mb-0">
                                                                                    <a href="javascript:void(0)">
                                                                                        @if (!empty($employeePersonal->employeeDocument->signature))
                                                                                            {{ basename($employeePersonal->employeeDocument->signature) }}
                                                                                        @else
                                                                                            No signature found
                                                                                        @endif
                                                                                    </a>
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->employeeDocument->signature))
                                                                            {{ strtoupper(pathinfo($employeePersonal->employeeDocument->signature, PATHINFO_EXTENSION)) }} File
                                                                        @else
                                                                            No file found
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->employeeDocument->signature))
                                                                            @php
                                                                                $filePath = storage_path('app/public/' . $employeePersonal->employeeDocument->signature);
                                                                            @endphp

                                                                            @if (file_exists($filePath))
                                                                                {{ round(filesize($filePath) / (1024 * 1024), 2) }} MB
                                                                            @else
                                                                                <p>File not found</p>
                                                                            @endif
                                                                        @else
                                                                            <p>No signature available</p>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($employeePersonal->employeeDocument)
                                                                            @if($employeePersonal->employeeDocument->signature)
                                                                                {{ $employeePersonal->employeeDocument->updated_at->format('d M Y') }}
                                                                            @else
                                                                                Not Uploaded yet
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink15" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="fas fa-bars"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->employeeDocument->signature) }}" target="_blank"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->employeeDocument->signature) }}" download><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-primary-subtle text-primary rounded fs-20 material-shadow">
                                                                                    @php
                                                                                        $fileExtension = pathinfo($employeePersonal->employeeDocument->nid_card_front, PATHINFO_EXTENSION);
                                                                                    @endphp

                                                                                    @if ($employeePersonal->employeeDocument == null || $employeePersonal->employeeDocument->nid_card_front == null)
                                                                                        <img src="{{ asset('admin') }}/assets/img/demo-user.jpg" alt="user-img" class="img-thumbnail" />
                                                                                    @elseif(!in_array(strtolower($fileExtension), ['jpg', 'png', 'jpeg', 'gif']))
                                                                                        <i class="fas fa-file fs-10"></i>
                                                                                    @else
                                                                                        <img src="{{ asset('storage/' . $employeePersonal->employeeDocument->nid_card_front) }}" alt="user-img" class="img-thumbnail" />
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h6 class="fs-15 mb-0">
                                                                                    <a href="javascript:void(0)">
                                                                                        @if (!empty($employeePersonal->employeeDocument->nid_card_front))
                                                                                            {{ basename($employeePersonal->employeeDocument->nid_card_front) }}
                                                                                        @else
                                                                                            No NID card front found
                                                                                        @endif
                                                                                    </a>
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->employeeDocument->nid_card_front))
                                                                            {{ strtoupper(pathinfo($employeePersonal->employeeDocument->nid_card_front, PATHINFO_EXTENSION)) }} File
                                                                        @else
                                                                            No file found
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->employeeDocument->nid_card_front))
                                                                            @php
                                                                                $filePath = storage_path('app/public/' . $employeePersonal->employeeDocument->nid_card_front);
                                                                            @endphp

                                                                            @if (file_exists($filePath))
                                                                                {{ round(filesize($filePath) / (1024 * 1024), 2) }} MB
                                                                            @else
                                                                                <p>File not found</p>
                                                                            @endif
                                                                        @else
                                                                            <p>No NID card front available</p>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($employeePersonal->employeeDocument)
                                                                            @if($employeePersonal->employeeDocument->nid_card_front)
                                                                                {{ $employeePersonal->employeeDocument->updated_at->format('d M Y') }}
                                                                            @else
                                                                                Not Uploaded yet
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink15" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="fas fa-bars"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->employeeDocument->nid_card_front) }}" target="_blank"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->employeeDocument->nid_card_front) }}" download><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-primary-subtle text-primary rounded fs-20 material-shadow">
                                                                                    @php
                                                                                        $fileExtension = pathinfo($employeePersonal->employeeDocument->nid_card_back, PATHINFO_EXTENSION);
                                                                                    @endphp

                                                                                    @if ($employeePersonal->employeeDocument == null || $employeePersonal->employeeDocument->nid_card_back == null)
                                                                                        <img src="{{ asset('admin') }}/assets/img/demo-user.jpg" alt="user-img" class="img-thumbnail" />
                                                                                    @elseif(!in_array(strtolower($fileExtension), ['jpg', 'png', 'jpeg', 'gif']))
                                                                                        <i class="fas fa-file fs-10"></i>
                                                                                    @else
                                                                                        <img src="{{ asset('storage/' . $employeePersonal->employeeDocument->nid_card_back) }}" alt="user-img" class="img-thumbnail" />
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h6 class="fs-15 mb-0">
                                                                                    <a href="javascript:void(0)">
                                                                                        @if (!empty($employeePersonal->employeeDocument->nid_card_back))
                                                                                            {{ basename($employeePersonal->employeeDocument->nid_card_back) }}
                                                                                        @else
                                                                                            No NID card back found
                                                                                        @endif
                                                                                    </a>
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->employeeDocument->nid_card_back))
                                                                            {{ strtoupper(pathinfo($employeePersonal->employeeDocument->nid_card_back, PATHINFO_EXTENSION)) }} File
                                                                        @else
                                                                            No file found
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->employeeDocument->nid_card_back))
                                                                            @php
                                                                                $filePath = storage_path('app/public/' . $employeePersonal->employeeDocument->nid_card_back);
                                                                            @endphp

                                                                            @if (file_exists($filePath))
                                                                                {{ round(filesize($filePath) / (1024 * 1024), 2) }} MB
                                                                            @else
                                                                                <p>File not found</p>
                                                                            @endif
                                                                        @else
                                                                            <p>No NID card back available</p>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($employeePersonal->employeeDocument)
                                                                            @if($employeePersonal->employeeDocument->nid_card_back)
                                                                                {{ $employeePersonal->employeeDocument->updated_at->format('d M Y') }}
                                                                            @else
                                                                                Not Uploaded yet
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink15" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="fas fa-bars"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->employeeDocument->nid_card_back) }}" target="_blank"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->employeeDocument->nid_card_back) }}" download><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-primary-subtle text-primary rounded fs-20 material-shadow">
                                                                                    @php
                                                                                        $fileExtension = pathinfo($employeePersonal->employeeDocument->cv, PATHINFO_EXTENSION);
                                                                                    @endphp

                                                                                    @if ($employeePersonal->employeeDocument == null || $employeePersonal->employeeDocument->cv == null)
                                                                                        <img src="{{ asset('admin') }}/assets/img/not-uploaded.jpeg" alt="user-img" class="img-thumbnail" />
                                                                                    @elseif(!in_array(strtolower($fileExtension), ['jpg', 'png', 'jpeg', 'gif']))
                                                                                        <!-- Displaying a file icon for PDF or ZIP -->
                                                                                        <i class="fas fa-file fs-10"></i>
                                                                                    @else
                                                                                        <img src="{{ asset('storage/' . $employeePersonal->employeeDocument->cv) }}" alt="user-img" class="img-thumbnail" />
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h6 class="fs-15 mb-0">
                                                                                    <a href="javascript:void(0)">
                                                                                        @if (!empty($employeePersonal->employeeDocument->cv))
                                                                                            {{ basename($employeePersonal->employeeDocument->cv) }}
                                                                                        @else
                                                                                            No CV found
                                                                                        @endif
                                                                                    </a>
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->employeeDocument->cv))
                                                                            {{ strtoupper(pathinfo($employeePersonal->employeeDocument->cv, PATHINFO_EXTENSION)) }} File
                                                                        @else
                                                                            No file found
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->employeeDocument->cv))
                                                                            @php
                                                                                $filePath = storage_path('app/public/' . $employeePersonal->employeeDocument->cv);
                                                                            @endphp

                                                                            @if (file_exists($filePath))
                                                                                {{ round(filesize($filePath) / (1024 * 1024), 2) }} MB
                                                                            @else
                                                                                <p>File not found</p>
                                                                            @endif
                                                                        @else
                                                                            <p>No CV available</p>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($employeePersonal->employeeDocument)
                                                                            @if($employeePersonal->employeeDocument->cv)
                                                                                {{ $employeePersonal->employeeDocument->updated_at->format('d M Y') }}
                                                                            @else
                                                                                Not Uploaded yet
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink15" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="fas fa-bars"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->employeeDocument->cv) }}" target="_blank"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->employeeDocument->cv) }}" download><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-primary-subtle text-primary rounded fs-20 material-shadow">
                                                                                    @php
                                                                                        $fileExtension = pathinfo($employeePersonal->employeeDocument->trade_licence, PATHINFO_EXTENSION);
                                                                                    @endphp

                                                                                    @if ($employeePersonal->employeeDocument == null || $employeePersonal->employeeDocument->trade_licence == null)
                                                                                        <img src="{{ asset('admin') }}/assets/img/not-uploaded.jpeg" alt="user-img" class="img-thumbnail" />
                                                                                    @elseif(!in_array(strtolower($fileExtension), ['jpg', 'png', 'jpeg', 'gif']))
                                                                                        <!-- Displaying a file icon for PDF or ZIP -->
                                                                                        <i class="fas fa-file fs-10"></i>
                                                                                    @else
                                                                                        <img src="{{ asset('storage/' . $employeePersonal->employeeDocument->trade_licence) }}" alt="user-img" class="img-thumbnail" />
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h6 class="fs-15 mb-0">
                                                                                    <a href="javascript:void(0)">
                                                                                        @if (!empty($employeePersonal->employeeDocument->trade_licence))
                                                                                            {{ basename($employeePersonal->employeeDocument->trade_licence) }}
                                                                                        @else
                                                                                            No trade licence found
                                                                                        @endif
                                                                                    </a>
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->employeeDocument->trade_licence))
                                                                            {{ strtoupper(pathinfo($employeePersonal->employeeDocument->trade_licence, PATHINFO_EXTENSION)) }} File
                                                                        @else
                                                                            No file found
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->employeeDocument->trade_licence))
                                                                            @php
                                                                                $filePath = storage_path('app/public/' . $employeePersonal->employeeDocument->trade_licence);
                                                                            @endphp

                                                                            @if (file_exists($filePath))
                                                                                {{ round(filesize($filePath) / (1024 * 1024), 2) }} MB
                                                                            @else
                                                                                <p>File not found</p>
                                                                            @endif
                                                                        @else
                                                                            <p>No trade licence available</p>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($employeePersonal->employeeDocument)
                                                                            @if($employeePersonal->employeeDocument->trade_licence)
                                                                                {{ $employeePersonal->employeeDocument->updated_at->format('d M Y') }}
                                                                            @else
                                                                                Not Uploaded yet
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink15" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="fas fa-bars"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->employeeDocument->trade_licence) }}" target="_blank"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->employeeDocument->trade_licence) }}" download><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-primary-subtle text-primary rounded fs-20 material-shadow">
                                                                                    @php
                                                                                        $fileExtension = pathinfo($employeePersonal->employeeDocument->vat, PATHINFO_EXTENSION);
                                                                                    @endphp

                                                                                    @if ($employeePersonal->employeeDocument == null || $employeePersonal->employeeDocument->vat == null)
                                                                                        <img src="{{ asset('admin') }}/assets/img/not-uploaded.jpeg" alt="user-img" class="img-thumbnail" />
                                                                                    @elseif(!in_array(strtolower($fileExtension), ['jpg', 'png', 'jpeg', 'gif']))
                                                                                        <!-- Displaying a file icon for PDF or ZIP -->
                                                                                        <i class="fas fa-file fs-10"></i>
                                                                                    @else
                                                                                        <img src="{{ asset('storage/' . $employeePersonal->employeeDocument->vat) }}" alt="user-img" class="img-thumbnail" />
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h6 class="fs-15 mb-0">
                                                                                    <a href="javascript:void(0)">
                                                                                        @if (!empty($employeePersonal->employeeDocument->vat))
                                                                                            {{ basename($employeePersonal->employeeDocument->vat) }}
                                                                                        @else
                                                                                            No vat found
                                                                                        @endif
                                                                                    </a>
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->employeeDocument->vat))
                                                                            {{ strtoupper(pathinfo($employeePersonal->employeeDocument->vat, PATHINFO_EXTENSION)) }} File
                                                                        @else
                                                                            No file found
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->employeeDocument->vat))
                                                                            @php
                                                                                $filePath = storage_path('app/public/' . $employeePersonal->employeeDocument->vat);
                                                                            @endphp

                                                                            @if (file_exists($filePath))
                                                                                {{ round(filesize($filePath) / (1024 * 1024), 2) }} MB
                                                                            @else
                                                                                <p>File not found</p>
                                                                            @endif
                                                                        @else
                                                                            <p>No vat available</p>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($employeePersonal->employeeDocument)
                                                                            @if($employeePersonal->employeeDocument->vat)
                                                                                {{ $employeePersonal->employeeDocument->updated_at->format('d M Y') }}
                                                                            @else
                                                                                Not Uploaded yet
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink15" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="fas fa-bars"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->employeeDocument->vat) }}" target="_blank"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->employeeDocument->vat) }}" download><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-primary-subtle text-primary rounded fs-20 material-shadow">
                                                                                    @php
                                                                                        $fileExtension = pathinfo($employeePersonal->employeeDocument->tax, PATHINFO_EXTENSION);
                                                                                    @endphp

                                                                                    @if ($employeePersonal->employeeDocument == null || $employeePersonal->employeeDocument->tax == null)
                                                                                        <img src="{{ asset('admin') }}/assets/img/not-uploaded.jpeg" alt="user-img" class="img-thumbnail" />
                                                                                    @elseif(!in_array(strtolower($fileExtension), ['jpg', 'png', 'jpeg', 'gif']))
                                                                                        <!-- Displaying a file icon for PDF or ZIP -->
                                                                                        <i class="fas fa-file fs-10"></i>
                                                                                    @else
                                                                                        <img src="{{ asset('storage/' . $employeePersonal->employeeDocument->tax) }}" alt="user-img" class="img-thumbnail" />
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h6 class="fs-15 mb-0">
                                                                                    <a href="javascript:void(0)">
                                                                                        @if (!empty($employeePersonal->employeeDocument->tax))
                                                                                            {{ basename($employeePersonal->employeeDocument->tax) }}
                                                                                        @else
                                                                                            No tax found
                                                                                        @endif
                                                                                    </a>
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->employeeDocument->tax))
                                                                            {{ strtoupper(pathinfo($employeePersonal->employeeDocument->tax, PATHINFO_EXTENSION)) }} File
                                                                        @else
                                                                            No file found
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->employeeDocument->tax))
                                                                            @php
                                                                                $filePath = storage_path('app/public/' . $employeePersonal->employeeDocument->tax);
                                                                            @endphp

                                                                            @if (file_exists($filePath))
                                                                                {{ round(filesize($filePath) / (1024 * 1024), 2) }} MB
                                                                            @else
                                                                                <p>File not found</p>
                                                                            @endif
                                                                        @else
                                                                            <p>No tax available</p>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($employeePersonal->employeeDocument)
                                                                            @if($employeePersonal->employeeDocument->tax)
                                                                                {{ $employeePersonal->employeeDocument->updated_at->format('d M Y') }}
                                                                            @else
                                                                                Not Uploaded yet
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink15" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="fas fa-bars"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->employeeDocument->tax) }}" target="_blank"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->employeeDocument->tax) }}" download><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-primary-subtle text-primary rounded fs-20 material-shadow">
                                                                                    @php
                                                                                        $fileExtension = pathinfo($employeePersonal->employeeDocument->gong_picture, PATHINFO_EXTENSION);
                                                                                    @endphp

                                                                                    @if ($employeePersonal->employeeDocument == null || $employeePersonal->employeeDocument->gong_picture == null)
                                                                                        <img src="{{ asset('admin') }}/assets/img/not-uploaded.jpeg" alt="user-img" class="img-thumbnail" />
                                                                                    @elseif(!in_array(strtolower($fileExtension), ['jpg', 'png', 'jpeg', 'gif']))
                                                                                        <!-- Displaying a file icon for PDF or ZIP -->
                                                                                        <i class="fas fa-file fs-10"></i>
                                                                                    @else
                                                                                        <img src="{{ asset('storage/' . $employeePersonal->employeeDocument->gong_picture) }}" alt="user-img" class="img-thumbnail" />
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h6 class="fs-15 mb-0">
                                                                                    <a href="javascript:void(0)">
                                                                                        @if (!empty($employeePersonal->employeeDocument->gong_picture))
                                                                                            {{ basename($employeePersonal->employeeDocument->gong_picture) }}
                                                                                        @else
                                                                                            No gong picture found
                                                                                        @endif
                                                                                    </a>
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->employeeDocument->gong_picture))
                                                                            {{ strtoupper(pathinfo($employeePersonal->employeeDocument->gong_picture, PATHINFO_EXTENSION)) }} File
                                                                        @else
                                                                            No file found
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->employeeDocument->gong_picture))
                                                                            @php
                                                                                $filePath = storage_path('app/public/' . $employeePersonal->employeeDocument->gong_picture);
                                                                            @endphp

                                                                            @if (file_exists($filePath))
                                                                                {{ round(filesize($filePath) / (1024 * 1024), 2) }} MB
                                                                            @else
                                                                                <p>File not found</p>
                                                                            @endif
                                                                        @else
                                                                            <p>No gong picture available</p>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($employeePersonal->employeeDocument)
                                                                            @if($employeePersonal->employeeDocument->gong_picture)
                                                                                {{ $employeePersonal->employeeDocument->updated_at->format('d M Y') }}
                                                                            @else
                                                                                Not Uploaded yet
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink15" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="fas fa-bars"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->employeeDocument->gong_picture) }}" target="_blank"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->employeeDocument->gong_picture) }}" download><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @endif
                                                                <tr>
                                                                    <th colspan="5"><h5>Spouse Documents</h5></th>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-primary-subtle text-primary rounded fs-20 material-shadow">
                                                                                    @php
                                                                                        $fileExtension = pathinfo($employeePersonal->spouse_nid, PATHINFO_EXTENSION);
                                                                                    @endphp

                                                                                    @if ($employeePersonal->spouse_nid == null)
                                                                                        <img src="{{ asset('admin') }}/assets/img/not-uploaded.jpeg" alt="user-img" class="img-thumbnail" />
                                                                                    @elseif(!in_array(strtolower($fileExtension), ['jpg', 'png', 'jpeg', 'gif']))
                                                                                        <!-- Displaying a file icon for PDF or ZIP -->
                                                                                        <i class="fas fa-file fs-10"></i>
                                                                                    @else
                                                                                        <img src="{{ asset('storage/' . $employeePersonal->spouse_nid) }}" alt="user-img" class="img-thumbnail" />
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h6 class="fs-15 mb-0">
                                                                                    <a href="javascript:void(0)">
                                                                                        @if (!empty($employeePersonal->spouse_nid))
                                                                                            {{ basename($employeePersonal->spouse_nid) }}
                                                                                        @else
                                                                                            No Spouse NID found
                                                                                        @endif
                                                                                    </a>
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->spouse_nid))
                                                                            {{ strtoupper(pathinfo($employeePersonal->spouse_nid, PATHINFO_EXTENSION)) }} File
                                                                        @else
                                                                            No file found
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeePersonal->spouse_nid))
                                                                            @php
                                                                                $filePath = storage_path('app/public/' . $employeePersonal->spouse_nid);
                                                                            @endphp

                                                                            @if (file_exists($filePath))
                                                                                {{ round(filesize($filePath) / (1024 * 1024), 2) }} MB
                                                                            @else
                                                                                <p>File not found</p>
                                                                            @endif
                                                                        @else
                                                                            <p>No Spouse NID available</p>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($employeePersonal->employeeDocument)
                                                                            @if($employeePersonal->spouse_nid)
                                                                                {{ $employeePersonal->employeeDocument->updated_at->format('d M Y') }}
                                                                            @else
                                                                                Not Uploaded yet
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink15" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="fas fa-bars"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->spouse_nid) }}" target="_blank"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeePersonal->spouse_nid) }}" download><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="5"><h5>Other Documents</h5></th>
                                                                </tr>
                                                                @foreach ($employeePersonal->employeeOtherDocuments as $employeeOtherDocument)
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-primary-subtle text-primary rounded fs-20 material-shadow">
                                                                                    @php
                                                                                        $fileExtension = pathinfo($employeeOtherDocument->file_path , PATHINFO_EXTENSION);
                                                                                    @endphp

                                                                                    @if ($employeeOtherDocument == null || $employeeOtherDocument->file_path  == null)
                                                                                        <img src="{{ asset('admin') }}/assets/img/not-uploaded.jpeg" alt="user-img" class="img-thumbnail" />
                                                                                    @elseif(!in_array(strtolower($fileExtension), ['jpg', 'png', 'jpeg', 'gif']))
                                                                                        <!-- Displaying a file icon for PDF or ZIP -->
                                                                                        <i class="fas fa-file fs-10"></i>
                                                                                    @else
                                                                                        <img src="{{ asset('storage/' . $employeeOtherDocument->file_path ) }}" alt="user-img" class="img-thumbnail" />
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h6 class="fs-15 mb-0">
                                                                                    <a href="javascript:void(0)">
                                                                                        @if (!empty($employeeOtherDocument->file_path ))
                                                                                            {{ basename($employeeOtherDocument->file_path ) }}
                                                                                        @else
                                                                                            No gong picture found
                                                                                        @endif
                                                                                    </a>
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeeOtherDocument->file_path ))
                                                                            {{ strtoupper(pathinfo($employeeOtherDocument->file_path , PATHINFO_EXTENSION)) }} File
                                                                        @else
                                                                            No file found
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeeOtherDocument->file_path ))
                                                                            @php
                                                                                $filePath = storage_path('app/public/' . $employeeOtherDocument->file_path );
                                                                            @endphp

                                                                            @if (file_exists($filePath))
                                                                                {{ round(filesize($filePath) / (1024 * 1024), 2) }} MB
                                                                            @else
                                                                                <p>File not found</p>
                                                                            @endif
                                                                        @else
                                                                            <p>No gong picture available</p>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($employeeOtherDocument)
                                                                            @if($employeeOtherDocument->file_path )
                                                                                {{ $employeeOtherDocument->updated_at->format('d M Y') }}
                                                                            @else
                                                                                Not Uploaded yet
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink15" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="fas fa-bars"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeeOtherDocument->file_path ) }}" target="_blank"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeeOtherDocument->file_path ) }}" download><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <th colspan="5"><h5>Educational Documents</h5></th>
                                                                </tr>
                                                                @foreach ($employeePersonal->employeeEducations as $employeeEducation)
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-primary-subtle text-primary rounded fs-20 material-shadow">
                                                                                    @php
                                                                                        $fileExtension = pathinfo($employeeEducation->education_doc , PATHINFO_EXTENSION);
                                                                                    @endphp

                                                                                    @if ($employeeEducation == null || $employeeEducation->education_doc  == null)
                                                                                        <img src="{{ asset('admin') }}/assets/img/not-uploaded.jpeg" alt="user-img" class="img-thumbnail" />
                                                                                    @elseif(!in_array(strtolower($fileExtension), ['jpg', 'png', 'jpeg', 'gif']))
                                                                                        <!-- Displaying a file icon for PDF or ZIP -->
                                                                                        <i class="fas fa-file fs-10"></i>
                                                                                    @else
                                                                                        <img src="{{ asset('storage/' . $employeeEducation->education_doc ) }}" alt="user-img" class="img-thumbnail" />
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h6 class="fs-15 mb-0">
                                                                                    <a href="javascript:void(0)">
                                                                                        @if (!empty($employeeEducation->education_doc ))
                                                                                            {{ basename($employeeEducation->education_doc ) }}
                                                                                        @else
                                                                                            No gong picture found
                                                                                        @endif
                                                                                    </a>
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeeEducation->education_doc ))
                                                                            {{ strtoupper(pathinfo($employeeEducation->education_doc , PATHINFO_EXTENSION)) }} File
                                                                        @else
                                                                            No file found
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeeEducation->education_doc ))
                                                                            @php
                                                                                $filePath = storage_path('app/public/' . $employeeEducation->education_doc );
                                                                            @endphp

                                                                            @if (file_exists($filePath))
                                                                                {{ round(filesize($filePath) / (1024 * 1024), 2) }} MB
                                                                            @else
                                                                                <p>File not found</p>
                                                                            @endif
                                                                        @else
                                                                            <p>No gong picture available</p>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($employeeEducation)
                                                                            @if($employeeEducation->education_doc )
                                                                                {{ $employeeEducation->updated_at->format('d M Y') }}
                                                                            @else
                                                                                Not Uploaded yet
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink15" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="fas fa-bars"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeeEducation->education_doc ) }}" target="_blank"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeeEducation->education_doc ) }}" download><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <th colspan="5"><h5>Training Documents</h5></th>
                                                                </tr>
                                                                @foreach ($employeePersonal->employeeTrainings as $employeeTraining)
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-primary-subtle text-primary rounded fs-20 material-shadow">
                                                                                    @php
                                                                                        $fileExtension = pathinfo($employeeTraining->training_doc , PATHINFO_EXTENSION);
                                                                                    @endphp

                                                                                    @if ($employeeTraining == null || $employeeTraining->training_doc  == null)
                                                                                        <img src="{{ asset('admin') }}/assets/img/not-uploaded.jpeg" alt="user-img" class="img-thumbnail" />
                                                                                    @elseif(!in_array(strtolower($fileExtension), ['jpg', 'png', 'jpeg', 'gif']))
                                                                                        <!-- Displaying a file icon for PDF or ZIP -->
                                                                                        <i class="fas fa-file fs-10"></i>
                                                                                    @else
                                                                                        <img src="{{ asset('storage/' . $employeeTraining->training_doc ) }}" alt="user-img" class="img-thumbnail" />
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h6 class="fs-15 mb-0">
                                                                                    <a href="javascript:void(0)">
                                                                                        @if (!empty($employeeTraining->training_doc ))
                                                                                            {{ basename($employeeTraining->training_doc ) }}
                                                                                        @else
                                                                                            No gong picture found
                                                                                        @endif
                                                                                    </a>
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeeTraining->training_doc ))
                                                                            {{ strtoupper(pathinfo($employeeTraining->training_doc , PATHINFO_EXTENSION)) }} File
                                                                        @else
                                                                            No file found
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeeTraining->training_doc ))
                                                                            @php
                                                                                $filePath = storage_path('app/public/' . $employeeTraining->training_doc );
                                                                            @endphp

                                                                            @if (file_exists($filePath))
                                                                                {{ round(filesize($filePath) / (1024 * 1024), 2) }} MB
                                                                            @else
                                                                                <p>File not found</p>
                                                                            @endif
                                                                        @else
                                                                            <p>No gong picture available</p>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($employeeTraining)
                                                                            @if($employeeTraining->training_doc )
                                                                                {{ $employeeTraining->updated_at->format('d M Y') }}
                                                                            @else
                                                                                Not Uploaded yet
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink15" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="fas fa-bars"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeeTraining->training_doc ) }}" target="_blank"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeeTraining->training_doc ) }}" download><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <th colspan="5"><h5>Experience Documents</h5></th>
                                                                </tr>
                                                                @foreach ($employeePersonal->employeeExperiences as $employeeExperience)
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm">
                                                                                <div class="avatar-title bg-primary-subtle text-primary rounded fs-20 material-shadow">
                                                                                    @php
                                                                                        $fileExtension = pathinfo($employeeExperience->experiance_doc , PATHINFO_EXTENSION);
                                                                                    @endphp

                                                                                    @if ($employeeExperience == null || $employeeExperience->experiance_doc  == null)
                                                                                        <img src="{{ asset('admin') }}/assets/img/not-uploaded.jpeg" alt="user-img" class="img-thumbnail" />
                                                                                    @elseif(!in_array(strtolower($fileExtension), ['jpg', 'png', 'jpeg', 'gif']))
                                                                                        <!-- Displaying a file icon for PDF or ZIP -->
                                                                                        <i class="fas fa-file fs-10"></i>
                                                                                    @else
                                                                                        <img src="{{ asset('storage/' . $employeeExperience->experiance_doc ) }}" alt="user-img" class="img-thumbnail" />
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h6 class="fs-15 mb-0">
                                                                                    <a href="javascript:void(0)">
                                                                                        @if (!empty($employeeExperience->experiance_doc ))
                                                                                            {{ basename($employeeExperience->experiance_doc ) }}
                                                                                        @else
                                                                                            No gong picture found
                                                                                        @endif
                                                                                    </a>
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeeExperience->experiance_doc ))
                                                                            {{ strtoupper(pathinfo($employeeExperience->experiance_doc , PATHINFO_EXTENSION)) }} File
                                                                        @else
                                                                            No file found
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if (!empty($employeeExperience->experiance_doc ))
                                                                            @php
                                                                                $filePath = storage_path('app/public/' . $employeeExperience->experiance_doc );
                                                                            @endphp

                                                                            @if (file_exists($filePath))
                                                                                {{ round(filesize($filePath) / (1024 * 1024), 2) }} MB
                                                                            @else
                                                                                <p>File not found</p>
                                                                            @endif
                                                                        @else
                                                                            <p>No gong picture available</p>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($employeeExperience)
                                                                            @if($employeeExperience->experiance_doc )
                                                                                {{ $employeeExperience->updated_at->format('d M Y') }}
                                                                            @else
                                                                                Not Uploaded yet
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink15" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="fas fa-bars"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeeExperience->experiance_doc ) }}" target="_blank"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                                <li><a class="dropdown-item" href="{{ asset('storage/' . $employeeExperience->experiance_doc ) }}" download><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
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
                                <!--end tab-pane-->
                            </div>
                            <!--end tab-content-->
                        </div>
                    </div>
                    <!--end col-->
                </div>
            </div>




        </div><!-- container-fluid -->
    </div><!-- End Page-content -->
</div>
@endsection
@push('scripts')

<script>
    function triggerFileInput() {
    document.getElementById('fileInput').click();
}

// Automatically submit the form when a file is selected
function submitForm() {
    const fileInput = document.getElementById('fileInput');
    if (fileInput.files.length > 0) {
        document.getElementById('uploadForm').submit();
    }
}
</script>
@endpush
