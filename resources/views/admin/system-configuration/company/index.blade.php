@extends('layouts.admin')
@section('title','System-Configuration')
@section('content')

<div class="container">
    <div class="page-inner">
       <div class="row">
          <div class="col-md-12">
             <div class="row">
                <div class="col-md-3">
                   <div class="card">
                      <div class="card-header project-details-card-header">
                         <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Company Setting</h4>
                      </div>
                      <div class="card-body">
                         <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd" id="v-pills-tab-without-border" role="tablist" aria-orientation="vertical">
                            <a class="nav-link {{ session('activeTab') == 'company-information' || !session('activeTab') ? 'active' : '' }}" id="company-information-tab-nobd" data-bs-toggle="pill" href="#company-information" role="tab"
                               aria-controls="company-information" aria-selected="false" tabindex="-1">Company Information</a>
                            <a class="nav-link {{ session('activeTab') == 'contact-information' ? 'active' : '' }}" id="contact-information-tab-nobd" data-bs-toggle="pill" href="#contact-information" role="tab"
                               aria-controls="contact-information" aria-selected="false" tabindex="-1">Contact Information</a>
                            <a class="nav-link {{ session('activeTab') == 'brand-setting' ? 'active' : '' }}" id="brand-setting-tab-nobd" data-bs-toggle="pill" href="#brand-setting" role="tab"
                               aria-controls="brand-setting" aria-selected="false" tabindex="-1">Brand Setting</a>
                            <a class="nav-link {{ session('activeTab') == 'company-document' ? 'active' : '' }}" id="company-document-tab-nobd" data-bs-toggle="pill" href="#company-document" role="tab"
                               aria-controls="company-document" aria-selected="true">Company Document</a>
                            <a class="nav-link {{ session('activeTab') == 'application-setting' ? 'active' : '' }}" id="application-setting-tab-nobd" data-bs-toggle="pill" href="#application-setting" role="tab"
                               aria-controls="application-setting" aria-selected="false" tabindex="-1">Application Setting</a>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-md-9">
                   <div class="tab-content" id="v-pills-without-border-tabContent">
                      <div class="tab-pane fade {{ session('activeTab') == 'company-information' || !session('activeTab') ? 'show active' : '' }}" id="company-information" role="tabpanel" aria-labelledby="company-information-tab-nobd">
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Company Information</h4>

                               </div>
                            </div>
                            <div class="card-body">
                                @include('admin.system-configuration.company.company-information.form')
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'contact-information' ? 'show active' : '' }}" id="contact-information" role="tabpanel" aria-labelledby="contact-information-tab-nobd">
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Contact Information</h4>
                               </div>
                            </div>
                            <div class="card-body">
                                @include('admin.system-configuration.company.contact-information.form')
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'brand-setting' ? 'show active' : '' }}" id="brand-setting" role="tabpanel" aria-labelledby="brand-setting-tab-nobd">
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i>Brand Setting</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#brand_setting_edit_modal">
                                    <i class='bx bx-message-square-add bx-tada' ></i>Edit Brand Setting</a>
                               </div>
                               @include('admin.system-configuration.company.brand-setting.edit-modal')
                            </div>
                            <div class="card-body">
                               <div class="row">
                                  <div class="col-lg-4 col-sm-6 col-md-6">
                                     <div class="card setting-card-1">
                                        <div class="card-header">
                                           <h5 class="setting-title-s">Main Logo</h5>
                                        </div>
                                        <div class="card-body">
                                           <div class=" setting-card">
                                              <div class="logo-content text-center my-4">

                                                    @if ($companyInformation->brandSetting->main_logo)
                                                    <img id="image" alt="your image" src="{{ asset('storage/'.$companyInformation->brandSetting->main_logo) }}" width="200px" height="150px" class="big-logo">
                                                    @else
                                                    <img id="image" alt="your image" src="{{ asset('preview.png') }}" width="200px" height="150px" class="big-logo">
                                                    @endif

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
                                              <div class="logo-content text-center my-4">

                                                    @if ($companyInformation->brandSetting->alternative_logo)
                                                    <img id="image" alt="your image" src="{{ asset('storage/'.$companyInformation->brandSetting->alternative_logo) }}" width="200px" height="150px" class="big-logo">
                                                    @else
                                                    <img id="image" alt="your image" src="{{ asset('preview.png') }}" width="200px" height="150px" class="big-logo">
                                                    @endif

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
                                              <div class="logo-content text-center my-4">

                                                    @if ($companyInformation->brandSetting->favicon)
                                                    <img id="image" alt="your image" src="{{ asset('storage/'.$companyInformation->brandSetting->favicon) }}" width="200px" height="150px" class="big-logo">
                                                    @else
                                                    <img id="image" alt="your image" src="{{ asset('preview.png') }}" width="200px" height="150px" class="big-logo">
                                                    @endif

                                              </div>

                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'company-document' ? 'show active' : '' }}" id="company-document" role="tabpanel" aria-labelledby="company-document-tab-nobd">
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Company Documents</h4>
                                  <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#documents_sample_edit_modal">
                                    <i class='bx bx-message-square-add bx-tada' ></i>Edit Company Documents</a>
                                </div>
                                @include('admin.system-configuration.company.company-document.edit-modal')
                            </div>
                            <div class="card-body">
                               <div class="row">
                                  <div class="col-lg-4 col-sm-4 col-md-4">
                                     <div class="card setting-card-1">
                                        <div class="card-header">
                                           <h5 class="setting-title-s">Letterhead (Vertical)</h5>
                                        </div>
                                        <div class="card-body">
                                           <div class=" setting-card">
                                              <div class="logo-content text-center">
                                                @if ($companyInformation->companyDocument->letterhead_vertical)
                                                 <a href="{{  asset('storage/'.$companyInformation->companyDocument->letterhead_vertical) }}" target="_blank">
                                                 <img id="image" alt="your image" src="{{  asset('storage/'.$companyInformation->companyDocument->letterhead_vertical) }}" width="100%" class="big-logo">
                                                </a>
                                                @else
                                                <img id="image" alt="your image" src="{{  asset('document_plain.png') }}" width="100%" class="big-logo">
                                                 @endif
                                              </div>
                                              <div class="text-center mt-4">
                                                    @if ($companyInformation->companyDocument->letterhead_vertical)
                                                        <a href="{{ asset('storage/' . $companyInformation->companyDocument->letterhead_vertical) }}" download>
                                                            <div class="setting-button-1">
                                                                <i class='bx bx-cloud-download'></i> Download file
                                                            </div>
                                                        </a>
                                                    @endif
                                                </div>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="col-lg-4 col-sm-4 col-md-4">
                                     <div class="card setting-card-1">
                                        <div class="card-header">
                                           <h5 class="setting-title-s">Invoice (Vertical)</h5>
                                        </div>
                                        <div class="card-body">
                                           <div class=" setting-card">
                                              <div class="logo-content text-center">
                                                @if ($companyInformation->companyDocument->invoice_vertical)
                                                 <a href="{{  asset('storage/'.$companyInformation->companyDocument->invoice_vertical) }}" target="_blank">
                                                 <img id="image" alt="your image" src="{{  asset('storage/'.$companyInformation->companyDocument->invoice_vertical) }}" width="100%" class="big-logo">
                                                </a>
                                                @else
                                                <img id="image" alt="your image" src="{{  asset('document_plain.png') }}" width="100%" class="big-logo">
                                                 @endif
                                              </div>
                                               <div class="text-center mt-4">
                                                    @if ($companyInformation->companyDocument->invoice_vertical)
                                                        <a href="{{ asset('storage/' . $companyInformation->companyDocument->invoice_vertical) }}" download>
                                                            <div class="setting-button-1">
                                                                <i class='bx bx-cloud-download'></i> Download file
                                                            </div>
                                                        </a>
                                                    @endif
                                                </div>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="col-lg-4 col-sm-4 col-md-4">
                                     <div class="card setting-card-1">
                                        <div class="card-header">
                                           <h5 class="setting-title-s">Money Receipt (Vertical)</h5>
                                        </div>
                                        <div class="card-body">
                                           <div class=" setting-card">
                                              <div class="logo-content text-center">
                                                @if ($companyInformation->companyDocument->money_receipt_vertical)
                                                 <a href="{{  asset('storage/'.$companyInformation->companyDocument->money_receipt_vertical) }}" target="_blank">
                                                 <img id="image" alt="your image" src="{{  asset('storage/'.$companyInformation->companyDocument->money_receipt_vertical) }}" width="100%" class="big-logo">
                                                </a>
                                                @else
                                                <img id="image" alt="your image" src="{{  asset('document_plain.png') }}" width="100%" class="big-logo">
                                                 @endif
                                              </div>
                                              <div class="text-center mt-4">
                                                    @if ($companyInformation->companyDocument->money_receipt_vertical)
                                                        <a href="{{ asset('storage/' . $companyInformation->companyDocument->money_receipt_vertical) }}" download>
                                                            <div class="setting-button-1">
                                                                <i class='bx bx-cloud-download'></i> Download file
                                                            </div>
                                                        </a>
                                                    @endif
                                                </div>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="col-lg-4 col-sm-4 col-md-4">
                                     <div class="card setting-card-1">
                                        <div class="card-header">
                                           <h5 class="setting-title-s">Letterhead (Horizontal)</h5>
                                        </div>
                                        <div class="card-body">
                                           <div class=" setting-card">
                                              <div class="logo-content text-center">
                                                 @if ($companyInformation->companyDocument->letterhead_horizontal)
                                                 <a href="{{  asset('storage/'.$companyInformation->companyDocument->letterhead_horizontal) }}" target="_blank">
                                                 <img id="image" alt="your image" src="{{  asset('storage/'.$companyInformation->companyDocument->letterhead_horizontal) }}" width="100%" class="big-logo">
                                                </a>
                                                @else
                                                <img id="image" alt="your image" src="{{  asset('document_land.png') }}" width="100%" class="big-logo">
                                                 @endif
                                              </div>
                                              <div class="text-center mt-4">
                                                    @if ($companyInformation->companyDocument->letterhead_horizontal)
                                                        <a href="{{ asset('storage/' . $companyInformation->companyDocument->letterhead_horizontal) }}" download>
                                                            <div class="setting-button-1">
                                                                <i class='bx bx-cloud-download'></i> Download file
                                                            </div>
                                                        </a>
                                                    @endif
                                                </div>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="col-lg-4 col-sm-4 col-md-4">
                                     <div class="card setting-card-1">
                                        <div class="card-header">
                                           <h5 class="setting-title-s">Invoice (Horizontal)</h5>
                                        </div>
                                        <div class="card-body">
                                           <div class=" setting-card">
                                              <div class="logo-content text-center">
                                                 @if ($companyInformation->companyDocument->invoice_horizontal)
                                                 <a href="{{  asset('storage/'.$companyInformation->companyDocument->invoice_horizontal) }}" target="_blank">
                                                 <img id="image" alt="your image" src="{{  asset('storage/'.$companyInformation->companyDocument->invoice_horizontal) }}" width="100%" class="big-logo">
                                                </a>
                                                @else
                                                <img id="image" alt="your image" src="{{  asset('document_land.png') }}" width="100%" class="big-logo">
                                                 @endif
                                              </div>
                                              <div class="text-center mt-4">
                                                    @if ($companyInformation->companyDocument->invoice_horizontal)
                                                        <a href="{{ asset('storage/' . $companyInformation->companyDocument->invoice_horizontal) }}" download>
                                                            <div class="setting-button-1">
                                                                <i class='bx bx-cloud-download'></i> Download file
                                                            </div>
                                                        </a>
                                                    @endif
                                                </div>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="col-lg-4 col-sm-4 col-md-4">
                                     <div class="card setting-card-1">
                                        <div class="card-header">
                                           <h5 class="setting-title-s">Money Receipt (Horizontal)</h5>
                                        </div>
                                        <div class="card-body">
                                           <div class=" setting-card">
                                              <div class="logo-content text-center">
                                                @if ($companyInformation->companyDocument->money_receipt_horizontal)
                                                 <a href="{{  asset('storage/'.$companyInformation->companyDocument->money_receipt_horizontal) }}" target="_blank">
                                                 <img id="image" alt="your image" src="{{  asset('storage/'.$companyInformation->companyDocument->money_receipt_horizontal) }}" width="100%" class="big-logo">
                                                </a>
                                                @else
                                                <img id="image" alt="your image" src="{{  asset('document_land.png') }}" width="100%" class="big-logo">
                                                 @endif
                                              </div>
                                              <div class="text-center mt-4">
                                                    @if ($companyInformation->companyDocument->money_receipt_horizontal)
                                                        <a href="{{ asset('storage/' . $companyInformation->companyDocument->money_receipt_horizontal) }}" download>
                                                            <div class="setting-button-1">
                                                                <i class='bx bx-cloud-download'></i> Download file
                                                            </div>
                                                        </a>
                                                    @endif
                                                </div>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="tab-pane fade {{ session('activeTab') == 'application-setting' ? 'show active' : '' }}" id="application-setting" role="tabpanel" aria-labelledby="application-setting-tab-nobd">
                         <div class="card">
                            <div class="card-header project-details-card-header">
                               <div class="d-flex align-items-center">
                                  <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada' ></i> Application Setting</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                @include('admin.system-configuration.company.application-setting.form')
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

