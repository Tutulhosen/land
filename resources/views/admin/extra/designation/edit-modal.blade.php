<!--Chart of Accounts Edit Modal-->
<div id="editRowModal-designation-{{ $designation->id }}" class="modal fade" tabindex="-1" role="dialog"
    style="display: none;">
    <div class="card modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>
                    Edit Designation</h4>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <form action="{{ route('designation.update', $designation->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="designation_name">Designation Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control custom-input" id="designation_name"
                                        name="designation_name" placeholder="Department Name"
                                        value="{{ $designation->designation_name }}" required>
                                    @error('designation_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="email2">Department<span class="text-danger">*</span></label>
                                    <select class="form-select mb-3" aria-label="Default select example"
                                        name="department_id" required>
                                        @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" {{ $department->id==$designation->department_id ?
                                            'selected' : '' }}>
                                            {{ $department->department_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="6" cols="4" name="description"
                                placeholder="Write Here">{{ $designation->description }}</textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-select form-control custom-input" name="status" id="status">
                                <option value="1" {{$designation->status == 1 ? 'selected' : ''}}>Active</option>
                                <option value="0" {{$designation->status == 0 ? 'selected' : ''}}>Inactive</option>
                            </select>
                        </div>
                    </div>

                </div>
        </div>
    </div>
    <div class="modal-footer border-0">
        <div class="modal-button-box">
            {{-- <button type="button" class="cancel-button-1" data-bs-dismiss="modal"><i class='bx bx-x bx-flashing'></i>
                Cancel</button> --}}
            <button type="submit" class="submit-button-1"><i class='bx bx-upload bx-flashing'></i> Update</button>
        </div>
    </div>
    </form>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!--Chart of Accounts Edit Modal-->
