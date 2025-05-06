<div class="modal fade bs-example-modal-center" id="Modal-road-nobd" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
          <div class="modal-header">
             <h4 class="project-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Add Road</h4>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-5">
             <form action="{{ route('road.store') }}" method="POST">
                @csrf
                <div class="row">
                   <div class="col-lg-12">
                        <div class="form-group">
                           <label for="sector_for_road">Sector Name</label>
                           <select class="form-control sector_for_road" name="sector" id="sector_for_road" required>
                              <option value="">--select sector--</option>
                              @foreach ($sectors as $sector)
                                 <option value="{{ $sector->id }}">{{ $sector->sector_name }}</option>
                              @endforeach
                           </select>
                           @error('sector') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                   </div>

                   <div class="col-lg-12">
                     <div class="form-group">
                        <label for="block">Block Name</label>
                        <select class="form-control block" name="block" id="block" required>
                           <option value="">--select Block--</option>
                      
                        </select>
                        @error('block') <span class="text-danger">{{ $message }}</span> @enderror
                     </div>
                  </div>

                   <div class="col-lg-12">
                    <div class="form-group">
                       <label for="road_name">Road Name</label>
                       <input type="text" name="road_name" class="form-control custom-input" id="road_name" placeholder="Road Name" required>
                       @error('road_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                 </div>
                   <div class="col-lg-12">
                      <div class="hstack gap-2 justify-content-center pt-4 pb-3">
                         <a href="#" class="cancel-button-1" data-bs-dismiss="modal"><i class='bx bx-x bx-flashing' ></i> Cancel</a>
                         <button type="submit" class="submit-button-1"><i class='bx bx-upload bx-flashing' ></i> Submit</button>
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




