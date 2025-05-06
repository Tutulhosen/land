@extends('layouts.admin')
@section('title','Employees Edit')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('employee.update', $employee->id) }}" id="employeeForm" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header project-details-card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="project-details-card-header-title"><i class='bx bx-user bx-tada'></i>Edit
                                    Employee</h4>
                            </div>
                        </div>
                        <div class="text-center m-3">
                            <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link active" id="line-personalinformation-tab"
                                        data-bs-toggle="pill" href="#line-personalinformation" role="tab"
                                        aria-controls="pills-personalinformation" aria-selected="true">Personal
                                        Information</a>
                                </li>
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link" id="line-contactinformation-tab"
                                        data-bs-toggle="pill" href="#line-contactinformation" role="tab"
                                        aria-controls="pills-contactinformation" aria-selected="true">Contact
                                        Information</a>
                                </li>
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link" id="line-official-tab" data-bs-toggle="pill"
                                        href="#line-official" role="tab" aria-controls="pills-official"
                                        aria-selected="false" tabindex="-1">Official Information</a>
                                </li>
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link" id="line-granter-tab" data-bs-toggle="pill"
                                        href="#line-granter" role="tab" aria-controls="pills-granter"
                                        aria-selected="false" tabindex="-1">Granter Information</a>
                                </li>
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link" id="line-reference-tab" data-bs-toggle="pill"
                                        href="#line-reference" role="tab" aria-controls="pills-reference"
                                        aria-selected="false" tabindex="-1">Reference Information</a>
                                </li>
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link" id="line-education-tab" data-bs-toggle="pill"
                                        href="#line-education" role="tab" aria-controls="pills-education"
                                        aria-selected="false" tabindex="-1">Education History</a>
                                </li>
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link" id="line-experience-tab" data-bs-toggle="pill"
                                        href="#line-experience" role="tab" aria-controls="pills-experience"
                                        aria-selected="false" tabindex="-1">Experiance History</a>
                                </li>
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link" id="line-training-tab" data-bs-toggle="pill"
                                        href="#line-training" role="tab" aria-controls="pills-training"
                                        aria-selected="false" tabindex="-1">Training History</a>
                                </li>
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link" id="line-payrollinformation-tab"
                                        data-bs-toggle="pill" href="#line-payrollinformation" role="tab"
                                        aria-controls="pills-payrollinformation" aria-selected="false"
                                        tabindex="-1">PayRoll Information</a>
                                </li>

                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content mt-3 mb-3" id="line-tabContent">
                                <!--personalinformation Information-->
                                <div class="tab-pane fade show active" id="line-personalinformation" role="tabpanel"
                                    aria-labelledby="line-personalinformation-tab">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="small-label-text">Salutation</label>
                                                <select class="form-select form-control select2" name="salutation"
                                                    placeholder="Salutation" >
                                                    <option disabled>Select Salutation</option>
                                                    @foreach ($salutations as $salutation)
                                                    <option value="{{ $salutation->id }}" {{$employee->salutation == $salutation->id ? 'selected' : ''}}>
                                                        {{ $salutation->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('salutation') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="first_name">First Name<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control  "
                                                    id="first_name" name="first_name" placeholder="Enter First Name"
                                                    value="{{$employee->first_name }}" required>
                                                @error('first_name') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="last_name">Last Name<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control "
                                                    id="last_name" name="last_name" placeholder="Enter Last Name"
                                                    value="{{$employee->last_name }}" required>
                                                @error('last_name') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="emp_id">Employee Id<span class="text-danger"> *</span></label>
                                                <input type="text" class="form-control"
                                                    id="emp_id" name="emp_id" placeholder="Enter Employee Id: (EMP-000)"
                                                    value="{{$employee->emp_id }}" required>
                                                @error('emp_id') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="gender">Gender<span class="text-danger">*</span></label>
                                                <select class="form-select form-control  select2" name="gender"
                                                    placeholder="Gender" required>
                                                    <option disabled>Select Gender</option>
                                                    @foreach ($genders as $gender)
                                                    <option value="{{ $gender->id }}" {{$employee->gender == $gender->id ? 'selected' : ''}}>
                                                        {{ $gender->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('gender') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="religion">Religion<span class="text-danger"> *</span></label>
                                                <select class="form-select form-control  select2" name="religion"
                                                    placeholder="Religion" required>
                                                    <option selected disabled>Select Religion</option>
                                                    @foreach ($religions as $religion)
                                                    <option value="{{ $religion->id }}" {{$employee->religion == $religion->id ? 'selected' : ''}}>
                                                        {{ $religion->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('religion') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="nationality">Nationality<span class="text-danger">
                                                    *</span></label>
                                                <select class="form-select form-control  select2" name="nationality"
                                                    placeholder="Nationality" required>
                                                    <option disabled>Select Nationality</option>
                                                    @foreach ($nationalities as $nationality)
                                                    <option value="{{ $nationality->id }}" {{$employee->nationality == $nationality->id ? 'selected' : ''}}>
                                                        {{ $nationality->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="blood_group">Blood Group</label>
                                                <select class="form-select form-control  select2" id="blood_group"
                                                    name="blood_group">
                                                    <option value="" disabled>Select Blood Group</option>
                                                    @foreach ($bloodgroups as $bloodgroup)
                                                    <option value="{{$bloodgroup->id}}" {{$employee->blood_group == $bloodgroup->id ? 'selected' : ''}}>{{$bloodgroup->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('blood_group') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="identification_type">Identification Type</label>
                                                <select class="form-select form-control select2" id="identification_type"
                                                    name="identification_type">
                                                    <option value="" disabled>Select Identification Type</option>
                                                    <option value="Birth Registration Number" {{$employee->identification_type == "Birth Registration Number" ? 'selected' : ''}}>Birth Registration Number</option>
                                                    <option value="NID Old" {{$employee->identification_type == "NID Old" ? 'selected' : ''}}>NID Old</option>
                                                    <option value="NID New" {{$employee->identification_type == "NID New" ? 'selected' : ''}}>NID New</option>
                                                    <option value="Passport" {{$employee->identification_type == "Passport" ? 'selected' : ''}}>Passport</option>
                                                    <option value="Driving Licence" {{$employee->identification_type == "Driving Licence" ? 'selected' : ''}}>Driving Licence</option>
                                                    <option value="Others" {{$employee->identification_type == "Others" ? 'selected' : ''}}>Others</option>
                                                </select>
                                                @error('identification_type') <span
                                                    class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="identification_number">Identification Number</label>
                                                <input type="text" class="form-control  "
                                                    id="identification_number" name="identification_number"
                                                    placeholder="Enter Identification Number"
                                                    value="{{$employee->identification_number }}">
                                                @error('identification_number') <span
                                                    class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="dob">Date Of Birth<span
                                                        class="text-danger">
                                                        *</span></label>
                                                <input type="text" class="form-control  datepicker"
                                                    id="dob" name="dob"
                                                    placeholder="Enter Date Of Birth"
                                                    value="{{$employee->dob}}" required>
                                                @error('dob') <span
                                                    class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="fathers_name">Father's Name</label>
                                                <input type="text" class="form-control  "
                                                    id="fathers_name" name="fathers_name"
                                                    placeholder="Enter Father's Name" value="{{ $employee->fathers_name}}">
                                                @error('fathers_name') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="mothers_name">Mother's Name</label>
                                                <input type="text" class="form-control  "
                                                    id="mothers_name" name="mothers_name"
                                                    placeholder="Enter Mother's Name" value="{{ $employee->mothers_name }}">
                                                @error('mothers_name') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="marital_status">Marital Status</label>
                                                <select class="form-select form-control  select2" id="marital_status"
                                                    name="marital_status">
                                                    <option value="" disabled>Select Marital Status</option>
                                                    <option value="Single" {{$employee->marital_status == "Single" ? 'selected' : ''}}>Single</option>
                                                    <option value="Married" {{$employee->marital_status == "Married" ? 'selected' : ''}}>Married</option>
                                                    <option value="Divorced" {{$employee->marital_status == "Divorced" ? 'selected' : ''}}>Divorced</option>
                                                </select>
                                                @error('marital_status') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 spouse-field ">
                                            <div class="card bg-primary-subtle mb-0 mt-4">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="spouse_name">Spouse Name</label>
                                                                <input type="text" class="form-control" id="spouse_name"
                                                                    name="spouse_name" placeholder="Enter Spouse Name"
                                                                    value="{{ $employee->spouse_name }}">
                                                                @error('spouse_name') <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="spouse_occupation">Spouse Occupation</label>
                                                                <input type="text" class="form-control" id="spouse_occupation"
                                                                    name="spouse_occupation" placeholder="Enter Spouse Occupation"
                                                                    value="{{ $employee->spouse_occupation }}">
                                                                @error('spouse_occupation') <span
                                                                    class="text-danger">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="spouse_organization">Spouse's Organization</label>
                                                                <input type="text" class="form-control" id="spouse_organization"
                                                                    name="spouse_organization" placeholder="Enter Spouse's Organization"
                                                                    value="{{ $employee->spouse_organization }}">
                                                                @error('spouse_organization') <span
                                                                    class="text-danger">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="spouse_mobile">Spouse's Mobile No</label>
                                                                <input type="text" class="form-control" id="spouse_mobile"
                                                                    name="spouse_mobile" placeholder="Enter Spouse's Mobile No"
                                                                    value="{{$employee->spouse_mobile}}">
                                                                @error('spouse_mobile') <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="spouse_nid_number">Spouse NID Number</label>
                                                                <input type="text" class="form-control" id="spouse_nid_number"
                                                                    name="spouse_nid_number" placeholder="Spouse NID Number" value="{{ $employee->spouse_nid_number }}">
                                                                @error('spouse_nid_number') <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="spouse_nid">Spouse NID</label>
                                                                <input type="file" class="form-control" id="spouse_nid"
                                                                    name="spouse_nid">
                                                                    @if (!empty($employee->spouse_nid))
                                                                    <div>{{ basename($employee->spouse_nid) }}</div>
                                                                @endif

                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="spouse_dob">Spouse's Date of Birth</label>
                                                                <input type="text" class="form-control datepicker" name="spouse_dob"
                                                                    id="spouse_dob" value="{{ $employee->spouse_dob }}">
                                                                @error('spouse_dob') <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Contact Information-->
                                <div class="tab-pane fade" id="line-contactinformation" role="tabpanel"
                                    aria-labelledby="line-contactinformation-tab">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="contact_number">Contact Number<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control " id="contact_number"
                                                    name="contact_number" value="{{ $employeeContact->contact_number }}"
                                                    placeholder="Enter Contact Numbers" required>
                                                @error('contact_number') <span class="text-danger">{{ $message}}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input type="email" class="form-control  "
                                                    id="email" name="email" value="{{ $employeeContact->email }}"
                                                    placeholder="Email Address">
                                                @error('email') <span class="text-danger">{{ $message
                                                    }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>WhatsApp Number</label>
                                                <input type="text" class="form-control  "
                                                    id="whatsapp" name="whatsapp" value="{{ $employeeContact->whatsapp }}"
                                                    placeholder="Whatsapp">
                                                @error('whatsapp') <span class="text-danger">{{ $message
                                                    }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label for="pres_add">Present Address</label>
                                                <input type="text" class="form-control" value="{{ $employeeContact->pres_add }}"
                                                    id="pres_add" name="pres_add" placeholder="Full Address">
                                                @error('pres_add') <span class="text-danger">{{ $message
                                                    }}</span>
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
                                                <label for="district">District</label>
                                                <select class="form-select form-control select2" id="district" name="district">
                                                    @foreach ($districts as $district )
                                                    <option value="{{ $district->name }}" {{ $employeeContact->district ==$district->name ? 'selected' : '' }}>
                                                        {{ $district->name }}
                                                    </option>
                                                    @endforeach
                                                    @error('district') <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="postal_code">Postal Code</label>
                                                <input type="text" class="form-control" id="postal_code"
                                                    name="postal_code" value="{{ $employeeContact->postal_code }}"
                                                    placeholder="Postal Code">
                                                @error('postal_code') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label for="permanent_add">Permanent Address</label>
                                                <input type="text" class="form-control" id="permanent_add"
                                                    name="permanent_add" value="{{ $employeeContact->permanent_add }}"
                                                    placeholder="Full Address">
                                                @error('permanent_add') <span class="text-danger">{{ $message}}</span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="email2">District</label>
                                                <select class="form-select form-control select2" id="permanent_district"
                                                    name="permanent_district" placeholder="Expense Category">
                                                    @foreach ($districts as $district )
                                                    <option value="{{ $district->name }}"
                                                        {{ $employeeContact->district ==$district->name ? 'selected' : '' }}>
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
                                                    value="{{ $employeeContact->permanent_postal_code }}"
                                                    placeholder="Postal Code">
                                                @error('permanent_postal_code') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card mb-0 mt-4 bg-info-subtle">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Emergency Contact Information</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="emergency_contact_person">Emergency Contact Person
                                                                    Name</label>
                                                                <input type="text" class="form-control" id="emergency_contact_person"
                                                                    name="emergency_contact_person"
                                                                    placeholder="Emergency Contact Person Name"
                                                                    value="{{ $employeeContact->emergency_contact_person}}">
                                                                @error('emergency_contact_person') <span
                                                                    class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="relation">Relation</label>
                                                                <select class="form-select form-control select2" id="relation" name="relation"
                                                                    placeholder="Expense Category">
                                                                    <option value="" selected disabled>Select Relation</option>
                                                                    @foreach ($relations as $relation)
                                                                    <option value="{{$relation->id}}"
                                                                        {{ $employeeContact->relation ==$relation->id ? 'selected' : '' }}>{{$relation->name}}</option>
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
                                                                    value="{{ $employeeContact->occupation}}">
                                                                @error('occupation') <span class="text-danger">{{ $message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="emergency_contact">Contact Number</label>
                                                                <input type="text" class="form-control "
                                                                    id="emergency_contact" name="emergency_contact"
                                                                    placeholder="Contact Number" value="{{ $employeeContact->emergency_contact}}">
                                                                @error('emergency_contact') <span class="text-danger">{{
                                                                                $message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="emergency_email">Email</label>
                                                                <input type="email" class="form-control "
                                                                    id="emergency_email" name="emergency_email" placeholder="Email"
                                                                    value="{{ $employeeContact->emergency_email}}">
                                                                @error('emergency_email') <span class="text-danger">{{ $message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="emergency_address">Address</label>
                                                                <input type="text" class="form-control" id="emergency_address"
                                                                    name="emergency_address" placeholder="Full Address"
                                                                    value="{{ $employeeContact->emergency_address}}">
                                                                @error('emergency_address') <span class="text-danger">{{
                                                                                $message}}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Official-->
                                <div class="tab-pane fade" id="line-official" role="tabpanel"
                                    aria-labelledby="line-official-tab">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="employee_type">Employee Type <span class="text-danger">*</span></label>
                                                <select class="form-select form-control  select2" name="employee_type"
                                                    placeholder="Employee Type" required>
                                                    <option selected disabled>Select Employee Type</option>
                                                    @foreach ($employee_types as $employee_type)
                                                        <option value="{{ $employee_type->id }}"
                                                            {{ optional($officialInformation)->employee_type == $employee_type->id ? 'selected' : '' }}>
                                                            {{ $employee_type->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('employee_type') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="branch">Branch <span class="text-danger">*</span></label>
                                                <select class="form-select form-control mb-3 select2" aria-label="Default select example"
                                                name="branch_id" id="branch_id" required>
                                                    <option selected disabled>Select Branch</option>
                                                    @foreach ($branches as $branch)
                                                    <option value="{{ $branch->id }}"{{ optional($officialInformation)->branch_id == $branch->id ? 'selected' : '' }}>
                                                        {{ $branch->name }} ({{ $branch->branch_code}})
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('branch_id') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="department_id">Department<span class="text-danger">*</span></label>
                                                <select class="form-select form-control mb-3 select2" aria-label="Default select example"
                                                    name="department_id" id="department_id" required>
                                                    <option selected disabled>Select Department</option>
                                                    @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}"
                                                        {{ optional($officialInformation)->department_id == $department->id ? 'selected' : '' }}>
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
                                                <label for="email2">Designation</label>
                                                <select class="form-select mb-3 form-control select2" aria-label="Default select example"
                                                    name="designation_id" id="designation_id">
                                                    <option selected disabled>Select Designation</option>
                                                    @foreach ($designations as $designation)
                                                    <option value="{{ $designation->id }}" {{ optional($officialInformation)->designation_id == $designation->id ? 'selected' : '' }}>
                                                        {{ $designation->designation_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('designation_id') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="grade">Grade</label>
                                                <select class="form-select form-control mb-3 select2" aria-label="Default select example"
                                                name="grade_id" id="grade_id">
                                                    <option selected disabled>Select Grade</option>
                                                    @foreach ($grades as $grade)
                                                    <option value="{{$grade->id}}" {{ optional($officialInformation)->grade_id == $grade->id ? 'selected' : '' }}> {{$grade->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('grade_id') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card mb-0 mt-4 bg-info-subtle">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Reporting Information</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">

                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label>Reporting To (First)</label>
                                                                <select class="form-select form-control select2" id="reporting_to_first"
                                                                    name="reporting_to_first">
                                                                    <option value="" selected>Reporting To (First)</option>
                                                                    @foreach ($employeeinfos as $employeeinfo)
                                                                    <option value="{{$employeeinfo->id}}" {{ optional($officialInformation)->reporting_to_first == $employeeinfo->id ? 'selected' : '' }}>
                                                                        {{$employeeinfo->salutations ? $employeeinfo->salutations->name :''}}
                                                                        {{$employeeinfo->first_name}} {{$employeeinfo->last_name}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('reporting_to_first') <span
                                                                    class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label>Reporting To (Second)</label>
                                                                <select class="form-select form-control select2" id="reporting_to_second"
                                                                    name="reporting_to_second">
                                                                    <option value="" selected>Reporting To (Second)</option>
                                                                    @foreach ($employeeinfos as $employeeinfo)
                                                                    <option value="{{$employeeinfo->id}}" {{ optional($officialInformation)->reporting_to_second == $employeeinfo->id ? 'selected' : '' }}>
                                                                        {{$employeeinfo->salutations ? $employeeinfo->salutations->name :''}}
                                                                        {{$employeeinfo->first_name}} {{$employeeinfo->last_name}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('reporting_to_second') <span
                                                                    class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label>Reporting To (Third)</label>
                                                                <select class="form-select form-control select2" id="reporting_to_third"
                                                                    name="reporting_to_third">
                                                                    <option value="" selected>Reporting To (Third)</option>
                                                                    @foreach ($employeeinfos as $employeeinfo)
                                                                    <option value="{{$employeeinfo->id}}" {{ optional($officialInformation)->reporting_to_third == $employeeinfo->id ? 'selected' : '' }}>
                                                                        {{$employeeinfo->salutations ? $employeeinfo->salutations->name :''}}
                                                                        {{$employeeinfo->first_name}} {{$employeeinfo->last_name}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('reporting_to_third') <span
                                                                    class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="project_id">Project</label>
                                                <select class="form-select form-control mb-3 select2" aria-label="Default select example"
                                                name="project_id" id="project_id">
                                                    <option selected disabled>Select Project</option>
                                                    @foreach ($projects as $project)
                                                    <option value="{{$project->id}}" {{ optional($officialInformation)->project_id == $project->id ? 'selected' : '' }}> {{$project->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('project_id') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="notice_start_date">Notice Period Start Date</label>
                                                <input type="text" class="form-control  datepicker"
                                                    id="notice_start_date" name="notice_start_date"
                                                    value="{{ optional($officialInformation)->notice_start_date }}">
                                                @error('notice_start_date') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="notice_end_date">Notice Period End Date</label>
                                                <input type="text" class="form-control  datepicker"
                                                    id="notice_end_date" name="notice_end_date"
                                                    value="{{ optional($officialInformation)->notice_end_date }}">
                                                @error('notice_end_date') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> --}}
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="official_phone">Official Phone Number</label>
                                                <input type="text" class="form-control  "
                                                    id="official_phone" name="official_phone"
                                                    placeholder="Official Phone Number"
                                                    value="{{ optional($officialInformation)->official_phone }}">
                                                @error('official_phone') <span class="text-danger">{{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="official_email">Official Email Address</label>
                                                <input type="text" class="form-control  "
                                                    id="official_email" name="official_email"
                                                    placeholder="Official Email Address"
                                                    value="{{ optional($officialInformation)->official_email }}">
                                                @error('official_email') <span class="text-danger">{{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="official_whatsapp">Official WhatsApp</label>
                                                <input type="text" class="form-control  "
                                                    id="official_whatsapp" name="official_whatsapp"
                                                    placeholder="Official WhatsApp"
                                                    value="{{ optional($officialInformation)->official_whatsapp }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="user_email">Email</label>
                                                <input type="email" class="form-control  "
                                                    id="user_email" name="user_email" placeholder="Email"
                                                    value="{{ optional($officialInformation)->user_email }}">
                                                @error('user_email') <span class="text-danger">{{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="text" class="form-control  "
                                                    id="password" name="password" placeholder="Password">
                                                @error('password') <span class="text-danger">{{ $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="login_allowed">Login Allowed?</label>
                                                <select class="form-select form-control" id="login_allowed"
                                                    name="login_allowed">
                                                    <option value="1" {{ optional($officialInformation)->login_allowed == 1 ? 'selected' : '' }}>Yes</option>
                                                    <option value="0" {{ optional($officialInformation)->login_allowed == 0 ? 'selected' : '' }}>No</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--Granter-->
                                <div class="tab-pane fade" id="line-granter" role="tabpanel"
                                    aria-labelledby="line-granter-tab">
                                    @foreach ($granterInformations as $granterInformation)
                                    <div class="soft-bg-3 row border rounded p-3">
                                        <div class="col-sm-4" style="display: none;">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="granter[]" placeholder="Granter" value="{{ $granterInformation->id }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="granter_name">Granter Name</label>
                                                <input type="text" class="form-control" name="granter_name[]" placeholder="Granter Name" value="{{ $granterInformation->granter_name }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="granter_occupation">Granter Occupation</label>
                                                <input type="text" class="form-control" name="granter_occupation[]" placeholder="Granter Occupation" value="{{ $granterInformation->granter_occupation }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="granter_contact_number">Granter Contact Number</label>
                                                <input type="text" class="form-control" name="granter_contact_number[]" placeholder="Granter Contact Number" value="{{ $granterInformation->granter_contact_number }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                    <label for="granter_relation">Relation with Granter</label>
                                                    <select class="form-select form-control select2" id="granter_relation" name="granter_relation[]"
                                                        placeholder="Expense Category">
                                                        <option value="" selected disabled>Select Relation</option>
                                                        @foreach ($relations as $relation)
                                                        <option value="{{$relation->id}}" {{ $granterInformation->granter_relation == $relation->id ? 'selected' : '' }}>{{$relation->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('relation') <span class="text-danger">{{ $message}}</span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="granter_address">Granter Address</label>
                                                <input type="text" class="form-control" name="granter_address[]" placeholder="Granter Address" value="{{ $granterInformation->granter_address }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="granter_id_number">Granter ID Number</label>
                                                <input type="text" class="form-control" name="granter_id_number[]" placeholder="Granter ID Number" value="{{ $granterInformation->granter_id_number }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="granter_id_doc">Upload Granter ID</label>
                                                <input type="file" class="form-control" name="granter_id_doc[]" placeholder="Upload Granter ID">
                                                @if (!empty($granterInformation->granter_id_doc))
                                                    <div>{{ basename($granterInformation->granter_id_doc) }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        </div>
                                    @endforeach
                                    <div id="granterFormContainer"></div>
                                    <button id="addgranterFormBtn" class="btn btn-primary" type="button">+Add
                                        Granter</button>
                                </div>
                                <!--Reference-->
                                <div class="tab-pane fade" id="line-reference" role="tabpanel"
                                    aria-labelledby="line-reference-tab">
                                    @foreach ($referenceInformations as $referenceInformation)
                                    <div class="soft-bg-3 row border rounded p-3">
                                        <div class="col-sm-4" style="display: none;">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="reference[]" placeholder="reference" value="{{ $referenceInformation->id }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="reference_name">Reference Name</label>
                                                <input type="text" class="form-control" name="reference_name[]" placeholder="Reference Name" value="{{ $referenceInformation->reference_name }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="reference_occupation">Reference Occupation</label>
                                                <input type="text" class="form-control" name="reference_occupation[]" placeholder="Reference Occupation" value="{{ $referenceInformation->reference_occupation }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="reference_contact_number">Reference Contact Number</label>
                                                <input type="text" class="form-control" name="reference_contact_number[]" placeholder="Reference Contact Number" value="{{ $referenceInformation->reference_contact_number }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                    <label for="reference_relation">Relation with Reference</label>
                                                    <select class="form-select form-control select2" id="reference_relation" name="reference_relation[]"
                                                        placeholder="Expense Category">
                                                        <option value="" disabled>Select Relation</option>
                                                        @foreach ($relations as $relation)
                                                        <option value="{{$relation->id}}" {{$referenceInformation->reference_relation == $relation->id ? "selected" : ""}}>{{$relation->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('relation') <span class="text-danger">{{ $message}}</span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="reference_address">Reference Address</label>
                                                <input type="text" class="form-control" name="reference_address[]" placeholder="Reference Address" value="{{ $referenceInformation->reference_address }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="reference_id_number">Reference ID Number</label>
                                                <input type="text" class="form-control" name="reference_id_number[]" placeholder="Reference ID Number" value="{{ $referenceInformation->reference_id_number }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="reference_id_doc">Upload Reference ID</label>
                                                <input type="file" class="form-control" name="reference_id_doc[]" placeholder="Upload Reference ID">
                                                @if (!empty($referenceInformation->reference_id_doc))
                                                    <div>{{ basename($referenceInformation->reference_id_doc) }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        </div>
                                    @endforeach
                                    <div id="referenceFormContainer"></div>
                                    <button id="addreferenceFormBtn" class="btn btn-primary" type="button">+Add
                                        Reference</button>
                                </div>
                                <!--Education-->
                                <div class="tab-pane fade" id="line-education" role="tabpanel"
                                    aria-labelledby="line-education-tab">
                                    @foreach ($employeeEducations as $employeeEducation)
                                    <div class="soft-bg-3 row border rounded p-3">
                                        <div class="col-sm-4" style="display: none;">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="education_number[]" placeholder="education number" value="{{ $employeeEducation->id }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="education_type">Education Type</label>
                                                <select class="form-select form-control select2" name="education_type[]">
                                                    <option  selected disabled>Select Education Type</option>
                                                    @foreach ($educationtypes as $educationtype)
                                                        <option value="{{$educationtype->id}}" {{ $employeeEducation->education_type == $educationtype->id ? 'selected' : '' }}>{{$educationtype->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="education">Education Level</label>
                                                <select class="form-select form-control select2" name="education[]">
                                                     <option  selected disabled>Select Education</option>
                                                    @foreach ($educations as $education)
                                                        <option value="{{$education->id}}" {{ $employeeEducation->education == $education->id ? 'selected' : '' }}>{{$education->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                @php
                                                    $subjects = DB::table('education_subjects')->get();
                                                @endphp
                                                <label for="group_major_subject">Group / Major Subject</label>
                                                <select class="form-select form-control select2" name="group_major_subject[]">
                                                    <option  selected disabled>Select Education</option>
                                                    @foreach ($subjects as $subject)
                                                        <option value="{{$subject->name}}" {{ $employeeEducation->group_major_subject == $subject->name ? 'selected':''}}>{{$subject->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="passing_year">Passing Year</label>
                                                <input type="text" class="form-control" name="passing_year[]" placeholder="Passing Year" value="{{ $employeeEducation->passing_year }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="institute_name">Institute Name</label>
                                                <input type="text" class="form-control" name="institute_name[]" placeholder="Institute Name" value="{{ $employeeEducation->institute_name }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                @php
                                                    $boards = DB::table('education_boards')->get();
                                                @endphp
                                                <label for="board_university">Board/University</label>
                                                <select class="form-select form-control select2" name="board_university[]">
                                                    <option  selected disabled>Select Education</option>
                                                    @foreach ($boards as $board)
                                                        <option value="{{$board->name}}" {{ $employeeEducation->board_university == $board->name ? 'selected':'' }}>{{$board->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="result">Result <span class="text-danger">(Result with GPA or CGPA)</span></label>
                                                <input type="text" class="form-control" name="result[]" placeholder="Result( CGPA: 3.5 )" value="{{ $employeeEducation->result_university }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="education_doc">Certificate/Documents</label>
                                                <input type="file" class="form-control" name="education_doc[]" placeholder="Certificate/Documents">
                                                @if (!empty($employeeEducation->education_doc))
                                                    <div>{{ basename($employeeEducation->education_doc) }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        </div>
                                    @endforeach
                                    <div id="formContainer"></div>
                                    <button id="addFormBtn" class="btn btn-primary" type="button">+Add
                                        Education</button>
                                </div>
                                <!--Experience-->
                                <div class="tab-pane fade" id="line-experience" role="tabpanel"
                                    aria-labelledby="line-experience-tab">
                                    @foreach ($employeeExperiences as $employeeExperience)
                                    <div class="soft-bg-3 row border rounded p-3">
                                        <div class="col-sm-4" style="display: none;">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="experience[]" placeholder="experience" value="{{ $employeeExperience->id }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="company_name">Company Name</label>
                                                <input type="text" class="form-control" name="company_name[]" placeholder="Enter Company Name" value="{{ $employeeExperience->company_name }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="job_position">Job Position</label>
                                                <input type="text" class="form-control" name="job_position[]" placeholder="Enter Job Position" value="{{ $employeeExperience->job_position }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="department">Department</label>
                                                <input type="text" class="form-control" name="department[]" placeholder="Enter Department" value="{{ $employeeExperience->department }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="job_respons">Job Responsibilities</label>
                                                <input type="text" class="form-control" name="job_respons[]" placeholder="Enter Responsibilities" value="{{ $employeeExperience->job_respons }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="from_date">From Date</label>
                                                <input type="text" class="form-control datepicker" name="from_date[]" value="{{ $employeeExperience->from_date }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="to_date">To Date</label>
                                                <input type="text" class="form-control datepicker" name="to_date[]" value="{{ $employeeExperience->to_date }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="duration">Duration (Months)</label>
                                                <input type="text" class="form-control" name="duration[]" placeholder="Enter Duration" value="{{ $employeeExperience->duration }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="projects">Working Projects Name</label>
                                                <input type="text" class="form-control" name="projects[]" placeholder="Enter Project Names" value="{{ $employeeExperience->projects }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="years_of_experience">Total Year of Experience</label>
                                                <input type="text" class="form-control" name="years_of_experience[]" placeholder="Enter Year of Experience" value="{{ $employeeExperience->years_of_experience }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="experiance_doc">Certificate/Documents</label>
                                                <input type="file" class="form-control" name="experiance_doc[]" placeholder="Certificate/Documents">
                                                @if (!empty($employeeExperience->experiance_doc))
                                                    <div>{{ basename($employeeExperience->experiance_doc) }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div id="experienceFormContainer"></div>
                                    <button id="addExperienceBtn" class="btn btn-primary" type="button">+ Add
                                        Experience</button>
                                </div>
                                <!--Training-->
                                <div class="tab-pane fade" id="line-training" role="tabpanel"
                                    aria-labelledby="line-training-tab">
                                    @foreach ($employeeTrainings as $employeeTraining)
                                    <div class="soft-bg-3 row border rounded p-3">
                                        <div class="col-sm-4" style="display: none;">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="training[]" placeholder="training" value="{{ $employeeTraining->id }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="train_type">Training Type</label>
                                                <input type="text" class="form-control" name="train_type[]" placeholder="Training Type" value="{{ $employeeTraining->train_type }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="course_title">Course Title</label>
                                                <input type="text" class="form-control" name="course_title[]" placeholder="Course Title" value="{{ $employeeTraining->course_title }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="course_duration">Course Duration</label>
                                                 <input type="text" class="form-control" name="course_duration[]" placeholder="Course Duration (In Month)" value="{{ $employeeTraining->course_duration }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="course_start">Course Start Date</label>
                                                <input type="text" class="form-control datepicker" name="course_start[]" value="{{ $employeeTraining->course_start }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="description">Course Description</label>
                                                <textarea class="form-control" rows="6" name="description[]" placeholder="Write Here">{{$employeeTraining->description}}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="course_end">Course End Date</label>
                                                <input type="text" class="form-control datepicker" name="course_end[]" value="{{ $employeeTraining->course_end }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="year">Year</label>
                                                <input type="text" class="form-control" name="year[]" placeholder="Year" value="{{ $employeeTraining->year }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="training_institute_name">Institute Name</label>
                                                <input type="text" class="form-control" name="training_institute_name[]" placeholder="Institute Name" value="{{ $employeeTraining->institute_name }}">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="resource">Trainer/Resource</label>
                                                <input type="text" class="form-control" name="resource[]" placeholder="Trainer/Resource" value="{{ $employeeTraining->resource }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="course_result">Result</label>
                                                <input type="text" class="form-control" name="course_result[]" placeholder="Course Result" value="{{ $employeeTraining->result }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="institute_address">Institute Address</label>
                                                <input type="text" class="form-control" name="institute_address[]" placeholder="Institute Address" value="{{ $employeeTraining->institute_address }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="training_doc">Certificate/Documents</label>
                                                <input type="file" class="form-control" name="training_doc[]" placeholder="Certificate/Documents">
                                                @if (!empty($employeeTraining->training_doc))
                                                    <div>{{ basename($employeeTraining->training_doc) }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div id="trainingFormContainer"></div>
                                    <button id="addTrainingBtn" class="btn btn-primary" type="button">+ Add
                                        Training</button>
                                </div>

                                <!--Payroll Contact-->
                                <div class="tab-pane fade" id="line-payrollinformation" role="tabpanel"
                                    aria-labelledby="line-payrollinformation-tab">
                                    <div class="row">
                                        <div class="col-sm-3" style="display: none;">
                                            <div class="form-group">
                                                <label for="holiday_id">Weekly holiday</label>
                                                <select class="form-select form-control mb-3 select2"
                                                    aria-label="Default select example" name="holiday_id"
                                                    id="holiday_id">
                                                    <option disabled >Select weekly holiday</option>
                                                    @foreach ($week_offs as $week_off)
                                                    <option value="{{$week_off->id}}" {{$employeePayRoll->holiday_id == $week_off->id ? "selected":""}}>{{$week_off->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="email2">Shift</label>
                                                <select class="form-select form-control mb-3 select2"
                                                    aria-label="Default select example" name="shift_id" id="shift_id">
                                                    <option disabled >Select Shift</option>
                                                    @foreach ( $shifts as $shift )
                                                    <option value="{{ $shift->id }}" {{$employeePayRoll->shift_id == $shift->id ? "selected":""}}>{{ $shift->shift_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Overtime Enable</label>
                                                <select class="form-select form-control" id="overtime_enable"
                                                    name="overtime_enable">
                                                    <option value="" selected disabled>Select Overtime Enable</option>
                                                    <option value="1" {{$employeePayRoll->overtime_enable == 1 ? "selected":""}}>Yes</option>
                                                    <option value="0" {{$employeePayRoll->overtime_enable == 0 ? "selected":""}}>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Salary Payment By</label>
                                                <select class="form-select form-control" id="sallery_payment_by"
                                                    name="sallery_payment_by" onchange="toggleBank()">
                                                    <option value="Cash" {{ $employeePayRoll->sallery_payment_by =='Cash' ? 'selected'
                                                        : '' }}>Cash</option>
                                                    <option value="Bank" {{ $employeePayRoll->sallery_payment_by =='Bank' ? 'selected'
                                                        : '' }}>Bank</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="bankDetails" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="card mb-0 mt-4 bg-info-subtle">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Bank Information</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="bank_name">Bank Name</label>
                                                                    <input type="text" class="form-control" id="bank_name"
                                                                        name="bank_name" placeholder="Enter Bank Name"
                                                                        value="{{ $employeePayRoll->bank_name }}">
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
                                                                        value="{{ $employeePayRoll->account_holder_name }}">
                                                                    @error('account_holder_name') <span class="text-danger">{{
                                                                        $message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="branch_name">Branch Name</label>
                                                                    <input type="text" class="form-control" id="branch_name"
                                                                        name="branch_name" placeholder="Enter Branch Name"
                                                                        value="{{ $employeePayRoll->branch_name }}">
                                                                    @error('branch_name') <span class="text-danger">{{
                                                                        $message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="account_number">Account Number</label>
                                                                    <input type="text" class="form-control" id="account_number"
                                                                        name="account_number" placeholder="Enter Account Number"
                                                                        value="{{$employeePayRoll->account_number }}">
                                                                    @error('account_number') <span class="text-danger">{{
                                                                        $message}}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="tin_number">TIN Number</label>
                                                <input type="text" class="form-control" id="tin_number"
                                                    name="tin_number" placeholder="Enter TIN Number"
                                                    value="{{ $employeePayRoll->tin_number }}">
                                                @error('tin_number') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="joining_date">Joining Date</label>
                                                <input type="text" class="form-control datepicker" id="joining_date"
                                                    name="joining_date" placeholder="Enter Joining Date"
                                                    value="{{ $employeePayRoll->joining_date }}">
                                                @error('joining_date') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="joining_sallery">Joining Salary</label>
                                                <input type="text" class="form-control  "
                                                    id="joining_sallery" name="joining_sallery"
                                                    value="{{ $employeePayRoll->joining_sallery }}" placeholder="Joining Salary">
                                                @error('joining_sallery') <span class="text-danger">{{ $message
                                        }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="probation_period">Probation Period (Month)</label>
                                                <input type="text" class="form-control" id="probation_period"
                                                    name="probation_period" placeholder="Enter Probation Period"
                                                    value="{{ $employeePayRoll->probation_period }}">
                                                @error('probation_period') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="probation_period_starting_date">Probation Period Start
                                                    Date</label>
                                                <input type="text" class="form-control datepicker"
                                                    id="probation_period_starting_date"
                                                    name="probation_period_starting_date"
                                                    placeholder="Enter Probation Period Start Date"
                                                    value="{{ $employeePayRoll->probation_period_starting_date }}">
                                                @error('probation_period_starting_date') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="probation_period_end_date">Probation Period End Date</label>
                                                <input type="text" class="form-control  datepicker" id="probation_period_end_date"
                                                    name="probation_period_end_date"
                                                    placeholder="Enter Probation Period Start Date"
                                                    value="{{ $employeePayRoll->probation_period_end_date }}">
                                                @error('probation_period_end_date') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="salary_type"> Salary Type</label>
                                                <select class="form-select form-control mb-3"
                                                    aria-label="Default select example" name="salary_type" id="salary_type">
                                                    <option value="Regular" {{ $employeePayRoll->salary_type == "Regular" ? "Selected" : "" }}> Regular </option>
                                                    <option value="Consuladate" {{ $employeePayRoll->salary_type == "Consuladate" ? "Selected" : "" }}> Consuladate </option>
                                                </select>
                                                @error('salary_type') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end py-3 px-3">
                            <button type="button" id="" class="cancel-button-1 previousBtn" style="display: none;"><i
                                    class='bx bx-chevron-left bx-flashing'></i>Previous</button>
                            <button type="button" class="submit-button-1 saveAndDraftBtn " onclick="confirmSubmit()"><i class='bx bx-upload bx-flashing'></i>Update and Draft</button>
                            <button type="button" id="" class="purchase-button nextBtn"><i
                                    class='bx bx-chevron-right bx-flashing'></i>Next</button>
                            <button type="button" id="" class="submit-button-1 submitBtn btn-success" onclick="confirmSubmit()"
                                style="display: none;"><i class='bx bx-upload bx-flashing'></i>Update and Close</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        function updateLabelAndPlaceholder(selectedType) {
            if (selectedType) {
                var labelText = selectedType;
                if (!selectedType.trim().toLowerCase().endsWith('number')) {
                    labelText += ' Number';
                }
                $('label[for="identification_number"]').text(labelText);
                $('#identification_number').attr('placeholder', 'Enter ' + labelText);
            } else {
                $('label[for="identification_number"]').text('Identification Number');
                $('#identification_number').attr('placeholder', 'Enter Identification Number');
            }
        }

        // On change of select
        $('#identification_type').on('change', function () {
            updateLabelAndPlaceholder($(this).val());
        });

        // Trigger on page load if value is already selected
        var initialValue = $('#identification_type').val();
        updateLabelAndPlaceholder(initialValue);
    });
</script>

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
            $(permanentDistrictSelect).trigger('change');
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
    $(document).ready(function () {
        $('#first_name, #last_name').on('change', function() {
            var firstName = $('#first_name').val();
            var lastName = $('#last_name').val();
            // Combine first name and last name
            $('#account_holder_name').val(firstName + ' ' + lastName);
        });
        function toggleSpouseDetails() {
            if ($('#marital_status').val() === 'Married') {
                $('.spouse-field').show();
            } else {
                $('.spouse-field').hide();
                $('.spouse-field input, .spouse-field select').val(''); // Clear values when hidden
            }
        }

        // Run function on page load (for edit cases)
        toggleSpouseDetails();

        // Run function on marital status change
        $('#marital_status').change(function () {
            toggleSpouseDetails();
        });
    });

</script>
<!-- bank -->
<script>
    function toggleBank() {
        const salaryType = document.getElementById("sallery_payment_by").value; // Get the selected value
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
<!-- JavaScript for Add and Remove granter Sections -->
<script>
    const addgranterFormBtn = document.getElementById("addgranterFormBtn");
    const granterFormContainer = document.getElementById("granterFormContainer");
    // Function to create a new form section
    function createNewgranterFormSection() {
        const formSection = document.createElement('div');
        formSection.classList.add('form-section', 'mb-3');


        formSection.innerHTML = `
         <div class="soft-bg-3 row border rounded p-3">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="granter_name">Granter Name</label>
                    <input type="text" class="form-control" name="granter_name[]" placeholder="Granter Name">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="granter_occupation">Granter Occupation</label>
                    <input type="text" class="form-control" name="granter_occupation[]" placeholder="Granter Occupation">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="granter_contact_number">Granter Contact Number</label>
                    <input type="text" class="form-control" name="granter_contact_number[]" placeholder="Granter Contact Number">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                        <label for="granter_relation">Relation with Granter</label>
                        <select class="form-select form-control select2" id="granter_relation" name="granter_relation[]"
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
                    <label for="granter_address">Granter Address</label>
                    <input type="text" class="form-control" name="granter_address[]" placeholder="Granter Address">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="granter_id_number">Granter ID Number</label>
                    <input type="text" class="form-control" name="granter_id_number[]" placeholder="Granter ID Number">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="granter_id_doc">Upload Granter ID</label>
                    <input type="file" class="form-control" name="granter_id_doc[]" placeholder="Upload Granter ID">
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
    addgranterFormBtn.addEventListener("click", function () {
        const newgranterFormSection = createNewgranterFormSection();
        granterFormContainer.appendChild(newgranterFormSection);
    });

    // // Add an initial form section when the page loads
    // document.addEventListener("DOMContentLoaded", function () {
    //     const initialFormSection = createNewFormSection();
    //     granterFormContainer.appendChild(initialFormSection);
    // });

</script>

<!-- JavaScript for Add and Remove reference Sections -->
<script>
    const addreferenceFormBtn = document.getElementById("addreferenceFormBtn");
    const referenceFormContainer = document.getElementById("referenceFormContainer");
    // Function to create a new form section
    function createNewreferenceFormSection() {
        const formSection = document.createElement('div');
        formSection.classList.add('form-section', 'mb-3');


        formSection.innerHTML = `
         <div class="soft-bg-3 row border rounded p-3">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="reference_name">Reference Name</label>
                    <input type="text" class="form-control" name="reference_name[]" placeholder="Reference Name">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="reference_occupation">Reference Occupation</label>
                    <input type="text" class="form-control" name="reference_occupation[]" placeholder="Reference Occupation">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="reference_contact_number">Reference Contact Number</label>
                    <input type="text" class="form-control" name="reference_contact_number[]" placeholder="Reference Contact Number">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                        <label for="reference_relation">Relation with Reference</label>
                        <select class="form-select form-control select2" id="reference_relation" name="reference_relation[]"
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
                    <label for="reference_address">Reference Address</label>
                    <input type="text" class="form-control" name="reference_address[]" placeholder="Reference Address">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="reference_id_number">Reference ID Number</label>
                    <input type="text" class="form-control" name="reference_id_number[]" placeholder="Reference ID Number">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="reference_id_doc">Upload Reference ID</label>
                    <input type="file" class="form-control" name="reference_id_doc[]" placeholder="Upload Reference ID">
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
    addreferenceFormBtn.addEventListener("click", function () {
        const newreferenceFormSection = createNewreferenceFormSection();
        referenceFormContainer.appendChild(newreferenceFormSection);
    });

    // // Add an initial form section when the page loads
    // document.addEventListener("DOMContentLoaded", function () {
    //     const initialFormSection = createNewFormSection();
    //     referenceFormContainer.appendChild(initialFormSection);
    // });

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
                    <select class="form-select form-control select2" name="education_type[]">
                        <option  selected disabled>Select Education Type</option>
                        @foreach ($educationtypes as $educationtype)
                            <option value="{{$educationtype->id}}">{{$educationtype->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="education">Education Level</label>
                    <select class="form-select form-control select2" name="education[]">
                         <option  selected disabled>Select Education</option>
                        @foreach ($educations as $education)
                            <option value="{{$education->id}}">{{$education->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    @php
                        $subjects = DB::table('education_subjects')->get();
                    @endphp
                    <label for="group_major_subject">Group / Major Subject</label>
                    <select class="form-select form-control select2" name="group_major_subject[]">
                        <option  selected disabled>Select Education</option>
                        @foreach ($subjects as $subject)
                            <option value="{{$subject->name}}">{{$subject->name}}</option>
                        @endforeach
                    </select>
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
                    @php
                        $boards = DB::table('education_boards')->get();
                    @endphp
                    <label for="board_university">Board/University</label>
                    <select class="form-select form-control select2" name="board_university[]">
                        <option  selected disabled>Select Education</option>
                        @foreach ($boards as $board)
                            <option value="{{$board->name}}">{{$board->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="result">Result ( CGPA/Division )</label>
                    <input type="text" class="form-control" name="result[]" placeholder=" 3.00/1st Class ">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="education_doc">Certificate/Documents</label>
                    <input type="file" class="form-control" name="education_doc[]" placeholder="Certificate/Documents">
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
        $('.select2').select2({
            theme: "bootstrap",
            width: "100%"
        });
    });

    // // Add an initial form section when the page loads
    // document.addEventListener("DOMContentLoaded", function () {
    //     const initialFormSection = createNewFormSection();
    //     formContainer.appendChild(initialFormSection);
    // });

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
                    <input type="text" class="form-control" name="company_name[]" placeholder="Enter Company Name">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="job_position">Job Position</label>
                    <input type="text" class="form-control" name="job_position[]" placeholder="Enter Job Position">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" class="form-control" name="department[]" placeholder="Enter Department">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="job_respons">Job Responsibilities</label>
                    <input type="text" class="form-control" name="job_respons[]" placeholder="Enter Responsibilities">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="from_date">From Date</label>
                    <input type="text" class="form-control datepicker" name="from_date[]">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="to_date">To Date</label>
                    <input type="text" class="form-control datepicker" name="to_date[]">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="duration">Duration (Months)</label>
                    <input type="text" class="form-control" name="duration[]" placeholder="Enter Duration">
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label for="projects">Working Projects Name</label>
                    <input type="text" class="form-control" name="projects[]" placeholder="Enter Project Names">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="years_of_experience">Total Year of Experience</label>
                    <input type="text" class="form-control" name="years_of_experience[]" placeholder="Enter Year of Experience">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="experiance_doc">Certificate/Documents</label>
                    <input type="file" class="form-control" name="experiance_doc[]" placeholder="Certificate/Documents">
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
        $('.datepicker').datetimepicker({
        format: 'YYYY/MM/DD',
    });
    });

    // // Add an initial form section when the page loads
    // document.addEventListener("DOMContentLoaded", function () {
    //     const initialFormSection = createNewExperienceFormSection();
    //     experienceFormContainer.appendChild(initialFormSection);
    // });

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
                    <input type="text" class="form-control datepicker" name="course_start[]">
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
                    <input type="text" class="form-control datepicker" name="course_end[]">
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
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="training_doc">Certificate/Documents</label>
                    <input type="file" class="form-control" name="training_doc[]" placeholder="Certificate/Documents">
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
        $('.datepicker').datetimepicker({
        format: 'YYYY/MM/DD',
    });
    });

    // // Initialize the form with one section by default (optional)
    // document.addEventListener("DOMContentLoaded", function () {

    //     const initialFormSection = createNewTrainingFormSection();
    //     trainingFormContainer.appendChild(initialFormSection);

    // });

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
                        designationSelect.append(
                            '<option value="" disabled>Select Designation</option>');

                        // Loop through and append designations to the dropdown
                        $.each(data, function (key, designation) {
                            designationSelect.append('<option value="' + designation.id +
                                '">' + designation.designation_name + '</option>');
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
                    url: '/dashboard/employee/designations/' +
                        departmentId, // Route to get designations
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

        // // Handle change event in the edit modal
        // $('.edit_department_id').change(function () {
        //     var departmentId = $(this).val();
        //     var designationSelect = $(this).closest('.row').find('.edit_designation_id');
        //     var selectedDesignationId = designationSelect.val(); // Get the current selected designation

        //     loadDesignationsEdit(departmentId, designationSelect, selectedDesignationId);
        // });

        // // Pre-load designations when modal opens
        // $('.edit_department_id').each(function () {
        //     var departmentId = $(this).val();
        //     var designationSelect = $(this).closest('.row').find('.edit_designation_id');
        //     var selectedDesignationId = designationSelect.val(); // Get the existing selected designation

        //     if (departmentId) {
        //         loadDesignationsEdit(departmentId, designationSelect, selectedDesignationId);
        //     }
        // });

        $('#designation_id').change(function () {
            var designationId = $(this).val();
            loadGrades(designationId, '#grade_id');
        });

        function loadGrades(designationId, gradeSelectId) {
            if (designationId) {
                $.ajax({
                    url: '/dashboard/employee/designations/grades/' + designationId,
                    type: 'GET',
                    success: function (data) {
                        var gradeSelect = $(gradeSelectId);
                        gradeSelect.empty();
                        gradeSelect.append('<option value="" disabled>Select Grade</option>');

                        $.each(data, function (key, grade) {
                            gradeSelect.append('<option value="' + grade.id + '">' + grade.name +
                                '</option>');
                        });
                    },
                    error: function () {
                        alert('Failed to load grades. Please try again.');
                    }
                });
            }

        }
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
                            var selected = selectedShiftId && selectedShiftId == shift.shift
                                .id ? 'selected' : '';
                            shiftSelect.append('<option value="' + shift.shift.id + '" ' +
                                selected + '>' + shift.shift.shift_name + '</option>');
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
                            var selected = selectedShiftId && selectedShiftId == shift.shift
                                .id ? 'selected' : '';
                            shiftSelect.append('<option value="' + shift.shift.id + '" ' +
                                selected + '>' + shift.shift.shift_name + '</option>');
                        });
                    },
                    error: function () {
                        alert('Failed to load shifts. Please try again.');
                    }
                });
            }
        }

        // // Event listener for department dropdown change in the edit modal
        // $(document).on('change', '.edit_department_id', function () {
        //     var departmentId = $(this).val();
        //     var modal = $(this).closest('.modal'); // Find the parent modal
        //     var shiftSelect = modal.find('.edit_shift_id'); // Find shift dropdown in the same modal
        //     loadShiftsEdit(departmentId, shiftSelect);
        // });

        // // When edit modal is opened, load shifts based on the selected department
        // $('.modal').on('show.bs.modal', function () {
        //     var modal = $(this);
        //     var departmentId = modal.find('.edit_department_id').val();
        //     var shiftSelect = modal.find('.edit_shift_id');
        //     var selectedShiftId = shiftSelect.attr('data-selected'); // Get the preselected shift ID

        //     if (departmentId) {
        //         loadShiftsEdit(departmentId, shiftSelect, selectedShiftId);
        //     }
        // });

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
                $('.saveAndDraftBtn').hide();
                $('.nextBtn').hide();
            } else {
                $('.nextBtn').show();
                $('.saveAndDraftBtn').show();
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
