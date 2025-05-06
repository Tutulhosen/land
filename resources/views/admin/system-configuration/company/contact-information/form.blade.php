<form action="{{ route('company.contact-information-update', $companyInformation->contactInformation->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="official_contact_number">Official Contact Number</label>
                <input type="text" class="form-control custom-input" id="official_contact_number" value="{{ $companyInformation->contactInformation->official_contact_number }}" name="official_contact_number" placeholder="Enter Official Contact Number">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="whatsapp_number">WhatsApp Number</label>
                <input type="text" class="form-control custom-input" id="whatsapp_number" name="whatsapp_number" value="{{ $companyInformation->contactInformation->whatsapp_number }}" placeholder="Enter WhatsApp Number">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="landline_number">Landline Number</label>
                <input type="text" class="form-control custom-input" id="landline_number" name="landline_number" value="{{ $companyInformation->contactInformation->landline_number }}" placeholder="Enter Landline Number">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="hotline_number">Hotline Number</label>
                <input type="text" class="form-control custom-input" id="hotline_number" name="hotline_number" value="{{ $companyInformation->contactInformation->hotline_number }}" placeholder="Enter Hotline Number">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="email_address">Email Address</label>
                <input type="text" class="form-control custom-input" id="email_address" name="email_address" value="{{ $companyInformation->contactInformation->email_address }}" placeholder="Enter Email Address">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="website_address">Website Address</label>
                <input type="text" class="form-control custom-input" id="website_address" name="website_address" value="{{ $companyInformation->contactInformation->website_address }}" placeholder="Enter Website URL">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="google_map_iframe">Google Map iFrame</label>
                <textarea class="form-control custom-input" name="google_map_iframe" id="google_map_iframe" cols="10" rows="5" placeholder="Enter Google Map iFrame">{{ $companyInformation->contactInformation->google_map_iframe }}</textarea>
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
