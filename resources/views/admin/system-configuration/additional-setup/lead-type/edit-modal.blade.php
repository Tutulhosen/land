<div class="modal fade bs-example-modal-center" id="Modal-lead-type-edit-{{ $lead_type->id }}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
          <div class="modal-header">
             <h4 class="lead-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Edit Lead Type</h4>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-5">
            <form action="{{ route('lead-type.update', $lead_type->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                   <div class="col-lg-12">
                      <div class="form-group">
                         <label for="name">Lead Type</label>
                         <input type="text" value="{{ $lead_type->name }}" name="name" class="form-control custom-input" id="name" placeholder="Lead Type" required>
                         @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                   </div>
                   <div class="col-lg-12">
                      <div class="hstack gap-2 justify-content-center pt-4 pb-3">
                         <a href="#" class="cancel-button-1" data-bs-dismiss="modal"><i class='bx bx-x bx-flashing' ></i> Cancel</a>
                         <button type="submit" class="submit-button-1"><i class='bx bx-upload bx-flashing' ></i> Update</button>
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
