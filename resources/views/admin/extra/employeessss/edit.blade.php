@extends('layouts.admin')
@section('title','Employees Create')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('employee.update', $employee->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header project-details-card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada'></i>Edit
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
                                                    <option value="Mr." {{ $employee->salutation =='Mr.' ? 'selected' :
                                                        ''
                                                        }}>Mr.</option>
                                                    <option value="Mrs." {{ $employee->salutation=='Mrs.' ? 'selected' :
                                                        ''
                                                        }}>Mrs.</option>
                                                    <option value="Miss" {{ $employee->salutation=='Miss' ? 'selected' :
                                                        ''
                                                        }}>Miss</option>
                                                    <option value="Ms." {{ $employee->salutation=='Ms.' ? 'selected' :
                                                        ''
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
                                                    value="{{ $employee->first_name }}" required>
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
                                                    value="{{ $employee->last_name }}" required>
                                                @error('last_name') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="gender">Gender</label>
                                                <select class="form-select form-control" id="gender" name="gender">
                                                    <option selected disabled>Select Gender</option>
                                                    <option value="Male" {{ $employee->gender=='Male' ? 'selected' : ''
                                                        }}>
                                                        Male</option>
                                                    <option value="Female" {{ $employee->gender=='Female' ? 'selected' :
                                                        ''
                                                        }}>Female</option>
                                                    <option value="Others" {{ $employee->gender=='Others.' ? 'selected'
                                                        : ''
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
                                                    <option value="Bangladeshi" {{ $employee->nationality=='Bangladeshi'
                                                        ? 'selected' : '' }}>Bangladeshi</option>
                                                    <option value="Others" {{$employee->nationality=='Others' ?
                                                        'selected'
                                                        : '' }}>Others</option>
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
                                                    <option value="A+" {{ $employee->blood_group=='A+' ? 'selected' : ''
                                                        }}>
                                                        A+</option>
                                                    <option value="A-" {{ $employee->blood_group=='A-' ? 'selected' : ''
                                                        }}>
                                                        A-</option>
                                                    <option value="B+" {{ $employee->blood_group=='B+' ? 'selected' : ''
                                                        }}>
                                                        B+</option>
                                                    <option value="B-" {{ $employee->blood_group=='B-' ? 'selected' : ''
                                                        }}>
                                                        B-</option>
                                                    <option value="AB+" {{ $employee->blood_group=='AB+' ? 'selected' :
                                                        ''
                                                        }}>AB+</option>
                                                    <option value="AB-" {{ $employee->blood_group=='AB-' ? 'selected' :
                                                        ''
                                                        }}>AB-</option>
                                                    <option value="O+" {{ $employee->blood_group=='O+' ? 'selected' : ''
                                                        }}>
                                                        O+</option>
                                                    <option value="O-" {{ $employee->blood_group=='O-' ? 'selected' : ''
                                                        }}>
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
                                                    <option value="{{ $department->id }}" {{ $employee->
                                                        department_id==$department->id ? 'selected' : '' }}>
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
                                                    <option value="{{ $designation->id }}" {{ $employee->
                                                        designation_id==$designation->id ? 'selected' : '' }}>
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
                                                    value="{{ $employee->joining_date }}" placeholder="Joining Date">
                                                @error('joining_date') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="joining_sallery">Joining Salary</label>
                                                <input type="text" class="form-control custom-input custom-input"
                                                    id="joining_sallery" name="joining_sallery"
                                                    value="{{ $employee->joining_sallery }}"
                                                    placeholder="Joining Salary">
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
                                                    <option value="3month" {{ $employee->probation_period=='3month'
                                                        ? 'selected' : '' }}>3 month</option>
                                                    <option value="4month" {{ $employee->probation_period=='4month'
                                                        ? 'selected' : '' }}>4 month</option>
                                                    <option value="6month" {{ $employee->probation_period=='6month'
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
                                                    value="{{ $employee->prob_start_date }}"
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
                                                    value="{{ $employee->prob_end_date }}"
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
                                                    <option value="MasudAhmed" {{ $employee->reporting_to=='MasudAhmed'
                                                        ? 'selected' : '' }}>Masud Ahmed</option>
                                                    <option value="Others" {{ $employee->reporting_to=='Others' ?
                                                        'selected'
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
                                                    value="{{ $employee->notice_start_date }} ">
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
                                                    value="{{ $employee->notice_end_date }}">
                                                @error('notice_end_date') <span class="text-danger">{{ $message
                                                    }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-select form-control custom-input" name="status"
                                                    id="status">

                                                    <option value="1" {{ $employee->status == '1' ? 'selected' : ''
                                                        }}>Active</option>
                                                    <option value="0" {{ $employee->status == '0' ? 'selected' : ''
                                                        }}>InActive</option>
                                                </select>
                                                @error('status')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--Personal Information-->
                                @foreach($personalInformations as $personalInformation)
                                <div class="tab-pane fade" id="line-personalinfo" role="tabpanel"
                                    aria-labelledby="line-personalinfo-tab">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="contact_number">Contact Number<span class="text-danger">
                                                        *</span></label>
                                                <input type="text" class="form-control custom-input" id="contact_number"
                                                    name="contact_number"
                                                    value="{{$personalInformation->contact_number }}"
                                                    placeholder="Enter Contact Numbers" required>
                                                @error('contact_number') <span class="text-danger">{{ $message}}</span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input type="email" class="form-control custom-input custom-input"
                                                    id="email" name="email" value="{{$personalInformation->email }}"
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
                                                    id="whatsapp" name="whatsapp"
                                                    value="{{$personalInformation->whatsapp }}" placeholder="Whatsapp">
                                                @error('whatsapp') <span class="text-danger">{{ $message
                                                    }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="nid_num">NID Number</label>
                                                <input type="text" class="form-control custom-input" id="nid_num"
                                                    name="nid_num" value="{{$personalInformation->nid_num }}"
                                                    placeholder="Nid Number">
                                                @error('nid_num') <span class="text-danger">{{ $message
                                                    }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label for="pres_add">Present Address</label>
                                                <input type="text" class="form-control"
                                                    value="{{$personalInformation->pres_add }}" id="pres_add"
                                                    name="pres_add" placeholder="Full Address">
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
                                                    <option value="{{ $district->name }}" {{ $personalInformation->
                                                        district ==$district->name ? 'selected' : '' }}>
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
                                                    name="postal_code" value="{{$personalInformation->postal_code }}"
                                                    placeholder="Postal Code">
                                                @error('postal_code') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label for="permanent_add">Permanent Address</label>
                                                <input type="text" class="form-control" id="permanent_add"
                                                    name="permanent_add"
                                                    value="{{$personalInformation->permanent_add }}"
                                                    placeholder="Full Address">
                                                @error('permanent_add') <span class="text-danger">{{ $message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-check">
                                                <input type="hidden" name="same_address" value="0">
                                                <!-- Default value when unchecked -->
                                                <input type="checkbox" class="form-check-input" id="same_address"
                                                    name="same_address" value="1" {{ $personalInformation->same_address
                                                ? 'checked' : '' }}>
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
                                                    <option value="{{ $district->name }}" {{ $personalInformation->
                                                        permanent_district ==$district->name ? 'selected' : '' }}>
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
                                                    value="{{$personalInformation->permanent_postal_code }}"
                                                    placeholder="Postal Code">
                                                @error('permanent_postal_code') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                                <!--Education-->
                                <div class="tab-pane fade" id="line-education" role="tabpanel"
                                    aria-labelledby="line-education-tab">
                                    <button id="addFormBtn" class="btn btn-primary" type="button">+Add
                                        Education</button>
                                    <div id="formContainer">
                                        @if(isset($educations) && $educations->isNotEmpty())
                                        @foreach($educations as $education)
                                        <div class="soft-bg-3 row border rounded p-3 mb-3">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="education_type">Education Type</label>
                                                    <select class="form-select form-control" name="education_type[]">
                                                        <option value="graduate" {{ $education->education_type ==
                                                            'graduate' ? 'selected' : '' }}>Graduate</option>
                                                        <option value="undergraduate" {{ $education->education_type ==
                                                            'undergraduate' ? 'selected' : '' }}>Undergraduate</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="education">Education</label>
                                                    <select class="form-select form-control" name="education[]">
                                                        <option value="SSC" {{ $education->education == 'SSC' ?
                                                            'selected' : '' }}>SSC</option>
                                                        <option value="HSC" {{ $education->education == 'HSC' ?
                                                            'selected' : '' }}>HSC</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="group_major_subject">Group / Major Subject</label>
                                                    <input type="text" class="form-control" name="group_major_subject[]"
                                                        value="{{ $education->group_major_subject }}"
                                                        placeholder="Group / Major Subject">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="passing_year">Passing Year</label>
                                                    <input type="text" class="form-control" name="passing_year[]"
                                                        value="{{ $education->passing_year }}"
                                                        placeholder="Passing Year">
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label for="institute_name">Institute Name</label>
                                                    <input type="text" class="form-control" name="institute_name[]"
                                                        value="{{ $education->institute_name }}"
                                                        placeholder="Institute Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="board_university">Board/University</label>
                                                    <input type="text" class="form-control" name="board_university[]"
                                                        value="{{ $education->board_university }}"
                                                        placeholder="Board/University">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="result_type">Result Type</label>
                                                    <select class="form-select form-control" name="result_type[]">
                                                        <option value="Gpa" {{ $education->result_type == 'Gpa' ?
                                                            'selected' : '' }}>GPA</option>
                                                        <option value="Cgpa" {{ $education->result_type == 'Cgpa' ?
                                                            'selected' : '' }}>CGPA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="cgpa">CGPA</label>
                                                    <input type="text" class="form-control" name="cgpa[]"
                                                        value="{{ $education->cgpa }}" placeholder="CGPA">
                                                </div>
                                            </div>

                                        </div>
                                        @endforeach
                                        @endif
                                    </div>

                                    <script>
                                        const addFormBtn = document.getElementById("addFormBtn");
                                        const formContainer = document.getElementById("formContainer");

                                        // Function to create a new empty form section
                                        function createNewFormSection() {
                                            const formSection = document.createElement('div');
                                            formSection.classList.add('soft-bg-3', 'row', 'border', 'rounded', 'p-3', 'mb-3');

                                            formSection.innerHTML = `
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
                                            `;

                                            const removeBtn = formSection.querySelector(".removeFormBtn");
                                            removeBtn.addEventListener("click", function () {
                                                formSection.remove();
                                            });

                                            return formSection;
                                        }

                                        // Event listener for the "Add Education" button
                                        addFormBtn.addEventListener("click", function () {
                                            const newFormSection = createNewFormSection();
                                            formContainer.appendChild(newFormSection);
                                        });

                                        // Add event listeners to remove buttons for existing data
                                        document.querySelectorAll(".removeFormBtn").forEach(button => {
                                            button.addEventListener("click", function () {
                                                button.closest('.soft-bg-3').remove();
                                            });
                                        });
                                    </script>

                                </div>
                                <!--Experience-->
                                <div class="tab-pane fade" id="line-experience" role="tabpanel"
                                    aria-labelledby="line-experience-tab">
                                    <button id="addExperienceBtn" class="btn btn-primary" type="button">+ Add
                                        Experience</button>
                                    <div id="experienceFormContainer">
                                        @if(isset($experiences) && $experiences->isNotEmpty())
                                        @foreach($experiences as $experience)
                                        <div class="soft-bg-3 row border rounded p-3 mb-3">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="company_name">Company Name</label>
                                                    <input type="text" class="form-control" name="company_name[]" value="{{$experience->company_name}}" placeholder="Enter company name">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="job_position">Job Position</label>
                                                    <input type="text" class="form-control" name="job_position[]" value="{{$experience->job_position}}" placeholder="Enter job position">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="department">Department</label>
                                                    <input type="text" class="form-control" name="department[]" value="{{$experience->department}}" placeholder="Enter department">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="job_respons">Job Responsibilities</label>
                                                    <input type="text" class="form-control" name="job_respons[]" value="{{$experience->job_respons}}" placeholder="Enter responsibilities">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="from_date">From Date</label>
                                                    <input type="date" class="form-control"  value="{{ $experience->from_date }}" name="from_date[]">

                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="to_date">To Date</label>
                                                    <input type="date" class="form-control"  value="{{ $experience->to_date }}" name="to_date[]">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="duration">Duration (Months)</label>
                                                    <input type="number" class="form-control" name="duration[]" value="{{ $experience->duration }}" placeholder="Enter duration">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">

                                                    <label for="projects">Working Projects Name</label>
                                                    <input type="text" class="form-control" name="projects[]" value="{{ $experience->projects }}" placeholder="Enter project names">

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <!--Training-->
                                <div class="tab-pane fade" id="line-training" role="tabpanel"
                                    aria-labelledby="line-training-tab">
                                    <button id="addTrainingBtn" class="btn btn-primary" type="button">+ Add Training</button>
                                    <div id="trainingFormContainer">
                                        @if(isset($trainings) && $trainings->isNotEmpty())
                                        @foreach($trainings as $training)
                                        <div class="soft-bg-3 row border rounded p-3 mb-3">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="train_type">Training Type</label>
                                                    <input type="text" class="form-control" name="train_type[]" value="{{$training->train_type}}" placeholder="Training Type">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="course_title">Course Title</label>
                                                    <input type="text" class="form-control" name="course_title[]" value="{{$training->course_title}}" placeholder="Course Title">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="course_duration">Course Duration</label>
                                                    <select class="form-select form-control" name="course_duration[]">
                                                        <option value="3" {{ $training->course_duration ==
                                                            '3' ? 'selected' : '' }}>3 Months</option>
                                                        <option value="6" {{ $training->course_duration ==
                                                            '6' ? 'selected' : '' }}>6 Months</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="course_start">Course Start Date</label>
                                                    <input type="date" class="form-control" name="course_start[]" value="{{$training->course_start}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="description">Course Description</label>
                                                    <textarea class="form-control" rows="6" name="description[]" placeholder="Write Here">{{$training->description}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="course_end">Course End Date</label>
                                                    <input type="date" class="form-control" name="course_end[]" value="{{$training->course_end}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="year">Year</label>
                                                    <input type="text" class="form-control" name="year[]" placeholder="Year" value="{{ $training->year }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="institute_name">Institute Name</label>
                                                    <input type="text" class="form-control" name="institute_name[]" value="{{ $training->institute_name }}" placeholder="Institute Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group"><label for="institute_address">Institute Address</label>
                                                    <input type="text" class="form-control" name="institute_address[]" placeholder="Institute Address" value="{{ $training->institute_address }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="resource">Trainer/Resource</label>
                                                    <input type="text" class="form-control" name="resource[]" placeholder="Trainer/Resource" value="{{ $training->resource }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="result">Result</label>
                                                    <input type="text" class="form-control" name="result[]" placeholder="Result" value="{{ $training->result }}">
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <!--Family-->
                                @foreach($familyInformations as $familyInformation)
                                <div class="tab-pane fade" id="line-family" role="tabpanel"
                                    aria-labelledby="line-family-tab">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="father_name">Fathers Name</label>
                                                <input type="text" class="form-control" id="father_name"
                                                    name="father_name" placeholder="Father Name"
                                                    value="{{$familyInformation->father_name}}">
                                                @error('father_name') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="mother_name">Mothers Name</label>
                                                <input type="text" class="form-control" id="mother_name"
                                                    name="mother_name" placeholder="Mother Name"
                                                    value="{{$familyInformation->mother_name}}">
                                                @error('mother_name') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="form-label">Marital Status</label><br>
                                                <div class="form-check">
                                                    <label class="form-check-label" for="single">Single</label>
                                                    <input class="form-check-input" type="radio" name="marital_status"
                                                        id="single" value="Single" {{$familyInformation->marital_status
                                                    =='Single'
                                                    ? 'checked' : '' }} onclick="toggleSpouseFields()">
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="marital_status"
                                                        id="married" value="Married" {{
                                                        $familyInformation->marital_status =='Married'
                                                    ? 'checked' : '' }} onclick="toggleSpouseFields()">
                                                    <label class="form-check-label" for="married">Married</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="marital_status"
                                                        id="divorced" value="Divorced" {{
                                                        $familyInformation->marital_status =='Divorced' ? 'checked' : ''
                                                    }}
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
                                                            value="{{ $familyInformation->spouse_name }}">
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
                                                            value="{{ $familyInformation->spouse_occupation }}">
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
                                                            value="{{ $familyInformation->spouse_organization }}">
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
                                                            value="{{ $familyInformation->spouse_mobile}}">
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
                                                            id="spouse_dob"
                                                            value="{{ $familyInformation->spouse_dob }}">
                                                        @error('spouse_dob') <span class="text-danger">{{
                                                            $message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!--Emergency Contact-->
                                @foreach($emergencyContacts as $emergencyContact)
                                <div class="tab-pane fade" id="line-emergencycontact" role="tabpanel"
                                    aria-labelledby="line-emergencycontact-tab">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="emergency_contact_person">Emergency Contact Person Name<span
                                                        class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" id="emergency_contact_person"
                                                    name="emergency_contact_person"
                                                    placeholder="Emergency Contact Person Name"
                                                    value="{{ $emergencyContact->emergency_contact_person}}">
                                                @error('emergency_contact_person') <span class="text-danger">{{
                                                    $message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="relation">Relation</label>
                                                <select class="form-select form-control" id="relation" name="relation"
                                                    placeholder="Expense Category">
                                                    <option value="" selected disabled>Select Relation</option>
                                                    <option value="Brother" {{ $emergencyContact->relation=='Brother'
                                                        ? 'selected' : '' }}>Brother</option>
                                                    <option value="Others" {{ $emergencyContact->relation=='Others' ?
                                                        'selected'
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
                                                    value="{{$emergencyContact->occupation }}">
                                                @error('occupation') <span class="text-danger">{{ $message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="emergency_contact">Contact Number</label>
                                                <input type="text" class="form-control custom-input"
                                                    id="emergency_contact" name="emergency_contact"
                                                    placeholder="Contact Number"
                                                    value="{{$emergencyContact->emergency_contact}}">
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
                                                    value="{{ $emergencyContact->emergency_email }}">
                                                @error('emergency_email') <span class="text-danger">{{ $message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="emergency_address">Address</label>
                                                <input type="text" class="form-control" id="emergency_address"
                                                    name="emergency_address" placeholder="Full Address"
                                                    value="{{$emergencyContact->emergency_address }}">
                                                @error('emergency_address') <span class="text-danger">{{
                                                    $message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!--Official-->
                                @foreach($officialInformations as $officialInformation)
                                <div class="tab-pane fade" id="line-official" role="tabpanel"
                                    aria-labelledby="line-official-tab">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Weekly Holiday</label>
                                                <select class="form-select form-control mb-3"
                                                    aria-label="Default select example" name="holiday_id">

                                                    @foreach ($holidays as $holiday)
                                                    <option value="{{ $holiday->id }}" {{ isset($officialInformation->
                                                        holiday_id) && $officialInformation->holiday_id == $holiday->id
                                                        ? 'selected' : '' }}>
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
                                                    @foreach ( $shifts as $shift )
                                                    <option value="{{ $shift->id }}" {{ isset($officialInformation->
                                                        shift_id) && $officialInformation->shift_id == $shift->id ?
                                                        'selected' : '' }}>
                                                        {{ $shift->shift_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="overtime_enable">Overtime Enable</label>
                                                <select class="form-select form-control" id="overtime_enable"
                                                    name="overtime_enable">
                                                    <option value="" selected disabled>Select Overtime Enable</option>
                                                    <option value="1" {{ isset($officialInformation->overtime_enable) &&
                                                        $officialInformation->overtime_enable == '1' ? 'selected' : ''
                                                        }}>Yes</option>
                                                    <option value="0" {{ isset($officialInformation->overtime_enable) &&
                                                        $officialInformation->overtime_enable == '0' ? 'selected' : ''
                                                        }}>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="salary_type">Salary Type</label>
                                                <select class="form-select form-control" id="salary_type"
                                                    name="salary_type" onchange="toggleBank()">
                                                    <option value="Cash" {{ isset($officialInformation->salary_type) &&
                                                        $officialInformation->salary_type == 'Cash' ? 'selected' : ''
                                                        }}>Cash</option>
                                                    <option value="Bank" {{ isset($officialInformation->salary_type) &&
                                                        $officialInformation->salary_type == 'Bank' ? 'selected' : ''
                                                        }}>Bank</option>
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
                                                            value="{{ $officialInformation->bank_name}}">
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
                                                            value="{{ $officialInformation->account_holder_name}}">
                                                        @error('account_holder_name') <span class="text-danger">{{
                                                            $message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="branch_name">Branch Name</label>
                                                        <input type="text" class="form-control" id="branch_name"
                                                            name="branch_name" placeholder="Enter Branch Name"
                                                            value="{{$officialInformation->branch_name}}">
                                                        @error('branch_name') <span class="text-danger">{{
                                                            $message}}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="account_number">Account Number</label>
                                                        <input type="text" class="form-control" id="account_number"
                                                            name="account_number" placeholder="Enter Account Number"
                                                            value="{{$officialInformation->account_number }}">
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
                                                    value="{{ $officialInformation->official_phone}}">
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
                                                    value="{{ $officialInformation->official_email }}">
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
                                                    value="{{ $officialInformation->official_whatsapp }}">

                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="user_email">Username / Email</label>
                                                <input type="text" class="form-control custom-input custom-input"
                                                    id="user_email" name="user_email" placeholder="Username / Email"
                                                    value="{{$officialInformation->user_email }}">
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
                                                    <option selected disabled>Login Allowed?</option>
                                                    <option value="1" {{ $officialInformation->login_allowed=='1'
                                                        ? 'selected' : '' }}>Yes</option>
                                                    <option value="0" {{ $officialInformation->login_allowed=='0'
                                                        ? 'selected' : '' }}>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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
</div>
</div>
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
    sameAddressCheckbox.addEventListener('change', function() {
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
    presentAddressInput.addEventListener('input', function() {
        if (sameAddressCheckbox.checked) {
            permanentAddressInput.value = presentAddressInput.value;
        }
    });

    presentDistrictSelect.addEventListener('change', function() {
        if (sameAddressCheckbox.checked) {
            permanentDistrictSelect.value = presentDistrictSelect.value;
        }
    });

    presentPostalCodeInput.addEventListener('input', function() {
        if (sameAddressCheckbox.checked) {
            permanentPostalCodeInput.value = presentPostalCodeInput.value;
        }
    });
</script>
<script>
    // JavaScript to handle space-to-comma conversion
    document.getElementById('contact_number').addEventListener('input', function(e) {
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
{{-- <!-- JavaScript for Add and Remove Education Sections -->
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

</script> --}}
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
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="description">Course Description</label>
                    <textarea class="form-control" rows="6" name="description[]" placeholder="Write Here"></textarea>
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
