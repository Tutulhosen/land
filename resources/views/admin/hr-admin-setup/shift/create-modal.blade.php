<div id="addRowModal-shifts" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="card modal-dialog large-modal" role="document">
        <form action="{{ route('shift.store') }}" method="POST">
            @csrf

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="project-details-card-header-title"><i
                            class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Create Shift</h4>
                    <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="shift_name">Shift Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control custom-input" id="shift_name"
                                        name="shift_name" placeholder="Shift Name" required>
                                        @error('Shift') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email2">Shift Type</label>
                                    <select class="form-select form-control custom-input" id="shift_type_id"
                                        name="shift_type_id">
                                        <option value="" selected disabled>--Select--</option>
                                        @foreach ($shift_types as $shift_type)
                                        <option value="{{$shift_type->id}}">{{$shift_type->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('shift_type_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="start_time">Shift Start Time</label>
                                    <input type="text" class="form-control custom-input timepicker" id="start_time"
                                        name="start_time" >
                                        @error('start_time') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="end_time">Shift End Time</label>
                                    <input type="text" class="form-control custom-input timepicker" id="end_time" name="end_time" >
                                </div>
                                @error('end_time') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email2">Max Start Time</label>
                                    <input type="text" class="form-control custom-input timepicker" id="max_start_time"
                                        name="max_start_time" >
                                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email2">Min End Time</label>
                                    <input type="text" class="form-control custom-input timepicker" id="min_end_time"
                                        name="min_end_time" >
                                </div>
                            </div> --}}
                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email2">Total Shift Hours</label>
                                    <input type="text" class="form-control custom-input" id="tot_shift_hour"
                                        name="tot_shift_hour" placeholder="8 Hour">
                                        @error('tot_shift_hour') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div> --}}
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">Shift Description</label>
                                    <textarea class="form-control" rows="4" cols="4" name="description"
                                        placeholder="Write Here"></textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="send_email">
                                        <input type="checkbox" class="form-checkbox mr-1" name="send_email" id="send_email" >
                                        Send Email
                                    </label>

                                    @error('send_email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email2">Status</label>
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
                        {{-- <button type="button" class="cancel-button-1">
                            <i class='bx bx-x bx-flashing'></i> Cancel
                        </button> --}}
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
