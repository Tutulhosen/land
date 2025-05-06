@extends('layouts.admin')
@section('title','Employee')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada'></i> Employees
                            </h4>
                            <a href="{{ route('employee.create') }}" class="purchase-button ms-auto" ><i class='bx bx-message-square-add bx-tada' ></i> Add Employee</a>

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table  class="display table table-striped table-hover basic-datatables" role="grid"
                                            aria-describedby="add-row_info">
                                            <thead class="">
                                                <tr role="row">
                                                    <th>Sl</th>
                                                    <th>Employee Name</th>
                                                    <th>Employee ID</th>
                                                    <th>Designation</th>
                                                    <th>Gender</th>
                                                    <th>Nationality</th>
                                                    <th>Blood Group</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                             <tbody>
                                                @foreach ($employees as $employee)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $loop->iteration }}</td>
                                                    <td>{{ $employee->first_name . ' ' . $employee->last_name }}</td>
                                                    <td>{{ $employee->emp_id }}</td>
                                                    <td>Department:{{ $employee->department->department_name }}<br>Designation:{{ $employee->designation->designation_name }}</td>
                                                    <td>{{ $employee->gender }}</td>
                                                    <td>{{ $employee->nationality }}</td>
                                                    <td>{{ $employee->blood_group }}</td>
                                                    <td> @if($employee->status == 1)
                                                        <button class="btn status-box-1">Active</button>
                                                        @elseif($employee->status == 0)
                                                        <button class="btn status-box-1">InActive</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="form-button-action">

                                                            {{-- <button type="button" data-bs-toggle="modal"
                                                                data-bs-target="#editRowModal-employee-{{ $employee->id }}"
                                                                title="" class="btn btn-link btn-success btn-lg">
                                                                <i class='bx bxs-edit'></i>
                                                            </button> --}}
                                                            <a class="btn btn-link btn-success btn-lg" rel="publisher"
                                                             href="{{ route('employee.edit', $employee->id) }}"> <i class='bx bxs-edit'></i></a>




                                                            <a href="#" id="delete-employee-link" title="delete" class="btn btn-link btn-danger btn-lg" data-employee-id = "{{ $employee->id }}">
                                                                <i class='bx bx-trash-alt'></i>
                                                            </a>

                                                            <form id="delete-employee-form-{{ $employee->id }}"
                                                                action="{{ route('employee.destroy', $employee->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>

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
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
   {{-- ******dynamic department designation ******* --}}
