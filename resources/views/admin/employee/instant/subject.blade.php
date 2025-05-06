<!-- employeeType Create Modal (Second Modal) -->
<div class="modal fade" id="subjectModal" tabindex="-1" aria-hidden="true" role="dialog" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title">
                    <i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>
                    Create Group/ Major Subject Name
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addsubjectForm" method="POST">
                    @csrf
                    <div class="col-lg-12">
                        <div class="form-group">
                           <label for="name">Group/ Major Subject Name</label>
                           <input type="text" name="name" class="form-control custom-input" id="educationSubjectName" placeholder="Group/ Major Subject Name" required>
                           @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                     </div>
                    <!-- Action Buttons -->
                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end py-3">
                            <button type="button" class="cancel-button-1" data-bs-dismiss="modal">
                                <i class='bx bx-x bx-flashing'></i> Cancel
                            </button>
                            <button type="button" id="saveSubjectBtn" class="submit-button-1">
                                <i class='bx bx-upload bx-flashing'></i> Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
