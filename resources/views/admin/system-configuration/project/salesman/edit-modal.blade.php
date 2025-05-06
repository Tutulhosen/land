<div class="modal fade bs-example-modal-center" id="editModalgrid-salesman-{{ $salesman->id }}" tabindex="-1"
   aria-labelledby="editModalgridLabel" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
          <div class="modal-header">
             <h4 class="project-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Edit Salesman</h4>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-5">
            <form action="{{ route('salesman.update', $salesman->id) }}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="agency">Agency Name</label>
                            <select class="form-control" name="agency" id="agency" required>
                                <option value="">--select Agency--</option>
                                @foreach ($agencies as $agency)
                                <?php
                                    if ($agency->id==$salesman->agency_id) {
                                        $selected= 'selected';
                                    } else {
                                        $selected= '';
                                    }
                                    
                                ?>
                                    <option value="{{ $agency->id }}" {{$selected}}>{{ $agency->agency_name }}</option>
                                @endforeach
                            </select>
                            @error('agency') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="salesman_name">Salesman Name <span class="text-danger">*</span></label>
                            <input name="salesman_name" type="text" class="form-control custom-input" id="salesman_name"
                                placeholder="Salesman Name" required value="{{$salesman->salesman_name}}">
                                @error('salesman_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
  
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input name="phone" type="text" class="form-control custom-input" id="phone"
                                placeholder="Phone Number" value="{{$salesman->phone}}">
                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
  
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="whatsapp">WhatsApp</label>
                            <input name="whatsapp" type="text" class="form-control custom-input" id="whatsapp"
                                placeholder="WhatsApp Number" value="{{$salesman->whatsapp}}">
                                @error('whatsapp') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
  
                    <div class="col-lg-12">
                       <div class="form-group">
                           <label for="address">Agency Address</label>
                           <textarea name="address" class="form-control h-100" id="address">{{$salesman->address}}</textarea>
                           @error('address') <span class="text-danger">{{ $message }}</span> @enderror
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
