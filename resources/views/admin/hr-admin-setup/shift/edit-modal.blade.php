<!--Chart of Accounts Edit Modal-->
<div id="editRowModal-shift-{{ $shift->id }}" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="card modal-dialog large-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i> Edit Shift</h4>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('shift.update', $shift->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="shift_name">Shift Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control custom-input" id="shift_name" name="shift_name"
                                           placeholder="Shift Name" value="{{ old('shift_name', $shift->shift_name) }}" required>
                                     @error('shift_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="shift_type">Shift Type</label>
                                    <select class="form-select form-control custom-input" id="shift_type" name="shift_type_id">
                                        <option value="" selected disabled>--Select--</option>
                                        @foreach ($shift_types as $shift_type)
                                        <option value="{{$shift_type->id}}" {{ $shift->shift_type_id == $shift_type->id ? 'selected' : '' }}>{{$shift_type->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('shift_type_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="start_time">Shift Start Time</label>
                                    <div></div>
                                    <input type="text" class="form-control custom-input timepicker" id="start_time" name="start_time"
                                           value="{{ $shift->start_time ?? 'null' }}" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="end_time">Shift End Time</label>
                                    <input type="text" class="form-control custom-input timepicker" id="end_time" name="end_time"
                                           value="{{ $shift->end_time ?? 'null' }}" >
                                </div>
                            </div>

                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="max_start_time">Max Start Time</label>
                                    <input type="time" class="form-control custom-input" id="max_start_time" name="max_start_time"
                                           value="{{ $shift->max_start_time?->format('H:i') ?? 'null' }}" >
                                </div>
                            </div> --}}

                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="min_end_time">Min End Time</label>
                                    <input type="time" class="form-control custom-input" id="min_end_time" name="min_end_time"
                                           value="{{ $shift->min_end_time?->format('H:i') ?? 'null' }}" >
                                </div>
                            </div> --}}

                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tot_shift_hour">Total Shift Hours</label>
                                    <input type="text" class="form-control custom-input" id="tot_shift_hour" name="tot_shift_hour"
                                           value="{{ $shift->tot_shift_hour ?? 'null' }}" placeholder="8 Hour">
                                </div>
                            </div> --}}
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">Shift Description</label>
                                    <textarea class="form-control" rows="4" cols="4" name="description" placeholder="Write Here">{{ old('description', $shift->description) }}</textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="send_email">
                                        <input type="checkbox" class="form-checkbox mr-1" {{ $shift->send_email ? 'checked' : '' }} name="send_email" id="send_email" >
                                        Send Email
                                    </label>

                                    @error('send_email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer border-0">
                    <div class="modal-button-box">
                        {{-- <button type="button" class="cancel-button-1" data-bs-dismiss="modal"><i class='bx bx-x bx-flashing'></i> Cancel</button> --}}
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
{{-- @push('scripts')
<script>
    $(document).ready(function () {
        let shiftId = '{{ $shift->id }}';

        $('.select2').select2({
            theme: "bootstrap",
            dropdownParent: $('#editRowModal-shift-{{ $shift->id }}'),
        });
    });
</script>
@endpush --}}
