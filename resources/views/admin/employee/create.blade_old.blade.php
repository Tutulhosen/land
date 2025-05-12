@extends('layouts.admin')
@section('title','Employees Create')
@section('content')
<style>
    .h_add p {
        background: #08C2FF;
        font-size: 14px;
        font-weight: 500;
        color: #fff !important;
        border-radius: 0 15px 15px 15px;
        align-items: center;
        height: 40px;
        display: inline-block;
        padding: 9px 20px;
    }
</style>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" id="employeeForm" action="{{ route('employee.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header project-details-card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="project-details-card-header-title"><i class='bx bx-user bx-tada'></i>Create
                                    Customer</h4>
                            </div>
                        </div>
                        <div class="text-center m-3">
                            <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link active" id="line-personalinformation-tab"
                                        data-bs-toggle="pill" href="#line-personalinformation" role="tab"
                                        aria-controls="pills-personalinformation" aria-selected="true">General
                                        Information</a>
                                </li>
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link" id="line-contactinformation-tab"
                                        data-bs-toggle="pill" href="#line-contactinformation" role="tab"
                                        aria-controls="pills-contactinformation" aria-selected="true">Contact
                                        Information</a>
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
                                

                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content mt-3 mb-3" id="line-tabContent">
                                <!--General Information-->
                                <div class="tab-pane fade show active" id="line-personalinformation" role="tabpanel"
                                    aria-labelledby="line-personalinformation-tab">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="small-label-text">Customer ID number</label>
                                                <input type="text" class="form-control custom-input custom-input" id="email2" placeholder="Customer ID">
                                            </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="email2">Customer Name (English)</label>
                                             <input type="text" class="form-control custom-input custom-input" id="email2" placeholder="Type Customer Name English">
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="email2">Customer Name (Bangla)</label>
                                             <input type="text" class="form-control custom-input custom-input" id="email2" placeholder="Type Customer Name Bangla">
                                          </div>
                                       </div>

                                       <div class="col-sm-2">
                                          <div class="form-group">
                                             <label>Old Customer ID</label>
                                             <input type="text" class="form-control custom-input custom-input" id="email2" placeholder="Customer ID">
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="email2">Gender</label>
                                             <select class="form-select form-control" id="defaultSelect" placeholder="Expense Category">
                                                <option>-Select-</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Others</option>
                                             </select>
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="email2">Nationality</label>
                                             <select class="form-select form-control" id="defaultSelect" placeholder="Expense Category">
                                                <option>-Select-</option>
                                                <option>Bangladesh</option>
                                                <option>Indian</option>
                                                <option>Dubai</option>
                                             </select>
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="email2">Blood Group</label>
                                             <select class="form-select form-control" id="defaultSelect" placeholder="Expense Category">
                                                <option>-Select-</option>
                                                <option>A+</option>
                                                <option>B+</option>
                                                <option>AB+</option>
                                             </select>
                                          </div>
                                       </div>

                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for="email2">Father's Name (English)</label>
                                             <input type="text" class="form-control custom-input custom-input" id="email2" placeholder="Type Customer Father's Name in English">
                                          </div>
                                       </div>

                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for="email2">Father's Name (Bangla)</label>
                                             <input type="text" class="form-control custom-input custom-input" id="email2" placeholder="Type Customer Father's Name in Bangla">
                                          </div>
                                       </div>

                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for="email2">Mother's Name (English)</label>
                                             <input type="text" class="form-control custom-input custom-input" id="email2" placeholder="Type Customer Mother's Name in English">
                                          </div>
                                       </div>

                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for="email2">Mother's Name (Bangla)</label>
                                             <input type="text" class="form-control custom-input custom-input" id="email2" placeholder="Type Customer Mother's Name in Bangla">
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="email2">Date of Birth</label>
                                             <input type="date" class="form-control custom-input custom-input" id="email2" placeholder="Expense Date">
                                          </div>
                                       </div>

                                       <div class="col-sm-2">
                                          <div class="form-group">
                                             <label for="email2">Age</label>
                                             <input type="text" class="form-control custom-input custom-input" id="email2" placeholder="Current Age">
                                          </div>
                                       </div>

                                       <div class="col-sm-2">
                                          <div class="form-group">
                                             <label>ID Type</label>
                                             <select class="form-select form-control" id="defaultSelect" placeholder="Expense Category">
                                                <option>Passport</option>
                                                <option>NID Card</option>
                                                <option>NID Smart Card</option>
                                                <option>Birth Registration</option>
                                                <option>Driving Licence</option>
                                             </select>
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label>ID Number</label>
                                             <input type="text" class="form-control custom-input custom-input" id="email2" placeholder="Type Customer ID Number">
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="email2">Religion</label>
                                             <select class="form-select form-control" id="defaultSelect" placeholder="Expense Category">
                                                <option>Muslim</option>
                                                <option>Hindu</option>
                                                <option>Kristian</option>
                                                <option>Buddisht</option>
                                                <option>Others</option>
                                             </select>
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="email2">Profession</label>
                                             <input type="text" class="form-control custom-input custom-input" id="email2" placeholder="Type Customer Profession">
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="email2">Upload ID Card</label>
                                             <input type="file" class="form-control" id="email2" placeholder="Domain Name">
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="email2">Agency Name</label>
                                             <select class="form-select form-control" id="defaultSelect" placeholder="Expense Category">
                                                <option>--Select--</option>
                                                <option>GoldenEye</option>
                                                <option>Puspodhara</option>
                                                <option>Others1</option>
                                                <option>Others2</option>
                                             </select>
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="email2">Salesman Name</label>
                                             <select class="form-select form-control" id="defaultSelect" placeholder="Expense Category">
                                                <option>--Select--</option>
                                                <option>Md.Saokat Shaon</option>
                                                <option>Md. Nahid Islam</option>
                                                <option>Md. Saokat Hossain</option>
                                                <option>Md. Abul Hasan</option>
                                             </select>
                                          </div>
                                       </div>

                                    </div>
                                </div>

                                <!--Contact Information-->
                                <div class="tab-pane fade" id="line-contactinformation" role="tabpanel"
                                    aria-labelledby="line-contactinformation-tab">
                                    <div class="row">
                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="email2">Mobile Number</label>
                                               <input type="text" class="form-control custom-input custom-input" id="email2" placeholder="Type Valid Mobile Number">
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="email2">Land Phone Number (If Any)</label>
                                               <input type="text" class="form-control custom-input custom-input" id="email2" placeholder="Type Valid Phone Number">
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label>WhatsApp Number</label>
                                               <input type="text" class="form-control custom-input custom-input" id="email2" placeholder="Type Valid WhatsApp Number">
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="email2">Email Address</label>
                                               <input type="text" class="form-control custom-input custom-input" id="email2" placeholder="Type Valid Email Address">
                                            </div>
                                         </div>
                                         <div class="h_add" style="width: 100%;  margin-bottom:-15px; margin-top:10px">
                                            <p style="color: white; background-color:#6c6cdd">Present Address</p>
                                         </div>
                                         
                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="email2">Division</label>
                                               <select class="form-select form-control" id="defaultSelect" placeholder="Expense Category">
                                                  <option>-Select-</option>
                                                  <option>Dhaka</option>
                                                  <option>Rajshahi</option>
                                                  <option>Barishal</option>
                                                  <option>Khulna</option>
                                                  <option>Sylhet</option>
                                                  <option>Chittagong</option>
                                               </select>
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="email2">District</label>
                                               <select class="form-select form-control" id="defaultSelect" placeholder="Expense Category">
                                                  <option>-Select-</option>
                                                  <option>Dhaka</option>
                                                  <option>Rajshahi</option>
                                                  <option>Barishal</option>
                                                  <option>Khulna</option>
                                                  <option>Sylhet</option>
                                                  <option>Chittagong</option>
                                               </select>
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="email2">Thana/Upozila</label>
                                               <select class="form-select form-control" id="defaultSelect" placeholder="Expense Category">
                                                  <option>-Select-</option>
                                                  <option>Dhaka</option>
                                                  <option>Rajshahi</option>
                                                  <option>Barishal</option>
                                                  <option>Khulna</option>
                                                  <option>Sylhet</option>
                                                  <option>Chittagong</option>
                                               </select>
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="email2">Word/Union</label>
                                               <select class="form-select form-control" id="defaultSelect" placeholder="Expense Category">
                                                  <option>-Select-</option>
                                                  <option>Dhaka</option>
                                                  <option>Rajshahi</option>
                                                  <option>Barishal</option>
                                                  <option>Khulna</option>
                                                  <option>Sylhet</option>
                                                  <option>Chittagong</option>
                                               </select>
                                            </div>
                                         </div>

                                         <div class="col-sm-7">
                                            <div class="form-group">
                                               <label for="email2">Present Address</label>
                                               <input type="text" class="form-control" id="email2" placeholder="Type Full Address">
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="email2">Post Office</label>
                                               <input type="text" class="form-control" id="email2" placeholder="Type Post Office Name">
                                            </div>
                                         </div>

                                         <div class="col-sm-2">
                                            <div class="form-group">
                                               <label for="email2">Postal Code</label>
                                               <input type="text" class="form-control" id="email2" placeholder="Type Post Code">
                                            </div>
                                         </div>

                                         <div class="h_add" style="width: 100%; margin-bottom:-15px; margin-top:10px">
                                            <p style="color: white; background-color:#6c6cdd">Permanent Address</p> <input type="checkbox"> Same As Present Address
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="email2">Division</label>
                                               <select class="form-select form-control" id="defaultSelect" placeholder="Expense Category">
                                                  <option>-Select-</option>
                                                  <option>Dhaka</option>
                                                  <option>Rajshahi</option>
                                                  <option>Barishal</option>
                                                  <option>Khulna</option>
                                                  <option>Sylhet</option>
                                                  <option>Chittagong</option>
                                               </select>
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="email2">District</label>
                                               <select class="form-select form-control" id="defaultSelect" placeholder="Expense Category">
                                                  <option>-Select-</option>
                                                  <option>Dhaka</option>
                                                  <option>Rajshahi</option>
                                                  <option>Barishal</option>
                                                  <option>Khulna</option>
                                                  <option>Sylhet</option>
                                                  <option>Chittagong</option>
                                               </select>
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="email2">Thana/Upozila</label>
                                               <select class="form-select form-control" id="defaultSelect" placeholder="Expense Category">
                                                  <option>-Select-</option>
                                                  <option>Dhaka</option>
                                                  <option>Rajshahi</option>
                                                  <option>Barishal</option>
                                                  <option>Khulna</option>
                                                  <option>Sylhet</option>
                                                  <option>Chittagong</option>
                                               </select>
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="email2">Word/Union</label>
                                               <select class="form-select form-control" id="defaultSelect" placeholder="Expense Category">
                                                  <option>-Select-</option>
                                                  <option>Dhaka</option>
                                                  <option>Rajshahi</option>
                                                  <option>Barishal</option>
                                                  <option>Khulna</option>
                                                  <option>Sylhet</option>
                                                  <option>Chittagong</option>
                                               </select>
                                            </div>
                                         </div>

                                         <div class="col-sm-7">
                                            <div class="form-group">
                                               <label for="email2">Permanent Address</label>
                                               <input type="text" class="form-control" id="email2" placeholder="Type Full Address">
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="email2">Post Office</label>
                                               <input type="text" class="form-control" id="email2" placeholder="Type Post Office Name">
                                            </div>
                                         </div>

                                         <div class="col-sm-2">
                                            <div class="form-group">
                                               <label for="email2">Postal Code</label>
                                               <input type="text" class="form-control" id="email2" placeholder="Type Post Code">
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
                                                <label for="employee_type">Employee Type<span class="text-danger"> *</span></label>
                                                <button type="button" class="float-end btn btn-secondary btn-xs mb-1" id="addemployeeTypeBtn" data-bs-toggle="modal" data-bs-target="#employeeTypeModal" ><i class="bx bx-plus"></i></button>
                                                    @include('admin.employee.instant.employee-type-modal')
                                                <select class="form-select form-control  select2" name="employee_type"
                                                    placeholder="Employee Type" id="employee_type" required>
                                                    <option selected disabled>Select Employee Type</option>
                                                    @foreach ($employee_types as $employee_type)
                                                    <option value="{{ $employee_type->id }}">
                                                        {{ $employee_type->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('employee_type') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="branch">Branch<span class="text-danger"> *</span></label>
                                                <select class="form-select form-control mb-3 select2" aria-label="Default select example"
                                                name="branch_id" id="branch_id" required>
                                                    <option selected disabled>Select Branch</option>
                                                    @foreach ($branches as $branch)
                                                    <option value="{{ $branch->id }}" {{
                                                        old('branch_id')==$branch->id ? 'selected' : '' }}>
                                                        {{ $branch->name }}({{ $branch->branch_code }})
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('branch_id') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="department_id">Department<span class="text-danger"> *</span></label>
                                                <select class="form-select form-control mb-3 select2" aria-label="Default select example"
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
                                                <label for="email2">Designation</label>
                                                <select class="form-select mb-3 form-control select2" aria-label="Default select example"
                                                    name="designation_id" id="designation_id">
                                                    <option selected disabled>Select Designation</option>
                                                    {{-- @foreach ($designations as $designation)
                                                    <option value="{{ $designation->id }}" {{
                                                        old('designation_id')==$designation->id ? 'selected' : '' }}>
                                                        {{ $designation->designation_name }}
                                                    </option>
                                                    @endforeach --}}
                                                </select>
                                                @error('designation_id') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="grade">Grade</label>
                                                <select class="form-select form-control mb-3 select2" aria-label="Default select example" name="grade_id" id="grade_id">
                                                    <option selected disabled>Select Grade</option>
                                                    {{-- @foreach ($grades as $grade)
                                                    <option value="{{$grade->id}}"> {{$grade->name}}</option>
                                                    @endforeach --}}
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
                                                                    <option value="{{$employeeinfo->id}}">
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
                                                                    <option value="{{$employeeinfo->id}}">
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
                                                                    <option value="{{$employeeinfo->id}}">
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
                                                    <option value="{{$project->id}}"> {{$project->name}}</option>
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
                                                    value="{{ old('notice_start_date') }}">
                                                @error('notice_start_date') <span class="text-danger">{{ $message
                                                    }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="notice_end_date">Notice Period End Date</label>
                                                <input type="text" class="form-control  datepicker"
                                                    id="notice_end_date" name="notice_end_date"
                                                    value="{{ old('notice_end_date') }}">
                                                @error('notice_end_date') <span class="text-danger">{{ $message
                                                    }}</span>
                                                @enderror
                                            </div>
                                        </div> --}}
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="official_phone">Official Phone Number</label>
                                                <input type="text" class="form-control  "
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
                                                <input type="text" class="form-control  "
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
                                                <input type="text" class="form-control  "
                                                    id="official_whatsapp" name="official_whatsapp"
                                                    placeholder="Official WhatsApp"
                                                    value="{{ old('official_whatsapp') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="user_email">Email</label>
                                                <input type="email" class="form-control  "
                                                    id="user_email" name="user_email" placeholder="Email"
                                                    value="{{ old('user_email') }}">
                                                @error('user_email') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="text" class="form-control  "
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
                                                    <option value="0" selected>No</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--Granter-->
                                <div class="tab-pane fade" id="line-granter" role="tabpanel"
                                    aria-labelledby="line-granter-tab">
                                    <div id="granterFormContainer"></div>
                                    <button id="addgranterFormBtn" class="btn btn-primary" type="button">+Add
                                        Granter</button>
                                </div>
                                <!--Reference-->
                                <div class="tab-pane fade" id="line-reference" role="tabpanel"
                                    aria-labelledby="line-reference-tab">
                                    <div id="referenceFormContainer"></div>
                                    <button id="addreferenceFormBtn" class="btn btn-primary" type="button">+Add
                                        Reference</button>
                                </div>
                                <!--Education-->
                                <div class="tab-pane fade" id="line-education" role="tabpanel"
                                    aria-labelledby="line-education-tab">
                                    <div id="formContainer"></div>
                                    <button id="addFormBtn" class="btn btn-primary" type="button">+Add
                                        Education</button>
                                </div>
                                <!--Experience-->
                                <div class="tab-pane fade" id="line-experience" role="tabpanel"
                                    aria-labelledby="line-experience-tab">
                                    <div id="experienceFormContainer"></div>
                                    <button id="addExperienceBtn" class="btn btn-primary" type="button">+ Add
                                        Experience</button>
                                </div>
                                <!--Training-->
                                <div class="tab-pane fade" id="line-training" role="tabpanel"
                                    aria-labelledby="line-training-tab">
                                    <div id="trainingFormContainer"></div>
                                    <button id="addTrainingBtn" class="btn btn-primary" type="button">+ Add
                                        Training</button>
                                </div>

                                <!--Emergency Contact-->
                                <div class="tab-pane fade" id="line-payrollinformation" role="tabpanel"
                                    aria-labelledby="line-payrollinformation-tab">
                                    <div class="row">
                                        <div class="col-sm-3" style="display: none;">
                                            <div class="form-group">
                                                <label for="holiday_id">Weekly holiday</label>
                                                <select class="form-select form-control mb-3 select2"
                                                    aria-label="Default select example" name="holiday_id"
                                                    id="holiday_id">
                                                    <option disabled selected>Select weekly holiday</option>
                                                    @foreach ($week_offs as $week_off)
                                                    <option value="{{$week_off->id}}">{{$week_off->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="email2">Shift</label>
                                                <select class="form-select form-control mb-3 select2"
                                                    aria-label="Default select example" name="shift_id" id="shift_id">
                                                    <option disabled selected>Select Shift</option>
                                                    {{-- @foreach ( $shifts as $shift )
                                                    <option value="{{ $shift->id }}">{{ $shift->shift_name }}</option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Overtime Enable</label>
                                                <select class="form-select form-control" id="overtime_enable"
                                                    name="overtime_enable">
                                                    <option value="" selected disabled>Select Overtime Enable</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Salary Payment By</label>
                                                <select class="form-select form-control" id="sallery_payment_by"
                                                    name="sallery_payment_by" onchange="toggleBank()">
                                                    <option value="Cash" {{ old('sallery_payment_by')=='Cash' ? 'selected'
                                                        : '' }}>Cash</option>
                                                    <option value="Bank" {{ old('sallery_payment_by')=='Bank' ? 'selected'
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
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="tin_number">TIN Number</label>
                                                <input type="text" class="form-control" id="tin_number"
                                                    name="tin_number" placeholder="Enter TIN Number"
                                                    value="{{ old('tin_number') }}">
                                                @error('tin_number') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="joining_date">Joining Date</label>
                                                <input type="text" class="form-control datepicker" id="joining_date"
                                                    name="joining_date" placeholder="Enter Joining Date"
                                                    value="{{ old('joining_date') }}">
                                                @error('joining_date') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="joining_sallery">Joining Salary</label>
                                                <input type="text" class="form-control  "
                                                    id="joining_sallery" name="joining_sallery"
                                                    value="{{ old('joining_sallery') }}" placeholder="Joining Salary">
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
                                                    value="{{ old('probation_period') }}">
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
                                                    value="{{ old('probation_period_starting_date') }}">
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
                                                    value="{{ old('probation_period_end_date') }}">
                                                @error('probation_period_end_date') <span class="text-danger">{{
                                                    $message}}</span>@enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="salary_type"> Salary Type</label>
                                                <select class="form-select form-control mb-3"
                                                    aria-label="Default select example" name="salary_type" id="salary_type">
                                                    <option value="Regular"> Regular </option>
                                                    <option value="Consuladate"> Consuladate </option>
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
                            <button type="button" class="submit-button-1 saveAndDraftBtn " onclick="confirmSubmit()"><i class='bx bx-upload bx-flashing'></i>Save and Draft</button>
                            <button type="button" id="" class="purchase-button nextBtn"><i
                                    class='bx bx-chevron-right bx-flashing'></i>Next</button>
                            <button type="button" id="" class="submit-button-1 submitBtn btn-success" onclick="confirmSubmit()"
                                style="display: none;"><i class='bx bx-upload bx-flashing'></i>Save and Close</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('admin.employee.instant.employee-type-modal')
@include('admin.employee.instant.education-type')
@include('admin.employee.instant.subject')
@include('admin.employee.instant.board')
@include('admin.employee.instant.religion')

@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('#identification_type').on('change', function () {
            var selectedType = $(this).val();
            if (selectedType) {
                var labelText = selectedType;

                // If it doesn't already end with "Number", add " Number"
                if (!selectedType.trim().toLowerCase().endsWith('number')) {
                    labelText += ' Number';
                }

                // Update label and placeholder
                $('label[for="identification_number"]').text(labelText);
                $('#identification_number').attr('placeholder', 'Enter ' + labelText);
            } else {
                $('label[for="identification_number"]').text('Identification Number');
                $('#identification_number').attr('placeholder', 'Enter Identification Number');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: "bootstrap",
            width: "100%"
        });
        // Open the employeeType Modal when the "+" button is clicked
        $('#addemployeeTypeBtn').click(function() {
            $('#employeeTypeModal').modal('show');
        });

        // Save employeeType and update select dropdown
        $('#saveemployeeTypeBtn').click(function() {
            var employeeTypeName = $('#name').val();

            if (employeeTypeName) {
                $.ajax({
                    url: '/dashboard/instant/save-employee-type',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: employeeTypeName,
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#employee_type').append(new Option(response.employee_type.name, response.employee_type.id));
                            $('#employeeTypeModal').modal('hide');
                            // Clear input fields after saving
                            $('#name').val('');
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Unable to save employee Type. Please try again.',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#d33',
                        });
                    }
                });

            } else {

                Swal.fire({
                    icon: 'warning',
                    title: 'Required',
                    text: 'Please fill in all fields.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3085d6',
                });
            }
        });

        $('#saveEducationTypeBtn').click(function() {
            let educationTypeName = $('#educationTypeName').val();
            console.log(educationTypeName);

            if (!educationTypeName) {
                return Swal.fire({
                    icon: 'warning',
                    title: 'Required',
                    text: 'Please fill in all fields.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3085d6',
                });
            }

            $.post('/dashboard/instant/save-education-type', {
                _token: '{{ csrf_token() }}',
                name: educationTypeName
            }).done(function(response) {
                if (response.success) {
                    $('#education_type').append(new Option(response.education_type.name, response.education_type.id));
                    $('#educationTypeModal').modal('hide').find('input').val('');
                } else {
                    Swal.fire('Error', response.message, 'error');
                }
            }).fail(function(xhr) {
                Swal.fire('Error', 'Unable to save education type. Please try again.', 'error');
                console.error('Error:', xhr.responseText);
            });
        });

        $('#saveSubjectBtn').click(function() {
            let educationSubjectName = $('#educationSubjectName').val();
            console.log(educationSubjectName);

            if (!educationSubjectName) {
                return Swal.fire({
                    icon: 'warning',
                    title: 'Required',
                    text: 'Please fill in all fields.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3085d6',
                });
            }

            $.post('/dashboard/instant/save-education-subject', {
                _token: '{{ csrf_token() }}',
                name: educationSubjectName
            }).done(function(response) {
                if (response.success) {
                    $('#education_subject').append(new Option(response.education_subject.name, response.education_subject.id));
                    $('#subjectModal').modal('hide').find('input').val('');
                } else {
                    Swal.fire('Error', response.message, 'error');
                }
            }).fail(function(xhr) {
                Swal.fire('Error', 'Unable to save education Subject. Please try again.', 'error');
                console.error('Error:', xhr.responseText);
            });
        });

        $('#saveboardBtn').click(function() {
            let educationBoardName = $('#educationBoardName').val();
            console.log(educationBoardName);

            if (!educationBoardName) {
                return Swal.fire({
                    icon: 'warning',
                    title: 'Required',
                    text: 'Please fill in all fields.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3085d6',
                });
            }

            $.post('/dashboard/instant/save-education-board', {
                _token: '{{ csrf_token() }}',
                name: educationBoardName
            }).done(function(response) {
                if (response.success) {
                    $('#education_board').append(new Option(response.education_board.name, response.education_board.id));
                    $('#boardModal').modal('hide').find('input').val('');
                } else {
                    Swal.fire('Error', response.message, 'error');
                }
            }).fail(function(xhr) {
                Swal.fire('Error', 'Unable to save education Board. Please try again.', 'error');
                console.error('Error:', xhr.responseText);
            });

        });

        $('#saveReligionBtn').click(function() {
            let religionName = $('#religionName').val();
            console.log(religionName);

            if (!religionName) {
                return Swal.fire({
                    icon: 'warning',
                    title: 'Required',
                    text: 'Please fill in all fields.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3085d6',
                });
            }

            $.post('/dashboard/instant/save-religion', {
                _token: '{{ csrf_token() }}',
                name: religionName
            }).done(function(response) {
                if (response.success) {
                    $('#religion').append(new Option(response.religion.name, response.religion.id));
                    $('#religionModal').modal('hide').find('input').val('');
                } else {
                    Swal.fire('Error', response.message, 'error');
                }
            }).fail(function(xhr) {
                Swal.fire('Error', 'Unable to save Religion. Please try again.', 'error');
                console.error('Error:', xhr.responseText);
            });

        });

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
        $('.select2').select2({
        theme: "bootstrap",
        width: "100%"
    });
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
        $('.select2').select2({
            theme: "bootstrap",
            width: "100%"
        });
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
                    <button type="button" class="float-end btn btn-secondary btn-xs mb-1" id=""
                        data-bs-toggle="modal" data-bs-target="#educationTypeModal" >
                        <i class="bx bx-plus"></i>
                    </button>
                    <select class="form-select form-control select2" name="education_type[]" id="education_type">
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
                    <button type="button" class="float-end btn btn-secondary btn-xs mb-1" id=""
                        data-bs-toggle="modal" data-bs-target="#subjectModal" >
                        <i class="bx bx-plus"></i>
                    </button>
                    <select class="form-select form-control select2" name="group_major_subject[]" id="education_subject">
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
                    <button type="button" class="float-end btn btn-secondary btn-xs mb-1" id=""
                        data-bs-toggle="modal" data-bs-target="#boardModal" >
                        <i class="bx bx-plus"></i>
                    </button>
                    <select class="form-select form-control select2" name="board_university[]" id="education_board">
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
                    <input type="text" class="form-control" name="result[]" placeholder="Result( 3.00/1st Class )">
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
                    <label for="training_institute_name">Institute Name</label>
                    <input type="text" class="form-control" name="training_institute_name[]" placeholder="Institute Name">
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
        //     var selectedDesignationId = designationSelect
        //         .val(); // Get the existing selected designation

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

        // Disable nav tab clicks
        $('.nav-link').on('click', function (e) {
            e.preventDefault();
        });

        // Initialize jQuery Validate on your form
        var validator = $("#employeeForm").validate({
            errorClass: "is-invalid",
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass('text-danger');
                error.insertAfter(element);
            }
        });

        function showTab(n) {
            // Ensure n stays within valid range
            if (n < 0) n = 0;
            if (n > totalTabs) n = totalTabs;

            $('.tab-pane').removeClass('show active').eq(n).addClass('show active');
            $('.employee-link').removeClass('active').eq(n).addClass('active');

            // Show/hide navigation buttons
            $('.previousBtn').toggle(n > 0);
            $('.nextBtn').toggle(n < totalTabs);
            $('.saveAndDraftBtn').toggle(n < totalTabs);
            $('.submitBtn').toggle(n === totalTabs);
        }

        function validateTabFields() {
            return $("#employeeForm").valid(); // Validate entire form
        }

        $('.nextBtn').on('click', function () {
            if (validateTabFields()) {
                currentTab++;
                showTab(currentTab);
            }
        });

        $('.previousBtn').on('click', function () {
            currentTab--;
            showTab(currentTab);
        });

        showTab(currentTab); // Initialize first tab


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
