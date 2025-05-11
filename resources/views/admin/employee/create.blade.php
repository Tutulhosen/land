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
                <form method="POST" id="employeeForm" action="{{ route('customer.store') }}"
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
                                        aria-selected="false" tabindex="-1">Nominee Details</a>
                                </li>
                                <li class="nav-item employeebars" role="presentation">
                                    <a class="nav-link employee-link" id="line-reference-tab" data-bs-toggle="pill"
                                        href="#line-reference" role="tab" aria-controls="pills-reference"
                                        aria-selected="false" tabindex="-1">Gong Details</a>
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
                                                <input type="text" class="form-control custom-input custom-input customer_id" id="customer_id" placeholder="Customer ID" name="customer_id">
                                            </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="customer_name_en">Customer Name (English)</label>
                                             <input type="text" class="form-control custom-input custom-input customer_name_en" id="customer_name_en" name="customer_name_en" placeholder="Type Customer Name English">
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="customer_name_bn">Customer Name (Bangla)</label>
                                             <input type="text" class="form-control custom-input custom-input customer_name_bn" id="customer_name_bn" name="customer_name_bn" placeholder="Type Customer Name Bangla">
                                          </div>
                                       </div>

                                       <div class="col-sm-2">
                                          <div class="form-group">
                                             <label>Old Customer ID</label>
                                             <input type="text" class="form-control custom-input custom-input customer_id_old" id="customer_id_old" placeholder="Customer ID" name="customer_id_old">
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="customer_gender">Gender</label>
                                             <select class="form-select form-control customer_gender" id="customer_gender" name="customer_gender" placeholder="Expense Category">
                                                <option>-Select Gender-</option>
                                                @foreach ($genders as $gender)
                                                    <option value="{{$gender->id}}">{{$gender->name}}</option>
                                                @endforeach
                                            
                                             </select>
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="customer_nation">Nationality</label>
                                             <select class="form-select form-control customer_nation" id="customer_nation" name="customer_nation" placeholder="Expense Category">
                                                <option>-Select-</option>
                                                @foreach ($nationalities as $nationalitie)
                                                    <option value="{{$nationalitie->id}}">{{$nationalitie->name}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="customer_blood">Blood Group</label>
                                             <select class="form-select form-control customer_blood" id="customer_blood" name="customer_blood" placeholder="Expense Category">
                                                <option>-Select-</option>
                                                @foreach ($bloodgroups as $bloodgroup)
                                                    <option value="{{$bloodgroup->id}}">{{$bloodgroup->name}}</option>
                                                @endforeach

                                             </select>
                                          </div>
                                       </div>

                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for="customer_father_en">Father's Name (English)</label>
                                             <input type="text" class="form-control custom-input custom-input customer_father_en" id="customer_father_en" name="customer_father_en" placeholder="Type Customer Father's Name in English">
                                          </div>
                                       </div>

                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for="customer_father_bn">Father's Name (Bangla)</label>
                                             <input type="text" class="form-control custom-input custom-input customer_father_bn" id="customer_father_bn" name="customer_father_bn" placeholder="Type Customer Father's Name in Bangla">
                                          </div>
                                       </div>

                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for="customer_mother_en">Mother's Name (English)</label>
                                             <input type="text" class="form-control custom-input custom-input customer_mother_en" id="customer_mother_en" name="customer_mother_en" placeholder="Type Customer Mother's Name in English">
                                          </div>
                                       </div>

                                       <div class="col-sm-6">
                                          <div class="form-group">
                                             <label for="customer_mother_bn">Mother's Name (Bangla)</label>
                                             <input type="text" class="form-control custom-input custom-input customer_mother_bn" id="customer_mother_bn" name="customer_mother_bn" placeholder="Type Customer Mother's Name in Bangla">
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="customer_dob">Date of Birth</label>
                                             <input type="date" class="form-control custom-input custom-input customer_dob" id="customer_dob" name="customer_dob" placeholder="Expense Date">
                                          </div>
                                       </div>

                                       <div class="col-sm-2">
                                          <div class="form-group">
                                             <label for="customer_age">Age</label>
                                             <input type="text" class="form-control custom-input custom-input customer_age" id="customer_age" name="customer_age" placeholder="Current Age">
                                          </div>
                                       </div>

                                       <div class="col-sm-2">
                                          <div class="form-group">
                                             <label>ID Type</label>
                                             <select class="form-select form-control customer_id_type" id="customer_id_type" name="customer_id_type" placeholder="Expense Category">
                                                <option value="">--Select--</option>
                                                <option value="Passport">Passport</option>
                                                <option value="Nid_card">NID Card</option>
                                                <option value="Nid_smart_card">NID Smart Card</option>
                                                <option value="Birth_registration">Birth Registration</option>
                                                <option value="Driving_licence">Driving Licence</option>
                                             </select>
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label>ID Number</label>
                                             <input type="text" class="form-control custom-input custom-input customer_id_number" id="customer_id_number" name="customer_id_number" placeholder="Type Customer ID Number">
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="customer_religion">Religion</label>
                                             <select class="form-select form-control customer_religion" id="customer_religion" name="customer_religion" placeholder="Expense Category">
                                                <option value="">--Select--</option>
                                                @foreach ($religions as $religion)
                                                    <option value="{{$religion->id}}">{{$religion->name}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="customer_profession">Profession</label>
                                             <input type="text" class="form-control custom-input custom-input customer_profession" id="customer_profession" name="customer_profession" placeholder="Type Customer Profession">
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="customer_id_card">Upload ID Card</label>
                                             <input type="file" class="form-control customer_id_card" id="customer_id_card" name="customer_id_card" placeholder="Domain Name">
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="customer_agency_name">Agency Name</label>
                                             <select class="form-select form-control customer_agency_name" name="customer_agency_name" id="customer_agency_name" placeholder="Expense Category">
                                                <option>--Select--</option>
                                                @foreach ($agencies as $agency)
                                                    <option value="{{$agency->id}}">{{$agency->agency_name}}</option>
                                                @endforeach
                                       
                                             </select>
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                          <div class="form-group">
                                             <label for="customer_salesman_name">Salesman Name</label>
                                             <select class="form-select form-control customer_salesman_name" name="customer_salesman_name" id="customer_salesman_name" placeholder="Expense Category">
                                                <option>--Select--</option>

                                             </select>
                                          </div>
                                       </div>

                                       <div class="col-sm-4">
                                        <div class="form-group">
                                           <label for="customer_login_access">Login Access</label>
                                           <select class="form-select form-control customer_login_access" name="customer_login_access" id="customer_login_access" placeholder="Expense Category">
                                              <option>--Select--</option>
                                              <option value="Yes">Yes</option>
                                              <option value="No">No</option>
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
                                               <label for="customer_phone">Mobile Number</label>
                                               <input type="text" class="form-control custom-input custom-input customer_phone" id="customer_phone" name="customer_phone" placeholder="Type Valid Mobile Number">
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="customer_land">Land Phone Number (If Any)</label>
                                               <input type="text" class="form-control custom-input custom-input customer_land" id="customer_land" name="customer_land" placeholder="Type Valid Phone Number">
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label>WhatsApp Number</label>
                                               <input type="text" class="form-control custom-input custom-input customer_whatsapp" id="customer_whatsapp" name="customer_whatsapp" placeholder="Type Valid WhatsApp Number">
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="customer_email">Email Address</label>
                                               <input type="text" class="form-control custom-input custom-input customer_email" id="customer_email" name="customer_email" placeholder="Type Valid Email Address">
                                            </div>
                                         </div>
                                         <div class="h_add" style="width: 100%;  margin-bottom:-15px; margin-top:10px">
                                            <p style="color: white; background-color:#6c6cdd">Present Address</p>
                                         </div>
                                         
                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="customer_div_pre">Division</label>
                                               <select class="form-select form-control customer_div_pre" id="customer_div_pre" name="customer_div_pre" placeholder="Expense Category">
                                                  <option>-Select-</option>
                                                    @foreach ($divisions as $division)
                                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                                    @endforeach
                                               </select>
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="customer_dis_pre">District</label>
                                               <select class="form-select form-control customer_dis_pre" id="customer_dis_pre" name="customer_dis_pre" placeholder="Expense Category">
                                                  <option>-Select-</option>
                       
                                               </select>
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="customer_upa_pre">Thana/Upozila</label>
                                               <select class="form-select form-control customer_upa_pre" id="customer_upa_pre" name="customer_upa_pre" placeholder="Expense Category">
                                                  <option>-Select-</option>

                                               </select>
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="customer_union_pre">Word/Union</label>
                                               <input type="text" class="form-control customer_union_pre" name="customer_union_pre" id="customer_union_pre" placeholder="Word/Union">
            
                                               </select>
                                            </div>
                                         </div>

                                         <div class="col-sm-7">
                                            <div class="form-group">
                                               <label for="customer_add_pre">Present Address</label>
                                               <input type="text" class="form-control customer_add_pre" id="customer_add_pre" name="customer_add_pre" placeholder="Type Full Address">
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="customer_post_off_pre">Post Office</label>
                                               <input type="text" class="form-control customer_post_off_pre" id="customer_post_off_pre" name="customer_post_off_pre" placeholder="Type Post Office Name">
                                            </div>
                                         </div>

                                         <div class="col-sm-2">
                                            <div class="form-group">
                                               <label for="customer_post_code_pre">Postal Code</label>
                                               <input type="text" class="form-control customer_post_code_pre" id="customer_post_code_pre" name="customer_post_code_pre" placeholder="Type Post Code">
                                            </div>
                                         </div>

                                         <div class="h_add" style="width: 100%; margin-bottom:-15px; margin-top:10px">
                                            <p style="color: white; background-color:#6c6cdd">Permanent Address</p> <input type="checkbox" id="same_as_present"> Same As Present Address
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="customer_div_per">Division</label>
                                               <select class="form-select form-control customer_div_per" id="customer_div_per" name="customer_div_per" placeholder="Expense Category">
                                                  <option>-Select-</option>
                                                  @foreach ($divisions as $division)
                                                    <option value="{{$division->id}}">{{$division->name}}</option>
                                                  @endforeach
                                               </select>
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="customer_dis_per">District</label>
                                               <select class="form-select form-control customer_dis_per" id="customer_dis_per" name="customer_dis_per" placeholder="Expense Category">
                                                  <option>-Select-</option>

                                               </select>
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="customer_upa_per">Thana/Upozila</label>
                                               <select class="form-select form-control customer_upa_per" id="customer_upa_per" name="customer_upa_per" placeholder="Expense Category">
                                                  <option>-Select-</option>
 
                                               </select>
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="customer_union_per">Word/Union</label>
                                               <input type="text" class="form-control customer_union_per" name="customer_union_pers" id="customer_union_per" placeholder="Word/Union">

                                               </select>
                                            </div>
                                         </div>

                                         <div class="col-sm-7">
                                            <div class="form-group">
                                               <label for="customer_add_per">Permanent Address</label>
                                               <input type="text" class="form-control customer_add_per" name="customer_add_per" id="customer_add_per" placeholder="Type Full Address">
                                            </div>
                                         </div>

                                         <div class="col-sm-3">
                                            <div class="form-group">
                                               <label for="customer_post_off_per">Post Office</label>
                                               <input type="text" class="form-control customer_post_off_per" id="customer_post_off_per" name="customer_post_off_per" placeholder="Type Post Office Name">
                                            </div>
                                         </div>

                                         <div class="col-sm-2">
                                            <div class="form-group">
                                               <label for="customer_post_code_per">Postal Code</label>
                                               <input type="text" class="form-control customer_post_code_per" id="customer_post_code_per" name="customer_post_code_per" placeholder="Type Post Code">
                                            </div>
                                         </div>

                                    </div>
                                </div>

                                <!--Nominee -->
                                <div class="tab-pane fade" id="line-granter" role="tabpanel"
                                    aria-labelledby="line-granter-tab">
                                    <div id="granterFormContainer"></div>
                                    <button id="addgranterFormBtn" class="btn btn-primary" type="button">+Add
                                        Nominee</button>
                                </div>
                                <!--Gong-->
                                <div class="tab-pane fade" id="line-reference" role="tabpanel"
                                    aria-labelledby="line-reference-tab">
                                    <div id="referenceFormContainer"></div>
                                    <button id="addreferenceFormBtn" class="btn btn-primary" type="button">+Add
                                        Gong</button>
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

        $('.customer_agency_name').on('change', function () {
            var customer_agency_nameId = $(this).val();
            if (customer_agency_nameId) {
                $.ajax({
                    url: "{{ url('/dashboard/get_salesman_by_agency') }}/" + customer_agency_nameId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('.customer_salesman_name').empty();
                        $('.customer_salesman_name').append('<option value="">--select--</option>');
                        $.each(data, function (key, value) {
                            $('.customer_salesman_name').append('<option value="' + value.id + '">' + value.salesman_name + '</option>');
                        });
                    }
                });
            } else {
                $('.customer_salesman_name').empty();
                $('.customer_salesman_name').append('<option value="">--select--</option>');
            }
        });

        $('.customer_div_pre').on('change', function () {
            var customer_div_preId = $(this).val();
            if (customer_div_preId) {
                $.ajax({
                    url: "{{ url('/dashboard/get_dis_by_div') }}/" + customer_div_preId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('.customer_dis_pre').empty();
                        $('.customer_dis_pre').append('<option value="">--select--</option>');
                        $.each(data, function (key, value) {
                            $('.customer_dis_pre').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('.customer_dis_pre').empty();
                $('.customer_dis_pre').append('<option value="">--select--</option>');
            }
        });

        $('.customer_dis_pre').on('change', function () {
            var customer_dis_preId = $(this).val();
            if (customer_dis_preId) {
                $.ajax({
                    url: "{{ url('/dashboard/get_upa_by_dis') }}/" + customer_dis_preId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('.customer_upa_pre').empty();
                        $('.customer_upa_pre').append('<option value="">--select--</option>');
                        $.each(data, function (key, value) {
                            $('.customer_upa_pre').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('.customer_upa_pre').empty();
                $('.customer_upa_pre').append('<option value="">--select--</option>');
            }
        });

        $('.customer_div_per').on('change', function () {
            var customer_div_perId = $(this).val();
            if (customer_div_perId) {
                $.ajax({
                    url: "{{ url('/dashboard/get_dis_by_div') }}/" + customer_div_perId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('.customer_dis_per').empty();
                        $('.customer_dis_per').append('<option value="">--select--</option>');
                        $.each(data, function (key, value) {
                            $('.customer_dis_per').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('.customer_dis_per').empty();
                $('.customer_dis_per').append('<option value="">--select--</option>');
            }
        });

        $('.customer_dis_per').on('change', function () {
            var customer_dis_perId = $(this).val();
            if (customer_dis_perId) {
                $.ajax({
                    url: "{{ url('/dashboard/get_upa_by_dis') }}/" + customer_dis_perId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('.customer_upa_per').empty();
                        $('.customer_upa_per').append('<option value="">--select--</option>');
                        $.each(data, function (key, value) {
                            $('.customer_upa_per').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('.customer_upa_per').empty();
                $('.customer_upa_per').append('<option value="">--select--</option>');
            }
        });

        $('#same_as_present').on('change', function () {
            if ($(this).is(':checked')) {

                // 1. Set and trigger Division for Permanent
                let divId = $('#customer_div_pre').val();
                $('#customer_div_per').val(divId).trigger('change');

                // Wait for Districts to load after AJAX call
                setTimeout(function () {
                    let disId = $('#customer_dis_pre').val();
                    $('#customer_dis_per').val(disId).trigger('change');

                    // Wait for Upazilas to load after AJAX call
                    setTimeout(function () {
                        let upaId = $('#customer_upa_pre').val();
                        $('#customer_upa_per').val(upaId);
                    }, 600); // Wait for Upazila data
                }, 600); // Wait for District data

                // 2. Copy other simple fields
                $('#customer_union_per').val($('#customer_union_pre').val());
                $('#customer_add_per').val($('#customer_add_pre').val());
                $('#customer_post_off_per').val($('#customer_post_off_pre').val());
                $('#customer_post_code_per').val($('#customer_post_code_pre').val());

            } else {
                // Clear all Permanent fields if unchecked
                $('#customer_div_per').val('').trigger('change');
                $('#customer_dis_per').val('');
                $('#customer_upa_per').val('');
                $('#customer_union_per').val('');
                $('#customer_add_per').val('');
                $('#customer_post_off_per').val('');
                $('#customer_post_code_per').val('');
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
                    <label for="nominee_name">Nominee Name</label>
                    <input type="text" class="form-control" id="nominee_name" name="nominee_name[]" placeholder="Type Nominee Full Name">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="nominee_relation">Relation With Nominee</label>
                    <select class="form-select form-control" name="nominee_relation[]" id="nominee_relation" placeholder="Expense Category">
                        <option>-Select-</option>
                        @foreach ($relations as $relation)
                            <option value="{{$relation->id}}">{{$relation->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="nominee_phone">Nominee Phone Number</label>
                    <input type="text" class="form-control" id="nominee_phone" name="nominee_phone[]" placeholder="Type Valid Phone Number">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="nominee_pre_add">Nominee Present Address</label>
                    <input type="text" class="form-control" id="nominee_pre_add" name="nominee_pre_add[]" placeholder="Type Full Present Address">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="nominee_per_add">Nominee Permanent Address</label>
                    <input type="text" class="form-control" id="nominee_per_add" name="nominee_per_add[]" placeholder="Type Full Permanent Address">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="nominee_email">Nominee Email Address</label>
                    <input type="text" class="form-control" id="nominee_email" name="nominee_email[]" placeholder="Type Valid Email ID">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="nominee_share">Share (%) Persent</label>
                    <input type="number" class="form-control" id="nominee_share" name="nominee_share[]" placeholder="Type %">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="nominee_pic">Upload Picture</label>
                    <input type="file" class="form-control" id="nominee_pic" name="nominee_pic[]" placeholder="Upload Office ID">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="nominee_id_type">ID Type</label>
                    <select class="form-select form-control" id="nominee_id_type" name="nominee_id_type[]" placeholder="Expense Category">
                        <option>-Select-</option>
                        <option value="Passport">Passport</option>
                        <option value="Nid_card">NID Card</option>
                        <option value="Nid_smart_card">NID Smart Card</option>
                        <option value="Birth_registration">Birth Registration</option>
                        <option value="Driving_licence">Driving Licence</option>
                    </select> 
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="nominee_id">ID Number</label>
                    <input type="text" class="form-control" id="nominee_id" name="nominee_id[]" placeholder="Type Valid ID Number">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="nominee_id_pic">Upload ID Picture</label>
                    <input type="file" class="form-control" id="nominee_id_pic" name="nominee_id_pic[]" placeholder="Upload Office ID">
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
                    <label for="gong_name">Gong Name</label>
                    <input type="text" class="form-control" id="gong_name" name="gong_name[]" placeholder="Type Gong Full Name">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="gong_relation">Relation With Gong</label>
                    <select class="form-select form-control" id="gong_relation" name="gong_relation[]" placeholder="Expense Category">
                        <option>-Select-</option>
                        @foreach ($relations as $relation)
                         <option value="{{$relation->id}}">{{$relation->name}}</option>
                        @endforeach
                
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="gong_phone">Gong Phone Number</label>
                    <input type="text" class="form-control" id="gong_phone" name="gong_phone[]" placeholder="Type Valid Phone Number">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="gong_pre_add">Gong Present Address</label>
                    <input type="text" class="form-control" id="gong_pre_add" name="gong_pre_add[]" placeholder="Type Full Present Address">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="gong_per_add">Gong Permanent Address</label>
                    <input type="text" class="form-control" id="gong_per_add" name="gong_per_add[]" placeholder="Type Full Permanent Address">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="gong_email">Gong Email Address</label>
                    <input type="text" class="form-control" id="gong_email" name="gong_email[]" placeholder="Type Valid Email ID">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="gong_share">Share (%) Persent</label>
                    <input type="number" class="form-control" id="gong_share" name="gong_share[]" placeholder="Type %">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="gong_pic">Upload Picture</label>
                    <input type="file" class="form-control" id="gong_pic" name="gong_pic[]" placeholder="Upload Office ID">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="gong_id_type">ID Type</label>
                    <select class="form-select form-control" id="gong_id_type" name="gong_id_type[]" placeholder="Expense Category">
                        <option>-Select-</option>
                        <option value="Passport">Passport</option>
                        <option value="Nid_card">NID Card</option>
                        <option value="Nid_smart_card">NID Smart Card</option>
                        <option value="Birth_registration">Birth Registration</option>
                        <option value="Driving_licence">Driving Licence</option>
                    </select> 
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="gong_id">ID Number</label>
                    <input type="text" class="form-control" id="gong_id" name="gong_id[]" placeholder="Type Valid ID Number">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="gong_id_pic">Upload ID Picture</label>
                    <input type="file" class="form-control" id="gong_id_pic" name="gong_id_pic[]" placeholder="Upload Office ID">
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
