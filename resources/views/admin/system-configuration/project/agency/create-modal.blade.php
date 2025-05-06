<div class="modal fade bs-example-modal-center" id="Modal-agency-nobd" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
          <div class="modal-header">
             <h4 class="project-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Add Agency</h4>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-5">
             <form action="{{ route('agency.store') }}" method="POST">
                @csrf
               <div class="row">
                  <div class="col-lg-6">
                        <div class="form-group">
                           <label for="project">Project</label>
                           <select class="form-control" name="project" id="project" required>
                              <option value="">--select project--</option>
                              @foreach ($projects as $project)
                                 <option value="{{ $project->id }}">{{ $project->name }}</option>
                              @endforeach
                           </select>
                           @error('project') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label for="agency_name">Agency Name <span class="text-danger">*</span></label>
                          <input name="agency_name" type="text" class="form-control custom-input" id="agency_name"
                              placeholder="Agency Name" required>
                              @error('agency_name') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>

                  <div class="col-lg-6">
                      <div class="form-group">
                          <label for="agency_type">Agency Type <span class="text-danger">*</span></label>
                          <select name="agency_type" class="form-select form-control custom-input" id="agency_type"
                              placeholder="Agency Type">
                              <option value="" disabled>--Select--</option>
                              <option value="local" >Local</option>
                              <option value="international">International</option>
                          </select>
                          @error('agency_type') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>

                  <div class="col-lg-6">
                      <div class="form-group">
                          <label for="phone">Phone Number</label>
                          <input name="phone" type="text" class="form-control custom-input" id="phone"
                              placeholder="Phone Number" value="">
                              @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>

                  <div class="col-lg-6">
                      <div class="form-group">
                          <label for="whatsapp">WhatsApp</label>
                          <input name="whatsapp" type="text" class="form-control custom-input" id="whatsapp"
                              placeholder="WhatsApp Number">
                              @error('whatsapp') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>

                  <div class="col-lg-6">
                      <div class="form-group">
                          <label for="landline">Landline Number</label>
                          <input name="landline" type="text" class="form-control custom-input" id="landline"
                              placeholder="Landline Number">
                              @error('landline') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>

                  <div class="col-lg-6">
                      <div class="form-group">
                          <label for="email">Email Address</label>
                          <input name="email" type="email" class="form-control custom-input" id="email"
                              placeholder="Email Address">
                              @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>

                  <div class="col-lg-6">
                      <div class="form-group">
                          <label for="sign_in_date">Agency Signin Date</label>
                          <input name="sign_in_date" type="text" class="form-control custom-input datepicker"
                              id="sign_in_date" placeholder="Agency SigninDate">
                              @error('opening_date') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>

                  <div class="col-lg-6">
                      <div class="form-group">
                          <label for="opening_time">Opening Time</label>
                          <input name="opening_time" type="text" class="form-control custom-input timepicker"
                              id="opening_time" placeholder="Opening Time">
                              @error('opening_time') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>

                  <div class="col-lg-6">
                      <div class="form-group">
                          <label for="closing_time">Closing Time</label>
                          <input name="closing_time" type="text" class="form-control custom-input timepicker"
                              id="closing_time" placeholder="Closing Time">
                              @error('closing_time') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="form-group">
                         <label for="address">Agency Address</label>
                         <textarea name="address" class="form-control h-100" id="address"></textarea>
                         @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                     </div>
                 </div>

                  <div class="col-lg-12">
                      <div class="hstack gap-2 justify-content-end pt-4 pb-3">
                          <a href="#" class="cancel-button-1" data-bs-dismiss="modal"><i
                                  class='bx bx-x bx-flashing'></i> Cancel</a>
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




