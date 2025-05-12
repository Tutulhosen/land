<form action="{{ route('company.company-information-update', $companyInformation->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" class="form-control custom-input" id="company_name" value="{{ $companyInformation->company_name }}" name="company_name" placeholder="Enter Company Name">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control custom-input" id="address" value="{{ $companyInformation->address }}" name="address" placeholder="Enter Address">
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="district">District</label>
                <select class="form-select form-control custom-input select2" name="district_id" id="district">
                    <option disabled selected>--Select--</option>
                    @foreach ($districts as $district)
                        <option value="{{ $district->id }}" {{ $district->id == $companyInformation->district_id ? 'selected' : '' }}>
                            {{ $district->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="city">City</label>
                <select class="form-select form-control custom-input select2" name="upazila_id" id="city">
                    <option disabled selected>--Select--</option>
                    <!-- Cities (Upazilas) will be dynamically loaded here -->
                </select>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="zip_code">Zip Code</label>
                <input type="text" class="form-control custom-input" id="zip_code" name="zip_code" value="{{ $companyInformation->zip_code }}" placeholder="Enter Zip Code">
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="timezone">Timezone</label>
                <select class="form-select form-control custom-input select2" id="timezone" name="timezone">
                    <option disabled selected>--Select--</option>
                    @foreach (['UTC-12:00', 'UTC-11:00', 'UTC-10:00', 'UTC-09:00', 'UTC-08:00', 'UTC-07:00', 'UTC-06:00', 'UTC-05:00', 'UTC-04:00', 'UTC-03:00', 'UTC-02:00', 'UTC-01:00', 'UTC+00:00', 'UTC+01:00', 'UTC+02:00', 'UTC+03:00', 'UTC+04:00', 'UTC+05:00', 'UTC+06:00', 'UTC+07:00', 'UTC+08:00', 'UTC+09:00', 'UTC+10:00', 'UTC+11:00', 'UTC+12:00'] as $timezone)
                        <option value="{{ $timezone }}" {{ $timezone == $companyInformation->timezone ? 'selected' : '' }}>{{ $timezone }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="working_days">Working Days</label>
                {{-- <select class="form-select form-control custom-input multipleSelect2" id="working_days" name="working_days[]" multiple="multiple">
                    <option value="Saturday" {{ in_array('Saturday', $companyInformation->working_days) ? 'selected' : '' }}>Saturday</option>
                    <option value="Sunday" {{ in_array('Sunday', $companyInformation->working_days) ? 'selected' : '' }}>Sunday</option>
                    <option value="Monday" {{ in_array('Monday', $companyInformation->working_days) ? 'selected' : '' }}>Monday</option>
                    <option value="Tuesday" {{ in_array('Tuesday', $companyInformation->working_days) ? 'selected' : '' }}>Tuesday</option>
                    <option value="Wednesday" {{ in_array('Wednesday', $companyInformation->working_days) ? 'selected' : '' }}>Wednesday</option>
                    <option value="Thursday" {{ in_array('Thursday', $companyInformation->working_days) ? 'selected' : '' }}>Thursday</option>
                    <option value="Friday" {{ in_array('Friday', $companyInformation->working_days) ? 'selected' : '' }}>Friday</option>
                </select> --}}
            </div>
        </div>


        <div class="col-lg-4">
            <div class="form-group">
                <label for="office_start_time">Office Start Time</label>
                <input type="text" class="form-control custom-input timepicker" name="office_start_time" id="office_start_time" value="{{ $companyInformation->office_start_time }}">
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="office_end_time">Office End Time</label>
                <input type="text" class="form-control custom-input timepicker" name="office_end_time" id="office_end_time" value="{{ $companyInformation->office_end_time }}">
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="company_registration_number">Company Registration Number</label>
                <input type="text" class="form-control custom-input" id="company_registration_number" name="company_registration_number" value="{{ $companyInformation->company_registration_number }}" placeholder="Enter Registration Number">
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="trade_license_number">Trade License Number</label>
                <input type="text" class="form-control custom-input" id="trade_license_number" name="trade_license_number" value="{{ $companyInformation->trade_license_number }}" placeholder="Enter Trade License Number">
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="bin_vat_number">BIN/VAT Number</label>
                <input type="text" class="form-control custom-input" id="bin_vat_number" name="bin_vat_number" value="{{ $companyInformation->bin_vat_number }}" placeholder="Enter BIN/VAT Number">
            </div>
        </div>

        <div class="col-lg-12">
            <div class="hstack gap-2 justify-content-end pt-4 pb-3">
                <a href="#" class="cancel-button-1" data-bs-dismiss="modal"><i class='bx bx-x bx-flashing'></i> Cancel</a>
                <button type="submit" class="submit-button-1"><i class='bx bx-upload bx-flashing'></i> Update</button>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
    $(document).ready(function() {
        // Populate cities when a district is selected
        $('#district').change(function() {
            var districtId = $(this).val();
            if (districtId) {
                $.ajax({
                    url: '/dashboard/system-configuration/company/upazilas/' + districtId,
                    type: 'GET',
                    success: function(data) {
                        $('#city').empty();
                        $('#city').append('<option disabled selected>--Select--</option>');
                        $.each(data, function(key, value) {
                            $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                        // If the company already has a city selected, pre-select it
                        var selectedCity = "{{ old('upazila_id', $companyInformation->upazila_id) }}";
                        if (selectedCity) {
                            $('#city').val(selectedCity).trigger('change');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            } else {
                $('#city').empty();
                $('#city').append('<option disabled selected>--Select--</option>');
            }
        });

        var initialDistrict = "{{ old('district_id', $companyInformation->district_id) }}";
        if (initialDistrict) {
            $('#district').val(initialDistrict).trigger('change');
        }
    });
</script>
@endpush
