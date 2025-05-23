<!-- employeeType Create Modal (Second Modal) -->
<div class="modal fade" id="employeeTypeModal" tabindex="-1" aria-hidden="true" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title">
                    <i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i> Create employeeType
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addemployeeTypeForm">
                    @csrf
                    <div class="col-lg-12">
                        <div class="form-group">
                           <label for="name">Employee Type</label>
                           <input type="text" name="name" class="form-control custom-input" id="name" placeholder="Employee Type" required>
                           @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                     </div>
                    <!-- Action Buttons -->
                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end py-3">
                            <button type="button" class="cancel-button-1" data-bs-dismiss="modal">
                                <i class='bx bx-x bx-flashing'></i> Cancel
                            </button>
                            <button type="button" id="saveemployeeTypeBtn" class="submit-button-1">
                                <i class='bx bx-upload bx-flashing'></i> Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
