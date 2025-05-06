<!--Chart of Accounts Edit Modal-->
<div id="editRowModal-department-{{ $department->id }}" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="card modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Edit Departments</h4>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <form action="{{ route('department.update', $department->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="department_name">Department Name<span class="required-label text-danger">*</span></label>
                                    <input type="text" class="form-control custom-input" id="department_name" name="department_name"
                                        placeholder="Department Name" value="{{ old('department_name', $department->department_name) }}" required>
                                        @error('department_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" rows="6" cols="4" name="description"
                                        placeholder="Write Here">{{ old('description', $department->description) }}</textarea>
                                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <select class="form-select form-control custom-input" name="status" id="status">
                                            <option  value="1" {{$department->status == 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{$department->status == 0 ? 'selected' : ''}}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <div class="modal-button-box">
                        <button type="button" class="cancel-button-1" data-bs-dismiss="modal"><i class='bx bx-x bx-flashing'></i> Cancel</button>
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
