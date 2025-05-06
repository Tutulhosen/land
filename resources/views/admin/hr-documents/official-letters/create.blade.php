@extends('layouts.admin')
@section('title','Generate Official Letters')
@push('styles')
<style>
    .small-text-size {
        font-size: 12px;
        cursor: pointer;
    }

</style>
@endpush
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-5">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pb-2">
                            <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada'></i> Letter
                                Details</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="email2">Letter Type</label>
                                        <select class="form-select form-control custom-input" id="letter_type"
                                            name="letter_type" placeholder="Expense Category">
                                            <option disabled selected>Select A Letter Type</option>
                                            @foreach ($demoletters as $demoletter)
                                            <option value="{{ $demoletter->id }}">
                                                {{ $demoletter->documenttemplate_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="employee">Employees</label>
                                        <select class="form-select form-control custom-input" id="employee"
                                            name="employee" placeholder="Expense Category">
                                            <option disabled selected>Select Employee</option>
                                            <option value="0">All Employee</option>
                                            @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}">
                                                {{ $employee->salutations ? $employee->salutations->name : "N/A" }}
                                                {{ $employee->first_name . ' ' . $employee->last_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="signatory">Signatory</label>
                                        <select class="form-select form-control custom-input" id="signatory"
                                            name="signatory" placeholder="Expense Category">
                                            <option disabled selected>Select An Signatory</option>
                                            @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}">
                                                {{ $employee->salutations ? $employee->salutations->name : "N/A" }}
                                                {{ $employee->first_name . ' ' . $employee->last_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="soft-bg-3 row">
                                <h5 class="module-title-m">Adjust space setting (in pixel)</h5>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="left">Left</label>
                                        <input type="number" class="form-control custom-input" id="left" placeholder=""
                                            value="70">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="right">Right</label>
                                        <input type="number" class="form-control custom-input" id="right" placeholder=""
                                            value="70">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="top">Top</label>
                                        <input type="number" class="form-control custom-input" id="top" placeholder=""
                                            value="200">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="bottom">Bottom</label>
                                        <input type="number" class="form-control custom-input" id="bottom"
                                            placeholder="" value="200">
                                    </div>
                                </div>
                            </div>
                            <!-- Template Section -->
                            <div class="col-sm-12" id="template-section" style="display: none;">
                                <div class="form-group">
                                    <label for="template">Template</label>
                                    <textarea class="form-control summernote" rows="6" cols="4" id="template"
                                        name="template" placeholder="Write Here"></textarea>
                                </div>
                            </div>

                        </form>
                        <div class="row p-20">
                            <div class="col-12">
                                <h4 class="pl-2 mb-2 f-18 font-weight-normal text-capitalize">
                                    Available Variables :
                                </h4>
                            </div>
                            <div class="col-md-6">
                                <p class="small-text-size" onclick="copyText('##CURRENT_DATE##')">
                                    <i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy">
                                        ##CURRENT_DATE##</i>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="small-text-size" onclick="copyText('##EMPLOYEE_ID##')">
                                    <i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy">
                                        ##EMPLOYEE_ID##</i>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="small-text-size" onclick="copyText('##EMPLOYEE_NAME##')">
                                    <i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy">
                                        ##EMPLOYEE_NAME##</i>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="small-text-size" onclick="copyText('##EMPLOYEE_ADDRESS##')">
                                    <i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy">
                                        ##EMPLOYEE_ADDRESS##</i>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="small-text-size" onclick="copyText('##EMPLOYEE_JOINING_DATE##')">
                                    <i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy">
                                        ##EMPLOYEE_JOINING_DATE##</i>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="small-text-size" onclick="copyText('##EMPLOYEE_PROBATION_START_DATE##')">
                                    <i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy">
                                        ##EMPLOYEE_PROBATION_START_DATE##</i>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="small-text-size" onclick="copyText('##EMPLOYEE_PROBATION_END_DATE##')">
                                    <i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy">
                                        ##EMPLOYEE_PROBATION_END_DATE##</i>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="small-text-size" onclick="copyText('##EMPLOYEE_NOTICE_PERIOD_START_DATE##')">
                                    <i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy">
                                        ##EMPLOYEE_NOTICE_PERIOD_START_DATE##</i>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="small-text-size" onclick="copyText('##EMPLOYEE_NOTICE_PERIOD_END_DATE##')">
                                    <i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy">
                                        ##EMPLOYEE_NOTICE_PERIOD_END_DATE##</i>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="small-text-size" onclick="copyText('##EMPLOYEE_DEPARTMENT##')">
                                    <i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy">
                                        ##EMPLOYEE_DEPARTMENT##</i>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="small-text-size" onclick="copyText('##EMPLOYEE_DESIGNATION##')">
                                    <i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy">
                                        ##EMPLOYEE_DESIGNATION##</i>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="small-text-size" onclick="copyText('##EMPLOYEE_SALARY##')">
                                    <i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy">
                                        ##EMPLOYEE_SALARY##</i>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="small-text-size" onclick="copyText('##SIGNATORY##')">
                                    <i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy">
                                        ##SIGNATORY##</i>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="small-text-size" onclick="copyText('##SIGNATORY_DESIGNATION##')">
                                    <i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy">
                                        ##SIGNATORY_DESIGNATION##</i>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="small-text-size" onclick="copyText('##SIGNATORY_DEPARTMENT##')">
                                    <i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy">
                                        ##SIGNATORY_DEPARTMENT##</i>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="small-text-size" onclick="copyText('##COMPANY_NAME##')">
                                    <i class='bx bxs-copy' data-bs-toggle="tooltip" data-bs-title="Click to Copy">
                                        ##COMPANY_NAME##</i>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex justify-content-between flex-column flex-md-row pb-2">
                            <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada'></i> Preview
                                Letter</h4>
                            <div>
                                <button type="button" id="" class="cancel-button-1 previewBtn" style="display: none;">
                                    <i class='bx bx-show bx-flashing'></i> Preview
                                </button>
                                <button type="button" id="" class="purchase-button saveBtn" style="display: none;">
                                    <i class='bx bx-show bx-flashing'></i>Save
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="template-preview">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    function marginandpadding() {
        var left = $('#left').val() || 0;
        var right = $('#right').val() || 0;
        var top = $('#top').val() || 0;
        var bottom = $('#bottom').val() || 0;
        var padding = top + 'px ' + right + 'px ' + bottom + 'px ' + left + 'px';
        $('#template-preview').css('padding', padding);
    }

    $(document).ready(function () {
        $('#left, #right, #top, #bottom').on('input', function () {
            if ($(this).val() < 0) {
                $(this).val(0);
            }
            marginandpadding();
        });
    });


    $('.summernote').on('summernote.change', function () {
        var content = $(this).summernote('code');
        var letterTypeId = $('#letter_type').val();
        var employeeId = $('#employee').val();
        var signatoryId = $('#signatory').val();

        $('.previewBtn').show();
        $('.saveBtn').show();

        $.ajax({
            url: '/dashboard/hr-documents/official-letters/get-template/' + letterTypeId + '/' + employeeId + '/' + signatoryId,
            type: 'GET',
            success: function (response) {
                if (content && response.employee) {
                    var template = content;

                    var currentDate = new Date();
                    var options = {
                        year: 'numeric',
                        month: 'short',
                        day: 'numeric'
                    };
                    var formattedcurrentDate = currentDate.toLocaleDateString(
                        'en-GB', options);

                    template = template.replace(/##CURRENT_DATE##/g,
                        formattedcurrentDate);
                    template = template.replace(/##EMPLOYEE_ID##/g, response
                        .employee.emp_id);
                    template = template.replace(/##EMPLOYEE_NAME##/g, response
                        .employee.name);
                    template = template.replace(/##EMPLOYEE_ADDRESS##/g, response
                        .employee.address || "N/A");
                    template = template.replace(/##EMPLOYEE_JOINING_DATE##/g,
                        formatDate(response.employee.joining_date));
                    template = template.replace(
                        /##EMPLOYEE_PROBATION_START_DATE##/g, formatDate(
                            response.employee.prob_start_date));
                    template = template.replace(/##EMPLOYEE_PROBATION_END_DATE##/g,
                        formatDate(response.employee.prob_end_date));
                    template = template.replace(
                        /##EMPLOYEE_NOTICE_PERIOD_START_DATE##/g, formatDate(
                            response.employee.notice_period_start_date));
                    template = template.replace(
                        /##EMPLOYEE_NOTICE_PERIOD_END_DATE##/g, formatDate(
                            response.employee.notice_period_end_date));
                    template = template.replace(/##EMPLOYEE_DEPARTMENT##/g, response
                        .employee.department || "N/A");
                    template = template.replace(/##EMPLOYEE_DESIGNATION##/g,
                        response.employee.designation || "N/A");
                    template = template.replace(/##SIGNATORY##/g, response.signatory.name || "N/A");
                    template = template.replace(/##SIGNATORY_DEPARTMENT##/g, response.signatory
                        .department || "N/A");
                    template = template.replace(/##SIGNATORY_DESIGNATION##/g, response.signatory
                        .designation || "N/A");
                    template = template.replace(/##COMPANY_NAME##/g, response
                        .company_name || "Company Name");
                    template = template.replace(/##EMPLOYEE_SALARY##/g, response.employee
                        .joining_sallery || "0");


                    if (template !== null && template !== "") {
                        marginandpadding();
                        $('#template-preview').html(template);
                    }
                }
            },
            error: function () {
                console.log('Error fetching template');
            }
        });

        function formatDate(dateString) {
            if (!dateString) return "N/A";
            var date = new Date(dateString);
            var options = {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            };
            return date.toLocaleDateString('en-GB', options);
        }

    });


    function copyText(text) {
        navigator.clipboard.writeText(text).then(function () {});
    }

    $(document).ready(function () {
        $('#letter_type, #employee, #signatory').on('change', function () {
            var letterTypeId = $('#letter_type').val();
            var employeeId = $('#employee').val();
            var signatoryId = $('#signatory').val();
            // $('#template-section').show();
            if (letterTypeId || employeeId) {
                $.ajax({
                    url: '/dashboard/hr-documents/official-letters/get-template/' + letterTypeId + '/' + employeeId + '/' + signatoryId,
                    type: 'GET',
                    success: function (response) {
                        console.log(response);

                        if (response.template && response.employee) {
                            $('#template-section').show();
                            var template = response.template;
                            var currentDate = new Date();
                            var options = {
                                year: 'numeric',
                                month: 'short',
                                day: 'numeric'
                            };
                            var formattedcurrentDate = currentDate.toLocaleDateString(
                                'en-GB', options);
                            template = template.replace(/##CURRENT_DATE##/g,
                                formattedcurrentDate);
                            template = template.replace(/##EMPLOYEE_ID##/g, response
                                .employee.emp_id);
                            template = template.replace(/##EMPLOYEE_NAME##/g, response
                                .employee.name);
                            template = template.replace(/##EMPLOYEE_ADDRESS##/g, response
                                .employee.address || "N/A");
                            template = template.replace(/##EMPLOYEE_JOINING_DATE##/g,
                                formatDate(response.employee.joining_date));
                            template = template.replace(
                                /##EMPLOYEE_PROBATION_START_DATE##/g, formatDate(
                                    response.employee.prob_start_date));
                            template = template.replace(/##EMPLOYEE_PROBATION_END_DATE##/g,
                                formatDate(response.employee.prob_end_date));
                            template = template.replace(
                                /##EMPLOYEE_NOTICE_PERIOD_START_DATE##/g, formatDate(
                                    response.employee.notice_period_start_date));
                            template = template.replace(
                                /##EMPLOYEE_NOTICE_PERIOD_END_DATE##/g, formatDate(
                                    response.employee.notice_period_end_date));
                            template = template.replace(/##EMPLOYEE_DEPARTMENT##/g, response
                                .employee.department || "N/A");
                            template = template.replace(/##EMPLOYEE_DESIGNATION##/g,
                                response.employee.designation || "N/A");
                            template = template.replace(/##EMPLOYEE_SALARY##/g, response
                                .employee.joining_sallery || "0");
                            template = template.replace(/##SIGNATORY##/g, response.signatory
                                .name || "N/A");
                            template = template.replace(/##SIGNATORY_DEPARTMENT##/g,
                                response.signatory.department || "N/A");
                            template = template.replace(/##SIGNATORY_DESIGNATION##/g,
                                response.signatory.designation || "N/A");

                            template = template.replace(/##COMPANY_NAME##/g, response
                                .company_name || "Company Name");

                            if (template !== null && template !== "") {
                                $('.summernote').summernote('code', template);
                            }
                        }
                    },
                    error: function () {
                        console.log('Error fetching template');
                    }
                });

                function formatDate(dateString) {
                    if (!dateString) return "N/A";
                    var date = new Date(dateString);
                    var options = {
                        year: 'numeric',
                        month: 'short',
                        day: 'numeric'
                    };
                    return date.toLocaleDateString('en-GB', options);
                }
            } else {
                // Hide the template section if either of the dropdowns is not selected
                $('#template-section').hide();
            }
        });
    });



    $(document).ready(function () {

        $(".previewBtn").click(function () {
            let left = $('#left').val() || 0;
            let right = $('#right').val() || 0;
            let top = $('#top').val() || 0;
            let bottom = $('#bottom').val() || 0;
            let content = $("#template-preview").html();

            let form = $('<form>', {
                    action: "{{ url('/dashboard/hr-documents/official-letters/generate-pdf') }}",
                    method: 'POST',
                    target: '_blank'
                }).append($('<input>', {
                    type: 'hidden',
                    name: '_token',
                    value: $('meta[name="csrf-token"]').attr('content')
                }))
                .append($('<input>', {
                    type: 'hidden',
                    name: 'content',
                    value: content
                }))
                .append($('<input>', {
                    type: 'hidden',
                    name: 'left',
                    value: left
                }))
                .append($('<input>', {
                    type: 'hidden',
                    name: 'right',
                    value: right
                }))
                .append($('<input>', {
                    type: 'hidden',
                    name: 'top',
                    value: top
                }))
                .append($('<input>', {
                    type: 'hidden',
                    name: 'bottom',
                    value: bottom
                }));

            $('body').append(form);
            form.submit();
        });


        $(".saveBtn").click(function () {
            Swal.fire({
                title: 'Want to save it?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Want to save!',
                cancelButtonText: 'No, Do not save!',
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-secondary'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    let content = $("#template-preview").html();
                    let letterTypeId = $('#letter_type').val();
                    let employeeId = $('#employee').val();
                    var signatoryId = $('#signatory').val();

                    $.ajax({
                        url: "{{ url('/dashboard/hr-documents/official-letters/save-content') }}",
                        method: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            content: content,
                            letter_type_id: letterTypeId,
                            employee_id: employeeId,
                            signatory_id: signatoryId
                        },
                        success: function (response) {
                            Swal.fire({
                                title: 'Saved!',
                                text: 'The content has been saved successfully.',
                                icon: 'success',
                                confirmButtonText: 'Okay'
                            });
                        },
                        error: function (xhr, status, error) {
                            // Handle error, maybe show an error message
                            Swal.fire({
                                title: 'Error!',
                                text: 'There was an issue saving the content.',
                                icon: 'error',
                                confirmButtonText: 'Okay'
                            });
                        }
                    });
                }
            });
        });

    });

</script>
@endpush
