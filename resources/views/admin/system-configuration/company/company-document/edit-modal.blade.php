<div class="modal fade bs-example-modal-center" id="documents_sample_edit_modal" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
       <div class="modal-content">
          <div class="modal-header">
             <h4 class="project-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Edit Company Documents</h4>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-5">
             <form action="{{ route('company.company-document-update', $companyInformation->companyDocument->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-4 col-sm-4 col-md-4">
                        <div class="card setting-card-1">
                           <div class="card-header">
                              <h5 class="setting-title-s" style="font-size: 14px !important;">Letterhead (Vertical)</h5>
                           </div>
                           <div class="card-body">
                              <div class=" setting-card">
                                 <div class="logo-content text-center">
                                    @if ($companyInformation->companyDocument->letterhead_vertical)
                                    <img id="letterhead_vertical_preview" alt="your image" src="{{  asset('storage/'.$companyInformation->companyDocument->letterhead_vertical) }}" width="100%" height="150px" class="big-logo">
                                    @else
                                    <img id="letterhead_vertical_preview" alt="your image" src="{{  asset('document_plain.png') }}" width="100%" height="150px" class="big-logo">
                                    @endif
                                 </div>
                                 <div class="text-center mt-4">
                                    <label for="letterhead_vertical">
                                       <div class="setting-button-1 logo_update"> <i class='bx bx-cloud-upload'></i> Choose file here
                                       </div>
                                       <input type="file" class="form-control file d-none" name="letterhead_vertical" id="letterhead_vertical" data-filename="logo_update" >
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4 col-md-4">
                        <div class="card setting-card-1">
                           <div class="card-header">
                              <h5 class="setting-title-s" style="font-size: 14px !important;">Invoice (Vertical)</h5>
                           </div>
                           <div class="card-body">
                              <div class=" setting-card">
                                 <div class="logo-content text-center">
                                    @if ($companyInformation->companyDocument->invoice_vertical)
                                    <img id="invoice_vertical_preview" alt="your image" src="{{  asset('storage/'.$companyInformation->companyDocument->invoice_vertical) }}" width="100%" height="150px" class="big-logo">
                                    @else
                                    <img id="invoice_vertical_preview" alt="your image" src="{{  asset('document_plain.png') }}" width="100%" height="150px" class="big-logo">
                                    @endif
                                </div>
                                 <div class="text-center mt-4">
                                    <label for="invoice_vertical">
                                       <div class="setting-button-1 logo_update"> <i class='bx bx-cloud-upload'></i> Choose file here
                                       </div>
                                       <input type="file" class="form-control file d-none" name="invoice_vertical" id="invoice_vertical" data-filename="logo_update" >
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4 col-md-4">
                        <div class="card setting-card-1">
                           <div class="card-header">
                              <h5 class="setting-title-s" style="font-size: 14px !important;">Money Receipt (Vertical)</h5>
                           </div>
                           <div class="card-body">
                              <div class=" setting-card">
                                 <div class="logo-content text-center">
                                    @if ($companyInformation->companyDocument->money_receipt_vertical)
                                    <img id="money_receipt_vertical_preview" alt="your image" src="{{  asset('storage/'.$companyInformation->companyDocument->money_receipt_vertical) }}" width="100%" height="150px" class="big-logo">
                                    @else
                                    <img id="money_receipt_vertical_preview" alt="your image" src="{{  asset('document_plain.png') }}" width="100%" height="150px" class="big-logo">
                                    @endif
                                </div>
                                 <div class="text-center mt-4">
                                    <label for="money_receipt_vertical">
                                       <div class="setting-button-1 logo_update"> <i class='bx bx-cloud-upload'></i> Choose file here
                                       </div>
                                       <input type="file" class="form-control file d-none" name="money_receipt_vertical" id="money_receipt_vertical" data-filename="logo_update" >
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4 col-md-4">
                        <div class="card setting-card-1">
                           <div class="card-header">
                              <h5 class="setting-title-s" style="font-size: 14px !important;">Letterhead (Horizontal)</h5>
                           </div>
                           <div class="card-body">
                              <div class=" setting-card">
                                 <div class="logo-content text-center">
                                    @if ($companyInformation->companyDocument->letterhead_horizontal)
                                    <img id="letterhead_horizontal_preview" alt="your image" src="{{  asset('storage/'.$companyInformation->companyDocument->letterhead_horizontal) }}" width="100%" height="75px" class="big-logo">
                                    @else
                                    <img id="letterhead_horizontal_preview" alt="your image" src="{{  asset('document_land.png') }}" width="100%" height="75px" class="big-logo">
                                    @endif
                                </div>
                                 <div class="text-center mt-4">
                                    <label for="letterhead_horizontal">
                                       <div class="setting-button-1 logo_update"> <i class='bx bx-cloud-upload'></i> Choose file here
                                       </div>
                                       <input type="file" class="form-control file d-none" name="letterhead_horizontal" id="letterhead_horizontal" data-filename="logo_update" >
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4 col-md-4">
                        <div class="card setting-card-1">
                           <div class="card-header">
                              <h5 class="setting-title-s" style="font-size: 14px !important;">Invoice (Horizontal)</h5>
                           </div>
                           <div class="card-body">
                              <div class=" setting-card">
                                 <div class="logo-content text-center">
                                    @if ($companyInformation->companyDocument->invoice_horizontal)
                                    <img id="invoice_horizontal_preview" alt="your image" src="{{  asset('storage/'.$companyInformation->companyDocument->invoice_horizontal) }}" width="100%" height="75px" class="big-logo">
                                    @else
                                    <img id="invoice_horizontal_preview" alt="your image" src="{{  asset('document_land.png') }}" width="100%" height="75px" class="big-logo">
                                    @endif
                                </div>
                                 <div class="text-center mt-4">
                                    <label for="invoice_horizontal">
                                       <div class="setting-button-1 logo_update"> <i class='bx bx-cloud-upload'></i> Choose file here
                                       </div>
                                       <input type="file" class="form-control file d-none" name="invoice_horizontal" id="invoice_horizontal" data-filename="logo_update" >
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4 col-md-4">
                        <div class="card setting-card-1">
                           <div class="card-header">
                              <h5 class="setting-title-s" style="font-size: 14px !important;">Money Receipt (Horizontal)</h5>
                           </div>
                           <div class="card-body">
                              <div class=" setting-card">
                                 <div class="logo-content text-center">
                                    @if ($companyInformation->companyDocument->money_receipt_horizontal)
                                    <img id="money_receipt_horizontal_preview" alt="your image" src="{{  asset('storage/'.$companyInformation->companyDocument->money_receipt_horizontal) }}" width="100%" height="75px" class="big-logo">
                                    @else
                                    <img id="money_receipt_horizontal_preview" alt="your image" src="{{  asset('document_land.png') }}" width="100%" height="75px" class="big-logo">
                                    @endif
                                </div>
                                 <div class="text-center mt-4">
                                    <label for="money_receipt_horizontal">
                                       <div class="setting-button-1 logo_update"> <i class='bx bx-cloud-upload'></i> Choose file here
                                       </div>
                                       <input type="file" class="form-control file d-none" name="money_receipt_horizontal" id="money_receipt_horizontal" data-filename="logo_update" >
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
     handleImagePreview('#letterhead_vertical', '#letterhead_vertical_preview');
     handleImagePreview('#invoice_vertical', '#invoice_vertical_preview');
     handleImagePreview('#money_receipt_vertical', '#money_receipt_vertical_preview');
     handleImagePreview('#letterhead_horizontal', '#letterhead_horizontal_preview');
     handleImagePreview('#invoice_horizontal', '#invoice_horizontal_preview');
     handleImagePreview('#money_receipt_horizontal', '#money_receipt_horizontal_preview');
 </script>
 @endpush
