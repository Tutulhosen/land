<!--Chart of Accounts Edit Modal-->
<div id="editRowModal-holiday-{{ $holiday->id }}" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog large-modal modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title"><i
                        class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Edit Holidays</h4>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{ route('holiday.update', $holiday->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="holiday_name">Occasion/Holiday Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control custom-input @error('holiday_name') is-invalid @enderror"
                                        id="holiday_name" name="holiday_name" placeholder="Enter Holiday Name"
                                        value="{{ old('holiday_name', $holiday->holiday_name) }}">
                                    @error('holiday_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="holiday_type">Holiday Type <span class="text-danger">*</span></label>
                                    <select
                                        class="form-select form-control custom-input @error('holiday_type') is-invalid @enderror"
                                        id="holydaySelect2-{{ $holiday->id }}" name="holiday_type">
                                        <option value="" disabled>--Select--</option>
                                        @foreach ($holidayTypes as $holidaytype)
                                            <option value="{{$holidaytype->id}}" {{$holidaytype->id == $holiday->holiday_type ? 'selected' : '' }}>{{$holidaytype->name}}</option>
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
                                        placeholder="Write Here">{{$holiday->description }}</textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="email2">Department</label>
                                    <select class="form-select mb-3" name="department_id" id="departmentSelect2-{{ $holiday->id }}">
                                        <option value="" disabled>--Select--</option>
                                        @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" {{ $holiday->department_id ==
                                            $department->id ? 'selected' : '' }}>
                                            {{ $department->department_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('department_id') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="text"
                                        class="form-control custom-input datepicker @error('start_date') is-invalid @enderror"
                                        id="start_date" name="start_date"
                                        value="{{ old('start_date', $holiday->start_date) }}">
                                    @error('start_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="text"
                                        class="form-control custom-input datepicker @error('end_date') is-invalid @enderror"
                                        id="end_date" name="end_date" value="{{ old('end_date', $holiday->end_date) }}">
                                    @error('end_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="duration">Duration</label>
                                    <input type="text"
                                        class="form-control custom-input @error('duration') is-invalid @enderror"
                                        id="duration" name="duration" placeholder="Enter Duration"
                                        value="{{ old('duration', $holiday->duration) }}">
                                    @error('duration') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="created_by">Created By</label>
                                    <input type="text" class="form-control custom-input" value="{{ old('created_by', $holiday->created_by) }}" id="created_by" name="created_by" >
                                    @error('created_by')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-select form-control custom-input" name="status" id="status">
                                        <option value="1" {{$holiday->status == 1 ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{$holiday->status == 0 ? 'selected' : ''}}>Inactive</option>
                                    </select>
                                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="modal-footer border-0">
                    <div class="modal-button-box">
                        <button type="button" class="cancel-button-1" data-bs-dismiss="modal"><i
                                class='bx bx-x bx-flashing'></i> Cancel</button>
                        <button type="submit" class="submit-button-1"><i class='bx bx-upload bx-flashing'></i>
                            Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Chart of Accounts Edit Modal-->
@push('scripts')
<script>
    $('#editRowModal-holiday-{{ $holiday->id }}').on('shown.bs.modal', function () {
        $('#departmentSelect2-{{ $holiday->id }}').select2({
            theme: "bootstrap",
            placeholder: "--Select--",
            width: "100%"
        });
        $('#holydaySelect2-{{ $holiday->id }}').select2({
            theme: "bootstrap",
            placeholder: "--Select--",
            width: "100%"
        });
    });
</script>
@endpush
