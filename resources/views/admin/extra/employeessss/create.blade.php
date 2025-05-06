@extends('layouts.admin')
@section('title','Employees Create')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header project-details-card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada'></i>Create
                                    Employee</h4>
                            </div>
                        </div>
                        <div class="text-center m-3">
                            <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="line-general-tab" data-bs-toggle="pill"
                                        href="#line-general" role="tab" aria-controls="pills-general"
                                        aria-selected="true">General Information</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="line-personalinfo-tab" data-bs-toggle="pill"
                                        href="#line-personalinfo" role="tab" aria-controls="pills-personalinfo"
                                        aria-selected="true">Personal Information</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="line-education-tab" data-bs-toggle="pill"
                                        href="#line-education" role="tab" aria-controls="pills-education"
                                        aria-selected="false" tabindex="-1">Education</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="line-experience-tab" data-bs-toggle="pill"
                                        href="#line-experience" role="tab" aria-controls="pills-experience"
                                        aria-selected="false" tabindex="-1">Experience</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="line-training-tab" data-bs-toggle="pill"
                                        href="#line-training" role="tab" aria-controls="pills-training"
                                        aria-selected="false" tabindex="-1">Training</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="line-family-tab" data-bs-toggle="pill" href="#line-family"
                                        role="tab" aria-controls="pills-family" aria-selected="false"
                                        tabindex="-1">Family</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="line-emergencycontact-tab" data-bs-toggle="pill"
                                        href="#line-emergencycontact" role="tab" aria-controls="pills-emergencycontact"
                                        aria-selected="false" tabindex="-1">Emergency Contact</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="line-official-tab" data-bs-toggle="pill"
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
                                                <select class="form-select form-control custom-input" id="salutation"
                                                    name="salutation" required>
                                                    <option value="" selected disabled>Select Salutation</option>
                                                    <option value="Mr." {{ old('salutation')=='Mr.' ? 'selected' : ''
                                                        }}>Mr.</option>
                                                    <option value="Mrs." {{ old('salutation')=='Mrs.' ? 'selected' : ''
                                                        }}>Mrs.</option>
                                                    <option value="Miss" {{ old('salutation')=='Miss' ? 'selected' : ''
                                                        }}>Miss</option>
                                                    <option value="Ms." {{ old('salutation')=='Ms.' ? 'selected' : ''
                                                        }}>Ms.</option>
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
                                                <select class="form-select form-control" id="gender" name="gender">
                                                    <option selected disabled>Select Gender</option>
                                                    <option value="Male" {{ old('gender')=='Male' ? 'selected' : '' }}>
                                                        Male</option>
                                                    <option value="Female" {{ old('gender')=='Female' ? 'selected' : ''
                                                        }}>Female</option>
                                                    <option value="Others" {{ old('gender')=='Others.' ? 'selected' : ''
                                                        }}>Others</option>
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
                                                    <option value="Bangladeshi" {{ old('nationality')=='Bangladeshi'
                                                        ? 'selected' : '' }}>Bangladeshi</option>
                                                    <option value="Others" {{ old('nationality')=='Others' ? 'selected'
                                                        : '' }}>Others</option>\
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
                                                    <option value="A+" {{ old('blood_group')=='A+' ? 'selected' : '' }}>
                                                        A+</option>
                                                    <option value="A-" {{ old('blood_group')=='A-' ? 'selected' : '' }}>
                                                        A-</option>
                                                    <option value="B+" {{ old('blood_group')=='B+' ? 'selected' : '' }}>
                                                        B+</option>
                                                    <option value="B-" {{ old('blood_group')=='B-' ? 'selected' : '' }}>
                                                        B-</option>
                                                    <option value="AB+" {{ old('blood_group')=='AB+' ? 'selected' : ''
                                                        }}>AB+</option>
                                                    <option value="AB-" {{ old('blood_group')=='AB-' ? 'selected' : ''
                                                        }}>AB-</option>
                                                    <option value="O+" {{ old('blood_group')=='O+' ? 'selected' : '' }}>
                                                        O+</option>
                                                    <option value="O-" {{ old('blood_group')=='O-' ? 'selected' : '' }}>
                                                        O-</option>
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
                                                    <option value="3month" {{ old('probation_period')=='3month'
                                                        ? 'selected' : '' }}>3 month</option>
                                                    <option value="4month" {{ old('probation_period')=='4month'
                                                        ? 'selected' : '' }}>4 month</option>
                                                    <option value="6month" {{ old('probation_period')=='6month'
                                                        ? 'selected' : '' }}>6 month</option>

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
                                                    <option selected disabled>Reporting To</option>
                                                    <option value="MasudAhmed" {{ old('reporting_to')=='MasudAhmed'
                                                        ? 'selected' : '' }}>Masud Ahmed</option>
                                                    <option value="Others" {{ old('reporting_to')=='Others' ? 'selected'
                                                        : '' }}>Others</option>
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
                                                    <option value="{{ $district->name }}"
                                                        {{
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
                                                @error('father_name') <span
                                                    class="text-danger">{{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="mother_name">Mothers Name</label>
                                                <input type="text" class="form-control" id="mother_name"
                                                    name="mother_name" placeholder="Mother Name"
                                                    value="{{ old('mother_name') }}">
                                                @error('mother_name') <span
                                                    class="text-danger">{{ $message}}</span>@enderror
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
                                                        @error('spouse_name') <span
                                                            class="text-danger">{{ $message}}</span>
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
                                                        @error('spouse_occupation') <span
                                                            class="text-danger">{{ $message}}</span>
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
                                                        @error('spouse_organization') <span
                                                            class="text-danger">{{ $message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="spouse_mobile">Spouse's Mobile No</label>
                                                        <input type="text" class="form-control" id="spouse_mobile"
                                                            name="spouse_mobile" placeholder="Enter Spouse's Mobile No"
                                                            value="{{ old('spouse_mobile') }}">
                                                        @error('spouse_mobile') <span
                                                            class="text-danger">{{ $message}}</span>
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
                                                        @error('spouse_dob') <span
                                                            class="text-danger">{{ $message}}</span>
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
                                                <label for="emrgency_contact_person">Emergency Contact Person Name<span
                                                        class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" id="emrgency_contact_person"
                                                    name="emrgency_contact_person"
                                                    placeholder="Emergency Contact Person Name"
                                                    value="{{ old('emrgency_contact_person') }}">
                                                @error('emrgency_contact_person') <span
                                                    class="text-danger">{{ $message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="relation">Relation</label>
                                                <select class="form-select form-control" id="relation" name="relation"
                                                    placeholder="Expense Category">
                                                    <option value="" selected disabled>Select Relation</option>
                                                    <option value="Brother" {{ old('relation')=='Brother'
                                                        ? 'selected' : '' }}>Brother</option>
                                                    <option value="Others" {{ old('relation')=='Others' ? 'selected'
                                                        : '' }}>Others</option>
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
                                                @error('emergency_contact') <span
                                                    class="text-danger">{{ $message}}</span>
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
                                                @error('emergency_address') <span
                                                    class="text-danger">{{ $message}}</span>
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
                                                    @foreach ( $holidays as $holiday )
                                                    <option value="{{ $holiday->id }}" {{
                                                        old('holiday_id')==$holiday->id ? 'selected' : '' }}>
                                                        {{ $holiday->holiday_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="email2">Shift</label>
                                                <select class="form-select form-control mb-3"
                                                    aria-label="Default select example" name="shift_id">
                                                    <option disabled selected>Select Shift</option>
                                                    @foreach ( $shifts as $shift )
                                                    <option value="{{ $shift->id }}" {{
                                                        old('shift_id')==$shift->id ? 'selected' : '' }}>
                                                        {{ $shift->shift_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Overtime Enable</label>
                                                <select class="form-select form-control" id="overtime_enable">
                                                    <option value="" selected disabled>Select Overtime Enable</option>
                                                    <option value="1" {{ old('overtime_enable')=='1'
                                                        ? 'selected' : '' }}>Yes</option>
                                                    <option value="0" {{ old('overtime_enable')=='0'
                                                        ? 'selected' : '' }}>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Salary Type</label>
                                                <select class="form-select form-control" id="sallery_type"
                                                    onchange="toggleBank()">
                                                    <option value="Cash" {{ old('sallery_type')=='Cash'
                                                        ? 'selected' : '' }}>Cash</option>
                                                    <option value="Bank" {{ old('sallery_type')=='Bank'
                                                        ? 'selected' : '' }}>Bank</option>
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
                                                        @error('bank_name') <span
                                                            class="text-danger">{{ $message}}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="account_holder_name">Account Holder Name</label>
                                                        <input type="text" class="form-control" id="account_holder_name"
                                                            name="account_holder_name"
                                                            placeholder="Enter Account Holder Name"
                                                            value="{{ old('account_holder_name') }}">
                                                        @error('account_holder_name') <span
                                                            class="text-danger">{{ $message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="branch_name">Branch Name</label>
                                                        <input type="text" class="form-control" id="branch_name"
                                                            name="branch_name" placeholder="Enter Branch Name"
                                                            value="{{ old('branch_name') }}">
                                                        @error('branch_name') <span
                                                            class="text-danger">{{ $message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="account_number">Account Number</label>
                                                        <input type="text" class="form-control" id="account_number"
                                                            name="account_number" placeholder="Enter Account Number"
                                                            value="{{ old('account_number') }}">
                                                        @error('account_number') <span
                                                            class="text-danger">{{ $message}}</span>@enderror
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
                                                @error('official_phone') <span
                                                    class="text-danger">{{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="official_email">Official Email Address</label>
                                                <input type="text" class="form-control custom-input custom-input"
                                                    id="official_email" name="official_email"
                                                    placeholder="Official Email Address"
                                                    value="{{ old('official_email') }}">
                                                @error('official_email') <span
                                                    class="text-danger">{{ $message}}</span>@enderror
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
                                                @error('user_email') <span
                                                    class="text-danger">{{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control custom-input custom-input"
                                                    id="password" name="password" placeholder="Password">
                                                @error('password') <span
                                                    class="text-danger">{{ $message}}</span>@enderror
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
                        <div class="card-footer text-end">
                            <button type="submit" class="submit-button-1"><i class='bx bx-upload bx-flashing'></i>
                                Submit</button>
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
                        <option value="graduate">Graduate</option>
                        <option value="undergraduate">Undergraduate</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="education">Education</label>
                    <select class="form-select form-control" name="education[]">
                        <option value="SSC">SSC</option>
                        <option value="HSC">HSC</option>
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
            <div class="col-sm-8">
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
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="result_type">Result Type</label>
                    <select class="form-select form-control" name="result_type[]">
                        <option value="Gpa">GPA</option>
                        <option value="Cgpa">CGPA</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="cgpa">CGPA</label>
                    <input type="text" class="form-control" name="cgpa[]" placeholder="CGPA">
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
                    <input type="number" class="form-control" name="duration[]" placeholder="Enter duration">
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
                    <select class="form-select form-control" name="course_duration[]">
                        <option value="3">3 Months</option>
                        <option value="6">6 Months</option>
                    </select>
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

            <div class="col-sm-3">
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
            <div class="col-sm-7">
                <div class="form-group">
                    <label for="institute_address">Institute Address</label>
                    <input type="text" class="form-control" name="institute_address[]" placeholder="Institute Address">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="resource">Trainer/Resource</label>
                    <input type="text" class="form-control" name="resource[]" placeholder="Trainer/Resource">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="result">Result</label>
                    <input type="text" class="form-control" name="result[]" placeholder="Result">
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

@endpush
