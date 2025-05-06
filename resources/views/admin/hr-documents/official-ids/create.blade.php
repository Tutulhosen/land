@extends('layouts.admin')
@section('title','Employees Create')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" id="employeeForm" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header project-details-card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada'></i>Create Employee</h4>
                            </div>
                        </div>
                        <div class="text-center m-3">
                            <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link active" id="line-general-tab" data-bs-toggle="pill"
                                        href="#line-general" role="tab" aria-controls="pills-general"
                                        aria-selected="true">General Information</a>
                                </li>
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link" id="line-personalinfo-tab" data-bs-toggle="pill"
                                        href="#line-personalinfo" role="tab" aria-controls="pills-personalinfo"
                                        aria-selected="true">Personal Information</a>
                                </li>
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link" id="line-education-tab" data-bs-toggle="pill"
                                        href="#line-education" role="tab" aria-controls="pills-education"
                                        aria-selected="false" tabindex="-1">Education</a>
                                </li>
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link" id="line-experience-tab" data-bs-toggle="pill"
                                        href="#line-experience" role="tab" aria-controls="pills-experience"
                                        aria-selected="false" tabindex="-1">Experience</a>
                                </li>
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link" id="line-training-tab" data-bs-toggle="pill"
                                        href="#line-training" role="tab" aria-controls="pills-training"
                                        aria-selected="false" tabindex="-1">Training</a>
                                </li>
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link" id="line-family-tab" data-bs-toggle="pill" href="#line-family"
                                        role="tab" aria-controls="pills-family" aria-selected="false"
                                        tabindex="-1">Family</a>
                                </li>
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link" id="line-emergencycontact-tab" data-bs-toggle="pill"
                                        href="#line-emergencycontact" role="tab" aria-controls="pills-emergencycontact"
                                        aria-selected="false" tabindex="-1">Emergency Contact</a>
                                </li>
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link" id="line-official-tab" data-bs-toggle="pill"
                                        href="#line-official" role="tab" aria-controls="pills-official"
                                        aria-selected="false" tabindex="-1">Official</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content mt-3 mb-3" id="line-tabContent">
                                <!--General Information-->
                                <div class="tab-pane fade show active" id="line-general" role="tabpanel"
                                    aria-labelledby="line-general-tab">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="small-label-text">Salutation<span class="text-danger">
                                                        *</span></label>
                                                <select class="form-select form-control custom-input" name="salutation"
                                                    placeholder="Salutation" required>
                                                    <option selected disabled>Select Salutation</option>
                                                    @foreach ($salutations as $salutation)
                                                    <option value="{{ $salutation->id }}">
                                                        {{ $salutation->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('salutation') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="first_name">First Name<span class="text-danger">
                                                        *</span></label>
                                                <input type="text" class="form-control custom-input custom-input"
                                                    id="first_name" name="first_name" placeholder="Enter First Name"
                                                    value="{{ old('first_name') }}" required>
                                                @error('first_name') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="last_name">Last Name<span class="text-danger">
                                                        *</span></label>
                                                <input type="text" class="form-control custom-input custom-input"
                                                    id="last_name" name="last_name" placeholder="Enter Last Name"
                                                    value="{{ old('last_name') }}" required>
                                                @error('last_name') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="gender">Gender</label>
                                                <select class="form-select form-control custom-input" name="gender"
                                                    placeholder="Gender">
                                                    <option selected disabled>Select Gender</option>
                                                    @foreach ($genders as $gender)
                                                    <option value="{{ $gender->id }}">
                                                        {{ $gender->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('gender') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nationality">Nationality</label>
                                                <select class="form-select form-control" id="nationality"
                                                    name="nationality">
                                                    <option value="" selected disabled>Select Nationality</option>
                                                    @foreach ($nationalities as $nationality)
                                                    <option value="{{ $nationality->id }}">
                                                        {{ $nationality->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('nationality') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="blood_group">Blood Group</label>
                                                <select class="form-select form-control" id="blood_group"
                                                    name="blood_group">
                                                    <option value="" selected disabled>Select Blood Group</option>
                                                    @foreach ($bloodgroups as $bloodgroup)
                                                        <option value="{{$bloodgroup->id}}">{{$bloodgroup->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('blood_group') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="email2">Department<span class="text-danger">
                                                        *</span></label>
                                                <select class="form-select mb-3" aria-label="Default select example"
                                                    name="department_id" id="department_id" required>
                                                    <option selected disabled>Select Department</option>
                                                    @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}" {{
                                                        old('department_id')==$department->id ? 'selected' : '' }}>
                                                        {{ $department->department_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('department_id') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="email2">Designation<span class="text-danger">
                                                        *</span></label>
                                                <select class="form-select mb-3" aria-label="Default select example"
                                                    name="designation_id" id="designation_id" required>
                                                    <option selected disabled>Select Designation</option>
                                                    @foreach ($designations as $designation)
                                                    <option value="{{ $designation->id }}" {{
                                                        old('designation_id')==$designation->id ? 'selected' : '' }}>
                                                        {{ $designation->designation_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('designation_id') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="joining_date">Joining Date</label>
                                                <input type="date" class="form-control custom-input custom-input"
                                                    id="joining_date" name="joining_date"
                                                    value="{{ old('joining_date') }}" placeholder="Joining Date">
                                                @error('joining_date') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="joining_sallery">Joining Salary</label>
                                                <input type="text" class="form-control custom-input custom-input"
                                                    id="joining_sallery" name="joining_sallery"
                                                    value="{{ old('joining_sallery') }}" placeholder="Joining Salary">
                                                @error('joining_sallery') <span class="text-danger">{{ $message
                                                    }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="probation_period">Probation Period</label>
                                                <select class="form-select form-control" id="probation_period"
                                                    name="probation_period">
                                                    <option value="" selected disabled>Select Probation Period</option>
                                                    @foreach ($probationPeriods as $probationPeriod)
                                                        <option value="{{$probationPeriod->id}}" >{{$probationPeriod->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('probation_period') <span class="text-danger">{{ $message
                                                    }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="prob_start_date">Probation Period Start Date</label>
                                                <input type="date" class="form-control custom-input custom-input"
                                                    id="prob_start_date" name="prob_start_date"
                                                    value="{{ old('prob_start_date') }}"
                                                    placeholder="robation Period Start Date">
                                                @error('prob_start_date') <span class="text-danger">{{ $message
                                                    }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="prob_end_date">Probation Period End Date</label>
                                                <input type="date" class="form-control custom-input custom-input"
                                                    id="prob_end_date" name="prob_end_date"
                                                    value="{{ old('prob_end_date') }}"
                                                    placeholder="Probation Period End Date">
                                                @error('prob_end_date') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Reporting To</label>
                                                <select class="form-select form-control" id="reporting_to"
                                                    name="reporting_to">
                                                    <option value="" selected>Reporting To</option>
                                                    @foreach ($employeeinfos as $employeeinfo)
                                                        <option value="{{$employeeinfo->id}}">{{$employeeinfo->salutations ? $employeeinfo->salutations->name :''}} {{$employeeinfo->first_name}} {{$employeeinfo->last_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('reporting_to') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="notice_start_date">Notice Period Start Date</label>
                                                <input type="date" class="form-control custom-input custom-input"
                                                    id="notice_start_date" name="notice_start_date"
                                                    value="{{ old('notice_start_date') }}">
                                                @error('notice_start_date') <span class="text-danger">{{ $message
                                                    }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="notice_end_date">Notice Period End Date</label>
                                                <input type="date" class="form-control custom-input custom-input"
                                                    id="notice_end_date" name="notice_end_date"
                                                    value="{{ old('notice_end_date') }}">
                                                @error('notice_end_date') <span class="text-danger">{{ $message
                                                    }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="status"></label>
                                                <select class="form-select form-control custom-input" name="status"
                                                    id="status">
                                                    <option selected disabled>Select Status</option>
                                                    <option selected value="1" {{ old('status')=='1' ? 'selected' : ''
                                                        }}>Active</option>
                                                    <option selected value="0" {{ old('status')=='0' ? 'selected' : ''
                                                        }}>InActive</option>

                                                </select>
                                                @error('status') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Personal Information-->
                                <div class="tab-pane fade" id="line-personalinfo" role="tabpanel"
                                    aria-labelledby="line-personalinfo-tab">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="contact_number">Contact Number<span class="text-danger">
                                                        *</span></label>
                                                <input type="text" class="form-control custom-input" id="contact_number"
                                                    name="contact_number" value="{{ old('contact_number') }}"
                                                    placeholder="Enter Contact Numbers" required>
                                                @error('contact_number') <span class="text-danger">{{ $message}}</span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input type="email" class="form-control custom-input custom-input"
                                                    id="email" name="email" value="{{ old('email') }}"
                                                    placeholder="Email Address">
                                                @error('email') <span class="text-danger">{{ $message
                                                    }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>WhatsApp</label>
                                                <input type="text" class="form-control custom-input custom-input"
                                                    id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}"
                                                    placeholder="Whatsapp">
                                                @error('whatsapp') <span class="text-danger">{{ $message
                                                    }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="nid_num">NID Number</label>
                                                <input type="text" class="form-control custom-input" id="nid_num"
                                                    name="nid_num" value="{{ old('nid_num') }}"
                                                    placeholder="Nid Number">
                                                @error('nid_num') <span class="text-danger">{{ $message
                                                    }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label for="pres_add">Present Address</label>
                                                <input type="text" class="form-control" value="{{ old('pres_add') }}"
                                                    id="pres_add" name="pres_add" placeholder="Full Address">
                                                @error('pres_add') <span class="text-danger">{{ $message
                                                    }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="district">District</label>
                                                <select class="form-select form-control" id="district" name="district">
                                                    @foreach ($districts as $district )
                                                    <option value="{{ $district->name }}" {{
                                                        old('district')==$district->name ? 'selected' : '' }}>
                                                        {{ $district->name }}
                                                    </option>
                                                    @endforeach
                                                    @error('district') <span class="text-danger">{{ $message
                                                        }}</span>
                                                    @enderror
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="postal_code">Postal Code</label>
                                                <input type="text" class="form-control" id="postal_code"
                                                    name="postal_code" value="{{ old('postal_code') }}"
                                                    placeholder="Postal Code">
                                                @error('postal_code') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label for="permanent_add">Permanent Address</label>
                                                <input type="text" class="form-control" id="permanent_add"
                                                    name="permanent_add" value="{{ old('permanent_add') }}"
                                                    placeholder="Full Address">
                                                @error('permanent_add') <span class="text-danger">{{ $message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-check">
                                                <input type="hidden" name="same_address" value="0">
                                                <input type="checkbox" class="form-check-input" id="same_address"
                                                    name="same_address" value="1">
                                                <label class="form-check-label" for="same_address">Same as Present
                                                    Address</label>

                                            </div>

                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="email2">District</label>
                                                <select class="form-select form-control" id="permanent_district"
                                                    name="permanent_district" placeholder="Expense Category">
                                                    @foreach ($districts as $district )
                                                    <option value="{{ $district->name }}" {{
                                                        old('permanent_district')==$district->name ? 'selected' : '' }}>
                                                        {{ $district->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('permanent_district') <span class="text-danger">{{
                                                    $message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="permanent_postal_code">Postal Code</label>
                                                <input type="text" class="form-control" id="permanent_postal_code"
                                                    name="permanent_postal_code"
                                                    value="{{ old('permanent_postal_code') }}"
                                                    placeholder="Postal Code">
                                                @error('permanent_postal_code') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--Education-->
                                <div class="tab-pane fade" id="line-education" role="tabpanel"
                                    aria-labelledby="line-education-tab">
                                    <button id="addFormBtn" class="btn btn-primary" type="button">+Add
                                        Education</button>
                                    <div id="formContainer"></div>
                                </div>
                                <!--Experience-->
                                <div class="tab-pane fade" id="line-experience" role="tabpanel"
                                    aria-labelledby="line-experience-tab">
                                    <button id="addExperienceBtn" class="btn btn-primary" type="button">+ Add
                                        Experience</button>
                                    <div id="experienceFormContainer"></div>
                                </div>
                                <!--Training-->
                                <div class="tab-pane fade" id="line-training" role="tabpanel"
                                    aria-labelledby="line-training-tab">
                                    <button id="addTrainingBtn" class="btn btn-primary" type="button">+ Add
                                        Training</button>
                                    <div id="trainingFormContainer"></div>
                                </div>
                                <!--Family-->
                                <div class="tab-pane fade" id="line-family" role="tabpanel"
                                    aria-labelledby="line-family-tab">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="father_name">Fathers Name</label>
                                                <input type="text" class="form-control" id="father_name"
                                                    name="father_name" placeholder="Father Name"
                                                    value="{{ old('father_name') }}">
                                                @error('father_name') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="mother_name">Mothers Name</label>
                                                <input type="text" class="form-control" id="mother_name"
                                                    name="mother_name" placeholder="Mother Name"
                                                    value="{{ old('mother_name') }}">
                                                @error('mother_name') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="form-label">Marital Status<span
                                                        class="text-danger">*</span></label><br>
                                                <div class="form-check">
                                                    <label class="form-check-label" for="single">Single</label>
                                                    <input class="form-check-input" type="radio" name="marital_status"
                                                        id="single" value="Single" {{ old('marital_status')=='Single'
                                                        ? 'checked' : '' }} onclick="toggleSpouseFields()">
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="marital_status"
                                                        id="married" value="Married" {{ old('marital_status')=='Married'
                                                        ? 'checked' : '' }} onclick="toggleSpouseFields()">
                                                    <label class="form-check-label" for="married">Married</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="marital_status"
                                                        id="divorced" value="Divorced" {{
                                                        old('marital_status')=='Divorced' ? 'checked' : '' }}
                                                        onclick="toggleSpouseFields()">
                                                    <label class="form-check-label" for="divorced">Divorced</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="spouseFields" style="display: none;">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="spouse_name">Spouse Name</label>
                                                        <input type="text" class="form-control" id="spouse_name"
                                                            name="spouse_name" placeholder="Enter Spouse Name"
                                                            value="{{ old('spouse_name') }}">
                                                        @error('spouse_name') <span class="text-danger">{{
                                                            $message}}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="spouse_occupation">Spouse Occupation</label>
                                                        <input type="text" class="form-control" id="spouse_occupation"
                                                            name="spouse_occupation"
                                                            placeholder="Enter Spouse Occupation"
                                                            value="{{ old('spouse_occupation') }}">
                                                        @error('spouse_occupation') <span class="text-danger">{{
                                                            $message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="spouse_organization">Spouse's Organization</label>
                                                        <input type="text" class="form-control" id="spouse_organization"
                                                            name="spouse_organization"
                                                            placeholder="Enter Spouse's Organization"
                                                            value="{{ old('spouse_organization') }}">
                                                        @error('spouse_organization') <span class="text-danger">{{
                                                            $message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="spouse_mobile">Spouse's Mobile No</label>
                                                        <input type="text" class="form-control" id="spouse_mobile"
                                                            name="spouse_mobile" placeholder="Enter Spouse's Mobile No"
                                                            value="{{ old('spouse_mobile') }}">
                                                        @error('spouse_mobile') <span class="text-danger">{{
                                                            $message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="spouse_nid">Spouse NID(pdf)</label>
                                                        <input type="file" class="form-control" id="spouse_nid"
                                                            name="spouse_nid">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="spouse_dob">Spouse's Date of Birth</label>
                                                        <input type="date" class="form-control" name="spouse_dob"
                                                            id="spouse_dob" value="{{ old('spouse_dob') }}">
                                                        @error('spouse_dob') <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Emergency Contact-->
                                <div class="tab-pane fade" id="line-emergencycontact" role="tabpanel"
                                    aria-labelledby="line-emergencycontact-tab">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="emergency_contact_person">Emergency Contact Person Name</label>
                                                <input type="text" class="form-control" id="emergency_contact_person"
                                                    name="emergency_contact_person"
                                                    placeholder="Emergency Contact Person Name"
                                                    value="{{ old('emergency_contact_person') }}">
                                                @error('emergency_contact_person') <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="relation">Relation</label>
                                                <select class="form-select form-control" id="relation" name="relation"
                                                    placeholder="Expense Category">
                                                    <option value="" selected disabled>Select Relation</option>
                                                    @foreach ($relations as $relation)
                                                        <option value="{{$relation->id}}">{{$relation->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('relation') <span class="text-danger">{{ $message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="occupation">Occupation</label>
                                                <input type="text" class="form-control" id="occupation"
                                                    name="occupation" placeholder="Occupation"
                                                    value="{{ old('occupation') }}">
                                                @error('occupation') <span class="text-danger">{{ $message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="emergency_contact">Contact Number</label>
                                                <input type="text" class="form-control custom-input"
                                                    id="emergency_contact" name="emergency_contact"
                                                    placeholder="Contact Number" value="{{ old('emergency_contact') }}">
                                                @error('emergency_contact') <span class="text-danger">{{
                                                    $message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="emergency_email">Email</label>
                                                <input type="email" class="form-control custom-input"
                                                    id="emergency_email" name="emergency_email" placeholder="Email"
                                                    value="{{ old('emergency_email') }}">
                                                @error('emergency_email') <span class="text-danger">{{ $message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="emergency_address">Address</label>
                                                <input type="text" class="form-control" id="emergency_address"
                                                    name="emergency_address" placeholder="Full Address"
                                                    value="{{ old('emergency_address') }}">
                                                @error('emergency_address') <span class="text-danger">{{
                                                    $message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Official-->
                                <div class="tab-pane fade" id="line-official" role="tabpanel"
                                    aria-labelledby="line-official-tab">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Weekly Holiday</label>
                                                <select class="form-select form-control mb-3"
                                                    aria-label="Default select example" name="holiday_id">
                                                    <option disabled selected>Select Holiday</option>
                                                    @foreach ( $week_offs as $week_off )
                                                    <option value="{{ $week_off->id }}">{{ $week_off->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="email2">Shift</label>
                                                <select class="form-select form-control mb-3"
                                                    aria-label="Default select example" name="shift_id" id="shift_id">
                                                    <option disabled selected>Select Shift</option>
                                                    @foreach ( $shifts as $shift )
                                                    <option value="{{ $shift->id }}">{{ $shift->shift_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Overtime Enable</label>
                                                <select class="form-select form-control" id="overtime_enable" name="overtime_enable">
                                                    <option value="" selected disabled>Select Overtime Enable</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Salary Type</label>
                                                <select class="form-select form-control" id="sallery_type" name="salary_type"
                                                    onchange="toggleBank()">
                                                    <option value="Cash" {{ old('sallery_type')=='Cash' ? 'selected'
                                                        : '' }}>Cash</option>
                                                    <option value="Bank" {{ old('sallery_type')=='Bank' ? 'selected'
                                                        : '' }}>Bank</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="bankDetails" style="display: none;">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="bank_name">Bank Name</label>
                                                        <input type="text" class="form-control" id="bank_name"
                                                            name="bank_name" placeholder="Enter Bank Name"
                                                            value="{{ old('bank_name') }}">
                                                        @error('bank_name') <span class="text-danger">{{
                                                            $message}}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="account_holder_name">Account Holder Name</label>
                                                        <input type="text" class="form-control" id="account_holder_name"
                                                            name="account_holder_name"
                                                            placeholder="Enter Account Holder Name"
                                                            value="{{ old('account_holder_name') }}">
                                                        @error('account_holder_name') <span class="text-danger">{{
                                                            $message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="branch_name">Branch Name</label>
                                                        <input type="text" class="form-control" id="branch_name"
                                                            name="branch_name" placeholder="Enter Branch Name"
                                                            value="{{ old('branch_name') }}">
                                                        @error('branch_name') <span class="text-danger">{{
                                                            $message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="account_number">Account Number</label>
                                                        <input type="text" class="form-control" id="account_number"
                                                            name="account_number" placeholder="Enter Account Number"
                                                            value="{{ old('account_number') }}">
                                                        @error('account_number') <span class="text-danger">{{
                                                            $message}}</span>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="official_phone">Official Phone Number</label>
                                                <input type="text" class="form-control custom-input custom-input"
                                                    id="official_phone" name="official_phone"
                                                    placeholder="Official Phone Number"
                                                    value="{{ old('official_phone') }}">
                                                @error('official_phone') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="official_email">Official Email Address</label>
                                                <input type="text" class="form-control custom-input custom-input"
                                                    id="official_email" name="official_email"
                                                    placeholder="Official Email Address"
                                                    value="{{ old('official_email') }}">
                                                @error('official_email') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="official_whatsapp">Official WhatsApp</label>
                                                <input type="text" class="form-control custom-input custom-input"
                                                    id="official_whatsapp" name="official_whatsapp"
                                                    placeholder="Official WhatsApp"
                                                    value="{{ old('official_whatsapp') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="user_email">Username / Email</label>
                                                <input type="text" class="form-control custom-input custom-input"
                                                    id="user_email" name="user_email" placeholder="Username / Email"
                                                    value="{{ old('user_email') }}">
                                                @error('user_email') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control custom-input custom-input"
                                                    id="password" name="password" placeholder="Password">
                                                @error('password') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="login_allowed">Login Allowed?</label>
                                                <select class="form-select form-control" id="login_allowed"
                                                    name="login_allowed">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end py-3 px-3">
                                <button type="button" id="" class="cancel-button-1 previousBtn" style="display: none;"><i class='bx bx-chevron-left bx-flashing'></i>Previous</button>
                                <button type="button" id="" class="purchase-button nextBtn"><i class='bx bx-chevron-right bx-flashing'></i>Next</button>
                                <button type="button" id="" class="submit-button-1 submitBtn" onclick="confirmSubmit()" style="display: none;"><i class='bx bx-upload bx-flashing'></i>Submit</button>

                            {{-- <button type="submit" class="submit-button-1"><i class='bx bx-upload bx-flashing'></i>
                                Submit</button> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
{{-- ******Same as present address ******* --}}
<script>
    // Get elements by their IDs
    const presentAddressInput = document.getElementById('pres_add');
    const permanentAddressInput = document.getElementById('permanent_add');
    const sameAddressCheckbox = document.getElementById('same_address');

    // District and Postal Code fields
    const presentDistrictSelect = document.getElementById('district');
    const presentPostalCodeInput = document.getElementById('postal_code');

    const permanentDistrictSelect = document.getElementById('permanent_district');
    const permanentPostalCodeInput = document.getElementById('permanent_postal_code');

    // When the checkbox is clicked
    sameAddressCheckbox.addEventListener('change', function () {
        if (this.checked) {
            // Copy Present Address values to Permanent Address
            permanentAddressInput.value = presentAddressInput.value;
            permanentDistrictSelect.value = presentDistrictSelect.value;
            permanentPostalCodeInput.value = presentPostalCodeInput.value;

            // Disable the permanent address, district, and postal code fields
            permanentAddressInput.disabled = true;
            permanentDistrictSelect.disabled = true;
            permanentPostalCodeInput.disabled = true;
        } else {
            // Enable the permanent address, district, and postal code fields for manual entry
            permanentAddressInput.disabled = false;
            permanentDistrictSelect.disabled = false;
            permanentPostalCodeInput.disabled = false;
        }
    });

    // Optional: Update the permanent address fields if present address fields change and checkbox is checked
    presentAddressInput.addEventListener('input', function () {
        if (sameAddressCheckbox.checked) {
            permanentAddressInput.value = presentAddressInput.value;
        }
    });

    presentDistrictSelect.addEventListener('change', function () {
        if (sameAddressCheckbox.checked) {
            permanentDistrictSelect.value = presentDistrictSelect.value;
        }
    });

    presentPostalCodeInput.addEventListener('input', function () {
        if (sameAddressCheckbox.checked) {
            permanentPostalCodeInput.value = presentPostalCodeInput.value;
        }
    });

</script>
<script>
    // JavaScript to handle space-to-comma conversion
    document.getElementById('contact_number').addEventListener('input', function (e) {
        // Get the current value of the input field
        let inputValue = e.target.value;

        // Check if the last character is a space
        if (inputValue.endsWith(' ')) {
            // Replace the last space with a comma
            e.target.value = inputValue.trim() + ', ';
        }
    });

</script>


<!-- Spouse -->
<script>
    function toggleSpouseFields() {
        const marriedRadio = document.getElementById("married");
        const spouseFields = document.getElementById("spouseFields");

        if (marriedRadio.checked) {
            spouseFields.style.display = "block"; // Show spouse fields
        } else {
            spouseFields.style.display = "none"; // Hide spouse fields
        }
    }

    // Initialize on page load (in case "married" is already selected)
    document.addEventListener("DOMContentLoaded", function () {
        toggleSpouseFields();
    });

</script>
<!-- bank -->
<script>
    function toggleBank() {
        const salaryType = document.getElementById("sallery_type").value; // Get the selected value
        const bankDetails = document.getElementById("bankDetails");

        if (salaryType === "Bank") {
            bankDetails.style.display = "block"; // Show bank details when "Bank" is selected
        } else {
            bankDetails.style.display = "none"; // Hide bank details when "Cash" is selected
        }
    }

    // Initialize on page load (in case a value is already selected)
    document.addEventListener("DOMContentLoaded", function () {
        toggleBank();
    });

</script>
<!-- JavaScript for Add and Remove Education Sections -->
<script>
    const addFormBtn = document.getElementById("addFormBtn");
    const formContainer = document.getElementById("formContainer");
    // Function to create a new form section
    function createNewFormSection() {
        const formSection = document.createElement('div');
        formSection.classList.add('form-section', 'mb-3');


        formSection.innerHTML = `
         <div class="soft-bg-3 row border rounded p-3">
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="education_type">Education Type</label>
                    <select class="form-select form-control" name="education_type[]">
                        <option  selected disabled>Select Education Type</option>
                        @foreach ($educationtypes as $educationtype)
                            <option value="{{$educationtype->id}}">{{$educationtype->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="education">Education</label>
                    <select class="form-select form-control" name="education[]">
                         <option  selected disabled>Select Education</option>
                        @foreach ($educations as $education)
                            <option value="{{$education->id}}">{{$education->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="group_major_subject">Group / Major Subject</label>
                    <input type="text" class="form-control" name="group_major_subject[]" placeholder="Group / Major Subject">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="passing_year">Passing Year</label>
                    <input type="text" class="form-control" name="passing_year[]" placeholder="Passing Year">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="institute_name">Institute Name</label>
                    <input type="text" class="form-control" name="institute_name[]" placeholder="Institute Name">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="board_university">Board/University</label>
                    <input type="text" class="form-control" name="board_university[]" placeholder="Board/University">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="result">Result <span class="text-danger">(Result with GPA or CGPA)</span></label>
                    <input type="text" class="form-control" name="result[]" placeholder="Result( CGPA: 3.5 )">
                </div>
            </div>
            <div class="col-12 text-end">
                <button type="button" class="btn btn-danger removeFormBtn">Remove</button>
            </div>
            </div>
        `;

        // Event listener to remove this form section
        const removeBtn = formSection.querySelector(".removeFormBtn");
        removeBtn.addEventListener("click", function () {
            formSection.remove();
        });

        return formSection;
    }

    // Event listener for the "Add Experience" button
    addFormBtn.addEventListener("click", function () {
        const newFormSection = createNewFormSection();
        formContainer.appendChild(newFormSection);
    });

    // Add an initial form section when the page loads
    document.addEventListener("DOMContentLoaded", function () {
        const initialFormSection = createNewFormSection();
        formContainer.appendChild(initialFormSection);
    });

</script>
<!-- JavaScript for Add and Remove experience Sections -->

<script>
    const addExperienceBtn = document.getElementById("addExperienceBtn");
    const experienceFormContainer = document.getElementById("experienceFormContainer");

    // Function to create a new experience form section
    function createNewExperienceFormSection() {
        const formSection = document.createElement('div');
        formSection.classList.add('form-section', 'mb-3'); // Adding margin for spacing

        // HTML structure for a single experience form section
        formSection.innerHTML = `
        <div class="soft-bg-3 row border rounded p-3">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control" name="company_name[]" placeholder="Enter company name">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="job_position">Job Position</label>
                    <input type="text" class="form-control" name="job_position[]" placeholder="Enter job position">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" class="form-control" name="department[]" placeholder="Enter department">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="job_respons">Job Responsibilities</label>
                    <input type="text" class="form-control" name="job_respons[]" placeholder="Enter responsibilities">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="from_date">From Date</label>
                    <input type="date" class="form-control" name="from_date[]">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="to_date">To Date</label>
                    <input type="date" class="form-control" name="to_date[]">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="duration">Duration (Months)</label>
                    <input type="text" class="form-control" name="duration[]" placeholder="Enter duration">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="projects">Working Projects Name</label>
                    <input type="text" class="form-control" name="projects[]" placeholder="Enter project names">
                </div>
            </div>
            <div class="col-12 text-end">
                <button type="button" class="btn btn-danger removeFormBtn">Remove</button>
            </div>
        </div>
        `;

        // Event listener to remove this form section
        const removeBtn = formSection.querySelector(".removeFormBtn");
        removeBtn.addEventListener("click", function () {
            formSection.remove();
        });

        return formSection;
    }

    // Event listener for the "Add Experience" button
    addExperienceBtn.addEventListener("click", function () {
        const newFormSection = createNewExperienceFormSection();
        experienceFormContainer.appendChild(newFormSection);
    });

    // Add an initial form section when the page loads
    document.addEventListener("DOMContentLoaded", function () {
        const initialFormSection = createNewExperienceFormSection();
        experienceFormContainer.appendChild(initialFormSection);
    });

</script>


<!-- JavaScript for Add and Remove training Sections -->
<script>
    const addTrainingBtn = document.getElementById("addTrainingBtn");
    const trainingFormContainer = document.getElementById("trainingFormContainer");

    // Function to create a new training form section
    function createNewTrainingFormSection() {
        const formSection = document.createElement("div");
        formSection.classList.add("form-section", "mb-3");

        // HTML structure for a single training form section
        formSection.innerHTML = `
        <div class="soft-bg-3 row border rounded p-3">
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="train_type">Training Type</label>
                    <input type="text" class="form-control" name="train_type[]" placeholder="Training Type">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="course_title">Course Title</label>
                    <input type="text" class="form-control" name="course_title[]" placeholder="Course Title">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="course_duration">Course Duration</label>
                     <input type="text" class="form-control" name="course_duration[]" placeholder="Course Duration (In Month)">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="course_start">Course Start Date</label>
                    <input type="date" class="form-control" name="course_start[]">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="description">Course Description</label>
                    <textarea class="form-control" rows="6" name="description[]" placeholder="Write Here"></textarea>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="course_end">Course End Date</label>
                    <input type="date" class="form-control" name="course_end[]">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="text" class="form-control" name="year[]" placeholder="Year">
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label for="institute_name">Institute Name</label>
                    <input type="text" class="form-control" name="institute_name[]" placeholder="Institute Name">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="resource">Trainer/Resource</label>
                    <input type="text" class="form-control" name="resource[]" placeholder="Trainer/Resource">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="course_result">Result</label>
                    <input type="text" class="form-control" name="course_result[]" placeholder="Course Result">
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label for="institute_address">Institute Address</label>
                    <input type="text" class="form-control" name="institute_address[]" placeholder="Institute Address">
                </div>
            </div>
            <div class="col-12 text-end">
                <button type="button" class="btn btn-danger removeFormBtn">Remove</button>
            </div>
        </div>
    `;

        // Add event listener to the remove button
        const removeBtn = formSection.querySelector(".removeFormBtn");
        removeBtn.addEventListener("click", function () {
            formSection.remove();
        });

        return formSection;
    }


    // Add new form section when the "Add Training" button is clicked
    addTrainingBtn.addEventListener("click", function () {
        const newFormSection = createNewTrainingFormSection();
        trainingFormContainer.appendChild(newFormSection);
    });

    // Initialize the form with one section by default (optional)
    document.addEventListener("DOMContentLoaded", function () {

        const initialFormSection = createNewTrainingFormSection();
        trainingFormContainer.appendChild(initialFormSection);

    });

</script>

<script>
    $(document).ready(function () {
        function loadDesignations(departmentId, designationSelectId) {
            if (departmentId) {
                $.ajax({
                    url: '/dashboard/employee/designations/' + departmentId, // Route for designations
                    type: 'GET',
                    success: function (data) {
                        var designationSelect = $(designationSelectId);
                        designationSelect.empty(); // Clear previous designations
                        designationSelect.append('<option value="" disabled>Select Designation</option>');

                        // Loop through and append designations to the dropdown
                        $.each(data, function (key, designation) {
                            designationSelect.append('<option value="' + designation.id + '">' + designation.designation_name + '</option>');
                        });
                    },
                    error: function () {
                        alert('Failed to load designations. Please try again.');
                    }
                });
            } else {
                var designationSelect = $(designationSelectId);
                designationSelect.empty();
                designationSelect.append('<option value="" disabled>Select Designation</option>');
            }
        }

        // Event listener for the create modal
        $('#department_id').change(function () {
            var departmentId = $(this).val();
            loadDesignations(departmentId, '#designation_id');
        });

        function loadDesignationsEdit(departmentId, designationSelectId, selectedDesignationId = null) {
            if (departmentId) {
                $.ajax({
                    url: '/dashboard/employee/designations/' + departmentId, // Route to get designations
                    type: 'GET',
                    success: function (data) {
                        var designationSelect = $(designationSelectId);
                        designationSelect.empty(); // Clear previous options
                        designationSelect.append(
                            '<option value="" disabled>Select Designation</option>');

                        $.each(data, function (key, designation) {
                            let selected = selectedDesignationId == designation.id ?
                                'selected' : '';
                            designationSelect.append('<option value="' + designation.id +
                                '" ' + selected + '>' + designation.designation_name +
                                '</option>');
                        });
                    },
                    error: function () {
                        alert('Failed to load designations. Please try again.');
                    }
                });
            } else {
                var designationSelect = $(designationSelectId);
                designationSelect.empty();
                designationSelect.append('<option value="" disabled>Select Designation</option>');
            }
        }

        // Handle change event in the edit modal
        $('.edit_department_id').change(function () {
            var departmentId = $(this).val();
            var designationSelect = $(this).closest('.row').find('.edit_designation_id');
            var selectedDesignationId = designationSelect.val(); // Get the current selected designation

            loadDesignationsEdit(departmentId, designationSelect, selectedDesignationId);
        });

        // Pre-load designations when modal opens
        $('.edit_department_id').each(function () {
            var departmentId = $(this).val();
            var designationSelect = $(this).closest('.row').find('.edit_designation_id');
            var selectedDesignationId = designationSelect
        .val(); // Get the existing selected designation

            if (departmentId) {
                loadDesignationsEdit(departmentId, designationSelect, selectedDesignationId);
            }
        });
    });
</script>


<script>
    $(document).ready(function () {
        function loadShifts(departmentId, shiftSelectId, selectedShiftId = null) {
            var shiftSelect = $(shiftSelectId);
            shiftSelect.empty();
            shiftSelect.append('<option value="" selected>Select Shift</option>');

            if (departmentId) {
                $.ajax({
                    url: '/dashboard/employee/shifts/' + departmentId,
                    type: 'GET',
                    success: function (data) {

                        $.each(data, function (key, shift) {
                            var selected = selectedShiftId && selectedShiftId == shift.shift.id ? 'selected' : '';
                            shiftSelect.append('<option value="' + shift.shift.id + '" ' + selected + '>' + shift.shift.shift_name + '</option>');
                        });
                    },
                    error: function () {
                        alert('Failed to load shifts. Please try again.');
                    }
                });
            }
        }

        // Event listener for the create modal's department dropdown
        $('#department_id').on('change', function () {
            var departmentId = $(this).val();
            loadShifts(departmentId, '#shift_id');
        });

        function loadShiftsEdit(departmentId, shiftSelectId, selectedShiftId = null) {
        var shiftSelect = $(shiftSelectId);
        shiftSelect.empty();
        shiftSelect.append('<option value="" selected>Select Shift</option>');

        if (departmentId) {
            $.ajax({
                url: '/dashboard/holiday/shifts/' + departmentId,
                type: 'GET',
                success: function (data) {
                    $.each(data, function (key, shift) {
                        var selected = selectedShiftId && selectedShiftId == shift.shift.id ? 'selected' : '';
                        shiftSelect.append('<option value="' + shift.shift.id + '" ' + selected + '>' + shift.shift.shift_name + '</option>');
                    });
                },
                error: function () {
                    alert('Failed to load shifts. Please try again.');
                }
            });
        }
    }

    // Event listener for department dropdown change in the edit modal
    $(document).on('change', '.edit_department_id', function () {
        var departmentId = $(this).val();
        var modal = $(this).closest('.modal'); // Find the parent modal
        var shiftSelect = modal.find('.edit_shift_id'); // Find shift dropdown in the same modal
        loadShiftsEdit(departmentId, shiftSelect);
    });

    // When edit modal is opened, load shifts based on the selected department
    $('.modal').on('show.bs.modal', function () {
        var modal = $(this);
        var departmentId = modal.find('.edit_department_id').val();
        var shiftSelect = modal.find('.edit_shift_id');
        var selectedShiftId = shiftSelect.attr('data-selected'); // Get the preselected shift ID

        if (departmentId) {
            loadShiftsEdit(departmentId, shiftSelect, selectedShiftId);
        }
    });

    });
</script>

<script>
$(document).ready(function () {
    var currentTab = 0;
    var $tabs = $('.employeebars'); // All navigation tab links
    var totalTabs = $tabs.length - 1; // Total number of tabs minus one

    console.log(totalTabs);

    // Initialize jQuery Validate on your form (ensure your form has an id="employeeForm")
    var validator = $("#employeeForm").validate({
        errorClass: "is-invalid",
        errorElement: "span",
        errorPlacement: function (error, element) {
            error.addClass('text-danger');
            error.insertAfter(element);
        }
    });


    function showTab(n) {
        console.log(n);

        $('.tab-pane').removeClass('show active');
        $('.employee-link').removeClass('active');
        if (n < 0) {
            n = totalTabs;
        } else if (n > totalTabs) {
            n = 0;
        }

        $('.tab-pane').eq(n).addClass('show active');
        $('.employee-link').eq(n).addClass('active');

        if (n == 0) {
            $('.previousBtn').hide();
        } else {
            $('.previousBtn').show();
        }
        if (n == totalTabs) {
            $('.previousBtn').show();
            $('.submitBtn').show();
            $('.nextBtn').hide();
        } else {
            $('.nextBtn').show();
            $('.submitBtn').hide();
        }
    }

    showTab(currentTab);

    $('.nextBtn').on('click', function () {
        var $currentTabPane = $('.tab-pane').eq(currentTab);
        var valid = true;

        $currentTabPane.find('input, select, textarea').each(function () {
            if (!$(this).valid()) {
                valid = false;
            }
        });

        if (valid) {
            currentTab++;
            showTab(currentTab);
        }
    });

    $('.previousBtn').on('click', function () {
        currentTab--;
        showTab(currentTab);
    });
});


</script>

<script>
    function confirmSubmit() {
        Swal.fire({
            title: 'Are you sure?',
            text: "Want to submit this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, submit it!',
            cancelButtonText: 'No, cancel!',
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-secondary'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('employeeForm').submit();
            }
        });
    }
</script>

@endpush
