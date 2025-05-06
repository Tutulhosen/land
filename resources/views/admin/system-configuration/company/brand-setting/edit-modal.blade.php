<div class="modal fade bs-example-modal-center" id="brand_setting_edit_modal" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
       <div class="modal-content">
          <div class="modal-header">
             <h4 class="project-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Edit Brand Setting</h4>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-5">
             <form action="{{ route('company.brand-setting-update', $companyInformation->brandSetting->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-md-6">
                        <div class="card setting-card-1">
                           <div class="card-header">
                              <h5 class="setting-title-s">Main Logo</h5>
                           </div>
                           <div class="card-body">
                              <div class=" setting-card">
                                 <div class="logo-content text-center mt-3">
                                    @if ($companyInformation->brandSetting->main_logo)
                                    <img id="main_logo_preview" alt="your image" src="{{ asset('storage/'.$companyInformation->brandSetting->main_logo) }}" width="150px" height="100px" class="big-logo">
                                    @else
                                    <img id="main_logo_preview" alt="your image" src="{{ asset('preview.png') }}" width="150px" height="100px" class="big-logo">
                                    @endif
                                </a>
                                 </div>
                                 <div class="text-center mt-5">
                                    <label for="main_logo">
                                       <div class="setting-button-1 logo_update"> <i class='bx bx-cloud-upload'></i> Choose file here
                                       </div>
                                       <input type="file" class="form-control file d-none" name="main_logo" id="main_logo" data-filename="logo_update" accept=".jpeg,.jpg,.png">
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="col-lg-4 col-sm-6 col-md-6">
                        <div class="card setting-card-1">
                           <div class="card-header">
                              <h5 class="setting-title-s">Alternative Logo</h5>
                           </div>
                           <div class="card-body">
                              <div class=" setting-card">
                                 <div class="logo-content text-center mt-3">
                                    @if ($companyInformation->brandSetting->alternative_logo)
                                    <img id="alternative_logo_preview" alt="your image" src="{{ asset('storage/'.$companyInformation->brandSetting->alternative_logo) }}" width="150px" height="100px" class="big-logo">
                                    @else
                                    <img id="alternative_logo_preview" alt="your image" src="{{ asset('preview.png') }}" width="150px" height="100px" class="big-logo">
                                    @endif
                                    </a>
                                 </div>
                                 <div class="text-center mt-5">
                                    <label for="alternative_logo">
                                       <div class="setting-button-1 logo_update"> <i class='bx bx-cloud-upload'></i> Choose file here
                                       </div>
                                       <input type="file" class="form-control file d-none" name="alternative_logo" id="alternative_logo" data-filename="logo_update" accept=".jpeg,.jpg,.png">
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-6 col-md-6">
                        <div class="card setting-card-1">
                           <div class="card-header">
                              <h5 class="setting-title-s">Favicon</h5>
                           </div>
                           <div class="card-body">
                              <div class=" setting-card">
                                 <div class="logo-content text-center mt-3">
                                    @if ($companyInformation->brandSetting->favicon)
                                    <img id="favicon_preview" alt="your image" src="{{ asset('storage/'.$companyInformation->brandSetting->favicon) }}" width="150px" height="100px" class="big-logo">
                                    @else
                                    <img id="favicon_preview" alt="your image" src="{{ asset('preview.png') }}" width="150px" height="100px" class="big-logo">
                                    @endif
                                </a>
                                 </div>
                                 <div class="text-center mt-5">
                                    <label for="favicon">
                                       <div class="setting-button-1 logo_update"> <i class='bx bx-cloud-upload'></i> Choose file here
                                       </div>
                                       <input type="file" class="form-control file d-none" name="favicon" id="favicon" data-filename="logo_update" accept=".jpeg,.jpg,.png">
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end pt-4 pb-3">
                           <a href="#" class="cancel-button-1" data-bs-dismiss="modal"><i class='bx bx-x bx-flashing'></i> Cancel</a>
                           <button type="submit" class="submit-button-1"><i class='bx bx-upload bx-flashing'></i> Update</button>
                        </div>
                     </div>
                   <!--end col-->
                </div>
                <!--end row-->
             </form>
          </div>
       </div>
    </div>
 </div>
 @push('scripts')
 <script>
     function handleImagePreview(input, previewId) {
         $(input).on('change', function() {
             const file = this.files[0];
             const reader = new FileReader();
             reader.onload = function(e) {
                 $(previewId).attr('src', e.target.result).removeClass('d-none');
             }
             if (file) {
                 reader.readAsDataURL(file);
             } else {
                 $(previewId).addClass('d-none');
             }
         });
     }
     handleImagePreview('#main_logo', '#main_logo_preview');
     handleImagePreview('#alternative_logo', '#alternative_logo_preview');
     handleImagePreview('#favicon', '#favicon_preview');
 </script>
 @endpush
