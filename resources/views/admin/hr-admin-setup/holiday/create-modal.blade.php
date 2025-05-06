<div id="addRowModal-holiday" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog large-modal modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="{{ route('holiday.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="project-details-card-header-title"><i
                            class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Create Holiday</h4>
                    <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="holiday_name">Occasion/Holiday Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control custom-input" id="holiday_name"
                                        name="holiday_name" placeholder="Enter Holiday Name" required>
                                    @error('holiday_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="holiday_type">Holiday Type <span class="text-danger">*</span></label>
                                    <select
                                        class="form-select form-control custom-input select2 @error('holiday_type') is-invalid @enderror"
                                        id="holiday_type" name="holiday_type" required>
                                        <option value="" selected disabled>--Select--</option>
                                        @foreach ($holidayTypes as $holiday)
                                            <option value="{{$holiday->id}}" {{ old('holiday_type')=='public' ? 'selected' : '' }}>{{$holiday->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('holiday_type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" rows="6" cols="4" name="description"
                                        placeholder="Write Here"></textarea>
                                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="email2">Department</label>
                                    <select class="form-select mb-3 select2" aria-label="Default select example"
                                        name="department_id" id="department_id">
                                        <option value="" selected disabled>--Select--</option>
                                        <option value="all">All Departments</option>
                                        @foreach ($departments as $department)
                                        <option value="{{$department->id}}">{{$department->department_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('department_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" class="form-control custom-input " id="start_date" name="start_date">
                                    @error('start_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date" class="form-control custom-input " id="end_date" name="end_date">
                                    @error('end_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="duration">Duration</label>
                                    <input type="text" class="form-control custom-input" id="duration" name="duration" placeholder="Enter Duration">
                                    @error('duration') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="created_by">Created By</label>
                                    <input type="text" class="form-control custom-input" id="created_by" name="created_by" >
                                    @error('created_by')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-select form-control custom-input" name="status" id="status">
                                        <option selected value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <div class="modal-button-box">
                        <button type="button" class="cancel-button-1">
                            <i class='bx bx-x bx-flashing'></i> Cancel
                        </button>
                        <button type="submit" class="submit-button-1">
                            <i class='bx bx-upload bx-flashing'></i> Submit
                        </button>
                    </div>

                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>

    <!-- /.modal-dialog -->
</div>