<script>

    $(document).ready(function () {
        function loadDesignations(departmentId, designationSelectId) {
            if (departmentId) {
                $.ajax({
                    url: '/dashboard/designations/' + departmentId, // Route for designations
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

        // Event listener for the edit modal
        $('#edit_department_id').change(function () {
            var departmentId = $(this).val();
            loadDesignations(departmentId, '#edit_designation_id');
        });

        // Optional: Pre-load designations in the edit modal when it is opened
        $('#edit_department_id').trigger('change');
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
    // Use event delegation to handle click events for all delete buttons
    document.addEventListener('DOMContentLoaded', function() {
        const deleteLinks = document.querySelectorAll('[id^="delete-employee-link"]');

        deleteLinks.forEach(function(deleteLink) {
            deleteLink.addEventListener('click', function(e) {
                e.preventDefault();
                const employeeId = this.getAttribute('data-employee-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this action!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    customClass: {
                        confirmButton: 'btn btn-danger',
                        cancelButton: 'btn btn-secondary'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If confirmed, find the form and submit it
                        document.getElementById('delete-employee-form-' + employeeId).submit();
                    }
                });
            });
        });
    });
</script>
<script>
 $(document).ready(function() {
    // Handle department change to load designations
    $('#department_id').change(function() {
        var department_id = $(this).val();

        if (department_id) {
            $.ajax({
                url: '/dashboard/designations/' + department_id, // Route for designations
                type: 'GET',
                success: function(data) {
                    var designationSelect = $('#designation_id');
                    designationSelect.empty(); // Clear previous designations
                    designationSelect.append('<option value="" disabled>Select Designation</option>');

                    // Loop through and append designations to the dropdown
                    $.each(data, function(key, designation) {
                        designationSelect.append('<option value="' + designation.id + '">' + designation.designation_name + '</option>');
                    });
                },
                error: function() {
                    alert('Failed to load designations. Please try again.');
                }
            });
        } else {
            $('#designation_id').empty();
            $('#designation_id').append('<option value="" disabled>Select Designation</option>');
        }
    });
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



<!-- JavaScript for Add and Remove Training Sections -->
<script>
    const addTrainingBtn = document.getElementById("addTrainingBtn");
    const trainingFormContainer = document.getElementById("trainingFormContainer");

    function createNewTrainingFormSection() {
        const formSection = document.createElement('div');
        formSection.classList.add('form-section');

        formSection.innerHTML = `
                <div class="soft-bg-3 row">
                <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="train_type">Training Type</label>
                                                <input type="text" class="form-control" id="train_type" name="train_type" placeholder="Training Type">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="course_title">Course Title</label>
                                                <input type="text" class="form-control" id="course_title" name="course_title" placeholder="Course Title">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="description">Course Description</label>
                                                <textarea class="form-control" rows="6" cols="4" name="description"
                                            placeholder="Write Here"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="course_duration">Course Duration</label>
                                                <select class="form-select form-control" id="course_duration" name="course_duration" placeholder="Course Duration">
                                                    <option>3 Month</option>
                                                    <option>6 month</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="course_start">Course Start Date</label>
                                                <input type="date" class="form-control" id="course_start" name="course_start">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="course_end">Course End Date</label>
                                                <input type="date" class="form-control" id="course_end" name="course_end" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="year">Year</label>
                                                <input type="date" class="form-control" id="year" name="year">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="institute_name">Institute Name</label>
                                                <input type="text" class="form-control" id="institute_name" name="institute_name" placeholder="Institute Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <label for="institute_address">Institute Address</label>
                                                <input type="text" class="form-control" id="institute_address" name="institute_address" placeholder="Institute Address">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="resource">Trainer/Resource </label>
                                                <input type="text" class="form-control" id="resource" name="resource" placeholder="Trainer/Resource">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="result">Result</label>
                                                <input type="text" class="form-control" id="result" name="result" placeholder="Result">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="certificate">Certificate</label>
                                                <input type="file" class="form-control" id="certificate" name="certificate">
                                            </div>
                                        </div>
                    <div class="col-6 ps-auto">
                        <button type="button" class="btn btn-danger removeFormBtn">-</button>
                        <button type="button" class="btn btn-primary addFormBtn">+</button>
                    </div>
                </div>
        `;

        const removeBtn = formSection.querySelector(".removeFormBtn");
        const addFormBtnInside = formSection.querySelector(".addFormBtn");
        removeBtn.addEventListener("click", function () {
            formSection.remove();
            if (trainingFormContainer.children.length === 0) {
                noExperienceFormsMessage.style.display = "block";
            }
        });
        addFormBtnInside.addEventListener("click", function () {
            const newFormSection = createNewTrainingFormSection();
            trainingFormContainer.appendChild(newFormSection);
            noExperienceFormsMessage.style.display = "none";
        });

        return formSection;
    }
    addTrainingBtn.addEventListener("click", function () {
        const newFormSection = createNewTrainingFormSection();
        trainingFormContainer.appendChild(newFormSection);
        noExperienceFormsMessage.style.display = "none";
    });

</script>
<!-- JavaScript for Add and Remove experience Sections -->
<script>
    const addExperienceBtn = document.getElementById("addExperienceBtn");
    const experienceFormContainer = document.getElementById("experienceFormContainer");

    function createNewExperienceFormSection() {
    const formSection = document.createElement('div');
    formSection.classList.add('form-section');

    formSection.innerHTML = `
    <div class="soft-bg-3 row">
    <div class="col-sm-4">
    <div class="form-group">
    <label for="company_name">Company Name</label>
    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name">
    </div>
    </div>
    <div class="col-sm-4">
    <div class="form-group">
    <label for="job_position">Job Position</label>
    <input type="text" class="form-control" id="job_position" name="job_position" placeholder="Enter job position">
    </div>
    </div>
    <div class="col-sm-4">
    <div class="form-group">
    <label for="department">Department</label>
    <input type="text" class="form-control" id="department" name="department" placeholder="Enter department">
    </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
    <label for="job_respons">Job Responsibilities</label>
    <input type="text" class="form-control" id="job_respons" name="job_respons" placeholder="Enter responsibilities">
    </div>
    </div>
    <div class="col-sm-2">
    <div class="form-group">
    <label for="from_date">From Date</label>
    <input type="date" class="form-control" name="from_date" id="from_date">
    </div>
    </div>
    <div class="col-sm-2">
    <div class="form-group">
    <label for="to_date">To Date</label>
    <input type="date" class="form-control"  name="from_date" id="to_date">
    </div>
    </div>
    <div class="col-sm-2">
    <div class="form-group">
    <label for="duration">Duration</label>
    <input type="number" class="form-control" name="duration" id="duration" placeholder="Enter duration (months)">
    </div>
    </div>
    <div class="col-sm-12">
    <div class="form-group">
    <label for="projects">Working Projects Name</label>
    <input type="text" class="form-control" name="projects" id="projects" placeholder="Enter project names">
    </div>
    </div>
    <div class="col-6 ps-auto">
    <button type="button" class="btn btn-danger removeFormBtn">-</button>
    <button type="button" class="btn btn-primary addFormBtn">+</button>
    </div>
    </div>
    `;

    const removeBtn = formSection.querySelector(".removeFormBtn");
    const addFormBtnInside = formSection.querySelector(".addFormBtn");
    removeBtn.addEventListener("click", function () {
    formSection.remove();
    if (experienceFormContainer.children.length === 0) {
    noExperienceFormsMessage.style.display = "block";
    }
    });
    addFormBtnInside.addEventListener("click", function () {
    const newFormSection = createNewExperienceFormSection();
    experienceFormContainer.appendChild(newFormSection);
    noExperienceFormsMessage.style.display = "none";
    });

    return formSection;
    }
    addExperienceBtn.addEventListener("click", function () {
    const newFormSection = createNewExperienceFormSection();
    experienceFormContainer.appendChild(newFormSection);
    noExperienceFormsMessage.style.display = "none";
    });

    noExperienceFormsMessage.style.display = "block";
</script>


@endpush
