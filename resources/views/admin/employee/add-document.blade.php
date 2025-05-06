@extends('layouts.admin')
@section('title','Employees Create')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{route('employee.document.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header project-details-card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="project-details-card-header-title"><i class='bx bx-user bx-tada'></i>
                                    Add Documents of {{$employee->first_name}} {{$employee->last_name}}({{$employee->emp_id}})</h4>
                                    <button class="btn btn-outline-danger ms-auto" onclick="history.back()"> <i class='bx bx-arrow-to-left bx-fade-left' ></i>Back</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if ($employeedocument)
                                @php
                                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
                                @endphp

                                <div class="col-sm-3">
                                    <input type="text" name="employee_id" value="{{$employee->id}}" style="display: none">
                                    <div class="form-group">
                                        <label>Profile Picture</label>
                                        <label for="profile_picture_{{$employee->id}}">
                                            @php
                                            $profilePicturePath = $employeedocument->profile_picture ? asset('storage/' .
                                            $employeedocument->profile_picture) : asset('admin/assets/img/fileupload.png');
                                            $profilePictureExtension = pathinfo($profilePicturePath, PATHINFO_EXTENSION);
                                            $profilePictureFileName = $employeedocument->profile_picture ?
                                            basename($employeedocument->profile_picture) : '';
                                            $profilePicturePreview = in_array(strtolower($profilePictureExtension),
                                            $allowedExtensions) ? $profilePicturePath : asset('admin/assets/img/files.png');
                                            @endphp
                                            <img src="{{ $profilePicturePreview }}" alt="Profile Picture" class="img-thumbnail"
                                                id="profile_picture_file_{{$employee->id}}" style="cursor: pointer;" />
                                            <input type="file" class="form-control custom-input"
                                                id="profile_picture_{{$employee->id}}" name="profile_picture"
                                                style="display: none;" />
                                            <div id="profile_picture_file_{{$employee->id}}_name">
                                                <p
                                                    style="width:100%; word-wrap:break-word; white-space:normal; font-size: 10px;">
                                                    {{$profilePictureFileName}}</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Signature</label>
                                        <label for="signature_{{$employee->id}}">
                                            @php
                                            $signaturePath = $employeedocument->signature ? asset('storage/' .
                                            $employeedocument->signature) : asset('admin/assets/img/fileupload.png');
                                            $signatureExtension = pathinfo($signaturePath, PATHINFO_EXTENSION);
                                            $signatureFileName = $employeedocument->signature ?
                                            basename($employeedocument->signature) : '';
                                            $signaturePreview = in_array(strtolower($signatureExtension), $allowedExtensions) ?
                                            $signaturePath : asset('admin/assets/img/files.png');
                                            @endphp
                                            <img src="{{ $signaturePreview }}" alt="Signature" class="img-thumbnail"
                                                id="signature_file_{{$employee->id}}" style="cursor: pointer;" />
                                            <input type="file" class="form-control custom-input"
                                                id="signature_{{$employee->id}}" name="signature" style="display: none;" />
                                            <div id="signature_file_{{$employee->id}}_name">
                                                <p
                                                    style="width:100%; word-wrap:break-word; white-space:normal; font-size: 10px;">
                                                    {{$signatureFileName}}</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>NID Card Front</label>
                                        <label for="nid_card_front_{{$employee->id}}">
                                            @php
                                            $nidCardPath = $employeedocument->nid_card_front ? asset('storage/' .
                                            $employeedocument->nid_card_front) : asset('admin/assets/img/fileupload.png');
                                            $nidCardExtension = pathinfo($nidCardPath, PATHINFO_EXTENSION);
                                            $nidCardFileName = $employeedocument->nid_card_front ?
                                            basename($employeedocument->nid_card_front) : '';
                                            $nidCardPreview = in_array(strtolower($nidCardExtension), $allowedExtensions) ?
                                            $nidCardPath : asset('admin/assets/img/files.png');
                                            @endphp
                                            <img src="{{ $nidCardPreview }}" alt="NID Card" class="img-thumbnail"
                                                id="nid_card_front_file_{{$employee->id}}" style="cursor: pointer;" />
                                            <input type="file" class="form-control custom-input" id="nid_card_front_{{$employee->id}}"
                                                name="nid_card_front" style="display: none;" />
                                            <div id="nid_card_front_file_{{$employee->id}}_name">
                                                <p
                                                    style="width:100%; word-wrap:break-word; white-space:normal; font-size: 10px;">
                                                    {{$nidCardFileName}}</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>NID Card Back</label>
                                        <label for="nid_card_back_{{$employee->id}}">
                                            @php
                                            $nidCardPath = $employeedocument->nid_card_back ? asset('storage/' .
                                            $employeedocument->nid_card_back) : asset('admin/assets/img/fileupload.png');
                                            $nidCardExtension = pathinfo($nidCardPath, PATHINFO_EXTENSION);
                                            $nidCardFileName = $employeedocument->nid_card_back ?
                                            basename($employeedocument->nid_card_back) : '';
                                            $nidCardPreview = in_array(strtolower($nidCardExtension), $allowedExtensions) ?
                                            $nidCardPath : asset('admin/assets/img/files.png');
                                            @endphp
                                            <img src="{{ $nidCardPreview }}" alt="NID Card" class="img-thumbnail"
                                                id="nid_card_back_file_{{$employee->id}}" style="cursor: pointer;" />
                                            <input type="file" class="form-control custom-input" id="nid_card_back_{{$employee->id}}"
                                                name="nid_card_back" style="display: none;" />
                                            <div id="nid_card_back_file_{{$employee->id}}_name">
                                                <p
                                                    style="width:100%; word-wrap:break-word; white-space:normal; font-size: 10px;">
                                                    {{$nidCardFileName}}</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>CV</label>
                                        <label for="cv_{{$employee->id}}">
                                            @php
                                            $cvPath = $employeedocument->cv ? asset('storage/' .
                                            $employeedocument->cv) : asset('admin/assets/img/fileupload.png');
                                            $cvExtension = pathinfo($cvPath, PATHINFO_EXTENSION);
                                            $cvFileName = $employeedocument->cv ? basename($employeedocument->cv) :
                                            '';
                                            $cvPreview = in_array(strtolower($cvExtension), $allowedExtensions) ?
                                            $cvPath : asset('admin/assets/img/files.png');
                                            @endphp
                                            <img src="{{ $cvPreview }}" alt="cv" class="img-thumbnail"
                                                id="cv_file_{{$employee->id}}" style="cursor: pointer;" />
                                            <input type="file" class="form-control custom-input" id="cv_{{$employee->id}}"
                                                name="cv" style="display: none;" />
                                            <div id="cv_file_{{$employee->id}}_name">
                                                <p
                                                    style="width:100%; word-wrap:break-word; white-space:normal; font-size: 10px;">
                                                    {{$cvFileName}}</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Trade Licence</label>
                                        <label for="trade_licence_{{$employee->id}}">
                                            @php
                                            $trade_licencePath = $employeedocument->trade_licence ? asset('storage/' .
                                            $employeedocument->trade_licence) : asset('admin/assets/img/fileupload.png');
                                            $trade_licenceExtension = pathinfo($trade_licencePath, PATHINFO_EXTENSION);
                                            $trade_licenceName = $employeedocument->trade_licence ?
                                            basename($employeedocument->trade_licence) : '';
                                            $trade_licencePreview = in_array(strtolower($trade_licenceExtension),
                                            $allowedExtensions) ? $trade_licencePath : asset('admin/assets/img/files.png');
                                            @endphp
                                            <img src="{{ $trade_licencePreview }}" alt="Trade Licence"
                                                class="img-thumbnail" id="trade_licence_file_{{$employee->id}}"
                                                style="cursor: pointer;" />
                                            <input type="file" class="form-control custom-input"
                                                id="trade_licence_{{$employee->id}}" name="trade_licence"
                                                style="display: none;" />
                                            <div id="trade_licence_file_{{$employee->id}}_name">
                                                <p
                                                    style="width:100%; word-wrap:break-word; white-space:normal; font-size: 10px;">
                                                    {{$trade_licenceName}}</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>VAT</label>
                                        <label for="vat_{{$employee->id}}">
                                            @php
                                            $vatPath = $employeedocument->vat ? asset('storage/' .
                                            $employeedocument->vat) : asset('admin/assets/img/fileupload.png');
                                            $vatExtension = pathinfo($vatPath, PATHINFO_EXTENSION);
                                            $vatFileName = $employeedocument->vat ?
                                            basename($employeedocument->vat) : '';
                                            $vatPreview = in_array(strtolower($vatExtension),
                                            $allowedExtensions) ? $vatPath : asset('admin/assets/img/files.png');
                                            @endphp
                                            <img src="{{ $vatPreview }}" alt="VAT"
                                                class="img-thumbnail" id="vat_file_{{$employee->id}}"
                                                style="cursor: pointer;" />
                                            <input type="file" class="form-control custom-input"
                                                id="vat_{{$employee->id}}" name="vat"
                                                style="display: none;" />
                                            <div id="vat_file_{{$employee->id}}_name">
                                                <p
                                                    style="width:100%; word-wrap:break-word; white-space:normal; font-size: 10px;">
                                                    {{$vatFileName}}</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>TAX</label>
                                        <label for="tax_{{$employee->id}}">
                                            @php
                                            $taxPath = $employeedocument->tax ?
                                            asset('storage/' . $employeedocument->tax) :
                                            asset('admin/assets/img/fileupload.png');
                                            $taxExtension = pathinfo($taxPath,
                                            PATHINFO_EXTENSION);
                                            $taxFileName = $employeedocument->tax ?
                                            basename($employeedocument->tax) : '';
                                            $taxPreview = in_array(strtolower($taxExtension),
                                            $allowedExtensions) ? $taxPath :
                                            asset('admin/assets/img/files.png');
                                            @endphp
                                            <img src="{{ $taxPreview }}" alt="TAX"
                                                class="img-thumbnail" id="tax_file_{{$employee->id}}"
                                                style="cursor: pointer;" />
                                            <input type="file" class="form-control custom-input"
                                                id="tax_{{$employee->id}}" name="tax"
                                                style="display: none;" />
                                            <div id="tax_file_{{$employee->id}}_name">
                                                <p
                                                    style="width:100%; word-wrap:break-word; white-space:normal; font-size: 10px;">
                                                    {{$taxFileName}}</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Gong Picture</label>
                                        <label for="gong_picture_{{$employee->id}}">
                                            @php
                                            $gong_picturePath = $employeedocument->gong_picture ?
                                            asset('storage/' . $employeedocument->gong_picture) :
                                            asset('admin/assets/img/fileupload.png');
                                            $gong_pictureExtension = pathinfo($gong_picturePath,
                                            PATHINFO_EXTENSION);
                                            $gong_pictureFileName = $employeedocument->gong_picture ?
                                            basename($employeedocument->gong_picture) : '';
                                            $gong_picturePreview = in_array(strtolower($gong_pictureExtension),
                                            $allowedExtensions) ? $gong_picturePath :
                                            asset('admin/assets/img/files.png');
                                            @endphp
                                            <img src="{{ $gong_picturePreview }}" alt="gong_picture"
                                                class="img-thumbnail" id="gong_picture_file_{{$employee->id}}"
                                                style="cursor: pointer;" />
                                            <input type="file" class="form-control custom-input"
                                                id="gong_picture_{{$employee->id}}" name="gong_picture"
                                                style="display: none;" />
                                            <div id="gong_picture_file_{{$employee->id}}_name">
                                                <p
                                                    style="width:100%; word-wrap:break-word; white-space:normal; font-size: 10px;">
                                                    {{$gong_pictureFileName}}</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                @else
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Profile Picture</label>
                                        <label for="profile_picture_{{$employee->id}}">
                                            <img src="{{ asset('admin') }}/assets/img/fileupload.png" alt="Profile Picture"
                                                class="img-thumbnail" id="profile_picture_file_{{$employee->id}}"
                                                style="cursor: pointer;" />
                                            <input type="file" class="form-control custom-input"
                                                id="profile_picture_{{$employee->id}}" name="profile_picture"
                                                style="display: none;" />
                                            <div id="profile_picture_file_{{$employee->id}}_name"></div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Signature</label>
                                        <label for="signature_{{$employee->id}}">
                                            <img src="{{ asset('admin') }}/assets/img/fileupload.png" alt="Signature"
                                                class="img-thumbnail" id="signature_file_{{$employee->id}}"
                                                style="cursor: pointer;" />
                                            <input type="file" class="form-control custom-input"
                                                id="signature_{{$employee->id}}" name="signature" style="display: none;" />
                                            <div id="signature_file_{{$employee->id}}_name"></div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" name="employee_id" value="{{$employee->id}}" style="display: none">
                                        <label>NID Card Front</label>
                                        <label for="nid_card_front_{{$employee->id}}">
                                            <img src="{{ asset('admin') }}/assets/img/fileupload.png" alt="NID Card"
                                                class="img-thumbnail" id="nid_card_front_file_{{$employee->id}}"
                                                style="cursor: pointer;" />
                                            <input type="file" class="form-control custom-input" id="nid_card_front_{{$employee->id}}"
                                                name="nid_card_front" style="display: none;" />
                                            <div id="nid_card_front_file_{{$employee->id}}_name"></div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="text" name="employee_id" value="{{$employee->id}}" style="display: none">
                                        <label>NID Card Back</label>
                                        <label for="nid_card_back_{{$employee->id}}">
                                            <img src="{{ asset('admin') }}/assets/img/fileupload.png" alt="NID Card"
                                                class="img-thumbnail" id="nid_card_back_file_{{$employee->id}}"
                                                style="cursor: pointer;" />
                                            <input type="file" class="form-control custom-input" id="nid_card_back_{{$employee->id}}"
                                                name="nid_card_back" style="display: none;" />
                                            <div id="nid_card_back_file_{{$employee->id}}_name"></div>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>cv</label>
                                        <label for="cv_{{$employee->id}}">
                                            <img src="{{ asset('admin') }}/assets/img/fileupload.png" alt="cv"
                                                class="img-thumbnail" id="cv_file_{{$employee->id}}"
                                                style="cursor: pointer;" />
                                            <input type="file" class="form-control custom-input" id="cv_{{$employee->id}}"
                                                name="cv" style="display: none;" />
                                            <div id="cv_file_{{$employee->id}}_name"></div>
                                        </label>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Trade Licence</label>
                                        <label for="trade_licence_{{$employee->id}}">
                                            <img src="{{ asset('admin') }}/assets/img/fileupload.png" alt="Trade Licence"
                                                class="img-thumbnail" id="trade_licence_file_{{$employee->id}}"
                                                style="cursor: pointer;" />
                                            <input type="file" class="form-control custom-input"
                                                id="trade_licence_{{$employee->id}}" name="trade_licence"
                                                style="display: none;" />
                                            <div id="trade_licence_file_{{$employee->id}}_name"></div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>VAT</label>
                                        <label for="vat_{{$employee->id}}">
                                            <img src="{{ asset('admin') }}/assets/img/fileupload.png" alt="VAT"
                                                class="img-thumbnail" id="vat_file_{{$employee->id}}"
                                                style="cursor: pointer;" />
                                            <input type="file" class="form-control custom-input"
                                                id="vat_{{$employee->id}}" name="vat"
                                                style="display: none;" />
                                            <div id="vat_file_{{$employee->id}}_name"></div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>TAX</label>
                                        <label for="tax_{{$employee->id}}">
                                            <img src="{{ asset('admin') }}/assets/img/fileupload.png"
                                                alt="TAX" class="img-thumbnail"
                                                id="tax_file_{{$employee->id}}" style="cursor: pointer;" />
                                            <input type="file" class="form-control custom-input"
                                                id="tax_{{$employee->id}}" name="tax"
                                                style="display: none;" />
                                            <div id="tax_file_{{$employee->id}}_name"></div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Gong Picture</label>
                                        <label for="gong_picture_{{$employee->id}}">
                                            <img src="{{ asset('admin') }}/assets/img/fileupload.png"
                                                alt="gong_picture" class="img-thumbnail"
                                                id="gong_picture_file_{{$employee->id}}" style="cursor: pointer;" />
                                            <input type="file" class="form-control custom-input"
                                                id="gong_picture_{{$employee->id}}" name="gong_picture"
                                                style="display: none;" />
                                            <div id="gong_picture_file_{{$employee->id}}_name"></div>
                                        </label>
                                    </div>
                                </div>
                                @endif
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Other's Documents</label>
                                        <label for="other_documents_{{$employee->id}}">
                                            <img src="{{ asset('admin') }}/assets/img/fileupload.png" alt="Other's Documents"
                                                class="img-thumbnail" id="other_documents_{{$employee->id}}_file"
                                                style="cursor: pointer;" />
                                            <input type="file" class="form-control custom-input"
                                                id="other_documents_{{$employee->id}}" name="other_documents[]"
                                                style="display: none;" multiple />
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="other_documents_{{$employee->id}}_preview">
                            </div>
                            <div class="row">
                                @foreach ($employeeotherdocuments as $employeeotherdocument)
                                @if ($employeeotherdocument->employee_id == $employee->id)
                                @php
                                $extension = strtolower(pathinfo($employeeotherdocument->file_path, PATHINFO_EXTENSION));
                                $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg'];
                                $fileName = basename($employeeotherdocument->file_path);
                                @endphp
                                <div class="col-sm-3" style="position: relative;">
                                    <div class="form-group text-center">
                                        <label for="other_documents_files">
                                            @if(in_array($extension, $imageExtensions))
                                            <img src="{{ asset('storage/' . $employeeotherdocument->file_path) }}"
                                                alt="Other's Documents" class="img-thumbnail" id="other_documents_files"
                                                data-file-id="{{ $employeeotherdocument->id }}" style="cursor: pointer;" />
                                            @else
                                            <img src="{{ asset("admin") }}/assets/img/files.png" alt="Other's Documents"
                                                class="img-thumbnail" id="other_documents_files" style="cursor: pointer;" />
                                            @endif
                                        </label>
                                        <a href="#" class="btn btn-danger btn-sm delete-image"
                                            style="position: absolute; top: 15px; right: 25px; z-index: 10;"
                                            data-file-id="{{ $employeeotherdocument->id }}"> &times; </a>
                                        <div class="mt-2">
                                            <small>{{ $fileName }}</small>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-center pt-4 pb-3">
                                    <a href="#" class="cancel-button-1" data-bs-dismiss="modal"><i
                                            class='bx bx-x bx-flashing'></i>
                                        Cancel</a>
                                    <button href="#" type="submit" class="submit-button-1"><i
                                            class='bx bx-upload bx-flashing'></i>
                                        Submit</button>
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
@push('styles')
<style>
    .img-thumbnail {
        max-width: 370px !important;
        height: 270px !important;
    }
</style>
@endpush
@push('scripts')
<script>
    $(document).ready(function () {
        $('.delete-image').on('click', function () {
            var fileId = $(this).data('file-id');
            var parentDiv = $(this).closest('.col-sm-3');
            $.ajax({
                url: '/dashboard/employee/delete/document/',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    file_id: fileId
                },
                success: function (response) {
                    if (response.success) {
                        parentDiv.fadeOut();
                    }
                }
            });
        });
    });



    $(document).ready(function () {
        // Create a DataTransfer object to manage the files
        const dt = new DataTransfer();

        // When files are selected, update the array and display them as thumbnails
        $('#other_documents_{{$employee->id}}').on('change', function () {
            const files = this.files;

            if (files && files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    dt.items.add(file); // Add the file to the DataTransfer object

                    const fileExtension = file.name.split('.').pop().toLowerCase();
                    const allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];

                    const reader = new FileReader();

                    reader.onload = function (e) {
                        const fileSrc = allowedExtensions.indexOf(fileExtension) !== -1 ?
                            e.target.result :
                            "{{ asset('admin') }}/assets/img/files.png";
                        const img = `
                    <div class="col-sm-3 position-relative" data-file-name="${file.name}" style="display: inline-block;">
                        <div class="form-group">
                            <div class="image-container" style="position: relative; text-align: center;">
                                <img src="${fileSrc}" alt="Other's Documents" class="img-thumbnail" style="cursor: pointer;" />
                                <div class="file-name-overlay" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); max-width:80%; word-wrap:break-word; white-space:normal; background-color: rgba(0, 0, 0, 0.5); color: #fff; padding: 5px; border-radius: 5px; font-size: 12px;">
                                    ${file.name}
                                </div>
                                <button class="btn btn-danger btn-sm remove-image" style="position: absolute; top: 10px; right: 10px; z-index: 10;">&times;</button>
                            </div>
                        </div>
                    </div>
                    `;
                        $('#other_documents_{{$employee->id}}_preview').append(img);
                    };

                    reader.readAsDataURL(file);
                }
            }
            this.files = dt.files;
            // $(this).val('');
        });

        $('#other_documents_{{$employee->id}}_preview').on('click', '.remove-image', function (e) {
            e.preventDefault();

            const fileNameToRemove = $(this).closest('.col-sm-3').data('file-name');
            for (let i = 0; i < dt.items.length; i++) {
                if (dt.items[i].getAsFile().name === fileNameToRemove) {
                    dt.items.remove(i);
                    break;
                }
            }
            $('#other_documents_{{$employee->id}}')[0].files = dt.files;
            $(this).closest('.col-sm-3').remove();
        });
    });



    $(document).ready(function () {

        function handleImagePreview(input, previewId, previewNameId) {
            $(input).on('change', function (event) {
                const file = event.target.files[0]; // Get the selected file
                if (file) {
                    // Extract file extension
                    const fileName = file.name;
                    const extension = fileName.split('.').pop().toLowerCase();

                    // List of allowed image extensions
                    const allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];

                    if (allowedExtensions.includes(extension)) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            $(previewId).attr('src', e.target.result);
                            $(previewNameId).html(
                                '<p style="width:100%; word-wrap:break-word; white-space:normal; font-size: 10px;">' +
                                fileName + '</p>');

                        };
                        reader.readAsDataURL(file); // Read the file as a data URL
                    } else {
                        // If the file is not a valid image extension, show the default file image
                        $(previewId).attr('src', '{{ asset("admin") }}/assets/img/files.png');
                        $(previewNameId).html(
                            '<p style="width:100%; word-wrap:break-word; white-space:normal; font-size: 10px;">' +
                            fileName + '</p>');
                    }
                } else {
                    // If no file is selected, show the default file image
                    $(previewId).attr('src', '{{ asset("admin") }}/assets/img/files.png');
                    $('#previewNameId').text('No file selected');
                }
            });
        }




        $('#profile_picture_file_{{$employee->id}}').on('click', function () {
            handleImagePreview('#profile_picture_{{$employee->id}}',
                '#profile_picture_file_{{$employee->id}}',
                '#profile_picture_file_{{$employee->id}}_name');
        });

        $('#signature_file_{{$employee->id}}').on('click', function () {
            handleImagePreview('#signature_{{$employee->id}}', '#signature_file_{{$employee->id}}',
                '#signature_file_{{$employee->id}}_name');
        });

        $('#nid_card_front_file_{{$employee->id}}').on('click', function () {
            handleImagePreview('#nid_card_front_{{$employee->id}}', '#nid_card_front_file_{{$employee->id}}',
                '#nid_card_front_file_{{$employee->id}}_name');
        });
        $('#nid_card_back_file_{{$employee->id}}').on('click', function () {
            handleImagePreview('#nid_card_back_{{$employee->id}}', '#nid_card_back_file_{{$employee->id}}',
                '#nid_card_back_file_{{$employee->id}}_name');
        });


        $('#cv_file_{{$employee->id}}').on('click', function () {
            handleImagePreview('#cv_{{$employee->id}}', '#cv_file_{{$employee->id}}',
                '#cv_file_{{$employee->id}}_name');
        });

        $('#trade_licence_file_{{$employee->id}}').on('click', function () {
            handleImagePreview('#trade_licence_{{$employee->id}}',
                '#trade_licence_file_{{$employee->id}}',
                '#trade_licence_file_{{$employee->id}}_name');
        });

        $('#vat_file_{{$employee->id}}').on('click', function () {
            handleImagePreview('#vat_{{$employee->id}}',
                '#vat_file_{{$employee->id}}',
                '#vat_file_{{$employee->id}}_name');
        });

        $('#tax_file_{{$employee->id}}').on('click', function () {
            handleImagePreview('#tax_{{$employee->id}}',
                '#tax_file_{{$employee->id}}',
                '#tax_file_{{$employee->id}}_name');
        });

        $('#gong_picture_file_{{$employee->id}}').on('click', function () {
            handleImagePreview('#gong_picture_{{$employee->id}}',
                '#gong_picture_file_{{$employee->id}}',
                '#gong_picture_file_{{$employee->id}}_name');
        });
    });

</script>
@endpush
