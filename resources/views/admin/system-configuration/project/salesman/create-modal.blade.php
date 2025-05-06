<div class="modal fade bs-example-modal-center" id="Modal-salesman-nobd" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered custom-modal-width">
       <div class="modal-content">
          <div class="modal-header">
             <h4 class="project-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Add Salesman</h4>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-5">
             <form action="{{ route('salesman.store') }}" method="POST">
                @csrf
               <div class="row">
                  <div class="col-lg-6">
                        <div class="form-group">
                           <label for="agency">Agency Name</label>
                           <select class="form-control" name="agency" id="agency" required>
                              <option value="">--select Agency--</option>
                              @foreach ($agencies as $agency)
                                 <option value="{{ $agency->id }}">{{ $agency->agency_name }}</option>
                              @endforeach
                           </select>
                           @error('agency') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label for="salesman_name">Salesman Name <span class="text-danger">*</span></label>
                          <input name="salesman_name" type="text" class="form-control custom-input" id="salesman_name"
                              placeholder="Salesman Name" required>
                              @error('salesman_name') <span class="text-danger">{{ $message }}</span> @enderror
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

                  <div class="col-lg-12">
                     <div class="form-group">
                         <label for="address">Salesman Address</label>
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




