<form action="{{ route('company.application-setting-update', $companyInformation->applicationSetting->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="application_title">Application Title</label>
                <input type="text" class="form-control custom-input" value="{{ $companyInformation->applicationSetting->application_title }}" name="application_title" id="application_title" placeholder="Enter Application Title">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="copyright_text">Copyright Text</label>
                <input type="text" class="form-control custom-input" value="{{ $companyInformation->applicationSetting->copyright_text }}" name="copyright_text" id="copyright_text" placeholder="Enter Copyright Text">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="date_format">Date Format</label>
                <select class="form-select form-control custom-input" name="date_format" id="date_format">
                    <option value="dd-mm-yyyy" {{ $companyInformation->applicationSetting->date_format == 'dd-mm-yyyy' ? 'selected' : '' }}>DD-MM-YYYY</option>
                    <option value="mm-dd-yyyy" {{ $companyInformation->applicationSetting->date_format == 'mm-dd-yyyy' ? 'selected' : '' }}>MM-DD-YYYY</option>
                    <option value="yyyy-mm-dd" {{ $companyInformation->applicationSetting->date_format == 'yyyy-mm-dd' ? 'selected' : '' }}>YYYY-MM-DD</option>
                </select>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="time_format">Time Format</label>
                <select class="form-select form-control custom-input" name="time_format" id="time_format">
                    <option value="12" {{ $companyInformation->applicationSetting->time_format == '12' ? 'selected' : '' }}>12-Hour</option>
                    <option value="24" {{ $companyInformation->applicationSetting->time_format == '24' ? 'selected' : '' }}>24-Hour</option>
                </select>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="hstack gap-2 justify-content-end pt-4 pb-3">
                <a href="#" class="cancel-button-1" data-bs-dismiss="modal"><i class='bx bx-x bx-flashing'></i>Cancel</a>
                <button type="submit" class="submit-button-1"><i class='bx bx-upload bx-flashing'></i>Update</button>
            </div>
        </div>
    </div>
</form>
