<div class="modal fade bs-example-modal-center area-assign-modal" id="department_assign_modal-{{ $shift->id }}" tabindex="-1"
    aria-labelledby="exampleModalgridLabel" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title"><i
                        class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Assign Department</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('shift.department-assign') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="shift_id" value="{{ $shift->id }}">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="type">Select Department</label>
                                <select name="department_id[]" class="form-select form-control custom-input multipleSelect2" multiple required>
                                    @foreach($departments as $department)
                                    @if (!$department->shiftAndDepartment)
                                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                        
                                    @endif
                                    @endforeach
                                </select>

                                @error('department_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end pt-4 pb-3">
                                <a href="#" class="cancel-button-1" data-bs-dismiss="modal"><i
                                        class='bx bx-x bx-flashing'></i> Cancel</a>
                                <button type="submit" class="submit-button-1"><i class='bx bx-upload bx-flashing'></i> Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
