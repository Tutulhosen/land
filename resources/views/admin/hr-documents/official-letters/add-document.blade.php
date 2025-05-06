<!--Documents Upload MODAL-->
<div class="modal fade bs-example-modal-center" id="add-documents-{{$employee->id}}" tabindex="-1"
    aria-labelledby="exampleModalgridLabel" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>
                    Add Employee Documents</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('employee.document.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        @if ($employeedocument = $employeedocuments->where('employee_id', $employee->id)->first())
                        @php
                        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
                        @endphp

                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" name="employee_id" value="{{$employee->id}}" style="display: none">
                                <label>NID Card</label>
                                <label for="nid_card_{{$employee->id}}">
                                    @php
                                    $nidCardPath = $employeedocument->nid_card ? asset('storage/' .
                                    $employeedocument->nid_card) : asset('admin/assets/img/fileupload.png');
                                    $nidCardExtension = pathinfo($nidCardPath, PATHINFO_EXTENSION);
                                    $nidCardFileName = $employeedocument->nid_card ?
                                    basename($employeedocument->nid_card) : '';
                                    $nidCardPreview = in_array(strtolower($nidCardExtension), $allowedExtensions) ?
                                    $nidCardPath : asset('admin/assets/img/files.png');
                                    @endphp
                                    <img src="{{ $nidCardPreview }}" alt="NID Card" class="img-thumbnail"
                                        id="nid_card_file_{{$employee->id}}" style="cursor: pointer;" />
                                    <input type="file" class="form-control custom-input" id="nid_card_{{$employee->id}}"
                                        name="nid_card" style="display: none;" />
                                    <div id="nid_card_file_{{$employee->id}}_name">
                                        <p
                                            style="width:100%; word-wrap:break-word; white-space:normal; font-size: 10px;">
                                            {{$nidCardFileName}}</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-4">
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

                        <div class="col-sm-4">
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

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Resume</label>
                                <label for="resume_{{$employee->id}}">
                                    @php
                                    $resumePath = $employeedocument->resume ? asset('storage/' .
                                    $employeedocument->resume) : asset('admin/assets/img/fileupload.png');
                                    $resumeExtension = pathinfo($resumePath, PATHINFO_EXTENSION);
                                    $resumeFileName = $employeedocument->resume ? basename($employeedocument->resume) :
                                    '';
                                    $resumePreview = in_array(strtolower($resumeExtension), $allowedExtensions) ?
                                    $resumePath : asset('admin/assets/img/files.png');
                                    @endphp
                                    <img src="{{ $resumePreview }}" alt="Resume" class="img-thumbnail"
                                        id="resume_file_{{$employee->id}}" style="cursor: pointer;" />
                                    <input type="file" class="form-control custom-input" id="resume_{{$employee->id}}"
                                        name="resume" style="display: none;" />
                                    <div id="resume_file_{{$employee->id}}_name">
                                        <p
                                            style="width:100%; word-wrap:break-word; white-space:normal; font-size: 10px;">
                                            {{$resumeFileName}}</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Resignation Letter</label>
                                <label for="resignation_letter_{{$employee->id}}">
                                    @php
                                    $resignationLetterPath = $employeedocument->resignation_letter ? asset('storage/' .
                                    $employeedocument->resignation_letter) : asset('admin/assets/img/fileupload.png');
                                    $resignationLetterExtension = pathinfo($resignationLetterPath, PATHINFO_EXTENSION);
                                    $resignationLetterName = $employeedocument->resignation_letter ?
                                    basename($employeedocument->resignation_letter) : '';
                                    $resignationLetterPreview = in_array(strtolower($resignationLetterExtension),
                                    $allowedExtensions) ? $resignationLetterPath : asset('admin/assets/img/files.png');
                                    @endphp
                                    <img src="{{ $resignationLetterPreview }}" alt="Resignation Letter"
                                        class="img-thumbnail" id="resignation_letter_file_{{$employee->id}}"
                                        style="cursor: pointer;" />
                                    <input type="file" class="form-control custom-input"
                                        id="resignation_letter_{{$employee->id}}" name="resignation_letter"
                                        style="display: none;" />
                                    <div id="resignation_letter_file_{{$employee->id}}_name">
                                        <p
                                            style="width:100%; word-wrap:break-word; white-space:normal; font-size: 10px;">
                                            {{$resignationLetterName}}</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Experience Letter</label>
                                <label for="experience_letter_{{$employee->id}}">
                                    @php
                                    $experienceLetterPath = $employeedocument->experience_letter ? asset('storage/' .
                                    $employeedocument->experience_letter) : asset('admin/assets/img/fileupload.png');
                                    $experienceLetterExtension = pathinfo($experienceLetterPath, PATHINFO_EXTENSION);
                                    $experienceLetterFileName = $employeedocument->experience_letter ?
                                    basename($employeedocument->experience_letter) : '';
                                    $experienceLetterPreview = in_array(strtolower($experienceLetterExtension),
                                    $allowedExtensions) ? $experienceLetterPath : asset('admin/assets/img/files.png');
                                    @endphp
                                    <img src="{{ $experienceLetterPreview }}" alt="Experience Letter"
                                        class="img-thumbnail" id="experience_letter_file_{{$employee->id}}"
                                        style="cursor: pointer;" />
                                    <input type="file" class="form-control custom-input"
                                        id="experience_letter_{{$employee->id}}" name="experience_letter"
                                        style="display: none;" />
                                    <div id="experience_letter_file_{{$employee->id}}_name">
                                        <p
                                            style="width:100%; word-wrap:break-word; white-space:normal; font-size: 10px;">
                                            {{$experienceLetterFileName}}</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Clearance Certificate</label>
                                <label for="clearance_certificate_{{$employee->id}}">
                                    @php
                                    $clearanceCertificatePath = $employeedocument->clearance_certificate ?
                                    asset('storage/' . $employeedocument->clearance_certificate) :
                                    asset('admin/assets/img/fileupload.png');
                                    $clearanceCertificateExtension = pathinfo($clearanceCertificatePath,
                                    PATHINFO_EXTENSION);
                                    $clearanceCertificateFileName = $employeedocument->clearance_certificate ?
                                    basename($employeedocument->clearance_certificate) : '';
                                    $clearanceCertificatePreview = in_array(strtolower($clearanceCertificateExtension),
                                    $allowedExtensions) ? $clearanceCertificatePath :
                                    asset('admin/assets/img/files.png');
                                    @endphp
                                    <img src="{{ $clearanceCertificatePreview }}" alt="Clearance Certificate"
                                        class="img-thumbnail" id="clearance_certificate_file_{{$employee->id}}"
                                        style="cursor: pointer;" />
                                    <input type="file" class="form-control custom-input"
                                        id="clearance_certificate_{{$employee->id}}" name="clearance_certificate"
                                        style="display: none;" />
                                    <div id="clearance_certificate_file_{{$employee->id}}_name">
                                        <p
                                            style="width:100%; word-wrap:break-word; white-space:normal; font-size: 10px;">
                                            {{$clearanceCertificateFileName}}</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        @else
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" name="employee_id" value="{{$employee->id}}" style="display: none">
                                <label>NID Card</label>
                                <label for="nid_card_{{$employee->id}}">
                                    <img src="{{ asset('admin') }}/assets/img/fileupload.png" alt="NID Card"
                                        class="img-thumbnail" id="nid_card_file_{{$employee->id}}"
                                        style="cursor: pointer;" />
                                    <input type="file" class="form-control custom-input" id="nid_card_{{$employee->id}}"
                                        name="nid_card" style="display: none;" />
                                    <div id="nid_card_file_{{$employee->id}}_name"></div>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
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
                        <div class="col-sm-4">
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
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Resume</label>
                                <label for="resume_{{$employee->id}}">
                                    <img src="{{ asset('admin') }}/assets/img/fileupload.png" alt="Resume"
                                        class="img-thumbnail" id="resume_file_{{$employee->id}}"
                                        style="cursor: pointer;" />
                                    <input type="file" class="form-control custom-input" id="resume_{{$employee->id}}"
                                        name="resume" style="display: none;" />
                                    <div id="resume_file_{{$employee->id}}_name"></div>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Resignation Letter</label>
                                <label for="resignation_letter_{{$employee->id}}">
                                    <img src="{{ asset('admin') }}/assets/img/fileupload.png" alt="Resignation Letter"
                                        class="img-thumbnail" id="resignation_letter_file_{{$employee->id}}"
                                        style="cursor: pointer;" />
                                    <input type="file" class="form-control custom-input"
                                        id="resignation_letter_{{$employee->id}}" name="resignation_letter"
                                        style="display: none;" />
                                    <div id="resignation_letter_file_{{$employee->id}}_name"></div>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Experience Letter</label>
                                <label for="experience_letter_{{$employee->id}}">
                                    <img src="{{ asset('admin') }}/assets/img/fileupload.png" alt="Experience Letter"
                                        class="img-thumbnail" id="experience_letter_file_{{$employee->id}}"
                                        style="cursor: pointer;" />
                                    <input type="file" class="form-control custom-input"
                                        id="experience_letter_{{$employee->id}}" name="experience_letter"
                                        style="display: none;" />
                                    <div id="experience_letter_file_{{$employee->id}}_name"></div>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Clearance Certificate</label>
                                <label for="clearance_certificate_{{$employee->id}}">
                                    <img src="{{ asset('admin') }}/assets/img/fileupload.png"
                                        alt="Clearance Certificate" class="img-thumbnail"
                                        id="clearance_certificate_file_{{$employee->id}}" style="cursor: pointer;" />
                                    <input type="file" class="form-control custom-input"
                                        id="clearance_certificate_{{$employee->id}}" name="clearance_certificate"
                                        style="display: none;" />
                                    <div id="clearance_certificate_file_{{$employee->id}}_name"></div>
                                </label>
                            </div>
                        </div>
                        @endif
                        <div class="col-sm-4">
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
                        <div class="col-sm-4" style="position: relative;">
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
                </form>
            </div>
        </div>
    </div>
</div>
<!--Documents Upload MODAL-->
@push('scripts')
<script>
    $(document).ready(function () {
    $('.delete-image').on('click', function () {
        var fileId = $(this).data('file-id');
        var parentDiv = $(this).closest('.col-sm-4');
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
                    <div class="col-sm-4 position-relative" data-file-name="${file.name}" style="display: inline-block;">
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

            const fileNameToRemove = $(this).closest('.col-sm-4').data('file-name');
            for (let i = 0; i < dt.items.length; i++) {
                if (dt.items[i].getAsFile().name === fileNameToRemove) {
                    dt.items.remove(i);
                    break;
                }
            }
            $('#other_documents_{{$employee->id}}')[0].files = dt.files;
            $(this).closest('.col-sm-4').remove();
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



        $('#nid_card_file_{{$employee->id}}').on('click', function () {
            handleImagePreview('#nid_card_{{$employee->id}}', '#nid_card_file_{{$employee->id}}',
                '#nid_card_file_{{$employee->id}}_name');
        });


        $('#profile_picture_file_{{$employee->id}}').on('click', function () {
            handleImagePreview('#profile_picture_{{$employee->id}}',
                '#profile_picture_file_{{$employee->id}}',
                '#profile_picture_file_{{$employee->id}}_name');
        });

        $('#signature_file_{{$employee->id}}').on('click', function () {
            handleImagePreview('#signature_{{$employee->id}}', '#signature_file_{{$employee->id}}',
                '#signature_file_{{$employee->id}}_name');
        });

        $('#resume_file_{{$employee->id}}').on('click', function () {
            handleImagePreview('#resume_{{$employee->id}}', '#resume_file_{{$employee->id}}',
                '#resume_file_{{$employee->id}}_name');
        });

        $('#resignation_letter_file_{{$employee->id}}').on('click', function () {
            handleImagePreview('#resignation_letter_{{$employee->id}}',
                '#resignation_letter_file_{{$employee->id}}',
                '#resignation_letter_file_{{$employee->id}}_name');
        });

        $('#experience_letter_file_{{$employee->id}}').on('click', function () {
            handleImagePreview('#experience_letter_{{$employee->id}}',
                '#experience_letter_file_{{$employee->id}}',
                '#experience_letter_file_{{$employee->id}}_name');
        });

        $('#clearance_certificate_file_{{$employee->id}}').on('click', function () {
            handleImagePreview('#clearance_certificate_{{$employee->id}}',
                '#clearance_certificate_file_{{$employee->id}}',
                '#clearance_certificate_file_{{$employee->id}}_name');
        });
    });

</script>
@endpush
